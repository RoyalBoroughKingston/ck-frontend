<template>
    <section class="section">
        <div class="flex-container">
            <div class="flex-col flex-col--12">
                <p class="sm-copy color-grey text-center" v-if="services">{{ services.length }} service<span v-if="services.length > 1 || services.length === 0">s</span> shortlisted</p>
            </div>
        </div>

        <div class="flex-container flex-container--justify">
            <div class="flex-col flex-col--4 flex-col--tablet--6 flex-col--gutter" v-for="service in services" :key="service.id">
                <service :type="'shortlist'" :service="service" :organisation="getOrganisation(service.organisation_id)" :location="getServiceLocation(service)"></service>
            </div>
        </div>
    </section>
</template>
 
<script>
    import axios from 'axios'
    import Service from './Service'
    
    export default {
        name: "services-shortlist",
        components: {
            Service
        },
        data () {
            return {
                services: null,
                service_ids: [],
                organisations: [],
                service_locations: null,
                shortlist: null
            }
        },
        methods: {
            updateShortlist() {
                // Retrieve items in shortlist
                axios
                .get(`${this.apiUri}/services?filter[id]=${this.shortlist}`)
                .then(response => (
                    // Set the shortlist services
                    this.services = response.data.data,
                    // Store the organisation ids
                    this.getOrganisations(),
                    // Get service locations
                    this.getServiceLocations()
                ))
                .catch(error => console.log(error))
            },
            getOrganisations() {
                // Store organisation ids
                this.services.forEach(service => {
                   // Push organisation id to organisations array
                   this.organisations.push(service.organisation_id) 
                });

                // Do a request for organisations
                axios
                .get(`${this.apiUri}/organisations?filter[id]=${this.organisations}`)
                .then(response => (
                    // Overwrite the organisations data model
                    this.organisations = response.data.data
                ))
                .catch(error => console.log(error))
            },
            getOrganisation(organisation_id) {
                for (var i = 0; i < this.organisations.length; i++) {
                    if (this.organisations[i]['id'] === organisation_id) {
                        return this.organisations[i];
                    }
                }
                return null;
            },
            getServiceLocations() {
                // Store organisation ids
                this.services.forEach((service) => {
                    this.service_ids.push(service.id)
                });

                // Do a request for organisations
                axios
                .get(`${this.apiUri}/service-locations?filter[service_id]=${this.service_ids}&include=location`)
                .then(response => (
                    // Overwrite the organisations data model
                    this.service_locations = response.data.data,

                    // Set finish loading
                    this.finished_loading = true
                ))
                .catch(error => console.log(error))
            },
            getServiceLocation(service) {
                if(this.service_locations) {
                    if(this.service_locations.length > 0)
                        for (var i = 0; i < this.service_locations.length; i++)
                                if (this.service_locations[i].service_id === service.id)
                                    var location = this.service_locations[i].location.address_line_1 + ', ' + this.service_locations[i].location.address_line_2

                                    return location;
                                
                                return null;
                }
            },
            getParameterByName(name, url) {
                if (!url) url = window.location.href;
                name = name.replace(/[\[\]]/g, '\\$&');
                var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                    results = regex.exec(url);
                if (!results) return null;
                if (!results[2]) return '';
                return decodeURIComponent(results[2].replace(/\+/g, ' '));
            }
        },
        mounted () {
            // Check if shortlist id's exist from sharing otherwise get cookie
            if(this.getParameterByName('ids')) {
                this.shortlist = this.getParameterByName('ids')
            } else {
                this.shortlist = window.$cookies.get("ck_shortlist")
            }
            
            // Updated the shortlist
            this.updateShortlist()
        }
    }
</script>
 
<style scoped>
 
</style>

<template>
    <section class="section">
        <div class="flex-container">
            <div class="flex-col flex-col--12">
                <p class="sm-copy color-grey text-center" v-if="services">{{ services.length }} service<span v-if="services.length > 1 || services.length === 0">s</span> shortlisted</p>
            </div>
        </div>

        <div class="flex-container flex-container--justify">
            <div class="flex-col flex-col--4 flex-col--gutter" v-for="service in services" :key="service.id">
                <service :type="'shortlist'" :service.sync="service" :organisation="getOrganisation(service.organisation_id)"></service>
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
                organisations: [],
                shortlist: null
            }
        },
        methods: {
            updateShortlist() {
                // Retrieve items in shortlist
                axios
                .get('https://ck-api-staging.cloudapps.digital/core/v1/services?filter[id]=' + this.shortlist)
                .then(response => (
                    // Set the shortlist services
                    this.services = response.data.data,
                    // Store the organisation ids
                    this.getOrganisations()
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
                .get('https://ck-api-staging.cloudapps.digital/core/v1/organisations?filter[id]=' + this.organisations)
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
                this.shortlist = this.$cookies.get("ck_shortlist")
            }
            
            // Updated the shortlist
            this.updateShortlist()
        }
    }
</script>
 
<style scoped>
 
</style>
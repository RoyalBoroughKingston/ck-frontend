<template>
    <section class="section section--no-padding">
        <div class="flex-container">
            <div class="flex-col" v-if="$mq === 'mobile'">
                <img :src="`https://api.connectedkingston.uk/core/v1/organisations/${organisation.id}/logo.png?v=${organisation.updated_at}`" :alt="organisation.name" class="img-responsive">
            </div>

            <div class="flex-col flex-col--4" v-if="organisation && $mq === 'mobile'">
                <div class="service">
                    <div class="service__header">
                        <span>
                            <p class="service__name"><strong>Contact</strong></p>
                        </span>
                    </div>
                    
                    <div class="service__contact service__contact--telephone" v-if="organisation.name">
                        <span class="sm-copy">
                            <i class="fa fa-user" aria-hidden></i> Name
                        </span>
                        <p>{{ organisation.name }}</p>
                    </div>

                    <div class="service__contact service__contact--telephone" v-if="organisation.phone">
                        <span class="sm-copy">
                            <i class="fa fa-phone" aria-hidden></i> Telephone
                        </span>
                        <a :href="`tel:`+organisation.phone">{{ organisation.phone }}</a>
                    </div>
                    
                    <div class="service__contact service__contact--email" v-if="organisation.email">
                        <span class="sm-copy">
                            <i class="fa fa-envelope" aria-hidden></i> Email
                        </span>
                        <a :href="`mailto:`+organisation.email">{{ organisation.email }}</a>
                    </div>
                    
                    <div class="service__contact service__contact--website" v-if="organisation.url">
                        <span class="sm-copy">
                            <i class="fa fa-globe" aria-hidden></i>
                            Website
                        </span>
                        <a :href="organisation.url" target="_blank">{{ toFriendlyURL(organisation.url) }}</a>
                    </div>
                </div>
            </div>

            <div class="flex-col flex-col--8 flex-col--tablet--6 flex-col--gutter">
                <div class="flex-container flex-container--no-padding">
                    <div class="flex-col flex-col--6 flex-col--tablet--12 flex-col--gutter" v-for="service in services" :key="service.id">
                        <service v-bind:type="'service'" :service="service" :organisation="organisation" :location="getServiceLocation(service)"></service>
                    </div>
                </div>
            </div>

            <div class="flex-col flex-col--4 flex-col--tablet--6" v-if="organisation && $mq !== 'mobile'">
                <div class="service">
                    <div class="service__header">
                        <span>
                            <p class="service__name"><strong>Contact</strong></p>
                        </span>
                    </div>
                    
                    <div class="service__contact service__contact--telephone" v-if="organisation.name">
                        <span class="sm-copy">
                            <i class="fa fa-user" aria-hidden></i> Name
                        </span>
                        <p>{{ organisation.name }}</p>
                    </div>

                    <div class="service__contact service__contact--telephone" v-if="organisation.phone">
                        <span class="sm-copy">
                            <i class="fa fa-phone" aria-hidden></i> Telephone
                        </span>
                        <a :href="`tel:`+organisation.phone">{{ organisation.phone }}</a>
                    </div>
                    
                    <div class="service__contact service__contact--email" v-if="organisation.email">
                        <span class="sm-copy">
                            <i class="fa fa-envelope" aria-hidden></i> Email
                        </span>
                        <a :href="`mailto:`+organisation.email">{{ organisation.email }}</a>
                    </div>
                    
                    <div class="service__contact service__contact--website" v-if="organisation.url">
                        <span class="sm-copy">
                            <i class="fa fa-globe" aria-hidden></i>
                            Website
                        </span>
                        <a :href="organisation.url" target="_blank">{{ toFriendlyURL(organisation.url) }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
 
<script>
    import axios from 'axios'
    import Service from './Service'
    
    export default {
        name: "organisation-main",
        components: {
            Service
        },
        data () {
            return {
                organisation: null,
                services: null,
                service_ids: [],
                service_locations: null,
            }
        },
        methods: {
            getSlug() {
                let pathArray = window.location.pathname.split('/');
                let slug = pathArray[2]

                return slug
            },
            getOrganisation() {
                axios
                .get('https://api.connectedkingston.uk/core/v1/organisations/' + this.getSlug())
                .then(response => (
                    // Store the organisation
                    this.organisation = response.data.data,
                    // Get the services for the organisation
                    this.getServices()
                ))
                .catch(error => console.log(error))
            },
            getServices() {
                axios
                .get('https://api.connectedkingston.uk/core/v1/services?filter[organisation_id]=' + this.$data.organisation.id)
                .then(response => (
                    // Store the organisations services
                    this.services = response.data.data,
                    // Get service locations
                    this.getServiceLocations()
                ))
                .catch(error => console.log(error))
            },
            getServiceLocations() {
                // Store organisation ids
                this.services.forEach((service) => {
                    this.service_ids.push(service.id)
                });

                // Do a request for organisations
                axios
                .get('https://api.connectedkingston.uk/core/v1/service-locations?filter[service_id]=' + this.service_ids + '&include=location')
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
            toFriendlyURL(url) {
                return url.replace(/^(?:https?:\/\/)?(?:www\.)?/i, "");
            },
        },
        mounted () {
            this.getOrganisation();
        }
    }
</script>
 
<style scoped>
 
</style>
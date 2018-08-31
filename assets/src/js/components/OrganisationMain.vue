<template>
    <section class="section section--no-padding">
        <div class="flex-container">
            <div class="flex-col flex-col--8">
                <div class="flex-container flex-container--no-padding">
                    <div class="flex-col flex-col--6 flex-col--gutter" v-for="service in services" :key="service.id">
                        <service v-bind:type="'service'" v-bind:service="service"></service>
                    </div>
                </div>
            </div>

            <div class="flex-col flex-col--4">
                <div class="flex-container flex-container--no-padding">
                    <div class="flex-col flex-col--12 flex-col--gutter">
                        <div class="service">
                            <div class="service__header">
                                <span>
                                    <p class="service__name"><strong>Contact</strong></p>
                                </span>
                                <span class="mobile-show"><i class="fa fa-angle-down"></i></span>
                            </div>
                            
                            <div class="service__contact service__contact--telephone" v-if="organisation.name">
                                <span class="sm-copy">
                                    <i class="fa fa-user"></i> Name
                                </span>
                                <p>{{ organisation.name }}</p>
                            </div>

                            <div class="service__contact service__contact--telephone" v-if="organisation.phone">
                                <span class="sm-copy">
                                    <i class="fa fa-phone"></i> Telephone
                                </span>
                                <p>{{ organisation.phone }}</p>
                            </div>
                            
                            <div class="service__contact service__contact--email" v-if="organisation.email">
                                <span class="sm-copy">
                                    <i class="fa fa-envelope"></i> Email
                                </span>
                                <p>{{ organisation.email }}</p>
                            </div>
                            
                            <div class="service__contact service__contact--website" v-if="organisation.url">
                                <span class="sm-copy">
                                    <i class="fa fa-globe"></i>
                                    Website
                                </span>
                                <p>{{ organisation.url }}</p>
                            </div>
                            
                            <!-- <div class="service__social">
                                <a v-bind:href="social_media.url" v-for="social_media in organisation.social_medias"  :key="social_media.type">
                                    <i v-bind:class="['fab fa-' + social_media.type]"></i>
                                </a>
                            </div> -->
                        </div>
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
                services: null
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
                .get('https://ck-api-staging.cloudapps.digital/core/v1/organisations/' + this.getSlug())
                .then(response => (
                    this.organisation = response.data.data,
                    this.getServices()
                ))
                .catch(error => console.log(error))
            },
            getServices() {
                axios
                .get('https://ck-api-staging.cloudapps.digital/core/v1/services?filter[organisation_id]=' + this.$data.organisation.id)
                .then(response => (this.services = response.data.data))
                .catch(error => console.log(error))
            }
        },
        mounted () {
            this.getOrganisation();
        }
    }
</script>
 
<style scoped>
 
</style>
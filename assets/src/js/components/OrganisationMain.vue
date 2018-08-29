<template>
    <section class="section section--no-padding">
        <div class="flex-container">
            <div class="flex-col flex-col--8">
                <div class="flex-container flex-container--no-padding">
                    <div class="flex-col flex-col--6 flex-col--gutter" v-for="service in services" :key="service.id">
                        <div class="service">
                            <div class="service__image">
                                <img src="https://picsum.photos/315/157" alt="Image title">
                                
                                <div class="service__add">
                                    <a href="#" role="button" class="btn btn--small">Add to shortlist <i class="fa fa-star"></i></a>
                                </div>
                            </div>

                            <div class="service__location">
                                <i class="fa fa-map-marker-alt"></i> <span class="service__location__name">Surbiton, Kingston</span>
                            </div>
                            
                            <div class="service__meta">
                                <div class="service__meta__item sm-copy">
                                    <i class="fa fa-pound-sign"></i> Free
                                </div>
                                
                                <div class="service__meta__item sm-copy">
                                    <i class="fa fa-hourglass"></i> Up to 1 week
                                </div>
                            </div>

                            <div class="service__details">
                                <h4 class="service__name">{{ service.name }}</h4>
                                <p class="service__sub-title sm-copy">{{ organisation.name }}</p>
                                <p class="service__description sm-copy">{{ service.intro }}</p>
                                <a v-bind:href="service.url" role="button" class="btn btn--small">View more <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
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
    
    export default {
        name: "organisation-main",
        data () {
            return {
                organisation: null,
                services: null
            }
        },
        methods: {
            getOrganisation() {
                axios
                .get('https://ck-api-staging.cloudapps.digital/core/v1/organisations/7d35a4d6-8886-4060-8354-a3c94bc8615c')
                .then(response => (this.organisation = response.data.data))
                .catch(error => console.log(error))
            },
            getServices() {
                axios
                .get('https://ck-api-staging.cloudapps.digital/core/v1/services?filter[organisation_id]=7d35a4d6-8886-4060-8354-a3c94bc8615c?include=location')
                .then(response => (this.services = response.data.data))
                .catch(error => console.log(error))
            }
        },
        mounted () {
            this.getOrganisation();
            this.getServices();
        }
    }
</script>
 
<style scoped>
 
</style>
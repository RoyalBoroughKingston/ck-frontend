<template>
    <section class="section section--no-padding">
        <div class="flex-container flex-container--space">
            <div class="flex-col flex-col--7 flex-col--gutter">
                <div class="section__component" v-if="service.description">
                    <h4>About</h4>
                    <p class="sm-copy color-grey">{{ service.description }}</p>
                </div>

                <div class="section__component">
                    <h4>Where I can access this service</h4>
                    <div class="card card--grey card--location" v-for="location in serviceLocations" :key="location.id">
                        <div class="card__location flex-col flex-col--6">
                            <p class="card__location__name"><strong>{{ location.name }}</strong></p>
                            <p class="card__location__address">
                                {{ location.address_line_2 }}<br>
                                {{ location.address_line_3 }}<br>
                                {{ location.county }}<br>
                                {{ location.postcode }}
                            </p>
                            <p class="card__location__distance sm-copy">0.3 miles away</p>
                        </div>
                        <div class="card__hours flex-col flex-col--6">
                            <div class="card__hours__times">
                                <table>
                                    <tbody>
                                        <tr v-for="time in location.regular_opening_hours" :key="time.index">
                                            <td class="sm-copy">{{ time.weekday }}</td>
                                            <td>{{ time.opens_at | moment("ha") }}-{{ time.closes_at | moment("ha") }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card__services flex-col flex-col--12">
                            <img src="/assets/dist/img/access-icons/level-access-automatic-doors.png" alt=""> <img src="/assets/dist/img/access-icons/access-by-ramps-slopes-manual-doors.png" alt=""> <img src="/assets/dist/img/access-icons/mobility-impaired-walker.png" alt="">
                        </div>
                    </div>
                </div>

                <div class="section__component">
                    <h4>Who is this service for</h4>
                    <table class="table table--who-for">
                        <tbody>
                            <tr v-if="service.criteria.age_group">
                                <td><img src="/assets/dist/img/whos-this-for-icons/age-group.svg" alt="Age group"></td>
                                <td class="text-center">Age group</td>
                                <td class="sm-copy">{{ service.criteria.age_group }}</td>
                            </tr>
                            <tr v-if="service.criteria.disability">
                                <td><img src="/assets/dist/img/whos-this-for-icons/disability.svg" alt="Disability"></td>
                                <td class="text-center">Disability</td>
                                <td class="sm-copy">{{ service.criteria.disability }}</td>
                            </tr>
                            <tr v-if="service.criteria.employment">
                                <td><img src="/assets/dist/img/whos-this-for-icons/employment.svg" alt="Employment"></td>
                                <td class="text-center">Text</td>
                                <td class="sm-copy">{{ service.criteria.employment }}</td>
                            </tr>
                            <tr v-if="service.criteria.gender">
                                <td><img src="/assets/dist/img/whos-this-for-icons/gender.svg" alt="Gender"></td>
                                <td class="text-center">Gender</td>
                                <td class="sm-copy">{{ service.criteria.gender }}</td>
                            </tr>
                            <tr v-if="service.criteria.housing">
                                <td><img src="/assets/dist/img/whos-this-for-icons/housing.svg" alt="Housing"></td>
                                <td class="text-center">Housing</td>
                                <td class="sm-copy">{{ service.criteria.housing }}</td>
                            </tr>
                            <tr v-if="service.criteria.income">
                                <td><img src="/assets/dist/img/whos-this-for-icons/income.svg" alt="Income"></td>
                                <td class="text-center">Income</td>
                                <td class="sm-copy">{{ service.criteria.income }}</td>
                            </tr>
                            <tr v-if="service.criteria.language">
                                <td><img src="/assets/dist/img/whos-this-for-icons/language.svg" alt="Language"></td>
                                <td class="text-center">Language</td>
                                <td class="sm-copy">{{ service.criteria.language }}</td>
                            </tr>
                            <tr v-if="service.criteria.other">
                                <td><img src="/assets/dist/img/whos-this-for-icons/other.svg" alt="Other"></td>
                                <td class="text-center">Other</td>
                                <td class="sm-copy">{{ service.criteria.other }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="section__component" v-if="service.useful_infos">
                    <div class="card card--border-blue">
                        <h4 class="card__title">Useful infos</h4>
                        <div class="flex-col flex-col--12">
                            <blockquote v-for="info in service.useful_infos" :key="info.id">
                                <p v-if="info.title">{{ info.title }}</p>
                                <p class="sm-copy" v-if="info.description">{{ info.description }}</p>
                            </blockquote>
                        </div>
                    </div>
                </div>

                <div class="section__component" v-if="service.video_embed">
                    <div class="media">
                        <div class="responsive-embed" v-html="service.video_embed"></div>
                    </div>
                </div>

                <div class="section__component" v-if="service.testimonial">
                    <div class="quote">
                        <p class="quote__icons"><i class="fa fa-quote-left"></i> <i class="fa fa-quote-right"></i></p>
                        <p class="quote__quote"><strong>{{ service.testimonial }}</strong></p>
                    </div>
                </div>
            </div>

            <div class="flex-col flex-col--4 flex-col--gutter">
                <div class="section__component text-center">
                    <a href="#print" role="button" class="btn btn--secondary btn--icon-after">Print page <i class="fa fa-print"></i></a>
                </div>
                
                <div class="section__component">
                    <div class="card card--notification card--mint" v-if="service.is_free === true">
                        <div class="card__icon"><i class="fa fa-pound-sign"></i></div>
                        <div class="card__content">
                            <p>Free</p>
                            <p class="sm-copy">This service costs no money.</p>
                        </div>
                    </div>

                    <div class="service">
                        <div class="service__header">
                            <span>
                                <p class="service__name"><strong>Contact</strong></p>
                            </span>
                            <span class="mobile-show"><i class="fa fa-angle-down"></i></span>
                        </div>
                        
                        <div class="service__contact service__contact--telephone" v-if="service.contact_name">
                            <span class="sm-copy">
                                <i class="fa fa-user"></i> Name
                            </span>
                            <p>{{ service.contact_name }}</p>
                        </div>

                        <div class="service__contact service__contact--telephone" v-if="service.contact_phone">
                            <span class="sm-copy">
                                <i class="fa fa-phone"></i> Telephone
                            </span>
                            <p>{{ service.contact_phone }}</p>
                        </div>
                        
                        <div class="service__contact service__contact--email" v-if="service.contact_email">
                            <span class="sm-copy">
                                <i class="fa fa-envelope"></i> Email
                            </span>
                            <p>{{ service.contact_email }}</p>
                        </div>
                        
                        <div class="service__contact service__contact--website" v-if="service.url">
                            <span class="sm-copy">
                                <i class="fa fa-globe"></i>
                                Website
                            </span>
                            <p>{{ service.url }}</p>
                        </div>
                        
                        <div class="service__social">
                            <a v-bind:href="social_media.url" v-for="social_media in service.social_medias"  :key="social_media.type">
                                <i v-bind:class="['fab fa-' + social_media.type]"></i>
                            </a>
                        </div>
                    </div>
                    
                    <div class="card"></div>
                </div>
                
                <div class="section__component">
                    <div class="card card--border-blue card--reduce-padding">
                        <div class="card__content text-center"><img src="/assets/dist/img/global/royal-borough-of-kingston.jpg"
                                class="card__image">
                            <p class="sm-copy">Royal Borough of Kingston</p>
                            <p class="sm-copy"><a href="https://www.kingston.gov.uk/" target="_blank">https://www.kingston.gov.uk/</a></p>
                        </div>
                    </div>
                </div>

                <div class="section__component text-center">
                    <p class="sm-copy"><span class="color-grey">Page last updated</span> <em>{{ service.updated_at | moment("Do MMMM YYYY") }}</em></p>
                    <p class="sm-copy"><a href="#">Give us feedback</a></p>
                </div>
            </div>
        </div>
    </section>
</template>
 
<script>
    import axios from 'axios'
    
    export default {
        name: "service-main",
        data () {
            return {
                service: null,
                serviceLocations: null
            }
        },
        methods: {
            getService() {
                axios
                .get('https://ck-api-staging.cloudapps.digital/core/v1/services/ee73a9ae-b503-408f-92bf-9eb71a2b99de')
                .then(response => (this.service = response.data.data))
                .catch(error => console.log(error))
            },
            getServiceLocation() {
                axios
                .get('https://ck-api-staging.cloudapps.digital/core/v1/service-locations?filter[service_id]=ee73a9ae-b503-408f-92bf-9eb71a2b99de?include=location')
                .then(response => (this.serviceLocations = response.data.data))
                .catch(error => console.log(error))
            }
        },
        mounted () {
            this.getService();
            this.getServiceLocation();
        }
    }
</script>
 
<style scoped>
 
</style>
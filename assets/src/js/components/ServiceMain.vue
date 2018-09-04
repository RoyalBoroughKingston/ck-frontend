<template>
    <section class="section section--no-padding">
        <div class="flex-container flex-container--space flex-container--mobile-no-padding">
            <div class="flex-col flex-col--7 flex-col--gutter">
                <div class="section__component" v-if="service.description">
                    <h4 class="section__component__header">About</h4>
                    
                    <div class="color-grey" v-html="toHtml(service.description)"></div>
                </div>

                <div class="section__component" v-if="serviceLocations.length > 0">
                    <h4 class="section__component__header">Where I can access this service</h4>

                    <div class="card card--grey card--location" v-for="location in serviceLocations" :key="location.id">
                        <div class="card__location flex-col flex-col--6">
                            <p class="card__location__name" v-if="location.name"><strong>{{ location.name }}</strong></p>
                            
                            <p class="card__location__address">
                                <span v-if="location.location.address_line_1">{{ location.location.address_line_1 }}</span>
                                <span v-if="location.location.address_line_2">{{ location.location.address_line_2 }}</span>
                                <span v-if="location.location.address_line_3">{{ location.location.address_line_3 }}</span>
                                <span v-if="location.location.county">{{ location.location.county }}</span>
                                <span v-if="location.location.postcode">{{ location.location.postcode }}</span>
                            </p>
                            
                            <p class="card__location__distance sm-copy" v-if="showDistance()">{{calculateDistance(location.location.lat, location.location.lon)}} miles away</p>
                        </div>

                        <div class="card__hours flex-col flex-col--6" v-if="location.regular_opening_hours.length > 0">
                            <div class="card__hours__times">
                                {{location.regular_opening_hours}}
                                <table>
                                    <tbody>
                                        <tr v-for="(regularOpeningHour, index) in location.regular_opening_hours"
                                            :key="index"
                                            v-html="humanReadableRegularOpeningHour(regularOpeningHour)">
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        
                        <div class="card__services flex-col flex-col--12" v-if="service.has_induction_loop || service.has_wheelchair_access">
                            <img src="/assets/dist/img/access-icons/hearing-system.png" alt="Hearing System" v-if="service.has_induction_loop">
                            <img src="/assets/dist/img/access-icons/level-access-automatic-doors.png" alt="Level Access and Automatic Doors" v-if="service.has_wheelchair_access">
                            <img src="/assets/dist/img/access-icons/access-by-ramps-slopes-manual-doors.png" alt="Access by ramps, slopes and/or manual doors" v-if="service.has_wheelchair_access">
                        </div>
                    </div>
                </div>

                <div class="section__component" v-if="Object.keys(service.criteria).length === 0">
                    <h4 class="section__component__header">Who is this service for</h4>

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

                <div class="section__component" v-if="service.useful_infos.length > 0">
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
                        <div class="responsive-embed">
                            <vue-media-embed :source="service.video_embed" :auto-play="0" :allow-fullscreen="0" />
                        </div>
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
                <div class="section__component text-center tablet-hide">
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
                        
                        <div class="service__content ">
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
                            
                            <div class="service__social" v-if="service.social_medias.length > 0">
                                <a v-bind:href="social_media.url" v-for="social_media in service.social_medias"  :key="social_media.type">
                                    <i v-bind:class="['fab fa-' + social_media.type]"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card"></div>
                </div>
                
                <div class="section__component">
                    <div class="card card--border-blue card--reduce-padding">
                        <a v-bind:href="['/organisations/' + service.organisation.slug]">
                            <div class="card__content text-center">
                                <img :src="`https://ck-api-staging.cloudapps.digital/core/v1/organisations/${service.organisation.slug}/logo`" class="card__image">
                                <p class="sm-copy">{{ service.organisation.name }}</p>
                                <p class="sm-copy">{{ service.organisation.url }}</p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="section__component text-center">
                    <p class="sm-copy"><span class="color-grey">Page last updated</span> <em>{{ service.updated_at | moment("Do MMMM YYYY") }}</em></p>
                    <p class="sm-copy"><a v-on:click="giveFeedback">Give us feedback</a></p>
                </div>
            </div>
        </div>

        <feedback v-if="showFeedback" :service="service"></feedback>
    </section>
</template>
 
<script>
    // Import libraries
    import axios from 'axios'
    import moment from 'moment'
    import Showdown from 'showdown'

    // Import components
    import Feedback from './Feedback'
    
    export default {
        name: "service-main",
        components: {
            Feedback
        },
        data () {
            return {
                service: null,
                serviceLocations: null,
                showFeedback: false
            }
        },
        methods: {
            getSlug() {
                let pathArray = window.location.pathname.split('/');
                let slug = pathArray[2]

                return slug
            },
            getService() {
                axios
                .get('https://ck-api-staging.cloudapps.digital/core/v1/services/' + this.getSlug() + '?include=organisation')
                .then(response => (
                    // Store the service
                    this.service = response.data.data,

                    // Get the services locations
                    this.getServiceLocations()
                ))
                .catch(error => console.log(error))
            },
            getServiceLocations() {
                axios
                .get('https://ck-api-staging.cloudapps.digital/core/v1/service-locations?filter[service_id]='+ this.service.id +'&include=location')
                .then(response => (
                    // Store the services locations
                    this.serviceLocations = response.data.data
                ))
                .catch(error => console.log(error))
            },
            showDistance() {
                // Check local storage for geoloation authorization
                if(typeof localStorage['authorizedGeoLocation'] == "undefined" || localStorage['authorizedGeoLocation'] == "0" ) 
                    return false;
                else 
                    return true;
            },
            calculateDistance(lat, lon) {
                navigator.geolocation.getCurrentPosition((location) => {
                    let origin = location.coords.latitude + ', ' + location.coords.longitude;
                    let destination = lat + ', ' + lon;

                    let directionsService = new google.maps.DirectionsService();

                    let request = {
                        origin      : origin,
                        destination : destination,
                        travelMode  : google.maps.DirectionsTravelMode.DRIVING
                    };

                    directionsService.route(request, function(response, status) {
                        if ( status == google.maps.DirectionsStatus.OK ) {
                            return response.routes[0].legs[0].distance.value // the distance in metres
                        }
                        else {
                            return false
                        }
                    });
                })
                // return '0.3'
            },
            giveFeedback() {
                this.showFeedback = true
            },
            formatTime(time) {
                return moment(time, moment.HTML5_FMT.TIME_SECONDS).format(
                    moment.HTML5_FMT.TIME
                );
            },
            humanReadableRegularOpeningHour(openingHour) {
                switch (openingHour.frequency) {
                    case "weekly":
                    return `<td class="sm-copy">${this.weekday(openingHour.weekday)}</td><td>${this.timePeriod(openingHour)}</td>`;
                    case "monthly":
                    return `<td class="sm-copy">${this.dayOfMonth(openingHour.day_of_month)} of each month</td><td>${this.timePeriod(openingHour)}</td>`;
                    case "fortnightly":
                    return `<td class="sm-copy">Every other ${this.weekdayFromDate(openingHour.starts_at)}</td><td>${this.fortnightWeek(openingHour.starts_at)}) - ${this.timePeriod(openingHour)}</td>`;
                    case "nth_occurrence_of_month":
                    return `<td class="sm-copy">${this.dayOfMonth(openingHour.occurrence_of_month)}</td><td>${this.weekday(openingHour.weekday)} of each month</td>`;
                }
            },
            timePeriod(openingHour) {
                return `${this.formatTime(openingHour.opens_at)} to ${this.formatTime(openingHour.closes_at)}`;
            },
            weekday(weekday) {
                return moment(weekday, "E").format("dddd");
            },
            weekdayFromDate(date) {
                return moment(date, moment.HTML5_FMT.DATE).format("dddd");
            },
            dayOfMonth(dayOfMonth) {
                return moment(dayOfMonth, "D").format("Do");
            },
            fortnightWeek(date) {
                const daysInFortnight = 14;
                const thisSunday = moment().day(7);
                const diffInDays = moment(date, moment.HTML5_FMT.DATE).diff(thisSunday, "days");
                const remainingDays = Math.abs(diffInDays % daysInFortnight);

                return remainingDays > 6 ? "next calendar week" : "this calendar week";
            },
            toHtml(markdown) {
                const classMap = {
                    p: "color-grey",
                    a: "link",
                    h2: "h2",
                    h3: "h3"
                };

                const bindings = Object.keys(classMap).map(key => ({
                    type: "output",
                    regex: new RegExp(`<${key}>`, "g"),
                    replace: `<${key} class="${classMap[key]}">`
                }));

                const markdownToHtmlConverter = new Showdown.Converter({
                    extensions: [...bindings],
                    noHeaderId: true
                });

                return markdownToHtmlConverter.makeHtml(markdown);
            }
        },
        mounted () {
            this.getService()
        }
    }
</script>

<style scoped>
 
</style>
<template>
    <section id="main" class="section section--no-padding" v-if="service">
        <div class="flex-container">
            <div class="flex-col flex-col--7 flex-col--gutter">
                <div class="section__component">
                    <div class="card card--notification card--mint" v-if="service.is_free === true && $mq === 'mobile'">
                        <div class="card__icon"><i class="fa fa-pound-sign"></i></div>
                        <div class="card__content">
                            <p>Free</p>
                            <p class="sm-copy">This service costs no money.</p>
                        </div>
                    </div>
                </div>

                <div class="section__component" v-if="(service.criteria.age_group != null || service.criteria.disability != null || service.criteria.employment != null || service.criteria.gender != null || service.criteria.housing != null || service.criteria.income != null || service.criteria.language != null || service.criteria.other != null) && $mq === 'mobile'">
                    <h4 class="section__component__header">Who is this service for</h4>

                    <table class="table table--who-for">
                        <tbody>
                            <tr v-if="service.criteria.age_group">
                                <td class="text-center">Age group</td>
                                <td class="sm-copy">{{ service.criteria.age_group }}</td>
                            </tr>
                            <tr v-if="service.criteria.disability">
                                <td class="text-center">Disability</td>
                                <td class="sm-copy">{{ service.criteria.disability }}</td>
                            </tr>
                            <tr v-if="service.criteria.employment">
                                <td class="text-center">Text</td>
                                <td class="sm-copy">{{ service.criteria.employment }}</td>
                            </tr>
                            <tr v-if="service.criteria.gender">
                                <td class="text-center">Gender</td>
                                <td class="sm-copy">{{ service.criteria.gender }}</td>
                            </tr>
                            <tr v-if="service.criteria.housing">
                                <td class="text-center">Housing</td>
                                <td class="sm-copy">{{ service.criteria.housing }}</td>
                            </tr>
                            <tr v-if="service.criteria.income">
                                <td class="text-center">Income</td>
                                <td class="sm-copy">{{ service.criteria.income }}</td>
                            </tr>
                            <tr v-if="service.criteria.language">
                                <td class="text-center">Language</td>
                                <td class="sm-copy">{{ service.criteria.language }}</td>
                            </tr>
                            <tr v-if="service.criteria.other">
                                <td class="text-center">Other</td>
                                <td class="sm-copy">{{ service.criteria.other }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="section__component" v-if="service.description">
                    <h4 class="section__component__header">About</h4>

                    <div class="color-grey" v-html="toHtml(service.description)"></div>
                </div>

                <div class="section__component" v-if="$mq === 'mobile'">
                    <div class="service">
                        <div class="service__header">
                            <span>
                                <p class="service__name"><strong>Contact</strong></p>
                            </span>
                        </div>

                        <div class="service__content">
                            <div class="service__contact service__contact--telephone" v-if="service.contact_name">
                                <span class="sm-copy">
                                    <i class="fa fa-user" aria-hidden></i> Name
                                </span>
                                <p>{{ service.contact_name }}</p>
                            </div>

                            <div class="service__contact service__contact--telephone" v-if="service.contact_phone">
                                <span class="sm-copy">
                                    <i class="fa fa-phone" aria-hidden></i> Telephone
                                </span>
                                <p><a :href="`tel:`+phoneWithoutSpaces" @click.prevent="trackClicks" :data-event-category="service.name" :data-event-action="`Phone`" :data-event-label="service.contact_phone">{{ service.contact_phone }}</a></p>
                            </div>

                            <div class="service__contact service__contact--email" v-if="service.contact_email">
                                <span class="sm-copy">
                                    <i class="fa fa-envelope" aria-hidden></i> Email
                                </span>
                                <p><a :href="`mailto:`+service.contact_email" @click.prevent="trackClicks" :data-event-category="service.name" :data-event-action="`Email`" :data-event-label="service.contact_email">{{ service.contact_email }}</a></p>
                            </div>

                            <div class="service__contact service__contact--website" v-if="service.url">
                                <span class="sm-copy">
                                    <i class="fa fa-globe" aria-hidden></i>
                                    Website
                                </span>
                                <p><a :href="service.url" @click.prevent="trackClicks" :data-event-category="service.name" :data-event-action="`Web`" :data-event-label="toFriendlyURL(service.url)">{{ toFriendlyURL(service.url) }}</a></p>
                            </div>

                            <div class="service__social" v-if="service.social_medias.length > 0">
                                <a v-bind:href="social_media.url" v-for="social_media in service.social_medias" :key="social_media.type">
                                    <i v-bind:class="['fab fa-' + social_media.type]" aria-hidden></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section__component">
                    <h4 class="section__component__header">Where I can access this service</h4>

                    <div class="card card--grey card--location" v-if="service_locations && service_locations.length === 0">
                        <p class="card__location__name">
                            <strong>There is no set location for this service.</strong>
                        </p>
                        <p class="card__location__name">
                            You can access the service by using the contact details provided.
                        </p>
                    </div>

                    <div class="card card--grey card--location" v-for="location in service_locations" :key="location.id" v-if="service_locations && service_locations.length > 0">
                        <div class="card__location flex-col flex-col--6">
                            <p class="card__location__name" v-if="location.name"><strong>{{ location.name }}</strong></p>

                            <p class="card__location__address">
                                <span v-if="location.location.address_line_1">{{ location.location.address_line_1 }}</span>
                                <span v-if="location.location.address_line_2">{{ location.location.address_line_2 }}</span>
                                <span v-if="location.location.address_line_3">{{ location.location.address_line_3 }}</span>
                                <span v-if="location.location.county">{{ location.location.county }}</span>
                                <span v-if="location.location.postcode">{{ location.location.postcode }}</span>
                            </p>

                            <p class="card__location__distance sm-copy" v-if="showDistance()" v-text="calculateDistance(location.location.lat, location.location.lon)"></p>
                        </div>

                        <div class="card__hours flex-col flex-col--6" v-if="location && location.regular_opening_hours.length > 0">
                            <div class="card__hours__times">
                                <table>
                                    <tbody>
                                        <tr v-for="(regularOpeningHour, index) in orderedOpeningHours(location.regular_opening_hours)"
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

                <div class="section__component" v-if="(service.criteria.age_group != null || service.criteria.disability != null || service.criteria.employment != null || service.criteria.gender != null || service.criteria.housing != null || service.criteria.income != null || service.criteria.language != null || service.criteria.other != null) && $mq !== 'mobile'">
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
                                <td class="text-center">Employment</td>
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
                        <h4 class="card__title">Useful Information</h4>
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
                        <vue-media-embed :source="service.video_embed" :auto-play="0" :allow-fullscreen="0" />
                    </div>
                </div>

                <div class="section__component" v-if="service.testimonial">
                    <div class="quote">
                        <p class="quote__icons"><i class="fa fa-quote-left" aria-hidden></i> <i class="fa fa-quote-right" aria-hidden></i></p>
                        <p class="quote__quote"><strong>{{ service.testimonial }}</strong></p>
                    </div>
                </div>
            </div>

            <div class="flex-col flex-col--4 flex-col--tablet--5 flex-col--gutter">
                <div class="section__component text-center tablet-hide">
                    <a :href="`#print`" role="button" class="btn btn--secondary btn--icon-after">Print page <i class="fa fa-print" aria-hidden></i></a>
                </div>

                <div class="section__component">
                    <div class="card card--notification card--mint" v-if="service.is_free === true && $mq !== 'mobile'">
                        <div class="card__icon">
                            <i class="fa fa-pound-sign" aria-hidden title="Cost"></i>
                            <span class="sr-only">Cost</span>
                        </div>
                        <div class="card__content">
                            <p>Free</p>
                            <p class="sm-copy">This service costs no money.</p>
                        </div>
                    </div>

                    <div class="service" v-if="$mq !== 'mobile'">
                        <div class="service__header">
                            <span>
                                <p class="service__name"><strong>Contact</strong></p>
                            </span>
                        </div>

                        <div class="service__content">
                            <div class="service__contact service__contact--telephone" v-if="service.contact_name">
                                <span class="sm-copy">
                                    <i class="fa fa-user" aria-hidden></i> Name
                                </span>
                                <p>{{ service.contact_name }}</p>
                            </div>

                            <div class="service__contact service__contact--telephone" v-if="service.contact_phone">
                                <span class="sm-copy">
                                    <i class="fa fa-phone" aria-hidden></i> Telephone
                                </span>
                                <a :href="`tel:`+phoneWithoutSpaces" @click.prevent="trackClicks" :data-event-category="service.name" :data-event-action="`Phone`" :data-event-label="service.contact_phone">{{ service.contact_phone }}</a>
                            </div>

                            <div class="service__contact service__contact--email" v-if="service.contact_email">
                                <span class="sm-copy">
                                    <i class="fa fa-envelope" aria-hidden></i> Email
                                </span>
                                <a :href="`mailto:`+service.contact_email" @click.prevent="trackClicks" :data-event-category="service.name" :data-event-action="`Email`" :data-event-label="service.contact_email">{{ service.contact_email }}</a>
                            </div>

                            <div class="service__contact service__contact--website" v-if="service.url">
                                <span class="sm-copy">
                                    <i class="fa fa-globe" aria-hidden></i>
                                    Website
                                </span>
                                <a :href="service.url" @click.prevent="trackClicks" :data-event-category="service.name" :data-event-action="`Web`" :data-event-label="toFriendlyURL(service.url)">{{ toFriendlyURL(service.url) }}</a>
                            </div>

                            <div class="service__social" v-if="service.social_medias.length > 0">
                                <a v-bind:href="social_media.url" v-for="social_media in service.social_medias"  :key="social_media.type">
                                    <i v-bind:class="['fab fa-' + social_media.type]" aria-hidden></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section__component">
                    <div class="card card--border-blue card--reduce-padding">
                        <a v-bind:href="['/organisations/' + service.organisation.slug]">
                            <div class="card__content text-center">
                                <img :src="`${apiUri}/organisations/${service.organisation.id}/logo.png?v=${service.organisation.updated_at}`" :alt="service.name" class="card__image">
                                <p class="sm-copy">{{ service.organisation.name }}</p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="hide" v-bind:class="{show: service_locations != null && service_locations.length != 0}"></div>
                <div class="section__component leaflet">
                  <div class="map map--service">
                      <div id="map-container" class="map__container"></div>
                  </div>
                </div>



                <div class="section__component section__component--mobile-padding text-center">
                    <div class="page-meta">
                        <p class="sm-copy"><span class="color-grey">Page last updated</span> <em>{{ service.updated_at | moment("Do MMMM YYYY") }}</em></p>
                        <p class="sm-copy service-feedback"><a @click="giveFeedback" @keyup.enter="giveFeedback" role="button" tabindex="0">Give us feedback</a></p>
                    </div>
                </div>
            </div>
        </div>

        <feedback v-if="showFeedback"></feedback>
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
                finished: false,
                distance: null,
                service: null,
                service_locations: null,
                google_map_link: null,
                showFeedback: false,
                finished_loading: false,
                map: null,
                tileLayer: null,
                markers: [],
                layers: [
                    {
                        id: 0,
                        name: 'Services',
                        active: true,
                        features: [],
                    },
                ],
                green_icon: L.icon({
                    iconUrl: '/assets/dist/img/map/map-marker.svg',
                    iconSize:     [30, 40],
                    iconAnchor:   [15, 40],
                    popupAnchor:  [-3, -76]
                })
            }
        },
        methods: {
            orderedOpeningHours: function (openingHours) {
                return _.orderBy(openingHours, ['frequency', 'weekday'], ['asc', 'asc'])
            },
            getSlug() {
                let pathArray = window.location.pathname.split('/');
                let slug = pathArray[2]

                return slug
            },
            getService() {
                axios
                .get(`${this.apiUri}/services/${this.getSlug()}?include=organisation`)
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
                .get(`${this.apiUri}/service-locations?filter[service_id]=${this.service.id}&include=location`)
                .then(response => (
                    // Store the services locations
                    this.service_locations = response.data.data,

                    // // Build the google map link
                    this.buildGoogleMapUrl(),

                    // // Find the leaflet layers
                    this.findLayers(),

                    // // Create the leaflet map
                    this.initMap(),

                    // // Create the leaflet layers
                    this.initLayers(),

                    // Set finish loading
                    this.finished_loading = true
                ))
                .catch(error => console.log(error))
            },
            findLayers() {
                // Loop through the service locations
                this.service_locations.forEach((location) => {
                    // Push each service location to features array
                    this.layers[0].features.push({id: this.service.id, name: this.service.name, type: 'marker', coords: [location.location.lat, location.location.lon]});
                })
            },
            initMap() {
                this.map = L.map('map-container', {zoomControl: false}).setView([51.41233, -0.300689], 10)

                this.tileLayer = L.tileLayer('https://cartodb-basemaps-{s}.global.ssl.fastly.net/rastertiles/voyager/{z}/{x}/{y}.png',
                    {
                        maxZoom: 18
                    }
                )
                this.tileLayer.addTo(this.map)

                //this.map.dragging.disable();
                //this.map.touchZoom.disable();
                //this.map.doubleClickZoom.disable();
                //this.map.scrollWheelZoom.disable();
            },
            initLayers() {
                this.layers.forEach((layer) => {
                    const markerFeatures = layer.features.filter(feature => feature.type === 'marker');

                    markerFeatures.forEach((feature) => {
                        // Create marker
                        feature.leafletObject = L.marker(feature.coords, {id: feature.id, icon: this.green_icon})
                            .addTo(this.map)

                        // Push markers to array for use later
                        this.markers.push(feature.leafletObject)
                    });
                });

                let group = new L.featureGroup([this.markers]);

                this.map.fitBounds(group.getBounds());
            },
            buildGoogleMapUrl() {

                let locations = '';

                // Loop through the service locations
                this.service_locations.forEach((location) => {
                    // Push each service location to features array
                    locations += location.location.lon + ', ' + location.location.lat
                })

                // Set the google map link
                this.google_map_link = 'https://www.google.com/maps/search/?api=1&query=' + locations
            },
            showDistance() {
                // Check local storage for geoloation authorization
                if(typeof localStorage['authorizedGeoLocation'] == "undefined" || localStorage['authorizedGeoLocation'] == "0" )
                    return false;
                else
                    return true;
            },
            calculateDistance(lat2, lon2) {
                navigator.geolocation.getCurrentPosition((location) => {
                    let lat1 = location.coords.latitude;
                    let lon1 = location.coords.longitude;

                    let R = 6371; // km
                    //has a problem with the .toRad() method below.
                    let x1 = lat2-lat1;
                    let dLat = this.toRad(x1);
                    let x2 = lon2-lon1;
                    let dLon = this.toRad(x1);
                    let a = Math.sin(dLat/2) * Math.sin(dLat/2) + Math.cos(this.toRad(lat1)) * Math.cos(this.toRad(lat2)) * Math.sin(dLon/2) * Math.sin(dLon/2);
                    let c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
                    let d = R * c;

                    // Convert to miles
                    d /= 1.60934

                    let rounded = Math.round( d * 10 ) / 10
                    return rounded + ' miles away'
                });
            },
            toFriendlyURL(url) {
                return url.replace(/^(?:https?:\/\/)?(?:www\.)?/i, "");
            },
            toRad(item) {
                return item * Math.PI / 180;
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
                    return `<td class="sm-copy">Fortnightly on ${this.weekdayFromDate(openingHour.starts_at)}s</td><td>${this.fortnightWeek(openingHour.starts_at)} - ${this.timePeriod(openingHour)}</td>`;
                    case "nth_occurrence_of_month":
                    return `<td class="sm-copy">${this.nthOfMonth(openingHour.occurrence_of_month)}</td><td>${this.weekday(openingHour.weekday)} of each month</td>`;
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
            nthOfMonth(occurence) {
                if(occurence == 1) {
                    return "First"
                } else if(occurence == 2) {
                    return "Second"
                } else if(occurence == 3) {
                    return "Third"
                } else if(occurence == 4) {
                    return "Fourth"
                } else if(occurence == 5) {
                    return "Last"
                }
            },
            fortnightWeek(date) {
                const daysInFortnight = 14;
                const thisSunday = moment().day(7);
                const diffInDays = moment(date, moment.HTML5_FMT.DATE).diff(thisSunday, "days");
                const remainingDays = Math.abs(diffInDays % daysInFortnight);

                return remainingDays > 6 ? "next week" : "this week";
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
            // Get the service
            this.getService()
        },
        computed: {
            phoneWithoutSpaces() {
                return this.service.contact_phone.replace(/ /g, "");
            }
        }
    }
</script>

<style scoped>

</style>

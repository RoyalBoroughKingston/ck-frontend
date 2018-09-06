<template>
    <div>
        <section class="section section--header section--reduce-padding section--header--1">
            <div class="flex-container flex-container--align-bottom flex-container--mobile-no-padding">
                <div class="flex-col flex-col--7 flex-col--tablet--9">
                    <search-filter :type="'full'" :search_term="search_term" :location="location" :is_free="is_free" :wait_time="wait_time" v-if="!displayOption"></search-filter>
                    <search-header :header="returnHeader" v-if="displayOption"></search-header>
                </div>

                <div class="flex-col" v-if="$mq === 'desktop'">
                    <search-view :view="view" @setView="setViewParameter"></search-view>
                </div>
            </div>
        </section>
        
        <section id="results" class="section section--no-padding">
            <div class="flex-container flex-container--mobile-no-padding">
                <div :class="layoutClass">
                    <search-sort :location="location" :services_meta="services_meta" :view="view" @setView="setViewParameter"></search-sort>

                    <search-grid v-if="view === 'grid'" :services="services" :organisations="organisations" :locations="service_locations" :persona="persona" :category="category"></search-grid>
                    <search-map v-if="view === 'map' && services" :services="services" :organisations="organisations"></search-map>

                    <div class="loading-icon" v-if="!finished_loading"><div></div><div></div><div></div><div></div></div>
                </div>

                <div class="flex-col flex-col--3" v-if="displayOption && ($mq !== 'mobile' || $mq !== 'tablet')">
                    <search-filter :type="'sidebar'"></search-filter>
                </div>
            </div>
            
            <div class="pagination" v-if="last_page > 1 && view === 'grid'">
                <div class="flex-container">
                    <paginate
                        v-model="current_page"
                        :page-count="last_page"
                        :click-handler="doPagination"
                        :prev-text="'Prev'"
                        :next-text="'Next'"
                        :prev-class="'prev'"
                        :next-class="'next'">
                    </paginate>
                </div>
            </div>
        </section>
    </div>
</template>
 
<script>
    import axios from 'axios'
    import SearchFilter from './Search/SearchFilter'
    import SearchGrid from './Search/SearchGrid'
    import SearchHeader from './Search/SearchHeader'
    import SearchMap from './Search/SearchMap'
    import SearchSort from './Search/SearchSort'
    import SearchView from './Search/SearchView'
    
    export default {
        name: "search",
        components: {
            SearchFilter,
            SearchGrid,
            SearchHeader,
            SearchMap,
            SearchSort,
            SearchView
        },
        data () {
            return {
                finished_loading: false,
                current_page: 1,
                last_page: null,
                services: null,
                services_meta: null,
                organisations: [],
                service_locations: [],
                view: 'grid',
                search_term: null,
                location: null,
                location_coords: null,
                is_free: true,
                wait_time: null,
                sort_by: 'relevance',
                category: null,
                persona: null

            }
        },
        methods: {
            doPagination(pageNum) {
                // Update the current page
                this.current_page = pageNum,

                // Set finish loading
                this.services = null

                // Scroll to top of search results
                window.scrollTo({
                    top: this.getOffset(document.getElementById('results')).top - 32,
                    behavior: "smooth"
                }),

                // Set finish loading
                this.finished_loading = false,

                // Update the services
                this.updateServices()
            },
            getLocation() {
                axios
                .get('https://api.postcodes.io/postcodes/'+this.location)
                .then((response) => (
                    this.location_coords = { "lat": response.data.result.latitude, "lon": response.data.result.longitude },
                    this.updateServices()
                ))
                .catch((error) => {
                    window.alert(error.response.data.error + ': Please enter a different postcode and try again')

                    // Set finish loading
                    this.finished_loading = true
                })
            },
            updateServices() {
                // Set params
                let params = {};

                // Store params
                if(this.search_term !== null) params["query"] = this.search_term
                if(this.category !== null) params["category"] = this.category.name
                if(this.persona !== null) params["persona"] = this.persona.name
                if(this.is_free !== null) params["is_free"] = this.is_free
                if(this.sort_by !== null) params["order"] = this.sort_by
                if(this.wait_time !== null) params["wait_time"] = this.wait_time
                if(this.location_coords !== null) params["location"] = this.location_coords
                
                // Call the search endpoint with the params set
                axios
                .post('https://ck-api-staging.cloudapps.digital/core/v1/search?page='+this.current_page, params)
                .then(response => (
                    // Set the services
                    this.services = response.data.data,
                    // Set the services meta
                    this.services_meta = response.data.meta,
                    // Store the organisation ids
                    this.getOrganisations(),
                    // Set the current page so we can use it later
                    this.current_page = response.data.meta.current_page,
                    // Set the last page so we can use it later
                    this.last_page = response.data.meta.last_page
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
                    this.organisations = response.data.data,

                    // Now get the service locations
                    this.getServiceLocations()
                ))
                .catch(error => console.log(error))
            },
            getServiceLocations() {
                // Store organisation ids
                this.services.forEach(service => {
                   service.service_locations.forEach(location => {
                       this.service_locations.push(location.id)
                   })
                });

                // Do a request for organisations
                axios
                .get('https://ck-api-staging.cloudapps.digital/core/v1/service-locations?filter[id]=' + this.service_locations + '&include=location')
                .then(response => (
                    // Overwrite the organisations data model
                    this.service_locations = response.data.data,

                    // Set finish loading
                    this.finished_loading = true
                ))
                .catch(error => console.log(error))
            },
            getCategory() {
                axios
                .get('https://ck-api-staging.cloudapps.digital/core/v1/collections/categories/'+this.category)
                .then(response => (
                    // Store the category
                    this.category = response.data.data,
                    // Get the services
                    this.updateServices()
                ))
                .catch(error => console.log(error))
            },
            getPersona() {
                axios
                .get('https://ck-api-staging.cloudapps.digital/core/v1/collections/personas/'+this.persona)
                .then(response => (
                    // Store the category
                    this.persona = response.data.data,
                    // Get the services
                    this.updateServices()
                ))
                .catch(error => console.log(error))
            },
            getOffset(el) {
                var _x = 0;
                var _y = 0;
                while( el && !isNaN( el.offsetLeft ) && !isNaN( el.offsetTop ) ) {
                    _x += el.offsetLeft - el.scrollLeft;
                    _y += el.offsetTop - el.scrollTop;
                    el = el.offsetParent;
                }
                return { top: _y, left: _x };
            },
            setSearchParameters() {
                // Set search parameters
                if(this.getParameterByName('search_term') !== "") {
                    this.search_term = this.getParameterByName('search_term')
                }
                
                if(this.getParameterByName('location') !== "") {
                    this.location = this.getParameterByName('location')
                }

                if(this.getParameterByName('is_free') !== null) {
                    this.is_free = this.getParameterByName('is_free')
                } else {
                    this.is_free = false
                }
                this.is_free = (this.is_free === 'true')

                if(this.getParameterByName('wait_time') !== "") {
                    this.wait_time = this.getParameterByName('wait_time')
                } else {
                    this.wait_time = null
                }
                // Make sure null is not a string
                if(this.wait_time === 'null') {
                    this.wait_time = null
                }

                if(this.getParameterByName('category')) {
                    this.category = this.getParameterByName('category')
                }
                
                if(this.getParameterByName('persona')) {
                    this.persona = this.getParameterByName('persona')
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
            },
            setViewParameter(view) {
                this.view = view
            }
        },
        computed: {
            displayOption() {
                if(this.category || this.persona) {
                    return true
                } else {
                    return false
                }
            },
            layoutClass() {
                if(this.category || this.persona) {
                    return 'flex-col flex-col--9'
                } else {
                    return 'flex-col flex-col--12'
                }
            },
            returnHeader() {
                if(this.category) {
                    return this.category
                } else if(this.persona) {
                    return this.persona
                }
            }
        },
        mounted () {
            // Set search parameters
            this.setSearchParameters()

            // Check if category exists
            if(this.category) {
                this.getCategory()
            } else if(this.persona) {
                this.getPersona()
            } else {
                // Check if location needs to be found
                if(this.location !== null) {
                    // Then get the location
                    this.getLocation()
                } else {
                    // Get the services
                    this.updateServices()
                }
            }

            // Set the search view
            if(this.$cookies.get("ck_search_view")) this.view = this.$cookies.get("ck_search_view")
        }
    }
</script>
 
<style scoped>
 
</style>
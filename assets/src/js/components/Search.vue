<template>
    <div>
        <section class="section section--header section--header--reduce-padding section--header--1">
            <div class="flex-container flex-container--space flex-container--align-bottom">
                <div class="flex-col flex-col--7">
                    <search-form></search-form>
                </div>

                <div class="flex-col">
                    <search-view v-model="view"></search-view>
                </div>
            </div>
        </section>
        
        <section id="results" class="section section--no-padding">
            <search-sort v-bind:location="location"></search-sort>
            <search-grid v-if="view === 'grid'" v-bind:services="services"></search-grid>
            <search-map v-if="view === 'map' && services" v-bind:services="services"></search-map>
            
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
    import SearchForm from './Search/SearchForm'
    import SearchGrid from './Search/SearchGrid'
    import SearchMap from './Search/SearchMap'
    import SearchSort from './Search/SearchSort'
    import SearchView from './Search/SearchView'
    
    export default {
        name: "search",
        components: {
            SearchFilter,
            SearchForm,
            SearchGrid,
            SearchMap,
            SearchSort,
            SearchView
        },
        data () {
            return {
                current_page: 1,
                last_page: null,
                services: null,
                services_meta: null,
                view: 'map',
                search_term: null,
                location: null,
                location_coords: null,
                is_free: true,
                wait_time: null,
                sort_by: 'relevance'
            }
        },
        methods: {
            doPagination(pageNum) {
                this.current_page = pageNum
                this.updateServices()
                window.scrollTo({
                    top: this.getOffset(document.getElementById('results')).top - 32,
                    behavior: "smooth"
                });
            },
            getLocation() {
                axios
                .get('https://api.postcodes.io/postcodes/'+this.location)
                .then((response) => (
                    this.location_coords = { "lat": response.data.result.latitude, "lon": response.data.result.longitude },
                    this.updateServices()
                ))
                .catch(error => console.log(error))
            },
            updateServices() {
                // Set params
                let params = {};

                // Store params
                if(this.search_term !== null) params["query"] = this.search_term
                if(this.is_free !== null) params["is_free"] = Boolean(this.is_free)
                if(this.sort_by !== null) params["order"] = this.sort_by
                if(this.wait_time !== null) params["wait_time"] = this.wait_time
                if(this.location_coords !== null) params["location"] = this.location_coords

                // Call the search endpoint with the params set
                axios
                .post('https://ck-api-staging.cloudapps.digital/core/v1/search', params)
                .then(response => (
                    // Set the services
                    this.services = response.data.data,
                    // Set the services meta
                    this.services_meta = response.data.meta,
                    // Set the current page so we can use it later
                    this.current_page = response.data.meta.current_page,
                    // Set the last page so we can use it later
                    this.last_page = response.data.meta.last_page
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
            }
        },
        mounted () {
            // Check if location needs to be found
            if(this.location !== null) {
                // Then get the location
                this.getLocation()
            } else {
                // Get the services
                this.updateServices()
            }
        }
    }
</script>
 
<style scoped>
 
</style>
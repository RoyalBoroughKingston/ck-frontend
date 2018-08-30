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
            <search-sort></search-sort>
            <search-grid v-if="view === 'grid'" v-bind:services="services"></search-grid>
            <search-map v-if="view === 'map'" v-bind:services="services"></search-map>
            
            <div class="pagination">
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
                view: 'grid',
                search_term: null,
                location: null,
                cost: true,
                wait_time: null,
                sort_by: null
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
            updateServices() {
                axios
                .get('https://ck-api-staging.cloudapps.digital/core/v1/services?filter[name]='+this.search_term+'&include=organisation&page='+this.current_page)
                .then(response => (
                    // Set the services
                    this.services = response.data.data,
                    // Set the services meta
                    this.services_meta = response.data.meta,
                    // Set the current page so we can use it later
                    this.current_page = response.data.meta.current_page,
                    // Set the last page so we can use it later
                    this.last_page = response.data.meta.last_page,
                    // Call the filter services function
                    this.filterServices()
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
        computed: {
            filterServices() {
                // create a filtered array for filtering
                let filtered = this.services;

                // Store the filters in an array
                let filters = {
                    is_free: this.cost,
                    wait_time: this.wait_time
                };
                
                const filterKeys = Object.keys(filters);

                // Run the filter function on the services array and return filtered items
                filtered = this.services.filter((item) => {
                    return filterKeys.every(key => !!~filters[key].indexOf(item[key]));
                })

                // Changes services to filtered services
                this.services = filtered;
            }
        },
        mounted () {
            // Get the services
            this.updateServices()
        }
    }
</script>
 
<style scoped>
 
</style>
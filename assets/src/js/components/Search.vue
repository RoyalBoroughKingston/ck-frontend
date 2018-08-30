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
        
        <section class="section section--no-padding">
            <search-sort></search-sort>
            <search-grid v-if="view === 'grid'" v-bind:services="services"></search-grid>
            <search-map v-if="view === 'map'" v-bind:services="services"></search-map>
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
                services: null,
                view: 'grid',
                search_term: null,
                location: null,
                cost: null,
                wait_time: null,
                sort_by: null
            }
        },
        methods: {
            
        },
        mounted () {
            axios
            .get('https://ck-api-staging.cloudapps.digital/core/v1/services?filter[name]='+this.search_term)
            .then(response => (this.services = response.data))
            .catch(error => console.log(error))

            this.shortlist = this.$cookies.get("ck_shortlist")
        }
    }
</script>
 
<style scoped>
 
</style>
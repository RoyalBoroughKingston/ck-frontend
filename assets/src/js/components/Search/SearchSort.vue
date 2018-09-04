<template>
    <div class="search__sort flex-container flex-container--align-center flex-container--space">
        <div class="flex-col flex-col--4">
            <p class="sm-copy color-grey" v-if="services_meta">{{ services_meta.total }} service<span v-if="services_meta.total > 1 || services_meta.total === 0">s</span> found</p>
        </div>

        <div class="flex-col flex-col--8 text-right" v-if="showSort">
            <div class="field field--select">
                <label class="field__description">Sort results by:</label>
                <select class="select" @change="doSort">
                    <option v-bind:value="'relevance'">Relevance</option>
                    <option v-bind:value="'distance'">Distance</option>
                </select>
            </div>
        </div>
    </div>
</template>
 
<script>
    import axios from 'axios'
    
    export default {
        name: "search-sort",
        props: ['services_meta', 'location'],
        methods: {
            doSort(e) {
                this.$parent.sort_by = e.target.value,
                this.$parent.updateServices()
            },
            showSort() {
                // Check local storage for geoloation authorization
                if(typeof localStorage['authorizedGeoLocation'] == "undefined" || localStorage['authorizedGeoLocation'] == "0" ) 
                    return false;
                else 
                    return true;
            }
        }
    }
</script>
 
<style scoped>
 
</style>
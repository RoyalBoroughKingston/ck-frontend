<template>
    <div class="search__sort flex-container flex-container--align-center flex-container--space">
        <div class="flex-col">
            <p class="sm-copy color-grey">{{ this.$parent.services_meta.total }} service<span v-if="this.$parent.services_meta.total > 1 || this.$parent.services_meta.total === 0">s</span> found</p>
        </div>

        <div class="flex-col" v-if="location">
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
        props: ['location'],
        methods: {
            doSort(e) {
                this.$parent.sort_by = e.target.value,
                this.$parent.updateServices()
            }
        }
    }
</script>
 
<style scoped>
 
</style>
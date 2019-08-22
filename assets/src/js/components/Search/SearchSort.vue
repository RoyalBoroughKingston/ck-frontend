<template>

    <div class="search__sort flex-container flex-container--align-bottom" v-if="services_meta && services_meta.total > 0">
        <div class="flex-col flex-col--4 flex-col--tablet--6 flex-col--mobile--7">
            <p class="sm-copy color-grey" v-if="services_meta">{{ services_meta.total }} service<span v-if="services_meta.total > 1 || services_meta.total === 0">s</span> found</p>
            <search-view :view="view" v-if="$mq !== 'desktop'" @setView="setViewInParent"></search-view>
        </div>

        <div class="flex-col flex-col--8 flex-col--tablet--6 flex-col--mobile--5 text-right" v-if="location">
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
    import SearchView from './SearchView'
    
    export default {
        name: "search-sort",
        props: ['services_meta', 'location', 'view'],
        components: {
            SearchView
        },
        methods: {
            doSort(e) {
                this.$parent.sort_by = e.target.value,
                this.$parent.getLocation()
            },
            setViewInParent(value) {
                this.$emit('setView', value)
            }
        }
    }
</script>
 
<style scoped>
 
</style>
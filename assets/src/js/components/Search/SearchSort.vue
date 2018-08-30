<template>
    <div class="flex-container flex-container--align-center flex-container--space">
        <div class="flex-col">
            <p class="sm-copy color-grey">{{ this.$parent.services.length }} service<span v-if="this.$parent.services.length > 1 || this.$parent.services.length === 0">s</span> found</p>
        </div>

        <div class="flex-col">
            <div class="field field--select">
                <label class="field__description">Sort results by:</label>
                <select class="select" @change="doSort">
                    <option v-bind:value="'distance'">Distance</option>
                    <option v-bind:value="'a-z-services'">A-Z (services)</option>
                    <option v-bind:value="'a-z-organisations'">A-Z (organisations)</option>
                </select>
            </div>
        </div>
    </div>
</template>
 
<script>
    import axios from 'axios'
    
    export default {
        name: "search-sort",
        methods: {
            doSort(e) {
                console.log(e.target.value);
                if(e.target.value === 'a-z-services') {
                    this.sortByServiceArray()
                } else if(e.target.value === 'a-z-organisations') {
                    this.sortByOrganisationArray()
                }
            },
            sortByServiceArray() {
                // This returns an A-Z array of Services sorted by Service name
                function compare(a, b) {
                    if (a.name < b.name)
                        return -1;
                    if (a.name > b.name)
                        return 1;
                    return 0;
                }

                return this.$parent.services.sort(compare);
            },
            sortByOrganisationArray() {
                // This returns an A-Z array of Services sorted by Organisation name
                function compare(a, b) {
                    if (a.organisation.name < b.organisation.name)
                        return -1;
                    if (a.organisation.name > b.organisation.name)
                        return 1;
                    return 0;
                }

                return this.$parent.services.sort(compare);
            }
        }
    }
</script>
 
<style scoped>
 
</style>
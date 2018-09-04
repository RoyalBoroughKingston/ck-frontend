<template>
    <div id="grid" class="flex-container flex-container--no-padding">
        <div :class="layoutClass" v-for="service in services" :key="service.id">
            <service :type="'service'" :view="'grid'" :service="service" :organisation="getOrganisation(service.organisation_id)"></service>
        </div>
    </div>
</template>
 
<script>
    import axios from 'axios'
    import Service from '../Service'

    export default {
        name: "search-grid",
        props: ['services', 'organisations', 'persona', 'category'],
        components: {
            Service
        },
        methods: {
            getOrganisation(organisation_id) {
                for (var i = 0; i < this.organisations.length; i++) {
                    if (this.organisations[i]['id'] === organisation_id) {
                        return this.organisations[i];
                    }
                }
                return null;
            }
        },
        computed: {
            layoutClass() {
                if(this.category || this.persona) {
                    return 'flex-col flex-col--6 flex-col--gutter'
                } else {
                    return 'flex-col flex-col--4 flex-col--tablet--6 flex-col--gutter'
                }
            },
        }
    }
</script>
 
<style scoped>
 
</style>
<template>
    <div id="grid" class="flex-container flex-container--no-padding flex-container--mobile-padding flex-container--justify">
        <div :class="layoutClass" v-for="service in services" :key="service.id">
            <service :type="'service'" :view="'grid'" :service="service" :organisation="getOrganisation(service)" :location="getLocation(service)"></service>
        </div>
    </div>
</template>
 
<script>
    import axios from 'axios'
    import Service from '../Service'

    export default {
        name: "search-grid",
        props: ['services', 'organisations', 'locations', 'persona', 'category'],
        components: {
            Service
        },
        methods: {
            getOrganisation(service) {
                for (var i = 0; i < this.organisations.length; i++) {
                    if (this.organisations[i]['id'] === service.organisation_id) {
                        return this.organisations[i];
                    }
                }
                return null;
            },
            getLocation(service) {
                if(this.locations.length > 0)
                    for (var i = 0; i < this.locations.length; i++)
                        if(service.service_locations.length && service.service_locations[0].location_id !== undefined && this.locations[i].location_id !== undefined)
                            if (this.locations[i].location_id === service.service_locations[0].location_id)
                                var location = this.locations[i].location.address_line_1 + ', ' + this.locations[i].location.address_line_2
                                
                                if(service.service_locations.length > 1) {
                                    var locations_length = service.service_locations.length - 1

                                    if(service.service_locations.length > 2) {
                                        location += '<br><span class="sm-copy">and ' + locations_length + ' other location(s)</span>'
                                    } else {
                                        location += '<br><span class="sm-copy">and ' + locations_length + ' other location</span>'
                                    }
                                }

                                return location;
                            
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
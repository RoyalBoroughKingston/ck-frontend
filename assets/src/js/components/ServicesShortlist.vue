<template>
    <section class="section">
        <div class="flex-container">
            <div class="flex-col flex-col--12">
                <p class="sm-copy color-grey text-center">{{ services.length }} service<span v-if="services.length > 1 || services.length === 0">s</span> shortlisted</p>
            </div>
        </div>

        <div class="flex-container flex-container--justify">
            <div class="flex-col flex-col--4 flex-col--gutter" v-for="service in services" :key="service.id">
                <service :type="'shortlist'" :service.sync="service"></service>
            </div>
        </div>
    </section>
</template>
 
<script>
    import axios from 'axios'
    import Service from './Service'
    
    export default {
        name: "services-shortlist",
        components: {
            Service
        },
        data () {
            return {
                services: null,
                shortlist: null
            }
        },
        methods: {
            updateShortlist() {
                // Retrieve items in shortlist
                axios
                .get('https://ck-api-staging.cloudapps.digital/core/v1/services?filter[id]=' + this.shortlist)
                .then(response => (
                    this.services = response.data.data
                ))
                .catch(error => console.log(error))
            }
        },
        mounted () {
            // Get the shortlist
            this.shortlist = this.$cookies.get("ck_shortlist")
            
            this.updateShortlist()
        }
    }
</script>
 
<style scoped>
 
</style>
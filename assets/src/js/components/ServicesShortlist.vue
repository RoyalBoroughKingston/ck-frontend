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
            },
            getParameterByName(name, url) {
                if (!url) url = window.location.href;
                name = name.replace(/[\[\]]/g, '\\$&');
                var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                    results = regex.exec(url);
                if (!results) return null;
                if (!results[2]) return '';
                return decodeURIComponent(results[2].replace(/\+/g, ' '));
            }
        },
        mounted () {
            // Check if shortlist id's exist from sharing otherwise get cookie
            if(this.getParameterByName('ids')) {
                this.shortlist = this.getParameterByName('ids')
            } else {
                this.shortlist = this.$cookies.get("ck_shortlist")
            }
            
            this.updateShortlist()
        }
    }
</script>
 
<style scoped>
 
</style>
<template>
    <section class="section">
        <div class="flex-container">
            <div class="flex-col flex-col--12">
                <p class="sm-copy color-grey text-center">{{ services.data.length }} service<span v-if="services.data.length > 1 || services.data.length === 0">s</span> shortlisted</p>
            </div>
        </div>

        <div class="flex-container flex-container--justify">
            <div class="flex-col flex-col--4 flex-col--gutter" v-for="service in services.data" :key="service.id">
                <div class="service">
                    <div class="service__details">
                        <h4 class="service__name">{{ service.name }}</h4>
                        <p class="service__sub-title sm-copy">SPEAR</p>
                        <p class="service__description sm-copy">{{ service.description }}</p>
                    </div>

                    <div class="service__location">
                        <i class="fa fa-map-marker-alt"></i> <span class="service__location__name">Surbiton,Kingston</span>
                    </div>

                    <div class="service__contact service__contact--telephone" v-if="service.contact_phone">
                        <span class="sm-copy">
                            <i class="fa fa-phone"></i> Telephone
                        </span>
                        <p>{{ service.contact_phone }}</p>
                    </div>

                    <div class="service__contact service__contact--email" v-if="service.contact_email">
                        <span class="sm-copy">
                            <i class="fa fa-envelope"></i> Email
                        </span>
                        <p>{{ service.contact_email }}</p>
                    </div>

                    <div class="service__actions">
                        <a v-bind:href="['services/' + service.slug]" class="btn btn--small" role="button">View more <i class="fa fa-angle-right"></i></a>
                        <a v-on:click="removeFromShortlist" v-bind:data-id="service.id" class="btn btn--small btn--green" role="button">Remove <i class="fa fa-ban"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
 
<script>
    import axios from 'axios'
    
    export default {
        name: "services-shortlist",
        data () {
            return {
                services: null,
                shortlist: null
            }
        },
        methods: {
            removeFromShortlist(e) {
                console.log(e.currentTarget.getAttribute('data-id'), this.$cookies.get("ck_shortlist"))

                // Set shortlist data
                this.shortlist = this.shortlist.replace(e.currentTarget.getAttribute('data-id'), '')

                // Set shortlist cookie
                this.$cookies.set("ck_shortlist", this.shortlist)
                
                // retrieve new shortlist
                axios
                .get('https://ck-api-staging.cloudapps.digital/core/v1/services?filter[id]=' + this.shortlist)
                .then(response => (this.services = response.data))
                .catch(error => console.log(error))
            }
        },
        mounted () {
            // Get the shortlist
            this.shortlist = this.$cookies.get("ck_shortlist")
            
            // Retrieve items in shortlist
            axios
            .get('https://ck-api-staging.cloudapps.digital/core/v1/services?filter[id]=' + this.shortlist)
            .then(response => (this.services = response.data))
            .catch(error => console.log(error))
        }
    }
</script>
 
<style scoped>
 
</style>
<template>
    <div class="service">
        <div class="service__details" v-if="type === 'shortlist'">
            <h4 class="service__name">{{ service.name }}</h4>
            <p class="service__sub-title sm-copy">{{ organisation.name }}</p>
            <p class="service__description sm-copy">{{ service.description }}</p>
        </div>

        <div class="service__image" v-if="type === 'service'">
            <img :src="`https://ck-api-staging.cloudapps.digital/core/v1/services/${service.slug}/logo`" v-bind:title="service.name">
            
            <div class="service__add">
                <a v-if="!isInShortlist(service.id)" v-on:click="addToShortlist" v-bind:data-id="service.id" v:if.string.contains haystack="shortlist" needle="service.id" role="button" class="btn btn--small">Add to your shortlist <i class="fa fa-star"></i></a>
                <a v-if="isInShortlist(service.id)" v-on:click="addToShortlist" v-bind:data-id="service.id" v:if.string.contains haystack="shortlist" needle="service.id" role="button" class="btn btn--small btn--green">In your shortlist <i class="fa fa-star"></i></a>
            </div>
        </div>
        
        <div class="service__location" v-if="location">
            <i class="fa fa-map-marker-alt"></i> <span class="service__location__name">Surbiton,Kingston</span>
        </div>

        <div class="service__contact service__contact--telephone" v-if="type === 'shortlist' && service.contact_phone">
            <span class="sm-copy">
                <i class="fa fa-phone"></i> Telephone
            </span>
            <p>{{ service.contact_phone }}</p>
        </div>

        <div class="service__contact service__contact--email" v-if="type === 'shortlist' && service.contact_email">
            <span class="sm-copy">
                <i class="fa fa-envelope"></i> Email
            </span>
            <p>{{ service.contact_email }}</p>
        </div>
        
        <div class="service__meta" v-if="type === 'service'">
            <div class="service__meta__item sm-copy" v-if="service.is_free === true"><i class="fa fa-pound-sign"></i> Free</div>
            <div class="service__meta__item sm-copy" v-if="service.wait_time"><i class="fa fa-hourglass"></i> {{ returnWaitTime(service.wait_time) }}</div>
        </div>

        <div class="service__details" v-if="type === 'service'">
            <h4 class="service__name" v-if="service.name">{{ service.name }}</h4>
            <p class="service__sub-title sm-copy" v-if="organisation.name">{{ organisation.name }}</p>
            <p class="service__description sm-copy" v-if="service.description">{{ service.description }}</p>
            
            <div class="service__details__actions">
                <a v-bind:href="['/services/' + service.slug]" role="button" class="btn btn--small">View more <i class="fa fa-angle-right"></i></a>
                <a v-on:click="closeService" class="service__details__close link link--icon-after" role="button" v-if="view === 'map'">Close <i class="fa fa-times"></i></a>
            </div>
        </div>

        <div class="service__actions" v-if="type === 'shortlist'">
            <a v-bind:href="['services/' + service.slug]" class="btn btn--small" role="button">View more <i class="fa fa-angle-right"></i></a>
            <a v-on:click="removeFromShortlist" v-bind:data-id="service.id" class="btn btn--small btn--green" role="button">Remove <i class="fa fa-ban"></i></a>
        </div>
    </div>
</template>
 
<script>
    import axios from 'axios'
    
    export default {
        name: "service",
        props: ['type', 'view', 'service'],
        data () {
            return {
                organisation: null,
                location: null,
                shortlist: null
            }
        },
        methods: {
            getOrganisation() {
                axios
                .get('https://ck-api-staging.cloudapps.digital/core/v1/organisations/' + this.service.organisation_id)
                .then(response => (
                    this.organisation = response.data.data
                ))
                .catch(error => console.log(error))
            },
            getLocation() {
                // Get location for each service
            },
            getShortlist() {
                // Get the shortlist and store it in the data parameter
                this.shortlist = this.$cookies.get("ck_shortlist");
            },
            isInShortlist(id) {
                // Check if shortlist exists
                if(this.shortlist !== null) {
                    return this.shortlist.includes(id);
                } else {
                    return false;
                }
                
            },
            addToShortlist(e) {
                // Set shortlist cookie
                this.$cookies.set("ck_shortlist", this.$cookies.get("ck_shortlist") + ',' + e.currentTarget.getAttribute('data-id')),
                e.currentTarget.classList.add('btn--green'),
                e.currentTarget.innerHTML = 'In your shortlist <i class="fa fa-star"></i>'
            },
            removeFromShortlist(e) {
                // Set shortlist data
                this.$parent.shortlist = this.$parent.shortlist.replace(e.currentTarget.getAttribute('data-id'), '')

                // Set shortlist cookie
                this.$cookies.set("ck_shortlist", this.$parent.shortlist)
                
                // retrieve new shortlist
                this.$parent.updateShortlist()
            },
            closeService() {
                // Set the selected_panel_left property
                this.$parent.selected_panel_left = false

                // Unset previous marker icon
                document.querySelectorAll('.leaflet-marker-icon').forEach((marker) => {
                    marker.src="/assets/dist/img/map/map-marker.svg"
                })
            },
            returnWaitTime(value) {
                // Simple statement to format text for wait_time
                if (value === 'one_week') return "Up to one week"
                if (value === 'two_weeks') return "Up to two weeks"
                if (value === 'three_weeks') return "Up to three weeks"
                if (value === 'month') return "Up to one month"
                if (value === 'longer') return "May take longer"
            }
        },
        mounted () {
            // Get the shortlist
            this.getShortlist()

            // Get the organisation
            this.getOrganisation()
        }
    }
</script>
 
<style scoped>
 
</style>
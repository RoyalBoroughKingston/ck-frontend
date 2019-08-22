<template>
    <div class="service service--compact">

        <div class="service__shortlist">
            <button v-if="!isInShortlist(service.id)" v-on:click="addToShortlist" :data-id="service.id" needle="service.id" role="button" class="btn btn--secondary">Add to shortlist <i class="fa fa-star"></i></button>
            <button v-if="isInShortlist(service.id)" v-bind:href="'/shortlist'" :data-id="service.id" role="button" class="btn btn--secondary active">In shortlist <i class="fa fa-star" aria-hidden></i></button>
        </div>

        <div class="service__meta">
            <div class="service__meta__item sm-copy" v-if="service.is_free === true">
                <i class="fa fa-pound-sign" aria-hidden title="Cost"></i>
                <span class="sr-only">Cost</span>
                Free
            </div>
            <div class="service__meta__item sm-copy" v-if="service.wait_time">
                <i class="fa fa-hourglass" aria-hidden title="Wait time"></i>
                <span class="sr-only">Wait time</span>
                {{ returnWaitTime(service.wait_time) }}
            </div>
        </div>
        
        <div class="service__details">
            <h4 class="service__name" v-if="service.name">{{ service.name }}</h4>

            <div v-if="location">
                <p class="color-green"><i class="fa fa-map-marker-alt" aria-hidden title="Location"></i> &nbsp; <span v-html="location"></span></p>
            </div>

            <p class="service__sub-title sm-copy color-black" v-if="organisation">{{ organisation.name }}</p>
            <p class="service__description sm-copy color-black" v-if="service.description">{{ service.intro }}</p>
            
            <div class="service__details__actions">
                
                <a :href="['/services/' + service.slug]" role="button" class="btn btn--small">View more <i class="fa fa-angle-right" aria-hidden></i></a>

                <div class="service__image">
                    <img v-if="service.has_logo" :src="`${apiUri}/services/${service.id}/logo.png?v=${service.updated_at}`" :alt="service.name">
                    <img v-else :src="`${apiUri}/organisations/${service.organisation_id}/logo.png?v=${service.updated_at}`" :alt="service.name">
                </div>

            </div>

        </div>

    </div>
</template>
 
<script>
    import axios from 'axios'
    
    export default {
        name: "service-compact",
        props: ['service', 'location', 'organisation'],
        data () {
            return {
                location_length: null,
                shortlist: null
            }
        },
        methods: {
            getShortlist() {
                // Get the shortlist and store it in the data parameter
                this.shortlist = window.$cookies.get("ck_shortlist");
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
                let shortlist = window.$cookies.get("ck_shortlist") + ',' + e.currentTarget.getAttribute('data-id')
                window.$cookies.set("ck_shortlist", shortlist, null, '/')
                e.currentTarget.classList.add('btn--green')
                e.currentTarget.innerHTML = 'In your shortlist <i class="fa fa-star" aria-hidden></i>'
            },
            removeFromShortlist(e) {
                // Set shortlist data
                this.$parent.shortlist = this.$parent.shortlist.replace(e.currentTarget.getAttribute('data-id'), '')

                // Set shortlist cookie
                window.$cookies.set("ck_shortlist", this.$parent.shortlist)
                
                // retrieve new shortlist
                this.$parent.updateShortlist()
            },
            closeService() {
                // Set the selected_panel_left property
                this.$parent.selected_panel_left = false

                // Add noscroll class to body
                document.getElementsByTagName("body")[0].classList.remove('noscroll--mobile')

                // Unset previous marker icon
                Array.prototype.slice.call(document.querySelectorAll('.leaflet-marker-icon'), 0).forEach((marker) => {
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
        }
    }
</script>
 
<style scoped>
 
</style>

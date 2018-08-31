<template>
    <div class="service">
        <div class="service__details" v-if="type === 'shortlist'">
            <h4 class="service__name">{{ service.name }}</h4>
            <p class="service__sub-title sm-copy">{{ organisation.name }}</p>
            <p class="service__description sm-copy">{{ service.description }}</p>
        </div>

        <div class="service__image" v-if="type === 'service'">
            <img :src="`https://ck-api-staging.cloudapps.digital/core/v1/services/${service.slug}/logo`">
            
            <div class="service__add">
                <a v-on:click="addToShortlist" v-bind:data-id="service.id" v:if.string.contains haystack="shortlist" needle="service.id" role="button" v-bind:class="{'btn btn--small': isInShortlist(service.id),  'btn btn--small btn--green': !isInShortlist(service.id)}">
                    <span v-if="isInShortlist(service.id)">Add to </span>
                    <span v-if="isInShortlist(service.id)">In your </span>
                    shortlist <i class="fa fa-star"></i>
                </a>
            </div>
        </div>
        
        <div class="service__location">
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
            <a v-bind:href="['/services/' + service.slug]" role="button" class="btn btn--small">View more <i class="fa fa-angle-right"></i></a>
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
        props: ['type', 'service'],
        data () {
            return {
                organisation: null,
                location: null,
                shortlist: null
            }
        },
        methods: {
            getOrganisation() {
                console.log(this.service.organisation_id);
                axios
                .get('https://ck-api-staging.cloudapps.digital/core/v1/organisations/' + this.service.organisation_id)
                .then(response => (
                    this.organisation = response.data.data,
                    this.getServices()
                ))
                .catch(error => console.log(error))
            },
            getLocation() {

            },
            addToShortlist(e) {
                // Set shortlist cookie
                this.$cookies.set("ck_shortlist", this.$cookies.get("ck_shortlist") + ',' + e.currentTarget.getAttribute('data-id'))
            },
            removeFromShortlist(e) {
                console.log(e.currentTarget.getAttribute('data-id'), this.$cookies.get("ck_shortlist"))

                // Set shortlist data
                this.shortlist = this.shortlist.replace(e.currentTarget.getAttribute('data-id'), '')

                // Set shortlist cookie
                this.$cookies.set("ck_shortlist", this.shortlist)
                
                // retrieve new shortlist
                this.$parent.updateShortlist()
            }
        },
        mounted () {
            // Get the shortlist
            this.shortlist = this.$cookies.get("ck_shortlist")

            // Get the organisation
            this.getOrganisation()
        },
        computed: {
            isInShortlist(id) {
                console.log(id);
                let shortlist = this.$cookies.set("ck_shortlist");
                return shortlist.includes(id);
            },
            returnWaitTime(value) {
                if (value === 'one_week') return "Up to one week"
                if (value === 'two_weeks') return "Up to two weeks"
                if (value === 'three_weeks') return "Up to three weeks"
                if (value === 'month') return "Up to one month"
                if (value === 'longer') return "May take longer"
            }
        }
    }
</script>
 
<style scoped>
 
</style>
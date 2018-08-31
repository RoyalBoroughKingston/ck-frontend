<template>
    <div class="service">
        <div class="service__image">
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
        
        <div class="service__meta">
            <div class="service__meta__item sm-copy" v-if="service.is_free === true"><i class="fa fa-pound-sign"></i> Free</div>
            <div class="service__meta__item sm-copy" v-if="service.wait_time"><i class="fa fa-hourglass"></i> {{ service.wait_time }}</div>
        </div>

        <div class="service__details">
            <h4 class="service__name" v-if="service.name">{{ service.name }}</h4>
            <p class="service__sub-title sm-copy" v-if="organisation.name">{{ organisation.name }}</p>
            <p class="service__description sm-copy" v-if="service.description">{{ service.description }}</p>
            <a v-bind:href="['/services/' + service.slug]" role="button" class="btn btn--small">View more <i class="fa fa-angle-right"></i></a>
        </div>
    </div>
</template>
 
<script>
    import axios from 'axios'
    
    export default {
        name: "service",
        props: ['service'],
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
            }
        },
        mounted () {
            this.getOrganisation()
        },
        computed: {
            isInShortlist(id) {
                console.log(id);
                let shortlist = this.$cookies.set("ck_shortlist");
                return shortlist.includes(id);
            }
        }
    }
</script>
 
<style scoped>
 
</style>
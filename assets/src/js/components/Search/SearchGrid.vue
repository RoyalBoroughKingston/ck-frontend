<template>
    <div id="grid" class="flex-container flex-container--no-padding flex-container--justify">
        <div class="flex-col flex-col--4 flex-col--gutter" v-for="service in services" :key="service.id">
            <div class="service">
                <div class="service__image">
                    <img :src="`https://ck-api-staging.cloudapps.digital/core/v1/services/${service.slug}/logo`">
                    
                    <div class="service__add">
                        <a v-on:click="addToShortlist" v-bind:data-id="service.id" v:if.string.contains haystack="shortlist" needle="service.id" role="button" class="btn btn--small">Add to shortlist <i class="fa fa-star"></i></a>
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
                    <h4 class="service__name">{{ service.name }}</h4>
                    <p class="service__sub-title sm-copy">SPEAR</p>
                    <p class="service__description sm-copy">{{ service.description }}</p>
                    <a v-bind:href="['/services/' + service.slug]" role="button" class="btn btn--small">View more <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
</template>
 
<script>
    import axios from 'axios'
    
    export default {
        name: "search-grid",
        props: ['services'],
        methods: {
            addToShortlist(e) {
                console.log(e.currentTarget.getAttribute('data-id'), this.$cookies.get("ck_shortlist"))

                // Set shortlist cookie
                this.$cookies.set("ck_shortlist", this.$cookies.get("ck_shortlist") + ',' + e.currentTarget.getAttribute('data-id'))
            }
        },
        mounted () {
            
        }
    }
</script>
 
<style scoped>
 
</style>
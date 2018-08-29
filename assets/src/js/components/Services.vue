<template>
    <section class="section section--no-padding">
        <div class="flex-container flex-container--align-center flex-container--space">
            <div class="flex-col">
                <p class="sm-copy color-grey">{{ services.data.length }} service(s) found</p>
            </div>

            <div class="flex-col">
                <div class="field field--select">
                    <label class="field__description">Sort results by:</label>
                    <select class="select">
                        <option>Distance</option>
                    </select>
                </div>
            </div>
        </div>
        
        <div id="grid" class="flex-container flex-container--no-padding flex-container--justify" v-if="view === 'grid'">
            <div class="flex-col flex-col--4 flex-col--gutter" v-for="service in services.data" :key="service.id">
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

        <div id="map" class="flex-container" v-if="view === 'map'">
            <div class="flex-col flex-col--12">
                <div class="map">
                    <div class="map__overlay map__overlay--left">
                        <div class="service">
                            <div class="service__image">
                                <img src="https://picsum.photos/315/157" alt="Image title">
                                
                                <div class="service__add">
                                    <a href="#" class="btn btn--small" role="button">Add to shortlist <i class="fa fa-star"></i></a>
                                </div>
                            </div>
                        
                            <div class="service__location">
                                <i class="fa fa-map-marker-alt"></i>
                                <span class="service__location__name">Surbiton, Kingston</span>
                            </div>
                        
                            <div class="service__meta">
                                <div class="service__meta__item sm-copy">
                                    <i class="fa fa-pound-sign"></i> Free
                                </div>
                                <div class="service__meta__item sm-copy">
                                    <i class="fa fa-hourglass"></i> Up to 1 week
                                </div>
                            </div>
                        
                            <div class="service__details">
                                <h4 class="service__name">Fresh Start</h4>
                                <p class="service__sub-title sm-copy">SPEAR</p>
                                <p class="service__description sm-copy">Fresh Start is an early intervention, homelessness prevention programme which is outreach and community...</p>
                                <a href="#" class="btn btn--small" role="button">View more <i class="fa fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <div id="map-container" class="map__container"></div>

                    <div class="map__overlay map__overlay--right"></div>
                </div>
            </div>
        </div>
    </section>
</template>
 
<script>
    import axios from 'axios'
    
    export default {
        name: "services",
        data () {
            return {
                services: null,
                shortlist: null,
                view: 'map'
            }
        },
        methods: {
            addToShortlist(e) {
                console.log(e.currentTarget.getAttribute('data-id'), this.$cookies.get("ck_shortlist"))

                // Set shortlist cookie
                this.$cookies.set("ck_shortlist", this.$cookies.get("ck_shortlist") + ',' + e.currentTarget.getAttribute('data-id'))
            }
        },
        mounted () {
            axios
            .get('https://ck-api-staging.cloudapps.digital/core/v1/services')
            .then(response => (this.services = response.data))
            .catch(error => console.log(error))

            this.shortlist = this.$cookies.get("ck_shortlist")
        },
        computed: {
            isInShortlist(id) {
                return this.shortlist
            }
        }
    }
</script>
 
<style scoped>
 
</style>
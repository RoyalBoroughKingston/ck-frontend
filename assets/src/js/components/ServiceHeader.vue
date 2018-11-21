<template>
    <section class="section section--header section--header--reduce-padding section--header--3" v-if="finished_loading" role="banner">
        <vue-headful
            :title="`Connected Kingston - ` + service.name"
            :description="service.intro"
            :image="serviceLogo"
        />
        
        <div class="flex-container flex-container--align-center flex-container--mobile-no-padding" v-if="finished_loading">
            <div class="flex-col flex-col--8 flex-col--tablet--7 flex-col--gutter">
                <div class="title-card title-card--variant-1">
                    <h2 class="title-card__title" v-if="service">{{ service.name }}</h2>

                    <div class="title-card__description" v-if="service"> 
                        <p>{{ service.intro }}</p>
                    </div>

                    <div class="title-card__action text-center service-actions" v-if="$mq === 'mobile'">
                        <a v-if="service && !isInShortlist(service.id)" v-on:click="addToShortlist" :data-id="service.id" role="button" class="btn btn--small">Add to your shortlist <i class="fa fa-star" aria-hidden></i></a>
                        <a v-if="service && isInShortlist(service.id)" v-bind:href="'/shortlist'" :data-id="service.id" role="button" class="btn btn--small btn--green">In your shortlist <i class="fa fa-star" aria-hidden></i></a>

                        <a :href="['/referral?service=' + service.id]" class="btn btn--icon-after" v-if="service && service.referral_method !== 'none'">{{ service.referral_button_text }} <i class="fa fa-arrow-right" aria-hidden></i></a>
                        <p v-if="service && service.referral_method === 'none'"><strong>Please contact the service directly</strong></p>
                    </div>
                </div>
            </div>

            <div class="flex-col flex-col--4 flex-col--tablet--5 flex-col--gutter service-actions" v-if="$mq !== 'mobile'">
                <div class="title-card title-card--reduce-padding title-card--service text-center">
                    <div class="title-card__action">
                        <a v-if="service && !isInShortlist(service.id)" v-on:click="addToShortlist" :data-id="service.id" role="button" class="btn btn--small">Add to your shortlist <i class="fa fa-star" aria-hidden></i></a>
                        <a v-if="service && isInShortlist(service.id)" v-bind:href="'/shortlist'" :data-id="service.id" role="button" class="btn btn--small btn--green">In your shortlist <i class="fa fa-star" aria-hidden></i></a>

                        <a :href="['/referral?service=' + service.id]" class="btn btn--icon-after" v-if="service && service.referral_method !== 'none'">{{ service.referral_button_text }} <i class="fa fa-arrow-right" aria-hidden></i></a>
                        <p v-if="service && service.referral_method === 'none'"><strong>Please contact the service directly</strong></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="section__anchor text-center">
            <a href="#main" class="scroll-to-anchor">
                <p>
                    <strong>Find out more</strong><br>
                    <i class="fa fa-angle-down" aria-hidden></i>
                </p>
            </a>
        </div>
    </section>
</template>
 
<script>
    import axios from 'axios'
    
    export default {
        name: "service-header",
        data () {
            return {
                service: null,
                shortlist: window.$cookies.get("ck_shortlist"),
                finished_loading: false
            }
        },
        computed: {
            serviceLogo() {
                if(this.service.has_logo) {
                    return `{process.env.MIX_API_URI}/services/${this.service.id}/logo.png?v=${this.service.updated_at}`
                } else {
                    return `{process.env.MIX_API_URI}/organisations/${this.service.organisation_id}/logo.png?v=${this.service.updated_at}`
                }
            }
        },
        methods: {
            getSlug() {
                let pathArray = window.location.pathname.split('/');
                let slug = pathArray[2]

                return slug
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
            }
        },
        mounted () {
            axios
            .get(`${process.env.MIX_API_URI}/services/${this.getSlug()}`)
            .then(response => (
                // Set the service
                this.service = response.data.data,

                // Set finish loading
                this.finished_loading = true
            ))
            .catch(error => console.log(error))
        }
    }
</script>
 
<style scoped>
 
</style>

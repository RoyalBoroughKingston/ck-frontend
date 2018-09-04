<template>
    <div class="flex-container flex-container--space flex-container--align-center flex-container--mobile-no-padding">
        <div class="flex-col flex-col--8 flex-col--gutter">
            <div class="title-card title-card--variant-0">
                <h2 class="title-card__title">{{ service.name }}</h2>

                <div class="title-card__description"> 
                    <p>{{ service.intro }}</p>
                </div>
            </div>
        </div>

        <div class="flex-col flex-col--4 flex-col--gutter">
            <div class="title-card title-card--reduce-padding title-card--service text-center">
                <div class="title-card__action">
                    <p>
                        <a v-if="!isInShortlist(service.id)" v-on:click="addToShortlist" v-bind:data-id="service.id" role="button" class="btn btn--small">Add to your shortlist <i class="fa fa-star"></i></a>
                        <a v-if="isInShortlist(service.id)" v-bind:href="'/shortlist'" v-bind:data-id="service.id" role="button" class="btn btn--small btn--green">In your shortlist <i class="fa fa-star"></i></a>
                    </p>
                    <p v-if="service.referral_method !== 'interal'"><a v-bind:href="['/referral?service=' + service.id]" class="btn btn--icon-after">{{ service.referral_button_text }} <i class="fa fa-arrow-right"></i></a></p>
                    <p v-if="service.referral_method === 'interal'"><strong>Please contact the service directly</strong></p>
                </div>
            </div>
        </div>
    </div>
</template>
 
<script>
    import axios from 'axios'
    
    export default {
        name: "service-header",
        data () {
            return {
                service: null,
                shortlist: null
            }
        },
        methods: {
            getSlug() {
                let pathArray = window.location.pathname.split('/');
                let slug = pathArray[2]

                return slug
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
                let shortlist = window.$cookies.get("ck_shortlist") + ',' + e.currentTarget.getAttribute('data-id')
                this.$cookies.set("ck_shortlist", shortlist,null, null, window.location.protocol + "//" + window.location.host)
                e.currentTarget.classList.add('btn--green')
                e.currentTarget.innerHTML = 'In your shortlist <i class="fa fa-star"></i>'
            },
            removeFromShortlist(e) {
                // Set shortlist data
                this.$parent.shortlist = this.$parent.shortlist.replace(e.currentTarget.getAttribute('data-id'), '')

                // Set shortlist cookie
                window.$cookies.set("ck_shortlist", this.$parent.shortlist)
                
                // retrieve new shortlist
                this.$parent.updateShortlist()
            }
        },
        mounted () {
            axios
            .get('https://ck-api-staging.cloudapps.digital/core/v1/services/' + this.getSlug())
            .then(response => (this.service = response.data.data))
            .catch(error => console.log(error))

            // Get the shortlist
            this.getShortlist()
        }
    }
</script>
 
<style scoped>
 
</style>
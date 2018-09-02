<template>
    <div class="flex-container flex-container--space flex-container--mobile-no-padding">
        <div class="flex-col flex-col--8 flex-col--gutter">
            <div class="title-card title-card--variant-0">
                <h2 class="title-card__title">{{ service.name }}</h2>

                <div class="title-card__description"> 
                    <p>{{ service.intro }}</p>
                </div>
            </div>
        </div>

        <div class="flex-col flex-col--4 flex-col--gutter">
            <div class="title-card title-card--service text-center">
                <div class="title-card__action">
                    <p><a href="#" class="btn btn--green btn--small btn--icon-after">Shortlist <i class="fa fa-star"></i></a></p>
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
                service: null
            }
        },
        methods: {
            getSlug() {
                let pathArray = window.location.pathname.split('/');
                let slug = pathArray[2]

                return slug
            }
        },
        mounted () {
            axios
            .get('https://ck-api-staging.cloudapps.digital/core/v1/services/' + this.getSlug())
            .then(response => (this.service = response.data.data))
            .catch(error => console.log(error))
        }
    }
</script>
 
<style scoped>
 
</style>
<template>
    <section class="section">
        <div class="flex-container flex-container--space">
            <div class="flex-col flex-col--7 flex-col--gutter">
                <intro v-bind:type="type" v-bind:service="service" v-if="step === 1"></intro>
                <who v-bind:type="type" v-bind:service="service" v-if="step === 2" v-bind:who_for="who_for"></who>
                {{who_for}}
            </div>

            <div class="flex-col flex-col--3">
                <div class="service">
                    <div class="service__header">
                        <span>
                            <p class="service__name"><strong>Referring to</strong></p>
                            <p class="service__sub-title sm-copy mobile-show">{{ service.organisation.name }}</p>
                        </span>
                        <span class="mobile-show"><i class="fa fa-angle-down"></i></span>
                    </div>
                    <div class="service__image">
                        <img :src="`https://ck-api-staging.cloudapps.digital/core/v1/services/${service.slug}/logo`" v-bind:title="service.name">
                    </div>

                    <div class="service__details">
                        <h4 class="service__name">{{ service.name }}</h4>
                        <p class="service__sub-title sm-copy">{{ service.organisation.name }}</p>
                        <p class="service__description sm-copy">{{ service.intro }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
 
<script>
    import axios from 'axios'
    import Intro from './Referral/Intro'
    import Who from './Referral/Who'
    
    export default {
        name: "referral",
        components: {
            Intro,
            Who
        },
        data() {
            return {
                type: null,
                service: null,
                step: 2,
                who_for: null,
                referral: {
                    name: null,
                    email: null,
                    phone: null,
                    other_contact: null,
                    postcode_outward_code: null,
                    comments: null,
                    referral_consented: true,
                    feedback_consented: false,
                    referee_name: null,
                    referee_email: null,
                    referee_phone: null,
                    organisation_taxonomy_id: null,
                    organisation: null
                }
            }
        },
        methods: {
            getService() {
                axios
                .get('https://ck-api-staging.cloudapps.digital/core/v1/services/' + this.getParameterByName('service') + '?include=organisation')
                .then(response => (
                    this.service = response.data.data,
                    this.type = response.data.data.referral_method
                ))
                .catch(error => console.log(error))
            },
            getParameterByName(name, url) {
                if (!url) url = window.location.href;
                name = name.replace(/[\[\]]/g, '\\$&');
                var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                    results = regex.exec(url);
                if (!results) return null;
                if (!results[2]) return '';
                return decodeURIComponent(results[2].replace(/\+/g, ' '));
            },
            setStep(step) {
                this.step = step
                console.log(this.who_for, this.referral)
            }
        },
        mounted() {
            // Set the referral type
            this.type = this.getParameterByName('type')

            // Get the service for referral
            this.getService()
        }
    }
</script>
 
<style scoped>
 
</style>
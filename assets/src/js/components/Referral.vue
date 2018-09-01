<template>
    <section id="referral" class="section">
        <div class="flex-container flex-container--space">
            <div :class="layoutClass">
                <intro v-bind:type="type" v-bind:service="service" v-if="step === 1"></intro>
                <who v-bind:type="type" v-bind:service="service" v-bind:who_for="who_for" v-if="step === 2"></who>
                <you v-bind:step="internal_step" v-bind:steps="internal_steps" v-if="checkYou"></you>
                <client v-bind:step="internal_step" v-bind:steps="internal_steps" v-if="checkClient"></client>
                <consent v-bind:step="internal_step" v-bind:steps="internal_steps" v-if="checkConsent"></consent>
                <complete v-bind:service="service" v-if="step === 'complete'"></complete>
            </div>

            <div class="flex-col flex-col--3" v-if="step !== 'complete'">
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
    import You from './Referral/You'
    import Client from './Referral/Client'
    import Consent from './Referral/Consent'
    import Complete from './Referral/Complete'
    
    export default {
        name: "referral",
        components: {
            Intro,
            Who,
            You,
            Client,
            Consent,
            Complete
        },
        data() {
            return {
                type: null,
                service: null,
                step: 1,
                internal_step: 1,
                internal_steps: null,
                who_for: null,
                referral: {
                    service_id: this.getParameterByName('service'),
                    name: null,
                    email: null,
                    phone: null,
                    other_contact: null,
                    postcode_outward_code: null,
                    comments: null,
                    referral_consented: false,
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
                    this.type = response.data.data.referral_method,
                    this.referral.organisation = response.data.data.organisation.name
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

                console.log(this.referral)

                // Scroll to top of form
                window.scrollTo({
                    top: this.getOffset(document.getElementById('referral')).top - 32,
                    behavior: "smooth"
                });
            },
            getOffset(el) {
                var _x = 0;
                var _y = 0;
                while( el && !isNaN( el.offsetLeft ) && !isNaN( el.offsetTop ) ) {
                    _x += el.offsetLeft - el.scrollLeft;
                    _y += el.offsetTop - el.scrollTop;
                    el = el.offsetParent;
                }
                return { top: _y, left: _x };
            }
        },
        computed: {
            checkYou() {
                // Check what step and who its for
                if(this.step === 3 && this.who_for === 'myself') {
                    this.internal_steps = 3
                    return true
                } else {
                    return false
                }
            },
            checkClient() {
                // Check what step and assign internal_step
                if(this.step === 4) this.internal_step = 2
                else if(this.step === 3) this.internal_step = 1

                if((this.step === 4 && this.who_for === 'myself')) this.internal_steps = 3
                else if((this.step === 3 && this.who_for === 'someone_else')) this.internal_steps = 2

                // Check what step and who its for
                if((this.step === 4 && this.who_for === 'myself') || (this.step === 3 && this.who_for === 'someone_else')) {
                    return true
                } else {
                    return false
                }
            },
            checkConsent() {
                // Check what step and assign internal_step
                if(this.step === 5 && this.who_for === 'someone_else') this.internal_step = 2
                else if(this.step === 5) this.internal_step = 3

                if((this.step === 6 && this.who_for === 'myself')) this.internal_steps = 3
                else if((this.step === 5 && this.who_for === 'someone_else')) this.internal_steps = 2

                // Check what step and who its for
                if((this.step === 5 && this.who_for === 'myself') || (this.step === 5 && this.who_for === 'someone_else')) {
                    return true
                } else {
                    return false
                }
            },
            layoutClass() {
                if(this.step === 'complete') {
                    return 'flex-col flex-col--12 flex-col--gutter'
                } else {
                    return 'flex-col flex-col--7 flex-col--gutter'
                }
            },
        },
        mounted() {
            // Set the referral type
            this.type = this.getParameterByName('type')

            if(!this.getParameterByName('service')) window.location.href = '/'

            // Get the service for referral
            this.getService()
        }
    }
</script>
 
<style scoped>
 
</style>
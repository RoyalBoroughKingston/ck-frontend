<template>
    <div>
        <div v-if="type === 'external'">
            <p>You have requested to be connected with <strong>{{ service.name }} - {{ service.organisation.name }}</strong>. In order to make a referral you will be directed to the service's own referral system.</p>
        </div>
        
        <div v-if="type === 'internal'">
            <p>You have requested to be connected with <strong>{{ service.name }} - {{ service.organisation.name }}</strong>.</p>
            <p>Within 10 working days of this form being submitted, <strong>{{ service.name }}</strong> will contact you about accessing the service.</p>
            <p>We need to collect some basic information from you in order to process your request. Please click 'Continue' below to begin.</p>
        </div>
        
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        
        <p class="sm-copy color-grey" v-if="type === 'external'">You are about to <strong>leave Connected Kingston</strong> and be redirected to an external website.</p>
        <p class="sm-copy color-grey" v-if="type === 'internal'">The form should take <strong>no longer than 5 minutes</strong> to complete.</p>

        <a v-bind:href="service.referral_url" role="button" class="btn btn--icon-after" target="_blank" v-if="type === 'external'">Continue <i class="fa fa-angle-right" aria-hidden></i></a>
        <button v-on:click="setConsent" role="button" class="btn btn--icon-after" target="_blank" v-if="type === 'internal'">Continue <i class="fa fa-angle-right" aria-hidden></i></button>
    </div>
</template>
 
<script>
    import axios from 'axios'
    
    export default {
        name: "intro",
        props: ['type', 'service'],
        methods: {
            setConsent() {
                this.$parent.referral.referral_consented = true
                this.updateStep(2)
            },
            updateStep(step) {
                this.$parent.setStep(step);
            }
        }
    }
</script>
 
<style scoped>
 
</style>
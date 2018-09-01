<template>
    <div>
        <p v-if="type === 'external'">You have requested to be connected with <strong>{{ service.name }} - {{ service.organisation.name }}</strong>. In order to make a referral you will be redirected to the organisation’s own referral system.</p>
        <p v-if="type === 'internal'">You have requested to be connected with <strong>{{ service.name }} - {{ service.organisation.name }}</strong>. In order to make a referral you will be asked to complete a short form to collect some basic information which will then be sent directly to <strong>{{ service.name }}</strong> - who will then contact you directly.</p>
        
        <p>&nbsp;</p>
        
        <p class="sm-copy color-grey" v-if="type === 'external'">You are about to <strong>leave Connected Kingston</strong> and be redirected to an external website.</p>
        <p class="sm-copy color-grey" v-if="type === 'internal'">This form should take you <strong>no longer than 5 minutes</strong> to complete.</p>

        <a v-bind:href="service.referral_url" role="button" class="btn btn--icon-after" target="_blank" v-if="type === 'external'">Continue <i class="fa fa-angle-right"></i></a>
        <a v-on:click="updateStep(2)" role="button" class="btn btn--icon-after" target="_blank" v-if="type === 'internal'">Continue <i class="fa fa-angle-right"></i></a>
    </div>
</template>
 
<script>
    import axios from 'axios'
    
    export default {
        name: "intro",
        props: ['type', 'service'],
        methods: {
            updateStep(step) {
                this.$parent.setStep(step);
            }
        }
    }
</script>
 
<style scoped>
 
</style>
<template>
    <div>
        <div class="flex-container flex-container--no-padding">
            <div class="flex-col flex-col--12">
                <p>Step {{ step }} of {{ steps }}</p>
                <h2>Does the client give consent?</h2>
            </div>
        </div>

        <div class="flex-container flex-container--no-padding">
            <p>The details that you have entered in the previous steps will be shared with SPEAR who will directly contact you to lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque in odio massa.</p>
        </div>

        <div class="flex-container flex-container--no-padding">
            <div class="flex-col flex-col--12">
                <form class="form" v-on:submit="completeReferral">
                    <div class="flex-container flex-container--no-padding">
                        <div class="flex-col flex-col--12">
                            <p>&nbsp;</p>
                        </div>

                        <div class="field field--radio">
                            <div class="radio radio--stack">
                                <input type="radio" id="yes" class="input input--radio" name="referral_consented" v-on:click="setConsent" value="true"/>
                                <label for="yes"><span><span></span></span> I give consent</label>
                            </div>

                            <div class="radio radio--stack">
                                <input type="radio" id="no" class="input input--radio" name="referral_consented" v-on:click="setConsent" value="false" checked="checked"/>
                                <label for="no"><span><span></span></span> I do not give consent</label>
                            </div>
                        </div>
                    </div>

                    <div class="form__actions">
                        <button class="btn btn--icon-after" role="button">Continue <i class="fa fa-angle-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    import axios from 'axios'
    
    export default {
        name: "consent",
        props: ['step', 'steps'],
        data() {
            return {
                
            }
        },
        methods: {
            setConsent() {
                // Get the checked radio
                let radios = document.getElementsByName('referral_consented');

                for (var i = 0, length = radios.length; i < length; i++) {
                    if (radios[i].checked) {
                        // Set referral_consented in parent
                        this.$parent.referral.feedback_consented = radios[i].value
                        this.$parent.referral.feedback_consented = (this.$parent.referral.referral_consented === 'true')
                        break;
                    }
                }
            },
            completeReferral(e) {
                e.preventDefault()

                // Set the referral params
                let params = this.$parent.referral

                // Call the referral endpoint with the params set
                axios
                .post('https://ck-api-staging.cloudapps.digital/core/v1/referrals', params)
                .then(response => (
                    console.log(response),
                    this.updateStep(6)
                ))
                .catch(error => console.log(error))
            },
            showOther() {
                this.show_other = true
            },
            updateStep(step) {
                this.$parent.setStep(step);
            }
        }
    }
</script>
 
<style scoped>
 
</style>
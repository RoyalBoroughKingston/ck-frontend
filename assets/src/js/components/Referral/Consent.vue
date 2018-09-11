<template>
    <div>
        <div class="flex-container flex-container--no-padding">
            <div class="flex-col flex-col--12">
                <p>Step {{ step }} of {{ steps }}</p>
                <h2>How we will use this information</h2>
            </div>
        </div>

        <div class="flex-container flex-container--no-padding">
            <p>If you click ‘I agree’ below, you are consenting to the following:</p>
            <ul>
                <li>To have the information shared with <strong>{{ service.name }}</strong></li>
                <li>For [Service Name] or the Connected Kingston admin team to make contact regarding the connection</li>
            </ul>
            <p>For further information, please view our <a href="/privacy-policy" target="_blank">privacy policy</a>.</p>
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
                                <label for="yes"><span><span></span></span> I agree, please proceed with the connection to <strong>{{ service.name }}</strong></label>
                            </div>

                            <div class="radio radio--stack">
                                <input type="radio" id="no" class="input input--radio" name="referral_consented" v-on:click="setConsent" value="false" checked="checked"/>
                                <label for="no"><span><span></span></span> I do not agree, please take me back</label>
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
        props: ['service', 'step', 'steps', 'who_for'],
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
                // Check if they have consented the referral
                if(this.$parent.referral.feedback_consented) {
                    // Set the referral params
                    let params = this.$parent.referral

                    // Call the referral endpoint with the params set
                    axios
                    .post('https://ck-api-staging.cloudapps.digital/core/v1/referrals', params)
                    .then(response => (
                        // Store the referral callback
                        this.$parent.referral_callback = response.data.data,
                        
                        // Complete the referral
                        this.updateStep('complete')
                    ))
                    .catch(error => console.log(error))
                } else {
                    // Send the user back to the service page they are referring too
                    window.location.href = "/services/" + this.service.slug
                }
                
                e.preventDefault()
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
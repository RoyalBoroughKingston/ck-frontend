<template>
    <div>
        <div class="flex-container flex-container--no-padding">
            <div class="flex-col flex-col--12">
                <p>Step {{ step }} of {{ steps }}</p>
                <h2>About you</h2>
            </div>
        </div>

        <div class="flex-container flex-container--no-padding">
            <div class="flex-col flex-col--12">
                <form class="form" v-on:submit="setYou" role="form">
                    <div class="flex-container flex-container--no-padding">
                        <div class="field flex-col flex-col--8">
                            <label for="your_name">Name</label>
                            <input type="text" class="input input--text" name="referee_name" placeholder="Enter here" required/>
                        </div>

                        <div class="field field--select flex-col flex-col--8">
                            <label for="referee_organisation">What organisation are you with?</label>
                            
                            <select class="select" name="referee_organisation" required>
                                <option v-for="organisation in organisations" :key="organisation.id" :value="organisation.name">
                                    {{organisation.name}}
                                </option>
                            </select>

                            <p>&nbsp;</p>

                            <p><a v-on:click="showOther" class="link" v-if="!show_other">Cant see my organisation</a></p>
                            
                            <div v-if="show_other">
                                <label for="organisation_other">Other organisation</label>
                                <input type="text" class="input input--text" name="referee_organisation_other" placeholder="Enter here"/>
                            </div>

                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                        </div>
                    </div>

                    <div class="flex-container flex-container--no-padding">
                        <div class="flex-col flex-col--12">
                            <h4>How can we contact you?</h4>
                            <p class="color-grey">This information will be used to get in contact about problems, updates, and if any extra information is needed.</p>
                        </div>
                    </div>

                    <p>&nbsp;</p>

                    <div class="flex-container flex-container--no-padding">
                        <div class="field flex-col flex-col--8">
                            <label for="email">Email</label>
                            <input type="email" class="input input--text" name="referee_email" placeholder="Enter here">
                        </div>

                        <div class="field flex-col flex-col--8">
                            <label for="telephone">Telephone</label>
                            <input type="tel" class="input input--text" pattern="^\s*\(?(020[7,8]{1}\)?[ ]?[1-9]{1}[0-9{2}[ ]?[0-9]{4})|(0[1-8]{1}[0-9]{3}\)?[ ]?[1-9]{1}[0-9]{2}[ ]?[0-9]{3})\s*$" title="Please enter a valid UK phone number in the format '01234567890'." name="referee_phone" placeholder="Enter here"/>
                        </div>
                    </div>

                    <p>&nbsp;</p>
                    <p>&nbsp;</p>

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
        name: "you",
        props: ['service', 'step', 'steps'],
        data() {
            return {
                show_other: false,
                organisations: null
            }
        },
        methods: {
            getOrganisations() {
                axios
                .get('https://ck-api-staging.cloudapps.digital/core/v1/taxonomies/organisations?page=1')
                .then(response => (
                    // Store the service
                    this.organisations = response.data.data
                ))
                .catch(error => console.log(error))
            },
            setYou(e) {
                e.preventDefault()

                this.$parent.referral.referee_name = document.getElementsByName('referee_name')[0].value
                
                if(this.show_other) {
                    this.$parent.referral.referee_organisation = document.getElementsByName('referee_organisation_other')[0].value
                } else {
                    this.$parent.referral.referee_organisation = document.getElementsByName('referee_organisation')[0].value
                }

                this.$parent.referral.referee_email = document.getElementsByName('referee_email')[0].value
                this.$parent.referral.referee_phone = document.getElementsByName('referee_phone')[0].value

                // Updatee the step
                if(this.$parent.referral.referee_email || this.$parent.referral.referee_phone) {
                    this.updateStep(4)
                } else {
                    window.alert('You must enter at least a phone number or email')
                }
            },
            showOther() {
                this.show_other = true
            },
            updateStep(step) {
                this.$parent.setStep(step);
            }
        },
        mounted() {
            // Get the organisations
            this.getOrganisations()
        }
    }
</script>
 
<style scoped>
 
</style>
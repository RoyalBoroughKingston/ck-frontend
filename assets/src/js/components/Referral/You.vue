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
                            <input type="text" class="input input--text" name="referee_name" placeholder="Enter here" required v-focus/>
                        </div>

                        <div class="field field--select flex-col flex-col--8">
                            <label for="organisation_taxonomy_id">What organisation are you with?</label>
                            
                            <select class="select" name="organisation_taxonomy_id" :required="!show_other">
                                <option value="" disabled="disabled" selected="selected">Please select</option>
                                <option v-for="organisation in orderedOrganisations" :key="organisation.id" :value="organisation.id">
                                    {{organisation.name}}
                                </option>
                            </select>

                            <p>&nbsp;</p>

                            <p><a v-on:click="showOther" class="link" v-if="!show_other">I can't see my organisation</a></p>
                            
                            <div v-if="show_other">
                                <label for="organisation">Other organisation</label>
                                <input type="text" class="input input--text" name="organisation" placeholder="Enter here" :required="show_other"/>
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
                            <input type="email" class="input input--text" required name="referee_email" placeholder="Enter here">
                        </div>

                        <div class="field flex-col flex-col--8">
                            <label for="telephone">Telephone - (Must be a valid UK phone number)</label>
                            <input type="tel" class="input input--text" pattern="^(0(\s*[0-9]\s*){10})$" required title="Please enter a valid UK phone number in the format '01234567890'." name="referee_phone" placeholder="Enter here"/>
                        </div>
                    </div>

                    <p>&nbsp;</p>
                    <p>&nbsp;</p>

                    <div class="form__actions">
                        <button class="btn btn--icon-after" role="button">Continue <i class="fa fa-angle-right" aria-hidden></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    import axios from 'axios'
    import _ from 'lodash'

    export default {
        name: "you",
        props: ['service', 'step', 'steps'],
        data() {
            return {
                show_other: false,
                organisations: null
            }
        },
        computed: {
          orderedOrganisations: function () {
            return _.orderBy(this.organisations, 'name', 'asc')
          }
        },
        methods: {
            getOrganisations() {
                axios
                .get(`${this.apiUri}/taxonomies/organisations?page=1`)
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
                    this.$parent.referral.organisation = document.getElementsByName('organisation')[0].value
                } else {
                    this.$parent.referral.organisation_taxonomy_id = document.getElementsByName('organisation_taxonomy_id')[0].value
                }

                this.$parent.referral.referee_email = document.getElementsByName('referee_email')[0].value
                this.$parent.referral.referee_phone = document.getElementsByName('referee_phone')[0].value

                this.$parent.referral.referee_phone = this.$parent.referral.referee_phone.replace(/ /g, "")

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

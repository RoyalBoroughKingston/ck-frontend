<template>
    <div>
        <div class="flex-container flex-container--no-padding">
            <div class="flex-col flex-col--12">
                <p>Step {{ step }} of {{ steps }}</p>
                
                <h2 v-if="who_for === 'someone_else'">About the client</h2>
                <h2 v-if="who_for === 'myself'">About you</h2>
            </div>
        </div>

        <div class="flex-container flex-container--no-padding">
            <div class="flex-col flex-col--12">
                <form class="form" v-on:submit="setClient" role="form">
                    <div class="flex-container flex-container--no-padding">
                        <div class="field flex-col flex-col--8">
                            <label for="client_name">Name</label>
                            <input type="text" class="input input--text" name="name" placeholder="Enter here" required v-focus/>
                        </div>
                    </div>

                    <p>&nbsp;</p>

                    <div class="flex-container flex-container--no-padding">
                        <div class="flex-col flex-col--12" v-if="who_for === 'someone_else'">
                            <h2>How can we contact the client?</h2>
                            <p>Please provide an email address or phone number for us to contact the client. We will send an email or SMS confirmation once your connection has been made to the service.</p>
                            <p>{{service.name }} will contact the client using these details.</p>
                        </div>

                        <div class="flex-col flex-col--12" v-if="who_for === 'myself'">
                            <h4>How can we contact you?</h4>
                            <p>Please provide an email address and/or phone number for us to contact you. We will send an email or SMS confirmation once your connection has been made to the service.</p>
                            <p><strong>{{service.name }} will contact you using these details.</strong></p>
                        </div>
                    </div>

                    <p>&nbsp;</p>

                    <div class="flex-container flex-container--no-padding">
                        <div class="field flex-col flex-col--8" v-if="!show_other">
                            <label for="email">Email</label>
                            <input type="email" class="input input--text" name="email" placeholder="Enter here">
                        </div>

                        <div class="field flex-col flex-col--8" v-if="!show_other">
                            <label for="phone">Telephone - (Must be a valid UK phone number)</label>
                            <input type="tel" class="input input--text" pattern="^(0(\s*[0-9]\s*){10})$" title="Please enter a valid UK phone number in the format '01234567890'." name="phone" placeholder="Enter here"/>
                        </div>

                        <p v-if="!show_other"><a v-on:click="showOther" class="link">I can't provide an email/phone</a></p>

                        <div class="field flex-col flex-col--8" v-if="show_other">
                            <label for="other_contact">Other contact information</label>
                            <textarea class="input" name="other_contact"></textarea>
                        </div>

                    </div>

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
    
    export default {
        name: "client",
        props: ['service', 'step', 'steps', 'who_for'],
        data() {
            return {
                show_other: false,
                contact: 'email'
            }
        },
        methods: {
            setClient(e) {
                e.preventDefault()

                this.$parent.referral.name = document.getElementsByName('name')[0].value

                if(document.getElementsByName('email')[0]) {
                    if(document.getElementsByName('email')[0].value) this.$parent.referral.email = document.getElementsByName('email')[0].value
                }
                
                if(document.getElementsByName('phone')[0]) {
                    if(document.getElementsByName('phone')[0].value) this.$parent.referral.phone = document.getElementsByName('phone')[0].value
                }
                
                if(this.show_other) {
                    this.$parent.referral.other_contact = document.getElementsByName('other_contact')[0].value
                }

                this.$parent.referral.phone = this.$parent.referral.phone.replace(/ /g, "")

                // Updatee the step
                if(this.$parent.referral.email || this.$parent.referral.phone || this.$parent.referral.other_contact) {
                    this.updateStep(5)
                } else {
                    window.alert('You must enter one form of contact information e.g email, phone or other contact information')
                }
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
<template>
    <div>
        <div class="flex-container flex-container--no-padding">
            <div class="flex-col flex-col--12">
                <p>Step {{ step }} of {{ steps }}</p>
                <h2>About the client</h2>
            </div>
        </div>

        <div class="flex-container flex-container--no-padding">
            <div class="flex-col flex-col--12">
                <form class="form" v-on:submit="setClient">
                    <div class="flex-container flex-container--no-padding">
                        <div class="field flex-col flex-col--8">
                            <label for="client_name">Name</label>
                            <input type="text" class="input input--text" name="name" placeholder="Enter here" required/>
                        </div>
                    </div>

                    <p>&nbsp;</p>

                    <div class="flex-container flex-container--no-padding">
                        <div class="flex-col flex-col--12">
                            <h4>How can we contact the client?</h4>
                            <p class="color-grey">You have to input at least one contact information to continue</p>
                        </div>
                    </div>

                    <div class="flex-container flex-container--no-padding">
                        <div class="field field--radio">
                            <div class="radio radio--stack">
                                <input type="radio" id="email" class="input input--radio input--reveal" name="contact" value="email" v-on:click="setContact" checked="checked"/>
                                <label for="email"><span><span></span></span> Email</label>

                                <div class="radio__input" v-if="contact === 'email'">
                                    <input type="email" class="input input--text" name="email" placeholder="Enter here"/>
                                </div>
                            </div>

                            <div class="radio radio--stack">
                                <input type="radio" id="telephone" class="input input--radio input--reveal" name="contact" value="phone" v-on:click="setContact"/>
                                <label for="telephone"><span><span></span></span> Telephone</label>

                                <div class="radio__input" v-if="contact === 'phone'">
                                    <input type="tel" class="input input--text" name="phone" placeholder="Enter here"/>
                                </div>
                            </div>

                            <p><a v-on:click="showOther" class="link" v-if="!show_other">I can't provide an email/phone</a></p>

                            <div v-if="show_other">
                                <label for="other_contact">Other contact information</label>
                                <input type="text" class="input input--text" name="other_contact" placeholder="Enter here"/>
                            </div>
                        </div>
                    </div>

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
        name: "client",
        props: ['step', 'steps'],
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

                // Updatee the step
                if(this.$parent.referral.email || this.$parent.referral.phone || this.$parent.referral.other_contact) {
                    this.updateStep(5)
                } else {
                    window.alert('You must enter one form of contact information e.g email, phone or other contact information')
                }
            },
            setContact(e) {
                // Get the checked radio
                let radios = document.getElementsByName('contact');

                for (var i = 0, length = radios.length; i < length; i++) {
                    if (radios[i].checked) {
                        // Set who for in parent
                        this.contact = radios[i].value
                        break;
                    }
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
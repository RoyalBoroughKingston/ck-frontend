<template>
    <div class="modal" data-modal="main">
        <div class="valign">
            <div class="modal__wrapper">
                <a v-on:click="hideFeedback" class="modal__close">Close <i class="fa fa-times" aria-hidden></i></a>

                <div class="modal__header">
                    <h2 class="modal__title" v-if="!feedbackSubmitted">Submit your feedback</h2>
                    <h2 class="modal__title" v-if="feedbackSubmitted">Thank you!</h2>
                    <p class="lg-copy modal__description" v-if="feedbackSubmitted">Your feedback has been submitted to the Connected Kingston admin team.</p>
                </div>

                <div class="modal__content" v-if="!feedbackSubmitted">

                    <div class="field">
                      <label for="name">Name <span class='optional'>(optional)</span></label>
                      <input type="text" class="input input--text" name="name" v-model="name" />
                    </div>

                    <div class="field">
                      <label for="email">Email address <span class='optional'>(optional)</span></label>
                      <input type="email" class="input input--text" name="email" v-model="email" />
                    </div>

                    <div class="field">
                      <label for="phone">Phone number <span class='optional'>(optional)</span></label>
                      <input type="tel" class="input input--text" name="phone" v-model="phone" pattern="^\s*\(?(020[7,8]{1}\)?[ ]?[1-9]{1}[0-9{2}[ ]?[0-9]{4})|(0[1-8]{1}[0-9]{3}\)?[ ]?[1-9]{1}[0-9]{2}[ ]?[0-9]{3})\s*$" title="Please enter a valid UK phone number in the format '01234567890'." />
                    </div>

                    <div class="field">
                        <label for="message">Your feedback</label>
                        <textarea class="input input--textarea" name="message" v-model="message"></textarea>
                    </div>

                    <p>By submitting the above information, you consent to your data being used in accordance with our <a href="/privacy-policy" target="_blank">privacy policy</a>.</p>

                    <button v-on:click="submitFeedback" class="modal__cta btn" role="button"><span>Submit feedback</span></button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios'

    export default {
        name: "feedback",
        data() {
            return {
                name: null,
                email: null,
                phone: null,
                message: null,
                feedbackSubmitted: false
            }
        },
        methods: {
            submitFeedback() {
                let params = {
                  "url": window.location.href,
                  "name": this.name,
                  "email": this.email,
                  "phone": this.phone,
                  "feedback": this.message
                }

                console.log(params)

                axios
                .post(`${this.apiUri}/page-feedbacks`, params)
                .then(response => (
                    this.feedbackSubmitted = true
                ))
                .catch(error => console.log(error))
            },
            hideFeedback() {
                this.$parent.showFeedback = false
            }
          }
    }
</script>

<style scoped>

</style>

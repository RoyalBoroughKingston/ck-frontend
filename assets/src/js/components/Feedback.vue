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
                      <label for="name">Name</label>
                      <input type="text" class="input input--text" name="name" v-model="name" />
                    </div>

                    <div class="field">
                      <label for="email">Email Address</label>
                      <input type="email" class="input input--text" name="email" v-model="email" />
                    </div>

                    <div class="field">
                      <label for="telephone">Telephone Number</label>
                      <input type="tel" class="input input--text" name="telephone" v-model="telephone" />
                    </div>

                    <div class="field">
                        <label for="message">Your feedback</label>
                        <textarea class="input input--textarea" name="message" v-model="message"></textarea>
                    </div>

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
                telephone: null,
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
                  "telephone": this.telephone,
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

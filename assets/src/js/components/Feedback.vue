<template>
    <div class="modal" data-modal="main">
        <div class="valign">
            <div class="modal__wrapper">
                <a v-on:click="hideFeedback" class="modal__close">Close <i class="fa fa-times"></i></a>
              
                <div class="modal__header">
                    <h2 class="modal__title" v-if="!feedbackSubmitted">Submit your feedback</h2>
                    <h2 class="modal__title" v-if="feedbackSubmitted">Thank you!</h2>
                    <p class="lg-copy modal__description" v-if="feedbackSubmitted">Your feedback for <strong>{{service.name}}</strong> will greatly help to improve this service.</p>
                </div>
              
                <div class="modal__content" v-if="!feedbackSubmitted">
                    <div class="field">
                        <label for="message">Your feedback</label>
                        <textarea class="input input--textarea" name="message" v-model="message"></textarea>
                    </div>

                    <a v-on:click="submitFeedback" class="modal__cta btn" role="button"><span>Submit feedback</span></a>
                </div>
            </div>
        </div>
    </div>
</template>
 
<script>
    import axios from 'axios'
    
    export default {
        name: "feedback",
        props: ['service'],
        data() {
            return {
                message: null,
                feedbackSubmitted: false
            }
        },
        methods: {
            submitFeedback() {
                let params = {
                    "url": window.location.href,
                    "feedback": this.message
                }

                console.log(params)

                axios
                .post('https://ck-api-staging.cloudapps.digital/core/v1/page-feedbacks', params)
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
<template>
    <div class="banner">

        <p><i class="fas fa-info-circle"></i>This is a brand new website which we are continuing to work on – <a @click="giveFeedback" @keyup.enter="giveFeedback" role="button" tabindex="0">your feedback</a> will help us improve it.</p>

        <feedback v-if="showFeedback"></feedback>

    </div>
</template>
 
<script>

    // Import components
    import Feedback from './Feedback'
    
    export default {
        name: "banner",
        components: {
            Feedback
        },
        data () {
            return {
                showFeedback: false
            }
        },
        methods: {
            giveFeedback() {
                this.showFeedback = true
            }
        }
    }
</script>

<style scoped>
 
</style>
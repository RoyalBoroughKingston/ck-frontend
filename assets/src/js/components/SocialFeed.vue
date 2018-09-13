<template>
    <section class="section section--social-media mobile-hide" v-if="twitter || facebook">
        <div class="flex-container">
            <div class="flex-col flex-col--12">
                <h3>Hear from us</h3>
            </div>
        </div>

        <div class="flex-container flex-container--no-space text-center">
            <div class="flex-col flex-col--4" v-if="twitter">
                <div class="card card--white card--social">
                    <div class="card__header">
                        <div class="card__header__meta">
                            <p><strong>Connected Kingston</strong></p>
                            <p class="sm-copy"><span>@ConnectedKingtson</span> <span>21h</span></p>
                        </div>

                        <div class="card__header__icon">
                            <i class="fab fa-twitter"></i>
                        </div>
                    </div>

                    <div class="card__content">
                        <p class="sm-copy">We're proud to supporting the homeless, refugees and many more in the Kingston area. Find out more about becoming a Community Health Champion here 👉 <a href="#">https://t.co/3BFo2D0S3g</a></p>
                    </div>
                </div>
                
                <a href="#" role="button" class="btn btn--secondary">Follow us on twitter</a>
            </div>
            
            <div class="flex-col flex-col--2"></div>

            <div class="flex-col flex-col--4" v-if="facebook">
                <div class="card card--white card--social">
                    <div class="card__header">
                        <div class="card__header__meta">
                            <p><strong>Connected Kingston</strong></p>
                            <p class="sm-copy"><span>21h</span></p>
                        </div>

                        <div class="card__header__icon">
                            <i class="fab fa-facebook"></i>
                            </div>
                    </div>

                    <div class="card__content">
                        <p class="sm-copy">We're proud to supporting the homeless, refugees and many more in the Kingston area. Find out more about becoming a Community Health Champion here 👉 <a href="#">https://t.co/3BFo2D0S3g</a></p>
                    </div>
                </div>
                
                <a href="#" role="button" class="btn btn--secondary">Like us on facebook</a>
            </div>
        </div>
    </section>
</template>
 
<script>
    import axios from 'axios'
    
    export default {
        name: "social-feed",
        data() {
            return {
                twitter: null,
                facebook: null
            }
        },
        methods: {
            getTwitterFeed() {
                axios
                .get('https://api.twitter.com/1.1/statuses/user_timeline.json?screen_name=seanjessen&count=2')
                .then(response => (
                    console.log(response)
                ))
                .catch(error => console.log(error))
            }
        },
        mounted() {
            // Get twitter feed
            // this.getTwitterFeed()
        }
    }
</script>
 
<style scoped>
 
</style>
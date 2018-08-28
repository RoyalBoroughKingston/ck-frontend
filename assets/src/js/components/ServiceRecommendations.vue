<template>
    <div class="flex-container">
        <div class="flex-col flex-col--4" v-for="service in services.data" :key="service.id">
            <div class="pod">
                <a href="#">
                    <div class="pod__image">
                        <img src="https://picsum.photos/122/110" alt="People who are homeless (or at risk of)">

                        <div class="pod__content">
                            <p class="pod__title"><strong>{{ service.name }}</strong></p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</template>
 
<script>
    import axios from 'axios'
    
    export default {
        name: "service-recommendations",
        data () {
            return {
                services: null
            }
        },
        mounted () {
            axios
            .get('https://ck-api-staging.cloudapps.digital/core/v1/collections/personas?page=1')
            .then(response => (this.services = response.data))
            .catch(error => console.log(error))
        }
    }
</script>
 
<style scoped>
 
</style>
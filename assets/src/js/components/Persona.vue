<template>
    <div class="flex-container">
        <div class="flex-col flex-col--4" v-for="persona in personas.data" :key="persona.id">
            <div class="pod">
                <a v-bind:href="['/results?is_free=true&wait_time=null&persona=' + persona.id]">
                    <div class="pod__image">
                        <img :src="`https://ck-api-staging.cloudapps.digital/core/v1/collections/personas/${persona.id}/image`" v-bind:alt="persona.name">

                        <div class="pod__content">
                            <p class="pod__title"><strong>{{ persona.name }}</strong></p>
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
        name: "persona",
        data () {
            return {
                personas: null
            }
        },
        mounted () {
            axios
            .get('https://ck-api-staging.cloudapps.digital/core/v1/collections/personas')
            .then(response => (this.personas = response.data))
            .catch(error => console.log(error))
        }
    }
</script>
 
<style scoped>
 
</style>
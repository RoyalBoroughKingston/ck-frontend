<template>
    <section class="section section--header section--header--reduce-padding section--header--3">
        <div class="flex-container flex-container--space">
            <div class="flex-col flex-col--8 flex-col--gutter">
                <div class="title-card title-card--variant-0">
                    <h2 class="title-card__title">{{ organisation.name }}</h2>

                    <div class="title-card__description"> 
                        <p>{{ organisation.description }}</p>
                    </div>
                </div>
            </div>

            <div class="flex-col flex-col--4 flex-col--gutter" v-if="organisationLogo">
                <div class="title-card">
                    <div class="title-card__image">
                        <img src="https://picsum.photos/240/80">
                        </div>
                    </div>
            </div>
        </div>
    </section>
</template>
 
<script>
    import axios from 'axios'
    
    export default {
        name: "organisation-header",
        data () {
            return {
                organisation: null,
                organisationLogo: null
            }
        },
        mounted () {
            axios
            .get('https://ck-api-staging.cloudapps.digital/core/v1/organisations/7d35a4d6-8886-4060-8354-a3c94bc8615c')
            .then(response => (this.organisation = response.data.data))
            .catch(error => console.log(error))
            .get('https://ck-api-staging.cloudapps.digital/core/v1/organisations/7d35a4d6-8886-4060-8354-a3c94bc8615c/logo')
            .then(response => (this.organisation = response.data.data))
            .catch(error => console.log(error))
        }
    }
</script>
 
<style scoped>
 
</style>
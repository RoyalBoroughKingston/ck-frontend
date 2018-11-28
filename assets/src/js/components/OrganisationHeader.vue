<template>
    <section class="section section--header section--header--reduce-padding section--header--3" v-if="organisation" role="banner">
        <vue-headful
            :title="`Connected Kingston - ` + organisation.name"
            :description="organisation.description"
            :image="`${apiUri}/organisations/${organisation.id}/logo.png?v=${organisation.updated_at}`"
        />

        <div class="flex-container flex-container--mobile-no-padding flex-container--align-center">
            <div class="flex-col flex-col--8 flex-col--gutter">
                <div class="title-card title-card--variant-1">
                    <h2 class="title-card__title">{{ organisation.name }}</h2>

                    <div class="title-card__description"> 
                        <p>{{ organisation.description }}</p>
                    </div>
                </div>
            </div>

            <div class="flex-col flex-col--4 flex-col--gutter" v-if="$mq !== 'mobile'">
                <div class="title-card">
                    <div class="title-card__image">
                        <img :src="`${apiUri}/organisations/${organisation.id}/logo.png?v=${organisation.updated_at}`" :alt="organisation.name">
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
        methods: {
            getSlug() {
                let pathArray = window.location.pathname.split('/');
                let slug = pathArray[2]

                return slug
            },
            getOrganisation() {
                axios
                .get(`${this.apiUri}/organisations/${this.getSlug()}`)
                .then(response => (this.organisation = response.data.data))
                .catch(error => console.log(error))
            },
        },
        mounted () {
            this.getOrganisation();
        }
    }
</script>
 
<style scoped>
 
</style>

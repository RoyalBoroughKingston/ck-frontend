<template>
    <section class="section">
        <div class="flex-container">
            <div class="flex-col flex-col--12">
                <p class="sm-copy color-grey text-center">{{ services.data.length }} service(s) shortlisted</p>
            </div>
        </div>

        <div class="flex-container flex-container--justify">
            <div class="flex-col flex-col--4 flex-col--gutter" v-for="service in services.data" :key="service.id">
                <div class="service">
                    <div class="service__image">
                        <img src="https://picsum.photos/315/157" alt="Image title">
                        
                        <div class="service__add">
                            <a href="#shortist" v-bind:data-id="service.id" role="button" class="btn btn--small">Add to shortlist <i class="fa fa-star"></i></a>
                        </div>
                    </div>
                    <div class="service__location">
                        <i class="fa fa-map-marker-alt"></i> <span class="service__location__name">Surbiton,Kingston</span>
                    </div>
                    <div class="service__meta">
                        <div class="service__meta__item sm-copy" v-if="service.is_free === true"><i class="fa fa-pound-sign"></i> Free</div>
                        <div class="service__meta__item sm-copy"><i class="fa fa-hourglass"></i> Up to 1 week
                        </div>
                    </div>
                    <div class="service__details">
                        <h4 class="service__name">{{ service.name }}</h4>
                        <p class="service__sub-title sm-copy">SPEAR</p>
                        <p class="service__description sm-copy">{{ service.description }}</p>
                        <a v-bind:href="service.url" role="button" class="btn btn--small">View more <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
 
<script>
    import axios from 'axios'
    
    export default {
        name: "services-shortlist",
        data () {
            return {
                services: null
            }
        },
        mounted () {
            axios
            .get('https://ck-api-staging.cloudapps.digital/core/v1/services?page=1')
            .then(response => (this.services = response.data))
            .catch(error => console.log(error))
        }
    }
</script>
 
<style scoped>
 
</style>
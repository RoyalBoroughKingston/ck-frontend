<template>
    <div id="map" class="flex-container">
        <div class="flex-col flex-col--12">
            <div class="map">
                <div class="map__overlay map__overlay--left">
                    <div class="service">
                        <div class="service__image">
                            <img src="https://picsum.photos/315/157" alt="Image title">
                            
                            <div class="service__add">
                                <a href="#" class="btn btn--small" role="button">Add to shortlist <i class="fa fa-star"></i></a>
                            </div>
                        </div>
                    
                        <div class="service__location">
                            <i class="fa fa-map-marker-alt"></i>
                            <span class="service__location__name">Surbiton, Kingston</span>
                        </div>
                    
                        <div class="service__meta">
                            <div class="service__meta__item sm-copy">
                                <i class="fa fa-pound-sign"></i> Free
                            </div>
                            <div class="service__meta__item sm-copy">
                                <i class="fa fa-hourglass"></i> Up to 1 week
                            </div>
                        </div>
                    
                        <div class="service__details">
                            <h4 class="service__name">Fresh Start</h4>
                            <p class="service__sub-title sm-copy">SPEAR</p>
                            <p class="service__description sm-copy">Fresh Start is an early intervention, homelessness prevention programme which is outreach and community...</p>
                            <a href="#" class="btn btn--small" role="button">View more <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>

                <div id="map-container" class="map__container"></div>

                <div class="map__overlay map__overlay--right"></div>
            </div>
        </div>
    </div>
</template>
 
<script>
    import axios from 'axios'
    
    export default {
        name: "search-map",
        props: ['services'],
        mounted () {

        }
    }
</script>
 
<style scoped>
 
</style>
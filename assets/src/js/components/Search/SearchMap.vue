<template>
    <div class="flex-container">
        <div class="flex-col flex-col--12">
            <div class="map">
                <div class="map__overlay map__overlay--left" v-if="selected">
                    <service v-bind:service="selectedService"></service>
                </div>

                <div id="map-container" class="map__container"></div>

                <div class="map__overlay map__overlay--right"></div>
            </div>
        </div>
    </div>
</template>
 
<script>
    import axios from 'axios'
    import Service from '../Service'
    
    export default {
        name: "search-map",
        props: ['services'],
        components: {
            Service
        },
        data() {
            return {
                map: null,
                tileLayer: null,
                layers: [
                    {
                        id: 0,
                        name: 'Services',
                        active: true,
                        features: [],
                    },
                ],
                greenIcon: L.icon({
                    iconUrl: '/assets/dist/img/map/map-marker.svg',
                    iconSize:     [30, 40],
                    iconAnchor:   [15, 40],
                    popupAnchor:  [-3, -76]
                }),
                blueIcon: L.icon({
                    iconUrl: '/assets/dist/img/map/map-marker--selected.svg',
                    iconSize:     [30, 40],
                    iconAnchor:   [15, 40],
                    popupAnchor:  [-3, -76]
                }),
                selected: false,
                selectedService: null
            }
        },
        methods: {
            findLayers() {
                // Loop through the services
                this.services.forEach((service) => {
                    // Check if the service has locations
                    if(service.service_locations) {
                        // Loop through the service locations
                        service.service_locations.forEach((location) => {
                            // Push each service location to features array
                            this.layers[0].features.push({id: 0, name: service.name, type: 'marker', coords: [location.location.lat, location.location.lon]});
                        })
                    }
                });
            },
            initMap() {
                this.map = L.map('map-container').setView([51.41233, -0.300689], 2);
                this.tileLayer = L.tileLayer('https://cartodb-basemaps-{s}.global.ssl.fastly.net/rastertiles/voyager/{z}/{x}/{y}.png',
                    {
                        maxZoom: 18,
                        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>, &copy; <a href="https://carto.com/attribution">CARTO</a>',
                    }
                );
                this.tileLayer.addTo(this.map);
            },
            initLayers() {
                this.layers.forEach((layer) => {
                    const markerFeatures = layer.features.filter(feature => feature.type === 'marker');

                    markerFeatures.forEach((feature) => {
                        feature.leafletObject = L.marker(feature.coords, {icon: this.greenIcon}).bindPopup(feature.name).addTo(this.map);
                    });
                });
            },
        },
        mounted() {
            this.findLayers();
            this.initMap();
            this.initLayers();
        },
    }
</script>
 
<style scoped>
 
</style>
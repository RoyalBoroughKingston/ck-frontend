<template>
    <div class="flex-container">
        <div class="flex-col flex-col--12">
            <div class="map">
                <div class="map__overlay map__overlay--left" v-if="selected_panel_left">
                    <service v-if="selected_service" :type="'service'" :service="selected_service"></service>
                </div>

                <div id="map-container" class="map__container"></div>
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
                markers: [],
                layers: [
                    {
                        id: 0,
                        name: 'Services',
                        active: true,
                        features: [],
                    },
                ],
                green_icon: L.icon({
                    iconUrl: '/assets/dist/img/map/map-marker.svg',
                    iconSize:     [30, 40],
                    iconAnchor:   [15, 40],
                    popupAnchor:  [-3, -76]
                }),
                blue_icon: L.icon({
                    iconUrl: '/assets/dist/img/map/map-marker--selected.svg',
                    iconSize:     [30, 40],
                    iconAnchor:   [15, 40],
                    popupAnchor:  [-3, -76]
                }),
                selected_panel_left: false,
                selected_service: null
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
                            this.layers[0].features.push({id: service.id, name: service.name, type: 'marker', coords: [location.location.lat, location.location.lon]});
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
                        // Create marker
                        feature.leafletObject = L.marker(feature.coords, {id: feature.id, icon: this.green_icon})
                            .addTo(this.map)
                            .on('click', this.showService)
                        
                        // Push markers to array for use later
                        this.markers.push(feature.leafletObject)
                    });
                });
            },
            showService(e) {
                // Unset previous marker icon
                document.querySelectorAll('.leaflet-marker-icon').forEach((marker) => {
                    marker.src="/assets/dist/img/map/map-marker.svg"
                })

                // Set selected marker icon
                let layer = e.target
                layer.setIcon(this.blue_icon)

                // Center the map view to marker
                this.setViewToMarker(e.target);

                // Query the selected service
                axios
                .get('https://ck-api-staging.cloudapps.digital/core/v1/services/'+e.target.options.id)
                .then(response => (
                    // Set the selected service
                    this.selected_service = response.data.data,
                    // Show the service panel
                    this.selected_panel_left = true
                ))
                .catch(error => console.log(error))
            },
            setViewToMarker(marker) {
                // Convert latlng to pixels
                let px = this.map.project(marker.getLatLng());

                // Add pixel height offset to converted pixels (screen origin is top left) - (height of box / 2)
                px.x -= 180;

                // Convert back to coordinates
                let latlng = this.map.unproject(px);

                // Update view
                this.map.setView(latlng);
            }
        },
        mounted() {
            this.findLayers();
            this.initMap();
            this.initLayers();
        },
        watch: {
            // You can also set up a watcher for name here if you like
            service() {}
        }
    }
</script>
 
<style scoped>
 
</style>
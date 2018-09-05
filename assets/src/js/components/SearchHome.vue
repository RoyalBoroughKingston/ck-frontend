<template>
    <form action="/results" class="form form--search form--center flex-container">
        <input type="hidden" name="is_free" value="true">
        <div class="field flex-col flex-col--12">
            <label class="field__description" for="search_term">Search</label>
            <input type="text" class="input input--text" name="search_term" placeholder="Activity" minlength="3"/>
        </div>

        <div class="field field--with-button flex-col flex-col--12">
            <label class="field__description" for="location">Location</label>
            <input type="text" class="input input--text" name="location" placeholder="Postcode" v-bind:value="postcode"/>
            <a href="#" class="btn btn--secondary btn--icon-after" role="button" v-on:click="findLocation">Find <span class="mobile-hide">my location</span> <i class="fa fa-map-marker-alt"></i></a>
        </div>

        <div class="form__actions form__actions--center flex-col flex-col--12">
            <button type="submit" class="btn btn--icon-after">Search <i class="fa fa-search"></i></button>
        </div>
    </form>
</template>
 
<script>
    import axios from 'axios'
    
    export default {
        name: "search-home",
        data() {
            return {
                postcode: null
            }
        },
        methods: {
            findLocation(event) {
                // Get the button
                let button = event.target;
                
                // Add disabled class to button
                button.classList.add('disabled');

                navigator.geolocation.getCurrentPosition((location) => {
                    axios
                    .get('https://api.postcodes.io/postcodes?lon=' + location.coords.latitude + '&lat=' + location.coords.longitude)
                    .then(response => (
                        // Set local storage for use later
                        localStorage['authorizedGeoLocation'] = 1,
                        
                        // Store the postcode
                        this.postcode = response.data.result,
                        
                        // Remove the disabled class on the button
                        button.classList.remove('disabled')
                    ))
                    .catch(error => {
                        // Set local storage for use later
                        localStorage['authorizedGeoLocation'] = 0
                        console.log(error)
                    })
                });
            }
        }
    }
</script>
 
<style scoped>
 
</style>
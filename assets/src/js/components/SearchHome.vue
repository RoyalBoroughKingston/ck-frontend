<template>
    <form action="/results" class="form form--search form--center flex-container flex-container--align-center" role="search">
        <div class="flex-col flex-col--8">
            <input type="hidden" name="is_free" value="false">
            <div class="field flex-col flex-col--12">
                <label class="field__description" for="search_term">Search</label>
                <input type="search" class="input input--text" name="search_term" placeholder="Enter search term" minlength="3"/>
            </div>

            <div class="field field--with-button flex-col flex-col--12">
                <label class="field__description" for="location">Location</label>
                <input type="text" class="input input--text" name="location" placeholder="Full postcode" v-bind:value="postcode"/>
                <button type="button" class="btn btn--secondary btn--icon-after" role="button" v-on:click="findLocation">Find <span class="tablet-hide"> location</span> <i class="fa fa-map-marker-alt" aria-hidden></i></button>
            </div>
        </div>

        <div class="flex-col flex-col-2">
            <div class="form__actions form__actions--center flex-col flex-col--12">
                <button type="submit" class="btn btn--icon-after">Search <i class="fa fa-search"></i></button>
            </div>
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
                let button;

                // Get the button depending on what is clicked
                if(event.target.tagName === "SPAN" || event.target.tagName === "I") {
                    button = event.target.parentElement
                } else {
                    button = event.target
                }
                
                // Add disabled class to button
                button.classList.add('disabled');

                navigator.geolocation.getCurrentPosition((location) => {
                    axios
                    .get('https://api.postcodes.io/postcodes?lon=' + location.coords.longitude + '&lat=' + location.coords.latitude)
                    .then(response => {
                        // Set local storage for use later
                        localStorage['authorizedGeoLocation'] = 1
                        
                        // Store the postcode
                        if(response.data.result) {
                            this.postcode = response.data.result[0].postcode
                        } else {
                            window.alert('There was an error finding your location. Please enter your postcode manually.')
                        }                        
                        
                        // Remove the disabled class on the button
                        button.classList.remove('disabled')
                    })
                    .catch(error => {
                        // Set local storage for use later
                        localStorage['authorizedGeoLocation'] = 0
                        window.alert('There was an error finding your location. Please enter your postcode manually.')
                    })
                });
            }
        }
    }
</script>
 
<style scoped>
 
</style>
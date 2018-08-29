<template>
    <form action="/results" class="form form--filter">
        <div class="flex-container flex-container--no-margin flex-container--no-padding">
            <div class="field flex-col">
                <p for="search_term" class="field__description">Search</p>
                <input type="text" name="search_term" placeholder="Job application" class="input input--text" v-bind:value="search_term">
            </div>
            <div class="field flex-col">
                <p for="location" class="field__description">Location</p>
                <input type="text" name="location" placeholder="Postcode / area" class="input input--text" v-bind:value="location">
            </div>
        </div>
        <div class="flex-container flex-container--no-padding flex-container--align-bottom">
            <div class="field field--no-margin field--checkbox flex-col">
                <p class="field__description">Cost</p>
                <div class="checkbox">
                    <input type="checkbox" id="cost-free" name="cost" checked="checked" class="input input--checkbox">
                    <label for="cost-free"><span><span></span></span> Free</label>
                </div>
            </div>
            <div class="field field--no-margin field--select flex-col">
                <p class="field__description">Average wait time</p>
                
                <select class="select" name="wait_time">
                    <option value="one_week">Up to 1 week</option>
                    <option value="two_weeks">Up to 2 weeks</option>
                    <option value="three_weeks">Up to 3 weeks</option>
                    <option value="month">Up to 1 month</option>
                    <option value="longer">Longer</option>
                </select>
            </div>
            <div class="form__actions flex-col">
                <button type="submit" class="btn btn--small btn--icon-after">Search <i class="fa fa-search"></i></button>
            </div>
        </div>
    </form>
</template>
 
<script>
    import axios from 'axios'
    
    export default {
        name: "search-results",
        data () {
            return {
                search_term: null,
                location: null
            }
        },
        methods: {
            getParameterByName(name, url) {
                if (!url) url = window.location.href;
                name = name.replace(/[\[\]]/g, '\\$&');
                var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                    results = regex.exec(url);
                if (!results) return null;
                if (!results[2]) return '';
                return decodeURIComponent(results[2].replace(/\+/g, ' '));
            }
        },
        mounted() {
            this.search_term = this.getParameterByName('search_term')
            this.location = this.getParameterByName('location')
        }
    }
</script>
 
<style scoped>
 
</style>
<template>
    <div class="title-card title-card--variant-3">
        <h4 class="title-card__title">Results for</h4>
        <div class="title-card__form">
            <form action="/results" class="form form--filter">
                <div class="flex-container flex-container--no-margin flex-container--no-padding">
                    <div class="field flex-col">
                        <p for="search_term" class="field__description">Search</p>
                        <input type="text" name="search_term" placeholder="Job application" class="input input--text" v-bind:value="this.$parent.search_term">
                    </div>
                    <div class="field flex-col">
                        <p for="location" class="field__description">Location</p>
                        <input type="text" name="location" placeholder="Postcode / area" class="input input--text" v-bind:value="this.$parent.location">
                    </div>
                </div>
                <div class="flex-container flex-container--no-padding flex-container--align-bottom">
                    <div class="field field--no-margin field--checkbox flex-col">
                        <p class="field__description">Cost</p>
                        <div class="checkbox">
                            <input type="checkbox" id="cost-free" name="is_free" class="input input--checkbox" v-bind:value="'true'" v-model="this.$parent.is_free" :checked="this.$parent.is_free">
                            <label for="cost-free"><span><span></span></span> Free</label>
                        </div>
                    </div>
                    <div class="field field--no-margin field--select flex-col">
                        <p class="field__description">Average wait time</p>
                        
                        <select class="select" name="wait_time" v-model="this.$parent.wait_time">
                            <option v-bind:value="'null'">Show all</option>
                            <option v-bind:value="'one_week'">Up to 1 week</option>
                            <option v-bind:value="'two_weeks'">Up to 2 weeks</option>
                            <option v-bind:value="'three_weeks'">Up to 3 weeks</option>
                            <option v-bind:value="'month'">Up to 1 month</option>
                            <option v-bind:value="'longer'">Longer</option>
                        </select>
                    </div>
                    <div class="form__actions flex-col">
                        <button type="submit" class="btn btn--small btn--icon-after">Search <i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>
 
<script>
    import axios from 'axios'
    
    export default {
        name: "search-form",
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
            // Set search parameters
            if(this.getParameterByName('search_term') !== "") {
                this.$parent.search_term = this.getParameterByName('search_term')
            }
            
            this.$parent.location = this.getParameterByName('location')
            
            if(this.getParameterByName('is_free') !== null) {
                this.$parent.is_free = this.getParameterByName('is_free')
            } else {
                this.$parent.is_free = false
            }
            
            if(this.getParameterByName('wait_time') !== "") {
                this.$parent.wait_time = this.getParameterByName('wait_time')
            } else {
                this.$parent.wait_time = null
            }
        }
    }
</script>
 
<style scoped>
 
</style>
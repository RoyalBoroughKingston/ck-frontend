<template>
    <div class="search-filter">
        <div class="title-card title-card--variant-3" v-if="type === 'full'">
            <h4 class="title-card__title">Results for</h4>
            <div class="title-card__form">
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
                                <input type="checkbox" id="cost-free" name="is_free" class="input input--checkbox" v-bind:value="'true'" v-model="is_free" :checked="is_free">
                                <label for="cost-free"><span><span></span></span> Free</label>
                            </div>
                        </div>
                        <div class="field field--no-margin field--select flex-col">
                            <p class="field__description">Average wait time</p>
                            
                            <select class="select" name="wait_time" v-model="wait_time">
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

        <div class="service" v-if="type === 'sidebar'">
            <div class="service__header">
                <span>
                    <p class="service__name sm-copy color-grey"><i class="fa fa-filter"></i> Filters</p>
                </span>
                <span class="mobile-show"><i class="fa fa-angle-down"></i></span>
            </div>

            <div class="service__filter">
                <div class="field field--no-margin field--checkbox flex-col">
                    <div class="checkbox">
                        <input type="checkbox" id="cost-free" name="is_free" class="input input--checkbox" v-bind:value="'true'" :checked="is_free" v-on:change="setParameters">
                        <label for="cost-free"><span><span></span></span> Free</label>
                    </div>
                </div>
            </div>

            <div class="service__filter">
                <div class="field field--no-margin field--select flex-col">
                    <p class="service__name sm-copy color-grey"><i class="fa fa-hourglass-half"></i> Average waiting time</p>
                    
                    <select class="select" name="wait_time" v-on:change="setParameters">
                        <option v-bind:value="null">Show all</option>
                        <option v-bind:value="'one_week'">Up to 1 week</option>
                        <option v-bind:value="'two_weeks'">Up to 2 weeks</option>
                        <option v-bind:value="'three_weeks'">Up to 3 weeks</option>
                        <option v-bind:value="'month'">Up to 1 month</option>
                        <option v-bind:value="'longer'">Longer</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</template>
 
<script>
    import axios from 'axios'
    
    export default {
        name: "search-form",
        props: ['type', 'search_term', 'location', 'is_free', 'wait_time'],
        methods: {
            setParameters(e) {
                // Push the new URL to history
                if(e.target.name === 'is_free') {
                    history.pushState({
                        id: 'results'
                    }, 'Connected Kingstong | Search Results', this.updateQueryStringParameter(e.target.name, e.target.checked));
                } else {
                    history.pushState({
                        id: 'results'
                    }, 'Connected Kingstong | Search Results', this.updateQueryStringParameter(e.target.name, e.target.value));
                }
                
                // Reset the search parameters
                this.$parent.setSearchParameters()
                
                // Check what were looking for
                if(this.$parent.category) {
                    this.$parent.getCategory()
                } else if(this.$parent.persona) {
                    this.$parent.getPersona()
                }
            },
            updateQueryStringParameter(key, value) {
                let uri = window.location.href
                let re = new RegExp("([?&])" + key + "=.*?(&|$)", "i")
                let separator = uri.indexOf('?') !== -1 ? "&" : "?"
                if (uri.match(re)) {
                    return uri.replace(re, '$1' + key + "=" + value + '$2')
                }
                else {
                    return uri + separator + key + "=" + value
                }
            }
        },
        mounted() {
            
        }
    }
</script>
 
<style scoped>
 
</style>
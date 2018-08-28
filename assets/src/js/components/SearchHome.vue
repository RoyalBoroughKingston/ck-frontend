<template>
    <form action="/results" class="form form--search form--center flex-container">
        <div class="field flex-col flex-col--12">
            <label class="field__description" for="search_term">Search</label>
            <input type="text" class="input input--text" name="search_term" placeholder="Activity"/>
        </div>

        <div class="field field--with-button flex-col flex-col--12">
            <label class="field__description" for="location">Location</label>
            <input type="text" class="input input--text" name="location" placeholder="Postcode / area"/>
            <a href="#" class="btn btn--secondary btn--icon-after" role="button" v-on:click="findLocation">Find my location <i class="fa fa-map-marker-alt"></i></a>
        </div>

        <div class="form__actions form__actions--center flex-col flex-col--12">
            <button type="submit" class="btn btn--icon-after">Search <i class="fa fa-search"></i></button>
        </div>
    </form>
</template>
 
<script>
    import axios from 'axios'
    
    export default {
        name: "search-home"
    }
</script>
 
<style scoped>
 
</style>
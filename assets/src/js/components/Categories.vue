<template>
   <div class="tag-cloud">
        <a v-for="category in categories" :key="category.id" v-bind:href="['/results?is_free=true&wait_time=null&category=' + category.id]" role="button" class="btn btn--secondary btn--icon-after">
            {{category.name}} <i v-bind:class="['fa fa-' + category.icon]" aria-hidden></i>
        </a>
    </div>
</template>
 
<script>
    import axios from 'axios'
    
    export default {
        name: "categories",
        data () {
            return {
                categories: null
            }
        },
        mounted () {
            axios
            .get('https://api.connectedkingston.uk/core/v1/collections/categories?page=1')
            .then(response => (this.categories = response.data.data))
            .catch(error => console.log(error))
        }
    }
</script>
 
<style scoped>
 
</style>
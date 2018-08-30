<template>
    <div class="flex-container flex-container--align-center flex-container--space">
        <div class="flex-col">
            <p class="sm-copy color-grey">{{ this.$parent.services.length }} service<span v-if="this.$parent.services.length > 1 || this.$parent.services.length === 0">s</span> found</p>
        </div>

        <div class="flex-col">
            <div class="field field--select">
                <label class="field__description">Sort results by:</label>
                <select class="select">
                    <option value="distance">Distance</option>
                    <option value="a-z-activities">A-Z (activities)</option>
                    <option value="a-z-organisations">A-Z (organisations)</option>
                </select>
            </div>
        </div>
    </div>
</template>
 
<script>
    import axios from 'axios'
    
    export default {
        name: "search-sort",
        methods: {
            
        },
        mounted () {
            
        }
    }
</script>
 
<style scoped>
 
</style>
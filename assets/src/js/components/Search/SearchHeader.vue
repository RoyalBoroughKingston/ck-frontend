<template>
    <div class="title-card">
        <h2 class="title-card__title">{{ header.name }}</h2>

        <div class="title-card__description"><p>{{ header.intro }}</p></div>
    </div>
</template>
 
<script>
    import axios from 'axios'
    
    export default {
        name: "search-view",
        props: ['header'],
        methods: {
            
        }
    }
</script>
 
<style scoped>
 
</style>
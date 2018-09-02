<template>
    <div id="grid" class="flex-container flex-container--no-padding flex-container--justify">
        <div class="flex-col flex-col--4 flex-col--tablet--6 flex-col--gutter" v-for="service in services" :key="service.id">
            <service :type="'service'" :view="'grid'" :service="service"></service>
        </div>
    </div>
</template>
 
<script>
    import axios from 'axios'
    import Service from '../Service'

    export default {
        name: "search-grid",
        props: ['services'],
        components: {
            Service
        }
    }
</script>
 
<style scoped>
 
</style>
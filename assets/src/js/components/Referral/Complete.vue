<template>
    <div>
        <div class="flex-container flex-container--justify text-center">
            <div class="flex-col flex-col--1"><img src="/assets/dist/img/symbols/tick.svg" class="img-responsive"></div>
        </div>
        <div class="flex-container flex-container--justify text-center">
            <div class="flex-col flex-col--4">
                <h3>You've successfully referred to {{ service.name }} - {{ service.organisation.name }}</h3>
            </div>
        </div>
        <div class="flex-container flex-container--justify text-center">
            <div class="flex-col flex-col--6">
                <p>You will recieve… Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque in odio massa. Nullam tincidunt orci vitae vulputate aliquam. Etiam finibus ultricies arcu, non tempor lacus condimentum quis.</p>
            </div>
        </div>
        <div class="flex-container flex-container--justify text-center">
            <div class="flex-col flex-col--6">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque in odio massa.</p>
            </div>
        </div>

        <div class="flex-container flex-container--justify text-center">
            <div class="flex-col flex-col--6 highlight highlight--grey">
                <p><a href="#" role="button" class="btn btn--secondary btn--icon-after">Print page <i class="fa fa-print"></i></a></p>
                <p><a v-bind:href="['/services/' + service.slug]" role="button" class="btn btn--small btn--icon-after">Back to service page <i class="fa fa-angle-right"></i></a></p>
            </div>
        </div>
    </div>
</template>
 
<script>
    import axios from 'axios'
    
    export default {
        name: "complete",
        props: ['service']
    }
</script>
 
<style scoped>
 
</style>
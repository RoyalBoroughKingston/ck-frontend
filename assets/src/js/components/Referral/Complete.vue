<template>
    <div class="referral__complete">
        <div class="section__component flex-container flex-container--justify text-center">
            <img src="/assets/dist/img/symbols/tick.svg" class="display-inline">
        </div>
        
        <div class="section__component flex-container flex-container--justify text-center">
            <div class="flex-col flex-col--6">
                <h3>You’ve successfully connected to {{ service.name }} - {{ service.organisation.name }}</h3>
                <p>The service will make contact using the details provided as soon as possible.</p>
                <p>Your referral ID is <strong>{{ referral.reference }}</strong>. If you have any feedback regarding this connection, please contact the [Admin team email address] or complete the [Referral feedback form].</p>
            </div>
        </div>

        <div class="section__component flex-container flex-container--justify text-center">
            <div class="highlight highlight--grey flex-col flex-col--6">
                <p><a href="#" role="button" class="btn btn--secondary btn--icon-after">Print page <i class="fa fa-print"></i></a></p>
                <p><a href="/" role="button" class="btn btn--small btn--icon-after">Back to home <i class="fa fa-angle-right"></i></a></p>
            </div>
        </div>
    </div>
</template>
 
<script>
    import axios from 'axios'
    
    export default {
        name: "complete",
        props: ['service', 'referral']
    }
</script>
 
<style scoped>
 
</style>
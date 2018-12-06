<template>
    <div class="title-card title-card--reduce-padding">
        <div class="title-card__form">
            <p class="sm-copy">View as</p>
            
            <div class="field field--buttons">
                <div class="field__buttons--center">
                    <button v-on:click="updateView('compact')" v-bind:class="{'active':(this.view === 'compact')}" role="button" class="btn btn--toggle btn--row btn--icon-after view-toggle">Compact <i class="fa fa-th" aria-hidden></i></button>
                    <button v-on:click="updateView('grid')" v-bind:class="{'active':(this.view === 'grid')}" role="button" class="btn btn--toggle btn--icon-after view-toggle">Grid <i class="fa fa-th-large" aria-hidden></i></button>
                    <button v-on:click="updateView('map')" v-bind:class="{'active':(this.view === 'map')}"  role="button" class="btn btn--toggle btn--icon-after view-toggle">Map <i class="fa fa-map" aria-hidden></i></button>
                </div>
            </div>
        </div>
    </div>
</template>
 
<script>
    import axios from 'axios'
    
    export default {
        name: "search-view",
        props: ['view'],
        methods: {
            updateView: function (value) {
                this.$emit('setView', value)
                this.$cookies.set("ck_search_view", value)
            }
        }
    }
</script>
 
<style scoped>
 
</style>
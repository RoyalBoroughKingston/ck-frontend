<template>
<div>

    <section class="section section--no-padding">
        <div class="flex-container flex-container--justify">

            <div class="flex-col flex-col--7 flex-col--tablet--10 text-center">
                <div class="section__component">
                    <h2>No results found</h2>
                    <p>It looks like there are no services matching your search term. Please use the categories below to browse all of our available services.</p>
                </div>
            </div>
    
        </div>
    </section>

    <section class="section section--reduce-padding">
        <div class="flex-container flex-container--justify">

            <div class="flex-col flex-col--12 highlight highlight--grey text-center">
                <categories></categories>
            </div>

        </div>
    </section>

    <section class="section section--light-blue">
        <div class="flex-container">
            <div class="flex-col flex-col--12 text-center">
                <h3>Help me to...</h3>
                <p>Sometimes it's hard to know where to start - here are some suggestions</p>
            </div>
        </div>

        <persona></persona>

    </section>

</div>
</template>
 
<script>
    import Persona from '../Persona'
    import Categories from '../Categories'

    export default {
        name: "search-no-results",
        components: {
            Persona,
            Categories
        }
    }
</script>
 
<style scoped>
 
</style>
<template>
    
</template>
 
<script>
    import axios from 'axios'
    
    export default {
        name: "services",
        data () {
            return {
                shortlist: null
            }
        },
        methods: {
            addToShortlist(e) {
                console.log(e.currentTarget.getAttribute('data-id'), this.$cookies.get("ck_shortlist"))

                // Set shortlist cookie
                this.$cookies.set("ck_shortlist", this.$cookies.get("ck_shortlist") + ',' + e.currentTarget.getAttribute('data-id'))
            }
        },
        mounted () {
            
        },
        computed: {
            isInShortlist(id) {
                return this.shortlist
            }
        }
    }
</script>
 
<style scoped>
 
</style>
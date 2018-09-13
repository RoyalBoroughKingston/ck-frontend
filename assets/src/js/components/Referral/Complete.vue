<template>
    <div class="referral__complete">
        <div class="section__component flex-container flex-container--justify text-center">
            <img src="/assets/dist/img/symbols/tick.svg" class="display-inline" alt="Tick">
        </div>
        
        <div class="section__component flex-container flex-container--justify text-center">
            <div class="flex-col flex-col--6">
                <h3>You’ve successfully connected to {{ service.name }} - {{ service.organisation.name }}</h3>
                <p>The service will make contact using the details provided as soon as possible.</p>
                <p>Your referral ID is <strong>{{ referral.reference }}</strong>. If you have any feedback regarding this connection, please contact the admin team via <a href="mailto:admin@connectedkingston.uk">admin@connectedkingston.uk</a> or complete the referral <a :href="`https://docs.google.com/forms/d/e/1FAIpQLSe38Oe0vsqLRQbcBjYrGzMooBJKkYqFWAlHy4dcgwJnMFg9dQ/viewform?usp=pp_url&entry.400427747=`+referral.reference" target="_blank">feedback form</a></p>
            </div>
        </div>

        <div class="section__component flex-container flex-container--justify text-center">
            <div class="highlight highlight--grey flex-col flex-col--6">
                <p><a href="#print" role="button" class="btn btn--secondary btn--icon-after">Print page <i class="fa fa-print"></i></a></p>
                <p><a href="/" role="button" class="btn btn--small btn--icon-after">Back to home <i class="fa fa-angle-right"></i></a></p>
            </div>
        </div>
    </div>
</template>
 
<script>
    import axios from 'axios'
    
    export default {
        name: "complete",
        props: ['service', 'referral'],
        methods: {
            initPrint() {
                const printTriggers = Array.prototype.slice.call(document.querySelectorAll("a[href*='#print']"), 0)

                if(printTriggers)
                    printTriggers.forEach((trigger) => {
                        trigger.addEventListener('click', (e) => {
                            e.preventDefault ? e.preventDefault() : e.returnValue = !1;
                            
                            // Print the window
                            window.print()
                        })
                    })
            }
        },
        mounted() {
            // Init print button
            this.initPrint()
        }
    }
</script>
 
<style scoped>
 
</style>
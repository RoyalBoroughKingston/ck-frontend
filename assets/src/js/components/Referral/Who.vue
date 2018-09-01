<template>
    <div>
        <div class="flex-container flex-container--no-padding">
            <div class="flex-col flex-col--12">
                <h4>Who is this referral for?</h4>
            </div>
        </div>
        <div class="flex-container flex-container--no-padding">
            <div class="flex-col flex-col--12">
                <div class="card card--notification card--light-blue">
                    <div class="card__icon"><i class="fa fa-info-circle"></i></div>
                    <div class="card__content">
                        <p>'Myself' is anyone who is refering themselves or a friend.</p>
                    </div>
                </div>
                <p>&nbsp;</p>
                <p>&nbsp;</p>
            </div>
        </div>
        <div class="flex-container flex-container--no-padding">
            <div class="flex-col flex-col--12">
                <form class="form">
                    <div class="field field--radio">
                        <div class="radio">
                            <input type="radio" id="myself" value="myself" name="who_for" class="input input--radio" checked="checked">
                            <label for="myself"><span><span></span></span> Myself</label>
                        </div>
                        
                        <div class="radio">
                            <input type="radio" id="someone_else" value="someone_else" name="who_for" class="input input--radio">
                            <label for="someone_else"><span><span></span></span> Someone else</label>
                        </div>
                    </div>
                    
                    <p>&nbsp;</p>
                    
                    <div class="form__actions">
                        <a v-on:click="setWhoFor" type="submit" name="submit" class="btn btn--icon-after">Continue <i class="fa fa-angle-right"></i></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    import axios from 'axios'
    
    export default {
        name: "who",
        props: ['service', 'who_for'],
        methods: {
            setWhoFor() {
                let radios = document.getElementsByName('who_for');

                for (var i = 0, length = radios.length; i < length; i++) {
                    if (radios[i].checked) {
                        this.$parent.who_for = radios[i].value
                        break;
                    }
                }

                this.updateStep(3)
            },
            updateStep(step) {
                this.$parent.setStep(step);
            }
        }
    }
</script>
 
<style scoped>
 
</style>
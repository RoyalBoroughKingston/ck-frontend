<template>
    <social-sharing
        :url="url"
        :title="title"
        inline-template>
        <div>
            <network network="facebook">
                <i class="fab fa-facebook-f"></i>
            </network>
            
            <network network="twitter">
                <i class="fab fa-twitter"></i>
            </network>
            
            <a class="link-share" :data-clipboard-text="url"><i class="fa fa-link"></i></a>

            <network network="email">
                <i class="fa fa-envelope"></i>
            </network>
        </div>
    </social-sharing>
</template>
 
<script>
    import axios from 'axios'
    import ClipboardJS from 'clipboard'
    
    export default {
        name: "social-share",
        data() {
            return {
                url: null,
                title: document.title
            }
        },
        methods: {
            initCopyLink() {
                let clipboard = new ClipboardJS('.link-share')
            
                clipboard.on('success', (e) => {
                    window.alert(this.url + " was copied to your clipboard")
                    e.clearSelection();
                });
            }
        },
        mounted() {
            // Check if url is shortlist and if so append ids
            if(window.location.pathname === '/shortlist') {
                this.url = window.location.protocol + '//' + window.location.host + window.location.pathname + '?ids=' + this.$cookies.get('ck_shortlist')
            } else {
                this.url = window.location.protocol + '//' + window.location.host + window.location.pathname + window.location.search
            }

            // Init copy link function
            this.initCopyLink()
        }
    }
</script>
 
<style scoped>
 
</style>
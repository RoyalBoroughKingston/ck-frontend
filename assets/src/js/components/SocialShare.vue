<template>
    <social-sharing
        :url="url"
        :title="title"
        inline-template>
        <div>
            <network network="facebook" :role="`button`">
                <i class="fab fa-facebook" aria-hidden title="Facebook"></i>
                <span class="sr-only">Facebook</span>
            </network>
            
            <network network="twitter" :role="`button`">
                <i class="fab fa-twitter" aria-hidden title="Twitter"></i>
                <span class="sr-only">Twitter</span>
            </network>
            
            <a class="link-share" :data-clipboard-text="url" :role="`button`">
                <i class="fa fa-link" aria-hidden title="Link"></i>
                <span class="sr-only">Link</span>
            </a>

            <network network="email" :role="`button`">
                <i class="fa fa-envelope" aria-hidden title="Email"></i>
                <span class="sr-only">Email</span>
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
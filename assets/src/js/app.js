// Polyfills for IE
import "@babel/polyfill"

import axios from 'axios'
import Vue from 'vue'
import Paginate from 'vuejs-paginate'
import VueMq from 'vue-mq'
import VueCookies from 'vue-cookies'
import SocialSharing from 'vue-social-sharing'
import VueMediaEmbed from 'vue-media-embed'
import Vuex from 'vuex'
import vueHeadful from 'vue-headful'
import VueShowdown from 'vue-showdown'

Vue.use(VueCookies)
Vue.use(require('vue-moment'))
Vue.use(VueMq, {
  breakpoints: {
    mobile: 600,
    tablet: 860,
    desktop: Infinity,
  }
})
Vue.use(SocialSharing)
Vue.use(Vuex)
const store = new Vuex.Store({})

Vue.use(VueMediaEmbed, { store })
Vue.use(VueShowdown)

// Bugsnag.
import bugsnag from "bugsnag-js";
const bugsnagClient = bugsnag({
    apiKey: process.env.MIX_BUGSNAG_API_KEY,
    releaseStage: process.env.MIX_APP_ENV,
    notifyReleaseStages: ["local", "staging", "production"]
});
import bugsnagVue from "bugsnag-vue";

bugsnagClient.use(bugsnagVue(Vue));

// Focus directive for newly insterted elements
Vue.directive('focus', {
  inserted: function (el) {
    el.focus()
  }
})

Vue.mixin({
    data() {
      return {
        apiUri: process.env.MIX_API_URI
      }
    },
    methods: {
      trackClicks(event) {

        // Grab data
        var category = event.target.getAttribute('data-event-category');
        var action = event.target.getAttribute('data-event-action');
        var label = event.target.getAttribute('data-event-label');

        // Send event to Google
        gtag('event', action, {
          'event_category': category,
          'event_label': label
        });

        window.location = event.target.href;

      },
      smoothScroll(event) {
        var id = event.currentTarget.getAttribute("href");
        var element = document.getElementById(id.replace("#", ""));
        element.scrollIntoView({ behavior: 'smooth', top: -80 });
      }
    }
})

// Vue Components
Vue.component('paginate', Paginate)
Vue.component('vue-headful', vueHeadful);

// Vue JS components
import Categories from './components/Categories'
import Persona from './components/Persona'
import ServicesShortlist from './components/ServicesShortlist'
import ServiceHeader from './components/ServiceHeader'
import ServiceMain from './components/ServiceMain'
import OrganisationHeader from './components/OrganisationHeader'
import OrganisationMain from './components/OrganisationMain'
import Referral from './components/Referral'
import SocialShare from './components/SocialShare'
import Banner from './components/Banner'

// Vue JS Components - Search
import SearchHome from './components/SearchHome'
import Search from './components/Search'

// Site modules
import { Print } from "./modules/print.js"
import { Navigation } from "./modules/navigation.js"
import { ScrollToAnchor } from "./modules/scrollToAnchor.js"

export class App {

  constructor() {

    // Init the vue app
    var app = new Vue({
      el: '#app',
      delimiters: ['${', '}'],
      components: {
        Categories,
        Persona,
        ServicesShortlist,
        ServiceHeader,
        ServiceMain,
        OrganisationHeader,
        OrganisationMain,
        Referral,
        SearchHome,
        Search,
        SocialShare,
        Banner
      },
      created() {
        // Init modules
        window.onload = function(){
          let print = new Print();
          let navigation = new Navigation();
          let scrollToAnchor = new ScrollToAnchor();
        }
      }
    });
  }

}

// bootstrap
document.addEventListener("DOMContentLoaded", (e) => new App());

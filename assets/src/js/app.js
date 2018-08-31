import axios from 'axios'
import Vue from 'vue'
import VueCookies from 'vue-cookies'
import Paginate from 'vuejs-paginate'

Vue.use(axios);
Vue.use(VueCookies)
Vue.use(require('vue-moment'))

Vue.component('paginate', Paginate)

// Vue JS components
import Categories from './components/Categories'
import Recommendations from './components/Recommendations'
import ServicesShortlist from './components/ServicesShortlist'
import ServiceHeader from './components/ServiceHeader'
import ServiceMain from './components/ServiceMain'
import OrganisationHeader from './components/OrganisationHeader'
import OrganisationMain from './components/OrganisationMain'

// Vue JS Components - Search
import SearchHome from './components/SearchHome'
import Search from './components/Search'

// Site modules,
import { Form } from "./modules/form.js"
import { Navigation } from "./modules/navigation.js"

export class App {

  constructor() {

    let form = new Form();
    let navigation = new Navigation();

    // Init the vue app
    var app = new Vue({
      el: '#app',
      delimiters: ['${', '}'],
      components: {
        Categories,
        Recommendations,
        ServicesShortlist,
        ServiceHeader,
        ServiceMain,
        OrganisationHeader,
        OrganisationMain,
        SearchHome,
        Search
      }
    })

  }

}

// bootstrap
document.addEventListener("DOMContentLoaded", (e) => new App());
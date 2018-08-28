import axios from 'axios'
import Vue from 'vue'
Vue.use(axios);
Vue.use(require('vue-moment'));

// Vue JS components
import Categories from './components/Categories'
import SearchHome from './components/SearchHome'
import Recommendations from './components/Recommendations'
import ServicesGrid from './components/ServicesGrid'
import ServicesShortlist from './components/ServicesShortlist'
import ServiceHeader from './components/ServiceHeader'
import ServiceMain from './components/ServiceMain'

// Site modules,
import { Form } from "./modules/form.js"
import { Map } from "./modules/map.js"
import { Navigation } from "./modules/navigation.js"

export class App {

  constructor() {

    let form = new Form();
    let map = new Map();
    let navigation = new Navigation();

    // Init the vue app
    var app = new Vue({
      el: '#app',
      delimiters: ['${', '}'],
      components: {
        Categories,
        SearchHome,
        Recommendations,
        ServicesGrid,
        ServicesShortlist,
        ServiceHeader,
        ServiceMain
      }
    })

  }

}

// bootstrap
document.addEventListener("DOMContentLoaded", (e) => new App());
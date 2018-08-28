import axios from 'axios'
import Vue from 'vue'
Vue.use(axios);

// Vue JS components
import Categories from './components/Categories'
import SearchHome from './components/SearchHome'
import ServiceRecommendations from './components/ServiceRecommendations'
import ServicesGrid from './components/ServicesGrid'
import ServicesShortlist from './components/ServicesShortlist'

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
        ServiceRecommendations,
        ServicesGrid,
        ServicesShortlist
      }
    })

  }

}

// bootstrap
document.addEventListener("DOMContentLoaded", (e) => new App());
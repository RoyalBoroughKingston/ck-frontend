import axios from 'axios'
import Vue from 'vue'
Vue.use(axios);

// Vue JS components
import Categories from './components/Categories'
import ServiceRecommendations from './components/ServiceRecommendations'
import ServicesGrid from './components/ServicesGrid'

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
        ServiceRecommendations,
        ServicesGrid
      }
    })

  }

}

// bootstrap
document.addEventListener("DOMContentLoaded", (e) => new App());

// export class Init {
    
//     constructor() {

//         // Add Categories component
//         Vue.component('category-cloud', {
//             data () {
//                 return {
//                     categories: null
//                 }
//             },
//             mounted () {
//                 axios
//                 .get('https://ck-api-staging.cloudapps.digital/core/v1/collections/categories?page=1')
//                 .then(response => (this.categories = response.data))
//                 .catch(error => console.log(error))
//             }
//         })

//         // Init the vue app
//         var app = new Vue({
//             el: '#app',
//             delimiters: ['${', '}']
//         })

//     }

// }
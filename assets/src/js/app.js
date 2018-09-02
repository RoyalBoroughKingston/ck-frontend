import axios from 'axios'
import Vue from 'vue'
import VueCookies from 'vue-cookies'
import Paginate from 'vuejs-paginate'
import VueMq from 'vue-mq'

Vue.use(axios);
Vue.use(VueCookies)
Vue.use(require('vue-moment'))
Vue.use(VueMq, {
  breakpoints: {
    mobile: 600,
    tablet: 768,
    desktop: Infinity,
  }
})

Vue.component('paginate', Paginate)

// Vue JS components
import Categories from './components/Categories'
import Persona from './components/Persona'
import ServicesShortlist from './components/ServicesShortlist'
import ServiceHeader from './components/ServiceHeader'
import ServiceMain from './components/ServiceMain'
import OrganisationHeader from './components/OrganisationHeader'
import OrganisationMain from './components/OrganisationMain'
import Referral from './components/Referral'

// Vue JS Components - Search
import SearchHome from './components/SearchHome'
import Search from './components/Search'

// Site modules
import { Accordion } from "./modules/accordion.js"
import { Navigation } from "./modules/navigation.js"

export class App {

  constructor() {

    let accordion = new Accordion();
    let navigation = new Navigation();

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
        SearchHome,
        Search,
        Referral
      }
    })

    function getOffset(el) {
      var _x = 0;
      var _y = 0;
      while( el && !isNaN( el.offsetLeft ) && !isNaN( el.offsetTop ) ) {
        _x += el.offsetLeft - el.scrollLeft;
        _y += el.offsetTop - el.scrollTop;
        el = el.offsetParent;
      }
      return { top: _y, left: _x };
    }

    if(document.querySelector('.scroll-to-anchor')) {
      document.querySelector('.scroll-to-anchor').addEventListener('click', function(event) {
        window.scrollTo({
          top: getOffset(document.getElementById(document.querySelector('.scroll-to-anchor').getAttribute("href").replace('#',''))).top - 32,
          behavior: "smooth"
        });
  
        event.preventDefault()
      }, false);
    }

  }

}

// bootstrap
document.addEventListener("DOMContentLoaded", (e) => new App());
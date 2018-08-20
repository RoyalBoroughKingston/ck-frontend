import Vue from 'vue'
import { Router } from './vue/router.js';

import { Form } from "./modules/form.js";
import { Map } from "./modules/map.js";
import { Navigation } from "./modules/navigation.js";

export class App {
  constructor() {

    let form = new Form();
    let map = new Map();
    let navigation = new Navigation();

    // Init Vue
    let app = new Vue({
      el: '#app',
      data: {
        message: 'Hello Vue!'
      }
    });

    // Init Router
    let router = new Router();
  }

}

// bootstrap
document.addEventListener("DOMContentLoaded", (e) => new App());
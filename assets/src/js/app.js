import { Init } from "./app/init.js"
import { Form } from "./modules/form.js"
import { Map } from "./modules/map.js"
import { Navigation } from "./modules/navigation.js"

export class App {
  constructor() {

    let form = new Form();
    let map = new Map();
    let navigation = new Navigation();

    let init = new Init();

  }

}

// bootstrap
document.addEventListener("DOMContentLoaded", (e) => new App());
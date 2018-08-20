import { Form } from "./modules/form.js";
import { Navigation } from "./modules/navigation.js";

export class App {
  constructor() {
    let form = new Form();
    let navigation = new Navigation();
  }
}

// bootstrap
document.addEventListener("DOMContentLoaded", (e) => new App());
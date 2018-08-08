import { Accordion } from "./modules/accordion.js";
import { Modal } from "./modules/modal.js";
import { Navigation } from "./modules/navigation.js";

export class App {
  constructor() {
    let accordion = new Accordion();
    let modal = new Modal();
    let navigation = new Navigation();
  }
}

// bootstrap
document.addEventListener("DOMContentLoaded", (e) => new App());
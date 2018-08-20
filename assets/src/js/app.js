import { Navigation } from "./modules/navigation.js";

export class App {
  constructor() {
    let navigation = new Navigation();
  }
}

// bootstrap
document.addEventListener("DOMContentLoaded", (e) => new App());
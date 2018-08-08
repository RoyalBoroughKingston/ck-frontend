export class Navigation {

  constructor() {

    let navContainer = document.querySelector('.nav--primary');
    let navTrigger = document.querySelector('.nav-trigger');

    navTrigger.addEventListener('click', evt => {
      navContainer.classList.toggle('active');
    });

  }
  
}
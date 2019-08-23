export class Navigation {

  constructor() {

    let navContainer = document.querySelector('.header');
    let navTrigger = document.querySelector('.nav-trigger');

    navTrigger.addEventListener('click', evt => {
      navTrigger.classList.toggle('active');
      navContainer.classList.toggle('active');
    });

  }
  
}
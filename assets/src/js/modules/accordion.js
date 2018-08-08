export class Accordion {

  constructor() {

    let accordions = document.querySelectorAll('.accordion__title');

    Array.from(accordions).forEach((accordion) => {
      accordion.addEventListener('click', evt => {
        evt.target.parentElement.classList.toggle('active');
      });
    });
    
  }
  
}
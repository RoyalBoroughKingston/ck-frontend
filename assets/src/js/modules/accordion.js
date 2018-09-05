export class Accordion {

    constructor() {

        let accordions = document.querySelectorAll('.accordion__header');

        console.log(accordions)

        accordions.forEach((accordion) => {
            console.log(accordion)
            accordion.addEventListener('click', evt => {
                console.log('clicked')
                evt.target.parentElement.classList.toggle('active');
            });
        });
        
    }

}
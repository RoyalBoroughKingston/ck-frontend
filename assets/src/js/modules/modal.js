export class Modal {

  constructor() {

    let modalTrigger = document.querySelector('.modal-trigger');

    if(modalTrigger.length) {
      modalTrigger.addEventListener('click', evt => {
        event.preventDefault ? event.preventDefault() : (event.returnValue = false);
  
        var modal = document.querySelector('.modal[data-modal='+evt.target.dataset.modal+']');
        modal.classList.toggle('active');
  
        this.close(modal);
      });
    }

  }

  close(selector) {

    // Bind close button
    document.querySelector('.modal__close').addEventListener('click', evt => {
      event.preventDefault ? event.preventDefault() : (event.returnValue = false);

      selector.classList.toggle('active');
    });

  }
  
}
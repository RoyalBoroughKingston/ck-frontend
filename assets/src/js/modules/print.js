export class Print {

    constructor() {
  
      let printTriggers = document.querySelectorAll('a[href="#print"]');

      if(printTriggers)
        printTriggers.forEach((trigger) => {
            console.log(trigger)
            trigger.addEventListener('click', (e) => {
                console.log(e)
                e.preventDefault ? e.preventDefault() : e.returnValue = !1;
                
                // Print the window
                window.print()
            })
        })
  
    }
    
  }
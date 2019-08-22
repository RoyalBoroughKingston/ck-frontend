export class Print {

    constructor() {
  
      const printTriggers = Array.prototype.slice.call(document.querySelectorAll("a[href*='#print']"), 0)

      if(printTriggers)
        printTriggers.forEach((trigger) => {
            trigger.addEventListener('click', (e) => {
                e.preventDefault ? e.preventDefault() : e.returnValue = !1;
                
                // Print the window
                window.print()
            })
        })
  
    }
    
  }
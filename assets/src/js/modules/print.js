export class Print {

    constructor() {
  
      const printTriggers = document.querySelectorAll("a[href*='#print']")
      console.log(printTriggers)

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
export class ScrollToAnchor {

    constructor() {

        if(document.querySelector('.scroll-to-anchor')) {
            document.querySelector('.scroll-to-anchor').addEventListener('click', function(event) {
                window.scrollTo({
                    top: this.getOffset(document.getElementById(document.querySelector('.scroll-to-anchor').getAttribute("href").replace('#',''))).top - 32,
                    behavior: "smooth"
                });

                event.preventDefault()
            }, false);
        }
        
    }

    getOffset(el) {
        var _x = 0;
        var _y = 0;
        while( el && !isNaN( el.offsetLeft ) && !isNaN( el.offsetTop ) ) {
            _x += el.offsetLeft - el.scrollLeft;
            _y += el.offsetTop - el.scrollTop;
            el = el.offsetParent;
        }
        return { top: _y, left: _x };
    }

}
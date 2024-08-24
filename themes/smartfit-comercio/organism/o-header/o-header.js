
const gsapHeaderAnimation = (getHeader)=>{
    window.addEventListener('scroll', function() {
        var scrollPosition = window.scrollY || window.pageYOffset || document.documentElement.scrollTop;
        if (scrollPosition === 0) {
            getHeader.classList.remove('o-header--js-active');
        }
        if(scrollPosition > 50){
            getHeader.classList.add('o-header--js-active');
        }
    });
    
}


window.addEventListener('load', ()=>{
    const getHeader = document.querySelector('.o-header');
    gsapHeaderAnimation(getHeader);
})
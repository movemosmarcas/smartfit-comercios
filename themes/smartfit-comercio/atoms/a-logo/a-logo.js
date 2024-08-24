
const gsapLogoAnimation = ()=>{
    const getLogoImg = document.querySelector('.a-logo');
    window.addEventListener('scroll', () => {
        var scrollPosition = window.scrollY || window.pageYOffset || document.documentElement.scrollTop;
        if (scrollPosition === 0) {
            getLogoImg.classList.remove('a-logo--js-active');
        }
        if(scrollPosition > 100){
            getLogoImg.classList.add('a-logo--js-active');
        }
    });
}


window.addEventListener('load', ()=>{
    gsapLogoAnimation();
})
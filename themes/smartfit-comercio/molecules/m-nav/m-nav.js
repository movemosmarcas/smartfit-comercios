const mobileMenuShow = () => {

    const menuBtn = document.querySelector('.o-header__mobile-content');
    menuBtn.addEventListener('click', () => {
        const menu = document.querySelector('.o-header__content');
        menu.classList.toggle('has-show');
    })
}


window.addEventListener('load', () => {
    mobileMenuShow();
})
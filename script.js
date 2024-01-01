window.addEventListener('DOMContentLoaded', function () {


    // Menu burger

    const menubars = document.querySelector('.menu-bars');
    const menuclose = document.querySelector('.menu-close');
    const menuburger = document.querySelector('.menuburger');

    menubars.addEventListener('click', () => {
        menuburger.classList.add('open');
    });

    menubars.addEventListener('click', () => {
        menubars.classList.add('remove');
        menuclose.classList.add('open');
    });

    menuclose.addEventListener('click', () => {
        menuclose.classList.remove('open');
        menubars.classList.remove('remove');
        menuburger.classList.remove('open');
    });

    
})
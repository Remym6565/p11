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

    // Modale contact

    const contact = document.querySelector('.menu-item-50');
    const buttoncontact = document.querySelector('.button_contact');
    const popupoverlay = document.querySelector('.popup-overlay');

    const closecrosswhitecontact = document.querySelector('.closecrosswhitecontact');
    

    closecrosswhitecontact.addEventListener('click', () => {
        popupoverlay.classList.remove('popup');
        console.log(closecrosswhitecontact);
    });

    //version desktop
    contact.addEventListener('click', () => {
        popupoverlay.classList.add('popup');
    });

    // version mobile
    contact.addEventListener('click', () => {
        menuburger.classList.remove('open');
        popupoverlay.classList.add('popup');
    });


})


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

    //version desktop
    contact.addEventListener('click', () => {
        popupoverlay.classList.add('popup');
    });

    // version mobile
    contact.addEventListener('click', () => {
        menuburger.classList.remove('open');
        popupoverlay.classList.add('popup');
    });

    // Bouton contact sur un post 
    buttoncontact.addEventListener('click', () => {
        popupoverlay.classList.add('popup');
    });


    // Single post : change nav image

    const previousimage = document.querySelector('.photo_previous');
    const nextimage = document.querySelector('.photo_next');
    const arrowbefore = document.querySelector('.nav-previous');
    const arrowafter = document.querySelector('.nav-next');

    if (arrowbefore) {
        arrowbefore.addEventListener('mouseover', () => {
            previousimage.classList.remove('close');
            nextimage.classList.add('close');
        });
    }

    if (arrowafter) {
        arrowafter.addEventListener('mouseover', () => {
            nextimage.classList.remove('close');
            previousimage.classList.add('close');
        });
    }


    // Single post : input ref photo

    
    let refvalue = document.getElementById('ref').innerHTML;
    refvalue = refvalue.split(':')[1].trim();

    const refphoto = document.querySelector('input[name="your-subject"]');
    refphoto.value = refvalue;
    


    // Hover photo catalogue

    const fullicon = document.querySelector('#full_icon');
    console.log(fullicon);


})
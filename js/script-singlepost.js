window.addEventListener('DOMContentLoaded', function () {

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

    let refvalue = document.getElementById('ref');
    if (refvalue !==null) {
        refvalue = refvalue.innerHTML;
        refvalue = refvalue.split(':')[1].trim();
    }
  
    

    var refphoto = document.querySelector('input[name="your-subject"]');
    refphoto.value = refvalue;


    // Bouton contact sur un post 
    
    const buttoncontact = document.querySelector('.button_contact');
    const popupoverlay = document.querySelector('.popup-overlay');
    

    if (buttoncontact !==null) {
        buttoncontact.addEventListener('click', () => {
            popupoverlay.classList.add('popup');
        });
    }



})


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


    // Lightbox
    // function reloadEvents() {
    //     setTimeout(() =>  {
    //         const iconlightbox = document.querySelectorAll('.icon_lightbox');
    //         const lightbox = document.querySelector('.lightbox');
    //         const iconprevious = document.querySelector('.lightbox__prev');
    //         const iconnext = document.querySelector('.lightbox__next');
    //         const closeligthbox = document.querySelector('.lightbox__close');

    //         let photoIndex = 0;
    //         iconlightbox.forEach(element => {
    //             element.addEventListener('click', () => {
    //                 console.log(element);
    //                 const imglightboxcontainer = document.querySelector('.lightbox__container img');
    //                 imglightboxcontainer.src = element.dataset.src;

    //                 document.querySelector(".photo_info_ref p").innerText = element.dataset.ref;
    //                 document.querySelector(".photo_info_cat p").innerText = element.dataset.cat;

    //                 photoIndex = parseInt(element.dataset.index);

    //                 if (photoIndex == 1) iconprevious.classList.add('hidden');
    //                 if (photoIndex == iconlightbox.length) iconnext.classList.add('hidden');

    //                 lightbox.classList.toggle('open');
    //             });
    //         });

    //         iconprevious.addEventListener('click', () => {
    //             const previousIndex = parseInt(photoIndex - 1);
    //             const photoTarget = document.querySelector(`#thumbnail_${previousIndex} .thumbnails img`);
    //             const infosTarget = document.querySelector(`#thumbnail_${previousIndex} .icon_lightbox`);

    //             document.querySelector(".photo_info_ref p").innerText = infosTarget.dataset.ref;
    //             document.querySelector(".photo_info_cat p").innerText = infosTarget.dataset.cat;

    //             const imglightboxcontainer = document.querySelector('.lightbox__container img');
    //             imglightboxcontainer.src = photoTarget.src;

    //             photoIndex = previousIndex;

    //             if (photoIndex == 1) iconprevious.classList.add('hidden');
    //             if (photoIndex < iconlightbox.length) iconnext.classList.remove('hidden');
    //         });

    //         iconnext.addEventListener('click', () => {
    //             const nextIndex = parseInt(photoIndex + 1);
    //             const photoTarget = document.querySelector(`#thumbnail_${nextIndex} .thumbnails img`);
    //             const infosTarget = document.querySelector(`#thumbnail_${nextIndex} .icon_lightbox`);

    //             document.querySelector(".photo_info_ref p").innerText = infosTarget.dataset.ref;
    //             document.querySelector(".photo_info_cat p").innerText = infosTarget.dataset.cat;

    //             const imglightboxcontainer = document.querySelector('.lightbox__container img');
    //             imglightboxcontainer.src = photoTarget.src;

    //             photoIndex = nextIndex;

    //             if (photoIndex > 1) iconprevious.classList.remove('hidden');
    //             if (photoIndex == iconlightbox.length) iconnext.classList.add('hidden');
    //         });

    //         closeligthbox.addEventListener('click', () => {
    //             lightbox.classList.toggle('open');
    //         });
    //     }, 250)
    // }

    // reloadEvents();

    // const filters = document.querySelectorAll(".filters-and-sort select");
    // filters.forEach(element => {
    //     element.addEventListener('change', reloadEvents);
    // });
    
    // const loadMore = document.querySelector("#load-more-posts");
    // loadMore.addEventListener('click', reloadEvents);

    
    
    



    // // Single post : change nav image

    // const previousimage = document.querySelector('.photo_previous');
    // const nextimage = document.querySelector('.photo_next');
    // const arrowbefore = document.querySelector('.nav-previous');
    // const arrowafter = document.querySelector('.nav-next');

    // if (arrowbefore) {
    //     arrowbefore.addEventListener('mouseover', () => {
    //         previousimage.classList.remove('close');
    //         nextimage.classList.add('close');
    //     });
    // }

    // if (arrowafter) {
    //     arrowafter.addEventListener('mouseover', () => {
    //         nextimage.classList.remove('close');
    //         previousimage.classList.add('close');
    //     });
    // }


    // // Single post : input ref photo

    
    // let refvalue = document.getElementById('ref').innerHTML;
    // refvalue = refvalue.split(':')[1].trim();

    // const refphoto = document.querySelector('input[name="your-subject"]');
    // refphoto.value = refvalue;

    // // Bouton contact sur un post 
    // buttoncontact.addEventListener('click', () => {
    //     popupoverlay.classList.add('popup');
    // });


})


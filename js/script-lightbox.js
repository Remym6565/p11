window.addEventListener('DOMContentLoaded', function () {

    // Lightbox

    function reloadEvents() {
        setTimeout(() =>  {
            const iconlightbox = document.querySelectorAll('.icon_lightbox');
            const lightbox = document.querySelector('.lightbox');
            const iconprevious = document.querySelector('.lightbox__prev');
            const iconnext = document.querySelector('.lightbox__next');
            const closeligthbox = document.querySelector('.lightbox__close');

            let photoIndex = 0;
            iconlightbox.forEach(element => {
                element.addEventListener('click', () => {
                    console.log(element);
                    const imglightboxcontainer = document.querySelector('.lightbox__container img');
                    imglightboxcontainer.src = element.dataset.src;

                    document.querySelector(".photo_info_ref p").innerText = element.dataset.ref;
                    document.querySelector(".photo_info_cat p").innerText = element.dataset.cat;

                    photoIndex = parseInt(element.dataset.index);

                    if (photoIndex == 1) iconprevious.classList.add('hidden');
                    if (photoIndex == iconlightbox.length) iconnext.classList.add('hidden');

                    lightbox.classList.toggle('open');
                });
            });

            iconprevious.addEventListener('click', () => {
                const previousIndex = parseInt(photoIndex - 1);
                const photoTarget = document.querySelector(`#thumbnail_${previousIndex} .thumbnails img`);
                const infosTarget = document.querySelector(`#thumbnail_${previousIndex} .icon_lightbox`);

                document.querySelector(".photo_info_ref p").innerText = infosTarget.dataset.ref;
                document.querySelector(".photo_info_cat p").innerText = infosTarget.dataset.cat;

                const imglightboxcontainer = document.querySelector('.lightbox__container img');
                imglightboxcontainer.src = photoTarget.src;

                photoIndex = previousIndex;

                if (photoIndex == 1) iconprevious.classList.add('hidden');
                if (photoIndex < iconlightbox.length) iconnext.classList.remove('hidden');
            });

            iconnext.addEventListener('click', () => {
                const nextIndex = parseInt(photoIndex + 1);
                const photoTarget = document.querySelector(`#thumbnail_${nextIndex} .thumbnails img`);
                const infosTarget = document.querySelector(`#thumbnail_${nextIndex} .icon_lightbox`);

                document.querySelector(".photo_info_ref p").innerText = infosTarget.dataset.ref;
                document.querySelector(".photo_info_cat p").innerText = infosTarget.dataset.cat;

                const imglightboxcontainer = document.querySelector('.lightbox__container img');
                imglightboxcontainer.src = photoTarget.src;

                photoIndex = nextIndex;

                if (photoIndex > 1) iconprevious.classList.remove('hidden');
                if (photoIndex == iconlightbox.length) iconnext.classList.add('hidden');
            });

            closeligthbox.addEventListener('click', () => {
                lightbox.classList.toggle('open');
            });
        }, 250)
    }

    reloadEvents();

    const filters = document.querySelectorAll(".filters-and-sort select");
    filters.forEach(element => {
        element.addEventListener('change', reloadEvents);
    });
    
    const loadMore = document.querySelector("#load-more-posts");
    loadMore.addEventListener('click', reloadEvents);

})


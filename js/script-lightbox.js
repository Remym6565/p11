function reloadLightbox() {

    let photosArray = [];
    let index = 1;
    let targetPhoto;
    const allPhotosDiv = document.querySelectorAll('.container_photo');
    const iconLightbox = document.querySelectorAll('.icon_lightbox');
    const lightbox = document.querySelector('.lightbox');
    const iconprevious = document.querySelector('.lightbox__prev');
    const iconnext = document.querySelector('.lightbox__next');
    const closeligthbox = document.querySelector('.lightbox__close');
    const imglightboxcontainer = document.querySelector('.lightbox__container img');
    const photoInfoRepP = document.querySelector(".photo_info_ref p");
    const photoInfoCatP = document.querySelector(".photo_info_cat p")

    closeligthbox.addEventListener('click', () => {
        lightbox.classList.remove('open');
    });

    allPhotosDiv.forEach(Div => { // on boucle sur toutes les div photos, on récupère les attributs
        const srcPhoto = Div.dataset.src;
        const srcCat = Div.dataset.cat;
        const srcRef = Div.dataset.ref;

        photosArray.push({ // on ajoute au tableau les attributs de la photo précédemment récupérés
            'id': index,
            'img': srcPhoto,
            'cat': srcCat,
            'ref': srcRef
        });
        index++; // on incrémente pour avoir un identifiant unique pour chaque photo
    });


    console.log(photosArray);

    iconLightbox.forEach((icon, id) => { //on boucle sur le bouton d'ouverture de le lightbox
        icon.addEventListener('click', function () {

            targetPhoto = photosArray[id]; // targetPhoto = la photo actuelle

            if (targetPhoto.id === 1) { // si c'est la 1ere phto, alors on enleve le bouton précédent
                iconprevious.classList.add('hidden');
            };
            console.log(targetPhoto);
            if (targetPhoto.id === targetPhoto.length - 1) { // si c'est la derniere photo, alors on enlève le bouton next (17-1)
                iconnext.classList.add('hidden');
            };
            // on change la photo, cat et réf 
            imglightboxcontainer.src = targetPhoto.img;

            photoInfoRepP.innerText = targetPhoto.ref;
            photoInfoCatP.innerText = targetPhoto.cat;

            lightbox.classList.add('open'); // on affiche la lightbox
        })

    });

    iconprevious.addEventListener('click', () => {
        iconnext.classList.remove('hidden'); //on remet le bouton précédent
        const currentIdPhoto = targetPhoto.id - 1; // on récup l'id de la photo actuelle
        const previousPhoto = photosArray[currentIdPhoto - 1]; // on récupère la photo précédente dans le tableau qui comprend toutes les photos

        if (previousPhoto) { // si il exsite une photo précédente, on redéfinit la photo actuelle par la photo précédente
            targetPhoto = previousPhoto;
            imglightboxcontainer.src = targetPhoto.img;

            photoInfoRepP.innerText = targetPhoto.ref;
            photoInfoCatP.innerText = targetPhoto.cat;
        }
        else {
            iconprevious.classList.add('hidden'); // sinon on cache le bouton
        };

    });


    // opération inverse pour le bouton next
    iconnext.addEventListener('click', () => {
        iconprevious.classList.remove('hidden');
        const currentIdPhoto = targetPhoto.id - 1;
        const nextPhoto = photosArray[currentIdPhoto + 1];

        if (nextPhoto) {
            targetPhoto = nextPhoto;
            imglightboxcontainer.src = targetPhoto.img;

            photoInfoRepP.innerText = targetPhoto.ref;
            photoInfoCatP.innerText = targetPhoto.cat;
        }
        else {
            iconnext.classList.add('hidden');
        };
    });

}

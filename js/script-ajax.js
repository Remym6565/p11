
window.addEventListener('DOMContentLoaded', function () {
    jQuery(document).ready(function ($) {

        let loading = false; // on indique si le chargement est en cours ou non
        const $loadMoreButton = $('#load-more-posts'); // on sélectionne le bouton "Charger plus"
        const $container = $('.thumbnail-container-accueil'); // on sélectionne le conteneur de vignettes

        reloadLightbox();

        $loadMoreButton.on('click', function () {
            get_more_posts(true) // on appelle la fonction pour obtenir plus de publications 
        });



        function get_more_posts(load) {
            let inputPage = $('input[name="page"]');
            let page = parseInt(inputPage.val());
            page = load ? page + 1 : 1; // on incrémente le numéro de page si "load" est vrai, sinon réinitialise à 1.
            const category = $('select[name="category-filter"]').val();
            const format = $('select[name="format-filter"]').val();
            const dateSort = $('select[name="date-sort"]').val();

            console.log(category, format, dateSort, page);

            $.ajax({
                type: 'GET',
                url: wp_data.ajax_url, // défini dans functions.php
                data: {
                    action: 'load_more_posts',
                    page,
                    category,
                    format,
                    dateSort
                },
                success: function (response) {
                    if (response) {
                        if (load) {
                            $container.append(response); // on ajoute la réponse (nouvelles publications) au conteneur
                        } else {
                            $container.html(response); // on remplace le contenu du conteneur par la réponse (nouvelles publications)
                        }
                        $loadMoreButton.text('Charger plus'); // on remet le texte du bouton à "Charger plus"
                        inputPage.val(page); // on met à jour le numéro de page
                        loading = false; // on indique que le chargement est terminé
                        reloadLightbox();
                    } else {
                        if (load) {

                            $loadMoreButton.hide();
                        } else {
                            let txt = '<div style="text-align:center;width:100%; color: #000;font-family: Space Mono, monospace;font-size: 16px; margin-top:  45px"><p>Aucun résultat ne correspond aux filtres de recherche.<br>';
                            $container.html(txt); // on affiche un message si aucune réponse n'est trouvée
                        }
                    }
                    
                },
            });
            if (!loading) {
                loading = true;
            }
        }

        function recursive_change(selectId) {
            $('#' + selectId).change(function () {
                get_more_posts(false); // on appelle la fonction pour obtenir plus de publications sans "load"
                reloadLightbox();
            });
        }

        if ($('#category-filter').length) {
            recursive_change('category-filter'); // on pplique la fonction de changement aux filtres de catégorie
            reloadLightbox();
        }

        if ($('#format-filter').length) {
            recursive_change('format-filter'); // on applique la fonction de changement aux filtres de format
            reloadLightbox();
        }

        if ($('#date-sort').length) {
            recursive_change('date-sort'); // on applique la fonction de changement aux filtres de tri par date
            reloadLightbox();
        }

    })
})
<div class="lightbox">

    <div class="lightbox__prev">
        <button>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/arrowleftwhite.png">
            <p>Précédente</p>
        </button>
    </div>

    <div class="lightbox__container">
        <img src="" alt="" id="">
        <div class="photo-info-lightbox">
            <div class="photo_info_ref">
                <p><?php echo get_field('Référence'); ?></p>
            </div>
            <div class="photo_info_cat">
                <p><?php echo get_field('Catégorie'); ?></p>
            </div>
        </div>
    </div>

    <div class="lightbox__next">
        <button>
            <p>Suivante</p>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/arrowrightwhite.png">
        </button>
    </div>

    <div class="lightbox__close">
        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/closecrosswhite.png">
    </div>
</div>
<!-- <div id="lightbox-gallery" class="lightbox lightbox-overlay">
    <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/xmarkwhite.png'; ?>" class="lightbox-close lightbox-close-resp">
    <div class="lightbox-nav-photo lightbox-previous-photo"> 
        <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/arrowleftwhite.png'; ?>" class="lightbox-white-arrow-left">
        <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/icons8-back-96.png'; ?>" class="lightbox-white-arrow-left-resp">
        <p>Précédente</p>
    </div>
    <div class="lightbox-content">
        <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/xmarkwhite.png'; ?>" class="lightbox-close lightbox-close-desk">
        <img class="lightbox-image" src="" alt="">
        <div class="image-details">
            <p class="image-reference"></p>
            <p class="image-category"></p>
        </div>
    </div>
    <div class="lightbox-nav-photo lightbox-next-photo">
        <p>Suivante</p>
        <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/arrowrightwhite.png'; ?>" class="lightbox-white-arrow-right">
        <img src="<?php echo get_stylesheet_directory_uri() . '/assets/img/icons8-forward-96.png'; ?>" class="lightbox-white-arrow-right-resp">
    </div>
</div> -->


<div class="popup-overlay-lightbox ">

    <div class="popup-lightbox">

        <div class="closecrosswhite">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/closecrosswhite.png" class="closecross">
        </div>


        <?php twenty_twenty_one_post_thumbnail(); ?>

        <div class="photo-info-lightbox">

            <div class="photo-info-left">
                <p><?php echo get_field('Référence'); ?></p>
            </div>
            <div class="photo-info-right">
                <p><?php echo get_field('Catégorie'); ?></p>
            </div>

        </div>

    </div>

    <div class="post-navigation-lightbox">
        <?php

        $arrow_left = get_stylesheet_directory_uri() . '/assets/images/arrowleftwhite.png';
        $arrow_right = get_stylesheet_directory_uri() . '/assets/images/arrowrightwhite.png';

        the_post_navigation(
            array(
                'next_text' => '<img src="' . $arrow_right . '"class="arrow skip-lazy" alt="Next Image"><p>Suivante</p>',
                'prev_text' => '<p>Précédente</p><img src="' . $arrow_left . '"class="arrow skip-lazy" alt="Next Image">',
            )
        );

        ?>
    </div>

</div>
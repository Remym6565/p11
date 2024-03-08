
<div class="container_photo" data-src="<?= get_the_post_thumbnail_url() ?>" data-ref="<?= get_field('Référence') ?>" data-cat="<?= get_field('Catégorie') ?>">
    <div class="container_reference" id="<?= the_id() ?>">
        <div class="icon_lightbox">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/Icon_fullscreen.png" alt="" id="">
        </div>

        <a href="<?php echo get_permalink(); ?>">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/Icon_eye.png" alt="" id="icon_eye">
        </a>

        <div class="photo-info-leftandright">
            <div class="photo-info-left">
                <p><?php echo get_field('Référence'); ?></p>
            </div>
            <div class="photo-info-right">
                <p><?php echo get_field('Catégorie'); ?></p>
            </div>
        </div>

    </div>
    <div class="thumbnails" id="<?= the_id() ?>">
        <a href="<?php echo get_permalink(); ?>">
            <?php the_post_thumbnail(); ?>
        </a>
    </div>
</div>
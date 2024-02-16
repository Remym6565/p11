<!doctype html>
<html <?php language_attributes(); ?> <?php twentytwentyone_the_html_classes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <header>
        <div id="barmenu">
            <div id="topmenu">
                <!-- Logo -->
                <a href="<?php echo home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/Logo.png" alt="Logo Motaphoto" id="logo"></a>
                <!-- Navigation -->
                <?php if (!wp_is_mobile()) :  ?>
                    <nav class="menudesktop">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'main',
                            'menu_id' => 'primary-menu',
                        ));
                        ?>
                    </nav>
                <?php endif; ?>
                <div class="menu-bars">
                </div>
                <div class="menu-close">
                </div>
            </div>
        </div>
        <?php if (wp_is_mobile()) :  ?>
            <div class="menuburger">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'main',
                    'menu_id' => 'primary-menu',
                ));
                ?>
            </div>
        <?php endif; ?>



    </header>


    <?php if (is_front_page()) : ?>
        <div class="hero">
            <h1>Photographe Event</h1>

            <?php
            // 1. On définit les arguments pour définir ce que l'on souhaite récupérer
            $args = array(
                'post_type' => 'photo',
                'category_name' => '',
                'orderby' => 'rand',
                'posts_per_page' => '1'
            );

            // 2. On exécute la WP Query
            $my_query = new WP_Query($args);

            // 3. On lance la boucle !
            if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();

                    // the_title();
                    // the_content();
                    the_post_thumbnail();

                endwhile;
            endif;

            // 4. On réinitialise à la requête principale (important)
            wp_reset_postdata();
            ?>

        </div>

    <?php endif; ?>

    <!-- Contenu de la page -->
    <main id="content" class="content">

    <?php if (is_front_page()) : ?>
        <?php get_template_part('template-parts/homepage'); ?>
    <?php endif; ?>
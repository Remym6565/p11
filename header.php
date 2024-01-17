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
                <?php if (!wp_is_mobile()):  ?>
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
        <?php if (wp_is_mobile()):  ?>
        <div class="menuburger">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'main',
                'menu_id' => 'primary-menu',
            ));
            ?>
        </div> 
        <?php endif; ?>
        <?php if (is_front_page()) : ?>
            <div class="hero">
                <h1>Photographe Event</h1>
            </div>
        <?php endif; ?>
    </header>

    <!-- Contenu de la page -->
    <main id="content" class="content">
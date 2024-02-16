<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if (!function_exists('chld_thm_cfg_locale_css')) :
    function chld_thm_cfg_locale_css($uri)
    {
        if (empty($uri) && is_rtl() && file_exists(get_template_directory() . '/rtl.css'))
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter('locale_stylesheet_uri', 'chld_thm_cfg_locale_css');

if (!function_exists('child_theme_configurator_css')) :
    function child_theme_configurator_css()
    {
        wp_enqueue_style('chld_thm_cfg_child', trailingslashit(get_stylesheet_directory_uri()) . 'style.css', array('twenty-twenty-one-custom-color-overrides', 'twenty-twenty-one-style', 'twenty-twenty-one-style', 'twenty-twenty-one-print-style'));
    }
endif;
add_action('wp_enqueue_scripts', 'child_theme_configurator_css', 10);

// END ENQUEUE PARENT ACTION


function theme_enqueue_styles()
{
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/css/style.css');
    wp_enqueue_style('font-style', get_stylesheet_directory_uri() . '/css/fonts.css');
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');


function enqueue_custom_script()
{
    wp_enqueue_script('custom-script', get_stylesheet_directory_uri() . '/js/script.js');
    wp_enqueue_script('single-script', get_stylesheet_directory_uri() . '/js/script-singlepost.js');
    wp_enqueue_script('ajax-script', get_stylesheet_directory_uri() . '/js/script-ajax.js');
    wp_enqueue_script('lightbox-script', get_stylesheet_directory_uri() . '/js/script-lightbox.js');
    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/libs/jquery-3.7.1.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_script');


function register_my_menu()
{
    register_nav_menu('main', "Menu principal");
    register_nav_menu('footer', "Secondary Menu");
}
add_action('after_setup_theme', 'register_my_menu');



// Requete Ajax

function enqueue_infinite_pagination_js()
{
    wp_enqueue_script('infinite-pagination', get_template_directory_uri() . '/script-ajax.js', array('jquery'), '', true);
    // wp_enqueue_script('infinite-pagination', get_template_directory_uri() . '/js/infinite-pagination.js', array('jquery'), '', true);
    wp_localize_script('infinite-pagination', 'wp_data', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'enqueue_infinite_pagination_js');




function load_more_posts()
{
    $page = $_GET['page']; // Récupère le numéro de page à charger à partir de la requête GET

    $args_custom_posts = array(
        'post_type' => 'photo', // Type de publication personnalisée à charger
        'posts_per_page' => 8, // Nombre de publications à afficher par page
    );

    // Vérification des paramètres de catégorie et de format dans la requête GET
    if (
        $_GET['category'] != NULL &&
        $_GET['category'] != 'ALL' &&
        $_GET['format'] != NULL &&
        $_GET['format'] != 'ALL'
    ) {
        // Si à la fois la catégorie et le format sont spécifiés, nous créons une requête complexe (opérateur logique "ET")
        $args_custom_posts['tax_query'] = array(
            'relation' => 'AND', // Opérateur logique "ET" pour s'assurer que les deux requêtes sont satisfaites
            array(
                'taxonomy' => 'categorie_photos',
                'field'    => 'slug',
                'terms'    => $_GET['category']
            ),
            array(
                'taxonomy' => 'format',
                'field'    => 'slug',
                'terms'    => $_GET['format']
            )
        );
    } else {
        // Si seule la catégorie est spécifiée
        if (
            $_GET['category'] != NULL &&
            $_GET['category'] != 'ALL'
        ) {
            // Crée une requête pour filtrer par catégorie
            $args_custom_posts['tax_query'] = array(
                array(
                    'taxonomy' => 'categorie_photos',
                    'field'    => 'slug',
                    'terms'    => $_GET['category']
                )
            );
        }
        // Si seul le format est spécifié
        if (
            $_GET['format'] != NULL &&
            $_GET['format'] != 'ALL'
        ) {
            // Crée une requête pour filtrer par format
            $args_custom_posts['tax_query'] = array(
                array(
                    'taxonomy' => 'format',
                    'field'    => 'slug',
                    'terms'    => $_GET['format']
                )
            );
        }
    }
    $args_custom_posts['orderby'] = 'date'; // Trie les publications par date
    $args_custom_posts['order'] = $_GET['dateSort'] != 'ALL' ? $_GET['dateSort'] : 'DESC'; // Ordonne par ordre descendant si le tri par date est spécifié
    $args_custom_posts['paged'] = $page; // Gère la pagination en fonction du numéro de page

    $custom_posts_query = new WP_Query($args_custom_posts); // Effectue une requête WordPress pour obtenir les publications personnalisées

    if ($custom_posts_query->have_posts()) {
        $index = 1;
        while ($custom_posts_query->have_posts()) :
            $custom_posts_query->the_post();
            // Contenu | Article - Même format que dans "photo-block.php"
        ?>
            <div class="blog-posts custom-post-thumbnail">

                <?php if (has_post_thumbnail()) : ?>
                    <!-- <a href="<?php echo get_permalink(); ?>">
                            <div class="photo-info">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/Icon_fullscreen.png" alt="" id="full_icon">

                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/Icon_eye.png" alt="" id="icon_eye">

                                <div class="photo-info-leftandright">

                                    <div class="photo-info-left">
                                        <p><?php echo get_field('Référence'); ?></p>
                                    </div>
                                    <div class="photo-info-right">
                                        <p><?php echo get_field('Catégorie'); ?></p>
                                    </div>
                                </div>

                            </div>
                            <div class="background-black">
                                <?php
                                the_post_thumbnail();
                                ?>
                            </div>

                        </a> -->
                    
                    <div class="thumbnail-container">
                        <?php get_template_part('template-parts/photo-block'); ?>
                        <!-- <div class="container_photo" id="thumbnail_<?= $index ?>">
                            <div class="container_reference" id="<?= the_id() ?>">
                                <div class="icon_lightbox" data-index="<?= $index ?>" data-src="<?= get_the_post_thumbnail_url() ?>">
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
                                <?php the_post_thumbnail(); ?>
                            </div>
                        </div> -->
                    </div>
                <?php endif; ?>

            </div>
<?php
            $index++;
        // Fin de la structure du contenu de l'article
        endwhile;
        wp_reset_postdata(); // Réinitialise les données des publications personnalisées
    } else {
        // Aucun autre article à charger
    }
    die();
}

add_action('wp_ajax_load_more_posts', 'load_more_posts'); // Associe la fonction 'load_more_posts' à l'action AJAX 'wp_ajax_load_more_posts'
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');

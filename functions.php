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

if (!function_exists('chld_thm_cfg_parent_css')) :
    function chld_thm_cfg_parent_css()
    {
        wp_enqueue_style('chld_thm_cfg_parent', trailingslashit(get_template_directory_uri()) . 'style.css', array());
    }
endif;
add_action('wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10);

if (!function_exists('child_theme_configurator_css')) :
    function child_theme_configurator_css()
    {
        wp_enqueue_style('chld_thm_cfg_child', trailingslashit(get_stylesheet_directory_uri()) . 'style.css', array('chld_thm_cfg_parent'));
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
    wp_enqueue_script('lightbox-script', get_stylesheet_directory_uri() . '/js/script-lightbox.js');
    wp_enqueue_script('ajax-script', get_stylesheet_directory_uri() . '/js/script-ajax.js');
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
    wp_localize_script('infinite-pagination', 'wp_data', array('ajax_url' => admin_url('admin-ajax.php')));
}
add_action('wp_enqueue_scripts', 'enqueue_infinite_pagination_js');




function load_more_posts()
{
    $page = $_GET['page']; // on récupère le numéro de page à charger à partir de la requête GET

    $args_custom_posts = array(
        'post_type' => 'photo', 
        'posts_per_page' => 8, 
    );

    // on vérifie des paramètres de catégorie et de format dans la requête GET
    if (
        $_GET['category'] != NULL &&
        $_GET['category'] != 'ALL' &&
        $_GET['format'] != NULL &&
        $_GET['format'] != 'ALL'
    ) {
        // si à la fois la catégorie et le format sont spécifiés, on crée une requête complexe ( avec opérateur logique "ET")
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
        // si seulement la catégorie est spécifiée
        if (
            $_GET['category'] != NULL &&
            $_GET['category'] != 'ALL'
        ) {
            // on crée une requête pour filtrer par catégorie
            $args_custom_posts['tax_query'] = array(
                array(
                    'taxonomy' => 'categorie_photos',
                    'field'    => 'slug',
                    'terms'    => $_GET['category']
                )
            );
        }
        // si seulement le format est spécifié
        if (
            $_GET['format'] != NULL &&
            $_GET['format'] != 'ALL'
        ) {
            // on crée une requête pour filtrer par format
            $args_custom_posts['tax_query'] = array(
                array(
                    'taxonomy' => 'format',
                    'field'    => 'slug',
                    'terms'    => $_GET['format']
                )
            );
        }
    }
    $args_custom_posts['orderby'] = 'date'; // on trie les publications par date
    $args_custom_posts['order'] = $_GET['dateSort'] != 'ALL' ? $_GET['dateSort'] : 'DESC'; // on ordonne par ordre descendant si le tri par date est spécifié
    $args_custom_posts['paged'] = $page; // on gère la pagination en fonction du numéro de page

    $custom_posts_query = new WP_Query($args_custom_posts); // on ffectue une requête WordPress pour obtenir les publications personnalisées

    if ($custom_posts_query->have_posts()) {
        $index = 1;
        while ($custom_posts_query->have_posts()) :
            $custom_posts_query->the_post();
?>
            <div class="blog-posts custom-post-thumbnail">

                <?php if (has_post_thumbnail()) : ?>

                    <div class="thumbnail-container">
                        <?php get_template_part('template-parts/photo-block'); ?>
                    </div>
                <?php endif; ?>

            </div>
<?php
            $index++;
        endwhile;
        wp_reset_postdata();
    } else {
    }
    die();
}

add_action('wp_ajax_load_more_posts', 'load_more_posts'); // on associe la fonction 'load_more_posts' à l'action AJAX 'wp_ajax_load_more_posts'
add_action('wp_ajax_nopriv_load_more_posts', 'load_more_posts');

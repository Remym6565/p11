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
    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/style.css', array(), filemtime(get_stylesheet_directory() . '/style.css'));
    wp_enqueue_style('font-style', get_stylesheet_directory_uri() . '/fonts.css');
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');


function enqueue_custom_script()
{
    wp_enqueue_script('custom-script', get_stylesheet_directory_uri() . '/script.js');
    wp_enqueue_script('ajax-script', get_stylesheet_directory_uri() . '/script-ajax.js');
    wp_enqueue_script('jquery', get_template_directory_uri() . '/libs/jquery-3.7.1.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_script');


function register_my_menu()
{
    register_nav_menu('main', "Menu principal");
    register_nav_menu('footer', "Secondary Menu");
}
add_action('after_setup_theme', 'register_my_menu');



function blog_scripts()
{
    // Register the script
    wp_register_script('custom-script', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'), false, true);

    // Localize the script with new data
    $script_data_array = array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'security' => wp_create_nonce('load_more_posts'),
    );
    wp_localize_script('custom-script', 'blog', $script_data_array);

    // Enqueued script with localized data.
    wp_enqueue_script('custom-script');
}
add_action('wp_enqueue_scripts', 'blog_scripts');


add_action('wp_ajax_load_posts_by_ajax', 'load_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax', 'load_posts_by_ajax_callback');


function load_posts_by_ajax_callback()
{
    check_ajax_referer('load_more_posts', 'security');
    $paged = $_POST['page'];
    $args = array(
        'post_type' => 'photo',
        'post_status' => 'publish',
        'posts_per_page' => '8',
        'paged' => $paged,
    );
    $blog_posts = new WP_Query($args);
?>

    <?php if ($blog_posts->have_posts()) : ?>
        <?php while ($blog_posts->have_posts()) : $blog_posts->the_post(); ?>
            <a href="<?php echo get_permalink(); ?>">
                <?php
                the_post_thumbnail();
                ?>
            </a>
        <?php endwhile; ?>
<?php
    endif;

    wp_die();
}

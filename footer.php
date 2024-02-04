<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
</main><!-- #main -->
</div><!-- #primary -->
</div><!-- #content -->

<footer id="footer" class="site-footer">

	<?php get_template_part('template-parts/popup-contact'); ?>
	<?php get_template_part('template-parts/lightbox'); ?>

	<?php
	wp_nav_menu(array(
		'theme_location' => 'footer',
		'menu_id' => 'footer-menu',
	));
	wp_footer();
	?>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
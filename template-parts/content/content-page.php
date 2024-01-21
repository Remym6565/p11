<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php echo('content-page.php')?>
	

	<div class="center">
		<div class="posts_homepage">


			<div class="">
				<?php
				$args = array(
					'post_type' => 'photo',
					'post_status' => 'publish',
					'posts_per_page' => '8',
					'paged' => 1,
				);
				$blog_posts = new WP_Query($args);
				?>

				<?php if ($blog_posts->have_posts()) : ?>
					<div class="blog-posts">
						<?php while ($blog_posts->have_posts()) : $blog_posts->the_post();
							the_post_thumbnail();
						?>
						<?php endwhile; ?>
					</div>
					<div class="center">
						<button class="loadmore">Charger plus</button>
					</div>
					
				<?php endif; ?>
			</div>




			<?php
			// // 1. On définit les arguments pour définir ce que l'on souhaite récupérer
			// $args = array(
			// 	'post_type' => 'photo',
			// 	'category_name' => '',
			// 	'posts_per_page' => 8,
			// );

			// // 2. On exécute la WP Query
			// $my_query = new WP_Query($args);

			// // 3. On lance la boucle !
			// if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();


			// 		the_post_thumbnail();
			// 	// the_title(); 
			// 	// get_field('Catégorie'); // ??



			// 	// the_permalink();

			// 	// $linkpost = get_post_permalink( $id );



			// 	// $Post = get_post();
			// 	// 				$Thumbnail = get_the_post_thumbnail($Post->ID);
			// 	// 				post_link('%link', $Thumbnail);



			// 	endwhile;
			// endif;

			// // 4. On réinitialise à la requête principale (important)
			// wp_reset_postdata();
			?>

		</div>

	</div>


</article><!-- #post-<?php the_ID(); ?> -->
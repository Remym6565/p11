<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

/* Start the Loop */
while (have_posts()) :
	the_post();
?>

	<article class='single_post' id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="border">
			<div class="center">
				<div class="main_post">
					<div class="description_post div1">
						<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
						<p id="ref">Référence : <?= get_field('Référence') ?></p>
						<p>Catégorie : <?= get_field('Catégorie') ?></p>
						<p>Format : <?= get_field('Format') ?></p>
						<p>Type : <?= get_field('type') ?></p>
						<p>Année : <?= get_field('annee') ?></p>
					</div>
					<div class='image_post div2'>
						<?php twenty_twenty_one_post_thumbnail(); ?>
					</div>
				</div>
			</div>
		</div>
		<div class="border">
			<div class="center">
				<div class="block_link">
					<div class="column_contact_main div1">
						<div class="margin_right column_contact">
							<p>Cette photo vous intéresse ?</p>
							<button class="button_contact">Contact</button>
						</div>
					</div>


					<div class="column_nav div2">
						<div class="container_thumb">
							<div class="photo_previous close">
								<?php
								$prevPost = get_previous_post();
								$prevThumbnail = get_the_post_thumbnail($prevPost->ID);
								previous_post_link('%link', $prevThumbnail);
								?>
							</div>
							<div class="photo_next">
								<?php
								$nextPost = get_next_post();
								if ($nextPost) {
									$nextThumbnail = get_the_post_thumbnail($nextPost->ID);
									next_post_link('%link', $nextThumbnail);
								} else {
									$prevThumbnail = get_the_post_thumbnail($prevPost->ID);
									previous_post_link('%link', $prevThumbnail);
								}
								?>
							</div>
						</div>
						<div class="">
							<?php

							$arrow_left = get_stylesheet_directory_uri() . '/assets/images/Lineleft.svg';
							$arrow_right = get_stylesheet_directory_uri() . '/assets/images/Lineright.svg';

							the_post_navigation(
								array(
									'next_text' => '<img src="' . $arrow_right . '"class="arrow skip-lazy" alt="Next Image">',
									'prev_text' => '<img src="' . $arrow_left . '"class="arrow skip-lazy" alt="Next Image">',
								)
							);

							?>
						</div>
					</div>


				</div>
			</div>
		</div>

		<div class="center">
			<div class="photos_apparentees">
				<div class="width1440">
					<h3>Vous aimerez aussi</h3>
					<div class="posts_homepage">

						<?php
						$categories = get_the_terms(get_the_ID(), 'categorie_photos');

						$current_category_slugs = array();
						if ($categories) {
							foreach ($categories as $category) {
								$current_category_slugs[] = $category->slug;
							}
						}

						$exclude_ids = array(get_the_ID());

						$args_related_photos = array(
							'post_type' => 'photo',
							'posts_per_page' => 2,
							'post__not_in' => $exclude_ids,
							'orderby' => 'rand',
							'tax_query' => array(
								array(
									'taxonomy' => 'categorie_photos',
									'field' => 'slug',
									'terms' => $current_category_slugs,
								),
							),
						);

						$my_query = new WP_Query($args_related_photos);

						if ($my_query->have_posts()) : ?>

							<div class="thumbnail-container single-thumbnail-container">
								<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
									<?php get_template_part('template-parts/photo-block'); ?>
								<?php endwhile; ?>
							</div>

						<?php endif; ?>
						<?php wp_reset_postdata(); ?>

					</div>
				</div>
			</div>
		</div>



	</article>


<?php
endwhile; // End of the loop.

get_footer();

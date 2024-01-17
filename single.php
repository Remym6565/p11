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
						<div class="">
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
								}else {
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
				<div>
					<h3>Vous aimerez aussi</h3>
					<div class="photos-container">
						<?php
						$category = get_the_category()[0]->slug;
						$args = array(
							'post_type' => 'photos',
							'posts_per_page' => 2,
							'category_name' => $category,
							'post__not_in' => array(get_the_ID()),
						);

						$query = new WP_Query($args);

						if ($query->have_posts()) {
							while ($query->have_posts()) {
								$query->the_post();
						?>
								<div class="photos-catalogue">
									<img src="<?= get_field('affichage_photo') ?>" class="photo-catalogue photo-catalogue-overlay" alt="<?= get_the_title() ?>" data-url="<?= get_field('affichage_photo') ?>" data-reference="Réf. photo : <?= get_field('reference_photo') ?>" data-category="Catégorie : <?= get_the_category()[0]->name ?>" data-post-id="<?= get_the_ID() ?>">
									<div class="photo-detail-expand">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/expand.png" class="photo-expand" alt="icon photo-expand">
										<p class="photo-expand-message">Agrandir cette photo</p>
									</div>
									<a href="<?= get_permalink() ?>" class="photo-detail-link">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/eye-regular.png" class="photo-infolink" alt="icon photo-infolink">
										<p class="photo-infolink-message">Plus d'infos sur cette photo</p>
									</a>
								</div>
						<?php
							}
						} else {
							echo 'Aucune autre photo trouvée dans cette catégorie.';
						}


						// Remettre les données du post principal
						wp_reset_postdata();

						// Compter le nombre total de photos dans la catégorie
						$total_photos_args = array(
							'post_type' => 'photos',
							'category_name' => $category,
							'post__not_in' => array(get_the_ID()),
							'fields' => 'ids',
						);

						$total_photos_query = new WP_Query($total_photos_args);
						$total_photos = $total_photos_query->found_posts;
						echo '</div>';
						if ($total_photos > 2) {
							echo '<button class="load-more-btn photos-container-btn" data-post-id="' . get_the_ID() . '">Toutes les photos</button>';
						}
						?>
					</div>
				</div>
			</div>
		</div>



	</article>


<?php
endwhile; // End of the loop.

get_footer();

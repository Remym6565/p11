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

<div class="center">
	<div class="filters-and-sort">

		<label for="category-filter"></label>
		<select name="category-filter" id="category-filter">
			<option value="ALL">CATÉGORIES</option>
			<?php
			$photo_categories = get_terms('categorie_photos');
			foreach ($photo_categories as $category) {
				echo '<option value="' . $category->slug . '">' . $category->name . '</option>';
			}
			?>
		</select>

		<label for="format-filter"></label>
		<select name="format-filter" id="format-filter">
			<option value="ALL">FORMAT</option>
			<?php
			$photo_formats = get_terms('format');
			foreach ($photo_formats as $format) {
				echo '<option value="' . $format->slug . '">' . $format->name . '</option>';
			}
			?>
		</select>

		<label for="date-sort"></label>
		<select name="date-sort" id="date-sort">
			<option value="ALL">TRIER PAR</option>
			<option value="DESC">À partir des plus récentes</option>
			<option value="ASC">À partir des plus anciennes</option>
		</select>

	</div>
</div>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="center">
		<div class="posts_homepage">
			<input type="hidden" name="page" value="1">
			<div class="thumbnail-container-accueil">
				<?php

				$args = array(
					'post_type' => 'photo',
					'posts_per_page' => '8',
					'orderby' => 'date',
					'order' => 'DESC',
				);

				$index = 1;

				$blog_posts = new WP_Query($args);

				?>

				<?php if ($blog_posts->have_posts()) : ?>
					<div class="thumbnail-container">
						<?php while ($blog_posts->have_posts()) : $blog_posts->the_post(); ?>
							<?php get_template_part('template-parts/photo-block'); ?>
						<?php
							$index++;
						endwhile;
						?>
						<?php wp_reset_postdata();
						?>
					</div>
				<?php endif; ?>
			</div>
			<div class="center">
				<button class="loadmore" id="load-more-posts">Charger plus</button>
			</div>

		</div>

	</div>
</article>
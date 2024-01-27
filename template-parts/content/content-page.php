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
			<option value="DESC">Du plus récent au plus ancien</option>
			<option value="ASC">Du plus ancien au plus récent</option>
		</select>

	</div>
</div>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

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
						<?php while ($blog_posts->have_posts()) : $blog_posts->the_post(); ?>
							<a href="<?php echo get_permalink(); ?>">
								<?php
								the_post_thumbnail();
								?>
							</a>
						<?php endwhile; ?>
					</div>
					<div class="center">
						<button class="loadmore">Charger plus</button>
					</div>

				<?php endif; ?>
			</div>

		</div>

	</div>
</article><!-- #post-<?php the_ID(); ?> -->
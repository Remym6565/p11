<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

<article class='single_post' id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="center">
		<div class="main_post">

			<div class="description_post div1">
				<?php the_title('<h1 class="entry-title">', '</h1>'); ?>
				<p>Référence : <?= get_field('Référence') ?></p>
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

</article><!-- #post-<?php the_ID(); ?> -->
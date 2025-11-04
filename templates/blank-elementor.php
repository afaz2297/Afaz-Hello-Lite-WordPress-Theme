<?php
/**
 * Template Name: Blank Elementor
 * Description: A minimal blank page template for building Elementor full-width pages.
 * Author: Afaz Alif
 */

get_header(); ?>

<div class="elementor-blank-page">

	<?php
	while (have_posts()) : the_post();
		the_content();
	endwhile;
	?>

</div>

<?php get_footer(); ?>

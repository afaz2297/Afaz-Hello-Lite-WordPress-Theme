<?php get_header(); ?>

<div class="wrap">

	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			</article>

		<?php endwhile; ?>
	<?php else : ?>

		<p><?php _e('No posts found.', 'afaz-hello-lite'); ?></p>

	<?php endif; ?>

</div>

<?php get_footer(); ?>

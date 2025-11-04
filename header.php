<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header wrap" role="banner">
	<div class="site-branding">
		<?php
		if (function_exists('the_custom_logo') && has_custom_logo()) {
			the_custom_logo();
		} else {
			?>
			<a class="site-title" href="<?php echo esc_url(home_url('/')); ?>">
				<?php bloginfo('name'); ?>
			</a>
			<?php
		}
		?>
	</div>

	<nav class="site-navigation" role="navigation">
		<?php
		wp_nav_menu(array(
			'theme_location' => 'primary',
			'container'      => false,
			'menu_class'     => 'primary-menu',
			'fallback_cb'    => false,
		));
		?>
	</nav>
</header>

<main id="site-content">

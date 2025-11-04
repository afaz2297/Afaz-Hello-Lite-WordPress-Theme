<?php
/**
 * Theme Functions
 *
 * Theme Name: Afaz Hello Lite
 * Author: Afaz Alif
 * Author URI: https://afazpro.com
 * Theme URI: https://github.com/afaz2297/afaz-hello-lite
 * Description: Ultra-lightweight Elementor supported starter theme by Afaz Alif.
 */

// Prevent direct access
if (!defined('ABSPATH')) exit;

/**
 * Define theme constants
 */
define('AFZ_THEME_VERSION', '1.0.0');
define('AFZ_THEME_DIR', get_template_directory());
define('AFZ_THEME_URI', get_template_directory_uri());

/**
 * Enqueue Styles & Scripts
 */
function afaz_enqueue_assets() {
    // Main stylesheet
    wp_enqueue_style('afaz-style', get_stylesheet_uri(), array(), AFZ_THEME_VERSION);

    // Minimal JS (optional placeholder)
    wp_register_script('afaz-main', AFZ_THEME_URI . '/assets/js/main.js', array('jquery'), AFZ_THEME_VERSION, true);
    // wp_enqueue_script('afaz-main'); // Uncomment if you later add JS
}
add_action('wp_enqueue_scripts', 'afaz_enqueue_assets');

/**
 * Theme Setup
 */
function afaz_theme_setup() {

    // Title Tag Support
    add_theme_support('title-tag');

    // Featured Images
    add_theme_support('post-thumbnails');

    // HTML5 Support
    add_theme_support('html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ));

    // Responsive Embeds
    add_theme_support('responsive-embeds');

    // Custom Logo
    add_theme_support('custom-logo');

    // Wide & Full Alignment for Gutenberg
    add_theme_support('align-wide');

    // Register Menu
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'afaz-hello-lite'),
    ));

    // WooCommerce Compatibility
    add_theme_support('woocommerce');
}
add_action('after_setup_theme', 'afaz_theme_setup');

/**
 * Register Widgets
 */
function afaz_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'afaz-hello-lite'),
        'id'            => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'afaz_widgets_init');


/**
 * Add Custom Page Template for Elementor Blank Page
 */
function afaz_register_templates($templates) {
    $templates['blank-elementor.php'] = __('Blank Elementor', 'afaz-hello-lite');
    return $templates;
}
add_filter('theme_page_templates', 'afaz_register_templates');

function afaz_template_include($template) {
    if (is_page() && get_page_template_slug() === 'blank-elementor.php') {
        $file = AFZ_THEME_DIR . '/templates/blank-elementor.php';
        if (file_exists($file)) return $file;
    }
    return $template;
}
add_filter('template_include', 'afaz_template_include');


/**
 * Make Theme Translation Ready
 */
function afaz_load_textdomain() {
    load_theme_textdomain('afaz-hello-lite', AFZ_THEME_DIR . '/languages');
}
add_action('after_setup_theme', 'afaz_load_textdomain');

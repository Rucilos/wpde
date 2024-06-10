<?php
/**
 * The template for displaying category pages.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress Development Environment ("WPDE")
 * @author Jindřich Ručil
 * @since 1.0.0
 */
?>

<?php
require_once 'inc/class-wpde.php';

/**
 * Returns the main instance of WPDE to prevent the need to use globals.
 *
 * This function returns the main instance of the WPDE class to prevent the need for using globals.
 * It initializes and returns the WPDE instance, allowing access to its methods and properties.
 *
 * @return object|WPDE The main instance of the WPDE class.
 * @since  1.0.0
 */
function WPDE() {
    $instance = WPDE::instance(__FILE__, '1.0.0');

    return $instance;
} // END WPDE()

WPDE();

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_filter('the_content_feed', 'wp_staticize_emoji');
remove_filter('comment_text_rss', 'wp_staticize_emoji');

remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_footer', 'wp_enqueue_global_styles', 1 );
remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );

add_action('wp_enqueue_scripts', function() {
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'classic-theme-styles' );
});

add_filter( 'should_load_separate_core_block_assets', '__return_true' );
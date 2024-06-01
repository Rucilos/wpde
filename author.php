<?php
/**
 * The template for displaying author archive pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#author-display
 *
 * @package WordPress Development Environment ("WPDE")
 * @author Jindřich Ručil
 * @since 1.0.0
 */
?>

<?php
get_header();
get_template_part('template-parts/template', get_post_type());
get_footer();


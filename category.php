<?php
/**
 * The template for displaying category pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#category
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


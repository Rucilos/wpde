<?php
/**
 * The template for displaying single page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-page
 *
 * @package WordPress Development Environment ("WPDE")
 * @author Jindřich Ručil
 * @since 1.0.0
 */
?>

<?php 
get_header();
get_template_part('template-parts/content', 'page');
get_footer();

<?php
/**
* The template for displaying front page.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#front-page-display
*
* @package WordPress Development Environment ("WPDE")
* @author Jindřich Ručil
* @since 1.0.0
*/
?>

<?php
get_header();
get_template_part('template-parts/component', 'carousel');
get_template_part('template-parts/section', 'icons');

get_footer();


<?php
/**
* The template for displaying front page.
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/#front-page-display
*
* @package WordPress Development Environment (WPDE)
* @author Jindřich Ručil
* @since 1.0.0
*/
?>

<?php 
get_header();

$header = get_field('wpde_header', 'option');

switch ($header) {
    case 'Simple':
        get_template_part('template-parts/header', 'simple');
        break;
    case 'Reviews':
        get_template_part('template-parts/header', 'reviews');
        break;
    case 'Image':
        get_template_part('template-parts/header', 'image');
        break;
    case 'Carousel':
        get_template_part('template-parts/header', 'carousel');
        break;
    default:
        get_template_part('template-parts/header', 'simple');
        break;
}

get_template_part('template-parts/section', 'logos');
get_template_part('template-parts/section', 'posts');
get_template_part('template-parts/section', 'icons');
get_template_part('template-parts/section', 'gallery');

get_footer();

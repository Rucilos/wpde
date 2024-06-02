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

if (have_posts()) {
    while (have_posts()) {
        the_post();
        if (is_page('sign-in')) {
            get_template_part('template-parts/form', 'login');
        } else {
            get_template_part('template-parts/content', 'page');
        }
    }
    wp_reset_postdata();
}

get_footer();


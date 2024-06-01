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
        get_template_part('template-parts/content', 'page');
        if (is_page('contacts')) {
            get_template_part('template-parts/form', 'contact');
        }
        if (is_page('sign-in')) {
            get_template_part('template-parts/form', 'login');
        }
    }
    wp_reset_postdata();
}

get_footer();


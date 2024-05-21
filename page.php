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

<?php get_header(); ?>

<?php if (have_posts()) { ?>
<div class="container py-5">
    <?php
        while (have_posts()) {
            the_post();
            get_template_part('template-parts/content', 'page');
            if(is_page('contacts')) {
                get_template_part('template-parts/form', 'contact');
            }
        }
        wp_reset_postdata();
    ?>
</div>
<?php } ?>

<?php get_footer(); ?>

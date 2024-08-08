<?php
/**
 * The template for displaying single post.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress Development Environment (WPDE)
 * @author Jindřich Ručil
 * @since 1.0.0
 */
?>

<?php get_header(); ?>

<div class="container py-6">
    <div class="row justify-content-center">
		<?php
		if (have_posts()) {
			while (have_posts()) {
				the_post();
				get_template_part('template-parts/content', 'single');
			}
			wp_reset_postdata();
		}
?>
    </div>
</div>

<?php get_footer(); ?>

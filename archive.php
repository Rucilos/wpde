<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#custom-post-types
 *
 * @package WordPress Development Environment ("WPDE")
 * @author Jindřich Ručil
 * @since 1.0.0
 */
?>

<?php get_header(); ?>

<div class="container py-5">
<div class="pb-5 mb-5 border-bottom">
        <small class="text-primary"><strong><?php _e('Archive page', 'wpde'); ?></strong></small>	
        <h1 class="mb-2"><?php _e('Content matching your query', 'wpde') ?></h1>
        <p><?php _e('Explore our latest articles and resources matching your search query.', 'wpde'); ?></p>
	</div>
    <div class="row row-gap-5">
        <?php 
        if (have_posts()) { 
            while (have_posts()) {
                the_post();
                echo '<div class="col-md-4">';
                get_template_part('template-parts/content', 'post');
                echo '</div>';
            }
            wp_reset_postdata();
            get_template_part('template-parts/content', 'pagination');
        } else { 
            $html  = '<div class="col-lg-12">';
            $html .= '<p class="text-danger mb-0">' . __('Sorry, no data was found.', 'wpde') . '</p>';
            $html .= '</div>';

            echo $html;
        } 
        ?>
    </div>
</div>

<?php get_footer(); ?>


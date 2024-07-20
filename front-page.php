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

<?php get_header(); ?>

<?php
get_template_part('template-parts/section', 'header');
//get_template_part('template-parts/component', 'carousel');
get_template_part('template-parts/section', 'icons');
get_template_part('template-parts/section', 'gallery');
?>

<div class="container-fluid px-0 py-6">
    <div class="container">
        <div class="pb-5 mb-4 border-bottom">
            <small class="text-primary">
                <strong>
                    <?php _e('Category', 'wpde'); ?>
                </strong>
            </small>    
            <h1 class="mb-2">
                <?php _e('News', 'wpde'); ?>
            </h1>
            <p class="mb-0 text-muted">
                <?php _e('Explore our latest articles and resources in this category.', 'wpde'); ?>
            </p>
        </div>
        <div class="row row-gap-5">
            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'cat' => get_queried_object_id(),
                'orderby' => 'date',
                'order' => 'DESC'
            );
            $query = new WP_Query($args);

            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    echo '<div class="col-md-4">';
                    get_template_part('template-parts/content', 'post');
                    echo '</div>';
                }
                wp_reset_postdata();
            } else {
            ?>
                <div class="col-lg-12">';
                <p class="text-danger mb-0"><?php _e('Sorry, no data was found in this category.', 'wpde'); ?></p>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php
get_footer();


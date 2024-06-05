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
?>

<div class="container-fluid px-0 py-5">
    <div class="container">
        <div class="pb-5 mb-4 border-bottom">
            <small class="text-primary">
                <strong>
                    <?php _e('Category', 'wpde'); ?>
                </strong>
            </small>    
            <h1 class="mb-2">
                <?php echo single_cat_title('', false); ?>
            </h1>
            <p class="mb-0 text-muted">
                <?php echo strip_tags(category_description()); ?>
            </p>
        </div>
        <div class="row row-gap-5">
            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 3,
                'category_name' => single_cat_title('', false), // Or you can use 'cat' => get_queried_object_id()
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
                get_template_part('template-parts/content', 'pagination');
            } else {
                echo '<div class="col-lg-12">';
                echo '<p class="text-danger mb-0">' . __('Sorry, no data was found in this category.', 'wpde') . '</p>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</div>

<?php
get_footer();


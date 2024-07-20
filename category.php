<?php
/**
 * The template for displaying category pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#category
 *
 * @package WordPress Development Environment (WPDE)
 * @author Jindřich Ručil
 * @since 1.0.0
 */
?>

<?php get_header(); ?>

<div class="container-fluid px-0 py-6">
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
            <?php if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    $grid = get_field('grid_category');
                    $grid = !empty($grid) ? $grid : 4;

                    echo '<div class="col-md-' . $grid . '">';
                        get_template_part('template-parts/content', 'post');
                    echo '</div>';
                }
                wp_reset_postdata();
                get_template_part('template-parts/content', 'pagination');
            } else {
                $html = '<div class="col-lg-12">';
                $html .= '<p class="text-danger mb-0">' . __('Sorry, no data was found in this category.', 'wpde') . '</p>';
                $html .= '</div>';

                echo $html;
            } ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>


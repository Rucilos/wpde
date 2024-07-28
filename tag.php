<?php
/**
 * The template for displaying tag pages.
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
        <div class="pb-5 mb-6 border-bottom">
            <small class="text-primary">
                <strong>
                    <?php _e('Tag', 'wpde'); ?>
                </strong>
            </small>	
            <h1 class="mb-2">
                <?php echo esc_html(single_tag_title('', false)); ?>
            </h1>
            <p class="mb-0 text-muted">
                <?php echo wp_kses_post(tag_description()); ?>
            </p>
        </div>
        <div class="row row-gap-5">
            <?php 
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    $grid = get_field('wpde_grid', 'option');
                    if ($grid) {
                        $grid = intval($grid['tag']); 
                    } else {
                        $grid = 4;
                    }
                    echo '<div class="col-md-' . esc_attr($grid) . '">'; 
                        get_template_part('template-parts/content', 'post');
                    echo '</div>';
                }
                get_template_part('template-parts/content', 'pagination');
                wp_reset_postdata();
            } else {
                $html = '<div class="col-lg-12">';
                $html .= '<p class="text-danger mb-0">' . esc_html(__('Sorry, no data was found with this tag.', 'wpde')) . '</p>'; 
                $html .= '</div>';

                echo $html;
            } 
            ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>

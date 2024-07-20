<?php
/**
 * The template for displaying author archive pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#author-display
 *
 * @package WordPress Development Environment (WPDE)
 * @author Jindřich Ručil
 * @since 1.0.0
 */
?>

<?php get_header(); ?>

<?php
$user_id = get_query_var('author');
$user_details = WPDE()->get_user($user_id);
?>

<div class="container-fluid px-0 py-6">
    <div class="container">
        <div class="pb-5 mb-4 border-bottom">
            <small class="text-primary">
                <strong>
                    <?php _e('Author', 'wpde'); ?>
                </strong>
            </small>	
            <h1 class="mb-2">
                <?php if (isset($user_details['name']) && !empty($user_details['name'])) {
                    echo $user_details['name'];
                } ?>
            </h1>
            <p class="mb-0 text-muted">
                <?php if (isset($user_details['job']) && !empty($user_details['job'])) {
                    echo $user_details['job'];
                } ?>
            </p>
        </div>
        <div class="row row-gap-5">
            <?php if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    echo '<div class="col-md-4">';
                    get_template_part('template-parts/content', 'post');
                    echo '</div>';
                }
                wp_reset_postdata();
                get_template_part('template-parts/content', 'pagination');
            } else {
                $html = '<div class="col-lg-12">';
                $html .= '<p class="text-danger mb-0">' . __('Sorry, no data of the author was found.', 'wpde') . '</p>';
                $html .= '</div>';

                echo $html;
            } ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>

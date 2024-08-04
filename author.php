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
        <?php
        if (isset($user_details['name']) && !empty($user_details['name'])) {
            $title = esc_html($user_details['name']);
        }
if (isset($user_details['job']) && !empty($user_details['job'])) {
    $description = esc_html($user_details['job']);
} else {
    $description = '';
}
echo WPDE()->the_title($title, __('Author', 'wpde'), $description);
?>
        <div class="row row-gap-5">
            <?php if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    $grid = get_field('wpde_grid', 'option');
                    if ($grid) {
                        $grid = intval($grid['author']);
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
                echo '<div class="col-lg-12">';
                echo '<p class="text-danger mb-0">' . esc_html(__('Sorry, no data of the author was found.', 'wpde')) . '</p>';
                echo '</div>';
            } ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>

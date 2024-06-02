<?php
/**
 * The template for displaying author archive pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#author-display
 *
 * @package WordPress Development Environment ("WPDE")
 * @author Jindřich Ručil
 * @since 1.0.0
 */
?>

<?php get_header(); ?>
<?php
$user_id = get_query_var('author');
$user_first_name = get_the_author_meta('first_name', $user_id);
$user_last_name = get_the_author_meta('last_name', $user_id);

if (!empty($user_first_name) || !empty($user_last_name)) {
	$user_name = $user_first_name . ' ' . $user_last_name;
} else {
	$user_name = get_the_author_meta('user_nicename', $user_id);
}

if (WPDE()->is_acf()) {
	$user_avatar = get_field('user_avatar', 'user_' . $user_id);
	$user_job = get_field('user_job', 'user_' . $user_id);
}
?>
<div class="container py-5">
    <div class="pb-5 mb-4 border-bottom">
        <small class="text-primary"><strong><?php _e('Author page', 'wpde'); ?></strong></small>	
        <h1 class="mb-2"><?php echo $user_name; ?></h1>
        <p class="mb-0 text-muted"><?php echo $user_job; ?></p>
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
                $html .= '<p class="text-danger mb-0">' . __('Sorry, no data of the author was found.', 'wpde') . '</p>';
            $html .= '</div>';

            echo $html;
        } 
        ?>
    </div>
</div>

<?php get_footer(); ?>

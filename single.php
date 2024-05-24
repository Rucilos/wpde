<?php
/**
 * The template for displaying single post.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress Development Environment ("WPDE")
 * @author Jindřich Ručil
 * @since 1.0.0
 */
?>

<?php get_header(); ?>

<div class="container py-5">
    <div class="row">
		<?php while (have_posts()) {
            the_post(); ?>

            <div class="col-lg-12">     
                <?php if (has_post_thumbnail()) {
                    the_post_thumbnail('large', ['class' => 'img-fluid']);
                } ?>
                <h3><?php the_title(); ?></h3>
                <?php the_content(); ?>
            </div>
    
            <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                <div>
                <?php
                $u_time = get_the_time('U');
                $u_modified_time = get_the_modified_time('U');
                if ($u_modified_time >= $u_time + 86400) {
                    $html = "<small class='d-block'><strong>Poslední aktualizace:</strong></small>";
                    $html .= '<small>' . the_modified_time('F jS, Y') . '</small>';
                    echo $html;
                } else {
                    $html = "<small class='d-block'><strong>Publikováno:</strong></small>";
                    $html .= '<small>' . get_the_date('F jS, Y') . '</small>';
                    echo $html;
                }
                ?> 
                </div>
                <div>
                    <small class="d-block"><strong><?php _e('Související příspěvky:', 'apiru'); ?></strong></small>
                    <small><?php previous_post_link('%link'); ?> / <?php next_post_link('%link'); ?></small> 
                </div>
            </div>

            <?php if (comments_open() || get_comments_number()) {
                comments_template();
            }
        } 
        ?>
    </div>
</div>

<?php get_footer(); ?>

<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress Development Environment (WPDE)
 * @author Jindřich Ručil
 * @since 1.0.0
 */
?>

<?php get_header(); ?>

<div class="container-fluid px-0 py-6">
    <div class="container">
        <?php
        $search_query = get_search_query();
$title = sprintf(__('Content matching your query: "%s"', 'wpde'), esc_html($search_query));
echo WPDE()->the_title($title, __('Search results', 'wpde'), __('Explore our latest articles and resources matching your search query.', 'wpde'));
?>
        <div class="row row-gap-5">
            <?php if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    $grid = get_field('wpde_grid', 'option');
                    if ($grid) {
                        $grid = intval($grid['search']);
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
                $html .= '<p class="text-danger mb-0">' . esc_html(__('Sorry, no data was found matching your search terms. Please try again with different keywords.', 'wpde')) . '</p>';
                $html .= '</div>';

                echo $html;
            } ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>

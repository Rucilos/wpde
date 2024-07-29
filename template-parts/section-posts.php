<?php
$cat_id = isset($_GET['category']) ? intval($_GET['category']) : 0;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = array(
    'post_type' => 'post',
    'posts_per_page' => 3,
    'cat' => $cat_id,
    'orderby' => 'date',
    'order' => 'DESC',
    'paged' => $paged,
);

$query = new WP_Query($args);

if ($query->have_posts()) {
?>
<div class="container-fluid px-0 py-6" id="posts">
    <div class="container">
        <?php
        $posts = get_field('wpde_posts', 'option');
        if ($posts) {
            $title = $posts['title']; 
            $subtitle = $posts['subtitle']; 
            $description = $posts['description']; 
            $layout = $posts['layout']; 

            switch ($layout) {
                case 'Left':
                    $title_layout = '';
                    $filters_layout = '';
                    break;
                case 'Center':
                    $title_layout = 'text-center';
                    $filters_layout = 'justify-content-center';
                    break;
                case 'Right':
                    $title_layout = 'text-end';
                    $filters_layout = 'justify-content-end';
                    break;
                default:
                    $title_layout = '';
                    $filters_layout = '';
                    break;
            }
        }
        ?>
        <?php if ( !empty($title) || !empty($subtitle) || !empty($description) ) { ?>
            <div class="pb-5 mb-6 border-bottom <?php echo $title_layout; ?>">
                <small class="text-primary"><strong><?php echo esc_html($subtitle); ?></strong></small>	
                <h1 class="mb-2"><?php echo esc_html($title); ?></h1>
                <p class="text-muted"><?php echo esc_html($description); ?></p>

                <ul class="list-unstyled d-flex align-items-center gap-3 mt-3 mb-0 <?php echo $filters_layout; ?>">
                    <small><strong><?php echo esc_html__('Filters:', 'wpde'); ?></strong></small>
                    <?php
                    $categories = get_categories();
                    foreach ($categories as $category) {
                        $active_class = (isset($_GET['category']) && $_GET['category'] == $category->term_id) ? 'active' : '';
                        echo '<li class="' . esc_attr($active_class) . '"><a href="' . esc_url(add_query_arg('category', $category->term_id) . '#posts') . '"><small>' . esc_html($category->name) . '</small></a></li>';
                    }
                    ?>
                </ul>
            </div>
        <?php } ?>

        <div class="row row-gap-5">
                <?php
                while ($query->have_posts()) {
                    $query->the_post();
                    echo '<div class="col-md-4">';
                    get_template_part('template-parts/content', 'post');
                    echo '</div>';
                }
                ?>
                <div class="d-flex align-items-center justify-content-between gap-2 my-4 pt-3 border-top"> 
                    <?php
                    global $wp_query;
                    $total_posts = $wp_query->found_posts;
                    $posts_per_page = get_query_var('posts_per_page');
                    $current_page = max(1, get_query_var('paged'));
                    $start = ($current_page - 1) * $posts_per_page + 1;
                    $end = min($total_posts, $current_page * $posts_per_page);
                    ?>
                    <small class="text-muted">
                    <?php 
                        echo esc_html__('Showing', 'wpde') . ' ' . esc_html($start) . ' ' . esc_html__('to', 'wpde') . ' ' . esc_html($end) . ' ' . esc_html__('of', 'wpde') . ' ' . esc_html($total_posts) . ' ' . esc_html__('results', 'wpde'); 
                    ?>
                    </small>

                    <div class="pagination-simple d-flex align-items-center gap-2">
                    <?php        
                    $i = 999999999;
                    echo paginate_links(array(
                        'base' => str_replace($i, '%#%', esc_url(get_pagenum_link($i) . '?pt=post')),
                        'format' => '?paged=%#%',
                        'current' => max(1, get_query_var('paged')),
                        'total' => $query->max_num_pages,
                        'prev_text' => '<i class="fa-solid fa-angle-left"></i>',
                        'next_text' => '<i class="fa-solid fa-angle-right"></i>',
                        'add_fragment' => '#posts',
                    ));
                    ?>
                    </div>
                </div>
                <?php wp_reset_postdata(); ?>
        </div>
    </div>
</div>
<?php } ?>

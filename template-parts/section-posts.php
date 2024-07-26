<div class="container-fluid px-0 py-6" id="posts">
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

        <div class="mb-4">
            <ul class="list-unstyled d-flex align-items-center gap-3 mb-5">
                <small><strong><?php _e('Filters:', 'wpde'); ?></strong></small>
                <?php
                $categories = get_categories();
                foreach ($categories as $category) {
                    $active_class = (isset($_GET['category']) && $_GET['category'] == $category->term_id) ? 'active' : '';
                    echo '<li class="' . $active_class . '"><a href="' . add_query_arg('category', $category->term_id) . '#posts"><small>' . esc_html($category->name) . '</small></a></li>';
                }
                ?>
            </ul>
        </div>

        <div class="row row-gap-5">
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
                        echo __('Showing', 'wpde') . ' ' . $start . ' ' . __('to', 'wpde') . ' ' . $end . ' ' . __('of', 'wpde') . ' ' . $total_posts . ' ' . __('results', 'wpde'); 
                    ?>
                    </small>

                    <div class="pagination-simple d-flex align-items-center gap-2">
                    <?php        
                    $i = 999999999;
                    echo paginate_links(array(
                        'base' => str_replace($i, '%#%', esc_url(get_pagenum_link($i))),
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
                <?php
                wp_reset_postdata();
            } else {
            ?>
                <div class="col-lg-12">
                    <p class="text-danger mb-0"><?php _e('Sorry, no data was found in this category.', 'wpde'); ?></p>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php
$cat_id = isset($_GET['category']) ? intval($_GET['category']) : 0;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$args = [
	'post_type' => 'post',
	'posts_per_page' => 3,
	'cat' => $cat_id,
	'orderby' => 'date',
	'order' => 'DESC',
	'paged' => $paged,
];

$query = new WP_Query($args);

if ($query->have_posts()) {
	?>
<div class="container-fluid px-0 py-6" id="posts">
    <div class="container">
        <?php
			$group = get_field('wpde_posts', 'option');
	$grid = 6;
	if ($group) {
		$title = $group['title'];
		$subtitle = $group['subtitle'];
		$description = $group['description'];
		$layout = $group['layout'];
		$border = $group['border'];
		$grid = $group['grid'];
	   
		switch ($layout) {
			case 'Center':
				$title_layout = 'text-center';
				$filters_layout = 'justify-content-center';
				break;
			case 'Right':
				$title_layout = 'text-end';
				$filters_layout = 'justify-content-end';
				break;
			case 'Left':
			case '':
			default:
				$title_layout = '';
				$filters_layout = '';
				break;
		}

		echo WPDE()->the_title($title, $subtitle, $description, ['layout' => $title_layout, 'border' => $border]);
	}
	?>
        <ul class="list-unstyled d-flex align-items-center gap-3 mt-3 mb-5 <?php echo $filters_layout; ?>">
            <small><strong><?php echo esc_html__('Filters:', 'wpde'); ?></strong></small>
            <?php
		$categories = get_categories();
	foreach ($categories as $category) {
		$active_class = (isset($_GET['category']) && $_GET['category'] == $category->term_id) ? 'active' : '';
		echo '<li class="' . esc_attr($active_class) . '"><a href="' . esc_url(add_query_arg('category', $category->term_id) . '#posts') . '"><small>' . esc_html($category->name) . '</small></a></li>';
	}
	?>
        </ul>

        <div class="row row-gap-5">
                <?php
		while ($query->have_posts()) {
			$query->the_post();
			echo '<div class="col-md-' . esc_attr($grid) . '">';
			get_template_part('template-parts/content', 'post');
			echo '</div>';
		}
	?>
                <div class="d-flex align-items-center justify-content-between gap-2 my-4 pt-3 border-top"> 
                    <?php
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

                    <div class="d-flex align-items-center gap-2">
                    <?php
	$i = 999999999;
	$links = paginate_links([
		'base' => str_replace($i, '%#%', esc_url(get_pagenum_link($i) . '?pt=post')),
		'format' => '?paged=%#%',
		'current' => max(1, get_query_var('paged')),
		'total' => $query->max_num_pages,
		'prev_text' => '<i class="fa-solid fa-angle-left"></i>',
		'next_text' => '<i class="fa-solid fa-angle-right"></i>',
		'add_fragment' => '#posts',
		'type' => 'array',
	]);

	if ($links) {
		echo '<div class="d-flex align-items-center gap-2">';
		foreach ($links as $link) {
			$link = str_replace('class="', 'class="page-numbers ', $link);
			echo $link;
		}
		echo '</div>';
	}
	?>
                    </div>
                </div>
                <?php wp_reset_postdata(); ?>
        </div>
    </div>
</div>
<?php } ?>

<div class="col-md-12">     
	<?php
	if (has_category()) {
		$categories = get_the_category();
		$term_names = [];
		foreach ($categories as $category) {
			$term_names[] = $category->name;
		}
		$term_name = implode(', ', $term_names);
	} else {
		$term_name = '';
	}

	echo WPDE()->the_title(get_the_title(), $term_name, wp_trim_words(get_the_excerpt(), 15, ''));
	
	WPDE()->breadcrumbs();

	if (has_post_thumbnail()) {
		$image_size_custom = wp_is_mobile() ? 'header-sm' : 'large-lg';
		the_post_thumbnail($image_size_custom, ['class' => 'img-fluid mb-6 shadow-lg rounded-3']);
	}

	the_content();
	?>
</div>
    
<div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
    <div>
    <?php
	$u_time = get_the_time('U');
	$u_modified_time = get_the_modified_time('U');
	if ($u_modified_time >= $u_time + 86400) {
		$html = '<small class="d-block"><strong>Poslední aktualizace:</strong></small>';
		$html .= '<small class="text-muted">' . esc_html(get_the_modified_time('F jS, Y')) . '</small>';
		echo $html;
	} else {
		$html = '<small class="d-block"><strong>Publikováno:</strong></small>';
		$html .= '<small class="text-muted">' . esc_html(get_the_date('F jS, Y')) . '</small>';
		echo $html;
	}
	?> 
    </div>
    <div>
    <small class="d-block"><strong><?php _e('Související příspěvky:', 'wpde'); ?></strong></small>
    <small class="text-muted">
        <?php
		if (get_adjacent_post(false, '', true) || get_adjacent_post(false, '', false)) {
			previous_post_link('%link', 'Předchozí příspěvek');
			?> / <?php
			next_post_link('%link', 'Další příspěvek');
		} else {
			echo '—';
		}
	?>
    </small> 
</div>
</div>

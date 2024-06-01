<a href="<?php the_permalink(); ?>" class="link-underline link-underline-opacity-0">
	<div class="card h-100 shadow border-0">
		<?php if (has_post_thumbnail()) {
      		the_post_thumbnail('medium', ['class' => 'card-img-top shadow']);
		} else {
		?>
			<img src="<?php echo get_template_directory_uri(); ?>/img/default-thumbnail.webp" alt="Default Thumbnail" class="img-fluid" />
		<?php } ?>
		<div class="card-body">
			<h5 class="card-title"><?php echo get_the_title(); ?></h5>
			<small class="card-text d-block"><?php echo wp_trim_words(get_the_excerpt(), 10, ' ...'); ?></small>
			<p class="card-text">
				<small class="text-body-secondary">
					<?php
					$time = get_the_time('U');
					$modified_time = get_the_modified_time('U');
					if ($modified_time >= $time + 86400) {
						echo '<small>' . __('Poslední aktualizace', 'wpde') . ' ' . the_modified_time('F jS, Y') . '</small>';
					} else {
						echo '<small>' . __('Publikováno', 'wpde') . ' ' . get_the_date('F jS, Y') . '</small>';
					}
					?> 
				</small>
			</p>
		</div>
	</div>
</a>

<a href="<?php the_permalink(); ?>" class="link-underline link-underline-opacity-0">
	<div class="card h-100 shadow border-0">
		<?php if (has_post_thumbnail()) {
      		the_post_thumbnail('medium', ['class' => 'card-img-top']);
		} else {
		?>
			<img src="<?php echo get_template_directory_uri(); ?>/img/default-thumbnail.webp" alt="Default Thumbnail" class="img-fluid" />
		<?php } ?>
		<div class="card-body">
			<h5 class="card-title"><?php echo get_the_title(); ?></h5>
			<p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 10, ' ...'); ?></p>
			<p class="card-text">
				<small class="text-body-secondary">
					<?php
					$u_time = get_the_time('U');
					$u_modified_time = get_the_modified_time('U');
					if ($u_modified_time >= $u_time + 86400) {
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

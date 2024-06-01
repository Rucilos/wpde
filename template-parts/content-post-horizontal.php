<a href="<?php the_permalink(); ?>" class="link-underline link-underline-opacity-0">
	<div class="card mb-3">
		<div class="row g-0">
			<div class="col-md-4">
			<?php if (has_post_thumbnail()) {
				the_post_thumbnail('medium', ['class' => 'card-img-top']);
			} else { ?>
				<img src="<?php echo get_template_directory_uri(); ?>/img/default-thumbnail.webp" alt="Default Thumbnail" class="img-fluid" />
			<?php } ?>
			</div>
			<div class="col-md-8">
				<div class="card-body">
				<div class="d-flex align-items-center justify-content-between mb-2">
			<div class="mb-0">
				<small class="text-body-secondary">
					<?php
					$time = get_the_time('U');
					$modified_time = get_the_modified_time('U');
					if ($modified_time >= $time + 86400) {
						echo '<small>' . the_modified_time('F jS, Y') . '</small>';
					} else {
						echo '<small>' . get_the_date('F jS, Y') . '</small>';
					}
					?>
				</small>
			</div>
			<?php 
			if (has_category()) {
				$categories = get_the_category();
				foreach ($categories as $category) {
					echo '<span class="badge bg-primary">' . esc_html($category->name) . '</span>';
				}
			} 
			?>
			</div>
			<h5 class="card-title mb-3"><?php echo get_the_title(); ?></h5>
			<small class="d-block mb-5"><?php echo wp_trim_words(get_the_excerpt(), 10, ' ...'); ?></small>
			<?php
			$user_id = get_the_author_meta('ID');
			$user_first_name = get_the_author_meta('first_name', $user_id);
			$user_last_name = get_the_author_meta('last_name', $user_id);
			$user_name = $user_first_name . ' ' . $user_last_name;
			if(WPDE()->is_acf()) {
				$user_avatar = get_field('user_avatar', 'user_' . $user_id);
				$user_job = get_field('user_job', 'user_' . $user_id);
			}
			?>
			<div class="d-flex align-items-center column-gap-3">
				<?php if(WPDE()->is_acf() && $user_avatar) { ?>
					<img class="rounded-circle" src="<?php echo $user_avatar['url']; ?>" alt="<?php echo $user_avatar['alt']; ?>" width="48" height="auto" />
				<?php } ?>
				<div>
				<?php if($user_name) { ?>
					<small class="d-block"><strong><?php echo $user_name; ?></strong></small>
				<?php } ?>
				<?php if(WPDE()->is_acf() && $user_job) { ?>
					<small><?php echo $user_job; ?></small>
				<?php } ?>
				</div>
			</div>
				</div>
			</div>
		</div>
	</div>
</a>





<a href="<?php the_permalink(); ?>" class="link-underline link-underline-opacity-0">
	<div class="card h-100 border-0">

		<div class="card-body">
			<div class="d-flex align-items-center column-gap-4 mb-2">
			<div class="mb-0">
					<?php
					$time = get_the_time('U');
					$modified_time = get_the_modified_time('U');
					if ($modified_time >= $time + 86400) {
						echo '<small class="text-muted">' . get_the_modified_time('F jS, Y') . '</small>';
					} else {
						echo '<small class="text-muted">' . get_the_date('F jS, Y') . '</small>';
					}
					?>
			</div>
			<?php 
			if (has_category()) {
				$categories = get_the_category();
				foreach ($categories as $category) {
					echo '<small class="text-muted"><strong>' . esc_html($category->name) . '</strong></small>';
				}
			} 
			?>
			</div>
			<h5 class="card-title mb-3"><?php echo get_the_title(); ?></h5>
			<small class="d-block pb-2"><?php echo wp_trim_words(get_the_excerpt(), 10, ' ...'); ?></small>
			<?php
			$user_id = get_the_author_meta('ID');
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
			<div class="d-flex align-items-center column-gap-3 mt-4">
				<?php if (WPDE()->is_acf() && $user_avatar) { ?>
					<img class="rounded-circle" src="<?php echo $user_avatar['url']; ?>" alt="<?php echo $user_avatar['alt']; ?>" width="48" height="auto" />
				<?php } ?>
				<div>
				<?php if ($user_name) { ?>
					<small class="d-block"><strong><?php echo $user_name; ?></strong></small>
				<?php } ?>
				<?php if (WPDE()->is_acf() && $user_job) { ?>
					<small class="text-muted"><?php echo $user_job; ?></small>
				<?php } ?>
				</div>
			</div>
		</div>
	</div>
</a>

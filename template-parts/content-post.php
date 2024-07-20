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
				if (has_category() && !is_search()) {
					$categories = get_the_category();
					foreach ($categories as $category) {
						echo '<small class="text-muted"><strong>' . esc_html($category->name) . '</strong></small>';
					}
				} 
				?>
			</div>
			<h5 class="card-title mb-3"><?php echo get_the_title(); ?></h5>
			<small class="d-block pb-2"><?php echo wp_trim_words(get_the_excerpt(), 15, ''); ?></small>
			<?php 
			if (!is_search()) {
				$user_id = get_the_author_meta('ID');
				$user_details = WPDE()->get_user($user_id);
			?>
				<div class="d-flex align-items-center column-gap-3 mt-4">
					<?php if (isset($user_details['avatar'])) { ?>
						<img class="rounded-circle" src="<?php echo $user_details['avatar']['url']; ?>" alt="<?php echo $user_details['avatar']['alt']; ?>" width="48" height="auto" />
					<?php } ?>
					<div>
						<?php if (isset($user_details['name'])) { ?>
							<small class="d-block"><strong><?php echo $user_details['name']; ?></strong></small>
						<?php } ?>
						<?php if (isset($user_details['job'])) { ?>
							<small class="text-muted"><?php echo $user_details['job']; ?></small>
						<?php } ?>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</a>

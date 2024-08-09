<a href="<?php echo esc_url(get_permalink()); ?>">
	<div class="card border-0 shadow-sm mb-3">
		<div class="row gx-2">
			<div class="col-md-5 overflow-hidden">
				<?php
				if (has_post_thumbnail()) {
					the_post_thumbnail('thumb', ['class' => 'w-100 h-100 rounded-start']);
				}
?>
			</div>
			<div class="col-md-7">
				<div class="card-body">
					<div class="d-flex align-items-center column-gap-4 mb-2">
						<div class="mb-0">
							<?php
			$time = get_the_time('U');
$modified_time = get_the_modified_time('U');
if ($modified_time >= $time + 86400) {
	echo '<small class="text-muted">' . esc_html(get_the_modified_time('F jS, Y')) . '</small>';
} else {
	echo '<small class="text-muted">' . esc_html(get_the_date('F jS, Y')) . '</small>';
}
?>
						</div>
						<?php
						if (has_category() && !is_search()) {
							$categories = get_the_category();
							foreach ($categories as $category) {
								echo '<small class="text-primary"><strong>' . esc_html($category->name) . '</strong></small>';
							}
						}
?>
					</div>
					<h5 class="card-title mb-3"><?php echo esc_html(get_the_title()); ?></h5>
					<small class="d-block pb-2"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 15, '')); ?></small>
				</div>
			</div>
		</div>
	</div>
</a>

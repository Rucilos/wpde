<?php if (function_exists('get_sub_field')) { ?>
	<?php if (have_rows('carousel', 'option')) { ?>
		<div id="carouselExampleCaptions" class="carousel slide m-3 m-md-5">
			<div class="carousel-indicators">
				<?php
				$slide_index = 0;
				while (have_rows('carousel', 'option')) {
					the_row(); ?>
					<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $slide_index; ?>" class="<?php echo $slide_index == 0 ? 'active' : ''; ?>" aria-current="<?php echo $slide_index == 0 ? 'true' : 'false'; ?>" aria-label="Slide <?php echo $slide_index + 1; ?>"></button>
				<?php 
					$slide_index++;
				}
				?>
			</div>
			<div class="carousel-inner rounded-4 shadow-lg">
				<?php
				$slide_index = 0;
				while (have_rows('carousel', 'option')) {
					the_row();
					$image = get_sub_field('image');
					if($image) {
						$image_size_custom = wp_is_mobile() ? 'header-sm' : 'header';
						$image_size = wp_get_attachment_image_url($image['ID'], $image_size_custom); 
						$alt = get_post_meta($image['ID'], '_wp_attachment_image_alt', true);
						$title = get_sub_field('title');
						$description = get_sub_field('description');
					?>
					<div class="carousel-item <?php echo $slide_index == 0 ? 'active' : ''; ?>">
						<img src="<?php echo esc_url($image_size); ?>" class="d-block w-100" alt="<?php echo esc_attr($alt); ?>">
						<div class="carousel-caption d-none d-md-block">
							<h1 class="text-white"><?php echo esc_html($title); ?></h1>
							<small class="text-white"><?php echo esc_html($description); ?></small>
						</div>
					</div>
				<?php 
				}
					$slide_index++;
				}
				?>
			</div>
			<?php if ($slide_index > 1) { ?>
				<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Previous</span>
				</button>
				<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="visually-hidden">Next</span>
				</button>
			<?php } ?>
		</div>
	<?php } ?>
<?php } ?>

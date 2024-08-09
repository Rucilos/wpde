<?php if (have_rows('wpde_icons_items', 'option')) { ?>
    <div class="container-fluid px-0 py-6">
        <div class="container">
        <?php
			$group = get_field('wpde_icons', 'option');
			if ($group) {
				$title = $group['title'];
				$subtitle = $group['subtitle'];
				$description = $group['description'];

				echo WPDE()->the_title($title, $subtitle, $description, ['class' => 'mb-6']);
			}
		?>
            <div class="row">
                <?php
		while (have_rows('wpde_icons_items', 'option')) {
			the_row();
			$item_title = get_sub_field('title');
			$item_description = get_sub_field('description');
			$image = get_sub_field('image');
			if($image) {
				$image_custom_size = 'small-sm';
				$image_size = wp_get_attachment_image_url($image['ID'], $image_custom_size);
				$alt = get_post_meta($image['ID'], '_wp_attachment_image_alt', true);
			}
			?>
                    <div class="col-md-3 text-center">
                        <?php if (!empty($image)) { ?>
                            <img src="<?php echo esc_url($image_size); ?>" class="img-fluid mb-3" alt="<?php echo esc_attr($alt); ?>" width="48px" height="auto">
                        <?php } ?>
                        <h6 class="mb-0"><?php echo esc_html($item_title); ?></h6>
                        <p class="mx-3"><?php echo esc_html($item_description); ?></p>
                    </div>
                <?php
		} ?>
            </div>
        </div>
    </div>
<?php } ?>

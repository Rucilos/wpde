<?php if (have_rows('wpde_gallery_items', 'option')) { ?>
    <div class="container-fluid px-0 py-6">
        <div class="container">
            <?php
			$group = get_field('wpde_gallery', 'option');
	$grid = 3;
	if ($group) {
		$title = $group['title'];
		$subtitle = $group['subtitle'];
		$description = $group['description'];
		$grid = $group['grid'];

		echo WPDE()->the_title($title, $subtitle, $description, ['class' => 'mb-6']);
	}
	?>
            <div class="row g-3 mfp-init">
            <?php
	$images = get_field('wpde_gallery_items', 'option');
	if($images) { ?>
                <?php foreach($images as $image) { ?>
                    <a class="col-md-<?php echo esc_attr($grid); ?> mfp-item" href="<?php echo esc_url($image['url']); ?>">
                        <img class="img-fluid rounded-4" src="<?php echo esc_url($image['sizes']['medium-md']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    </a>
                <?php } ?>
            <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>

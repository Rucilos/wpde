<?php if (have_rows('wpde_gallery_items', 'option')) { ?>
    <div class="container-fluid px-0 py-6">
        <div class="container">
            <?php
			$group = get_field('wpde_gallery', 'option');
	if ($group) {
		$title = $group['title'];
		$subtitle = $group['subtitle'];
		$description = $group['description'];

		echo WPDE()->the_title($title, $subtitle, $description, ['class' => 'mb-6']);
	}
	?>
            <div class="row g-3 mfp-init">
            <?php
	$images = get_field('wpde_gallery_items', 'option');
	if($images) { ?>
                <?php foreach($images as $image) { ?>
                    <a class="col-md-3 mfp-item" href="<?php echo esc_url($image['url']); ?>">
                        <img class="img-fluid rounded-3" src="<?php echo esc_url($image['sizes']['medium-md']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    </a>
                <?php } ?>
            <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>

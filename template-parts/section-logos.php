<?php if (have_rows('wpde_logos_items', 'option')) { ?>
    <div class="container-fluid px-0 py-6">
        <div class="container">
            <?php
			$group = get_field('wpde_logos', 'option');
	$grid = 2;

	if ($group) {
		$title = $group['title'];
		$subtitle = $group['subtitle'];
		$description = $group['description'];
		$grid = $group['grid'];

		echo WPDE()->the_title($title, $subtitle, $description, ['class' => 'mb-6']);
	}
	?>
            <div class="row justify-content-center align-items-center">
                <?php
		while (have_rows('wpde_logos_items', 'option')) {
			the_row();
			$image = get_sub_field('image');
			$link = get_sub_field('link');
			if($link) {
				$link_url = esc_url($link['url']);
				$link_target = esc_attr($link['target'] ? $link['target'] : '_self');
			}
			?>
                    <div class="col-md-<?php echo esc_attr($grid); ?> text-center">
                        <a href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>">
                            <img class="img-fluid mb-3" src="<?php echo esc_url($image['sizes']['logo']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" width="135px" height="auto" />
                        </a>
                    </div>
                <?php
		} ?>
            </div>
        </div>
    </div>
<?php } ?>

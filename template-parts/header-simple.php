<?php
$metadata = get_field('wpde_header_metadata', 'option');
if ($metadata) {
	$title = $metadata['title'];
	$description = $metadata['description'];
	$link = $metadata['link'];
	$link_2 = $metadata['link_2'];
}
?>

<header>
    <div class="gradient-wrap">
        <div class="gradient cyan"></div>
        <div class="gradient indigo"></div>
        <div class="gradient teal"></div>
    </div>
    <div class="container py-6">
        <div class="row justify-content-center align-items-center text-center">
            <div class="col-md-8">
                <?php if (!empty($title)) { ?>
                    <h1 class="display-3 fw-bold mb-2"><?php echo esc_html($title); ?></h1>
                <?php } ?>
                <?php if (!empty($description)) { ?>
                    <p><?php echo esc_html($description); ?></p>
                <?php } ?>

                <?php if (!empty($link) || !empty($link_2)) { ?>
                <div class="d-flex justify-content-center align-items-center">
                <?php
				if ($link) {
					$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $link['target'] : '_self';
					?>
                    <a class="btn btn-dark me-2" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                <?php } ?>

                <?php
				if ($link_2) {
					$link_url = $link_2['url'];
					$link_title = $link_2['title'];
					$link_target = $link_2['target'] ? $link_2['target'] : '_self';
					?>
                    <a class="btn border-0" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                <?php } ?>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</header>

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
    <div class="gradient-wrap justify-content-end">
        <div class="gradient cyan"></div>
        <div class="gradient indigo"></div>
        <div class="gradient teal"></div>
    </div>
    <div class="container py-6">
        <div class="row align-items-center">
            <div class="col-md-6 mb-5 mb-md-0">
                <?php if (!empty($subtitle)) { ?>
                    <small class="text-primary"><strong><?php echo esc_html($subtitle); ?></strong></small>
                <?php } ?>
                <?php if (!empty($title)) { ?>
                    <h1 class="display-5 fw-bold mb-2"><?php echo esc_html($title); ?></h1>
                <?php } ?>
                <?php if (!empty($description)) { ?>
                    <p><?php echo esc_html($description); ?></p>
                <?php } ?>

                <?php if (!empty($link) || !empty($link_2)) { ?>
                    <div class="d-flex align-items-center">
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

            <div class="col-md-5 offset-md-1">
            <?php if (have_rows('wpde_header_carousel', 'option')) { ?>
            <div id="carouselExampleCaptions" class="carousel slide">
                <?php
                $slide_count = count(get_field('wpde_header_carousel', 'option'));
                if ($slide_count > 1) {
                    echo '<div class="carousel-indicators">';
                    $slide_index = 0;
                    while (have_rows('wpde_header_carousel', 'option')) {
                        the_row(); ?>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $slide_index; ?>" class="<?php echo $slide_index == 0 ? 'active' : ''; ?>" aria-current="<?php echo $slide_index == 0 ? 'true' : 'false'; ?>" aria-label="Slide <?php echo $slide_index + 1; ?>"></button>
                        <?php
                        $slide_index++;
                    }
                    echo '</div>';
                }
                ?>
                <div class="carousel-inner rounded-4 shadow-lg">
                    <?php
                    $slide_index = 0;
                while (have_rows('wpde_header_carousel', 'option')) {
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
            </div>
        </div>
    </div>
</header>

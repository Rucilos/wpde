<?php
$metadata = get_field('header_metadata', 'option');
if ($metadata) {
    $title = $metadata['title'];
    $description = $metadata['description'];
    $link = $metadata['link'];
    $link_2 = $metadata['link_2'];
    $badge_text = $metadata['badge_text'];
    $badge_link = $metadata['badge_link'];
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
            <div class="col-md-6 mb-3">
                <?php if (!empty($badge_text) || !empty($badge_link)) { ?>
                <div class="py-0 px-3 mb-3 rounded-4 border text-muted" style="max-width: max-content;">
                    <small>
                        <?php 
                        if (!empty($badge_text)) {
                            echo esc_html($badge_text); 
                        }
                        ?> 
                        <?php
                        if ($badge_link) {
                            $link_url = $badge_link['url'];
                            $link_title = $badge_link['title'];
                            $link_target = $badge_link['target'] ? $badge_link['target'] : '_self';
                            ?>
                            <a class="link-underline link-underline-opacity-0" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                        <?php } ?>
                    </small>
                </div>
                <?php } ?>
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
                <?php
                if (have_rows('wpde_header_reviews', 'option')) {
                    $row_index = 0;
                    while (have_rows('wpde_header_reviews', 'option')) {
                        the_row();

                        $image = get_sub_field('image');
                        if ($image) {
                            $image_size_custom = 'small-sm';
                            $image_size = wp_get_attachment_image_url($image['ID'], $image_size_custom);
                            $alt = get_post_meta($image['ID'], '_wp_attachment_image_alt', true);
                        }
                        $title = get_sub_field('title');
                        $description = get_sub_field('description');
                        ?>
                        <div class="toast border bg-blur mb-3 show <?php echo ($row_index % 2 == 1) ? 'ms-4' : ''; ?>" role="alert" aria-live="assertive" aria-atomic="true">
                            <div class="toast-header border-bottom shadow-sm">
                                <img src="<?php echo esc_url($image_size); ?>" class="rounded-circle me-2" alt="<?php echo esc_attr($alt); ?>" width="24px" height="auto">
                                <strong class="me-auto"><?php echo esc_html($title); ?></strong>
                                <small>11 mins ago</small>
                            </div>
                            <div class="toast-body">
                                <?php echo esc_html($description); ?>
                            </div>
                        </div>
                        <?php
                        $row_index++;
                    } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</header>

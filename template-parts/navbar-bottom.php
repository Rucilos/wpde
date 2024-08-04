<?php
$metadata = get_field('wpde_metadata', 'option');
if ($metadata) {
    $email = $metadata['email'];
    $phone = $metadata['phone'];
}
?>
<div class="container-fluid px-0">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <div>
                <?php WPDE()->breadcrumbs(); ?>
            </div>
            <?php if (!empty($email) && !empty($phone)) { ?>
            <ul class="navbar-nav list-unstyled d-flex flex-row align-items-center justify-content-end flex-wrap flex-md-nowrap column-gap-3 mb-0">
                <?php if (!empty($email)) { ?>
                    <li class="nav-item">
                        <a href="mailto:<?php echo esc_attr($email); ?>">
                            <i class="fa-solid fa-envelope"></i>
                            <small><?php echo esc_html($email); ?></small>
                        </a>
                    </li>
                <?php } ?>
                <?php if (!empty($phone)) { ?>
                    <li class="nav-item">
                        <a href="tel:<?php echo esc_attr($phone); ?>">
                            <i class="fa-solid fa-phone-alt"></i>
                            <small><?php echo esc_html($phone); ?></small>
                        </a>
                    </li>
                <?php } ?>
            </ul>
            <?php } ?>
        </div>
    </div>
</div>

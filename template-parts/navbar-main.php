<?php
$navbar = get_field('wpde_navbar', 'option'); 
if($navbar) {
    $navbar_layout = $navbar['layout'];
    $navbar_link = $navbar['navbar_link'];
    $navbar_btn = $navbar['navbar_btn'];
}

switch ($navbar_layout) {
    case 'Fixed':
        $navbar_class = 'position-fixed top-0 start-0 end-0';
        $helper_div = true;
        break;
    case 'Headroom':
        $navbar_class = 'position-fixed top-0 start-0 end-0 headroom';
        $helper_div = true;
        break;
    case 'Static':
    default:
        $navbar_class = '';
        $helper_div = false;
        break;
}

$logo = get_field('wpde_logo', 'option');
if ($logo) {
    $logo_image = $logo['image'];
    $logo_width = $logo['width'] ? $logo['width'] : 100;
    $logo_text = $logo['text'];
}

$options = get_field('wpde_options', 'option');
if ($options) {
    $search_form = $options['search_form'];
    $theme_toggler = $options['theme_toggler'];
}
?>

<?php
$metadata = get_field('header_metadata', 'option');
if ($metadata) {
    $badge_text = $metadata['badge_text'];
    $badge_link = $metadata['badge_link'];
}
?>

<?php if($helper_div) { ?>
    <div class="w-100" style="height: 57px;"></div>
<?php } ?>
<nav class="navbar navbar-expand-lg bg-blur border-bottom z-3 <?php echo esc_attr($navbar_class); ?>">
	<div class="container">
		<a class="navbar-brand d-flex align-items-center gap-1" href="<?php echo esc_url(home_url()); ?>">
        <?php if (!empty($logo_image)) { ?>
            <img src="<?php echo esc_url($logo_image['url']); ?>" alt="Logo" width="<?php echo esc_attr($logo_width); ?>" height="auto"/>
        <?php
        } elseif(!empty($logo_text)) {
            echo esc_html($logo_text);
        } else {
            echo esc_html(get_bloginfo('name'));
        }
        ?>
		</a>

        <?php if (!empty($badge_text) || !empty($badge_link)) { ?>
                <div class="py-0 px-3 rounded-4 border text-muted" style="max-width: max-content;">
                    <small>
                    <i class="fa-solid fa-bullhorn"></i>
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

		<div class="collapse navbar-collapse" id="navbar">
            <small class="text-primary d-block d-lg-none fw-bold my-4"><?php _e('Navigation', 'wpde'); ?></small>
		<?php 
        wp_nav_menu([
            'theme_location' => 'menu-1',
            'container' => false,
            'menu_class' => 'me-3',
            'fallback_cb' => '__return_false',
            'items_wrap' => '<ul id="%1$s" class="navbar-nav gap-2 ms-3 ms-lg-auto mb-3 mb-lg-0 %2$s">%3$s</ul>',
            'depth' => 2,
            'walker' => new bootstrap_5_wp_nav_menu_walker(),
        ]); 
        ?>
		</div>
        <div class="d-flex align-items-center justify-content-center gap-3 ms-auto" id="navbar-actions">
            <?php 
            if(empty($theme_toggler)) {
                WPDE()->theme();
            }
            ?>
            <?php
            if (empty($search_form)) {
            ?>
			<button class="navbar-toggler p-1 d-flex rounded-circle border-0" type="button" data-bs-toggle="modal" data-bs-target="#modal-searchform">
			    <i class="fa-solid fa-magnifying-glass text-dark text-muted"></i>
			</button>
            <?php } ?>
			<button class="navbar-toggler p-1 rounded-circle border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                <i id="navbar-toggler-icon" class="fa-solid fa-bars fa-lg"></i>
			</button>
		</div>
		<div class="d-none d-lg-flex">
            <?php 
            if(!empty($navbar_link) || !empty($navbar_btn)) {
            ?>
            <ul class="navbar-nav border-start align-items-center ps-4 ms-4">
            <?php 
            if( $navbar_link ) {
                $link_url = $navbar_link['url'];
                $link_title = $navbar_link['title'];
                $link_target = $navbar_link['target'] ? $navbar_link['target'] : '_self';
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                </li>
            <?php } ?>
            <?php
            if( $navbar_btn ) {
                $link_url = $navbar_btn['url'];
                $link_title = $navbar_btn['title'];
                $link_target = $navbar_btn['target'] ? $navbar_btn['target'] : '_self';
                ?>
                <li class="nav-item ms-3">
                    <a class="btn btn-dark" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                        <?php echo esc_html($link_title); ?>
                        <i class="fa-solid fa-arrow-right ms-1"></i> 
                    </a>
                </li>
            <?php } ?>
            </ul>
            <?php } ?>
        </div>
	</div>
</nav>

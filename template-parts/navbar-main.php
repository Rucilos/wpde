<?php
$navbar = get_field('navbar', 'option'); 
if(empty($navbar) || $navbar === 'Static') {
    $navbar_class = '';
    $helper = '';
}
if ($navbar === 'Fixed') {
    $navbar_class = 'position-fixed top-0 start-0 end-0';
    $helper = '<div class="w-100" style="height: 63px;"></div>';
}
if ($navbar === 'Headroom') {
    $navbar_class = 'position-fixed top-0 start-0 end-0 headroom';
    $helper = '<div class="w-100" style="height: 63px;"></div>';
}

echo $helper;
?>
<nav class="navbar navbar-expand-lg bg-body border-bottom <?php echo $navbar_class; ?>">
	<div class="container">
		<a class="navbar-brand d-flex align-items-center gap-1" href="<?php echo home_url(); ?>">
        <?php 
        if (function_exists('get_field')) {
            $image = get_field('logo', 'option');
            $title = get_field('logo_text', 'option');
            if (!empty($image)) {
                $image_width = get_field('logo_width', 'option') ? get_field('logo_width', 'option') : '100'; 
            ?>
                <img src="<?php echo esc_url($image['url']); ?>" alt="Logo" width="<?php echo $image_width; ?>" height="auto"/>
            <?php
            } elseif(!empty($title)) {
                echo $title;
            } else {
                echo get_bloginfo('name');
            }
        } else {
            echo get_bloginfo('name');
        } 
        ?>
		</a>
		<div class="d-lg-none d-flex ms-auto">
            <?php 
            $theme_toggler = get_field('theme_toggler', 'option');
            if(wp_is_mobile() && empty($theme_toggler)) {
                WPDE()->theme();
            }
            ?>
            <?php
            $search_form = get_field('search_form', 'option');
            if (empty($search_form)) {
            ?>
			<button class="navbar-toggler border-0" type="button" data-bs-toggle="modal" data-bs-target="#modal-searchform">
			    <i class="fa-solid fa-magnifying-glass"></i>
			</button>
            <?php } ?>
			<button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation" style="width: 46px;">
                <i id="navbar-toggler-icon" class="fa-solid fa-bars fa-lg"></i>
			</button>
		</div>
		<div class="d-none d-lg-block">
			<?php 
            if (empty($search_form)) {
                get_search_form(); 
            }
            ?>  
		</div>
		<div class="collapse navbar-collapse" id="navbar">
            <small class="text-primary d-block d-lg-none fw-bold my-4"><?php _e('Navigation', 'wpde'); ?></small>
		<?php 
        wp_nav_menu([
            'theme_location' => 'menu-1',
            'container' => false,
            'menu_class' => '',
            'fallback_cb' => '__return_false',
            'items_wrap' => '<ul id="%1$s" class="navbar-nav ms-3 ms-lg-auto mb-3 mb-lg-0 %2$s">%3$s</ul>',
            'depth' => 2,
            'walker' => new bootstrap_5_wp_nav_menu_walker(),
        ]); 
        ?>
        <ul class="navbar-nav align-items-center justify-content-start">
            <li class="nav-item">
                <?php 
                if(!wp_is_mobile() && empty($theme_toggler)) {
                    WPDE()->theme();
                }
                ?>
            </li>
        </ul>
		</div>
		<div class="d-none d-lg-flex ms-1">
            <?php 
            $link = get_field('navbar_link_unique', 'option');
            $link2 = get_field('navbar_link_btn', 'option');
            if($link || $link2) {
            ?>
            <ul class="navbar-nav border-start align-items-center ps-3 ms-3">
            <?php 
            if( $link ) {
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ? $link['target'] : '_self';
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                </li>
            <?php } ?>
            <?php
            if( $link2 ) {
                $link_url = $link2['url'];
                $link_title = $link2['title'];
                $link_target = $link2['target'] ? $link2['target'] : '_self';
                ?>
                <li class="nav-item ms-3">
                    <a class="btn btn-primary" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                        <?php echo esc_html( $link_title ); ?>
                        <i class="fa-solid fa-arrow-right ms-1"></i> 
                    </a>
                </li>
            <?php } ?>
            </ul>
            <?php } ?>
        </div>
	</div>
</nav>

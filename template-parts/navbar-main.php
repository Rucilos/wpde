<nav class="navbar navbar-expand-lg fixed-top">
	<div class="container pb-2 border-bottom">
		<a class="navbar-brand d-flex align-items-center gap-1" href="<?php echo home_url(); ?>">
        <?php 
        if (function_exists('get_field')) {
            $image = get_field('logo', 'option');
            $title = get_field('text_logo', 'option');
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
            /*
            if(wp_is_mobile()) {
                get_template_part('template-parts/theme', 'toggler'); 
            }*/
            ?>
			<button class="navbar-toggler border-0" type="button" data-bs-toggle="modal" data-bs-target="#modal-searchform">
			    <i class="fa-solid fa-magnifying-glass"></i>
			</button>
			<button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation" style="width: 46px;">
                <i id="navbar-toggler-icon" class="fa-solid fa-bars fa-lg"></i>
			</button>
		</div>
		<div class="d-none d-lg-block">
			<?php get_search_form(); ?>  
		</div>
		<div class="collapse navbar-collapse" id="navbar">
		<?php 
        wp_nav_menu([
            'theme_location' => 'menu-1',
            'container' => false,
            'menu_class' => '',
            'fallback_cb' => '__return_false',
            'items_wrap' => '<ul id="%1$s" class="navbar-nav ms-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
            'depth' => 2,
            'walker' => new bootstrap_5_wp_nav_menu_walker(),
        ]); 
        ?>
        <ul class="navbar-nav align-items-center justify-content-start">
            <li class="nav-item">
                <?php 
                if(!wp_is_mobile()) {
                    get_template_part('template-parts/theme', 'toggler'); 
                }
                ?>
            </li>
        </ul>
		</div>
		<div class="d-none d-lg-flex ms-1">
            <ul class="navbar-nav border-start align-items-center ps-3">
                <li class="nav-item">
                    <a href="<?php echo get_permalink(2); ?>" class="nav-link">
						<?php echo get_the_title(2); ?>
                    </a>
                </li>
                <li class="nav-item ms-3">
                    <a href="https://github.com/Rucilos/wpde" class="btn btn-primary">
                        <?php _e('Get full access', 'wpde'); ?>
                        <i class="fa-solid fa-arrow-right ms-1"></i> 
                    </a>
                </li>
            </ul>
        </div>
	</div>
</nav>

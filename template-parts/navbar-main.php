<nav class="navbar navbar-expand-lg border-bottom shadow-sm fixed-top">
	<div class="container">
		<a class="navbar-brand d-flex align-items-center gap-1" href="<?php echo home_url(); ?>">
			<?php if (WPDE()->is_acf()) {
       $image = get_field('logo', 'option');
       $title = get_field('text_logo', 'option');
       if (!empty($image)) {
           $image_width = get_field('logo_width', 'option') ? get_field('logo_width', 'option') : '100'; ?>
			<img src="<?php echo esc_url($image['url']); ?>" alt="Logo" width="<?php echo $image_width; ?>" height="auto"/>
			<?php
       }
       if (!empty($title)) {
           echo $title;
       }
   } else {
       echo get_bloginfo('name');
   } ?>
		</a>
		<div class="d-flex ms-auto">
			<button class="navbar-toggler border-0" type="button" data-bs-toggle="modal" data-bs-target="#modal-searchform">
			<i class="fa-solid fa-magnifying-glass"></i>
			</button>
			<button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
		</div>
		<div class="d-none d-lg-block">
			<?php get_search_form(); ?>  
		</div>
		<div class="collapse navbar-collapse" id="navbar">
		<?php wp_nav_menu([
      'theme_location' => 'menu-1',
      'container' => false,
      'menu_class' => '',
      'fallback_cb' => '__return_false',
      'items_wrap' => '<ul id="%1$s" class="navbar-nav ms-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
      'depth' => 2,
      'walker' => new bootstrap_5_wp_nav_menu_walker(),
  ]); ?>
		</div>
		<div class="d-none d-lg-flex ms-3">
    <ul class="navbar-nav border-start align-items-center ps-3">
        <li class="nav-item dropdown">
            <?php if (!is_user_logged_in()) { ?>
                <a href="<?php echo home_url() . '/sign-in'; ?>" class="nav-link"><?php _e('Sign in', 'wpde'); ?></a>
            <?php } else {
                $current_user = wp_get_current_user();
                $user_id = $current_user->ID;
                $user_first_name = get_the_author_meta('first_name', $user_id);
                $user_last_name = get_the_author_meta('last_name', $user_id);
                
                if (!empty($user_first_name) || !empty($user_last_name)) {
                    $user_name = $user_first_name . ' ' . $user_last_name;
                } else {
                    $user_name = get_the_author_meta('user_nicename', $user_id);
                }
                
                if (function_exists('WPDE') && WPDE()->is_acf()) {
                    $user_avatar = get_field('user_avatar', 'user_' . $user_id);
                    $user_job = get_field('user_job', 'user_' . $user_id);
                }
                ?>
                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
					<?php echo get_avatar($current_user->ID, 32, '', '', ['class' => 'rounded-circle']); ?>
                    <span class="ms-2"><?php echo $user_name; ?></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="<?php echo home_url() . '/profile'; ?>"><?php _e('Profile', 'wpde'); ?></a></li>
                    <li><a class="dropdown-item" href="<?php echo wp_logout_url(home_url()); ?>"><?php _e('Log out', 'wpde'); ?></a></li>
                </ul>
            <?php } ?>
        </li>
        <li class="nav-item">
            <a href="https://linkedin.com/" target="_blank" class="ms-3"><i class="fa-brands fa-linkedin fa-lg"></i></a>
        </li>
        <li class="nav-item">
            <a href="https://github.com/Rucilos/wpde" target="_blank" class="ms-3"><i class="fa-brands fa-github fa-lg"></i></a>
        </li>
    </ul>
</div>


	</div>
</nav>

<div class="container-fluid">
    <div class="row vh-100">
    <div class="col-md-6 d-none d-md-flex h-100 border-end" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/bg-login.png); background-size: cover; background-position: center;"></div>
        <div class="col-md-6 h-100 d-flex flex-column align-items-center justify-content-between px-5 px-lg-6 px-xl-8 px-xxl-10 pt-10 pb-3">
            <div class="w-100">
            <a class="d-block mb-3" href="<?php echo home_url(); ?>">
			<?php
			if(WPDE()->is_acf()) {
				$image = get_field('logo', 'option');
				$title = get_field('text_logo', 'option');
				if (!empty($image)) { 
					$image_width = get_field('logo_width', 'option') ? get_field('logo_width', 'option') : '100'; 
			?>
			<img src="<?php echo esc_url($image['url']); ?>" alt="Logo" width="<?php echo $image_width; ?>" height="auto"/>
			<?php 
				} 
				if (!empty($title)) { 
					echo $title;
				}
			} else {
				echo get_bloginfo('name');
			}
			?>
		    </a>
			<p><?php _e('Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aliquam ante. Praesent id justo in neque elementum ultrices.', 'wpde'); ?></p>
			</div>
			<div class="w-100">
			<h1><?php echo get_the_title(); ?></h1>	
            <?php
            if ( ! is_user_logged_in() ) {
                $args = array(
                    'redirect'       => home_url(), 
                    'form_id'        => 'loginform',
                    'label_username' => __( 'Username' ),
                    'label_password' => __( 'Password' ),
                    'label_remember' => __( 'Remember Me' ),
                    'label_log_in'   => __( 'Log In' ),
                    'remember'       => true,
                );
                wp_login_form( $args );
            } else {
			?>
				<p><?php _e('You are already logged in.', 'wpde'); ?></p>
				<a href="<?php echo wp_logout_url( home_url() ); ?>"><?php _e('Log out', 'wpde'); ?></a>
            <?php } ?>
			</div>
            <div class="w-100">
			<div class="d-flex flex-column flex-sm-row justify-content-between align-items-center py-4 mt-4 border-top">
				<div>
				<small>© <?php echo date('Y'); ?> WPDE, Inc. All rights reserved.</small>
				</div>
				<div class="d-flex align-items-center gap-3">
					<ul class="list-unstyled d-flex align-items-center flex-wrap flex-md-nowrap mb-0">
						<li class="me-3"><a href="#"><i class="bi bi-facebook"></i></a></li>
						<li class="me-3"><a href="#"><i class="bi bi-instagram"></i></a></li>
						<li class="me-3"><a href="#"><i class="bi bi-twitter-x"></i></a></li>
		
					</ul>
					<?php get_template_part('template-parts/theme', 'toggler'); ?>
				</div>
			</div>
            </div>
        </div>
    </div>
</div>

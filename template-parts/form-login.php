<div class="container-fluid">
    <div class="row vh-100">
        <div class="col-md-6 h-100 border-end" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/bg-login.png); background-size: cover; background-position: center;"></div>
        <div class="col-md-6 p-5">
            <div class="my-5">
			<h1><?php echo get_the_title(); ?></h1>	
            <?php if (!is_user_logged_in()) {
                $args = [
                    'redirect' => home_url(),
                    'form_id' => 'loginform',
                    'label_username' => __('E-mail address'),
                    'label_password' => __('Password'),
                    'label_remember' => __('Remember me'),
                    'label_log_in' => __('Sign in'),
                    'remember' => false,
                ];
                wp_login_form($args);
            } else {
                 ?>
				<p><?php _e('You are already logged in.', 'wpde'); ?></p>
				<a class="link-underline link-underline-opacity-0" href="<?php echo wp_logout_url(home_url()); ?>"><i class="fa-solid fa-power-off"></i> <?php _e('Log out', 'wpde'); ?></a>
            <?php
            } ?>
            </div>
            <div class="position-absolute bottom-0">
            <a href="<?php echo home_url(); ?>" class="link-underline link-underline-opacity-0"><i class="fa-solid fa-arrow-left-long"></i> <?php _e('Go back home', 'wpde'); ?></a>     
			<div class="d-flex flex-column flex-sm-row justify-content-between align-items-center py-4 mt-4 border-top">
				<div>
				<small><i class="fa-regular fa-copyright"></i> <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php _e('All rights reserved.', 'wpde'); ?></small>
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

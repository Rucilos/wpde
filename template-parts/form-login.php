<div class="container-fluid">
    <div class="row vh-100">
    <div class="col-md-6 h-100 border-end" style="background-image: url(<?php echo get_template_directory_uri(); ?>/img/bg-login.png); background-size: cover; background-position: center;"></div>
        <div class="col-md-6 h-100 d-flex flex-column align-items-center justify-content-between px-5 px-lg-6 px-xl-8 px-xxl-10 pt-10 pb-3">
            <div></div>
            <div class="w-100">
            <small class="d-block mb-1 text-primary"><strong>Post</strong></small>
			<h1><?php echo get_the_title(); ?></h1>	
            <?php if (!is_user_logged_in()) {
                $args = [
                    'redirect' => home_url(),
                    'form_id' => 'loginform',
                    'label_username' => __('Username'),
                    'label_password' => __('Password'),
                    'label_remember' => __('Remember me'),
                    'label_log_in' => __('Log in'),
                    'remember' => false,
                ];
                wp_login_form($args);
            } else {
                 ?>
				<p class="mb-2"><?php _e('You are already logged in.', 'wpde'); ?></p>
                <a class="link-underline link-underline-opacity-0 d-block mb-5" href="<?php echo wp_logout_url(home_url()); ?>"><i class="fa-solid fa-power-off"></i> <?php _e('Log out', 'wpde'); ?></a>
            <?php
            } ?>
            <a href="<?php echo home_url(); ?>" class="link-underline link-underline-opacity-0"><i class="fa-solid fa-arrow-left-long"></i> <?php _e('Go back home', 'wpde'); ?></a>     
        </div>
        <div></div>
        </div>

    </div>
</div>
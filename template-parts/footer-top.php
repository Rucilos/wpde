<div class="container-fluid px-0 pt-5 mt-3">
	<div class="container">
		<div class="row">
		<div class="col-md-4 mb-3">
			<a class="d-block mb-2" href="<?php echo home_url(); ?>">
			<?php 
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
			?>
			</a>
			<p class="mb-1 text-muted"><small><?php _e('Designed and built with all the love in the world by the Bootstrap team with the help of our contributors.', 'wpde'); ?></small></p>
			<p class="mb-1 text-muted"><small><?php _e('Code licensed under', 'wpde'); ?> MIT</small></p>
			<p class="mb-1 text-muted"><small><?php _e('Currently', 'wpde'); ?> v<?php echo WPDE()->_version; ?></small></p>
		</small>
			</div>

			<div class="col-md-2 offset-md-2 mb-3">
				<h5>Section</h5>
				<?php 
				wp_nav_menu([
					'theme_location' => 'menu-2',
					'container' => false,
					'menu_class' => '',
					'fallback_cb' => '__return_false',
					'items_wrap' => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
					'depth' => 2,
					'walker' => new bootstrap_5_wp_nav_menu_walker(),
				]); 
				?>
			</div>

			<div class="col-md-2 mb-3">
				<h5>Section</h5>
				<?php 
				wp_nav_menu([
					'theme_location' => 'menu-3',
					'container' => false,
					'menu_class' => '',
					'fallback_cb' => '__return_false',
					'items_wrap' => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
					'depth' => 2,
					'walker' => new bootstrap_5_wp_nav_menu_walker(),
				]); 
				?>
			</div>

			<div class="col-md-2 mb-3">
				<h5>Section</h5>
				<?php 
				wp_nav_menu([
					'theme_location' => 'menu-4',
					'container' => false,
					'menu_class' => '',
					'fallback_cb' => '__return_false',
					'items_wrap' => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
					'depth' => 2,
					'walker' => new bootstrap_5_wp_nav_menu_walker(),
				]); 
				?>
			</div>
		</div>
	</div>
</div>
	
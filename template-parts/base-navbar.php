<?php if(!is_404()) { ?>
<nav class="navbar navbar-expand-lg border-top border-bottom shadow-sm">
	<div class="container">
		<a class="navbar-brand d-flex align-items-center gap-1" href="<?php echo home_url(); ?>">
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
		<div class="d-flex ms-auto">
			<button class="navbar-toggler border-0" type="button" data-bs-toggle="modal" data-bs-target="#modal-searchform">
				<i class="bi bi-search"></i>
			</button>
			<button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
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
		</div>
		<div class="d-none d-lg-flex ms-3">
			<a href="#" class="btn btn-primary"><?php _e('Sign up', 'wpde'); ?></a>
		</div>
	</div>
</nav>
<?php } ?>

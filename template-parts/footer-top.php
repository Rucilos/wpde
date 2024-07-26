<?php
$logo = get_field('wpde_logo', 'option');
if ($logo) {
    $logo_image = $logo['image'];
    $logo_width = $logo['width'] ? $logo['width'] : 100;
    $logo_text = $logo['text'];
}
?>
<div class="container-fluid px-0 pt-6 pb-3">
	<div class="container">
		<div class="row">
		<div class="col-md-4 mb-3">
			<a class="d-block mb-2" href="<?php echo home_url(); ?>">
			<?php if (!empty($logo_image)) { ?>
            <img src="<?php echo esc_url($logo_image['url']); ?>" alt="Logo" width="<?php echo $logo_width; ?>" height="auto"/>
			<?php
			} elseif(!empty($logo_text)) {
				echo $logo_text;
			} else {
				echo get_bloginfo('name');
			}
			?>
			</a>
			<?php 
				$footer_block = get_field('footer_block', 'option');
				echo '<small class="text-muted">' . $footer_block . '</small>';
			?>
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
	
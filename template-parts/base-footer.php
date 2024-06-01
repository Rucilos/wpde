<?php if (!is_404() && !is_page('sign-in')) { ?>
<footer class="footer">
	<div class="container-fluid pt-5 mt-3">
		<div class="container">
			<div class="row">
				<div class="col-6 col-md-2 mb-3">
					<h5>Section</h5>
					<?php wp_nav_menu([
         'theme_location' => 'menu-2',
         'container' => false,
         'menu_class' => '',
         'fallback_cb' => '__return_false',
         'items_wrap' => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
         'depth' => 2,
         'walker' => new bootstrap_5_wp_nav_menu_walker(),
     ]); ?>
				</div>

				<div class="col-6 col-md-2 mb-3">
					<h5>Section</h5>
					<?php wp_nav_menu([
         'theme_location' => 'menu-3',
         'container' => false,
         'menu_class' => 'sadsadsadasdsadsadsa',
         'fallback_cb' => '__return_false',
         'items_wrap' => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
         'depth' => 2,
         'walker' => new bootstrap_5_wp_nav_menu_walker(),
     ]); ?>
				</div>

				<div class="col-6 col-md-2 mb-3">
					<h5>Section</h5>
					<?php wp_nav_menu([
         'theme_location' => 'menu-4',
         'container' => false,
         'menu_class' => '',
         'fallback_cb' => '__return_false',
         'items_wrap' => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
         'depth' => 2,
         'walker' => new bootstrap_5_wp_nav_menu_walker(),
     ]); ?>
				</div>

				<div class="col-md-5 offset-md-1 mb-3">
					<form>
						<h5>Subscribe to our newsletter</h5>
						<p>Monthly digest of what's new and exciting from us.</p>
						<div class="d-flex flex-column flex-sm-row w-100 gap-2">
							<label for="newsletter1" class="visually-hidden">Email address</label>
							<input id="newsletter1" type="text" class="form-control" placeholder="Email address">
							<button class="btn btn-primary" type="button">Subscribe</button>
						</div>
					</form>
				</div>
			</div>

			<div class="d-flex flex-column flex-sm-row justify-content-start justify-content-md-between align-items-center py-4 mt-4 border-top">
				<div>
				<small>© <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php _e('All rights reserved.', 'wpde'); ?></small>
				</div>
				<div class="d-flex align-items-center gap-4">
					<ul class="list-unstyled d-flex align-items-center flex-wrap flex-md-nowrap column-gap-3 mb-0">
					<li><a href="#"><i class="fa-brands fa-facebook"></i></a></li>
					<li><a href="#"><i class="fa-brands fa-instagram"></i></a></li>
					<li><a href="#"><i class="fa-brands fa-twitter"></i></a></li>
					<li><a href="#"><i class="fa-brands fa-youtube"></i></a></li>
					<li><a href="#"><i class="fa-brands fa-tiktok"></i></a></li>
					<li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
					<li><a href="#"><i class="fa-solid fa-comments"></i></a></li>
					<li><a href="#"><i class="fa-brands fa-github"></i></a></li>
					<li><a href="#"><i class="fa-solid fa-envelope"></i></a></li>
					<li><a href="#"><i class="fa-solid fa-phone-alt"></i></a></li>
					</ul>
					<?php get_template_part('template-parts/theme', 'toggler'); ?>
				</div>
			</div>
		</div>
	</div>
</footer>
<?php } ?>

<?php if(!is_404()) { ?>
<footer>
	<div class="container-fluid bg-body-secondary pt-5 mt-3">
		<div class="container">
			<div class="row">
				<div class="col-6 col-md-2 mb-3">
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

				<div class="col-6 col-md-2 mb-3">
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

				<div class="col-6 col-md-2 mb-3">
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

			<div class="d-flex flex-column flex-sm-row justify-content-between align-items-center py-4 mt-4 border-top">
				<div>
				<small>© <?php echo date('Y'); ?> WPDE, Inc. All rights reserved.</small>
				</div>
				<div class="d-flex align-items-center">

				<ul class="list-unstyled d-flex align-items-center flex-wrap flex-md-nowrap mb-0">
					<li class="ms-3"><a href="#"><i class="bi bi-facebook"></i></a></li>
					<li class="ms-3"><a href="#"><i class="bi bi-instagram"></i></a></li>
					<li class="ms-3"><a href="#"><i class="bi bi-twitter-x"></i></a></li>
					<li class="ms-3"><a href="#"><i class="bi bi-youtube"></i></a></li>
					<li class="ms-3"><a href="#"><i class="bi bi-tiktok"></i></a></li>
					<li class="ms-3"><a href="#"><i class="bi bi-linkedin"></i></a></li>
					<li class="ms-3"><a href="#"><i class="bi bi-threads"></i></a></li>
					<li class="ms-3"><a href="#"><i class="bi bi-github"></i></a></li>
					<li class="ms-3"><a href="#"><i class="bi bi-envelope-fill"></i></a></li>
					<li class="ms-3"><a href="#"><i class="bi bi-telephone-fill"></i></a></li>

					<li class="ms-3"><a class="nav-link" href="#!" data-fontsize="sm">A</a></li>
					<li class="mx-2"><a class="nav-link text-primary" href="#!" data-fontsize="default">A</a></li>
					<li class="me-3"><a class="nav-link" href="#!" data-fontsize="lg">A</a></li>
				</ul>

				<select class="form-select" name="wpde-theme" style="max-width: 150px;">
					<option value="auto">Auto mode</option>
					<option value="light">Light mode</option>
					<option value="dark">Dark mode</option>
				</select>
				</div>
			</div>
		</div>
	</div>
</footer>
<?php } ?>

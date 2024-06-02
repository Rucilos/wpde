<div class="container-fluid pt-5 mt-3">
		<div class="container">
			<div class="row">
				<div class="col-md-2 mb-3">
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

				<div class="col-md-2 mb-3">
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

				<div class="col-md-2 mb-3">
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
							<div class="input-group d-block">
								<div class="icon">
									<span><i class="fa-solid fa-magnifying-glass"></i></span>
									<input type="text" class="form-control ps-5" placeholder="Email address">
								</div>
							</div>
							<button class="btn btn-primary" type="button">Subscribe</button>
						</div>
					</form>
				</div>
			</div>
			</div>
	</div>
	
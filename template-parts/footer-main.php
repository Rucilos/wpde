<footer>
	<div class="container-fluid px-0">
		<div class="container">
			<div class="d-flex flex-column flex-sm-row justify-content-start justify-content-md-between align-items-center py-4 mt-4 border-top">
				<div>
				<small class="text-muted">© <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php _e('All rights reserved.', 'wpde'); ?></small>
				</div>
				<div class="d-flex align-items-center gap-4">
					<ul class="list-unstyled d-flex align-items-center flex-wrap flex-md-nowrap column-gap-3 mb-0">
						<li>
							<a href="#!" class="nav-link" onclick="CookieConsent.showPreferences(); return false;">
								<small><?php _e('Privacy policy', 'wpde'); ?></small>
							</a>
						</li>
						<li>
						<a href="#!" class="nav-link" onclick="CookieConsent.showPreferences(); return false;">
								<small><?php _e('Privacy settings', 'wpde'); ?></small>
							</a>
						</li>
					</ul>
					<?php get_template_part('template-parts/social', 'media'); ?>

				</div>
			</div>
		</div>
	</div>
</footer>

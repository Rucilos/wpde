<footer>
	<div class="container-fluid px-0">
		<div class="container">
			<div class="d-flex flex-column flex-sm-row justify-content-start justify-content-md-between align-items-center py-4 mt-4 border-top">
				<div>
				<small class="text-muted">© <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php _e('All rights reserved.', 'wpde'); ?></small>
				</div>
				<div class="d-flex align-items-center gap-4">
					<ul class="list-unstyled d-flex align-items-center flex-wrap flex-md-nowrap column-gap-3 mb-0">
					<li><a href="#" target="_blank"><i class="fa-brands fa-facebook"></i></a></li>
					<li><a href="#" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
					<li><a href="#" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
					<li><a href="#" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
					<li><a href="#" target="_blank"><i class="fa-brands fa-tiktok"></i></a></li>
					</ul>
					<?php get_template_part('template-parts/theme', 'toggler'); ?>
				</div>
			</div>
		</div>
	</div>
</footer>

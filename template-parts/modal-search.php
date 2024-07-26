<?php
$options = get_field('wpde_options', 'option');
if ($options) {
    $search_form = $options['search_form'];
}

if (empty($search_form)) { 
?>
<div class="modal fade" id="modal-searchform" tabindex="-1" aria-labelledby="modal-searchform-label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="modal-searchform-label"><?php _e('Search', 'wpde'); ?></h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<?php get_search_form(); ?>
			</div>
		</div>
	</div>
</div>
<?php } ?>

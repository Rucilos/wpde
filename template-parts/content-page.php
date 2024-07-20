<div class="container py-6">
    <?php if (has_post_thumbnail()) {
        the_post_thumbnail('medium', ['class' => 'card-img-top']);
    } ?>
    <div class="pb-5 mb-5 border-bottom">
        <small class="text-primary">
            <strong>
                <?php _e('Page', 'wpde'); ?>
            </strong>
        </small>	
        <h1 class="mb-2">
            <?php echo get_the_title(); ?>
        </h1>
        <p class="mb-0 text-muted">
            <?php echo get_the_excerpt(); ?>
        </p>
	</div>
    <?php 
    if(is_page('contacts')) {
        $contact_form = get_field('contact_form', 'option');
        if(empty($contact_form)) {
            echo do_shortcode('[contact-form-7 id="2455da2" title="Contact form 1"]');
        }
    } else {
        the_content(); 
    }
    ?>		
</div>

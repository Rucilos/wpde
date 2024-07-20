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
    <?php if(is_page('contacts')) { ?>
        <div class="row">
            <div class="col-md-6">
            <?php
            $contact_form = get_field('contact_form', 'option');
            $map = get_field('map', 'option');
            $map_link = get_field('map_link', 'option');
            if(empty($contact_form)) {
                echo do_shortcode('[contact-form-7 id="2455da2" title="Contact form 1"]');
            }
            ?>
            </div>
            <div class="col-md-6">
            <?php
            if(empty($map)) {
            echo '<iframe src="' . $map_link . '" width="100%" height="350" class="rounded-4" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>';
            }
            ?>
            </div>
        </div>
    <?php
    } else {
        the_content(); 
    }
    ?>		
</div>

<div class="container py-6">
    <?php if (has_post_thumbnail()) {
        the_post_thumbnail('medium', ['class' => 'card-img-top']);
    } ?>
    <?php echo WPDE()->the_title(get_the_title(), __('Page', 'wpde'), wp_trim_words(get_the_excerpt(), 15, '')); ?>
    <?php if(is_page('contacts')) { ?>
        <div class="row">
            <div class="col-md-6">
            <?php
            $metadata = get_field('wpde_metadata', 'option');
        if ($metadata) {
            $gmap = esc_url($metadata['google_map']);
            $cf7_id = esc_url($metadata['cf7_id']);
        }

        $options = get_field('wpde_options', 'option');
        if ($options) {
            $contact_form = $options['contact_form'];
            $google_map = $options['google_map'];
        }

        if(empty($contact_form)) {
            if(!empty($cf7_id)) {
                echo do_shortcode('[contact-form-7 id="' . $cf7_id . '" title="Contact form"]');
            }
        }
        ?>
            </div>
            <div class="col-md-6">
            <?php
        if(empty($google_map)) {
            echo '<iframe src="' . esc_url($gmap) . '" width="100%" height="350" class="rounded-4" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>'; // Escapování URL mapy
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

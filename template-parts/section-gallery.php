<?php if (have_rows('wpde_gallery_items', 'option')) { ?>
    <div class="container-fluid px-0 py-6">
        <div class="container">
            <?php
            $gallery = get_field('wpde_gallery', 'option');
            if ($gallery) {
                $title = $gallery['title']; 
                $subtitle = $gallery['subtitle']; 
                $description = $gallery['description']; 
                $grid = $gallery['grid']; 
            } else {
                $grid = 3;
            }
            ?>
            <?php if ( !empty($title) || !empty($subtitle) || !empty($description) ) { ?>
                <div class="pb-5">
                    <small class="text-primary"><strong><?php echo esc_html($title); ?></strong></small>	
                    <h1 class="mb-2"><?php echo esc_html($subtitle); ?></h1>
                    <p class="mb-0 text-muted"><?php echo esc_html($description); ?></p>
                </div>
            <?php } ?>
            <div class="row g-3 mfp-init">
            <?php 
            $images = get_field('wpde_gallery_items', 'option');
            if( $images ) { ?>
                <?php foreach( $images as $image ) { ?>
                    <a class="col-md-<?php echo esc_attr($grid); ?> mfp-item" href="<?php echo esc_url($image['url']); ?>">
                        <img class="img-fluid rounded-4" src="<?php echo esc_url($image['sizes']['large']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    </a>
                <?php } ?>
            <?php } ?>
            </div>
        </div>
    </div>
<?php } ?>

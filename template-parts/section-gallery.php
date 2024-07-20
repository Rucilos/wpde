<?php if (function_exists('get_sub_field')) { ?>
    <?php if (have_rows('icons', 'option')) { ?>
        <div class="container-fluid px-0 py-6">
            <div class="container">
                <?php 
                $section_title = get_field('gallery_title', 'option');
                $section_subtitle = get_field('gallery_subtitle', 'option');
                $section_description = get_field('gallery_description', 'option');
                ?>

                <?php if ( !empty($section_title) || !empty($section_subtitle) || !empty($section_description) ) { ?>
                    <div class="pb-5">
                        <small class="text-primary"><strong><?php echo $section_title; ?></strong></small>	
                        <h1 class="mb-2"><?php echo $section_subtitle; ?></h1>
                        <p class="text-muted"><?php echo $section_description; ?></p>
                    </div>
                <?php } ?>

                <div class="row mfp-init">
                <?php 
                $images = get_field('gallery', 'option');
                $grid = get_field('gallery_grid', 'option') ? get_field('gallery_grid', 'option') : 3;
                if( $images ) { ?>
                    <?php foreach( $images as $image ) { ?>
                            <a class="col-lg-<?php echo $grid; ?> mfp-item" href="<?php echo esc_url($image['url']); ?>">
                                <img class="img-fluid" src="<?php echo esc_url($image['sizes']['thumbnail']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                            </a>
                    <?php } ?>
                <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>
<?php } ?>
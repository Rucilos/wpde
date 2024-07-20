<?php if (function_exists('get_sub_field')) { ?>
    <?php if (have_rows('icons', 'option')) { ?>
        <div class="container-fluid px-0 py-6">
            <div class="container">
                <?php 
                $section_title = get_field('icons_title', 'option');
                $section_subtitle = get_field('icons_subtitle', 'option');
                $section_description = get_field('icons_description', 'option');
                ?>

                <?php if ( !empty($section_title) || !empty($section_subtitle) || !empty($section_description) ) { ?>
                    <div class="pb-5 mb-5 border-bottom">
                        <small class="text-primary"><strong><?php echo $section_title; ?></strong></small>	
                        <h1 class="mb-2"><?php echo $section_subtitle; ?></h1>
                        <p class="text-muted"><?php echo $section_description; ?></p>
                    </div>
                <?php } ?>

                <div class="row">
                    <?php 
                    $grid = get_field('icons_grid', 'option') ? get_field('icons_grid', 'option') : 3;
                    while (have_rows('icons', 'option')) {

                        the_row();

                        $title = get_sub_field('title');
                        $description = get_sub_field('description');
                        $image = get_sub_field('image');
                        ?>
                        <div class="col-md-<?php echo $grid; ?>">
                            <?php if (!empty($image)) { ?>
                                <img class="mb-3" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" width="35px" height="auto" />
                            <?php } ?>
                            <h6 class="mb-0"><?php echo $title; ?></h6>
                            <p><?php echo $description; ?></p>
                        </div>
                    <?php
                    } ?>
                </div>
            </div>
        </div>
    <?php } ?>
<?php } ?>

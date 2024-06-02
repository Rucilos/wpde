<?php if (function_exists('get_sub_field')) { ?>
    <?php if (have_rows('icons', 'option')) { ?>
        <div class="container-fluid px-0 py-5">
            <div class="container">
                <div class="pb-5 mb-5 border-bottom">
                    <small class="text-primary"><strong><?php the_field('icons_subtitle', 'option'); ?></strong></small>	
                    <h1 class="mb-2"><?php the_field('icons_title', 'option'); ?></h1>
                    <p class="text-muted"><?php the_field('icons_description', 'option'); ?></p>
                </div>
                <div class="row">
                    <?php while (have_rows('icons', 'option')) {

                        the_row();

                        $title = get_sub_field('title');
                        $description = get_sub_field('description');
                        $image = get_sub_field('image');
                        ?>
                        <div class="col-md-3">
                            <?php if (!empty($image)) { ?>
                                <img class="mb-3" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" width="35px" height="auto" />
                            <?php } ?>
                            <h6><?php echo $title; ?></h6>
                            <p><?php echo $description; ?></p>
                        </div>
                    <?php
                    } ?>
                </div>
            </div>
        </div>
    <?php } ?>
<?php } ?>

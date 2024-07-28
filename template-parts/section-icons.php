<?php if (have_rows('wpde_icons_items', 'option')) { ?>
    <div class="container-fluid px-0 py-6">
        <div class="container">
        <?php
            $icons = get_field('wpde_icons', 'option');
            if ($icons) {
                $title = $icons['title']; 
                $subtitle = $icons['subtitle']; 
                $description = $icons['description']; 
                $grid = $icons['grid'];
            } else {
                $grid = 3;
            }
            ?>
            <?php if ( !empty($title) || !empty($subtitle) || !empty($description) ) { ?>
                <div class="pb-5 mb-6 border-bottom text-center">
                    <small class="text-primary"><strong><?php echo esc_html($subtitle); ?></strong></small>	
                    <h1 class="mb-2"><?php echo esc_html($title); ?></h1>
                    <p class="mb-0 text-muted"><?php echo esc_html($description); ?></p>
                </div>
            <?php } ?>
            <div class="row">
                <?php 
                while (have_rows('wpde_icons_items', 'option')) {
                    the_row();
                    $item_title = get_sub_field('title');
                    $item_description = get_sub_field('description');
                    $image = get_sub_field('image');
                    ?>
                    <div class="col-md-<?php echo esc_attr($grid); ?> text-center">
                        <?php if (!empty($image)) { ?>
                            <img class="mb-3" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" width="35px" height="auto" />
                        <?php } ?>
                        <h6 class="mb-0"><?php echo esc_html($item_title); ?></h6>
                        <p class="mx-3"><?php echo esc_html($item_description); ?></p>
                    </div>
                <?php
                } ?>
            </div>
        </div>
    </div>
<?php } ?>

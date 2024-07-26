<?php if (have_rows('wpde_logos_items', 'option')) { ?>
    <div class="container-fluid px-0 py-6">
        <div class="container">
        <?php
            $icons = get_field('wpde_logos', 'option');
            if ($icons) {
                $title = $icons['title']; 
                $subtitle = $icons['subtitle']; 
                $description = $icons['description']; 
            }
            ?>
            <?php if ( !empty($title) || !empty($subtitle) || !empty($description) ) { ?>
                <div class="pb-5 mb-5 border-bottom text-end">
                    <small class="text-primary"><strong><?php echo $subtitle; ?></strong></small>	
                    <h1 class="mb-2"><?php echo $title; ?></h1>
                    <p class="text-muted"><?php echo $description; ?></p>
                </div>
            <?php } ?>
            <div class="row justify-content-center align-items-center">
                <?php 
                while (have_rows('wpde_logos_items', 'option')) {
                    the_row();
                    $image = get_sub_field('image');
                    $link = get_sub_field('link');
                    if($link) {
                        $link_url = $link['url'];
                        $link_target = $link['target'] ? $link['target'] : '_self';
                    }
                    ?>
                    <div class="col-md-2 text-center">
                        <a href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>">
                            <img class="mb-3" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" width="135px" height="auto" />
                        </a>
                    </div>
                <?php
                } ?>
            </div>
        </div>
    </div>
<?php } ?>
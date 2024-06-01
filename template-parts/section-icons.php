<?php if (WPDE()->is_acf()) { ?>
    <?php if (have_rows('icons', 'option')) { ?>
        <div class="container py-5">
            <small>Lorem Ipsum Dolor</small>
            <h1>Lorem Ipsum Dolor</h1>
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
    <?php } ?>
<?php } ?>

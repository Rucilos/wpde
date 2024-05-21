<?php if (have_posts()) { ?>
    <div class="container py-5">
        <div class="row row-gap-3">
            <?php
                while (have_posts()) {
                    the_post();
                    echo '<div class="col-md-3">';
                        get_template_part('template-parts/content', 'post');
                    echo '</div>';
                }
                wp_reset_postdata();
                get_template_part('template-parts/content', 'pagination');
            ?>
        </div>
    </div>
<?php } ?>

<?php if (have_posts()) { ?>
    <div class="container py-5">
        <div class="pb-5 mb-5 border-bottom">
            <h1 class="mb-1"><?php echo __('From the blog', 'text-domain'); ?></h1>
            <p><?php echo __('Learn how to grow your business with our expert advice.', 'text-domain'); ?></p>
		</div>
        <div class="row row-gap-5">
            <?php
            while (have_posts()) {
                the_post();
                echo '<div class="col-md-4">';
                get_template_part('template-parts/content', 'post');
                echo '</div>';
            }
            wp_reset_postdata();
            get_template_part('template-parts/content', 'pagination');
            ?>
        </div>
    </div>
<?php } ?>

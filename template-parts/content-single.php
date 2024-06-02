<div class="container py-5">
    <div class="row justify-content-center">
		<?php while (have_posts()) {
      the_post(); ?>

            <div class="col-md-10">     
			    <small class="d-block mb-1 text-primary"><strong><?php _e('Post', 'wpde'); ?></strong></small>	
                <div class="d-flex align-items-center justify-content-between">
                <h1 class="mb-1"><?php echo get_the_title(); ?></h1>
                <?php if (has_category()) {
                    $categories = get_the_category();
                    foreach ($categories as $category) {
                        echo '<small class="text-muted"><strong>' . esc_html($category->name) . '</strong></small>';
                    }
                } ?>
                </div>
                <?php if (!is_404() || !is_page('sign-in')) {
                    WPDE()->breadcrumbs();
                } ?>
                <?php if (has_post_thumbnail()) {
                    the_post_thumbnail('large', ['class' => 'img-fluid mb-5 shadow rounded-4']);
                } ?>
                <?php the_content(); ?>
            </div>
    
            <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top">
                <div>
                <?php
                $u_time = get_the_time('U');
                $u_modified_time = get_the_modified_time('U');
                if ($u_modified_time >= $u_time + 86400) {
                    $html = "<small class='d-block'><strong>Poslední aktualizace:</strong></small>";
                    $html .= '<small>' . the_modified_time('F jS, Y') . '</small>';
                    echo $html;
                } else {
                    $html = "<small class='d-block'><strong>Publikováno:</strong></small>";
                    $html .= '<small>' . get_the_date('F jS, Y') . '</small>';
                    echo $html;
                }
                ?> 
                </div>
                <div>
                    <h6 class="mb-1"><?php _e('Související příspěvky:', 'apiru'); ?></h6>
                    <small><?php previous_post_link('%link'); ?> / <?php next_post_link('%link'); ?></small> 
                </div>
            </div>

            <?php if (comments_open() || get_comments_number()) {
                comments_template();
            }
  } ?>
    </div>
</div>

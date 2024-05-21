<div class="container py-5">
    <div class="row">
        <?php
        if (have_posts()) {
            while (have_posts()) {
                the_post();
                echo '<div class="col-md-3">';
				echo get_the_title();		
				the_content();		
                echo '</div>';
            }
            wp_reset_postdata();
        } else {
            echo '<p class="text-danger">' . __('No data found.', 'wpde') . '</p>';
        }
        get_template_part('template-parts/content', 'pagination');

		if (is_page('kontakty')) {
			get_template_part('template-parts/form', 'contact');
			get_template_part('template-parts/iframe', 'map');
		} 
        ?>
    </div>
</div>
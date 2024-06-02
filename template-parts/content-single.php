<div class="col-md-12">     
    <div class="pb-5 mb-5 border-bottom">
        <small class="text-primary">
            <strong>
            <?php 
            if (has_category()) {
                $categories = get_the_category();
                foreach ($categories as $category) {
                    echo esc_html($category->name);
                }
            } 
            ?>
            </strong>
        </small>	
        <h1 class="mb-2"><?php echo get_the_title(); ?></h1>
        <p class="mb-0 text-muted"><?php echo wp_trim_words(get_the_excerpt(), 15, ''); ?></p>
    </div>
    <?php 
    if (has_post_thumbnail()) {
        the_post_thumbnail('large', ['class' => 'img-fluid mb-5 shadow rounded-4']);
    } 
    ?>
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

<?php 
if (comments_open() || get_comments_number()) {
    comments_template();
}
?>


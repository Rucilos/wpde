<div class="container py-5">
<?php
if (has_post_thumbnail()) {
    the_post_thumbnail('medium', ['class' => 'card-img-top']);
}
if (!is_page('sign-in')) { ?>
    <small class="text-primary"><strong><?php _e('Page', 'wpde'); ?></strong></small>	
    <h1 class="mb-2"><?php echo get_the_title(); ?></h1>
    <p class="mb-0 text-muted"><?php echo get_the_excerpt(); ?></p>
<?php }
?>
<?php the_content(); ?>		
</div>

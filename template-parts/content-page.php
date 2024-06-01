<?php
if (has_post_thumbnail()) {
    the_post_thumbnail('medium', ['class' => 'card-img-top']);
}
if (!is_page('sign-in')) { ?>
<h1><?php echo get_the_title(); ?></h1>		
<?php }
?>
<?php the_content(); ?>		

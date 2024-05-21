<?php
if (has_post_thumbnail()) {
	the_post_thumbnail('medium', ['class' => 'card-img-top']);
} 
?>
<h1><?php echo get_the_title(); ?></h1>		
<h1><?php echo get_the_content(); ?></h1>		

<div class="container py-5">
    <h1><?php echo get_the_title(); ?></h1>		
    <?php 
	the_content();		
	if (is_page('kontakty')) {
		get_template_part('template-parts/form', 'contact');
		get_template_part('template-parts/iframe', 'map');
	} 
	?>
</div>  

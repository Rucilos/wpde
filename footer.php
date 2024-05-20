<?php
/**
 * The template for displaying the footer.
 *
 * @link https://developer.wordpress.org/reference/functions/get_footer/
 *
 * @package WordPress Development Environment ("WPDE")
 * @author Jindřich Ručil
 * @since 1.0.0
 */
?>

<?php
get_template_part('template-parts/base', 'footer'); 
get_template_part('template-parts/modal', 'search'); 
wp_footer(); 
?>
</body>
</html>

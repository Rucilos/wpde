<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#front-page-display
 *
 * @package WordPress Development Environment ("WPDE")
 * @author Jindřich Ručil
 * @since 1.0.0
 */
?>

<?php get_header(); ?>

<div class="container py-5">
    <h3><?php _e('Stránka nebyla nalezena', 'apiru'); ?></h3>
    <p><?php _e('Pravděpdoboně hledáte něco co se na webu nenachází, vyzkoušejte vyhledávání nebo se vraťte na hlavní stránku.', 'apiru'); ?></p>  
    <a href="<?php echo home_url(); ?>" class="btn btn-primary btn-lg"><?php _e('Zpět na úvodní stránku', 'apiru'); ?></a>     
</div>

<?php get_footer(); ?>

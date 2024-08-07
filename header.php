<?php
/**
 * The template for displaying the header.
 *
 * @link https://developer.wordpress.org/reference/functions/get_header/
 *
 * @package WordPress Development Environment (WPDE)
 * @author Jindřich Ručil
 * @since 1.0.0
 */
?>

<!DOCTYPE html>
<html id="<?php echo esc_attr(WPDE()->_token); ?>" <?php language_attributes(); ?> data-bs-theme="light" class="cc--lightmode">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php
if (!is_404()) {
	get_template_part('template-parts/navbar', 'main');
}
?>

<main>
    
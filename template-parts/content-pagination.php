<?php
/**
* The template for displaying pagination in loop.
*
* @link https://developer.wordpress.org/themes/functionality/pagination/
*
* @package WordPress Development Environment ("WPDE")
* @author Jindřich Ručil
* @since 1.0.0
*/
?>
<?php WPDE()->pagination([
    // default: the_posts_pagination
    'end_size' => 3,
    'mid_size' => 3,
    'prev_text' => __('Předchozí', 'wpde'),
    'next_text' => __('Následující', 'wpde'),
    'screen_reader_text' => '',
]);
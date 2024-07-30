<?php
/**
* The template for displaying pagination in loop.
*
* @link https://developer.wordpress.org/themes/functionality/pagination/
*
* @package WordPress Development Environment (WPDE)
* @author Jindřich Ručil
* @since 1.0.0
*/
?>

<?php
WPDE()->pagination([ // the_posts_pagination() or WPDE()->pagination()
    'mid_size' => 2,
    'prev_text' => '<i class="fa-solid fa-angle-left"></i>',
    'next_text' => '<i class="fa-solid fa-angle-right"></i>',
    'screen_reader_text' => '',
]);

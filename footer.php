<?php
/**
 * The template for displaying the footer.
 *
 * @link https://developer.wordpress.org/reference/functions/get_footer/
 *
 * @package WordPress Development Environment (WPDE)
 * @author Jindřich Ručil
 * @since 1.0.0
 */
?>

<?php
if (!is_404()) {
    $footer = get_field('wpde_footer', 'option');
    if ($footer) {
        $footer_layout = $footer['layout'];
    } else {
        $footer_layout = 'Simple';
    }

    switch ($footer_layout) {
        case 'Simple':
            get_template_part('template-parts/footer', 'main');
            break;
        case 'Advanced':
            get_template_part('template-parts/footer', 'top');
            get_template_part('template-parts/footer', 'main');
            break;
        case '':
        default:
            get_template_part('template-parts/footer', 'main');
            break;
    }
}

get_template_part('template-parts/modal', 'search');

wp_footer();
?>

</body>
</html>

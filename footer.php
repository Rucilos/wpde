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
    $footer = get_field('footer', 'option');
    switch ($footer) {
        case 'Simple':
            get_template_part('template-parts/footer', 'main');
            break;
        case 'Advanced':
            get_template_part('template-parts/footer', 'top');
            get_template_part('template-parts/footer', 'main');
            break;
        default:
            get_template_part('template-parts/footer', 'main');
            break;
    }
}

$search_form = get_field('search_form', 'option');
if (empty($search_form)) {
    get_template_part('template-parts/modal', 'search');
}
?>

<?php wp_footer(); ?>

</body>
</html>

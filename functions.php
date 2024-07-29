<?php
/**
 * The template for displaying category pages.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress Development Environment (WPDE)
 * @author Jindřich Ručil
 * @since 1.0.0
 */
?>

<?php
require_once 'inc/class-wpde.php';
require_once 'inc/class-wpde-post-type.php';
require_once 'inc/class-wpde-taxonomy.php';

/**
 * Returns the main instance of WPDE to prevent the need to use globals.
 *
 * This function returns the main instance of the WPDE class to prevent the need for using globals.
 * It initializes and returns the WPDE instance, allowing access to its methods and properties.
 *
 * @return object|WPDE The main instance of the WPDE class.
 * @since  1.0.0
 */
function WPDE() {
    $instance = WPDE::instance(__FILE__, '1.9.0');

    return $instance;
} // END WPDE()

WPDE();

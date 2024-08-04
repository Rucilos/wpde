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
function WPDE()
{
    $instance = WPDE::instance(__FILE__, '2.1.9');

    return $instance;
} // END WPDE()

WPDE();

function add_cors_headers() {
    // Získání aktuální domény
    $allowed_origin = get_site_url(); // Vaše vlastní doména
    $allowed_origin_jsdelivr = 'https://cdn.jsdelivr.net'; // JsDelivr

    // Získání hlavičky 'Origin'
    $origin = isset($_SERVER['HTTP_ORIGIN']) ? $_SERVER['HTTP_ORIGIN'] : '';

    // Kontrola, zda je origin povolený
    if ($origin === $allowed_origin || strpos($origin, $allowed_origin_jsdelivr) === 0) {
        header('Access-Control-Allow-Origin: ' . $origin);
    }

    // Volitelné: Umožnit další metody a hlavičky
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type');
}

// Přidání akce pro inicializaci hlaviček
add_action('init', 'add_cors_headers');

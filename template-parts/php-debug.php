<?php
$debug = get_field('php_debug', 'option');
if($debug) {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
}

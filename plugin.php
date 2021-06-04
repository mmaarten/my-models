<?php
/**
 * Plugin Name:       My Models
 * Plugin URI:        https://github.com/mmaarten/my-models
 * Description:       Provides an object based modelling system.
 * Version:           1.0.0
 * Requires at least: 5.0
 * Requires PHP:      5.6
 * Author:            Maarten Menten
 * Author URI:        https://profiles.wordpress.org/maartenm/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */

$autoloader = __DIR__ . '/vendor/autoload.php';
if (is_readable($autoloader)) {
    require $autoloader;
}

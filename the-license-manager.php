<?php
/*
Plugin Name: The License Manager
Plugin URI:  https://www.tobias-hopp.de/wordpress/plugins/the-license-manager/
Description: A plugin to manage WordPress licenses the right way.
Version:     1.0.0
Author:      Tobias Hopp
Author URI:  https://www.tobias-hopp.de/
License:     GPL2
License URI: https://www.tobias-hopp.de/impressum
Text Domain: the-license-manager
Domain Path: /languages
*/

if(!defined('ABSPATH')) {exit('NaNa nAnA NaNa nAnA NaNa nAnA Batman!');}

if(!defined('LM_PLUGIN_ROOT')){ define('LM_PLUGIN_ROOT', basename(__DIR__));}

// TODO Slash prefix / wrong path
$dir = plugin_dir_path(__FILE__);
require $dir.'hooks/plugins-loaded.php';
require $dir.'hooks/register-custom-post-type.php';
require $dir.'hooks/register-taxonomies.php';
require $dir.'hooks/enter-title-here.php';
require $dir.'hooks/wp-before-admin-bar-render.php';
require $dir.'hooks/wp-dashboard-setup.php';
require $dir.'hooks/admin-enqueue-scripts.php';
require $dir.'hooks/add-meta-boxes.php';
require $dir.'hooks/admin-options.php';
require $dir.'hooks/custom-columns.php';
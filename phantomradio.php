<?php
/*
Plugin Name: Phantom Radio Manager
Plugin URI:  #
Description: Upload and manage audio for Phantom Radio for Werkplaats Typografie
Version:     1.0.0
Author:      Magalie Chetrit
Author URI:  https://mor10.com
Text Domain: phantomradio
License:     No public license

*/

// To find the posts: http://mayconnectapp.local/wp-json/wp/v2/radioposts


/**
 * Register Phantom Radio Manager
 */
require_once plugin_dir_path( __FILE__ ) . 'inc/posttypes.php';
register_activation_hook( __FILE__, 'taskbook_rewrite_flush' );




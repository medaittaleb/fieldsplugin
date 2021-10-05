<?php
/*
Plugin Name: We Footer
Plugin URI: we.ma
Description: we footer widgets
Version: 0.1.0
Author: we agency
Author URI: weag.ma
*/


if (!defined('ABSPATH')) {
    exit;
}

require_once(plugin_dir_path( __FILE__ ).'/includes/wefooter-scripts.php');

require_once(plugin_dir_path( __FILE__ ).'/includes/wefooter-class.php');

require_once(plugin_dir_path( __FILE__ ).'/includes/wefields.php');



function register_wefooter(){
    register_widget( "Wefooter_Widget" );
}
add_action( "widgets_init", "register_wefooter" );










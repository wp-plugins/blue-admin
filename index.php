<?php
/*
Plugin Name: Blue Admin
Plugin URI: http://tech.lineshjose.com/introducing-blue-admin/
Description: This is a simple and clear admin design that makes your WordPress administration section more clear and relaxed.
Version: 12.07
Author: Linesh Jose
Author URI: http://lineshjose.com
License: GPL2
*/
	global $wp_lj_plugin;
	$wp_lj_plugin= array(
						'name'=>"Blue Admin",
						'slug'=>"blue_admin", 
						'version'=>'12.07', 
						'url'=> plugin_dir_url(__FILE__),
						'path'=> plugin_dir_path(__FILE__),
						);
	require_once($wp_lj_plugin['path'].'./inc/inc.php');
?>
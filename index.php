<?php
/*
Plugin Name: Blue Admin
Plugin URI: http://tech.lineshjose.com/introducing-blue-admin/
Description: This is a simple and clear admin design that makes your WordPress administration section more clear and relaxed.
Version: 12.06.04
Author: Linesh Jose
Author URI: http://lineshjose.com
License: GPL2
*/
	$version='12.06.06';
	
	// For admmin side only //
	function bd_admin()
	{
		wp_register_style( 'blue-admin', plugin_dir_url(__FILE__) . 'style.css.php?t=a', false, $version );
		wp_enqueue_style( 'blue-admin' );
	}
	add_action('admin_enqueue_scripts', 'bd_admin');
	add_action('login_head', 'bd_admin');
	
	// For Client side only //
	function bd_client()
	{
		wp_register_style( 'blue-admin', plugin_dir_url(__FILE__) . 'style.css.php', false, $version );
		wp_enqueue_style( 'blue-admin' );
	}
	add_action('wp_enqueue_scripts', 'bd_client');


	function footer_credit()
	{
		echo '<span id="footer-thankyou">Thank you for creating with <a href="http://wordpress.org/">WordPress</a>.</span>
			<span id="footer-thankyou">This theme developed by <a href="http://lineshjose.com/">Linesh Jose</a>.</span>';
	}
	add_filter('admin_footer_text', 'footer_credit'); 
	
		


	// Add meta links
	function blueadmin_actions( $links, $file )
	{
		$plugin = plugin_basename(__FILE__);
		if ($file == $plugin) {
			//$links[] = '<a href="' . admin_url( 'options-general.php?page=blueadmin' ) . '">' . __('Settings', TPTN_LOCAL_NAME ) . '</a>';
			$links[] = '<a href="http://bit.ly/go_fund">' . __('Donate', TPTN_LOCAL_NAME ) . '</a>';
		}
		return $links;
	}
	
	global $wp_version;
	if ( version_compare( $wp_version, '3.2', '>' ) ){add_filter( 'plugin_row_meta', 'blueadmin_actions', 10, 2 ); } // only 2.8 and higher
	else {add_filter( 'plugin_action_links', 'blueadmin_actions', 10, 2 );}

?>
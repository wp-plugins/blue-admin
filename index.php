<?php
/*
Plugin Name: Blue Admin
Plugin URI: http://tech.lineshjose.com/introducing-blue-admin/
Description: This is a simple and clear admin design that makes your WordPress administration section more clear and relaxed.
Version: 12.06
Author: Linesh Jose
Author URI: http://lineshjose.com
License: GPL2
*/
	$version='12.06';
	
	// Login page validation //
	if(!function_exists('lj_is_login_page'))
	{
		function lj_is_login_page() {
		return in_array($GLOBALS['pagenow'], array('wp-login.php', 'wp-register.php'));
		}
	}
	
	// Function to set default css style//
	if(!function_exists('lj_admin_styles'))	
	{
		function lj_admin_styles()
		{
			global $wp_lj_plugin;
			if(is_admin() || lj_is_login_page()){
				wp_register_style( 'blue_admin', plugin_dir_url(__FILE__) . 'style.css','',$version );
			}
			if(is_user_logged_in()){
				wp_register_style( 'blue_admin_admin_bar',  plugin_dir_url(__FILE__). 'admin-bar.css','', $version );
			}
			 wp_enqueue_style('blue_admin');
			 wp_enqueue_style('blue_admin_admin_bar');
		}
		add_action('admin_enqueue_scripts', 'lj_admin_styles');
		add_action('login_head', 'lj_admin_styles');
		add_action('wp_head', 'lj_admin_styles');
	}
	
	
	
	
	
	
	// Function to display credit text in footer//
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
			$links[] = '<a href="http://bit.ly/donate-blue-admin">' . __('Donate', TPTN_LOCAL_NAME ) . '</a>';
			$links[] = '<a href="http://tech.lineshjose.com/introducing-blue-admin/#comments" target="_blank">' . __('Support', TPTN_LOCAL_NAME ) . '</a>';
		}
		return $links;
	}
	
	global $wp_version;
	if ( version_compare( $wp_version, '3.2', '>' ) ){add_filter( 'plugin_row_meta', 'blueadmin_actions', 10, 2 ); } // only 2.8 and higher
	else {add_filter( 'plugin_action_links', 'blueadmin_actions', 10, 2 );}

?>
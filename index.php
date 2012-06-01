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
	function blue_admin()
	{
		wp_register_style( 'blue-admin', WP_PLUGIN_URL . '/blue-admin/style.css', false, '12.06.01' );
		wp_enqueue_style( 'blue-admin' );
	}
	function footer_credit()
	{
		echo '<span id="footer-thankyou">Thank you for creating with <a href="http://wordpress.org/">WordPress</a>.</span>
			<span id="footer-thankyou">This theme developed by <a href="http://lineshjose.com/">Linesh Jose</a>.</span>';
	}
	function custom_login()
	{
		echo '
			<style type="text/css">
								
				.login{font-size:11px!important; font-family: "lucida grande",tahoma,verdana,arial,sans-serif !important;color: #333;line-height: 1.28;direction: ltr;unicode-bidi: embed; margin:0!important; padding:0 !important; background:#FFF!important; }
				
				.login #nav a, .login #backtoblog a,.login #nav a:hover, .login #backtoblog a:hover {color: #3B5998!important;font-size:11px!important; }
				
				.login #login{padding: 10% 0 0; margin:auto!important; height:auto; width:350px}	
				.login h1 a {background-position: center center;	width: 350px;}		
				.login form	 {background:#FBFBFB; text-align: left;position: relative;border: 0px solid #AAA;	box-shadow: 0px 0px 00px #fff;border-radius: 0px!important;padding: 26px 24px 36px;}
				.login form .input{border: 1px solid #BDC7D8;font-family: "lucida grande",tahoma,verdana,arial,sans-serif;font-size: 11px;margin: 0 0 15px;padding: 3px;-webkit-appearance: none;-webkit-border-radius: 0;-moz-border-radius:0!important;border-radius:0!important;}
				.login form .button-primary{padding: 3px 16px!important; line-height:15px!important; font-size:11px!important;background: #617AAC url(\''.WP_PLUGIN_URL . '/blueadmin/images/button.png\') repeat-x 100% -47px !important;border: 1px solid #29447E!important;border: 1px solid #999;-webkit-box-shadow: 0 1px 0 rgba(0, 0, 0, .1); -webkit-border-radius:0;-moz-border-radius:0!important;border-radius:0!important; color:#EAF2FA!important;}
				.login form .button-primary:active{background:#617AAC!important}
				.login form .button-primary:hover{color:#fff!important;}
				.login form label, .login form .forgetmenot label{font-size:11px;}
				
				#nav{float:right;}
				#nav,#backtoblog {padding: 0!important;margin:5px!important;}
				</style>';
	}
			
	if (is_admin()) 
	{
		add_action('admin_enqueue_scripts', 'blue_admin');
		add_filter('admin_footer_text', 'footer_credit'); 
	}
	add_action('login_head', 'custom_login');


	// Add meta links
	function blueadmin_actions( $links, $file ) {
	$plugin = plugin_basename(__FILE__);
 
	// create link
	if ($file == $plugin) {
		//$links[] = '<a href="' . admin_url( 'options-general.php?page=blueadmin' ) . '">' . __('Settings', TPTN_LOCAL_NAME ) . '</a>';
		$links[] = '<a href="http://bit.ly/go_fund">' . __('Donate', TPTN_LOCAL_NAME ) . '</a>';
	}
	return $links;
	}
	global $wp_version;
	if ( version_compare( $wp_version, '3.2', '>' ) )
	add_filter( 'plugin_row_meta', 'blueadmin_actions', 10, 2 ); // only 2.8 and higher
	else add_filter( 'plugin_action_links', 'blueadmin_actions', 10, 2 );

?>
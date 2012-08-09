<?php
	// Checking Curent page is login page
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
				wp_register_style( $wp_lj_plugin['slug'], $wp_lj_plugin['url'] . 'inc/default_style.css','',$wp_lj_plugin['version'] );
			}
			if(is_user_logged_in()){
				wp_register_style( $wp_lj_plugin['slug'].'_admin_bar', $wp_lj_plugin['url']. 'inc/admin-bar.css','', $wp_lj_plugin['version'] );
			}
			 wp_enqueue_style( $wp_lj_plugin['slug']);
			 wp_enqueue_style($wp_lj_plugin['slug'].'_admin_bar');
		}
		add_action('admin_enqueue_scripts', 'lj_admin_styles');
		add_action('login_head', 'lj_admin_styles');
		add_action('wp_head', 'lj_admin_styles');
	}
	
	
	
	// Function to display credit text in footer//
	if(!function_exists('lj_admin_footer'))	
	{
		function lj_admin_footer(){
			echo '<span id="footer-thankyou">Thank you for creating with <a href="http://wordpress.org/">WordPress</a>.</span>
				<span id="footer-thankyou">This theme developed by <a href="http://lineshjose.com/">Linesh Jose</a>.</span>';
		}
		add_filter('admin_footer_text', 'lj_admin_footer'); 
	}
	

	
// Add meta links
if(!function_exists(lj_plugin_actions))
{

	function lj_plugin_actions( $links, $file )
	{
		global $wp_lj_plugin;
		$plugin = plugin_basename($wp_lj_plugin['path'].'index.php');
		if ($file == $plugin) {
			$links[] = '<a href="http://bit.ly/donate-blue-admin" target="_blank">' . __('Donate', TPTN_LOCAL_NAME ) . '</a>';
			$links[] = '<a href="http://tech.lineshjose.com/introducing-blue-admin/#comments" target="_blank">' . __('Support', TPTN_LOCAL_NAME ) . '</a>';
		}
		return $links;
	}
	
	global $wp_version;
	
	// only 2.8 and higher
	if ( version_compare( $wp_version, '3.2', '>' ) ){
		add_filter( 'plugin_row_meta', 'lj_plugin_actions', 10, 2 ); 
	} 
	else {
		add_filter( 'plugin_action_links', 'lj_plugin_actions', 10, 2 );
	}
}
?>

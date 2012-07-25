<?php


	
	
	// Creating Custom Settings Page //
	if(!function_exists('lj_bd_admin'))
	{
		function lj_bd_admin()
		{	
			global $wp_lj_plugin;
			add_menu_page($wp_lj_plugin['name'],$wp_lj_plugin['name'], 1, $wp_lj_plugin['slug'], 'lj_bd_admin_header',$wp_lj_plugin['url'].'/inc/images/trans.png');
			
		}
		add_action('admin_menu', 'lj_bd_admin'); 
	}
	
	
	
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
	


	
/** 
		* Adding Custom Adminbar/Toolbar menus
		* This Feature is only  support for WordPress 3.3.0 or above versions
**/
	if ( version_compare( $wp_version, '3.3', '>' ) )
	{
			
			if (function_exists('register_nav_menus'))
				{
					if(!function_exists(lj_adminbar_menus))
					{
						function lj_adminbar_menus() {
							register_nav_menus(	array('lj_adminbar_menus' => __( 'Adminbar Menu','lj' )));
						}
						add_action( 'init', 'lj_adminbar_menus' );
					}
				}	
				

		if(!function_exists(lj_custom_adminbar_menus))
		{
			// To add custom links to adminbar //
			function lj_custom_adminbar_menus() 
			{
				global $wp_admin_bar;
				 $menu_name = 'lj_adminbar_menus';
				 if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) )
				 {
					$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
					$menu_items = wp_get_nav_menu_items($menu->term_id);
		
					foreach ( (array) $menu_items as $key => $menu_item )
					{
							if($menu_item->classes){$clasess=implode(' ',$menu_item->classes);} else{$clasess="";}
							$meta=array('class' =>$clasess , 'onclick' => '', target => $menu_item->target, title =>$menu_item->attr_title);
							//print_r($menu_items);
							if ($menu_item->menu_item_parent) 
							{ 
								$wp_admin_bar->add_menu( array(
								'id' => $menu_item->ID,
								'parent' => $menu_item->menu_item_parent, 
								'title' => $menu_item->title,
								'href' => $menu_item->url,
								'meta' =>  $meta ) );
								
							}
							else
							{
								$wp_admin_bar->add_menu( array(
								'id' => $menu_item->ID,
								'title' => $menu_item->title,
								'href' => $menu_item->url,
								'meta' =>  $meta ) );
							}
					}
				}
			}
			add_action( 'wp_before_admin_bar_render', 'lj_custom_adminbar_menus' );
		}
	}
	else
	{	// Shows as an error message. You could add a link to the right page if you wanted.
		function bd_error()
		{
			echo '<div id="message" class="error fade"><p><strong>'.$lj_bd_plugin['name'].'</strong> plugin\'s <strong>Custom Adminbar Menus</strong> feature is only compatible for <strong>WordPress 3.3</strong> or above versions. Please <strong><a href="./update-core.php">Update your WordPress</a></strong> now</strong></p></div>';
		}	
		add_action('admin_notices', 'bd_error');	
	}
	
	



// Add meta links
if(!function_exists(lj_plugin_actions))
{

	function lj_plugin_actions( $links, $file )
	{
		global $wp_lj_plugin;
		$plugin = plugin_basename($wp_lj_plugin['path'].'index.php');
		if ($file == $plugin) {
			$links[] = '<a href="' . admin_url( 'admin.php?page='.$wp_lj_plugin['slug'] ) . '">' . __('Settings', TPTN_LOCAL_NAME ) . '</a>';
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

<?php
/*
	Plugin Name: Blue Admin
	Version: 15.05
	Plugin URI: http://lineshjose.com/projects/blue-admin/
	Description: This is a simple and clear admin design that makes your WordPress administration section more clear and relaxed.
	Author: Linesh Jose
	Author URI: http://lineshjose.com
	License: GPL2
*/
global $wp_lj_plugin;
$wp_lj_plugin= array(
					'name'=>"Blue Admin",
					'slug'=>"blue_admin", 
					'version'=>'15.05', 
					'url'=> plugin_dir_url(__FILE__),
					'path'=> plugin_dir_path(__FILE__),
					'donate'=>'http://bit.ly/donate-blue-admin',
					'support'=> 'http://lineshjose.com/projects/blue-admin/'
					);
require_once($wp_lj_plugin['path'].'./inc/inc.php');
	
// Add meta links
if(!function_exists(lj_plugin_actions))
{
	function lj_plugin_actions( $links, $file )
	{
		global $wp_lj_plugin;
		$plugin = plugin_basename($wp_lj_plugin['path'].'index.php');
		if ($file == $plugin) {
			$links[] = '<a href="' . admin_url( 'admin.php?page='.$wp_lj_plugin['slug'] ) . '">' . __('Settings', TPTN_LOCAL_NAME ) . '</a>';
			$links[] = '<a href="'.$wp_lj_plugin['donate'].'" target="_blank">' . __('Donate', TPTN_LOCAL_NAME ) . '</a>';
			$links[] = '<a href="'.$wp_lj_plugin['support'].'" target="_blank">' . __('Support', TPTN_LOCAL_NAME ) . '</a>';
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




// Genearl settings updation --------------------- //
	/*if($_SERVER['REQUEST_METHOD'] == 'POST')
	{*/
		foreach ($lj_options as $value)
		{
			if($value['settings_type']=='common')
			{
			if ( $_POST[$value['id'].'_enable']){ update_option( $value['id'], '1'); lj_redirect('','saved=true');}
			else if ( $_POST[$value['id'].'_disable']){ update_option( $value['id'], ''); lj_redirect('','saved=true');}
			}
		}
		//
	//}	
	
	
	// Settings Page  //
	if(!function_exists('lj_bd_admin_header'))
	{
		function lj_bd_admin_header() 
		{
			global $lj_options,$wp_lj_plugin; ?>
            <div class="wrap">
				<?php if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';	?>
                <?php if ( $_REQUEST['error'] ) echo '<div id="message" class="error fade"><p><strong>Something went wrong please try again.</strong></p></div>';	?>
                <h2 ><?php echo $wp_lj_plugin['name']; ?> Settings</h2>
                <h3 class="nav-tab-wrapper" style="margin: 10px 8px 0 0;">
                	<a href="./admin.php?page=<?php echo  $wp_lj_plugin['slug'];?>" class="nav-tab <?php lj_nav_tab_active(array($_GET['tab'],''));?> ">Dashboard</a>
                </h3>
                <div class="blue_admin_settings" style="margin:0; padding:10px">
					<?php include($wp_lj_plugin['path'].'inc/gen_form.php'); ?>
                    <div style="clear:both"></div>
                </div>
            </div>
<?php } 
	}
?>
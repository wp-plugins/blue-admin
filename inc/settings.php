<?php
	
	
	// Settings Page  //
	if(!function_exists('lj_bd_admin_header'))
	{
		function lj_bd_admin_header() 
		{
			global $lj_options,$wp_lj_plugin; ?>
			<div class="wrap">
			<?php if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';	?>
			<?php if ( $_REQUEST['error'] ) echo '<div id="message" class="error fade"><p><strong>Something went wrong please try again.</strong></p></div>';	?>
				<div id="icon" class="icon32 blue-admin-32"><br></div>
				<h2 ><?php echo $wp_lj_plugin['name']; ?> Settings</h2>
				
				<div style="float: left;height: 10px;margin: 7px 8px 0 0;width: 10px;">&nbsp;</div>
				<h3 class="nav-tab-wrapper" style="margin:0">
					<a href="./admin.php?page=<?php echo  $wp_lj_plugin['slug'];?>" class="nav-tab nav-tab-active">Dashboard</a>
					</h3>
		<div class="blue_admin_settings" style="margin:0; padding:10px">
		<!-- General settings page starts -->
<img src="<?php  echo  $wp_lj_plugin['url']; ?>inc/images/banner-772x250.jpg" alt="<?php echo $wp_lj_plugin['name']; ?>" title="<?php echo $wp_lj_plugin['name']; ?>" width="500" height="170" class="alignleft" style="padding:5px; border:1px solid #eee; height:170px; width:470px; margin-right:10px; background:#fff"/>

<div>
	<p style="font-size:13px; margin:0;">Thanks for downloading <strong> <?php echo $wp_lj_plugin['name']; ?> </strong>(ver. <?php echo $wp_lj_plugin['version']; ?>) by  <a href="http://lineshjose.com/" style="font-size:13px">Linesh Jose</a>. This is a simple and clear admin design that makes your WordPress administration section more clear and relaxed. Hope you enjoy using it!. There are a bunch of cool features that will surely help you get your admin panel looking and working it's best. A lot of hard work went in to programming and designing <strong> <?php echo $wp_lj_plugin['name']; ?> </strong> plugin, and if you would like to support <a href="http://lineshjose.com/" style="font-size:13px">Linesh Jose</a> (the guy who designed it) please use the donate button below.   </p>
<p>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank">
<input type="hidden" name="cmd" value="_donations">
<input type="hidden" name="business" value="jose.linesh@yahoo.com">
<input type="hidden" name="lc" value="US">
<input type="hidden" name="item_name" value="Donation For <?php echo $wp_lj_plugin['name'];?> Plugin">
<input type="hidden" name="no_note" value="0">
<input type="hidden" name="currency_code" value="USD">
<input type="hidden" name="bn" value="PP-DonationsBF:btn_donateCC_LG.gif:NonHostedGuest">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!" height="47" width="147">
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>

</p>
<p style="font-size:13px">If you have any questions, comments, or if you encounter a bug, please <a href="http://tech.lineshjose.com/introducing-blue-admin/" style="font-size:13px">contact me</a>.</p>
</div>

<div class="update-nag"><h2 style="margin:0">Some amazing features are coming. Stay tuned!.</h2></div>
<!-- General settings page Ends -->
		
<div style="clear:both"></div>
</div>
</div>
			
<?php } } ?>
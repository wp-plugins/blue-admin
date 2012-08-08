<!-- General settings page starts -->
<div style="overflow:hidden; margin-top:20px;">
<img src="<?php  echo  $wp_lj_plugin['url']; ?>inc/images/banner-772x250.jpg" alt="<?php echo $wp_lj_plugin['name']; ?>" title="<?php echo $wp_lj_plugin['name']; ?>" width="500" height="160" class="alignleft" style="padding:5px; border:1px solid #eee; height:160px; width:470px; margin-right:10px; background:#fff"/>

<p style="font-size:13px;line-height:18px; margin:0 0 10px">Thanks for downloading <strong> <?php echo $wp_lj_plugin['name']; ?> </strong>(ver. <?php echo $wp_lj_plugin['version']; ?>) by  <a href="http://lineshjose.com/" style="font-size:13px">Linesh Jose</a>. This is a simple and clear admin design that makes your WordPress administration section more clear and relaxed. Hope you enjoy using it!. There are a bunch of cool features that will surely help you get your admin panel looking and working it's best. </p>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_blank" class="alignleft" style="width:180px;">
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
<p style="font-size:13px;line-height:18px; margin:0 0 10px">A lot of hard work went in to programming and designing <strong> <?php echo $wp_lj_plugin['name']; ?> </strong> plugin, and if you would like to support <a href="http://lineshjose.com/" style="font-size:13px">Linesh Jose</a> (the guy who designed it) please use the donate button.  If you have any questions, comments, or if you encounter a bug, please <a href="http://tech.lineshjose.com/introducing-blue-admin/" style="font-size:13px">contact me</a>.</p>
</div>

<div style="width:100%; margin-top:30px; clear:both;">	
<h3>Features:</h3>
<form method="post"  action="" name="ba_settings_form">
	<?php foreach ($lj_options as $value)
	{ 
	if($value['settings_type']=='common') {?>
	<div class="ba_box alignleft">
		<h3><?php echo $value['name']; ?></h3>
		<p class="description"><?php echo $value['desc']; ?></p>
		<p>
			<?php if(($value['input_type']=='button') && (get_settings($value['id'])=='1')){?>
				<input type="submit" name="<?php echo $value['id']; ?>_disable" id="ID_<?php echo $value['id']; ?>" value="Disable"	 class="button-primary disable"/>
			<?php } else if(($value['input_type']=='button') && (get_settings($value['id'])=='')){?>
				<input type="submit" name="<?php echo $value['id']; ?>_enable" id="ID_<?php echo $value['id']; ?>" value="Enable"	class="button-primary enable" />	
			<?php } ?>
		
		<?php if($value['learn_more']) { ?>
		<a href="<?php echo $value['learn_more'];?>" target="_blank" class="button-secondary">Learn More</a>
		<?php }?>
</p>

	</div>
	<?php } } ?>
</form>
<div class="ba_box alignleft disable">
<h3>Coming soon</h3>
</div>
</div>
<!-- General settings page Ends -->
<?php 
$appointment_options=theme_setup_data();
$callout_setting = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );
if($callout_setting['home_call_out_area_enabled'] == 0 ) { 
 $imgURL = $callout_setting['callout_background'];
 if($imgURL != '') { ?>
<div class="callout-section" style="background-image:url('<?php echo $imgURL;?>'); background-repeat: no-repeat; background-position: top left; background-attachment: <?php echo $callout_setting['callout_attachment']; ?>;">
<?php } 
else
{ ?> 
<div class="callout-section" style="background-color:#ccc;">
<?php } ?>
	<div class="overlay" style="background: none repeat scroll 0 0 <?php echo ($callout_setting['callout_overlay']!=true?'transparent':'rgba(0, 0, 0, 0.7)'); ?>;">
		<div class="container">
			<div class="row">	
				<div class="col-md-12">	
						
						<h1><?php echo $callout_setting['home_call_out_title'];?></h1>
						 <p><?php echo $callout_setting['home_call_out_description']; ?></p>
					    
						<?php 
						if($callout_setting['home_call_out_btn1_text'] || $callout_setting['home_call_out_btn2_text']  != null): 
						?>
						
						<div class="btn-area">
						<?php if($callout_setting['home_call_out_btn1_text'] != null): ?>
						<a href="<?php echo $callout_setting['home_call_out_btn1_link']; ?>" <?php if( $callout_setting['home_call_out_btn1_link_target'] == 1 ) { echo "target='_blank'"; } ?> class="callout-btn1"><?php echo $callout_setting['home_call_out_btn1_text']; 
						?></a>
						<?php endif; ?>
						
						<?php if($callout_setting['home_call_out_btn2_text'] != null): ?>
						<a href="<?php echo $callout_setting['home_call_out_btn2_link']; ?>" <?php if( $callout_setting['home_call_out_btn2_link_target'] == 1 ) { echo "target='_blank'"; } ?> class="callout-btn2"><?php echo $callout_setting['home_call_out_btn2_text']; ?></a>
						<?php endif; ?>
						</div>
						
						<?php endif; ?>
				</div>	
			</div>			
		
		</div>
			
	</div>	
</div> 
<!-- /Callout Section -->
<div class="clearfix"></div>
<?php } ?>
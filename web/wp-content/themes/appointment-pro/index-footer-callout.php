<?php 
$appointment_options=theme_setup_data(); 
$footer_callout_setting = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );
if($footer_callout_setting['front_callout_enable'] == 0 ) { ?>
<!-- Top Contact Detail Section -->
<div class="footer-contact-detail-section">
	<div class="container">
		
		<?php ?>
		<div class="row">
			<div class="col-md-12">
			
			<div class="footer-section-heading-title"><h1><?php echo $footer_callout_setting['front_contact_title']; ?></h1></div>
			</div>
		</div>
	
		<div class="row">
			<div class="col-md-4">
				<div class="footer-contact-area">
					<div class="media">
						<div class="footer-contact-icon">
							<i class="fa <?php echo $footer_callout_setting['contact_one_icon'];?>"></i>
						</div>
						<div class="media-body">
							<h6><?php echo $footer_callout_setting['front_contact1_title'];  ?></h6>
							<h4><?php echo $footer_callout_setting['front_contact1_val'];?></h4>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="footer-contact-area">
					<div class="media">
						<div class="footer-contact-icon">
							<i class="fa <?php echo $footer_callout_setting['contact_two_icon']; ?>"></i>
						</div>
						<div class="media-body">
							<h6><?php echo $footer_callout_setting['front_contact2_title'];  ?></h6>
							<h4><?php echo $footer_callout_setting['front_contact2_val']; ?></h4>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="footer-contact-area">
					<div class="media">
						<div class="footer-contact-icon">
							<i class="fa <?php echo $footer_callout_setting['contact_three_icon']; ?>"></i>
						</div>
						<div class="media-body">
							<h6><?php echo $footer_callout_setting['front_contact3_title'];   ?></h6>
							<h4><?php echo $footer_callout_setting['front_contact3_val']; ?></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /Top Contact Detail Section -->
<div class="clearfix"></div>
<?php } ?>
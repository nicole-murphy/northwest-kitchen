<?php
$appointment_options=theme_setup_data();
$client_setting = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );
if($client_setting['client_section_enabled'] == 0) {  ?>
<div class="clients-section">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<h1 class="clients-title"><?php echo $client_setting['client_title']; ?></h1>
				<p class="clients-desc"><?php echo  $client_setting['client_description']; ?> </p>
				
				<?php if($client_setting['client_button'] != null): ?>
				<div class="clients-btn-area">
				<a href="<?php echo $client_setting['client_button_url']; ?>" <?php if( $client_setting['client_button_enabled']) { echo "target='_blank'"; } ?> class="clients-btn-lg"><?php echo $client_setting['client_button']; ?></a>
				</div>
				<?php endif; ?>
			</div>
			
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-3 padding-10">
						<div class="clients-logo">
						<?php $img1 = $client_setting['client_one_img'];?>
						<?php if($img1 != '') { ?>
						<?php if($client_setting['client_img_one_link'] != null): ?>
						<a href="<?php echo $client_setting['client_img_one_link']; ?>" <?php if( $client_setting['client_img_one_tab'] == 1) { echo "target='_blank'"; } ?>><img src="<?php echo $img1; ?> " class="img-responsive"></a>
						<?php else: ?>
						<img src="<?php echo $img1; ?> " class="img-responsive">
						<?php endif; ?>
			
						<?php } else { ?> 
						<img src="<?php echo get_template_directory_uri();?>/images/client/client1.png" class="img-responsive">
						<?php } ?>	
						</div>
					</div>
					<div class="col-md-3 padding-10">
						<div class="clients-logo">
						<?php $img2 = $client_setting['client_two_img'];?>
						<?php if($img2 != '') { ?>
						<?php if($client_setting['client_img_two_link'] != null): ?>
						<a href="<?php echo $client_setting['client_img_two_link']; ?>" <?php if( $client_setting['client_img_two_tab'] ==1) { echo "target='_blank'"; } ?>><img src="<?php echo $img2; ?> " class="img-responsive"></a>
						<?php else: ?>
						<img src="<?php echo $img2; ?> " class="img-responsive">
						<?php endif; ?>
						
						<?php } else { ?> 
						<img src="<?php echo get_template_directory_uri();?>/images/client/client2.png" class="img-responsive">
						<?php } ?>	
						</div>
					</div>
					<div class="col-md-3 padding-10">
						<div class="clients-logo">
						<?php $img3 = $client_setting['client_three_img'];?>
						<?php if($img3 != '') { ?>
						<?php if($client_setting['client_img_three_link'] != null): ?>
						<a href="<?php echo $client_setting['client_img_three_link']; ?>" <?php if( $client_setting['client_img_three_tab'] ==1) { echo "target='_blank'"; } ?>><img src="<?php echo $img3; ?> " class="img-responsive"></a>
						<?php else: ?>
						<img src="<?php echo $img3; ?> " class="img-responsive">
						<?php endif; ?>
						<?php } else { ?> 
						<img src="<?php echo get_template_directory_uri();?>/images/client/client3.png" class="img-responsive">
						<?php } ?>	
						</div>
					</div>
					<div class="col-md-3 padding-10">
						<div class="clients-logo">
						<?php $img4 = $client_setting['client_four_img'];?>
						<?php if($img4 != '') { ?>
						<?php if($client_setting['client_img_four_link'] != null): ?>
						<a href="<?php echo $client_setting['client_img_four_link']; ?>" <?php if( $client_setting['client_img_four_tab'] ==1) { echo "target='_blank'"; } ?>><img src="<?php echo $img4; ?> " class="img-responsive"></a>
						<?php else: ?>
						<img src="<?php echo $img4; ?> " class="img-responsive">
						<?php endif; ?>
						<?php } else { ?> 
						<img src="<?php echo get_template_directory_uri();?>/images/client/client4.png" class="img-responsive">
						<?php } ?>	
						</div>
					</div>
					
					<div class="clearfix"></div>
					
					<div class="col-md-3 padding-10">
						<div class="clients-logo">
						<?php $img5 = $client_setting['client_five_img'];?>
						<?php if($img5 != '') { ?>
						<?php if($client_setting['client_img_five_link'] != null): ?>
						<a href="<?php echo $client_setting['client_img_five_link']; ?>" <?php if( $client_setting['client_img_five_tab'] ==1) { echo "target='_blank'"; } ?>><img src="<?php echo $img5; ?> " class="img-responsive"></a>
						<?php else: ?>
						<img src="<?php echo $img5; ?> " class="img-responsive">
						<?php endif; ?>
						<?php } else { ?> 
						<img src="<?php echo get_template_directory_uri();?>/images/client/client5.png" class="img-responsive">
						<?php } ?>	
						</div>
					</div>
					<div class="col-md-3 padding-10">
						<div class="clients-logo">
						<?php $img6 = $client_setting['client_six_img'];?>
						<?php if($img6 != '') { ?>
						<?php if($client_setting['client_img_six_link'] != null): ?>
						<a href="<?php echo $client_setting['client_img_six_link']; ?>" <?php if( $client_setting['client_img_six_tab'] ==1) { echo "target='_blank'"; } ?>><img src="<?php echo $img6; ?> " class="img-responsive"></a>
						<?php else: ?>
						<img src="<?php echo $img6; ?> " class="img-responsive">
						<?php endif; ?>
						<?php } else { ?> 
						<img src="<?php echo get_template_directory_uri();?>/images/client/client6.png" class="img-responsive">
						<?php } ?>	
						</div>
					</div>
					<div class="col-md-3 padding-10">
						<div class="clients-logo">
						<?php $img7 = $client_setting['client_seven_img'];?>
						<?php if($img7 != '') { ?>
						<?php if($client_setting['client_img_seven_link'] != null): ?>
						<a href="<?php echo $client_setting['client_img_seven_link']; ?>" <?php if( $client_setting['client_img_seven_tab'] ==1) { echo "target='_blank'"; } ?>><img src="<?php echo $img7; ?> " class="img-responsive"></a>
						<?php else: ?>
						<img src="<?php echo $img7; ?> " class="img-responsive">
						<?php endif; ?>
						<?php } else { ?> 
						<img src="<?php echo get_template_directory_uri();?>/images/client/client7.png" class="img-responsive">
						<?php } ?>	
						</div>
					</div>
					<div class="col-md-3 padding-10">
						<div class="clients-logo">
						<?php $img8 = $client_setting['client_eight_img'];?>
						<?php if($img8 != '') { ?>
						<?php if($client_setting['client_img_eight_link'] != null): ?>
						<a href="<?php echo $client_setting['client_img_eight_link']; ?>" <?php if( $client_setting['client_img_eight_tab'] ==1) { echo "target='_blank'"; } ?>><img src="<?php echo $img8; ?> " class="img-responsive"></a>
						<?php else: ?>
						<img src="<?php echo $img8; ?> " class="img-responsive">
						<?php endif; ?>
						
						<?php } else { ?> 
						<img src="<?php echo get_template_directory_uri();?>/images/client/client8.png" class="img-responsive">
						<?php } ?>	
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php } ?>
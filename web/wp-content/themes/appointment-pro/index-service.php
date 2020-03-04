<?php 

$appointment_options = theme_setup_data(); 
$service_setting     = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );

if($service_setting['service_section_enabled'] == '' ) { ?>
<div class="service-section">
	<div class="container">
	
		<div class="row">
			<div class="col-md-12">
			
				<div class="section-heading-title">
					<h1> <?php echo $service_setting['service_title']; ?></h1>
					<p><?php echo $service_setting['service_description']; ?> </p>
				</div>
			</div>
		</div>
		
		<div class="row">
			
			<?php $i=0; if($service_setting['service_one_icon'] != '' || $service_setting['service_one_title'] != '' || $service_setting['service_one_description'] != ''){ $i++; ?>
			<div class="col-md-4">
				<div class="service-area">
					<div class="media">
						<?php
						  if($service_setting['service_one_icon']!='')
						  {
							echo '<div class="service-icon">';
							echo ($service_setting['service_one_link']!=''?'<a href="'.$service_setting['service_one_link'].'" '.($service_setting['service_one_link_target'] == true?'target="_blank" >':'>'):'');
							echo '<i class="fa '.$service_setting['service_one_icon'].'"></i>';
							echo ($service_setting['service_one_link']!=''?'</a>':'');
							echo '</div>';  
						  }
						?>
						<div class="media-body">
							<?php if($service_setting['service_one_link']=='') { ?><h3><?php echo $service_setting['service_one_title']; } else { ?>
							<h3>
							<a href="<?php echo $service_setting['service_one_link']; ?>" <?php if( $service_setting['service_one_link_target'] == true ) { echo "target='_blank'"; } ?>><?php echo $service_setting['service_one_title']; 
							?></a></h3>
							<?php } ?>
							<p><?php echo $service_setting['service_one_description']; ?></p>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
			
			<?php  if($service_setting['service_two_icon'] != '' || $service_setting['service_two_title'] != '' || $service_setting['service_two_description'] != ''){ $i++; ?>
			<div class="col-md-4">
				<div class="service-area">
					<div class="media">
						<?php
						  if($service_setting['service_two_icon']!='')
						  {
							echo '<div class="service-icon">';
							echo ($service_setting['service_two_link']!=''?'<a href="'.$service_setting['service_two_link'].'" '.($service_setting['service_two_link_target'] == true?'target="_blank" >':'>'):'');
							echo '<i class="fa '.$service_setting['service_two_icon'].'"></i>';
							echo ($service_setting['service_two_link']!=''?'</a>':'');
							echo '</div>';  
						  }
						?>
						<div class="media-body">
							<?php if($service_setting['service_two_link']=='') { ?><h3><?php echo $service_setting['service_two_title']; } else { ?>
							<h3>
							<a href="<?php echo $service_setting['service_two_link']; ?>" <?php if( $service_setting['service_two_link_target'] == true ) { echo "target='_blank'"; } ?>><?php echo $service_setting['service_two_title']; 
							?></a></h3>
							<?php } ?>
							<p><?php echo $service_setting['service_two_description']; ?></p>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
			
			<?php  if($service_setting['service_three_icon'] != '' || $service_setting['service_three_title'] != '' || $service_setting['service_three_description'] != ''){ $i++; ?>
			<div class="col-md-4">
				<div class="service-area">
					<div class="media">
					
						<?php
						  if($service_setting['service_three_icon']!='')
						  {
							echo '<div class="service-icon">';
							echo ($service_setting['service_three_link']!=''?'<a href="'.$service_setting['service_three_link'].'" '.($service_setting['service_three_link_target'] == true?'target="_blank" >':'>'):'');
							echo '<i class="fa '.$service_setting['service_three_icon'].'"></i>';
							echo ($service_setting['service_three_link']!=''?'</a>':'');
							echo '</div>';  
						  }
						?>
						<div class="media-body">
							<?php if($service_setting['service_three_link']=='') { ?><h3><?php echo $service_setting['service_three_title']; } else { ?>
							<h3>
							<a href="<?php echo $service_setting['service_three_link']; ?>" <?php if( $service_setting['service_three_link_target'] == true ) { echo "target='_blank'"; } ?>><?php echo $service_setting['service_three_title']; 
							?></a></h3>
							<?php } ?>
							<p><?php echo $service_setting['service_three_description']; ?></p>
						</div>
					</div>
				</div>
			</div>
			<?php  if($i==3){ echo '<div class="clearfix"></div>'; $i=0; } } ?>
			<?php  if($service_setting['service_four_icon'] != '' || $service_setting['service_four_title'] != '' || $service_setting['service_four_description'] != ''){ $i++; ?>
			<div class="col-md-4">
				<div class="service-area">
					<div class="media">
						<?php
						  if($service_setting['service_four_icon']!='')
						  {
							echo '<div class="service-icon">';
							echo ($service_setting['service_four_link']!=''?'<a href="'.$service_setting['service_four_link'].'" '.($service_setting['service_four_link_target'] == true?'target="_blank" >':'>'):'');
							echo '<i class="fa '.$service_setting['service_four_icon'].'"></i>';
							echo ($service_setting['service_four_link']!=''?'</a>':'');
							echo '</div>';  
						  }
						?>
						<div class="media-body">
							<?php if($service_setting['service_four_link']=='') { ?><h3><?php echo $service_setting['service_four_title']; } else { ?>
							<h3>
							<a href="<?php echo $service_setting['service_four_link']; ?>" <?php if( $service_setting['service_four_link_target'] == true ) { echo "target='_blank'"; } ?>><?php echo $service_setting['service_four_title']; 
							?></a></h3>
							<?php } ?>
							<p><?php echo $service_setting['service_four_description']; ?></p>
						</div>
					</div>
				</div>
			</div>
			<?php if($i==3){ echo '<div class="clearfix"></div>'; $i=0; } } ?>
			
			<?php  if($service_setting['service_five_icon'] != '' || $service_setting['service_five_title'] != '' || $service_setting['service_five_description'] != ''){ $i++; ?>
			<div class="col-md-4">
				<div class="service-area">
					<div class="media">
						<?php
						  if($service_setting['service_five_icon']!='')
						  {
							echo '<div class="service-icon">';
							echo ($service_setting['service_five_link']!=''?'<a href="'.$service_setting['service_five_link'].'" '.($service_setting['service_five_link_target'] == true?'target="_blank" >':'>'):'');
							echo '<i class="fa '.$service_setting['service_five_icon'].'"></i>';
							echo ($service_setting['service_five_link']!=''?'</a>':'');
							echo '</div>';  
						  }
						?>
						<div class="media-body">
							<?php if($service_setting['service_five_link']=='') { ?><h3><?php echo $service_setting['service_five_title']; } else { ?>
							<h3>
							<a href="<?php echo $service_setting['service_five_link']; ?>" <?php if( $service_setting['service_five_link_target'] == true ) { echo "target='_blank'"; } ?>><?php echo $service_setting['service_five_title']; 
							?></a></h3>
							<?php } ?>
							<p><?php echo $service_setting['service_five_description']; ?></p>
						</div>
					</div>
				</div>
			</div>
			<?php if($i==3){ echo '<div class="clearfix"></div>'; $i=0; } } ?>
			
			<?php  if($service_setting['service_six_icon'] != '' || $service_setting['service_six_title'] != '' || $service_setting['service_six_description'] != ''){ $i++; ?>
			<div class="col-md-4">
				<div class="service-area">
					<div class="media">
						<?php
						  if($service_setting['service_six_icon']!='')
						  {
							echo '<div class="service-icon">';
							echo ($service_setting['service_six_link']!=''?'<a href="'.$service_setting['service_six_link'].'" '.($service_setting['service_six_link_target'] == true?'target="_blank" >':'>'):'');
							echo '<i class="fa '.$service_setting['service_six_icon'].'"></i>';
							echo ($service_setting['service_six_link']!=''?'</a>':'');
							echo '</div>';  
						  }
						?>
						<div class="media-body">
							<?php if($service_setting['service_six_link']=='') { ?><h3><?php echo $service_setting['service_six_title']; } else { ?>
							<h3>
							<a href="<?php echo $service_setting['service_six_link']; ?>" <?php if( $service_setting['service_six_link_target'] == true ) { echo "target='_blank'"; } ?>><?php echo $service_setting['service_six_title']; 
							?></a></h3>
							<?php } ?>
							<p><?php echo $service_setting['service_six_description']; ?></p>
						</div>
					</div>
				</div>
			</div>
			<?php if($i==3){ echo '<div class="clearfix"></div>'; $i=0; } } ?>
			
			<?php  if($service_setting['service_seven_icon'] != '' || $service_setting['service_seven_title'] != '' || $service_setting['service_seven_description'] != ''){ $i++; ?>
			<div class="col-md-4">
				<div class="service-area">
					<div class="media">
						<?php
						  if($service_setting['service_seven_icon']!='')
						  {
							echo '<div class="service-icon">';
							echo ($service_setting['service_seven_link']!=''?'<a href="'.$service_setting['service_seven_link'].'" '.($service_setting['service_seven_link_target'] == true?'target="_blank" >':'>'):'');
							echo '<i class="fa '.$service_setting['service_seven_icon'].'"></i>';
							echo ($service_setting['service_seven_link']!=''?'</a>':'');
							echo '</div>';  
						  }
						?>
						<div class="media-body">
							<?php if($service_setting['service_seven_link']=='') { ?><h3><?php echo $service_setting['service_seven_title']; } else { ?>
							<h3>
							<a href="<?php echo $service_setting['service_seven_link']; ?>" <?php if( $service_setting['service_seven_link_target'] == true ) { echo "target='_blank'"; } ?>><?php echo $service_setting['service_seven_title']; 
							?></a></h3>
							<?php } ?>
							<p><?php echo $service_setting['service_seven_description']; ?></p>
						</div>
					</div>
				</div>
			</div>
			<?php if($i==3){ echo '<div class="clearfix"></div>'; $i=0; } } ?>
			
			<?php  if($service_setting['service_eight_icon'] != '' || $service_setting['service_eight_title'] != '' || $service_setting['service_eight_description'] != ''){ $i++; ?>
			<div class="col-md-4">
				<div class="service-area">
					<div class="media">
						<?php
						  if($service_setting['service_eight_icon']!='')
						  {
							echo '<div class="service-icon">';
							echo ($service_setting['service_eight_link']!=''?'<a href="'.$service_setting['service_eight_link'].'" '.($service_setting['service_eight_link_target'] == true?'target="_blank" >':'>'):'');
							echo '<i class="fa '.$service_setting['service_eight_icon'].'"></i>';
							echo ($service_setting['service_eight_link']!=''?'</a>':'');
							echo '</div>';  
						  }
						?>
						<div class="media-body">
							<?php if($service_setting['service_eight_link']=='') { ?><h3><?php echo $service_setting['service_eight_title']; } else { ?>
							<h3>
							<a href="<?php echo $service_setting['service_eight_link']; ?>" <?php if( $service_setting['service_eight_link_target'] == true ) { echo "target='_blank'"; } ?>><?php echo $service_setting['service_eight_title']; 
							?></a></h3>
							<?php } ?>
							<p><?php echo $service_setting['service_eight_description']; ?></p>
						</div>
					</div>
				</div>
			</div>
			<?php if($i==3){ echo '<div class="clearfix"></div>'; $i=0; } } ?>
			
			<?php  if($service_setting['service_nine_icon'] != '' || $service_setting['service_nine_title'] != '' || $service_setting['service_nine_description'] != ''){ $i++; ?>
			<div class="col-md-4">
				<div class="service-area">
					<div class="media">
						<?php
						  if($service_setting['service_nine_icon']!='')
						  {
							echo '<div class="service-icon">';
							echo ($service_setting['service_nine_link']!=''?'<a href="'.$service_setting['service_nine_link'].'" '.($service_setting['service_nine_link_target'] == true?'target="_blank" >':'>'):'');
							echo '<i class="fa '.$service_setting['service_nine_icon'].'"></i>';
							echo ($service_setting['service_nine_link']!=''?'</a>':'');
							echo '</div>';  
						  }
						?>
						<div class="media-body">
							<?php if($service_setting['service_nine_link']=='') { ?><h3><?php echo $service_setting['service_nine_title']; } else { ?>
							<h3>
							<a href="<?php echo $service_setting['service_nine_link']; ?>" <?php if( $service_setting['service_nine_link_target'] == true ) { echo "target='_blank'"; } ?>><?php echo $service_setting['service_nine_title']; 
							?></a></h3>
							<?php } ?>
							<p><?php echo $service_setting['service_nine_description']; ?></p>
						</div>
					</div>
				</div>
			</div>
			<?php } ?>
			
			
		</div>
	</div>
</div>
<!-- /HomePage Service Section -->
<?php } ?>
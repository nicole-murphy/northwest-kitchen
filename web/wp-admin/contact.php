<?php
/**
Template Name: Contact
*/
get_header();
get_template_part('index','banner');

$appointment_options=theme_setup_data(); 
$contact_setting = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );
//echo "<pre>"; print_r($contact_setting); wp_die();
$mapsrc= $contact_setting['contact_google_map_url'];
$mapsrc=$mapsrc.'&amp;output=embed';
?>
<!-- Contact Section -->
<div class="page-builder">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php 
				the_post();
				the_content();?>
			</div>	
		</div> 
		
		<div class="row">
		
			<!--Contact Form-->
			<?php if( $contact_setting['contact_google_map_enabled'] == 1) { ?>
			<div class="col-md-12"><?php } else { ?><div class="col-md-8"><?php } ?>
			<div id="mailsentbox" style="display:none">
				<div class="alert alert-success" >
					<strong><?php _e('Thank you','appointment');?></strong> <?php _e('Your information has been sent.','appointment');?>
				</div>
			</div>
				
				<div class="contact-title"><h2><?php echo $contact_setting['send_usmessage']; ?></h2></div>
				
				
				<div class="contact-form-section" id="myformdata">				
					<form class="form-inline" role="form" method="post" action="#">
					<?php wp_nonce_field('appointment_name_nonce_check','appointment_name_nonce_field'); ?>
					  <div class="contact-form-group">
						<input type="name" name="user_name" id="user_name" placeholder="<?php _e('Name','appointment'); ?>" class="contact-form-control">
						<span  style="display:none; color:red" id="contact_user_name_error"><?php _e('Name','appointment'); ?> </span>
					  </div>
					  <div class="contact-form-group">
						<input type="email" name="user_email" id="user_email" placeholder="<?php _e('Email','appointment'); ?>" class="contact-form-control">
						<span  style="display:none; color:red" id="contact_user_email_error"><?php _e('Email','appointment'); ?> </span>
					 </div>
					  <div class="contact-form-group-textarea">
						<textarea placeholder="<?php _e('Message','appointment'); ?>" name="user_massage" id="user_massage" class="contact-form-control-textarea" rows="7"></textarea>
						<span  style="display:none; color:red" id="contact_user_massage_error"><?php _e('Message','appointment'); ?></span>
					  </div>
					  <button class="blogdetail-btn" id="contact_submit" name="contact_submit" type="submit"><?php _e('Send Message', 'appointment'); ?></button>
					</form>				
				</div>	
			</div>
			<!--/Contact Form-->
			<?php 
			if(isset($_POST['contact_submit']))
			{ 		
			$flag=1;
				if(empty($_POST['user_name']))
				{
					
					$flag=0;
					echo "<script>jQuery('#contact_user_name_error').show();</script>";
				} else
				if($_POST['user_email']=='') 
				{	
					$flag=0;
					echo "<script>jQuery('#contact_user_email_error').show();</script>";
				} else
				if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i",$_POST['user_email'])) 
				{	
					$flag=0;
					echo "<script>jQuery('#contact_user_email_error').show();</script>";
				} else
				if($_POST['user_massage']=='')
				{
					$flag=0;
					echo "<script>jQuery('#contact_user_massage_error').show();</script>";
				}else
				if(empty($_POST) || !wp_verify_nonce($_POST['appointment_name_nonce_field'],'appointment_name_nonce_check') )
				{
					echo "<script>jQuery('#contact_nonce_error').show();</script>";
					exit;
				}
				else
				{	
					
				if($flag==1)
					{	
						$to = get_option('admin_email');
						//print_r($to);
						$subject = trim($_POST['user_name']) . get_option("blogname");
						$massage = stripslashes(trim($_POST['user_massage']))."Message sent from:: ".trim($_POST['user_email']);
						$headers = "From: ".trim($_POST['user_name'])." <".trim($_POST['user_email']).">\r\nReply-To:".trim($_POST['user_email']);
						$maildata =wp_mail($to, $subject, $massage, $headers);
						if($maildata){						
						echo "<script>jQuery('#myformdata').hide();</script>";
						echo "<script>jQuery('#mailsentbox').show();</script>";
						}					
					}
				}
			}
			?>
			
			<!--Google Map-->
			<?php if( $contact_setting['contact_google_map_enabled'] == 0) { ?>
				<div class="col-md-4">
					<div class="contact-title"><h2><?php echo $contact_setting['contact_google_title'];?></h2></div>
					<div class="google-map">	
					<iframe width="100%" scrolling="no" height="285" frameborder="0" marginheight="0" marginwidth="0" src="<?php echo esc_url($mapsrc); ?>"></iframe>
					</div>
				</div>
					<?php } ?>
			<!--Google Map-->
		
			
		</div>
		
	</div>
</div>
<!-- /Contact Section -->

<div class="clearfix"></div>

<!-- Contact Detail Section -->
<?php if( $contact_setting['contact-callout-enable'] == 0) { ?>
<div class="contact-detail-section" style="background: url('<?php echo $contact_setting['contact_callout_back']; ?>') repeat <?php echo $contact_setting['contact_attachment']; ?> 0 0 rgba(0, 0, 0, 0); background-size:cover;">
	<div class="overlay" style="background: none repeat scroll 0 0 <?php echo ($contact_setting['contact_overlay']!=true?'transparent':'rgba(0, 0, 0, 0.2)'); ?>;">
		<div class="container">
			<!-- Section Title -->		
			<div class="row">
				<div class="col-md-12">
				
					<div class="section-heading-title">
						<h1 class="text-color"><?php echo $contact_setting['contact_title']; ?></h1>
						<p class="text-color"><?php echo $contact_setting['contact_description']; ?></p>
					</div>
				</div>
			</div>
			<!-- /Section Title -->
			
			<!-- Contact Area -->
			<div class="row"> 
				<div class="col-md-4">
					<div class="contact-detail-area">
				
							<i class="fa <?php echo $contact_setting['contact_call_icon'];?>"></i>
							<h6><?php echo $contact_setting['contact_call_title'];  ?></h6>
							<address><?php echo $contact_setting['contact_call_description'];?></address>
					
					</div>
				</div>
				<div class="col-md-4">
					<div class="contact-detail-area">
					
							<i class="fa <?php echo $contact_setting['contact_add_icon']; ?>"></i>
							<h6><?php echo $contact_setting['contact_add_title'];  ?></h6>
							<address><?php echo $contact_setting['contact_add_description']; ?></address>
					</div>
				</div>
				<div class="col-md-4">
					<div class="contact-detail-area">
							<i class="fa <?php echo $contact_setting['contact_mail_icon']; ?>"></i>
							<h6><?php echo $contact_setting['contact_mail_title'];   ?></h6>
							<address><?php echo $contact_setting['contact_mail_description']; ?></address>
					</div>
				</div>
			</div>
			
			<!-- /Contact Area -->
		</div>
			
	</div>	
</div>
<?php } ?>
<!-- /Contact Detail Section -->

<div class="clearfix"></div>

<!-- Horizontal Callout Section -->

<?php if( $contact_setting['check_contact_callout'] == 0) { ?>
<div class="hrtl-callout-section">
	<div class="container">
		
		<div class="row">
			<div class="col-md-<?php if($contact_setting['contact_callout_button'] == null){echo 12;} else{echo 9;}?>">
					<h2><?php echo $contact_setting['contact_callout_title'];  ?></h2>
					<p><?php echo $contact_setting['contact_callout_description'];  ?></p>
				
			</div>
			<?php if($contact_setting['contact_callout_button'] != null): ?>
			<div class="col-md-3">
			    
				<div class="hrtl-btn-area">
				<a href="<?php echo $contact_setting['contact_callout_button_link']; ?>" <?php if( $contact_setting['contact_callout_link_target'] == 1) { echo "target='_blank'"; } ?> class="hrtl-btn"><?php echo $contact_setting['contact_callout_button']; ?></a>
				</div>
				
			</div>
			<?php endif; ?>
		</div>
	</div>
</div>
<?php } ?>
<!-- /Horizontal Callout Section -->
<div class="clearfix"></div>
<!-- Footer Section -->
<?php get_footer(); ?>
<!-- /Footer Section -->
<?php
/************ Home slider meta post ****************/
add_action('admin_init','webriti_init');
function webriti_init()
	{
		add_meta_box('home_testimonial_meta', __('Testimonial Details','appointment'), 'webriti_meta_testimonial', 'webriti_testimonial', 'normal', 'high');
		
		add_meta_box('service_meta', __('Service Details','appointment'), 'webriti_meta_service', 'appointment_service', 'normal', 'high');
		
		add_meta_box('home_portfolio_meta', __('Portfolio Details','appointment'), 'webriti_meta_portfolio', 'appoint_portfolio', 'normal', 'high');
		
		add_meta_box('appointment_team', __('Team Details','appointment'), 'appointment_meta_team', 'appointment_team', 'normal', 'high');
		
		add_meta_box('appointment_slider_post', __('Customize Read More Button in slider','appointment'), 'appointment_slider_readmore', 'post' ,'normal', 'high');
		
		add_action('save_post','webriti_meta_save');
	}	

	function appointment_slider_readmore()
	{
		
		global $post;
		$slider_readmore_enable = sanitize_text_field( get_post_meta( get_the_ID(), 'slider_readmore_enable', true ));
		$slider_readmore_txt = sanitize_text_field( get_post_meta( get_the_ID(), 'slider_readmore_txt', true ));
		$slider_readmore_link = sanitize_text_field( get_post_meta( get_the_ID(), 'slider_readmore_link', true ));
		$slider_readmore_target = sanitize_text_field( get_post_meta( get_the_ID(), 'slider_readmore_target', true ));
		?>
		<p> <strong><?php _e('The settings mentioned below will only work for posts that are shown in a slider.','appointment');?></strong><?php _e('By default, the Read More Button will take you to the single view of a post. But if you want to add a custom link to the Read More then use the settings below.','appointment'); ?></p>
		
		<p><input type="checkbox" name="slider_readmore_enable" id="slider_readmore_enable" <?php if($slider_readmore_enable){echo "checked";}?> /><?php _e('Show Read More Button','appointment'); ?></p>
		
		<h4 class="heading"><label><?php _e('Button Text','appointment');?></label></h4>
		<p><input class="inputwidth"  name="slider_readmore_txt" id="slider_readmore_txt" style="width: 480px" placeholder="<?php _e('Button Text','appointment'); ?>" type="text" value="<?php if (!empty($slider_readmore_txt)) echo esc_attr($slider_readmore_txt);?>"></input></p>
		
		<p><h4 class="heading"><label><?php _e('Button Link','appointment');?></label></h4></p>
		<p><input class="inputwidth"  name="slider_readmore_link" id="slider_readmore_link" style="width: 480px" placeholder="<?php _e('Button Link','appointment'); ?>" type="text" value="<?php if (!empty($slider_readmore_link)) echo esc_attr($slider_readmore_link);?>"></input></p>
		
		<input type="checkbox" name="slider_readmore_target" id="slider_readmore_target" <?php if($slider_readmore_target){echo "checked";}?> /><?php _e('Open link in new tab','appointment'); ?>
	<?php	
	}
	
	function appointment_meta_team()
	{ 
		global $post;
		$designation_meta_save = sanitize_text_field( get_post_meta( get_the_ID(), 'designation_meta_save', true ));
		$fb_meta_save = sanitize_text_field( get_post_meta( get_the_ID(), 'fb_meta_save', true ));
		$fb_meta_save_chkbx = sanitize_text_field( get_post_meta( get_the_ID(), 'fb_meta_save_chkbx', true ));
		$lnkd_meta_save = sanitize_text_field( get_post_meta( get_the_ID(), 'lnkd_meta_save', true ));
		$lnkd_meta_save_chkbx = sanitize_text_field( get_post_meta( get_the_ID(), 'lnkd_meta_save_chkbx', true ));
		$twt_meta_save = sanitize_text_field( get_post_meta( get_the_ID(), 'twt_meta_save', true ));
		$twt_meta_save_chkbx = sanitize_text_field( get_post_meta( get_the_ID(), 'twt_meta_save_chkbx', true ));
	?>
	<p><h4 class="heading"><?php _e('Designation','appointment');?></h4></p>
	<p><input class="inputwidth"  name="designation_meta_save" id="designation_meta_save" style="width: 480px" placeholder="<?php _e("Designation","appointment"); ?>" type="text" value="<?php if (!empty($designation_meta_save)) echo esc_attr($designation_meta_save);?>"></input></p>
		
	<p><h4 class="heading"><span><?php _e('Social media settings','appointment');?></span></h4>
	<p><h4 class="heading"><label><?php _e('Facebook URL','appointment');?></label></h4>
	<input style="width:70%;padding: 10px;"  name="fb_meta_save" id="fb_meta_save" placeholder="<?php _e("Facebook URL","appointment"); ?>" value="<?php if(!empty($fb_meta_save)) echo esc_attr($fb_meta_save); ?>"/>
	<input type="checkbox" name="fb_meta_save_chkbx" id="fb_meta_save_chkbx" <?php if($fb_meta_save_chkbx){echo "checked";}?> /><?php _e('Open link in new tab','appointment'); ?></p>
	
	<p><h4 class="heading"><?php _e('Twitter URL','appointment')?></h4>	 
	 <p><input style="width:70%; padding: 10px;"  name="twt_meta_save" id="twt_meta_save" placeholder="<?php _e("Twitter URL","appointment"); ?>"  value="<?php if(!empty($twt_meta_save)) echo esc_attr($twt_meta_save); ?>"/>	
	<input type="checkbox" name="twt_meta_save_chkbx" id="twt_meta_save_chkbx" <?php if($twt_meta_save_chkbx){echo "checked";}?> /><?php _e('Open link in new tab','appointment'); ?></p>
	
	<p><h4 class="heading"><label><?php _e('LinkedIn URL','appointment');?></label></h4>
	<input style="width:70%;padding: 10px;"  name="lnkd_meta_save" id="lnkd_meta_save" placeholder="<?php _e("LinkedIn URL","appointment"); ?>" value="<?php if(!empty($lnkd_meta_save)) echo esc_attr($lnkd_meta_save); ?>"/>
	<input type="checkbox" name="lnkd_meta_save_chkbx" id="lnkd_meta_save_chkbx" <?php if($lnkd_meta_save_chkbx){echo "checked";}?> /><?php _e('Open link in new tab','appointment'); ?></p>
	
	
	<?php
	}	
// Code for Testimonial Section
function webriti_meta_testimonial()
{ 
	global $post;
	$testimonial_designation = sanitize_text_field( get_post_meta( get_the_ID(), 'testimonial_designation', true ));
	$testimonial_role_description = sanitize_text_field( get_post_meta( get_the_ID(), 'testimonial_role_description', true ));
?>
	<p><h4 class="heading"><?php _e('Designation','appointment');?></h4></p>
	<p><input class="inputwidth"  name="testimonial_designation" id="testimonial_designation" style="width: 480px" placeholder="<?php _e("Designation","appointment"); ?>" type="text" value="<?php if (!empty($testimonial_designation)) esc_attr_e($testimonial_designation);?>"></input></p>
	<p><h4 class="heading"><?php _e('Description','appointment');?></h4></p>
	<p><textarea name="testimonial_role_description" id="testimonial_role_description" style="width: 480px; height: 56px; padding: 0px;" 
	placeholder="<?php _e('Description','appointment'); ?>"  rows="3" cols="10" ><?php if (!empty($testimonial_role_description)) echo esc_textarea( $testimonial_role_description ); ?></textarea></p>

<?php } 

// Code for Project Section
function webriti_meta_portfolio()
{	global $post ;
		$project_description =sanitize_text_field( get_post_meta( get_the_ID(), 'project_description', true ));
		$project_more_btn_link =sanitize_text_field( get_post_meta( get_the_ID(), 'project_more_btn_link', true ));
		$project_link_chkbx = sanitize_text_field( get_post_meta( get_the_ID(), 'project_link_chkbx', true ));
	?>
	<p><h4 class="heading"><?php _e('Description','appointment');?></h4>
	<p><textarea id="project_description" name="project_description" style="width: 480px; height: 80px; padding: 0px;" rows="3" cols="10" ><?php if (!empty($project_description)) esc_attr_e($project_description); ?> </textarea></p>
	<p><h4 class="heading"><?php _e('Link','appointment');?></h4>
	<p><input class="inputwidth"  name="project_more_btn_link" id="project_more_btn_link" style="width: 480px" placeholder="<?php _e('Link','appointment'); ?>" type="text" value="<?php if (!empty($project_more_btn_link)) esc_attr_e($project_more_btn_link);?>" /></p>
	<input type="checkbox" name="project_link_chkbx" id="project_link_chkbx" <?php if($project_link_chkbx){echo "checked";}?> /><?php _e('Open link in new tab','appointment'); ?>
	<p>
<?php } 

function webriti_meta_save($post_id) 
{	
	if((defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) || (defined('DOING_AJAX') && DOING_AJAX) || isset($_REQUEST['bulk_edit']))
        return;
		
	if ( ! current_user_can( 'edit_page', $post_id ) )
	{     return ;	} 		
	if(isset($_POST['post_ID']))
	{ 	
		$post_ID = $_POST['post_ID'];				
		$post_type=get_post_type($post_ID);
		if($post_type=='webriti_testimonial'){		
			update_post_meta($post_ID, 'testimonial_designation', sanitize_text_field($_POST['testimonial_designation']));	
			update_post_meta($post_ID, 'testimonial_role_description', sanitize_text_field($_POST['testimonial_role_description']));
		}	
		else if($post_type=='appoint_portfolio'){
			update_post_meta($post_ID, 'project_description', sanitize_text_field($_POST['project_description']));	
			update_post_meta($post_ID, 'project_more_btn_link', sanitize_text_field($_POST['project_more_btn_link']));
			update_post_meta($post_ID, 'project_link_chkbx', sanitize_text_field($_POST['project_link_chkbx']));
			
		}
			elseif($post_type=='appointment_team') {
			update_post_meta($post_ID, 'designation_meta_save', sanitize_text_field($_POST['designation_meta_save']));
			update_post_meta($post_ID, 'fb_meta_save', sanitize_text_field($_POST['fb_meta_save']));
			update_post_meta($post_ID, 'fb_meta_save_chkbx', sanitize_text_field($_POST['fb_meta_save_chkbx']));
			update_post_meta($post_ID, 'lnkd_meta_save', sanitize_text_field($_POST['lnkd_meta_save']));
			update_post_meta($post_ID, 'lnkd_meta_save_chkbx', sanitize_text_field($_POST['lnkd_meta_save_chkbx']));			
			update_post_meta($post_ID, 'twt_meta_save', sanitize_text_field($_POST['twt_meta_save']));
			update_post_meta($post_ID, 'twt_meta_save_chkbx', sanitize_text_field($_POST['twt_meta_save_chkbx']));
			}
			
		elseif($post_type == 'post'){
			
			update_post_meta($post_ID, 'slider_readmore_enable', sanitize_text_field($_POST['slider_readmore_enable']));
			update_post_meta($post_ID, 'slider_readmore_txt', sanitize_text_field($_POST['slider_readmore_txt']));
			update_post_meta($post_ID, 'slider_readmore_link', sanitize_text_field($_POST['slider_readmore_link']));
			update_post_meta($post_ID, 'slider_readmore_target', sanitize_text_field($_POST['slider_readmore_target']));
				
		}	
	}			
} 
?>
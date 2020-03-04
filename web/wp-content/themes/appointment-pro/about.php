<?php
/**
Template Name: About-us
*/
get_header();
get_template_part('index','banner');
$appointment_options=theme_setup_data();
$about_setting = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options ); ?>

<!-- About Section -->
<div class="about-section">
	<div class="page-builder">		
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php 
					the_post(); 
					the_content();?>
				</div>	
			</div>
		</div>
	</div>
</div>
<!-- /About Section -->
<div class="clearfix"></div>
<!-- Team Section -->
<?php if( $about_setting['team_section_enable' ] == '') { ?>
<div class="team-section">		
	<div class="container">
		
		<!-- Section Title -->
		<div class="row">
			<div class="col-md-12">
				<div class="section-heading-title">
					<h1><?php echo $about_setting['about_team_title']; ?></h3>
					<p><?php echo $about_setting['about_team_description']; ?></p>
				
				</div>
			</div>
		</div>
		<!-- /Section Title -->
		
		<!-- Team Area -->
		<div class="row"> <!-- id="team_scroll" -->
		<?php
		$count_posts = wp_count_posts( 'appointment_team')->publish;		
		$arg = array( 'post_type' => 'appointment_team','posts_per_page' =>$count_posts);
		$team = new WP_Query( $arg );
		$i=1;
		if($team->have_posts())
		{	while($team->have_posts() ) : $team->the_post();

		$designation_meta_save = sanitize_text_field( get_post_meta( get_the_ID(), 'designation_meta_save', true ));
		$description_meta_save = sanitize_text_field( get_post_meta( get_the_ID(), 'description_meta_save', true ));
		$fb_meta_save = sanitize_text_field( get_post_meta( get_the_ID(), 'fb_meta_save', true ));
		$fb_meta_save_chkbx = sanitize_text_field( get_post_meta( get_the_ID(), 'fb_meta_save_chkbx', true ));
		$lnkd_meta_save = sanitize_text_field( get_post_meta( get_the_ID(), 'lnkd_meta_save', true ));
		$lnkd_meta_save_chkbx = sanitize_text_field( get_post_meta( get_the_ID(), 'lnkd_meta_save_chkbx', true ));
		$twt_meta_save = sanitize_text_field( get_post_meta( get_the_ID(), 'twt_meta_save', true ));
		$twt_meta_save_chkbx = sanitize_text_field( get_post_meta( get_the_ID(), 'twt_meta_save_chkbx', true ));

		?>
			<div class="col-md-3 team-area">
			<?php
				$defalt_arg =array('class' => "img-responsive");
				if(has_post_thumbnail()){
				?>
				<div class="team-image">
					<?php the_post_thumbnail('', $defalt_arg); ?>
					<?php } else { echo '<div class="team-image">'; } ?>
					<div class="team-showcase-overlay">
						<div class="team-showcase-overlay-inner">
							<div class="team-showcase-icons">
								<?php
								if($fb_meta_save){ 
								if($fb_meta_save_chkbx)
								{	$target ="_blank";  } else { $target ="_self";  } ?>
								<a href="<?php if($fb_meta_save){ echo esc_html($fb_meta_save); } ?>" target="<?php echo $target; ?>" class="hover_thumb"><i class="fa fa-facebook"></i></a>
								<?php } ?>
								<?php
								if($twt_meta_save){ 
								if($twt_meta_save_chkbx)
								{	$target ="_blank";  } else { $target ="_self";  } ?>
								<a href="<?php if($twt_meta_save){ echo esc_html($twt_meta_save); } ?>" target="<?php echo $target; ?>" class="hover_thumb" ><i class="fa fa-twitter"></i></a>
								<?php } ?>
								<?php
								if($lnkd_meta_save){ 
								if($lnkd_meta_save_chkbx)
								{	$target ="_blank";  } else { $target ="_self";  } ?>
								<a href="<?php if($lnkd_meta_save){ echo esc_html($lnkd_meta_save); } ?>" target="<?php echo $target; ?>" class="hover_thumb"><i class="fa fa-linkedin"></i></a>		<?php } ?>
							</div>
						</div>
					</div>
					<?php
				if(has_post_thumbnail()){
				?>
				</div>	<?php } ?>
						<div class="team-caption"><h5><?php if(!empty($designation_meta_save)){ 
						echo $designation_meta_save; } ?></h5><h3><?php the_title(); ?></h3></div>
			</div> <?php if(!has_post_thumbnail()) { echo '</div>'; } ?>
			<?php if($i%4==0)
			{	echo "<div class='clearfix'></div>"; 	}
			$i++; endwhile; 
		} else { 
				$team_title = array('John Doe', 'Sarah Culan', 'Chao Kang', 'Megan Sheryl');
			$team_designation = array(__('FOUNDER','appointment'), __('DESIGNER','appointment'),__('DEVELOPER','appointment'),__('DESIGNER'));
			for($i=1 ; $i<=4 ; $i++ )
			{ ?>
			
			<div class="col-md-3 team-area">
				<div class="team-image">
					<img class="img-responsive" src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/team/team<?php echo $i; ?>.jpg">	
					<div class="team-showcase-overlay">
						<div class="team-showcase-overlay-inner">
							<div class="team-showcase-icons">
								<a href="#" title="Facebook" class="hover_thumb"><i class="fa fa-facebook"></i></a>
								<a href="#" title="Twitter" class="hover_thumb"><i class="fa fa-twitter"></i></a>
								<a href="#" title="Linkedin" class="hover_thumb"><i class="fa fa-linkedin"></i></a>
							</div>
						</div>
					</div>
				</div>
				<div class="team-caption"><h5><?php echo $team_designation[$i-1];?></h5><h3><?php echo $team_title[$i-1];?></h3></div>
			</div>
			<?php 	} } ?>
			</div>
		<!-- /Team Area -->
		</div>
</div>	
	<!-- /Team Section -->
<div class="clearfix"></div>
<?php } ?>
<!-- Clients Section -->
<?php if( $about_setting['client_section_enable'] == 0) {  get_template_part('index','client'); }?>
<!-- /Clients Section -->
<!--- Footer callout --->
<?php if( $about_setting['footer_callout_section_enable'] == 0) {  get_template_part('index','footer-callout'); }?>
<!--- /Footer callout --->
<div class="clearfix"></div>
<?php get_footer(); ?>
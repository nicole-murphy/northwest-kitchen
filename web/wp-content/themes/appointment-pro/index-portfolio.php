<?php
$appointment_options=theme_setup_data();
$project_setting = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );
if($project_setting['portfolio_section_enabled'] == 0) {  ?>
<!-- Portfolio Section -->
<div class="portfolio-section">

	<div class="container">
		<!-- Section Title -->
		<div class="row">
			<div class="col-md-12">
				<div class="section-heading-title">
				
					<h1><?php echo $project_setting['portfolio_title']; ?></h1>
					<p class="section-description"><?php echo $project_setting['portfolio_description']; ?></p>
				
				</div>
			</div>
		</div>
		<!-- /Section Title -->
	
		<div class="col-md-12">
			<div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="3000" id="newCarousel">
				    <div class="carousel-inner">
						
		<?php
						
		
		$post_type = 'appoint_portfolio';
		
		$args = array (
			'post_type' => $post_type,
			'tax_query' => array(
									array(
										'taxonomy' => 'portfolio_categories',
										'field'    => 'id',
										'terms'    => $project_setting['portfolio_selected_category_id'],
										//'operator' => 'NOT IN',
									),
								),
		'posts_per_page' => $project_setting['portfolio_list'],
		'post_status' => 'publish');
		$j=1;
		$portfolio_query = null;		
		$portfolio_query = new WP_Query($args);				
		if( $portfolio_query->have_posts() )
		{ 
		while ($portfolio_query->have_posts()) : $portfolio_query->the_post();
		$project_description =sanitize_text_field( get_post_meta( get_the_ID(), 'project_description', true ));
		$project_more_btn_link =sanitize_text_field( get_post_meta( get_the_ID(), 'project_more_btn_link', true ));
		$project_link_chkbx = sanitize_text_field( get_post_meta( get_the_ID(), 'project_link_chkbx', true ));	


		?>
		<div class="item <?php if($j == 1){ echo "active"; $j++; } ?>">
			<div class="col-md-4 col-sm-6 col-xs-12 pull-left portfolio-area">
								<div class="portfolio-image">
									<?php
									if(has_post_thumbnail())
									{ 
									$class=array('class'=>'img-responsive');
									the_post_thumbnail('', $class);
									$post_thumbnail_id = get_post_thumbnail_id();
									$post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id );
									}
									?>
									<div class="portfolio-showcase-overlay">
										<div class="portfolio-showcase-overlay-inner">
											<div class="portfolio-showcase-icons">
												<?php if(isset($post_thumbnail_url)){ ?>
									<a href="<?php echo $post_thumbnail_url; ?>"  data-lightbox="image" title="<?php the_title(); ?>" class="hover_thumb"><i class="fa fa-search"></i></a>
									<?php } ?>
									<?php if(!empty($project_more_btn_link)) {?>
									<a href="<?php echo $project_more_btn_link;?>" <?php if(!empty($project_link_chkbx)){ echo 'target="_blank"'; } ?>  title="Appointment" class="hover_thumb"><i class="fa fa-plus"></i></a>
									<?php } ?>
											</div>
										</div>
									</div>
								</div>
								<div class="portfolio-caption">
								<h4><?php if(!empty($project_more_btn_link)) {?>
									<a href="<?php echo $project_more_btn_link;?>" <?php if(!empty($project_link_chkbx)){ echo 'target="_blank"'; } ?> class="hover_thumb"><?php the_title(); ?></a>
									<?php } else the_title();  ?></h4>
									
								<?php  if(get_post_meta( get_the_ID(),'project_description', true ))
									{ ?>
								<p><?php echo get_post_meta( get_the_ID(),'project_description', true ); ?></p>
								<?php } ?>
								</div>
							</div></div>
							<?php $j++; endwhile; } ?>
						</div>
					<!-- Project Scroll -->
					<div class="row">
					<?php  if($j>3){ ?>
						<div class="col-md-12">
							<ul class="project-scroll-btn">
								<li><a class="project-prev" href="#newCarousel" data-slide="prev"></a></li>
								<li><a class="project-next" href="#newCarousel" data-slide="next"></a></li>    
							</ul>
						</div>
						<?php } ?>
					</div> 
					<!-- /Project Scroll -->
		</div>
	</div>
</div></div>
<!-- /Portfolio Section -->
<div class="clearfix"></div>
<?php } ?>
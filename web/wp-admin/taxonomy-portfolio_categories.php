<?php
get_header();
get_template_part('index', 'banner');
$appointment_options=theme_setup_data();
$category_setting = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );
?>
<div class="portfolio-column-section">
	<div class="page-builder">
		<div class="container">
			<!-- Portfolio Area -->
			<div class="main-portfolio-section" id="myTabContent">
				<?php $norecord=0;
				$args = array (
				'post_status' => 'publish');
				global $j;
				$j=1;
				$portfolio_query = null;		
				$portfolio_query = new WP_Query($args);				
				if( have_posts() ) : ?>
				<div id="<?php echo $tax_term->slug; ?>" class="tab-pane fade in <?php if($is_active==true){echo 'active';}$is_active=false; ?>">
					<div class="row">
					<?php
							while ( have_posts()) : the_post(); 
							$project_link_chkbx = sanitize_text_field( get_post_meta( get_the_ID(), 'project_link_chkbx', true ));
					
							if(get_post_meta( get_the_ID(),'project_more_btn_link', true )) { 
								$project_more_btn_link = get_post_meta( get_the_ID(),'project_more_btn_link', true );
							} 
							else 
							{
								$project_more_btn_link = '';
							}
							$class = '';
							
							if($category_setting['taxonomy_portfolio_list'] == 2) {
									$class = 'col-md-6 col-md-6 portfolio-area';
									}
							
									else if($category_setting['taxonomy_portfolio_list'] == 3) {
									$class = 'col-md-4 col-md-6 portfolio-area';
									}
							
									else if($category_setting['taxonomy_portfolio_list'] == 4) { 
									$class = 'col-md-3 col-md-6 portfolio-area';
									}
							
									echo '<div class="'.$class.'">';
						
						
							?>
							<div class="portfolio-image">
							<?php if($category_setting['taxonomy_portfolio_list'] == 2) { 
							appointment_image_thumbnail('','img-responsive');
							} ?>
							
							<?php   if($category_setting['taxonomy_portfolio_list'] == 3) {
							appointment_image_thumbnail('','img-responsive');
							} ?>
							
							<?php if($category_setting['taxonomy_portfolio_list'] == 4) { 
							appointment_image_thumbnail('','img-responsive');
							} ?>

							<?php
							if(has_post_thumbnail())
							{ 
							$post_thumbnail_id = get_post_thumbnail_id();
							$post_thumbnail_url = wp_get_attachment_url( $post_thumbnail_id );
							} ?>
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
									<?php if(get_post_meta( get_the_ID(), 'project_description', true )){ ?>
									<p><?php echo get_post_meta( get_the_ID(), 'project_description', true ); ?></p>
									<?php } ?>
								</div>
						<?php echo '</div>'; ?>	
						<?php

							endwhile;
							if($category_setting['taxonomy_portfolio_list']==0) { echo "<div class='clearfix'></div>"; } $j++;
							$norecord=1; 
							wp_reset_query();	
							?>
					</div>
				</div>
				<?php endif;?>
			</div>
		</div>
	</div>
</div>
<!-- /Portfolio Section -->
<?php get_footer(); ?>
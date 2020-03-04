<?php 
	$post_type = 'appoint_portfolio';
	$tax = 'portfolio_categories'; 
	$term_args=array( 'hide_empty' => true,'orderby' => 'id');
	$tax_terms = get_terms($tax, $term_args);
	$defualt_tex_id = get_option('appointment_webriti_default_term_id');
	$j=1;
	$tab= get_option('tab');
	if(isset($_GET['div']))
	{
		$tab=$_GET['div'];
	}
?>

<div class="page-builder">

	<div class="container">
	
		<div class="row">
			<div class="col-md-12">
				<div class="portfolio-tabs-section">
					<ul id="mytabs" class="portfolio-tabs">
					<?php	foreach ($tax_terms  as $tax_term) { 
					?>
					<li class="tab <?php if($tab==''){if($j==1){echo 'active';$j=2;}}else if($tab==$tax_term->slug){echo 'active';}?>"><a id="tab" href="#<?php echo $tax_term->slug; ?>" data-toggle="tab"><?php echo $tax_term->name; ?></a></li>
					<?php } ?>
					</ul>
				</div>
			</div>		
		</div><!-- .row -->
		
		<div class="tab-content main-portfolio-section" id="">
		
		<?php 
			global $paged;
			$curpage = $paged ? $paged : 1;
			
			$norecord=0;
			$total_posts=0;
			$min_post_start=0;
			$is_active=true;
			
			if ($tax_terms) 
			{ 
				foreach ($tax_terms  as $tax_term)
				{
					if(isset($_POST['total_posts']))
					{
						$count_posts = $_POST['total_posts'];
					}
					else
					{
						//$count_posts = wp_count_posts( $post_type)->publish; 
						if(is_page_template('portfolio-2-col.php')) {$count_posts = 4;}
						if(is_page_template('portfolio-3-col.php')) {$count_posts = 6;}
						if(is_page_template('portfolio-4-col.php')) {$count_posts = 8;}
						
					}
					
					if(isset($_POST['min_post_start']))
					{
						$min_post_start = $_POST['min_post_start'];
					}
				
					$total_posts=$count_posts;
				
					$args = array (
					'max_num_pages' =>5, 
					'post_status' => 'publish',
					'post_type' => $post_type,
					'portfolio_categories' => $tax_term->slug,
					'posts_per_page' =>$count_posts,
					'paged' => $curpage,
					);
					
					global $j;
					$j=1;
					$portfolio_query = null;		
					$portfolio_query = new WP_Query($args);	
					
					if( $portfolio_query->have_posts() ):
					
						?>
						
						<div id="<?php echo $tax_term->slug; ?>" class="tab-pane fade in <?php if($tab==''){if($is_active==true){echo 'active';}$is_active=false;}else if($tab==$tax_term->slug){echo 'active';} ?>">
						
							
							<div class="row">
								
								<?php while ($portfolio_query->have_posts()) : $portfolio_query->the_post(); ?>
								
									<?php 
									
									$project_link_chkbx = sanitize_text_field( get_post_meta( get_the_ID(), 'project_link_chkbx', true )); 
									
									if(get_post_meta( get_the_ID(),'project_more_btn_link', true )) { 
										$project_more_btn_link = get_post_meta( get_the_ID(),'project_more_btn_link', true );
									} 
									else 
									{
										$project_more_btn_link = '';
									} 
									
									$class = '';
									
									if(is_page_template('portfolio-2-col.php')) {
										$class = 'col-md-6 col-md-6 portfolio-area';
									}
									
									if(is_page_template('portfolio-3-col.php')) {
										$class = 'col-md-4 col-md-6 portfolio-area';
									}
									
									if(is_page_template('portfolio-4-col.php')) {
										$class = 'col-md-3 col-md-6 portfolio-area';
									}
									
									echo '<div class="'.$class.'">';
									?>
										
											<div class="portfolio-image">
												<?php if(is_page_template('portfolio-2-col.php')) { 
												appointment_image_thumbnail('','img-responsive');
												} ?>
												
												<?php if(is_page_template('portfolio-3-col.php')) {
												appointment_image_thumbnail('','img-responsive');
												} ?>
												
												<?php if(is_page_template('portfolio-4-col.php')) { 
												appointment_image_thumbnail('','img-responsive');
												} ?>

												<?php
												if(has_post_thumbnail())
												{ 
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
												
											</div><!-- .portfolio-image -->
											
											<div class="portfolio-caption">
											
												<h4><?php if(!empty($project_more_btn_link)) {?>
														<a href="<?php echo $project_more_btn_link;?>" <?php if(!empty($project_link_chkbx)){ echo 'target="_blank"'; } ?> class="hover_thumb"><?php the_title(); ?></a>
														<?php } else the_title();  ?></h4>
												<?php if(get_post_meta( get_the_ID(), 'project_description', true )){ ?>
												<p><?php echo get_post_meta( get_the_ID(), 'project_description', true ); ?></p>
												<?php } ?>
												
											</div><!-- .portfolio-caption -->
							
									<?php echo '</div>'; ?>
									
									<?php 
									// call clearfix css class		
									appointment_portfolio_clearfix($j);  
									
										$norecord=1;
									?>
									
								<?php endwhile; ?>
								
								<?php 
									
									$count_posts_2c = wp_count_posts('appoint_portfolio')->publish;
									
									if($count_posts_2c > 4) {
										$Webriti_pagination = new Webriti_pagination();
										$Webriti_pagination->Webriti_page($curpage, $portfolio_query);
									}
									else if($count_posts_2c > 6)
									{
										$Webriti_pagination = new Webriti_pagination();
										$Webriti_pagination->Webriti_page($curpage, $portfolio_query);
									}
									else if($count_posts_2c > 8)
									{
										$Webriti_pagination = new Webriti_pagination();
										$Webriti_pagination->Webriti_page($curpage, $portfolio_query);
									}
								?>
								
								
							</div>
							
						</div>
								
						<?php
						
						wp_reset_query();
						
					else:
					
						?>
						<div id="<?php echo $tax_term->slug; ?>" class="tab-pane fade in <?php if($tab==''){if($is_active==true){echo 'active';}$is_active=false;}else if($tab==$tax_term->slug){echo 'active';} ?>"></div>
						<?php
					
					endif;
			
				
				}
			}
		?>
		
		</div><!-- .tab-content -->
		
	</div><!-- .container -->
	
</div><!-- .page-builder -->

<!-- /Portfolio Section -->


<script type="text/javascript">
jQuery('.tab').click(function(e) {
				e.preventDefault();
				var h = jQuery("a",this).attr('href').replace(/#/, "");
				jQuery.ajax({
					url: "",
					type: "POST",
					data: { code : h },
					dataType: "html"
				});
});

</script>



<?php 

if(isset($_POST['code'])){
	
	$code = $_POST['code'];
	update_option('tab',$code);
	
}
	
get_footer();
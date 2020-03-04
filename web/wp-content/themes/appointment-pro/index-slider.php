<!-- Slider Section -->	
<?php 
$appointment_options=theme_setup_data(); 
$slider_setting = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options);


if($slider_setting['home_banner_enabled'] == 0 ) { 
?>
<div class="homepage-mycarousel">
<div id="carousel-example-generic" class="carousel slide <?php echo $slider_setting['slider_options']; ?>"data-ride="carousel" 
	<?php if($slider_setting['slider_transition_delay'] != '') { ?> data-interval="<?php echo $slider_setting['slider_transition_delay']; } ?>" >	
	<!-- Indicators -->
		<?php
			$query_args = array();
			if($slider_setting['slider_radio'] == 'demo') { ?>
		<ol class="carousel-indicators">
		<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		<li data-target="#carousel-example-generic" data-slide-to="1"></li>
		<li data-target="#carousel-example-generic" data-slide-to="2"></li>
		<li data-target="#carousel-example-generic" data-slide-to="3"></li>
		<li data-target="#carousel-example-generic" data-slide-to="4"></li>
		</ol>
		<div class="carousel-inner" role="listbox">
		<div class="item active">
		   <img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/slide/slide1.jpg">
			<div class="container slide-caption">
				<div class="slide-text-bg1"><h2><?php _e('Powerful Bootstrap Theme','appointment'); ?></h2></div>
				<div class="slide-text-bg2"><span><?php _e('This is a very powerful theme that can be used for any type of business. The layout is clean and elegant.','appointment'); ?></span></div>	
				<div class="slide-btn-area-sm"><a href="#" class="slide-btn-sm"><?php _e('Read More','appointment'); ?></a></div>		
			</div>
		</div>  
		<div class="item">
		   <img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/slide/slide2.jpg">
			<div class="status-caption">
				<div class="status-text-bg1">
					<h2><?php _e('This is a very powerful theme that can be used for any type of business. The layout is clean and elegant.','appointment'); ?> </h2>
				</div>		
			</div>
		</div>
		<div class="item">
		  <img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/slide/slide3.jpg">
			<div class="format-aside">
				<p><?php _e('This is a very powerful theme that can be used for any type of business. The layout is clean and elegant.','appointment'); ?></p>			
			</div>	
		</div>
		
		<div class="item">
		  <img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/slide/slide1.jpg">
			<div class="format-quote">
				<p><?Php echo 'Sed ut Perspiciatis Unde Omnis Iste Sed ut perspiciatis unde omnis iste natu error sit voluptatem accu tium neque fermentum veposu miten a tempor nise. Duis autem vel eum iriure dolor in hendrerit in vulputate velit consequat reprehender in voluptate velit esse cillum duis dolor fugiat nulla pariatur.'; ?></p>	
				<small><cite title="Source Title"><?php echo 'Martin Doe'; ?></cite></small>	
			</div>	
		</div> 
		
		<div class="item">
		  <img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/slide/slide2.jpg">
			<div class="container format-video">
				<div class="row">
					<div class="col-md-6">
						<div class="video-frame">
							<iframe src="https://player.vimeo.com/video/50597841"  frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
						</div>
					</div>
					<div class="col-md-6">
						<div class="video-content">
							<h1><?php _e('Video format','appointment'); ?></h1>
							<p><?php _e('This is an example of a video post format displayed in the featured slider with an excerpt added.','appointment'); ?></p>
							<a href="#" class="format-video-btn-sm"><?php _e('Read More','appointment'); ?></a>		
						</div>
					</div>   	
				</div>
			</div>	
		</div>
		</div>  
		<ul class="carou-direction-nav">
			<li><a class="carou-prev" href="#carousel-example-generic" data-slide="prev"></a></li>
			<li><a class="carou-next" href="#carousel-example-generic" data-slide="next"></a></li>
		</ul>		
		<?php 
			}
			
			else
			{
			$featured_slider_post = $slider_setting['featured_slider_post'];
			
			$slider_select_category = array();
			$slider_select_category = $slider_setting['slider_select_category' ];
		
			$query_args = array( 'category__in'  => $slider_select_category,'ignore_sticky_posts' => 1 ,'posts_per_page' =>$featured_slider_post);	
			
			}
			$t=true;

			$the_query = new WP_Query($query_args);	
			?>
			<ol class="carousel-indicators">
				<?php
				global $post;
				$i=0;
				if ( $the_query->have_posts() ) {
					
							while ( $the_query->have_posts() ) {
								
							$the_query->the_post();  ?>
							<li data-target="#carousel-example-generic" data-slide-to="<?php echo $i;?>" class="<?php if($i==0){ echo 'active';} ?>"></li>
							<?php $i++; } 
						}?>
			</ol>
		<div class="carousel-inner" role="listbox">
			<?php
			
			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
				 
						?>
						<div id="post-<?php the_ID(); ?>" class="item <?php if( $t == true ){ echo 'active'; } $t = false; ?>" >
						<?php $default_arg =array('class' => "img-responsive"); ?>
						<?php 
						// check for the background image
							if(has_post_thumbnail())	the_post_thumbnail('', $default_arg); 	
						else echo '<img class="img-responsive" src="'.WEBRITI_TEMPLATE_DIR_URI.'/images/slide/no-image.jpg">';
			
						//// display post content as per the their formats
			
						//Post format aside
						if ( has_post_format( 'aside' )) { 
							if($post->post_content !="")
							{
								?>
									<div class="format-aside">
									<?php the_content(); ?>
									</div>
							<?php } 
						}
			
						//Post format quote
						elseif( has_post_format( 'quote' ))
						{ 
								?>
								<div class="format-quote">
									<?php the_content(); ?>
									<small><cite title="Source Title"><?php the_title();?></cite></small>
								</div>
								<?php 
						}
			
						//Post format status
						elseif ( has_post_format( 'status' )) { 
						
							if($post->post_content !="")
							{?>
								<div class="status-caption"><div class="status-text-bg1"><h2><?php the_content(); ?></h2></div></div>
							<?php 
							} 
						} 
				
						//Post format video
						elseif ( has_post_format( 'video' ))
						{	
						//print_r($slider_readmore_target);
						//wp_die();
							get_template_part('content-slider','video');
						}
						else { // Standard post format
						
						?>
						<div class="container slide-caption">
							<?php if($post->post_title !="") { ?>
							<div class="slide-text-bg1"><h2><?php the_title();?></h2></div><?php } //echo "<pre>"; print_r($post);wp_die();
							if($post->post_excerpt !=''){ ?>
								<div class="slide-text-bg2"><span><?php echo(get_the_excerpt()); ?></span></div>
							<?php }
							$slider_readmore_enable = sanitize_text_field( get_post_meta( get_the_ID(), 'slider_readmore_enable', true ));	
							$slider_readmore_txt = sanitize_text_field( get_post_meta( get_the_ID(), 'slider_readmore_txt', true ));
							$slider_readmore_link = sanitize_text_field( get_post_meta( get_the_ID(), 'slider_readmore_link', true ));
							$slider_readmore_target = sanitize_text_field( get_post_meta( get_the_ID(), 'slider_readmore_target', true ));
							if($slider_readmore_enable == 'on'){
									?>
							<div class="slide-btn-area-sm"><a  href="<?php echo $slider_readmore_link ;?>" <?php if($slider_readmore_target=='on'){ echo 'target="_blank"';} ?> class="slide-btn-sm"><?php if($slider_readmore_txt!=''){ _e($slider_readmore_txt,"appointment");} else{ _e("Read More","appointment");}?></a></div>
									<?php
							}

							?>
						</div>
						<?php } ?>
						</div> <!-- item class div close-->
					<?php	}
		
		 } wp_reset_postdata();    ?>
	</div><!-- carousel-inner class div close-->
	<!-- Pagination --> 
	<?php  if($i>1){ ?>
	<ul class="carou-direction-nav">
		<li><a class="carou-prev" href="#carousel-example-generic" data-slide="prev"></a></li>
		<li><a class="carou-next" href="#carousel-example-generic" data-slide="next"></a></li>
	</ul> 
	<?php } ?>
	<!-- /Pagination -->
</div>
</div>
<!-- /Slider Section -->
<?php } ?>
<?php
get_header(); 
?>
<!-- Page Title Section -->
<div class="page-title-section">		
	<div class="overlay">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="page-title">
						<h1>
						<?php 
							$appointment_options = theme_setup_data();
							$current_options = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );
							$banner_title_category = $current_options['banner_title_category']; 
						
							echo $banner_title_category;
							echo  ' ';
							echo single_cat_title("", false); 
						?>
						</h1>
					</div>
				</div>
				<div class="col-md-6">
					<ul class="page-breadcrumb">
						<?php if (function_exists('qt_custom_breadcrumbs')) qt_custom_breadcrumbs();?>
					</ul>
				</div>
			</div>
		</div>	
	</div>
</div>
<!-- /Page Title Section -->

<!-- Page Seperator --><!--<div class="page-seperator"></div>--><!-- /Page Seperator -->
<div class="clearfix"></div>

<!-- /Page Title Section ---->
<div class="page-builder">
	<div class="container">
		<div class="row">
			<!-- Blog Area -->
			<div class="<?php appointment_post_layout_class(); ?>" >
			  <?php 
				if ( have_posts() ) :
					// Start the Loop.
					while ( have_posts() ) : the_post();
						// Include the post format-specific template for the content. get_post_format
						get_template_part( 'content',get_post_format() );
					endwhile;
				endif;
				// Previous/next page navigation.
				the_posts_pagination( array(
				'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
				'next_text'          => '<i class="fa fa-angle-double-right"></i>',
				) );
				?>
			<!-- /Blog Pagination -->
			</div>
			<!--Sidebar Area-->
			<div class="col-md-4">
				<?php get_sidebar(); ?>
			</div>
			<!--Sidebar Area-->
		</div>
	</div>
</div>
<?php get_footer(); ?>
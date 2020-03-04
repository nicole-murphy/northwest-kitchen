<?php
  get_header(); ?>
<!-- Page Title Section -->
<div class="page-title-section">		
	<div class="overlay">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="page-title"><h1><?php 
					$appointment_options=theme_setup_data();
					$current_options = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );
					$banner_title_author = $current_options['banner_title_author'];
					printf($banner_title_author.' '.'<a href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a>' ); ?></h1></div>
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
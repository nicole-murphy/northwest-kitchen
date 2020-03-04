<?php
 get_header();
?>
 <div class="page-title-section">		
	<div class="overlay">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="page-title"><h1><?php 
					$appointment_options=theme_setup_data();
					$current_options = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );
					$banner_title_search = $current_options['banner_title_search']; 
					printf($banner_title_search.' '. '<span>' . get_search_query() . '</span>' ); ?></h1></div>
					
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
 
<!-- /Page Title Section ---->
<div class="page-builder">
	<div class="container">
		<div class="row">
			<!-- Blog Area -->
			<div class="<?php appointment_post_layout_class(); ?>" >
			<?php if ( have_posts() ) : ?>
					<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content',get_post_format() );?>
				<?php endwhile; ?>
			<?php else : ?>
			<h2><?php _e( "Nothing found", 'appointment' ); ?></h2>
			<p><?php _e( "Sorry, but nothing matched your search criteria. Please try again with some different keywords.", 'appointment' ); ?>
			</p>
			<?php get_search_form(); ?>
			<?php endif; ?>	
			</div>		
			<!-- /Blog Area -->			
			<!--Sidebar Area-->
			<div class="col-md-4">
				<?php get_sidebar(); ?>
			</div>
			<!--Sidebar Area-->
		</div>
	</div>
</div>
<?php get_footer(); ?>
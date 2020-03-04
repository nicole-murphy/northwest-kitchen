<?php get_header(); ?>
<div class="page-title-section">		
	<div class="overlay">
		<div class="container">
			<div class="row">
			<?php //the_post(); ?>
				<div class="col-md-6">
					<div class="page-title"><h1>
        <?php 
		$appointment_options=theme_setup_data();
		$current_options = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );
		$banner_daily_archive = $current_options['banner_daily_archive'];
		$banner_monthly_archive = $current_options['banner_monthly_archive'];
		$banner_yearly_archive = $current_options['banner_yearly_archive'];
		if ( is_day() ) : ?>
        <?php echo $banner_daily_archive; echo ' '; echo (get_the_date()); ?>
        <?php elseif ( is_month() ) : ?>
        <?php echo $banner_monthly_archive; echo ' '; echo (get_the_date( 'F Y' )); ?>
        <?php elseif ( is_year() ) : ?>
        <?php echo $banner_yearly_archive;  echo ' '; echo (get_the_date( 'Y' )); ?>
        <?php else : ?>
        <?php _e( "Blog Archive", 'appointment' ); ?>
        <?php endif; ?>	
        <?php if(get_post_meta( get_the_ID(), 'post_description', true ) != '' ) { ?>
        <p><?php echo get_post_meta( get_the_ID(), 'post_description', true ) ; ?></p>
        <?php } ?>
        <div class="qua-separator" id=""></div>
		</h1></div>
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
<!-- Page Seperator --><!--<div class="page-seperator"></div> --><!-- /Page Seperator -->
<div class="clearfix"></div>
<!-- /Page Title Section ---->
<div class="page-builder">
	<div class="container">
		<div class="row">
			<!-- Blog Area -->
			<div class="<?php appointment_post_layout_class(); ?>" >
			<?php
				while ( have_posts() ) : the_post();
				global $more;
				$more = 0;
				get_template_part( 'content',get_post_format());
				endwhile;
				// Previous/next page navigation.
				the_posts_pagination( array(
				'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
				'next_text'          => '<i class="fa fa-angle-double-right"></i>',
				) );
				?>
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
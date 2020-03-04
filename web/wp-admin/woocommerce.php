<?php
get_header();
get_template_part('index','banner'); ?>
<!-- /Page Title Section -->
<div class="clearfix"></div>
<!-- Blog Section with Sidebar -->
<div class="page-builder">
	<div class="container">
		<div class="row">
			<!-- Blog Area -->

			<div class="col-md-<?php echo (  is_active_sidebar('woocommerce') ? '8' : '12' ); ?> col-xs-12">
				<div id="post-<?php the_ID(); ?>">
					<?php woocommerce_content(); ?>
				</div>	
			</div>
			<!--/End of Blog Detail-->	
			<!--Sidebar Area-->
			<div class="col-md-4">	
				<?php get_sidebar('woocommerce'); ?>
				</div>
			<!--Sidebar Area-->
		</div>
	</div>
</div>
<!-- /Blog Section with Sidebar -->
<?php get_footer(); ?>
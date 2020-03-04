<!-- Page Title Section -->
<div class="page-title-section">		
	<div class="overlay">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="page-title">
						<?php 
						if ( class_exists( 'WooCommerce' ) ) {
							if ( is_shop() ) {
								echo '<h1>';
									woocommerce_page_title();
								echo '</h1>';
							}
							elseif(is_cart() || is_checkout()) {
									
									the_title(  '<h1>', '</h1>' );	
								}
							else { 
						
								the_title(  '<h1>', '</h1>' ); 
							} 
						}
						else if( is_archive() ){ 
						
							the_archive_title( '<h1>', '</h1>' ); 
							
						}
						else if( is_home() ){
							
							echo '<h1>';
							
							wp_title(' ');
							
							echo '</h1>';
						}
						
						
						else{ 
						
							the_title(  '<h1>', '</h1>' ); 
						}  
						?>
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
<div class="clearfix"></div>
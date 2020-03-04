<?php
/**
Template Name: Blog Masonry
*/
get_header();
get_template_part('index','banner');
$appointment_options=theme_setup_data();
$blog_masonry_column = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );
?>
<!-- Page Seperator --><div class="page-seperator"></div><!-- /Page Seperator -->
<div class="clearfix"></div>
<!-- Blog Masonry Section -->
<section class="blog-section-lg">
	<div class="container">
		<div class="row masonry-<?php echo $blog_masonry_column['blog_masonry_column_layout'];?>">
			<?php
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			$args = array( 'post_type' => 'post','paged'=>$paged);	
			$post_type_data = new WP_Query( $args );
			while($post_type_data->have_posts()){
			$post_type_data->the_post();
			?>
			<div class="masonry-item">
				<?php get_template_part( 'content',get_post_format() ); ?>
			</div>
		<?php } ?>
		</div>
		</div>	
		<!-- Blog Pagination -->
				<?php 				
				$Webriti_pagination = new Webriti_pagination();
				$Webriti_pagination->Webriti_page($paged, $post_type_data); ?>
		<!-- /Blog Pagination -->					
	</div>
</section>
<!-- /Blog Masonry Section -->
<div class="clearfix"></div>
<?php get_footer(); ?>
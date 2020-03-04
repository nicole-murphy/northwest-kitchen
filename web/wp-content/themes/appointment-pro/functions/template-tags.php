<?php
/**
 * Custom template tags for appointment
 *
 * @package WordPress
 * @subpackage appointment
 * @since appointment 1.0
 */
 
//Hide meta Like Date from Blog pages, category pages
if ( ! function_exists( 'appointment_aside_meta_content' ) ) :
function appointment_aside_meta_content()
		{ 
		$appointment_options=theme_setup_data();
		$blog_setting = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );
		if($blog_setting['blog_meta_section_settings'] == '' ) {
		?>
	    <!--show date of post-->
		<aside class="blog-post-date-area">
			<div class="date"><?php echo get_the_date('j'); ?> <div class="month-year"><?php echo get_the_date('M'); ?>,<?php echo get_the_date('Y'); ?></div></div>
			<div class="comment"><a href="<?php the_permalink(); ?>"><i class="fa fa-comments"></i><?php comments_number( '0', '1', '%' ); ?></a></div>
		</aside>
		<?php }  } endif;
		
if ( ! function_exists( 'appointment_aside_masonry_meta_content' ) ) :
function appointment_aside_masonry_meta_content()
		{ 
		$appointment_options=theme_setup_data();
		$blog_setting = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );
		if($blog_setting['blog_meta_section_settings'] == '' ) {
		?>
	    <!--show date of post-->
		<div class="blog-post-sm">
			<?php _e('By','appointment');?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><?php echo get_the_author();?></a>
			<?php _e('Posted','appointment');?>
			<a href="<?php echo get_month_link(get_post_time('Y'),get_post_time('m')); ?>">
			<?php echo get_the_date('M j, Y'); ?></a>
			<?php 	$tag_list = get_the_tag_list();
			if(!empty($tag_list)) { ?>
			<div class="blog-tags-sm"><?php _e('In','appointment');?><?php the_tags('', ', ', ''); ?></div>
			<?php } ?>
		</div>
		<?php }  } endif;
		
		
//Hide post meta like author name,category on Blog page, archive pages 	
if ( ! function_exists( 'appointment_post_meta_content' ) ) :
		function appointment_post_meta_content()
		{  
			$appointment_options=theme_setup_data();
			$blog_setting = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );
			if($blog_setting['blog_meta_section_settings'] == '' ) { ?>
			<div class="blog-post-lg">
				<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><?php echo get_avatar( get_the_author_meta('user_email'), $size = '40'); ?></a><?php _e('By','appointment');?><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) );?>"><?php echo get_the_author();?></a>
				<?php 	$tag_list = get_the_tag_list();
					if(!empty($tag_list)) { ?>
				<div class="blog-tags-lg"><i class="fa fa-tags"></i><?php the_tags('', ', ', ''); ?></div>
				<?php } ?>
			</div>
			<?php } 
} endif; 
// this functions accepts two parameters first is the preset size of the image and second  is for additional classes, you can also add yours 
if(!function_exists( 'appointment_post_thumbnail')) : 

		function appointment_post_thumbnail($preset,$class){
		if(has_post_thumbnail()){
		$defalt_arg =array('class' => $class); 
		if(!is_single()){?>
			
		<div class="blog-lg-box">
			<a class ="img-responsive" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
			<?php the_post_thumbnail($preset, $defalt_arg); ?></a>	
		</div>
		<?php } else { ?>
		
		<div class="blog-lg-box">
				<a class ="img-responsive" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
			<?php the_post_thumbnail($preset, $defalt_arg); ?>
		</div>	
<?php } } } endif;
// this functions accepts one parameters for image class
if(!function_exists( 'appointment_image_thumbnail')) : 					
		function appointment_image_thumbnail($preset,$class){
		if(has_post_thumbnail()){  $defalt_arg =array('class' => $class);
					the_post_thumbnail($preset, $defalt_arg); } } endif;
		// This Function Check whether Sidebar active or Not

		if(!function_exists( 'appointment_post_layout_class' )) :

		function appointment_post_layout_class(){
			if(is_active_sidebar('sidebar-primary'))
				{ echo 'col-md-8'; }
			else
				{ echo 'col-md-12'; }
		} endif;
//get thumbnail image id
if(!function_exists( 'appointment_portfolio_clearfix' )) :
function appointment_portfolio_clearfix($j){
        global $j;
        if(is_page_template('portfolio-2-col.php'))
		{
		if($j%2==0){ echo "<div class='clearfix'></div>"; } $j++;
		}
		if(is_page_template('portfolio-3-col.php'))
		{
		if($j%3==0){ echo "<div class='clearfix'></div>"; } $j++;
		}
		if(is_page_template('portfolio-4-col.php'))
		{
		if($j%4==0){ echo "<div class='clearfix'></div>"; } $j++;
		}	
} endif;?>
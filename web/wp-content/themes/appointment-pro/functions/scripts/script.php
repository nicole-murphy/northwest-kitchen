<?php
/* Includes all style and script files
 */
function appointment_scripts()
 {
		
		$appointment_options=theme_setup_data(); 
		$current_options = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );
		wp_enqueue_style('appointment-style', get_stylesheet_uri() );
		wp_enqueue_style('appointment-bootstrap-css',WEBRITI_TEMPLATE_DIR_URI.'/css/bootstrap.css');
		if($current_options['link_color_enable'] == true) {
		custom_light();
		}
		else
		{
		$class=$current_options['theme_color'];
		wp_enqueue_style('default', WEBRITI_TEMPLATE_DIR_URI . '/css/'.$class);
		}
		wp_enqueue_style('appointment-menu-css',WEBRITI_TEMPLATE_DIR_URI.'/css/theme-menu.css');
		/* Font Css */
        wp_enqueue_style('appointment-font-css',WEBRITI_TEMPLATE_DIR_URI.'/css/font/font.css');
		/* Font Awesome */
        wp_enqueue_style('appointment-font-awesome-css',WEBRITI_TEMPLATE_DIR_URI.'/css/font-awesome/css/font-awesome.min.css');
		wp_enqueue_style('appointment-lightbox-css',WEBRITI_TEMPLATE_DIR_URI.'/css/lightbox.css');
		/* Media Responsive Css */
		wp_enqueue_style('appointment-media-responsive-css',WEBRITI_TEMPLATE_DIR_URI.'/css/media-responsive.css');	
		/* Element Css */
		wp_enqueue_style('appointment-element-css',WEBRITI_TEMPLATE_DIR_URI.'/css/element.css');
		/* Bootstrap Js */
		  
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script('appointment-jquery-ui' , WEBRITI_TEMPLATE_DIR_URI.'/js/jquery-ui.js');
        wp_enqueue_script('appointment-bootstrap-js' , WEBRITI_TEMPLATE_DIR_URI.'/js/bootstrap.min.js');
		wp_enqueue_script('appointment-menu-js' , WEBRITI_TEMPLATE_DIR_URI.'/js/menu/menu.js');
		wp_enqueue_script('appointment-page-scroll-js' , WEBRITI_TEMPLATE_DIR_URI.'/js/page-scroll.js');
		wp_enqueue_script('appointment-carousel-js' , WEBRITI_TEMPLATE_DIR_URI.'/js/carousel.js');
		wp_enqueue_script('appointment-lightbox-2.6.min-js' , WEBRITI_TEMPLATE_DIR_URI.'/js/lightbox/lightbox-2.6.min.js');
		if ( is_singular() ){ wp_enqueue_script( "comment-reply" );	}
		}	
add_action('wp_enqueue_scripts','appointment_scripts');

function appointment_custmizer_layout()
 {
		wp_enqueue_style('appointment-customizer-css',WEBRITI_TEMPLATE_DIR_URI.'/css/optionpanal-dragdrop.css');
}
add_action('customize_controls_print_styles','appointment_custmizer_layout');

add_action( 'admin_enqueue_scripts', 'admin_enqueue_script_function' );
function admin_enqueue_script_function()
{
wp_enqueue_style('appointment-drag-drop',WEBRITI_TEMPLATE_DIR_URI.'/css/drag-drop.css');
wp_enqueue_style('appointment-font-css',WEBRITI_TEMPLATE_DIR_URI.'/css/jquery-ui.css');
wp_enqueue_script('appointment-jquery-ui' , WEBRITI_TEMPLATE_DIR_URI.'/js/jquery-ui.js',array('jquery'));
wp_enqueue_script('appointment-jquery-ui-drag' , WEBRITI_TEMPLATE_DIR_URI.'/js/layout-drag-drop.js');
}
add_action('wp_head','head_enqueue_custom_css');
function head_enqueue_custom_css()
{
	$appointment_options=theme_setup_data(); 
	$custom_css = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options);
	if($custom_css['webrit_custom_css']!='') {  ?>
	<style>
	<?php echo $custom_css['webrit_custom_css']; ?>
	</style>
	<?php } 
}



// footer custom script
function footer_custom_script()
{
$appointment_options=theme_setup_data(); 
$current_options = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options);
if($current_options['link_color_enable'] == true) {
custom_light();
}
}
add_action('wp_footer','footer_custom_script');
?>
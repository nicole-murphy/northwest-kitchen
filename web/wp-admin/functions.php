<?php
/**Theme Name	: Appointment
 * Theme Core Functions and Codes
*/
	/**Includes reqired resources here**/
	define('WEBRITI_TEMPLATE_DIR_URI', get_template_directory_uri());
    define('WEBRITI_TEMPLATE_DIR' , get_template_directory());
    define('WEBRITI_THEME_FUNCTIONS_PATH' , WEBRITI_TEMPLATE_DIR.'/functions');
    define('WEBRITI_THEME_OPTIONS_PATH' , WEBRITI_TEMPLATE_DIR_URI.'/functions/theme_options');
	require( WEBRITI_THEME_FUNCTIONS_PATH.'/scripts/script.php');
    require( WEBRITI_THEME_FUNCTIONS_PATH.'/menu/default_menu_walker.php');
    require( WEBRITI_THEME_FUNCTIONS_PATH.'/menu/appoinment_nav_walker.php');
    require( WEBRITI_THEME_FUNCTIONS_PATH.'/widgets/sidebars.php');
    require( WEBRITI_THEME_FUNCTIONS_PATH . '/template-tags.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/breadcrumbs/breadcrumbs.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH .'/widgets/appointment_info_widget.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH .'/widgets/header-widget.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/font/font.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/post-type/custom-post-type.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/meta-box/post-meta.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/taxonomies/taxonomies.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/pagination/webriti_pagination.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-callout.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-client.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-service.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-slider.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-copyright.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-header.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-news.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-project.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-testimonial.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-template.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-layout.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-footer-callout.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer_theme_style.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer_banner.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/customizer/customizer-post-type-slugs.php');
	require( WEBRITI_TEMPLATE_DIR . '/css/custom-light.php');
	
	// Custom Category control 
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/custom-controls/select/category-dropdown-custom-control.php');
	require( WEBRITI_THEME_FUNCTIONS_PATH . '/custom-controls/select/taxonomy-dropdown-custom-control.php');
	require_once('theme_setup_data.php');
	/* Theme Setup Function */
	add_action( 'after_setup_theme', 'appointment_setup' );

	// Set the content_width with 900
	if ( ! isset( $content_width ) ) $content_width = 900;
	
	function appointment_setup()
	{	
	// Load text domain for translation-ready
    load_theme_textdomain( 'appointment', WEBRITI_THEME_FUNCTIONS_PATH . '/lang' );
	// Custom-header
	$header_args = array(
				 'flex-height' => true,
				 'height' => 200,
				 'flex-width' => true,
				 'width' => 1600,
				 'admin-head-callback' => 'mytheme_admin_header_style',
				 );
				 
				 add_theme_support( 'custom-header', $header_args );
	
    add_theme_support( 'post-thumbnails' ); //supports featured image
	// Register primary menu 
    register_nav_menu( 'primary', __( 'Primary Menu', 'appointment' ) );
	// Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );
	// Set the content_width with 900
	
	//Add Theme Support Title Tag
	add_theme_support( 'title-tag' );
	
	//Custom Background
	add_theme_support( 'custom-background' );
	
	// woocommerce support
	
	add_theme_support( 'woocommerce' );
	
	
}
// set appoinment page title       
function appointment_title( $title, $sep )
{	
    global $paged, $page;
	
	if( is_home() ){
		return $title;
	}
	
	if ( is_feed() )
        return $title;
		// Add the site name.
		$title .= get_bloginfo( 'name' );
		// Add the site description for the home/front page.
		$site_description = get_bloginfo( 'description' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title = "$title $sep $site_description";
		// Add a page number if necessary.
		if ( $paged >= 2 || $page >= 2 )
			$title = "$title $sep " . sprintf( _e( 'Page', 'appointment' ), max( $paged, $page ) );
		
		return $title;
}	
add_filter( 'wp_title', 'appointment_title', 10,2 );


add_filter('get_avatar','appointment_add_gravatar_class');

function appointment_add_gravatar_class($class) {
    $class = str_replace("class='avatar", "class='img-circle", $class);
    return $class;
}
function appointment_add_to_author_profile( $contactmethods ) {
		$contactmethods['facebook_profile'] = __('Facebook URL','appointment');
		$contactmethods['twitter_profile'] = __('Twitter URL','appointment');
		$contactmethods['linkedin_profile'] = __('LinkedIn URL','appointment');
		$contactmethods['google_profile'] = __('GooglePlus URL','appointment');
		return $contactmethods;
	}
	add_filter( 'user_contactmethods', 'appointment_add_to_author_profile', 10, 1);
	
	
	
	//this will by default select the all category
	function appointment_mfields_set_default_object_terms( $post_id, $post ) {
    if ( 'publish' == $post->post_status && $post->post_type == 'appoint_portfolio' ) {
        $taxonomies = get_object_taxonomies( $post->post_type,'object' );
        foreach ( $taxonomies as $taxonomy ) {
            $terms = wp_get_post_terms( $post_id, $taxonomy->name );
			$myid = get_option('appointment_webriti_default_term_id');
			$a=get_term_by('id',$myid,'portfolio_categories');
            if ( empty( $terms )) {
                wp_set_object_terms( $post_id,$a->slug , $taxonomy->name );
            }
        }
    }
}
add_action( 'save_post', 'appointment_mfields_set_default_object_terms', 100, 2 );

function appointment_get_portfolio_terms()
{
$post_type = 'appoint_portfolio';
	$tax = 'portfolio_categories';
	$term_args=array( 'hide_empty' => true,'orderby' => 'id');
	$tax_terms = get_terms($tax, $term_args);
	return $tax_terms;
}
function appointment_get_custom_link($url,$target,$title)
{
	if($title)
	{?>
			<a href="<?php echo $url; ?>" <?php if($target=='on' || $target==true){ echo 'target="_blank"'; } ?> >
			<?php echo $title; ?>
			</a>
<?php } }

function get_home_blog_excerpt()
	{
		global $post;
		$excerpt = get_the_content();
		$excerpt = strip_tags(preg_replace(" (\[.*?\])",'',$excerpt));
		$excerpt = strip_shortcodes($excerpt);
		$original_len = strlen($excerpt);
		$excerpt = mb_strimwidth($excerpt, 0, 145, "...");
		$len=strlen($excerpt);
		if($original_len>275) {
		$excerpt = $excerpt;
		return $excerpt . '<div class="blog-btn-area-sm"><a href="' . get_permalink() . '" class="blog-btn-sm">'.__('Read More','appointment').'</a></div>';
		}
		else
		{ return $excerpt; }
	}
	add_theme_support( 'post-formats', array(
		'aside', 'quote', 'status', 'video'
	) );
	
function appointment_blog_exclude_category( $query ) {
		
	$appointment_options = theme_setup_data();
		
	$current_options = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );
	
		
	if( is_admin() || is_front_page() ) {
		return;
	}
	else
	{
				
		if( $current_options['blog_page_slider_enable'] != 1 ) {
				  
			$query->set( 'category__not_in',$current_options['slider_select_category'] );
				
		}

	}
	
}
add_action( 'pre_get_posts', 'appointment_blog_exclude_category' );
	
function appointment_exclude_widget_categories($args){
	$appointment_options=theme_setup_data();
	$current_options = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );
	$exclude = $current_options['slider_select_category']; // The IDs of the excluding categories
	if( $current_options['blog_page_slider_enable'] == false ) {
	$args["exclude"] = $exclude;
	}
	return $args;
}
add_filter("widget_categories_args","appointment_exclude_widget_categories");

add_filter('pre_post_title', 'appoinment_allow_empty_title_post');
add_filter('pre_post_content', 'appoinment_allow_empty_title_post');

function appoinment_allow_empty_title_post($value)
{
    if ( empty($value) ) {
        return ' ';
    }
    return $value;
}

add_filter('wp_insert_post_data', 'appointment_empty_post_insert');
function appointment_empty_post_insert($data)
{
    if ( ' ' == $data['post_title'] ) {
        $data['post_title'] = '';
    }
    if ( ' ' == $data['post_content'] ) {
        $data['post_content'] = '';
    }
    return $data;
}


// custom background
function custom_background_function()
{
	$appointment_options=theme_setup_data(); 
    $current_options = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );
	$page_bg_image_url = $current_options['back_image'];
	if($page_bg_image_url!='')
	{
	echo '<style>body.boxed{ background-image:url("'.WEBRITI_TEMPLATE_DIR_URI.'/images/bg-pattern/'.$page_bg_image_url.'");}</style>';
	}
}
add_action('wp_head','custom_background_function',10,0);
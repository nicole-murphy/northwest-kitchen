<?php 
function webriti_testimonial_type()
{	
		$appointment_options = theme_setup_data(); 
		$current_option     = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );
		$appointment_testimonial_slug = $current_option['appointment_testimonial_slug'];
		register_post_type( 'webriti_testimonial',
		array(
			'labels' => array(
				'name' => 'Testimonial',
				'add_new' => __('Add New', 'appointment'),
                'add_new_item' => __('Add New Testimonial','appointment'),
				'edit_item' => __('Add New','appointment'),
				'new_item' => __('New Link','appointment'),
				'all_items' => __('All Testimonials','appointment'),
				'view_item' => __('View Link','appointment'),
				'search_items' => __('Search Links','appointment'),
				'not_found' =>  __('No Links found','appointment'),
				'not_found_in_trash' => __('No Links found in Trash','appointment'), 
				),
			'supports' => array('title', 'thumbnail'),
			'show_in' => true,
			'show_in_nav_menus' => false,
			//'rewrite' => array('slug' => $GLOBALS['slug_testimonial']),			
			'public' => true,
			'menu_position' => 20,
			'rewrite' => array('slug' => $appointment_testimonial_slug),
			'public' => true,
			'menu_icon' => WEBRITI_TEMPLATE_DIR_URI . '/images/testimonial.png',
			)
	);
}
add_action( 'init', 'webriti_testimonial_type' );


//portfolio Custom post type
function webriti_portfolio_type()
{	
	$appointment_options = theme_setup_data(); 
	$current_option     = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );
	$appointment_portfolio_slug = $current_option['appointment_portfolio_slug'];


	register_post_type( 'appoint_portfolio',
		array(
			'labels' => array(
				'name' => 'Portfolio / Project',
				'add_new' => __('Add New', 'appointment'),
				'add_new_item' => __('Add New Portfolio / Project','appointment'),
				'edit_item' => __('Add New','appointment'),
				'new_item' => __('New Link','appointment'),
				'all_items' => __('All Portfolios / Projects','appointment'),
				'view_item' => __('View Link','appointment'),
				'search_items' => __('Search Links','appointment'),
				'not_found' =>  __('No Links found','appointment'),
				'not_found_in_trash' => __('No Links found in Trash','appointment'), 
			),
			'supports' => array('title','thumbnail'),
			'show_in' => true,
			'show_in_nav_menus' => false,
			
			'public' => true,
			'menu_position' =>20,
			'rewrite' => array('slug' => $appointment_portfolio_slug),
			'public' => true,
			'menu_icon' => WEBRITI_TEMPLATE_DIR_URI . '/images/portfolio.png',
		)
	);
}
add_action( 'init', 'webriti_portfolio_type' );

//add custom post type Team
function appointment_team_type()
{	
	$appointment_options = theme_setup_data(); 
	$current_option     = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );
	$appointment_team_slug = $current_option['appointment_team_slug'];

	register_post_type( 'appointment_team',
		array(
			'labels' => array(
				'name' => 'Our Team',
				'add_new' => __('Add New', 'appointment'),
                'add_new_item' => __('Add New Team','appointment'),
				'edit_item' => __('Add New','appointment'),
				'new_item' => __('New Link','appointment'),
				'all_items' => __('All Teams','appointment'),
				'view_item' => __('View Link','appointment'),
				'search_items' => __('Search Links','appointment'),
				'not_found' =>  __('No Links found','appointment'),
				'not_found_in_trash' => __('No Links found in Trash','appointment'), 
				),
			'supports' => array('title', 'thumbnail', 'comments'),
			'show_in' => true,
			'show_in_nav_menus' => false,
			'public' => true,
			'menu_position' => 20,
			'rewrite' => array('slug' => $appointment_team_slug),
			'public' => true,
			'menu_icon' => WEBRITI_TEMPLATE_DIR_URI . '/images/team.png',
			)
	);
}
add_action( 'init', 'appointment_team_type' );
?>
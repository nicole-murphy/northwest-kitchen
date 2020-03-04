<?php 
// Adding customizer home page settings
function appointment_banner_page_customizer( $wp_customize ){

	/* Home Page Panel */
	$wp_customize->add_panel( 'banner_page', array(
		'priority'       => 980,
		'capability'     => 'edit_theme_options',
		'title'      => __('Banner settings', 'appointment'),
	) );
	
	/* Category Banner */
	$wp_customize->add_section( 'category_banner' , array(
		'title'      => __('Category', 'appointment'),
		'panel'  => 'banner_page',
   	) );
	

	// Banner Configuration For Category Template
	$wp_customize->add_setting(
    'appointment_options[banner_title_category]',
    array(
        'default' => __('Category Archive','appointment'),
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'appointment_options[banner_title_category]',
    array(
        'label' => __('Title','appointment'),
        'section' => 'category_banner',
        'type' => 'text',
    )
	);

	
	/* Archive Banner */
	$wp_customize->add_section( 'archive_banner' , array(
		'title'      => __('Archive', 'appointment'),
		'panel'  => 'banner_page',
   	) );
	

	// Banner Configuration For Archive Template
	// Daily Archive Page
	$wp_customize->add_setting(
    'appointment_options[banner_daily_archive]',
    array(
        'default' => __('Title','appointment'),
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'appointment_options[banner_daily_archive]',
    array(
        'label' => __('Daily archive title','appointment'),
        'section' => 'archive_banner',
        'type' => 'text',
    )
	);
	
	// Monthaly Archive Page
	$wp_customize->add_setting(
    'appointment_options[banner_monthly_archive]',
    array(
        'default' => __('Title','appointment'),
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'appointment_options[banner_monthly_archive]',
    array(
        'label' => __('Monthly archive title','appointment'),
        'section' => 'archive_banner',
        'type' => 'text',
    )
	);
	
	// Yearly Archive Page
	$wp_customize->add_setting(
    'appointment_options[banner_yearly_archive]',
    array(
        'default' => __('Title','appointment'),
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'appointment_options[banner_yearly_archive]',
    array(
        'label' => __('Yearly archive title','appointment'),
        'section' => 'archive_banner',
        'type' => 'text',
    )
	);
	

	
	/* Author Banner */
	$wp_customize->add_section( 'author_banner' , array(
		'title'      => __('Author', 'appointment'),
		'panel'  => 'banner_page',
   	) );
	

	// Banner Configuration For Archive Template
	$wp_customize->add_setting(
    'appointment_options[banner_title_author]',
    array(
        'default' => __('Title','appointment'),
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'appointment_options[banner_title_author]',
    array(
        'label' => __('Title','appointment'),
        'section' => 'author_banner',
        'type' => 'text',
    )
	);

	///* Tag Banner */
	$wp_customize->add_section( 'tag_banner' , array(
		'title'      => __('Tag', 'appointment'),
		'panel'  => 'banner_page',
   	) );
	

	// Banner Configuration For Tag Template
	$wp_customize->add_setting(
    'appointment_options[banner_title_tag]',
    array(
        'default' => __('Title','appointment'),
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'appointment_options[banner_title_tag]',
    array(
        'label' => __('Title','appointment'),
        'section' => 'tag_banner',
        'type' => 'text',
    )
	);

	/* Search Banner */
	$wp_customize->add_section( 'search_banner' , array(
		'title'      => __('Search', 'appointment'),
		'panel'  => 'banner_page',
   	) );
	
		$wp_customize->add_setting( 'appointment_options[banner_title_search]',
		array(
			'default' => __('Title','appointment'),
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		) );
		
		$wp_customize->add_control( 'appointment_options[banner_title_search]',
		array(
			'label' => __('Title','appointment'),
			'section' => 'search_banner',
			'type' => 'text',
		) );
		
	/* custom texonomy archive page */
	$wp_customize->add_section( 'custom_texonomy_banner' , array(
		'title'      => __('Portfolio category', 'appointment'),
		'panel'  => 'banner_page',
   	) );
	
		$wp_customize->add_setting( 'appointment_options[banner_title_custom_texonomy]',
		array(
			'default' => __('Title','appointment'),
			'sanitize_callback' => 'sanitize_text_field',
			'type' => 'option',
		) );
		
		$wp_customize->add_control( 'appointment_options[banner_title_custom_texonomy]',
		array(
			'label' => __('Title','appointment'),
			'section' => 'custom_texonomy_banner',
			'type' => 'text',
		) );
}
add_action( 'customize_register', 'appointment_banner_page_customizer' );
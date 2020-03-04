<?php
function appointment_header_customizer( $wp_customize ) {
$wp_customize->remove_control('header_textcolor');

/* Header Section */
	$wp_customize->add_panel( 'header_options', array(
		'priority'       => 450,
		'capability'     => 'edit_theme_options',
		'title'      => __('Header settings', 'appointment'),
	) );
	
   	$wp_customize->add_section( 'header_image' , array(
		'title'      => __('Custom header settings', 'appointment'),
		'panel'  => 'header_options',
		'priority'   => 200,
   	) );
	$wp_customize->add_setting(
	'appointment_options[header_one_name]', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control('appointment_options[header_one_name]', array(
        'label'   => __('Header Headline', 'appointment'),
        'section' => 'header_image',
        'type'    => 'text',
		'priority'   => 140,
    ));
	$wp_customize->add_setting('appointment_options[header_one_text]'
		, array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ));
    $wp_customize->add_control( 'appointment_options[header_one_text]', array(
        'label'   => __('Header Text', 'appointment'),
        'section' => 'header_image',
        'type'    => 'text',
		'priority'   => 140,
    ));
	
	//Header logo setting
	$wp_customize->add_section( 'header_logo' , array(
		'title'      => __('Header logo settings', 'appointment'),
		'panel'  => 'header_options',
		'priority'   => 400,
   	) );
	$wp_customize->add_setting(
		'appointment_options[upload_image_logo]'
		, array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
    ));
	
	$wp_customize->add_control(
		   new WP_Customize_Image_Control(
			   $wp_customize,
			   'appointment_options[upload_image_logo]',
			   array(
				   'label'          => __( 'Upload a 150x150 Logo Image', 'appointment' ),
				   'section'        => 'header_logo',
				   'priority'   => 50,
			   )
		   )
	);
	
	//Enable/Disable logo text
	$wp_customize->add_setting(
    'appointment_options[text_title]',array(
	'default'    => 1,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option'
	));

	$wp_customize->add_control(
    'appointment_options[text_title]',
    array(
        'type' => 'checkbox',
        'label' => __('Enable/Disable Logo','appointment'),
        'section' => 'header_logo',
		'priority'   => 100,
    )
	);
	
	
	//Logo width
	
	$wp_customize->add_setting(
    'appointment_options[width]',array(
	'sanitize_callback' => 'sanitize_text_field',
	'default' => 200,
	'type' => 'option',
	
	));

	$wp_customize->add_control(
    'appointment_options[width]',
    array(
        'type' => 'text',
        'label' => __('Enter Logo width','appointment'),
        'section' => 'header_logo',
		'priority'   => 400,
    )
	);
	
	//Logo Height
	$wp_customize->add_setting(
    'appointment_options[height]',array(
	'sanitize_callback' => 'sanitize_text_field',
	'default' => 50,
	'type'=>'option',
	
	));

	$wp_customize->add_control(
    'appointment_options[height]',
    array(
        'type' => 'text',
        'label' => __('Enter Logo height','appointment'),
        'section' => 'header_logo',
		'priority'   =>410,
    )
	);
	
	
	
	//Text logo
	$wp_customize->add_setting(
	'appointment_options[enable_header_logo_text]'
    ,array(
	'default' => 1,
	'sanitize_callback' => 'sanitize_text_field',
	'type' =>'option',
	
	));

	$wp_customize->add_control(
    'appointment_options[enable_header_logo_text]',
    array(
        'type' => 'checkbox',
        'label' => __('Show Logo text','appointment'),
        'section' => 'header_logo',
		'priority'   => 200,
    )
	);
	
	/* favicon option */
    $wp_customize->add_section( 'appoointment_favicon' , array(
      'title'       => __( 'Site Favicon', 'appointment' ),
      'priority'    => 500,
      'description' => __( 'Upload a Favicon', 'appointment' ),
	  'panel'  => 'header_options',
    ) );
    
    $wp_customize->add_setting('appointment_options[upload_image_favicon]', array(
      'sanitize_callback' => 'esc_url_raw',
	   'capability'     => 'edit_theme_options',
	   'type' => 'option', 
    ) );
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'appointment_options[upload_image_favicon]', array(
      'label'    => __( 'Upload a Favicon (ideal width and height is 16x16 or 32x32)', 'appointment' ),
      'section'  => 'appoointment_favicon',
    ) ) );
	
	
	//Header social Icon

	$wp_customize->add_section(
        'header_social_icon',
        array(
            'title' => __('Social links','appointment'),
           'priority'    => 600,
			'panel' => 'header_options',
        )
    );
	
	//Show and hide Header Social Icons
	$wp_customize->add_setting(
	'appointment_options[header_social_media_enabled]'
    ,
    array(
        'default' => 0,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[header_social_media_enabled]',
    array(
        'label' => __('Hide Header Social Icons','appointment'),
        'section' => 'header_social_icon',
        'type' => 'checkbox',
    )
	);

	
	

	// Facebook link
	$wp_customize->add_setting(
    'appointment_options[social_media_facebook_link]',
    array(
        'default' => '#',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'appointment_options[social_media_facebook_link]',
    array(
        'label' => __('Facebook URL','appointment'),
        'section' => 'header_social_icon',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
	'appointment_options[facebook_media_link_target]',array(
	'default' => 1,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	));

	$wp_customize->add_control(
    'appointment_options[facebook_media_link_target]',
    array(
        'type' => 'checkbox',
        'label' => 'Open link in new tab',
        'section' => 'header_social_icon',
    )
);

	//twitter link
	
	$wp_customize->add_setting(
    'appointment_options[social_media_twitter_link]',
    array(
        'default' => '#',
		'type' => 'theme_mod',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'appointment_options[social_media_twitter_link]',
    array(
        'label' => __('Twitter URL','appointment'),
        'section' => 'header_social_icon',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
	'appointment_options[twitter_media_link_target]'
    ,array(
	'default' => 1,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	));

	$wp_customize->add_control(
    'appointment_options[twitter_media_link_target]',
    array(
        'type' => 'checkbox',
        'label' => 'Open link in new tab',
        'section' => 'header_social_icon',
    )
);
	//Linkdin link
	
	$wp_customize->add_setting(
	'appointment_options[social_media_linkedin_link]' ,
    array(
        'default' => '#',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'appointment_options[social_media_linkedin_link]',
    array(
        'label' => __('LinkedIn URL','appointment'),
        'section' => 'header_social_icon',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
	'appointment_options[linkedin_media_link_target]'
	,array(
	'default' => 1,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	));

	$wp_customize->add_control(
    	'appointment_options[linkedin_media_link_target]',
    array(
        'type' => 'checkbox',
        'label' => 'Open link in new tab',
        'section' => 'header_social_icon',
    )
);


//Google-plus link
	
	$wp_customize->add_setting(
	'appointment_options[social_media_googleplus_link]' ,
    array(
        'default' => '#',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'appointment_options[social_media_googleplus_link]',
    array(
        'label' => __('GooglePlus URL','appointment'),
        'section' => 'header_social_icon',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
	'appointment_options[googleplus_media_link_target]'
	,array(
	'default' => 1,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	));

	$wp_customize->add_control(
    	'appointment_options[googleplus_media_link_target]',
    array(
        'type' => 'checkbox',
        'label' => 'Open link in new tab',
        'section' => 'header_social_icon',
    )
);


//instagram link
	
	$wp_customize->add_setting(
	'appointment_options[social_media_instagram_link]' ,
    array(
        'default' => '#',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'appointment_options[social_media_instagram_link]',
    array(
        'label' => __('Instagram URL','appointment'),
        'section' => 'header_social_icon',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
	'appointment_options[instagram_media_link_target]'
	,array(
	'default' => 1,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	));

	$wp_customize->add_control(
    	'appointment_options[instagram_media_link_target]',
    array(
        'type' => 'checkbox',
        'label' => 'Open link in new tab',
        'section' => 'header_social_icon',
    )
);

//Skype link
	
	$wp_customize->add_setting(
	'appointment_options[social_media_skype_link]' ,
    array(
        'default' => '#',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'appointment_options[social_media_skype_link]',
    array(
        'label' => __('Skype URL','appointment'),
        'section' => 'header_social_icon',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
	'appointment_options[skype_media_link_target]'
	,array(
	'default' => 1,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	));

	$wp_customize->add_control(
    	'appointment_options[skype_media_link_target]',
    array(
        'type' => 'checkbox',
        'label' => 'Open link in new tab',
        'section' => 'header_social_icon',
    )
);


//Youtube Link
	
	$wp_customize->add_setting(
	'appointment_options[social_media_youtube_link]' ,
    array(
        'default' => '#',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	
	);
	$wp_customize->add_control(
    'appointment_options[social_media_youtube_link]',
    array(
        'label' => __('YouTube URL','appointment'),
        'section' => 'header_social_icon',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
	'appointment_options[youtube_media_link_target]'
	,array(
	'default' => 1,
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	));

	$wp_customize->add_control(
    	'appointment_options[youtube_media_link_target]',
    array(
        'type' => 'checkbox',
        'label' => 'Open link in new tab',
        'section' => 'header_social_icon',
    )
);



	//Custom css
	$wp_customize->add_section( 'custom_css' , array(
		'title'      => __('Custom CSS', 'appointment'),
		'panel'  => 'header_options',
		'priority'   => 100,
   	) );
	$wp_customize->add_setting(
	'appointment_options[webrit_custom_css]'
		, array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=> 'option',
    ));
    $wp_customize->add_control( 'appointment_options[webrit_custom_css]', array(
        'label'   => __('Custom CSS', 'appointment'),
        'section' => 'custom_css',
        'type' => 'textarea',
		'priority'   => 100,
    ));	
	}
	add_action( 'customize_register', 'appointment_header_customizer' );
	?>
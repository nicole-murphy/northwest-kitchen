<?php
function appointment_client_customizer( $wp_customize ) {
//Front Client section
	
	$wp_customize->add_panel( 'appointment_client_setting', array(
		'priority'       => 800,
		'capability'     => 'edit_theme_options',
		'title'      => __('Client settings', 'appointment'),
	) );
	
	$wp_customize->add_section(
        'client_section_settings',
        array(
            'title' => __('Section Heading','appointment'),
            'description' => '',
			'panel'  => 'appointment_client_setting',)
    );
	
	//Client title
	
	$wp_customize ->add_setting (
	'appointment_options[client_section_enabled]',
	array( 
	'capability'     => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	) );

	$wp_customize->add_control (
	'appointment_options[client_section_enabled]',
	array (  
	'label' => __('Hide client section from homepage','appointment'),
	'section' => 'client_section_settings',
	'type' => 'checkbox',
	) );
	
	
	$wp_customize ->add_setting (
	'appointment_options[client_title]',
	array( 
	'default' => __('We work for the best clients','appointment'),
	'capability'     => 'edit_theme_options',
	'sanitize_callback' => 'appointment_client_sanitize_html',
	'type' => 'option',
	) );

	$wp_customize->add_control (
	'appointment_options[client_title]',
	array (  
	'label' => __('Title','appointment'),
	'section' => 'client_section_settings',
	'type' => 'text',
	) );
	
	//Client Discription
	$wp_customize ->add_setting (
	'appointment_options[client_description]',
	array( 
	'default' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
	'capability'     => 'edit_theme_options',
	'sanitize_callback' => 'appointment_client_sanitize_html',
	'type' => 'option'
	) );

	$wp_customize->add_control (
	'appointment_options[client_description]',
	array (  
	'label' => __('Description','appointment'),
	'section' => 'client_section_settings',
	'type' => 'textarea',
	) );
	
	
	$wp_customize ->add_setting (
	'appointment_options[client_button]',
	array( 
	'default' => __('See case studies','appointment'),
	'capability'     => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	) 
	);

	$wp_customize->add_control (
	'appointment_options[client_button]',
	array (  
	'label' => __('Button Text','appointment'),
	'section' => 'client_section_settings',
	'type' => 'text',
	) );

	$wp_customize ->add_setting (
	'appointment_options[client_button_url]',
	array( 
	'default' => '#',
	'capability'     => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	) );

	$wp_customize->add_control (
	'appointment_options[client_button_url]',
	array (  
	'label' => __('Button Link','appointment'),
	'section' => 'client_section_settings',
	'type' => 'text',
	) );

	$wp_customize->add_setting(
		'appointment_options[client_button_enabled]',
		array('capability'     => 'edit_theme_options',
		'type' => 'option',
		));

	$wp_customize->add_control(
		'appointment_options[client_button_enabled]',
		array(
			'type' => 'checkbox',
			'label' => __('Open link in new tab','appointment'),
			'section' => 'client_section_settings',
		)
	);
	
	// Client section one
	$wp_customize->add_section( 'client_section_one' , array(
		'title'      => __('Client section one', 'appointment'),
		'panel'  => 'appointment_client_setting',
		'priority'   => 200,
   	) );
	
	
	$wp_customize->add_setting( 'appointment_options[client_one_img]', array(
      'sanitize_callback' => 'esc_url_raw',
	  'type' => 'option'
    ) );
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'appointment_options[client_one_img]', array(
      'label'    => __( 'Image', 'appointment' ),
      'section'  => 'client_section_one',
      'settings' => 'appointment_options[client_one_img]',
    ) ) );
	
	//Client section Button link & Address
	$wp_customize ->add_setting (
	'appointment_options[client_img_one_link]',
	array( 
	'default' => '#',
	'capability'     => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	) );

	$wp_customize->add_control (
	'appointment_options[client_img_one_link]',
	array (  
	'label' => __('Link','appointment'),
	'section' => 'client_section_one',
	'type' => 'text',
	) );

	$wp_customize->add_setting(
		'appointment_options[client_img_one_tab]',
		array('capability'     => 'edit_theme_options',
		'type' => 'option',
		'default' => 1,
		));

	$wp_customize->add_control(
		'appointment_options[client_img_one_tab]',
		array(
			'type' => 'checkbox',
			'label' => __('Open link in new tab','appointment'),
			'section' => 'client_section_one',
		)
	);	
	
	//Cliend Section two
	$wp_customize->add_section( 'client_section_two' , array(
		'title'      => __('Client section two', 'appointment'),
		'panel'  => 'appointment_client_setting',
		'priority'   => 300,
   	) );
	
	
	$wp_customize->add_setting( 'appointment_options[client_two_img]', array(
      'sanitize_callback' => 'esc_url_raw',
	  'type' => 'option',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'appointment_options[client_two_img]', array(
      'label'    => __( 'Image', 'appointment' ),
      'section'  => 'client_section_two',
      'settings' => 'appointment_options[client_two_img]',
    ) ) );
	
	//Client section Button link & Address
	$wp_customize ->add_setting (
	'appointment_options[client_img_two_link]',
	array( 
	'default' => '#',
	'capability'     => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	) );

	$wp_customize->add_control (
	'appointment_options[client_img_two_link]',
	array (  
	'label' => __('Link','appointment'),
	'section' => 'client_section_two',
	'type' => 'text',
	) );

	$wp_customize->add_setting(
		'appointment_options[client_img_two_tab]',
		array('capability'     => 'edit_theme_options',
		'type' => 'option',
		'default' => 1 ,
		));

	$wp_customize->add_control(
		'appointment_options[client_img_two_tab]',
		array(
			'type' => 'checkbox',
			'label' => __('Open link in new tab','appointment'),
			'section' => 'client_section_two',
		)
	);
	
	
	// Client section three
	$wp_customize->add_section( 'client_section_three' , array(
		'title'      => __('Client section three', 'appointment'),
		'panel'  => 'appointment_client_setting',
		'priority'   => 300,
   	) );
	
	
	$wp_customize->add_setting( 'appointment_options[client_three_img]', array(
      'sanitize_callback' => 'esc_url_raw',
	  'type' => 'option',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'appointment_options[client_three_img]', array(
      'label'    => __( 'Image', 'appointment' ),
      'section'  => 'client_section_three',
      'settings' => 'appointment_options[client_three_img]',
    ) ) );
	
	//Client section Button link & Address
	$wp_customize ->add_setting (
	'appointment_options[client_img_three_link]',
	array( 
	'default' => '#',
	'capability'     => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	) );

	$wp_customize->add_control (
	'appointment_options[client_img_three_link]',
	array (  
	'label' => __('Link','appointment'),
	'section' => 'client_section_three',
	'type' => 'text',
	) );

	$wp_customize->add_setting(
		'appointment_options[client_img_three_tab]',
		array('capability'     => 'edit_theme_options',
		'type' => 'option',
		'default' => 1 ,
		));

	$wp_customize->add_control(
		'appointment_options[client_img_three_tab]',
		array(
			'type' => 'checkbox',
			'label' => __('Open link in new tab','appointment'),
			'section' => 'client_section_three',
		)
	);
	
	
	// Client section Four
	$wp_customize->add_section( 'client_section_four' , array(
		'title'      => __('Client section four', 'appointment'),
		'panel'  => 'appointment_client_setting',
		'priority'   => 300,
   	) );
	
	
	$wp_customize->add_setting( 'appointment_options[client_four_img]', array(
      'sanitize_callback' => 'esc_url_raw',
	  'type' => 'option',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'appointment_options[client_four_img]', array(
      'label'    => __( 'Image', 'appointment' ),
      'section'  => 'client_section_four',
      'settings' => 'appointment_options[client_four_img]',
    ) ) );
	
	//Client section Button link & Address
	$wp_customize ->add_setting (
	'appointment_options[client_img_four_link]',
	array( 
	'default' => '#',
	'capability'     => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	) );

	$wp_customize->add_control (
	'appointment_options[client_img_four_link]',
	array (  
	'label' => __('Link','appointment'),
	'section' => 'client_section_four',
	'type' => 'text',
	) );

	$wp_customize->add_setting(
		'appointment_options[client_img_four_tab]',
		array('capability'     => 'edit_theme_options',
		'type' => 'option',
		'default' => 1,
		));

	$wp_customize->add_control(
		'appointment_options[client_img_four_tab]',
		array(
			'type' => 'checkbox',
			'label' => __('Open link in new tab','appointment'),
			'section' => 'client_section_four',
		)
	);
	
	
	// Client section Five
	$wp_customize->add_section( 'client_section_five' , array(
		'title'      => __('Client section five', 'appointment'),
		'panel'  => 'appointment_client_setting',
		'priority'   => 300,
   	) );
	
	
	$wp_customize->add_setting( 'appointment_options[client_five_img]', array(
      'sanitize_callback' => 'esc_url_raw',
	  'type' => 'option',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'appointment_options[client_five_img]', array(
      'label'    => __( 'Image', 'appointment' ),
      'section'  => 'client_section_five',
      'settings' => 'appointment_options[client_five_img]',
    ) ) );
	
	//Client section Button link & Address
	$wp_customize ->add_setting (
	'appointment_options[client_img_five_link]',
	array( 
	'default' => '#',
	'capability'     => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	) );

	$wp_customize->add_control (
	'appointment_options[client_img_five_link]',
	array (  
	'label' => __('Link','appointment'),
	'section' => 'client_section_five',
	'type' => 'text',
	) );

	$wp_customize->add_setting(
		'appointment_options[client_img_five_tab]',
		array('capability'     => 'edit_theme_options',
		'type' => 'option',
		'default' => 1,
		));

	$wp_customize->add_control(
		'appointment_options[client_img_five_tab]',
		array(
			'type' => 'checkbox',
			'label' => __('Open link in new tab','appointment'),
			'section' => 'client_section_five',
		)
	);
	
		// Client section Six
	$wp_customize->add_section( 'client_section_six' , array(
		'title'      => __('Client section six', 'appointment'),
		'panel'  => 'appointment_client_setting',
		'priority'   => 300,
   	) );
	
	
	$wp_customize->add_setting( 'appointment_options[client_six_img]', array(
      'sanitize_callback' => 'esc_url_raw',
	  'type' => 'option',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'appointment_options[client_six_img]', array(
      'label'    => __( 'Image', 'appointment' ),
      'section'  => 'client_section_six',
      'settings' => 'appointment_options[client_six_img]',
    ) ) );
	
	//Client section Button link & Address
	$wp_customize ->add_setting (
	'appointment_options[client_img_six_link]',
	array( 
	'default' => '#',
	'capability'     => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	) );

	$wp_customize->add_control (
	'appointment_options[client_img_six_link]',
	array (  
	'label' => __('Link','appointment'),
	'section' => 'client_section_six',
	'type' => 'text',
	) );

	$wp_customize->add_setting(
		'appointment_options[client_img_six_tab]',
		array('capability'     => 'edit_theme_options',
		'type' => 'option',
		'default' => 1,
		));

	$wp_customize->add_control(
		'appointment_options[client_img_six_tab]',
		array(
			'type' => 'checkbox',
			'label' => __('Open link in new tab','appointment'),
			'section' => 'client_section_six',
		)
	);
	
	// Client section seven
	$wp_customize->add_section( 'client_section_seven' , array(
		'title'      => __('Client section seven', 'appointment'),
		'panel'  => 'appointment_client_setting',
		'priority'   => 300,
   	) );
	
	
	$wp_customize->add_setting( 'appointment_options[client_seven_img]', array(
      'sanitize_callback' => 'esc_url_raw',
	  'type' => 'option',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'appointment_options[client_seven_img]', array(
      'label'    => __( 'Image', 'appointment' ),
      'section'  => 'client_section_seven',
      'settings' => 'appointment_options[client_seven_img]',
    ) ) );
	
	
	
	//Client section Button link & Address
	$wp_customize ->add_setting (
	'appointment_options[client_img_seven_link]',
	array( 
	'default' => '#',
	'capability'     => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	) );

	$wp_customize->add_control (
	'appointment_options[client_img_seven_link]',
	array (  
	'label' => __('Link','appointment'),
	'section' => 'client_section_seven',
	'type' => 'text',
	) );

	$wp_customize->add_setting(
		'appointment_options[client_img_seven_tab]',
		array('capability'     => 'edit_theme_options',
		'type' => 'option',
		'default' => 1,
		));

	$wp_customize->add_control(
		'appointment_options[client_img_seven_tab]',
		array(
			'type' => 'checkbox',
			'label' => __('Open link in new tab','appointment'),
			'section' => 'client_section_seven',
		)
	);
	
	// Client section Eight
	$wp_customize->add_section( 'client_section_eight' , array(
		'title'      => __('Client section eight', 'appointment'),
		'panel'  => 'appointment_client_setting',
		'priority'   => 300,
   	) );
	
	
	$wp_customize->add_setting( 'appointment_options[client_eight_img]', array(
      'sanitize_callback' => 'esc_url_raw',
	  'type' => 'option',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'appointment_options[client_eight_img]', array(
      'label'    => __( 'Image', 'appointment' ),
      'section'  => 'client_section_eight',
      'settings' => 'appointment_options[client_eight_img]',
    ) ) );
	
	//Client section Button link & Address
	$wp_customize ->add_setting (
	'appointment_options[client_img_eight_link]',
	array( 
	'default' => '#',
	'capability'     => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	) );

	$wp_customize->add_control (
	'appointment_options[client_img_eight_link]',
	array (  
	'label' => __('Link','appointment'),
	'section' => 'client_section_eight',
	'type' => 'text',
	) );

	$wp_customize->add_setting(
		'appointment_options[client_img_eight_tab]',
		array('capability'     => 'edit_theme_options',
		'type' => 'option',
		'default' => 1,
		));

	$wp_customize->add_control(
		'appointment_options[client_img_eight_tab]',
		array(
			'type' => 'checkbox',
			'label' => __('Open link in new tab','appointment'),
			'section' => 'client_section_eight',
		)
	);
	
	function appointment_client_sanitize_html( $input ) {
    return force_balance_tags( $input );
	}
	}
	add_action( 'customize_register', 'appointment_client_customizer' );
	?>
<?php
function appointment_footer_callout_customizer( $wp_customize ) {

	//Home call out

	$wp_customize->add_panel( 'appointment_footer_callout_setting', array(
		'priority'       => 820,
		'capability'     => 'edit_theme_options',
		'title'      => __('Footer callout settings', 'appointment'),
	) );
	
	//Contact Information Setting
	$wp_customize->add_section(
        'footer_callout_settings',
        array(
            'title' => __('Footer callout settings','appointment'),
            'description' => '',
			'panel'  => 'appointment_footer_callout_setting',)
    );
	
	
	//Hide Index footer callout Section
	
	$wp_customize->add_setting(
    'appointment_options[front_callout_enable]',
    array(
        'default' => '',
		'capability'     => 'edit_theme_options',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[front_callout_enable]',
    array(
        'label' => __('Hide footer callout','appointment'),
        'section' => 'footer_callout_settings',
        'type' => 'checkbox',
    )
	);
	
	//Form title
	$wp_customize->add_setting(
    'appointment_options[front_contact_title]',
    array(
        'default' => __('Stay in touch with us','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_footer_callout_sanitize_html',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control( 'appointment_options[front_contact_title]',array(
    'label'   => __('Callout Header','appointment'),
    'section' => 'footer_callout_settings',
	 'type' => 'text',)  );
	 
	 //Footer callout Call-us
	 $wp_customize->add_setting(
		'appointment_options[contact_one_icon]', array(
        'default'        => 'fa-phone',
        'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_footer_callout_sanitize_html',
		'type' =>'option',
    ));
	
	$wp_customize->add_control('appointment_options[contact_one_icon]', array(
        'label'   => __('Icon', 'appointment'),
        'section' => 'footer_callout_settings',
        'type'    => 'text',
    ));		
		
	$wp_customize->add_setting(
    'appointment_options[front_contact1_title]',
    array(
        'default' => __('Have a question? Call us now','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_footer_callout_sanitize_html',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[front_contact1_title]',
    array(
        'label' => __('Title','appointment'),
        'section' => 'footer_callout_settings',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
    'appointment_options[front_contact1_val]',
    array(
        'default' => '+82 334 843 52',
		 'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_footer_callout_sanitize_html',
		 'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[front_contact1_val]',
    array(
        'label' => __('Description','appointment'),
        'section' => 'footer_callout_settings',
        'type' => 'text',	
    )
);


//callout Time
	 $wp_customize->add_setting(
		'appointment_options[contact_two_icon]', array(
        'default'        => 'fa-clock-o',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
    ));
	
	$wp_customize->add_control( 'appointment_options[contact_two_icon]', array(
        'label'   => __('Icon', 'appointment'),
        'section' => 'footer_callout_settings',
        'type'    => 'text',
    ));		
		
	$wp_customize->add_setting(
    'appointment_options[front_contact2_title]',
    array(
        'default' => __('We are open Mon - Fri','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_footer_callout_sanitize_html',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[front_contact2_title]',
    array(
        'label' => __('Title','appointment'),
        'section' => 'footer_callout_settings',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
    'appointment_options[front_contact2_val]',
    array(
        'default' => __(': Mon - Fri : 08.00 - 18.00','appointment'),
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'appointment_footer_callout_sanitize_html',
		 'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[front_contact2_val]',
    array(
        'label' => __('Description','appointment'),
        'section' => 'footer_callout_settings',
        'type' => 'text',	
    )
);

	//Contact Email Setting 
	
	$wp_customize->add_setting(
		'appointment_options[contact_three_icon]', array(
        'default'        => 'fa-envelope',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
    ));
	
	$wp_customize->add_control( 'appointment_options[contact_three_icon]', array(
        'label'   => __('Icon', 'appointment'),
        'section' => 'footer_callout_settings',
        'type'    => 'text',
    ));		
		
	$wp_customize->add_setting(
    'appointment_options[front_contact3_title]',
    array(
        'default' => __('Drop us a mail','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_footer_callout_sanitize_html',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[front_contact3_title]',
    array(
        'label' => __('Title','appointment'),
        'section' => 'footer_callout_settings',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
    'appointment_options[front_contact3_val]',
    array(
        'default' => 'info@yoursupport.com',
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'appointment_footer_callout_sanitize_html',
		 'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[front_contact3_val]',
    array(
        'label' => __('Description','appointment'),
        'section' => 'footer_callout_settings',
        'type' => 'text',	
    )
);
function appointment_footer_callout_sanitize_html( $input ) {

    return force_balance_tags( $input );

}

	
	}
	add_action( 'customize_register', 'appointment_footer_callout_customizer' );
	?>
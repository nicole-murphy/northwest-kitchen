<?php
function appointment_testimonial_customizer( $wp_customize ) {

//Home project Section
	$wp_customize->add_panel( 'appointment_test_setting', array(
		'priority'       => 750,
		'capability'     => 'edit_theme_options',
		'title'      => __('Testimonials settings','appointment'),
	) );
	
	$wp_customize->add_section(
        'test_section_settings',
        array(
            'title' => __('Homepage testimonial settings','appointment'),
            'description' => '',
			'panel'  => 'appointment_test_setting',)
    );
	//Hide testimonial
	$wp_customize->add_setting(
    'appointment_options[hide_testimonial]',
    array(
        'default' => 0,
		'capability'     => 'edit_theme_options',
		'type'=> 'option',
    )	
	);
	$wp_customize->add_control(
     'appointment_options[hide_testimonial]',
    array(
        'label' => __('Hide testimonials from homepage','appointment'),
        'section' => 'test_section_settings',
        'type' => 'checkbox',
    )
	);
	
	
	// add section to manage callout
	$wp_customize->add_setting(
    'appointment_options[testimonial_title]',
    array(
        'default' => __('What our clients say','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_front_testimonial_sanitize_html',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control( 'appointment_options[testimonial_title]',array(
    'label'   => __('Title','appointment'),
    'section' => 'test_section_settings',
	 'type' => 'text',)  );	
	 
	 
	 $wp_customize->add_setting(
    'appointment_options[testimonial_description]',
    array(
        'default' => __('Read what our customers are saying:','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_front_testimonial_sanitize_html',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control( 'appointment_options[testimonial_description]',array(
    'label'   => __('Description','appointment'),
    'section' => 'test_section_settings',
	 'type' => 'text',)  );	
	 
	 
	 
	//Testimonial animation
	
	$wp_customize->add_setting(
    'appointment_options[testi_slide_type]',
    array(
        'default' => 'slide',
		'type' => 'option',
    )
	);

	$wp_customize->add_control(
    'appointment_options[testi_slide_type]',
    array(
        'type' => 'select',
        'label' => __('Animation','appointment'),
        'section' => 'test_section_settings',
		 'choices' => array('slide'=>__('Slide', 'appointment'), 'carousel-fade'=>__('Fade', 'appointment')),
		));
	 
	 
	 
	 
	 //Testimonail Animation duration

	$wp_customize->add_setting(
    'appointment_options[testi_transition_delay]',
    array(
        'default' => __('2000','appointment'),
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )
	);

	$wp_customize->add_control(
    'appointment_options[testi_transition_delay]',
    array(
        'type' => 'text',
		'description' => __('If the transition-delay value is 2000, this means 2 seconds.','appointment'),
        'label' => __('Duration','appointment'),
        'section' => 'test_section_settings',
		
		));
		
		
	//Testimonail link
	class WP_testmonial_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
    <a href="<?php bloginfo ( 'url' );?>/wp-admin/edit.php?post_type=webriti_testimonial" class="button"  target="_blank"><?php _e( 'Click here to add testimonial', 'appointment' ); ?></a>
    <?php
    }
}

	$wp_customize->add_setting(
		'testimonial',
		array(
			'default' => '',
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)	
	);
	$wp_customize->add_control( new WP_testmonial_Customize_Control( $wp_customize, 'testimonial', array(	
			'section' => 'test_section_settings',
		))
	);
	
	// testimonial Background image
    $wp_customize->add_setting( 'appointment_options[testi_background]', array(
		'default' => get_template_directory_uri() . '/images/bg2.jpg',
		'sanitize_callback' => 'esc_url_raw',
		'type' => 'option',
    ) );
    
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'appointment_options[testi_background]', array(
      'label'    => __( 'Background Image', 'appointment' ),
      'section'  => 'test_section_settings',
      'settings' => 'appointment_options[testi_background]',
    ) ) );
	
	// testimonial Background attachment
	$wp_customize->add_setting( 'appointment_options[testi_attachment]', array(
		'default' => 'fixed',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ) );
    
    $wp_customize->add_control('appointment_options[testi_attachment]', array(
		'label'    => __( 'Background attachment', 'appointment' ),
		'section'  => 'test_section_settings',
		'type' => 'select',
		'choices' => array(
			'fixed'=>'fixed',
			'scroll'=>'scroll',
	) ) );
	
	// overlay
	$wp_customize->add_setting( 'appointment_options[testi_overlay]', array(
		'default' => true,
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ) );
    
    $wp_customize->add_control('appointment_options[testi_overlay]', array(
		'label'    => __( 'Enable overlay', 'appointment' ),
		'section'  => 'test_section_settings',
		'type' => 'checkbox',
	) );
	
	function appointment_front_testimonial_sanitize_html( $input ) {
    return force_balance_tags( $input );
	}
	
}
add_action( 'customize_register', 'appointment_testimonial_customizer' );
?>
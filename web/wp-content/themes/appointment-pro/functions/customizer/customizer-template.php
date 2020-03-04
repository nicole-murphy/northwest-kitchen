<?php
function appointment_template_customizer( $wp_customize ) {
//Template panel 
	$wp_customize->add_panel( 'appointment_template', array(
		'priority'       => 920,
		'capability'     => 'edit_theme_options',
		'title'      => __('Template settings', 'appointment'),
	) );
	
	// add section to manage About
	$wp_customize->add_section(
        'about_section_settings',
        array(
            'title' => __('About Us page settings','appointment'),
            'description' => '',
			'panel'  => 'appointment_template',
			'priority'   => 100,
			
			)
    );
	
	// enable/disable Team Section
	$wp_customize->add_setting(
		'appointment_options[team_section_enable]',
		array('capability'  => 'edit_theme_options',
		'type' => 'option',
		));

	$wp_customize->add_control(
		'appointment_options[team_section_enable]',
		array(
			'type' => 'checkbox',
			'label' => __('Hide team section from About Us page','appointment'),
			'section' => 'about_section_settings',
		)
	);
	  
	 //Team Title  
	 $wp_customize->add_setting(
    'appointment_options[about_team_title]',
    array(
        'default' => __('Meet our great team','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_sanitize_html',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control( 'appointment_options[about_team_title]',array(
    'label'   => __('Title','appointment'),
    'section' => 'about_section_settings',
	 'type' => 'text',)  );	
	 
	 //Team Description
	  $wp_customize->add_setting(
    'appointment_options[about_team_description]',
    array(
        'default' => __('We create themes with our customers in mind, therefore our team works hard to provide you with the best technical support.','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option' , 
		)
	);	
	$wp_customize->add_control( 'appointment_options[about_team_description]',array(
    'label'   => __('Description','appointment'),
    'section' => 'about_section_settings',
	 'type' => 'text',)  );	
	 
	 // Add Team link
	 
	 class WP_team_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
    <a href="<?php bloginfo ( 'url' );?>/wp-admin/edit.php?post_type=appointment_team" class="button"  target="_blank"><?php _e( 'Click here to add team member', 'appointment' ); ?></a>
    <?php
    }
}


$wp_customize->add_setting(
    'team',
    array(
        'default' => '',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
);
$wp_customize->add_control( new WP_team_Customize_Control( $wp_customize, 'team', array(	
		'section' => 'about_section_settings',
    ))
);
	 
	 
	 
	 // enable/disable client section
	$wp_customize->add_setting(
		'appointment_options[client_section_enable]',
		array('capability'  => 'edit_theme_options',
		'type' => 'option',
		));

	$wp_customize->add_control(
		'appointment_options[client_section_enable]',
		array(
			'type' => 'checkbox',
			'label' => __('Hide client section from About Us page','appointment'),
			'section' => 'about_section_settings',
		)
	);
	 
	 
	 // enable/disable Footer contact section
	$wp_customize->add_setting(
		'appointment_options[footer_callout_section_enable]',
		array('capability'  => 'edit_theme_options',
		'type' => 'option',
		));

	$wp_customize->add_control(
		'appointment_options[footer_callout_section_enable]',
		array(
			'type' => 'checkbox',
			'label' => __('Hide footer callout','appointment'),
			'section' => 'about_section_settings',
		)
	);
	 
	 
	 //enable/disable blog post meta content
	$wp_customize->add_section( 'blog_template' , array(
		'title'      => __('Blog page settings', 'appointment'),
		'panel'  => 'appointment_template',
		'priority'   => 150,
   	) );
	
	$wp_customize->add_setting(
    'appointment_options[blog_meta_section_settings]',
    array(
        'default' => 0,
		'capability'     => 'edit_theme_options',
		'type' => 'option',
		
    )	
	);
	$wp_customize->add_control(
    'appointment_options[blog_meta_section_settings]',
    array(
        'label' => __('Hide post meta from blog pages, archive pages, categories, author, etc.','appointment'),
        'section' => 'blog_template',
        'type' => 'checkbox',
    )
	);
	
	
	//Blog Masonry Layout setting
	
	$wp_customize->add_setting('appointment_options[blog_masonry_column_layout]',array(
	'default' => 3,
	'type' => 'option',
	'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control('appointment_options[blog_masonry_column_layout]',array(
	'type' => 'select',
	'label' => __('Select Blog Masonry column layout','appointment'),
	'section' => 'blog_template',
	'choices' => array(1=>'1',2=> '2',3=>'3','4'=>4, 5 => '5', 6 => '6'),
	) );
	
	
	// add section to manage Setting
	$wp_customize->add_section(
        'setting_section_settings',
        array(
            'title' => __('Service page settings','appointment'),
            'description' => '',
			'panel'  => 'appointment_template',
			'priority'   => 100,
			
			)
    );
	
	// Hide testimonial on settings page
	$wp_customize->add_setting(
    'appointment_options[hide_testimonial_setting]',
    array(
        'default' => '',
		'capability'     => 'edit_theme_options',
		'type' => 'option',
		));
		
	$wp_customize->add_control(
    'appointment_options[hide_testimonial_setting]',
    array(
        'label' => __('Hide Testimonial section','appointment'),
        'section' => 'setting_section_settings',
        'type' => 'checkbox',
    )
	);
	
	//Hide client section on setting page
	
	$wp_customize->add_setting(
    'appointment_options[hide_client_setting]',
    array(
        'default' => '',
		'capability'     => 'edit_theme_options',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[hide_client_setting]',
    array(
        'label' => __('Hide Client section','appointment'),
        'section' => 'setting_section_settings',
        'type' => 'checkbox',
    )
	);
	
	//Hide contact footer calout on setting page 
	
	$wp_customize->add_setting(
    'appointment_options[hide_footer_callout_setting]',
    array(
        'default' => '',
		'capability'     => 'edit_theme_options',
		'type' => 'option',)	
	);
	$wp_customize->add_control(
    'appointment_options[hide_footer_callout_setting]',
    array(
        'label' => __('Hide footer callout','appointment'),
        'section' => 'setting_section_settings',
        'type' => 'checkbox',
    )
	);
	
	// add section to manage contact page
	$wp_customize->add_section(
        'contact_section_settings',
        array(
            'title' => __('Contact page setting','appointment'),
            'description' => '',
			'panel'  => 'appointment_template',)
    );
		
	//Form title
	$wp_customize->add_setting(
    'appointment_options[send_usmessage]',
    array(
        'default' => __('Send us a message','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_sanitize_html',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control( 'appointment_options[send_usmessage]',array(
    'label'   => __('Contact form title','appointment'),
    'section' => 'contact_section_settings',
	 'type' => 'text',)  );	
	
	// enable/disable google map
	$wp_customize->add_setting(
		'appointment_options[contact_google_map_enabled]',
		array('capability'  => 'edit_theme_options',
		'type' => 'option',
		));

	$wp_customize->add_control(
		'appointment_options[contact_google_map_enabled]',
		array(
			'type' => 'checkbox',
			'label' => __('Hide Google Map','appointment'),
			'section' => 'contact_section_settings',
		)
	);

	
	 //Google map
	 $wp_customize->add_setting(
    'appointment_options[contact_google_title]',
    array(
        'default' => __('Find the address','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_sanitize_html',
		'type' => 'option'
		)
	);	
	$wp_customize->add_control( 'appointment_options[contact_google_title]',array(
    'label'   => __('Contact Google Map title','appointment'),
    'section' => 'contact_section_settings',
	 'type' => 'text',)  );	
	 
	 
	 //Google Map URL
	 $wp_customize->add_setting(
    'appointment_options[contact_google_map_url]',
    array(
        'default' => 'https://maps.google.co.in/maps?f=q&source=s_q&hl=en&geocode=&q=Kota+Industrial+Area,+Kota,+Rajasthan&aq=2&oq=kota+&sll=25.003049,76.117499&sspn=0.020225,0.042014&t=h&ie=UTF8&hq=&hnear=Kota+Industrial+Area,+Kota,+Rajasthan&z=13&ll=25.142832,75.879538',
		'capability'     => 'edit_theme_options',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control( 'appointment_options[contact_google_map_url]',array(
    'label'   => __('Google Map URL','appointment'),
    'section' => 'contact_section_settings',
	 'type' => 'textarea',)  );
	 
	 
	 // Add Team link
	 
	 class WP_map_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
    <a href="http://maps.google.com/" class="button"  target="_blank"><?php _e( 'Click here to add Google Map', 'appointment' ); ?></a>
    <?php
    }
}

		$wp_customize->add_setting(
    'map',
    array(
        'default' => '',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
    )	
);
$wp_customize->add_control( new WP_map_Customize_Control( $wp_customize, 'map', array(	
		'section' => 'contact_section_settings',
    ))
);
	 
	//Contact Information Setting
	$wp_customize->add_section(
        'contact_info_settings',
        array(
            'title' => __('Contact information settings','appointment'),
            'description' => '',
			'panel'  => 'appointment_template',)
    );
	
	// enable/disable Contact info setting
	$wp_customize->add_setting(
		'appointment_options[contact-callout-enable]',
		array('capability'  => 'edit_theme_options',
		'type' => 'option',
		));

	$wp_customize->add_control(
		'appointment_options[contact-callout-enable]',
		array(
			'type' => 'checkbox',
			'label' => __('Hide Contact Info section from Contact page','appointment'),
			'section' => 'contact_info_settings',
		)
	);
	//Form title
	$wp_customize->add_setting(
    'appointment_options[contact_title]',
    array(
        'default' => __('Contact Info','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_sanitize_html',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control( 'appointment_options[contact_title]',array(
    'label'   => __('Section title','appointment'),
    'section' => 'contact_info_settings',
	 'type' => 'text',)  );
	 
	 //Form Decription
	 
	 $wp_customize->add_setting(
    'appointment_options[contact_description]',
    array(
        'default' => __('Read what our customers are saying:','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option'
		)
	);	
	$wp_customize->add_control( 'appointment_options[contact_description]',array(
    'label'   => __('Section description','appointment'),
    'section' => 'contact_info_settings',
	 'type' => 'text',)  );
	 
	 //Contact Call-us
	 $wp_customize->add_setting(
		'appointment_options[contact_call_icon]', array(
        'default'        => 'fa-phone',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
    ));
	
	$wp_customize->add_control( 'appointment_options[contact_call_icon]', array(
        'label'   => __('Icon', 'appointment'),
        'section' => 'contact_info_settings',
        'type'    => 'text',
    ));		
		
	$wp_customize->add_setting(
    'appointment_options[contact_call_title]',
    array(
        'default' => __('Have a question? Call us now','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_sanitize_html',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[contact_call_title]',
    array(
        'label' => __('Title','appointment'),
        'section' => 'contact_info_settings',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
    'appointment_options[contact_call_description]',
    array(
        'default' => '+82 334 843 52',
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'sanitize_text_field',
		 'type' => 'option'
    )	
	);
	$wp_customize->add_control(
    'appointment_options[contact_call_description]',
    array(
        'label' => __('Description','appointment'),
        'section' => 'contact_info_settings',
        'type' => 'text',	
    )
);


//Contact Address
	 $wp_customize->add_setting(
		'appointment_options[contact_add_icon]', array(
        'default'        => 'fa-map-marker',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
    ));
	
	$wp_customize->add_control( 'appointment_options[contact_add_icon]', array(
        'label'   => __('Icon', 'appointment'),
        'section' => 'contact_info_settings',
        'type'    => 'text',
    ));		
		
	$wp_customize->add_setting(
    'appointment_options[contact_add_title]',
    array(
        'default' => __('Our office location','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_sanitize_html',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[contact_add_title]',
    array(
        'label' => __('Title','appointment'),
        'section' => 'contact_info_settings',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
    'appointment_options[contact_add_description]',
    array(
        'default' => '3108 Evergreen Lane Washington, (USA) 90032',
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'sanitize_text_field',
		 'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[contact_add_description]',
    array(
        'label' => __('Description','appointment'),
        'section' => 'contact_info_settings',
        'type' => 'text',
    )
);

	//Contact Email Setting 
	
	$wp_customize->add_setting(
		'appointment_options[contact_mail_icon]', array(
        'default'        => 'fa-envelope',
        'capability'     => 'edit_theme_options',
		'type' => 'option',
    ));
	
	$wp_customize->add_control( 'appointment_options[contact_mail_icon]', array(
        'label'   => __('Icon', 'appointment'),
        'section' => 'contact_info_settings',
        'type'    => 'text',
    ));		
		
	$wp_customize->add_setting(
    'appointment_options[contact_mail_title]',
    array(
        'default' => __('Drop us a mail','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_sanitize_html',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[contact_mail_title]',
    array(
        'label' => __('Title','appointment'),
        'section' => 'contact_info_settings',
        'type' => 'text',
    )
	);

	$wp_customize->add_setting(
    'appointment_options[contact_mail_description]',
    array(
        'default' => 'info@yoursupport.com',
		 'capability'     => 'edit_theme_options',
		 'sanitize_callback' => 'sanitize_text_field',
		 'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[contact_mail_description]',
    array(
        'label' => __('Description','appointment'),
        'section' => 'contact_info_settings',
        'type' => 'text',	
    )
);
	
	
	
	
	
	//Contact Callout
	$wp_customize->add_section(
        'contact_callout_settings',
        array(
            'title' => __('Contact callout settings','appointment'),
            'description' => '',
			'panel'  => 'appointment_template',)
    );
	
	
	
	// enable/disable Contact Form Setting
	$wp_customize->add_setting(
		'appointment_options[check_contact_callout]',
		array('capability'  => 'edit_theme_options',
		'type'=> 'option',
			
		));

	$wp_customize->add_control(
		'appointment_options[check_contact_callout]',
		array(
			'type' => 'checkbox',
			'label' => __('Hide contact callout from Contact Page','appointment'),
			'section' => 'contact_callout_settings',
		)
	);
	
	//Form title
	$wp_customize->add_setting(
    'appointment_options[contact_callout_title]',
    array(
        'default' => __('Contact Info','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_sanitize_html',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control( 'appointment_options[contact_callout_title]',array(
    'label'   => __('Title','appointment'),
    'section' => 'contact_callout_settings',
	 'type' => 'text',)  );
	 
	 //Form Decription
	 
	 $wp_customize->add_setting(
    'appointment_options[contact_callout_description]',
    array(
        'default' => __('Be creative with our template, there are hundreds of options and possibilities. Do not miss this unique opportunity to profit from this great template.','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control( 'appointment_options[contact_callout_description]',array(
    'label'   => __('Description','appointment'),
    'section' => 'contact_callout_settings',
	 'type' => 'text',)  );
	 
	 
	 $wp_customize ->add_setting (
	'appointment_options[contact_callout_button]',
	array( 
	'default' => __('Purchase Now','appointment'),
	'capability'     => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field' ,
	'type' => 'option',
	) 
	);

	$wp_customize->add_control (
	'appointment_options[contact_callout_button]',
	array (  
	'label' => __('Button Text','appointment'),
	'section' => 'contact_callout_settings',
	'type' => 'text',
	) );
	
	
	$wp_customize ->add_setting (
	'appointment_options[contact_callout_button_link]',
	array( 
	'default' => '#',
	'capability'     => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
	) );

	$wp_customize->add_control (
	'appointment_options[contact_callout_button_link]',
	array (  
	'label' => __('Button Link','appointment'),
	'section' => 'contact_callout_settings',
	'type' => 'text',
	) );

	$wp_customize->add_setting(
		'appointment_options[contact_callout_link_target]',
		array('capability'     => 'edit_theme_options',
		'default' => 1,
		'type' => 'option',
		));

	$wp_customize->add_control(
		'appointment_options[contact_callout_link_target]',
		array(
			'type' => 'checkbox',
			'label' => __('Open link in new tab','appointment'),
			'section' => 'contact_callout_settings',
	) );
	
	// section background image
		$wp_customize->add_setting( 'appointment_options[contact_callout_back]', array(
		  'sanitize_callback' => 'esc_url_raw',
		  'type' => 'option',
		  'default' => WEBRITI_TEMPLATE_DIR_URI . "/images/bg2.jpg",
		) );
		
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'appointment_options[contact_callout_back]', array(
		  'label'    => __( 'Background Image', 'appointment' ),
		  'section'  => 'contact_callout_settings',
		  'settings' => 'appointment_options[contact_callout_back]',
		) ) );
		
	// Background Position
	$wp_customize->add_setting( 'appointment_options[contact_attachment]', array(
		'default' => 'fixed',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ) );
    
    $wp_customize->add_control('appointment_options[contact_attachment]', array(
		'label'    => __( 'Background Position', 'appointment' ),
		'section'  => 'contact_callout_settings',
		'type' => 'select',
		'choices' => array(
			'fixed'=>'fixed',
			'scroll'=>'scroll',
	) ) );
	
	// overlay
	$wp_customize->add_setting( 'appointment_options[contact_overlay]', array(
		'default' => true,
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    ) );
    
    $wp_customize->add_control('appointment_options[contact_overlay]', array(
		'label'    => __( 'Enable overlay', 'appointment' ),
		'section'  => 'contact_callout_settings',
		'type' => 'checkbox',
	) );
	
	function appointment_sanitize_html( $input ) {

		return force_balance_tags( $input );

	}
}
add_action( 'customize_register', 'appointment_template_customizer' );
?>
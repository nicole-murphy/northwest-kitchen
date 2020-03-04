<?php
function appointment_project_customizer( $wp_customize ) {

//Home project Section
	$wp_customize->add_panel( 'appointment_project_setting', array(
		'priority'       => 700,
		'capability'     => 'edit_theme_options',
		'title'      => __('Project settings', 'appointment'),
	) );
	
	$wp_customize->add_section(
        'project_section_settings',
        array(
            'title' => __('Homepage project settings','appointment'),
            'description' => '',
			'panel'  => 'appointment_project_setting',)
    );
	
	
	//Hide Index project Section
	
	$wp_customize->add_setting(
    'appointment_options[portfolio_section_enabled]',
    array(
        'default' => '',
		'capability'  => 'edit_theme_options',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[portfolio_section_enabled]',
    array(
        'label' => __('Hide project section from homepage','appointment'),
        'section' => 'project_section_settings',
        'type' => 'checkbox',
    )
	);
	
	
	// add section to manage Project
	$wp_customize->add_setting(
    'appointment_options[portfolio_title]',
    array(
        'default' => __('Latest projects','appointment'),
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_project_sanitize_html',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control('appointment_options[portfolio_title]',array(
    'label'   => __('Title','appointment'),
    'section' => 'project_section_settings',
	 'type' => 'text',)  );	
	 
	 
	 $wp_customize->add_setting(
    'appointment_options[portfolio_description]',
    array(
        'default' =>'Maecenas a mi nibh, eu euismod orc vivamus viverra lacus vitae tortor molestie malesuada. eu euismod orci. Vivamus viverra lacus vitae tortor molestie.',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'appointment_project_sanitize_html',
		'type' => 'option',
		)
	);	
	$wp_customize->add_control( 'appointment_options[portfolio_description]',array(
    'label'   => __('Description','appointment'),
    'section' => 'project_section_settings',
	 'type' => 'text',)  );


	$wp_customize->add_setting(
     'appointment_options[portfolio_selected_category_id]',
    array(
       'capability'     => 'edit_theme_options',
	   'type' => 'option',
		)
	);	
	$wp_customize->add_control( new Taxonomy_Dropdown_Custom_Control( $wp_customize, 'appointment_options[portfolio_selected_category_id]', array(
    'label'   => __('Select category for project','appointment'),
    'section' => 'project_section_settings',
    'settings'   => 'appointment_options[portfolio_selected_category_id]',
	'sanitize_callback' => 'sanitize_text_field',
	) ) );
	
	//Number of projects
	$wp_customize->add_setting(
    'appointment_options[portfolio_list]',
    array(
        'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )
	);

	$wp_customize->add_control(
    'appointment_options[portfolio_list]',
    array(
        'type' => 'text',
        'label' => __('Input number of projects','appointment'),
        'section' => 'project_section_settings',)
		);
	

		//link
		
class WP_Review_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
    ?>
    <a href="<?php bloginfo ( 'url' );?>/wp-admin/edit.php?post_type=appoint_portfolio" class="button"  target="_blank"><?php _e( 'Click here to add project', 'appointment' ); ?></a>
    <?php
    }
}

$wp_customize->add_setting(
    'project',
    array(
        'default' => '',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
    )	
);
$wp_customize->add_control( new WP_Review_Customize_Control( $wp_customize, 'project', array(	
		'section' => 'project_section_settings',
    ))
);

	// add section to manage Project
	
	
	 $wp_customize->add_setting(
    'appointment_options[taxonomy_portfolio_list]',
    array(
       'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
		'default' => 2,
		)
	);	
	$wp_customize->add_control( 'appointment_options[taxonomy_portfolio_list]',array(
	 'type' => 'select',
	 'label'   => __('Select project category archive column layout','appointment'),
    'section' => 'project_section_settings',
	 'choices' => array(2=>2,3=>3,4=>4),
		)
	);
	function appointment_project_sanitize_html( $input ) {
    return force_balance_tags( $input );
	}
	
}		
	add_action( 'customize_register', 'appointment_project_customizer' );
	?>
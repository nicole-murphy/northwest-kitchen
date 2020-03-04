<?php 

// slugs settings
function appointment_post_type_slugs_customizer( $wp_customize ){
	
	/* post type slugs settings */
	$wp_customize->add_panel( 'post_type_slug_settings', array(
		'priority'       => 950,
		'capability'     => 'edit_theme_options',
		'title'      => __('SEO Friendly URL', 'appointment'),
	) );
	
		/* post type slugs page */
		$wp_customize->add_section( 'slugs_section' , array(
			'title'      => __('Post type slugs setting', 'appointment'),
			'panel'  => 'post_type_slug_settings'
		) );
		
			// team_slug
			$wp_customize->add_setting( 'appointment_options[appointment_team_slug]' , array(
			'default' => 'appointment_team',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('appointment_options[appointment_team_slug]' , array(
			'label'          => __( 'Team slug', 'appointment' ),
			'section'        => 'slugs_section',
			'type'           => 'text',
			) );
			
			//products_slug
			$wp_customize->add_setting( 'appointment_options[appointment_portfolio_slug]' , array(
			'default' => 'appointment_portfolio',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('appointment_options[appointment_portfolio_slug]' , array(
			'label'          => __( 'Portfolio slug', 'appointment' ),
			'section'        => 'slugs_section',
			'type'           => 'text',
			) );
			
			
			//Portfolio category Slug
			$wp_customize->add_setting( 'appointment_options[appointment_products_category_slug]' , array(
			'default' => 'portfolio-categories',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('appointment_options[appointment_products_category_slug]' , array(
			'label'          => __( 'Portfolio category slug', 'appointment' ),
			'section'        => 'slugs_section',
			'type'           => 'text',
			) );
			
			
			// Testimonial Slug
			$wp_customize->add_setting( 'appointment_options[appointment_testimonial_slug]' , array(
			'default' => 'appointment_testimonial',
			'sanitize_callback' => 'sanitize_text_field',
			'type'=>'option'
			) );
			$wp_customize->add_control('appointment_options[appointment_testimonial_slug]' , array(
			'label'          => __( 'Testimonial slug', 'appointment' ),
			'section'        => 'slugs_section',
			'type'           => 'text',
			) );
			
			
			
			class appointment_Customize_slug extends WP_Customize_Control {
			public function render_content() { ?>
			<h3><?php _e("After changing the slug, please do not forget to save the permalinks. Without saving, the old permalinks will not update.","appointment"); ?> 
			<?php
			}
			}
			
			$wp_customize->add_setting( 'appointment_options[appointment_slug_setting]', array(
			'default'				=> false,
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
			new appointment_Customize_slug(
			$wp_customize,
			'appointment_options[appointment_slug_setting]',
			array(
				'label'					=> __('Appointment slug','appointment'),
				'section'				=> 'slugs_section',
				'settings'				=> 'appointment_options[appointment_slug_setting]',
			)));
			
			
			class WP_slug_Customize_Control extends WP_Customize_Control {
			public $type = 'new_menu';
			/**
			* Render the control's content.
			*/
			public function render_content() {
			?>
			<a href="<?php bloginfo ( 'url' );?>/wp-admin/options-permalink.php" class="button"  target="_blank"><?php _e( 'Click here for permalinks settings', 'appointment' ); ?></a>
			<?php
			}
			}

			$wp_customize->add_setting(
				'slug',
				array(
					'default' => '',
					'capability'     => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_text_field',
				)	
			);
			$wp_customize->add_control( new WP_slug_Customize_Control( $wp_customize, 'slug', array(	
					'section' => 'slugs_section',
				))
			);
}
add_action( 'customize_register', 'appointment_post_type_slugs_customizer' );
<?php 
// Adding customizer home page setting
function appointment_style_customizer( $wp_customize ){
//Theme color
class WP_color_Customize_Control extends WP_Customize_Control {
public $type = 'new_menu';

       function render_content()
       
	   {
	   echo '<h3>Predefined Colors</h3>';
		  $name = '_customize-color-radio-' . $this->id; 
		  foreach($this->choices as $key => $value ) {
            ?>
               <label>
				<input type="radio" value="<?php echo $key; ?>" name="<?php echo esc_attr( $name ); ?>" data-customize-setting-link="<?php echo esc_attr( $this->id ); ?>" <?php if($this->value() == $key){ echo 'checked'; } ?>>
				<img <?php if($this->value() == $key){ echo 'class="selected_img"'; } ?> src="<?php echo get_template_directory_uri(); ?>/images/color/<?php echo $value; ?>" alt="<?php echo esc_attr( $value ); ?>" />
				</label>
				
            <?php
		  } ?>
		
		  <script>
			jQuery(document).ready(function($) {
				$("#customize-control-appointment_options-theme_color label img").click(function(){
					$("#customize-control-appointment_options-theme_color label img").removeClass("selected_img");
					$(this).addClass("selected_img");
				});
			});
		  </script>
		  <?php 
       }

}

class WP_back_Customize_Control extends WP_Customize_Control {
public $type = 'new_menu';

       function render_content()
       
	   {
	   echo '<h3>'.__('Predefined default background','appointment').'</h3>';
		  $name = '_customize-radio-' . $this->id; 
		  foreach($this->choices as $key => $value ) {
            ?>
               <label>
				<input type="radio" value="<?php echo $key; ?>" name="<?php echo esc_attr( $name ); ?>" data-customize-setting-link="<?php echo esc_attr( $this->id ); ?>" <?php if($this->value() == $key){ echo 'checked'; } ?>>
				
				<img <?php if($this->value() == $key){ echo 'class="background_active"'; } ?> src="<?php echo get_template_directory_uri(); ?>/images/bg-pattern/<?php echo esc_attr( $key ); ?>" alt="<?php echo esc_attr( $value ); ?>" />
				</label>
            <?php
		  }
		  ?>
		  <script>
			jQuery(document).ready(function($) {
				$("#customize-control-appointment_options-back_image label img").click(function(){
					$("#customize-control-appointment_options-back_image label img").removeClass("background_active");
					$(this).addClass("background_active");
				});
			});
		  </script>
		  <?php
       }

}



	/* Theme Style settings */
	$wp_customize->add_section( 'theme_style' , array(
		'title'      => __('Theme style settings', 'appointment'),
		'priority'   => 0,
   	) );
	
		
	$wp_customize->add_setting(
    'appointment_options[layout_selector]',
    array(
        'default' => __('wide','appointment'),
		'type' => 'option',
		'sanitize_callback' => 'sanitize_text_field',
		
    )
	);

	$wp_customize->add_control(
    'appointment_options[layout_selector]',
    array(
        'type' => 'select',
        'label' => __('Theme Layout','appointment'),
        'section' => 'theme_style',
		'choices' => array('wide'=>'wide', 'boxed'=>'boxed'),
	));	


	$wp_customize->add_setting(
	'appointment_options[back_image]', array(
	'default' => 'bg-img0.png',  
	'capability'     => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'type' => 'option',
    ));
	$wp_customize->add_control(new WP_back_Customize_Control($wp_customize,'appointment_options[back_image]',
	array(
        'label'   => __('Predefined default backgrounds', 'appointment'),
        'section' => 'theme_style',
		'priority'   => 160,
		'type' => 'radio',
		'choices' => array(
			'bg-img0.png' => 'Pattern 0',
            'bg_img1.png' => 'Pattern 1',
            'bg_img2.png' => 'Pattern 2',
            'bg_img3.png' => 'Pattern 3',
			'bg_img4.png' => 'Pattern 4',
			'bg_img5.png' => 'Pattern 5',
			'bg_img6.png' => 'Pattern 6',
    )
	
	)));
	
	
	
	//Theme Color Scheme
	$wp_customize->add_setting(
	'appointment_options[theme_color]', array(
	'default' => 'default.css',  
	'capability'     => 'edit_theme_options',
	'type' => 'option',
    ));
	$wp_customize->add_control(new WP_color_Customize_Control($wp_customize,'appointment_options[theme_color]',
	array(
        'label'   => __('Predefined colors', 'appointment'),
        'section' => 'theme_style',
		'type' => 'radio',
		'settings' => 'appointment_options[theme_color]',	
		'choices' => array(
			'default.css' => 'orange.jpg',
            'blue.css' => 'blue.jpg',
            'green.css' => 'green.jpg',
			'red.css' => 'red.jpg',
			'cyan.css' => 'cyan.jpg',
			'regalblue.css' =>'regal.jpg',
			'lightsea.css' => 'lightsea.jpg',
			'wadgewood.css' => 'wadge.jpg',
			'aqua.css' => 'aqua.jpg',
			'yellow.css' => 'yellow.jpg',
			'pink.css' => 'pink.jpg',
			'cirousblue.css' => 'cirous.jpg',
			'mandy.css' => 'mandy.jpg',
			'wordpress-blue.css' => 'wordpress-blue.jpg'
			
    )
	
	)));
	
	
	$wp_customize->add_setting(
    'appointment_options[link_color_enable]',
    array(
        'default' => false,
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type' => 'option',
    )	
	);
	$wp_customize->add_control(
    'appointment_options[link_color_enable]',
    array(
        'label' => __('Enable custom color skin','appointment'),
        'section' => 'theme_style',
        'type' => 'checkbox',
    )
	);
	
	$wp_customize->add_setting(
	'appointment_options[link_color]', array(
	'capability'     => 'edit_theme_options',
	'default' => '#ee591f',
	'type' => 'option',
    ));
	
	$wp_customize->add_control( 
	new WP_Customize_Color_Control( 
	$wp_customize, 
	'appointment_options[link_color]', 
	array(
		'label'      => __( 'Skin color', 'appointment' ),
		'section'    => 'theme_style',
		'settings'   => 'appointment_options[link_color]',
	) ) );
	
	
}
add_action( 'customize_register', 'appointment_style_customizer' );
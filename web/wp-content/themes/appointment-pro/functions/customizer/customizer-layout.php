<?php
//Pro Button

function appointment_layout_customizer( $wp_customize ) {
class WP_layout_Customize_Control extends WP_Customize_Control {
    public $type = 'new_menu';
    /**
    * Render the control's content.
    */
    public function render_content() {
		
	$current_option = wp_parse_args( get_option('appointment_options',array()),theme_setup_data());

	$data_enable = explode(",",$current_option['front_page_data']);	

	$defaultenableddata=array('service','home-callout','portfolio','testimonial','latest-news','client','footer-callout');
	$layout_disable=array_diff($defaultenableddata,$data_enable);

    ?>
 <h3><?php _e('Enable','appointment'); ?></h3>
  <ul class="sortable customizer_layout" id="enable">
  <?php if( !empty($data_enable[0]) )    { foreach( $data_enable as $value ){ ?>
  <li class="ui-state" id="<?php echo $value; ?>"><?php echo $value; ?></li>
  <?php } } ?>
  </ul>
  
  
 <h3>Disable</h3> 
 <ul class="sortable customizer_layout" id="disable">
 <?php if(!empty($layout_disable)){ foreach($layout_disable as $val){ ?>
  <li class="ui-state" id="<?php echo $val; ?>"><?php echo $val; ?></li>
  <?php } } ?>
 </ul>
 <div class="section">
		<p> <b><?php _e('Slider has fixed position on homepage.','appointment'); ?></b></p>
		<p> <b><?php _e('Note','appointment'); ?> </b> <?php _e('By default, all the sections are enabled on the homepage. If you do not want to display any section just drag that section to the disabled box.','appointment'); ?><p>
		</div>
<script>
jQuery(document).ready(function($) {
    $( ".sortable" ).sortable({
		connectWith: '.sortable'
	});
  });
   
jQuery(document).ready(function($){	
	
	// Get items id you can chose
	function webritiItems(webriti)
	{
		var columns = [];
		$(webriti + ' #enable').each(function(){
			columns.push($(this).sortable('toArray').join(','));
		});
		return columns.join('|');
	}
	
	function webritiItems_disable(webriti)
	{
		var columns = [];
		$(webriti + ' #disable').each(function(){
			columns.push($(this).sortable('toArray').join(','));
		});
		return columns.join('|');
	}
	
	//onclick check id
	$('#enable .ui-state,#disable .ui-state').mouseleave(function(){ 
		var enable = webritiItems('#customize-control-appointment_options-layout_manager');
		var disable = webritiItems_disable('#customize-control-appointment_options-layout_manager');

		$("#customize-control-appointment_options-front_page_data input[type = 'text']").val(enable);
		$("#customize-control-appointment_options-layout_textbox_disable input[type = 'text']").val(disable);
		$("#customize-control-appointment_options-front_page_data input[type = 'text']").change();		
	});

  });
</script>

    <?php
    }
}

$wp_customize->add_panel( 'appointment_layout_setting', array(
		'priority'       => 1000,
		'capability'     => 'edit_theme_options',
		'title'      => __('Theme Layout Manager', 'appointment'),
	) );


$wp_customize->add_section( 'appointment_layout_section' , array(
		'title'      => __('Theme Layout Manager', 'appointment'),
		'panel' => 'appointment_layout_setting',
   	) );

$wp_customize->add_setting(
    'appointment_options[layout_manager]',
    array(
        'default' => '',
		'capability'     => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
		'type'=>'option'
		
    )	
);
$wp_customize->add_control( new WP_layout_Customize_Control( $wp_customize, 'appointment_options[layout_manager]', array(
		'section' => 'appointment_layout_section',
		'setting' => 'appointment_options[layout_manager]',
    ))
);

$wp_customize->add_setting(
    'appointment_options[front_page_data]',
    array(
        'default' =>'service,home-callout,portfolio,testimonial,latest-news,client,footer-callout',
		'type'=>'option'
    )
	
);
$wp_customize->add_control(
    'appointment_options[front_page_data]',
    array(
        'label' => __('Enable','appointment'),
        'section' => 'appointment_layout_section',
        'type' => 'text',
		));
		
	
$wp_customize->add_setting(
    'appointment_options[layout_textbox_disable]',
    array(
        'default' => '',
		'type'=>'option'
    )
	
);
$wp_customize->add_control(
    'appointment_options[layout_textbox_disable]',
    array(
        'label' => __('Disable','appointment'),
        'section' => 'appointment_layout_section',
        'type' => 'text',
		));	


}
add_action( 'customize_register', 'appointment_layout_customizer' );
?>
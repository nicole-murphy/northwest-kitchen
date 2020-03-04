<?php
/*
Template Name: Custom Homepage
*/
	$current_option = wp_parse_args( get_option('appointment_options',array()),theme_setup_data());
	$data =is_array($current_option['front_page_data']) ? $current_option['front_page_data'] : explode(",",$current_option['front_page_data']);
		get_header();
		get_template_part('index', 'slider');			
		if($data) 
		{  
			foreach($data as $key=>$value)
			{
				//****** Orange Sidebar Area ********
					get_sidebar('orange');
				switch($value) 
				{
					case 'service':
					//****** get index service  ********
					get_template_part('index', 'service');
					break;
					
					case 'home-callout':
					//****** get Home call out
					get_template_part('index','home-callout');
					break;
					
					
					case 'portfolio':
					//****** get index portfolio  ********
					get_template_part('index', 'portfolio');
					break;

					case 'testimonial':
					//****** get index testimonial  ********
					get_template_part('index', 'testimonial');
					break;

					case 'latest-news':
					//****** get index News  ********
					get_template_part('index', 'news');
					break;
					
					case 'client':
					//****** get index client  ********
					get_template_part('index', 'client');
					break;
					
					case 'footer-callout':
					//****** get index footer-callout  ********
					get_template_part('index', 'footer-callout');
					break;
			}
		}
	get_footer(); 
	}
?>
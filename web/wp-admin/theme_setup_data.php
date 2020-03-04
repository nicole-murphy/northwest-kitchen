<?php 
function theme_setup_data()
  	{
	return $appointment_options = array(
	//Header Settings
	'layout_selector' => 'wide',
	'back_image'=>'bg_img0.png',
	'upload_image_favicon' => '',
	'header_one_name' => '' ,
	'header_one_text' => '' ,
	'text_title' => 1 ,
	'height' => '50',
	'width' => '200',
	'enable_header_logo_text' => 1,
	'upload_image_logo' => '',
	'social_media_facebook_link' => '#',
	'social_media_twitter_link' => '#',
	'social_media_linkedin_link' => '#',
	'social_media_googleplus_link' => '#',
	'social_media_instagram_link' => '#',
	'social_media_skype_link' => '#',
	'social_media_youtube_link' => '#',
	
	
	
	
	'header_social_media_enabled' => 0,
	'facebook_media_link_target' => 1,
	'twitter_media_link_target' => 1,
	'linkedin_media_link_target' => 1,
	'googleplus_media_link_target' => 1,
	'instagram_media_link_target' => 1,
	'skype_media_link_target' => 1,
	'youtube_media_link_target' => 1,
	'webrit_custom_css' => '',
	'theme_color'=> 'default.css',
	'link_color' => '#ee591f',
	'link_color_enable' => false,
	
	//Slider Default settings
	'home_banner_enabled' => '',
	'slider_radio' => 'demo',
	'slider_select_category' =>'Uncategorized',
	'slider_options' => 'slide',
	'slider_transition_delay' => 2000,
	'featured_slider_post' => '',
	
	//Service section settings
	'service_section_enabled' => 0,
	'service_title' => __('Our services','appointment'),
	'service_description' => 'Duis aute irure dolor in reprehenderit in voluptate velit cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupid non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
	'service_one_icon' => 'fa-mobile',
	'service_one_title'=>__('Easy to use','appointment'),
	'service_one_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.',
	'service_two_icon' => 'fa-bell',
	'service_two_title'=>__('Easy to use','appointment'),
	'service_two_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.',
	'service_three_icon' => 'fa-laptop',
	'service_three_title'=>__('Easy to use','appointment'),
	'service_three_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.',
	'service_four_icon' => 'fa-support',
	'service_four_title'=>__('Easy to use','appointment'),
	'service_four_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.',
	'service_five_icon' => 'fa-code',
	'service_five_title'=>__('Easy to use','appointment'),
	'service_five_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.',
	'service_six_icon' => 'fa-cog',
	'service_six_title'=>__('Easy to use','appointment'),
	'service_six_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consec tetur adipisicing elit dignissim dapib tumst.',
	'service_seven_icon' => '',
	'service_seven_title'=>'',
	'service_seven_description' => '',
	'service_eight_icon' => '',
	'service_eight_title'=>'',
	'service_eight_description' => '',
	'service_nine_icon' => '',
	'service_nine_title'=>'',
	'service_nine_description' => '',
	'service_one_link' => '#',
	'service_one_link_target' => false,
	'service_two_link' => '#',
	'service_two_link_target' => false,
	'service_three_link' => '#',
	'service_three_link_target' => false,
	'service_four_link' => '#',
	'service_four_link_target' => false,
	'service_five_link' => '#',
	'service_five_link_target' => false,
	'service_six_link' => '#',
	'service_six_link_target' => false,
	'service_seven_link' => '#',
	'service_seven_link_target' => false,
	'service_eight_link' => '#',
	'service_eight_link_target' => false,
	'service_nine_link' => '#',
	'service_nine_link_target' => false,
	
	
	//Home callout section
	'home_call_out_area_enabled' => '',
	'home_call_out_title' => __('Want to say hey or find out more?','appointment'),
	'home_call_out_description' =>  'Reprehen derit in voluptate velit cillum dolore eu fugiat nulla pariaturs sint occaecat proidentse.',
	'callout_background' => '',
	'callout_attachment'=>'fixed',
	'callout_overlay'=>true,
	'home_call_out_btn1_text' =>__('Purchase Now','appointment'),
	'home_call_out_btn1_link' => '#',
	'home_call_out_btn1_link_target' => '',
	'home_call_out_btn2_text' => __('Get in Touch','appointment'),
	'home_call_out_btn2_link' => '#',
	'home_call_out_btn2_link_target' => '',
	
	
	//Portfolio setting
	'portfolio_section_enabled' => '' ,
	'portfolio_list' => 3,
	'portfolio_selected_category_id' => array(get_option('appointment_webriti_default_term_id')),
	'portfolio_title' => __('Latest projects','appointment'),
	'portfolio_description' => __('Explore the works of our members','appointment'),
	
	//Taxonomy Archive Portfolio
	'taxonomy_portfolio_list' => 2,
	'appointment_team_slug' => 'appointment_team',
	'appointment_portfolio_slug' => 'appointment_portfolio',
	'appointment_products_category_slug' => 'portfolio-categories',
	'appointment_testimonial_slug' => 'appointment_testimonial',
	
	
	//Testimonial Settings
	'hide_testimonial' => 0 ,	
	'testimonial_title' => __('What our clients say','appointment'),
	'testimonial_description' => __('Read what our customers are saying:','appointment'),
	'testi_slide_type' => 'slide',
	'testi_transition_delay' => '1000',
	'testi_background'=> get_template_directory_uri() . '/images/bg2.jpg',
	'testi_attachment'=>'fixed',
	'testi_overlay'=>true,
	
	
	// Home client
	'client_section_enabled' => 0,
	'client_title' => __('We work for the best clients','appointment'),
	'client_description' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.",
	'client_button' => __('See case studies','appointment'),
	'client_button_url' => '#',
	'client_button_enabled' => 1,
	'client_one_img' => '',
	'client_img_one_link'=>'#',
	'client_img_one_tab'=> 1,
	
	'client_two_img' => '',
	'client_img_two_link'=>'#',
	'client_img_two_tab'=> 1,
	
	'client_three_img' => '',
	'client_img_three_link'=>'#',
	'client_img_three_tab'=> 1,
	
	'client_four_img' => '',
	'client_img_four_link'=>'#',
	'client_img_four_tab'=> 1,
	
	'client_five_img' => '',
	'client_img_five_link'=>'#',
	'client_img_five_tab'=> 1,
	
	'client_six_img' => '',
	'client_img_six_link'=>'#',
	'client_img_six_tab'=> 1,
	
	'client_seven_img' => '',
	'client_img_seven_link'=>'#',
	'client_img_seven_tab'=> 1,
	
	'client_eight_img' => '',
	'client_img_eight_link'=>'#',
	'client_img_eight_tab'=> 1,
	
	//News Section
	'home_blog_enabled' => '',
	'home_meta_section_settings' => '',
	'home_slider_post_enable' => true,
	'blog_heading' => __('Latest News','appointment'),
	'blog_description' => 'Duis aute irure dolor in reprehenderit in voluptate velit cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupid non proident, sunt in culpa qui official deserunt mollit anim id est laborum.',
	'blog_selected_category_id'=> 1,
	'post_display_count' => '4',
	
	//Home contact callout setting
	'front_callout_enable'=> 0,
	'front_contact_title' => __('Stay in touch with us','appointment'),
	'front_contact1_title'=> __('Have a question? Call us now','appointment'),
	'front_contact1_val'=>'+82 334 843 52',
	'contact_one_icon' =>'fa fa-phone',
	
	'front_contact2_title'=> __('We are open Mon - Fri','appointment'),
	'front_contact2_val'=>'Mon - Fri 08.00 - 18.00',
	'contact_two_icon' =>'fa fa-clock-o',
	
	
	'front_contact3_title'=> __('Drop us a mail','appointment'),
	'front_contact3_val'=>'info@yoursupport.com',
	'contact_three_icon' =>'fa fa-envelope',
	
	
	//Footer Copyright & footer social links
	'footer_copyright_text' => __('No copyright information has been saved yet.','appointment'),
	'footer_menu_bar_enabled' => '',
	'footer_social_media_enabled' => '',
	'footer_facebook_link_taregt' => 1,
	'footer_social_media_facebook_link' => '#',
	'footer_twitter_link_taregt' => 1,
	'footer_social_media_twitter_link' => '#',
	'footer_linkdin_link_taregt'=>1,
	'footer_social_media_linkedin_link' => '#',
	'footer_googleplus_link_taregt' => 1,
	'footer_social_media_googleplus_link' => '#',
	'footer_skype_link_taregt' => 1,
	'footer_social_media_skype_link' => '#',
	'footer_instagram_link_taregt' => 1,
	'footer_social_media_instagram_link' => '#',
	'footer_youtube_link_taregt' => 1,
	'footer_social_media_youtube_link' => '#',
	
	
	
	//About Us Page Team Title and description
	'team_section_enable' => '',
	'about_team_title' => __('Meet our great team','appointment'),
	'about_team_description' => __('We create themes with our customers in mind, therefore our team works hard to provide you with the best technical support.','appointment'),
	
	'client_section_enable' => 0,
	'footer_callout_section_enable' => 0,
	
	//Blog 
	'blog_page_slider_enable' => true,
	'archive_page_slider_enable' => true,
	
	'blog_meta_section_settings' =>'',
	'blog_masonry_column_layout' => 3,
	
	//Service Setting page 
	'hide_testimonial_setting' => '',
	'hide_client_setting' => '',
	'hide_footer_callout_setting' => '',
	
	//Contact page settings
	'send_usmessage' =>  __('<b>Send Us</b> a Message','appointment'),
	'contact_title' => __('Contact Info','appointment'),
	'contact_description' => __('Read what our customers are saying:','appointment'),
	
	'contact-callout-enable' => 0,
	'contact_call_icon' => 'fa fa-phone',
	'contact_call_title' => __('Have a question? Call us now','appointment'),
	'contact_call_description' => '+82 334 843 52',
	
	'contact_add_icon' => 'fa fa-map-marker',
	'contact_add_title' => __('Our office location','appointment'),
	'contact_add_description' => '3108 Evergreen Lane Washington, (USA) 90032',
	
	'contact_mail_icon' => 'fa fa-envelope',
	'contact_mail_title' => __('Drop us a mail','appointment'),
	'contact_mail_description' => 'info@yoursupport.com',
	
	'check_contact_callout' => 0,
	'contact_callout_title' => __('Contact Information','appointment'),
	'contact_callout_description' => __("Be creative with our template, there are hundreds of options and possibilities. Do not miss this unique opportunity to profit from this great template.",'appointment'),
	'contact_callout_button' => __('Purchase Now','appointment'),
	'contact_callout_button_link' => '#',
	'contact_callout_link_target' => 1,
	'contact_callout_back' => WEBRITI_TEMPLATE_DIR_URI . "/images/bg2.jpg",
	'contact_attachment'=>'fixed',
	'contact_overlay'=>true,

	// Google map setting
	
	'contact_google_title' => __('<b>Find</b> the Address','appointment'),
	'contact_google_map_enabled'=> 0,
	'contact_google_map_url' => 'https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Kota+Industrial+Area,+Kota,+Rajasthan&amp;aq=2&amp;oq=kota+&amp;sll=25.003049,76.117499&amp;sspn=0.020225,0.042014&amp;t=h&amp;ie=UTF8&amp;hq=&amp;hnear=Kota+Industrial+Area,+Kota,+Rajasthan&amp;z=13&amp;ll=25.142832,75.879538',
	
	// front page
	'front_page_data'=> 'service,home-callout,portfolio,testimonial,latest-news,client,footer-callout',
	'front_page' => 1 ,
	
	//Banner archive 
	'banner_daily_archive' => __('Daily Archive','appointment'),
	'banner_monthly_archive' => __('Monthly Archive','appointment'),
	'banner_yearly_archive' => __('Yearly Archive','appointment'),
	'banner_title_category' =>  __('Category Archive','appointment'),
	'banner_title_author' => __('Author Archive','appointment'),
	'banner_title_tag' => __('Tag Archive','appointment'),
	'banner_title_search' => __('Search Archive','appointment'),
	'banner_title_custom_texonomy' => __('Portfolio Categories','appointment'),
	
	);
	
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php 
	$appointment_options=theme_setup_data(); 
	$header_setting = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options);
	if($header_setting['upload_image_favicon']!=''){ ?>
	<link rel="shortcut icon" href="<?php  echo $header_setting['upload_image_favicon']; ?>" /> 
	<?php } ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
	</head>
	<?php 
	if($header_setting['layout_selector'] == "boxed")
	{ $class="boxed"; }
	else
	{ $class="wide"; }
	?>
<body <?php body_class($class); ?> >
<div id="wrapper">
<?php if ( get_header_image() != '') {?>
<div class="header-img">
	<div class="header-content">
		<?php if($header_setting['header_one_name'] != '') { ?>
		<h1><?php echo $header_setting['header_one_name'];?></h1>
		<?php }  if($header_setting['header_one_text'] != '') { ?>
		<h3><?php echo $header_setting['header_one_text'];?></h3>
		<?php } ?>
	</div>
	<img class="img-responsive" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
</div>
<?php } ?>
<?php if( is_active_sidebar('home-header-sidebar_left') || is_active_sidebar('home-header-sidebar_center') || is_active_sidebar('home-header-sidebar_right') ) { ?>
<section class="top-header-widget">
	<div class="container">
		<div class="row">
			<div class="col-sm-4">
			<div id="top-header-sidebar-left">
			<?php if( is_active_sidebar('home-header-sidebar_left') ) { ?>
			<?php  dynamic_sidebar( 'home-header-sidebar_left' ); ?>
			<?php } ?>
			</div>
			</div>
			<div class="col-sm-4">
			<div id="top-header-sidebar-center">
			<?php if( is_active_sidebar('home-header-sidebar_center') ) { 
			 dynamic_sidebar( 'home-header-sidebar_center' );
			 } ?>
			</div>
			</div>
			<div class="col-sm-4">
			<div id="top-header-sidebar-right">
			<?php  if( is_active_sidebar('home-header-sidebar_right') ) { ?>
			<?php dynamic_sidebar( 'home-header-sidebar_right' ); ?>
			<?php } ?>
			</div>
			</div>
		</div>	
	</div>
</section>
<?php } ?>
<!--Logo & Menu Section-->	
<nav class="navbar navbar-default">
	<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
				<?php if($header_setting['text_title'] == 1) { ?>
				<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
					<?php
					 if($header_setting['enable_header_logo_text'] == 1) 
					{ echo "<div class=appointment_title_head>" . get_bloginfo( ). "</div>"; }
					elseif($header_setting['upload_image_logo']!='') 
					{ ?>
					<img class="img-responsive" src="<?php echo $header_setting['upload_image_logo']; ?>" style="height:<?php echo $header_setting['height']; ?>px; width:<?php echo $header_setting['width']; ?>px;"/>
					<?php } else { ?>
					<img src="<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/logo.png">
					<?php } ?>
				</a>
				<?php } ?>	
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only"><?php echo 'Toggle navigation'; ?></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		
		<?php 
				$facebook = $header_setting['social_media_facebook_link'];
				$twitter = $header_setting['social_media_twitter_link'];
				$linkdin = $header_setting['social_media_linkedin_link'];
				$googleplus = $header_setting['social_media_googleplus_link'];
				$instagram = $header_setting['social_media_instagram_link'];
				$skype = $header_setting['social_media_skype_link'];
				$youtube = $header_setting['social_media_youtube_link'];
				
				
				$social = '<ul id="%1$s" class="%2$s">%3$s';
				if($header_setting['header_social_media_enabled'] == 0 )
				{
					$social .= '<ul class="head-contact-social">';

					if($header_setting['social_media_facebook_link'] != '') {
					$social .= '<li class="facebook"><a href="'.$facebook.'"';
						if($header_setting['facebook_media_link_target']==1)
						{
						 $social .= 'target="_blank"';
						}
					$social .='><i class="fa fa-facebook"></i></a></li>';
					}
					if($header_setting['social_media_twitter_link']!='') {
					$social .= '<li class="twitter"><a href="'.$twitter.'"';
						if($header_setting['twitter_media_link_target']==1)
						{
						 $social .= 'target="_blank"';
						}
					$social .='><i class="fa fa-twitter"></i></a></li>';
					
					}
					if($header_setting['social_media_linkedin_link']!='') {
					$social .= '<li class="linkedin"><a href="'.$linkdin.'"';
						if($header_setting['linkedin_media_link_target']==1)
						{
						 $social .= 'target="_blank"';
						}
					$social .='><i class="fa fa-linkedin"></i></a></li>';
					}
					
					if($header_setting['social_media_googleplus_link']!='') {
					$social .= '<li class="googleplus"><a href="'.$googleplus.'"';
						if($header_setting['googleplus_media_link_target']==1)
						{
						 $social .= 'target="_blank"';
						}
					$social .='><i class="fa fa-google-plus"></i></a></li>';
					}
					
					if($header_setting['social_media_instagram_link']!='') {
					$social .= '<li class="instagram"><a href="'.$instagram.'"';
						if($header_setting['instagram_media_link_target']==1)
						{
						 $social .= 'target="_blank"';
						}
					$social .='><i class="fa fa-instagram"></i></a></li>';
					}
					
					if($header_setting['social_media_skype_link']!='') {
					$social .= '<li class="skype"><a href="'.$skype.'"';
						if($header_setting['skype_media_link_target']==1)
						{
						 $social .= 'target="_blank"';
						}
					$social .='><i class="fa fa-skype"></i></a></li>';
					}
					
					
					if($header_setting['social_media_youtube_link']!='') {
					$social .= '<li class="youtube"><a href="'.$youtube.'"';
						if($header_setting['youtube_media_link_target']==1)
						{
						 $social .= 'target="_blank"';
						}
					$social .='><i class="fa fa-youtube"></i></a></li>';
					}
					
					if ( class_exists( 'WooCommerce' ) ) {
					global $woocommerce; 
					$social .= '<li class="cart-icon">'; 
					
					$link = function_exists( 'wc_get_cart_url' ) ? wc_get_cart_url() : $woocommerce->cart->get_cart_url();
					$social .= '<a href="'.$link.'" >';
					
					if ($woocommerce->cart->cart_contents_count == 0){
						$social .= '<img src="'.get_stylesheet_directory_uri().'/images/empty.png" alt="empty" height="25" width="25">';
				   }else{
					   $social .= '<img src="'.get_stylesheet_directory_uri().'/images/full.png" alt="full" height="25" width="25">';
					   }
					   
					   $social .= '</a>';
					
					$social .= '<a class="cart-contents" href="'.$link.'" >
					'.sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'appointment'), $woocommerce->cart->cart_contents_count).'</a>';
					
					$social .= '</li>';
					}
					

					$social .='</ul>'; 
					
			}
			$social .='</ul>'; 
		
		?>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<?php wp_nav_menu( array(  
				'theme_location' => 'primary',
				'container'  => '',
				'menu_class' => 'nav navbar-nav navbar-right',
				'fallback_cb' => 'webriti_fallback_page_menu',
				'items_wrap'  => $social,
				'walker' => new webriti_nav_walker()
				 ) );
				?>
		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>	
<!--/Logo & Menu Section-->	
<div class="clearfix"></div>
<?php
function custom_light() {
	
	$appointment_options=theme_setup_data();
	$current_options = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );
	$link_color = $current_options['link_color'];
	list($r, $g, $b) = sscanf($link_color, "#%02x%02x%02x");
	$r = $r - 50;
	$g = $g - 25;
	$b = $b - 40;
	
	if ( $link_color != '#ff0000' ) :
	?>
<style type="text/css">

body { background: #ffffff; color: #8f969c; }
#wrapper { background-color: #ffffff; }

.navbar .navbar-nav > .open > a,
.navbar .navbar-nav > .open > a:hover,
.navbar .navbar-nav > .open > a:focus,
.navbar .navbar-nav > li > a:hover,
.navbar .navbar-nav > li > a:focus {
	color: <?php echo $link_color; ?>;
}
.navbar .navbar-nav > .active > a,
.navbar .navbar-nav > .active > a:hover,
.navbar .navbar-nav > .active > a:focus, 
.dropdown-menu, 
.dropdown-menu .active > a,
.dropdown-menu .active > a:hover,
.dropdown-menu .active > a:focus {
background-color:<?php echo $link_color; ?>;
}

.dropdown-menu > li > a { border-bottom:1px solid rgb(<?php echo $r; ?>,<?php echo $g; ?>,<?php echo $b;?>) }
.dropdown-menu > li > a:hover,
.dropdown-menu > li > a:focus { background-color: rgb(<?php echo $r; ?>,<?php echo $g; ?>,<?php echo $b;?>) }
.dropdown-menu > li > a:hover,
.navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus {color:#fff !important;}

.navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus {
	background-color: <?php echo $link_color; ?> !important;
}
@media only screen and (min-width: 480px) and (max-width: 767px) {
.navbar-default .navbar-nav .open .dropdown-menu > li > a:hover { color: <?php echo $link_color; ?> !important; } 
}

@media only screen and (min-width: 200px) and (max-width: 480px) {
.navbar-default .navbar-nav .open .dropdown-menu > li > a:hover { color: <?php echo $link_color; ?> !important; }
}
.top-contact-detail-section { background: none repeat scroll 0 0 <?php echo $link_color; ?>; }

.callout-btn2, a.hrtl-btn, 
.project-scroll-btn li:hover, 
a.works-btn, 
.blog-btn-sm, 
a.more-link,
.top-contact-detail-section,
.clients-btn-lg, .team-showcase-overlay, .blog-post-date-area .date, .blog-btn-lg, .blogdetail-btn a:hover, .cont-btn a:hover, .sidebar-widget > .input-group > .input-group-addon, .sidebar-widget > .input-group > .input-group-addon, .sidebar-widget-tags a:hover, .blog-pagination a:hover, .blog-pagination a.active, .navigation.pagination .nav-links a:hover, .navigation.pagination .nav-links .page-numbers.current, a.error-btn, a.error-btn:hover, a.error-btn:focus, .hc_scrollup, .tagcloud a:hover, .form-submit input, .media-body input[type=submit], .sidebar-widget input[type=submit], .footer-widget-column input[type=submit], .blogdetail-btn, .cont-btn button, .orange-widget-column > .input-group > .input-group-addon, .orange-widget-column-tags a:hover, .slider-btn-sm, .format-video-btn-sm, .slide-btn-sm, .slider-sm-area a.more-link, .blog-pagination span.current, .wpcf7-submit, .page-title-section, ins { background-color: <?php echo $link_color; ?>; }

/* Font Colors */
.service-icon i,.portfolio-caption:hover h4 a, .portfolio-tabs li.active > a, .portfolio-tabs li > a:hover, .testmonial-area h4, .blog-post-sm a:hover, .blog-tags-sm a:hover, .blog-sm-area h3 > a:hover, .blog-sm-area h3 > a:focus, .footer-contact-icon i, .footer-addr-icon, .footer-blog-post:hover h3 a , .footer-widget-tags a:hover, .footer-widget-column ul li a:hover, .footer-copyright p a:hover, .page-breadcrumb > li.active a, .about-section h2 > span, .blog-post-lg a:hover, .blog-tags-lg a:hover, .blog-lg-area-full h3 > a:hover, .blog-author span, .comment-date a:hover, .reply a, .reply a:hover, .sidebar-blog-post:hover h3 a, ul.post-content li:hover a, .error-404 h1, .media-body th a:hover, .media-body dd a:hover, .media-body li a:hover, .blog-post-info-detail a:hover, .comment-respond a:hover, /* .blog-lg-area-left p > a, .blog-lg-area-right p > a, .blog-lg-area-full p > a, */ .blogdetail-btn a, .cont-btn a, .blog-lg-area-left h3 > a:hover, .blog-lg-area-right h3 > a:hover, .blog-lg-area-full h3 > a:hover, .sidebar-widget > ul > li > a:hover, 
.sidebar-widget table th, 
.footer-widget-column table th,  
.top-header-widget table th, 
.top-contact-detail-section table th, 
blockquote a, 
blockquote a:hover, 
blockquote a:focus, 
#calendar_wrap table > thead > tr > th, 
#calendar_wrap a, 
table tbody a, 
table tbody a:hover,
table tbody a:focus,
.textwidget a:hover, 
.format-quote p:before,
td#prev a, td#next a,
dl > dd > a, dl > dd > a:hover,
.rsswidget:hover, 
.recentcomments a:hover, 
p > a, 
p > a:hover,
ul > li > a:hover, tr.odd a, tr.even a, 
p.wp-caption-text a, 
.footer-copyright a, .footer-copyright a:hover  { color: <?php echo $link_color; ?>; }

/* Border colors */
.footer-widget-tags a:hover , .sidebar-widget > .input-group > .input-group-addon, .sidebar-widget-tags a:hover, .blog-pagination a:hover, .blog-pagination a.active, .tagcloud a:hover, .media-body input[type=submit], .sidebar-widget input[type=submit], .footer-widget-column input[type=submit]  { border: 1px solid <?php echo $link_color; ?>;} 

.footer-copyright-section {	border-bottom: 5px solid <?php echo $link_color; ?>; }
.team-area:hover .team-caption { border-bottom: 2px solid <?php echo $link_color; ?>; }
.blog-lg-box img { border-bottom: 3px solid <?php echo $link_color; ?>;; }
blockquote {border-left: 5px solid <?php echo $link_color; ?>;}

/* Box Shadow*/
.callout-btn2, a.hrtl-btn, a.works-btn, .blog-btn-sm, .more-link, .blogdetail-btn a, .cont-btn a, a.error-btn, .form-submit input, .blogdetail-btn, .cont-btn button, .slider-btn-sm , .slider-sm-area a.more-link, .format-video-btn-sm, .slide-btn-sm, .wpcf7-submit, 
.post-password-form input[type="submit"], .clients-btn-lg { box-shadow: 0 3px 0 0 <?php echo $link_color; ?>; }

/* Image Background */
.testimonial-section, .contact-detail-section { background: url("<?php echo WEBRITI_TEMPLATE_DIR_URI; ?>/images/bg1.jpg") repeat fixed 0 0 rgba(0, 0, 0, 0); }
.testimonial-section .overlay, .contact-detail-section .overlay { background: none repeat scroll 0 0 rgba(0, 0, 0, 0.7); }
.author-box img {background-color: #2a2a2a;}
.top-header-widget {
    background-color: #21202e;
}
.header-contact-info2 a {
    color: #ffffff;
}



/* Woocommerce Color Css-------------------------*/

.woocommerce .star-rating span, .woocommerce .posted_in a:hover, .woocommerce-product-rating a:hover, .woocommerce .tagged_as a:hover, .woocommerce-message:before, 
.woocommerce-info:before, .woocommerce-message a, .woocommerce-message a:hover, .woocommerce-info a, .woocommerce-info a:hover, .woocommerce-error a, .woocommerce-error a:hover, 
.woocommerce-cart table.cart td a:hover, .woocommerce-account .addresses .title .edit { 
	color: <?php echo $link_color; ?>; 
}

.woocommerce ul.products li.product:hover .onsale, .woocommerce ul.products li.product:hover .button, .woocommerce ul.products li.product:focus .button, 
.woocommerce div.product form.cart .button:hover, .woocommerce div.product form.cart .button:focus, .woocommerce div.product form.cart .button, .woocommerce a.button, 
.woocommerce a.button:hover, .woocommerce .cart input.button, .woocommerce input.button.alt, .woocommerce input.button, .woocommerce button.button, .woocommerce #respond input#submit, 
.woocommerce .cart input.button:hover, .woocommerce .cart input.button:focus, 
.woocommerce-cart .wc-proceed-to-checkout a.checkout-button:hover, .woocommerce-cart .wc-proceed-to-checkout a.checkout-button:focus, 
.woocommerce input.button.alt:hover, .woocommerce input.button.alt:focus, .woocommerce input.button:hover, .woocommerce input.button:focus, 
.woocommerce button.button:hover, .woocommerce button.button:focus, .woocommerce #respond input#submit:hover, .woocommerce #respond input#submit:focus, 
.woocommerce-cart .wc-proceed-to-checkout a.checkout-button, .woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, 
.woocommerce nav.woocommerce-pagination ul li span.current, .ui-slider-horizontal .ui-slider-range { 
	background: <?php echo $link_color; ?>; 
}

.woocommerce ul.products li.product:hover, .woocommerce ul.products li.product:hover, 
.woocommerce-page ul.products li.product:hover, .woocommerce-page ul.products li.product:hover, 
.woocommerce ul.products li.product:hover .button, .woocommerce ul.products li.product:focus .button, 
.woocommerce div.product form.cart .button:hover, .woocommerce div.product form.cart .button:focus, 
.woocommerce div.product form.cart .button, .woocommerce a.button, .woocommerce a.button:hover, 
.woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, 
.woocommerce nav.woocommerce-pagination ul li span.current {
	border: 1px solid <?php echo $link_color; ?>;
}

.woocommerce ul.products li.product:hover .onsale { border: 2px solid <?php echo $link_color; ?>; }
.woocommerce-message, .woocommerce-info { border-top-color: <?php echo $link_color; ?>; }
</style>
<?php
	endif;
}
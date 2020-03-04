<?php
/**
Template Name: Service
*/
get_header();
get_template_part('index','banner');
$appointment_options=theme_setup_data(); 
$service_page_setting = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options);
?>

<!-- Homepage Service Section -->
<div class="page-builder">
<?php get_template_part('index','service'); ?>
</div>	
<!-- /HomePage Service Section -->

<?php if( $service_page_setting['hide_testimonial_setting'] == 0 ) { ?>
	<div class="clearfix"></div>
	<?php  get_template_part('index','testimonial'); } 
	if( $service_page_setting['hide_client_setting'] == 0 ) {
?>	
<div class="clearfix"></div>
<!-- Clients Section -->
	<?php 
	get_template_part('index','client'); } ?>
<!-- /Clients Section -->

<!--- Footer callout --->
<?php 
	if( $service_page_setting['hide_footer_callout_setting'] == 0) {
	get_template_part('index','footer-callout'); } ?>
<!--- /Footer callout --->
<div class="clearfix"></div>

<?php get_footer(); ?>
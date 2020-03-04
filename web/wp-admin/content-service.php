<?php
get_header();
get_template_part('index','banner');
?>
	
<div class="service-section">
	<div class="container">
	<?php 
		the_post();
		the_content();
		?>	
</div>
</div>

<!-- /HomePage Service Section -->
<!--- /Footer callout --->
<div class="clearfix"></div>
<?php get_footer(); ?>
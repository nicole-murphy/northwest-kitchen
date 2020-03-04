<?php
/**
 * side bar template
 *
 * @package WordPress
 * @subpackage spasalon
 */
?>

<?php if ( is_active_sidebar( 'woocommerce' )  ) : ?>
<!--Sidebar-->
<div class="sidebar-section-right">
		<?php dynamic_sidebar( 'woocommerce' ); ?>
</div>
<!--/End of Sidebar-->
<?php endif; ?>
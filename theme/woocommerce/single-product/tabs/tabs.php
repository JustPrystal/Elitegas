<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
global $product;
$id = $product->get_id();
$tabs = get_field('all_tabs', $id);
?>

<div class="tab-part">
<div class="tab-wrap">
	<div class="tab-header">
		<?php foreach($tabs as $tab_heading){ ?>
			<div class="tab-heading"><?php echo $tab_heading['tab_heading']?></div>
		<?php } ?>
	</div>
<div class="tab-body">
	<?php foreach($tabs as $tab_content){ ?>
			<div class="tab-content"><?php echo $tab_content['tab_content']?></div>
	<?php } ?>
</div>
</div>

<script>
    //tab Javascript

    //tab Javascript End
</script>
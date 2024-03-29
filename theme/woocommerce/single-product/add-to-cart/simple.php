<?php
/**
 * Simple product add to cart
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/add-to-cart/simple.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

if ( ! $product->is_purchasable() ) {
	return;
}

echo wc_get_stock_html( $product ); // WPCS: XSS ok.

if ( $product->is_in_stock() ) : ?>

	<?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<?php if ( pmpro_hasMembershipLevel(array('2','7','4','5','6','8') ) ) { ?>
	<?php if($product->stock_status == "coming_soon" || $product->stock_status == "pre_order"){
		//return empty
	} else{?>
	<form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
		<?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>
		<div class="wrap-quantity-btn">
		<?php
		do_action( 'woocommerce_before_add_to_cart_quantity' );

		woocommerce_quantity_input(
			array(
				'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
				'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
				'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
			)
		);

		do_action( 'woocommerce_after_add_to_cart_quantity' );
		?>
	
		<button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button alt">ADD TO CART</button>
	</div>
		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
	</form>
	
	<p class="cases_per_pallet"><?php echo get_field('cases_per_pallet')?> </p>

<?php } } else { ?>
<div class="not_active_text ">
  <div class="not_active_image">
    <img src="/wp-content/uploads/2022/01/LockKey.png" alt="">
  </div>
  <div class="not_active_content">
    <span>Product Prices &amp; Ordering Locked</span>
    <p>Product prices, quantity discounts, and ordering options are only available to customers with approved Elite Gas seller accounts.&nbsp; To view our price breakdowns and to place orders, please&nbsp;log in&nbsp;or create an account and complete our authorized seller application process.</p>
	<?php if (is_user_logged_in()) { ?>
        <a href="/my-account/boarding-info/" class="join-now-btn">JOIN NOW!</a>
    <?php } else{ ?>
        <a href="/membership-account/membership-checkout/?level=1" class="join-now-btn">JOIN NOW!</a>
    <?php } ?>
  </div>
</div>
<?php }	?>

	<?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>


<?php endif; ?>
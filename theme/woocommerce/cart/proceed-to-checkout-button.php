<?php
/**
 * Proceed to checkout button
 *
 * Contains the markup for the proceed to checkout button on the cart.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/proceed-to-checkout-button.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.4.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
global $woocommerce;
$weight = $woocommerce->cart->cart_contents_weight;?>

<?php if($weight < 290){?>
<a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="checkout-button button alt wc-forward">
	<?php esc_html_e( 'Proceed to checkout', 'woocommerce' ); ?>
</a>
<?php } else { ?>
<div class="ltl-notice">
	Due to the complex nature of this order we're unable to generate an automated shipping quote for you, Please click the button below to submit your order. A support representative will reach out to you and take your order manually within 1-2 business days
</div>
<a href="<?php echo get_site_url()."/request-a-quote"?>" class="checkout-button button alt wc-forward">
	<?php esc_html_e( 'Request Shipping Quote', 'woocommerce' ); ?>
</a>
<?php } ?>
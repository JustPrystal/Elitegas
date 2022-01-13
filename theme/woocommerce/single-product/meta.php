<?php
/**
 * Single Product Meta
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/meta.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;
?>

<div class="meta-share-social">
	
<div class="product_meta">

	<?php do_action( 'woocommerce_product_meta_start' ); ?>
	
	
	<?php echo wc_get_product_tag_list( $product->get_id(), ', ', '<span class="tagged_as">' . _n( '', '', count( $product->get_tag_ids() ), 'woocommerce' ) . ' ', '</span>' ); ?>
	

	<?php if ( wc_product_sku_enabled() && ( $product->get_sku() || $product->is_type( 'variable' ) ) ) : ?>

		<span class="sku_wrapper"><?php esc_html_e( 'SKU:', 'woocommerce' ); ?> <span class="sku"><?php echo ( $sku = $product->get_sku() ) ? $sku : esc_html__( 'N/A', 'woocommerce' ); ?></span></span>
	
		&emsp;<?php if(get_field('product_upc')) { ?><span id="test" class="product-upc"><strong>UPC:</strong> <?php the_field('product_upc'); ?></span><?php } ?>
	
	
	<?php endif; ?>
	<span class="stock <?php echo esc_attr( $class ); ?>"><?php echo wp_kses_post( $availability['availability'] ); ?></span>

	<?php do_action( 'woocommerce_product_meta_end' ); ?>
</div>
<!-- <div class="product-share-items">
<a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fab fa-facebook-f"></i></a>
<a class="pinterest" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=&description=<?php the_title(); ?>"><i class="fab fa-pinterest"></i></a>
<a class="twitter" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>"><i class="fab fa-twitter"></i></a>
<a class="linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>"><i class="fab fa-linkedin"></i></a>
<a class="instagram" href="https://instagram.com/share?url=<?php the_permalink(); ?>"><i class="fab fa-instagram"></i></a>
<a class="mailto" href="mailto:info@elitegas.com?&subject=&cc=&bcc=&body=<?php the_permalink(); ?>%0A<?php the_title(); ?>"><i class="fas fa-envelope"></i></a>
</div> -->
</div>

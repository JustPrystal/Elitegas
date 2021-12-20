<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $product;

?>
<?php if ( pmpro_hasMembershipLevel(array('2','7','4','5','6') ) ) { ?>

<div class="wrap-social-price">
	
<div class="price-wrap">	
<?php if(get_field('msrp_price')) { ?><span class="msrp-class">MSRP: $<?php the_field('msrp_price'); ?></span><?php } ?>

	<p class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>">Price: <?php echo $product->get_price_html(); ?></p>
	<?php function unit_price_has_user_role($check_role){
    $user = wp_get_current_user();
    if(in_array( $check_role, (array) $user->roles )){
        return true;
    }
    return false;
} ?>
       <?php if(unit_price_has_user_role('Distributor')){?>
	<?php if(get_field('unit_price')) { ?><span class="unit-price">Per Unit Price: $<?php the_field('unit_price'); ?></span><?php } ?>
     <?php } ?>	
	  <?php if(unit_price_has_user_role('VIP_Distributor')){?>
	<?php if(get_field('vip_unit_price')) { ?><span class="unit-price">Per Unit Price: $<?php the_field('vip_unit_price'); ?></span><?php } ?>
     <?php } ?>	
     <?php if(unit_price_has_user_role('VIP_Silver')){?>
	<?php if(get_field('vip_silver_price')) { ?><span class="unit-price">Per Unit Price: $<?php the_field('vip_silver_price'); ?></span><?php } ?>
     <?php } ?>	
	     <?php if(unit_price_has_user_role('VIP_Gold')){?>
	<?php if(get_field('vip_gold_price')) { ?><span class="unit-price">Per Unit Price: $<?php the_field('vip_gold_price'); ?></span><?php } ?>
     <?php } ?>	
	     <?php if(unit_price_has_user_role('VIP_Platinum')){?>
	<?php if(get_field('vip_platinum_price')) { ?><span class="unit-price">Per Unit Price: $<?php the_field('vip_platinum_price'); ?></span><?php } ?>
     <?php } ?>	
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

<?php } ?>

<?php 

//Exit if accessed directly
if(!defined('ABSPATH')){
	return; 	
}

global $xoo_cp_gl_qtyen_value;

$cart = WC()->cart->get_cart();

$cart_item = $cart[$cart_item_key];


$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );

$thumbnail 		= apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

$product_name 	=  apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
					
$product_price 	= apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );

$product_subtotal = apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key );

// Meta data
$attributes = '';

//Variation
$attributes .= $_product->is_type('variable') || $_product->is_type('variation')  ? wc_get_formatted_variation($_product) : '';
// Meta data
if(version_compare( WC()->version , '3.3.0' , "<" )){
	$attributes .=  WC()->cart->get_item_data( $cart_item );
}
else{
	$attributes .=  wc_get_formatted_cart_item_data( $cart_item );
}


//Quantity input
$max_value = apply_filters( 'woocommerce_quantity_input_max', $_product->get_max_purchase_quantity(), $_product );
$min_value = apply_filters( 'woocommerce_quantity_input_min', $_product->get_min_purchase_quantity(), $_product );
$step      = apply_filters( 'woocommerce_quantity_input_step', 1, $_product );
$pattern   = apply_filters( 'woocommerce_quantity_input_pattern', has_filter( 'woocommerce_stock_amount', 'intval' ) ? '[0-9]*' : '' );
$current_tag = get_the_terms( $product_id, 'product_tag' );
?>



<div class="xoo-cp-pdetails clearfix">
	<div class="main-content-wrapper" data-xoo_cp_key="<?php echo $cart_item_key; ?>">
		<div class="img-wrapper">
		<div class="xoo-cp-remove"><span class="xoo-cp-icon-cross xoo-cp-remove-pd"></span></div>
		<div class="xoo-cp-pimg"><a href="<?php echo  $product_permalink; ?>"><?php echo $thumbnail; ?></a></div>
		</div>
		<span class="content-wrapper">
			<div class="xoo-cp-ptitle">
				<a href="<?php echo $product_permalink; ?>"><?php echo $product_name; echo " ".get_field('subtitle',$product_id); ?></a>
				<span class="info">
					<div class="tag-wrapper">
                        <a href="/product-tag/<?php echo $current_tag[0]->slug ?>"><?php echo $current_tag[0]->name ?></a>
                    </div>
					<div class="sku-wrapper">
                        <p><strong>SKU: </strong><?php echo $_product->get_sku() ?></p>
                    </div>
                    <div class="upc-wrapper">
                        <p><strong>UPC: <span><?php echo get_field('product_upc', $product_id) ?></span></strong><?php ?></p>
                    </div>
				</span>
			</div>
		<div class="xoo-cp-pprice">Price: <?php echo  $product_price; ?></div>
		<div class="xoo-cp-pqty">Quantity: 
			<?php if ( $_product->is_sold_individually() || !$xoo_cp_gl_qtyen_value ): ?>
				<span><?php echo $cart_item['quantity']; ?></span>				
			<?php else: ?>
				<div class="xoo-cp-qtybox">
				<span class="xcp-minus xcp-chng">-</span>
				<input type="number" class="xoo-cp-qty" max="<?php esc_attr_e( 0 < $max_value ? $max_value : '' ); ?>" min="<?php esc_attr_e($min_value); ?>" step="<?php echo esc_attr_e($step); ?>" value="<?php echo $cart_item['quantity']; ?>" pattern="<?php esc_attr_e( $pattern ); ?>">
				<span class="xcp-plus xcp-chng">+</span></div>
			<?php endif; ?>
		  </div>
		  <div class="xoo-cp-ptotal"><span class="xcp-totxt"><?php _e('Total','added-to-cart-popup-woocommerce');?>: </span><span class="xcp-ptotal"><?php echo $product_subtotal; ?></span></div>
		</span>
	</div>
	<div class="related-products-wrapper">
		<?php if($_product->cross_sell_ids || $_product->upsell_ids){?>
			<div class="heading-wrap">
				Frequently purchased with : 
			</div>
		<?php
			$related_products = array_merge($_product->cross_sell_ids, $_product->upsell_ids);
			?>
				<div class="related-products">
					<?php 
					foreach($related_products as $item){
						$related_item = wc_get_product($item);
						?>
						<div class="r-product-item">
							<div class="product-image">
								<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $item ), array(300,300) );?>
								<img src="<?php echo $image[0];?>" alt="">
							</div>
							<div class="product-name">
								<?php echo $related_item->name?> <?php echo get_field("subtitle", $item)?>
							</div>
							<div class="card-bottom">
								<div class="price">
									<?php echo wc_price($related_item->get_price()) ?>
								</div>
								<div class="add-to-cart">
									<a href="<?php echo $related_item->add_to_cart_url()?>">Add To Cart</a>
								</div>
							</div>
						</div>
						<?php
					}
					?>
				</div>
			<?php
		}?>
	</div>
</div>


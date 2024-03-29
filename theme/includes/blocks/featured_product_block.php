<?php
global $post;
$post_id = get_post(89);
if( is_user_logged_in() ){
    $productID = $block['featured_product'];
    $tabs = get_field('all_tabs', $productID);
} else{
    $productID = wc_get_product( $post_id );
    $tabs = get_field('all_tabs', 89);
}
$product = wc_get_product($productID);
$data = $product->get_data();
$product_meta = get_post_meta($productID);
$upc = get_field('product_upc', $productID);
$msrp = get_field('msrp_price', $productID);
$current_tag = get_the_terms( $productID, 'product_tag' );
?>
<section class="Featured-Product-Block">
    <div class="container">
        <div class="wrapper">
            <div class="inline">
                <div class="heading"><?php echo $block['heading'] ?></div>
                <a class="text" href="/product/<?php echo $product->get_slug() ?>">View details</a>
            </div>
            <div class="Product-Part">
                <div class="image-wrap">
                    <?php if( is_user_logged_in() ){ ?>
                        <img src="<?php echo get_the_post_thumbnail_url( $productID , 'large' ); ?>" alt="">
                    <?php } else { ?>
                        <img src="<?php echo get_the_post_thumbnail_url( 89 , 'large' ); ?>" alt="">
                    <?php } ?>
                    <div class="social-icons">
                        <div class="facebook-icon"><i class="fab fa-facebook-f"></i></div>
                        <div class="Pinterest-icon"><i class="fab fa-pinterest"></i></div>
                        <div class="Twitter-icon"><i class="fab fa-twitter"></i></div>
                        <div class="Linkedin-icon"><i class="fab fa-linkedin"></i></div>
                        <div class="Instagram-icon"><i class="fab fa-instagram"></i></div>
                        <div class="Email-icon"><i class="fas fa-envelope"></i></div>
                    </div>
                </div>
                <div class="content-wrap">
                    <div class="heading"><?php echo $product->get_title(); echo " ".get_field('subtitle',$productID); ?></div>
                    <div class="info">
                        <div class="tag-wrapper">
                        <a href="/product-tag/<?php echo $current_tag[0]->slug ?>"><?php echo $current_tag[0]->name ?></a>
                        </div>
                        <div class="sku-wrapper">
                            <p><strong>SKU: </strong><?php echo $product->get_sku() ?></p>
                        </div>
                        <div class="upc-wrapper">
                            <p><strong>UPC: <span><?php echo $upc ?></span></strong><?php ?></p>
                        </div>
                        <div class="stock-status">
                            <p class="stock <?php echo $product->get_availability()['class']; ?>"><?php echo $product->get_availability()['availability'];?></p>
                        </div>
                    </div>
					<?php if ( pmpro_hasMembershipLevel(array('2','7','4','5','6','8') ) ) {?>
                            <div class="Logined-Box-Wrap">
                                <div class="head">
                                    <div class="msrp">MSRP: $<?php echo $msrp ?></div>
                                </div>
                                <div class="price">Price: <?php echo wc_price($product->get_price()); ?></div>
                            </div>
                            <form class="cart" method="post" enctype="multipart/form-data">
                                <div class="quantity">
                                    <div class="Minus" onclick="Minus()">-</div>
                                    <input type="number" step="1" min="1" max="" name="quantity" value="1" title="Quantity" class="input-text qty text" size="4" pattern="[0-9]*" inputmode="numeric">
                                    <div class="plus" onclick="Plus()">+</div>
                                </div>
                                
                                <input type="hidden" name="add-to-cart" value="<?php echo $productID; ?>">
                                
                                <button type="submit" class="single_add_to_cart_button button alt"> Add to cart</button>
                            </form>
						<p class="cases_per_pallet"><?php echo get_field('cases_per_pallet', $productID)?> </p>
                        <?php } else { ?>
                        <div class="Product-Pricing-Box">
                            <div class="Not-Logined-Box-Wrap">
                            <div class="image"><img src="/wp-content/uploads/2022/01/LockKey.png" alt=""></div>
                                <div class="content">
                                    <div class="heading">PRODUCT PRICES & ORDERING LOCKED</div>
                                    <div class="text">Product prices, quantity discounts, and ordering options are only available to customers with approved Elite Gas seller accounts.  
									To view our price breakdowns and to place orders, please log in or create an account and complete our authorized seller application process.</div>
                                    <?php if (is_user_logged_in()) { ?>
                                        <a href="/my-account/boarding-info/" class="join-now-btn">JOIN NOW!</a>
                                    <?php } else{ ?>
                                        <a href="/membership-account/membership-checkout/?level=1" class="join-now-btn">JOIN NOW!</a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

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
                </div>
            </div>
        </div>
    </div>
  </div>
</section>

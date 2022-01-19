<?php

$productID = $block['brand_products'];
$product = wc_get_product($productID);
$product_meta = get_post_meta($productID);
$current_tag = get_the_terms( $productID, 'product_tag' );

?>

<section class="brand-block">
    <div class="container">
        <div class="inline">
            <h2 class="heading"><?php echo $block['brand_heading'] ?></h2>
        </div>
        <div class="wrapper">
            <div class="brand-container">
                <div class="product-img">

                </div>
                <?php foreach($block['brand_products'] as $product_id){
                    $_product = wc_get_product($product_id);
                    ?>
                <div class="product-title"><?php echo $_product->get_title();} ?></div>
            </div>
        </div>
    </div>
</section>
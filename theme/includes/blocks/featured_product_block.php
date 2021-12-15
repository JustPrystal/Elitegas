<?php 
$productID = $block['featured_product'];
$product = wc_get_product($productID);
$product_meta = get_post_meta($productID);
$upc = get_field('product_upc', $productID);
$current_tag = get_the_terms( $productID, 'product_tag' );
?>
<section class="Featured-Product-Block">
    <div class="container">
        <div class="wrapper">
            <div class="inline">
                <div class="heading"><?php echo $block['heading'] ?></div>
                <div class="text"><?php echo $block['heading'] ?></div>
            </div>
            <div class="Product-Part">
                <div class="image-wrap">
                    <?php echo wp_get_attachment_image( $product_meta['_thumbnail_id'][0], 'full' ); ?>
                </div>
                <div class="content-wrap">
                    <div class="heading"><?php echo $product->get_name() ?></div>
                    <div class="info">
                        <div class="tag-wrapper">
                        <a href="/<?php echo $current_tag[0]->slug ?>"><?php echo $current_tag[0]->name ?></a>
                        </div>
                        <div class="sku-wrapper">
                            <p><strong>SKU: </strong><?php echo $product->get_sku() ?></p>
                        </div>
                        <div class="upc-wrapper">
                            <p><strong>UPC: <?php echo $upc ?></strong><?php ?></p>
                        </div>
                    </div>
                    <div class="stock-status">
                        <?php echo $product->get_stock_status() ?>
                    </div>
                    <div class="tab-part">
                        <div class="head">
                            <p class="tab-desc" onclick="DescBoxShow()">Description</p>
                            <p class="tab-safely" onclick="SafelyBoxShow()">Safely Information</p>
                            <p class="tab-technical" onclick="TechnicalBoxShow()">Technical Specifications</p>
                        </div>
                        <div class="tab-desc-content">
                            <p><?php echo $product->get_description() ?></p>
                        </div>

                        <div class="tab-safely-safely">
                            <p>Hamza</p>
                        </div>

                        <div class="tab-technical-technical">
                            <p>Siddiqui</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $('.tab-desc').addClass('active');
    function Hideall(){
        $('.tab-desc-content').css("display" , "none");
        $('.tab-safely-safely').css("display" , "none");
        $('.tab-technical-technical').css("display" , "none");
    }
    function RemoceallClass(){
        $('.tab-desc').removeClass('active');
        $('.tab-safely').removeClass('active');
        $('.tab-technical').removeClass('active');
    }
    function DescBoxShow(){
        Hideall();
        RemoceallClass();
        $('.tab-desc-content').css("display" , "block");
        $('.tab-desc').addClass('active');
    }
    function SafelyBoxShow(){
        Hideall();
        RemoceallClass();
        $('.tab-safely-safely').css("display" , "block");
        $('.tab-safely').addClass('active');
    }
    function TechnicalBoxShow(){
        Hideall();
        RemoceallClass();
        $('.tab-technical-technical').css("display" , "block");
        $('.tab-technical').addClass('active');
    }
</script>
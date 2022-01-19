<section class="brand-block">
    <div class="container">
        <div class="inline">
            <h2 class="heading"><?php echo $block['brand_heading'] ?></h2>
        </div>
        <div class="wrapper">
            <div class="brand-container">
                <div class="brand-wrapper">
                <?php foreach($block['brand_products'] as $product_id){
                $_product = wc_get_product($product_id);
                $product_meta = get_post_meta($product_id);?>
                
                <div class="product-wrap">
                <a class="text" href="/product/<?php echo $_product->get_slug() ?>">
                    <div class="product-img"><?php echo wp_get_attachment_image( $product_meta['_thumbnail_id'][0], 'full' ); ?></div>
                    <div class="product-content">
                        <div class="product-title"><?php echo $_product->get_title();?></div>
                        <div class="product-subtitle"><?php  echo get_field('subtitle', $product_id); ?></div>
                    </div>
                </a>
                </div>
                <?php }?>
                </div>
            </div>
            <div class="sidebar-right"><?php get_sidebar( 'sidebar-widget-area' ); ?></div>
        </div>
    </div>
</section>
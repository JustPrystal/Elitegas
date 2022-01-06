<?php 
         // Add new constant that returns true if WooCommerce is active
         define( 'WPEX_WOOCOMMERCE_ACTIVE', class_exists( 'WooCommerce' ) );
     
         // Checking if WooCommerce is active
         if ( WPEX_WOOCOMMERCE_ACTIVE ) {
             // Do something...
             // Such as including a new file with all your Woo edits.
         }
    
         //enables woocommerce removing this will not show shop page / pdp
         add_action( 'after_setup_theme', function() {
              add_theme_support( 'woocommerce' );
         } );
    
         //remove woocommerce basic styles
        add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
    
         //In WooCommerce 3.0 they introduced a new product gallery, zoom and lightbox. These must all be enabled via “add_theme_support” if you want to make use of them in your theme.
         add_theme_support( 'wc-product-gallery-slider' );
         // add_theme_support( 'wc-product-gallery-zoom' );
         // add_theme_support( 'wc-product-gallery-lightbox' );
         
         //Remove prices from google search
        add_filter( 'woocommerce_structured_data_product_offer', '__return_empty_array' );

        //Remove Unique sku function
        add_filter( 'wc_product_has_unique_sku', '__return_false' );

        
?>
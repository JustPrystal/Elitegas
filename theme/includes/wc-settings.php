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
         add_filter ( 'woocommerce_account_menu_items', 'distributor', 40 );
         function distributor( $menu_link ){
             
             $menu_link = array_slice( $menu_link, 0, 5, true ) 
             + array( 'boarding-info' => 'Vendor Information' )
             + array_slice( $menu_link, 5, NULL, true );
             
             return $menu_link;
         }
         add_filter ( 'woocommerce_account_menu_items', 'misha_log_history_link', 40 );
         function misha_log_history_link( $menu_links ){
             
             $menu_links = array_slice( $menu_links, 0, 5, true ) 
             + array( 'log-history' => 'Important Information' )
             + array_slice( $menu_links, 5, NULL, true );
             
             return $menu_links;
         }
         /*
          * Step 2. Register Permalink Endpoint
          */
         add_action( 'init', 'distributor_add_endpoint' );
         function distributor_add_endpoint() {
         
             // WP_Rewrite is my Achilles' heel, so please do not ask me for detailed explanation
             add_rewrite_endpoint( 'boarding-info', EP_PAGES );
         }
         add_action( 'init', 'misha_add_endpoint' );
         function misha_add_endpoint() {
         
             // WP_Rewrite is my Achilles' heel, so please do not ask me for detailed explanation
             add_rewrite_endpoint( 'log-history', EP_PAGES );
         }
         /*
          * Step 3. Content for the new page in My Account, woocommerce_account_{ENDPOINT NAME}_endpoint
          */
         add_action( 'woocommerce_account_log-history_endpoint', 'misha_my_account_endpoint_content' );
         function misha_my_account_endpoint_content() {
         
             // of course you can print dynamic content here, one of the most useful functions here is get_current_user_id()
             $id=370; 
             $post = get_post($id); 
             $content = apply_filters('the_content', $post->post_content); 
             echo $content;
         }
         
         
         
         add_action( 'woocommerce_account_boarding-info_endpoint', 'distributor_my_account_endpoint_content' );
         function distributor_my_account_endpoint_content() {
         
             // of course you can print dynamic content here, one of the most useful functions here is get_current_user_id()
             $id=442; 
             $post = get_post($id); 
             $content = apply_filters('the_content', $post->post_content); 
             echo do_shortcode('[forma]');
         }
         /*
?>
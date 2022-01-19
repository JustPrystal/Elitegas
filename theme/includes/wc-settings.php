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

        add_action('wp_enqueue_scripts', 'my_register_script_method');

        function my_register_script_method () {
            wp_deregister_script('jquery');
            wp_register_script( 'jquery', 'https://code.jquery.com/jquery-3.6.0.min.js');
        }

		//pass meta to cart object
        add_filter('woocommerce_add_cart_item_data','wdm_add_item_data',10,3);
        
        function wdm_add_item_data($cart_item_data, $product_id, $variation_id){

            $subtitle = get_field("subtitle",$product_id);
            if($subtitle){
                $cart_item_data['eg_product_subtitle'] = $subtitle;
            }
            return $cart_item_data;
        }
        //create keys and display cart meta on cart
        add_filter('woocommerce_get_item_data','wdm_add_item_meta',10 , 2);
        function wdm_add_item_meta($item_data, $cart_item ){
            if(array_key_exists('eg_product_subtitle', $cart_item))
            {   
                $custom_details = $cart_item['eg_product_subtitle'];

                $item_data[] = array(
                    'key'   => 'subtitle',
                    'value' => $custom_details
                );
                
            }
            return $item_data;
        }
        //pass order meta on checkout
		add_action( 'woocommerce_checkout_create_order_line_item', 'wdm_custom_checkout_create_order_line_item', 20, 4 );

		function wdm_custom_checkout_create_order_line_item( $item, $cart_item_key, $values, $order ) {  
			$upc = get_field("product_upc", $values['product_id']);
			if($upc){
			 $item->update_meta_data( 'Product UPC', $upc );
			}
		}

        add_filter( 'gform_entries_column_filter', 'change_column_data', 10, 5 );

		function change_column_data( $value, $form_id, $field_id, $entry, $query_string ) {
			
			//only change the data when form id is 1 and field id is 2
			if ( $form_id == 3 && $field_id == 148){
				$user_id = rgar($entry,'created_by');
 				$newdata = pmpro_getMembershipLevelForUser($user_id);
 				return $newdata->name;
			}
			return $value;
				
		}
?>
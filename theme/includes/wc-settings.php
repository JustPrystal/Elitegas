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

<?php

// gives role and membership once form is filled

function my_gform_after_registration( $user_id, $feed, $entry ) {
    if ( ! function_exists( 'pmpro_changeMembershipLevel' ) ) {
        return;
    }
    pmpro_changeMembershipLevel( 8, $user_id );
}
add_action( 'gform_user_registered', 'my_gform_after_registration', 10, 3);

// end



function my_hide_shipping_when_free_is_available( $rates ) {
    $free = array();

        foreach ( $rates as $rate_id => $rate ) {
            if ( 'free_shipping' === $rate->method_id ) {
                $free[ $rate_id ] = $rate;
                break;
            }
        }

    return ! empty( $free ) ? $free : $rates;
    }

    add_filter( 'woocommerce_package_rates', 'my_hide_shipping_when_free_is_available', 100 );


// Auto loging after filling champs form

add_action( 'gform_user_registered', 'wpc_gravity_registration_autologin',  10, 4 );
/**
 * Auto login after registration.
 */
function wpc_gravity_registration_autologin( $user_id, $user_config, $entry, $password ) {
	$user = get_userdata( $user_id );
	$user_login = $user->user_login;
	$user_password = $password;

    wp_signon( array(
		'user_login' => $user_login,
		'user_password' =>  $user_password,
		'remember' => false

    ) );
}

// end

// Admin panel in my account for elite gas support

//  * My Dashboard Link Account menu
// */



add_filter ( 'woocommerce_account_menu_items', 'admin_dashboard', 40 );
function admin_dashboard( $menu_link ){
    if ( current_user_can('administrator') ) {
        $menu_link = array_slice( $menu_link, 0, 5, true ) 
        + array( 'admin-dashboard' => 'Admin Tools' )
        + array_slice( $menu_link, 5, NULL, true );
    }
	return $menu_link;
}

add_action( 'init', 'admin_dashboard_add_endpoint' );
function admin_dashboard_add_endpoint() {
    if ( current_user_can('administrator') ) {
        // WP_Rewrite is my Achilles' heel, so please do not ask me for detailed explanation
        add_rewrite_endpoint( 'admin-dashboard', EP_PAGES );
    }
}

add_action( 'woocommerce_account_admin-dashboard_endpoint', 'admin_my_account_endpoint_content' );
function admin_my_account_endpoint_content() { 
    if ( current_user_can('administrator') ) { ?>

<div class="top-nav">
    <div class="nav-container">
        <span class="user-tab-btn active-tab">Create User</span>
        <span class="ban-tab-btn">Ban List</span>
    </div>
</div>

<section class="admin-tab create-custom-user active">
    <div class="container">
        <div class="shortcode"><?php echo do_shortcode('[gravityforms id="14"]') ?></div>
    </div>
</section>

<section class="admin-tab ban-list">
    Ban List will be Shown here
</section>

<script>

jQuery(".ban-tab-btn").click(function(){
    jQuery(".user-tab-btn").removeClass("active-tab");
    jQuery('.ban-tab-btn').addClass("active-tab");

  if(jQuery('.create-custom-user').hasClass("active")){
    jQuery('.create-custom-user').removeClass("active");
    jQuery('.ban-list').addClass("active");
    }
});

jQuery(".user-tab-btn").click(function(){
    jQuery(".ban-tab-btn").removeClass("active-tab");
    jQuery('.user-tab-btn').addClass("active-tab");

  if(jQuery('.ban-list').hasClass("active")){
    jQuery('.ban-list').removeClass("active");
    jQuery('.create-custom-user').addClass("active");
    }
});

</script>

<?php } 

}

add_filter('woocommerce_account_menu_items', 'filter_wc_my_account_menu');
function filter_wc_my_account_menu($items) {
    if ( current_user_can('administrator')) {
        isset($items['admin-dashboard']);
        return $items;
    } elseif(!current_user_can('administrator')) {
        echo '<style>.woocommerce-MyAccount-navigation-link--admin-dashboard { display:none;}</style>';
    }
    return $items;
}


update_user_meta($user_id, 'change_role', time() + 60 * 60 * 24 * 0.0005);

function change_expired_users_role(){
    $args = array(
        'meta_key' => 'change_role',
        'meta_value' => time(),
        'meta_compare' => `<=`,
        'fields' => array('ID')
    );

    $users = get_users($args);

    if(empty($users))
        return;

    foreach($users as $user){
        if ( in_array( 'new_distributor', (array) $user->roles ) ) {
            $user->set_role('member');
        }
    }
}

// end


add_filter('woocommerce_checkout_fields', 'custom_billing_fields', 1000, 1);
function custom_billing_fields( $fields ) {
    $fields['billing']['billing_company']['required'] = true;
    $fields['shipping']['shipping_company']['required'] = true;

    return $fields;
}

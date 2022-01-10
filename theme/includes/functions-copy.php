<?php
/**
 * Pacrose functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, dsk_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * We can remove the parent theme's hook only after it is attached, which means we need to
 * wait until setting up the child theme:
 *
 * <code>
 * add_action( 'after_setup_theme', 'my_child_theme_setup' );
 * function my_child_theme_setup() {
 *     // We are providing our own filter for excerpt_length (or using the unfiltered value)
 *     remove_filter( 'excerpt_length', 'dsk_excerpt_length' );
 *     ...
 * }
 * </code>
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage DSK
 * @since DSK 1.0
 */



function distributor_policy_shortcode() { 
 $distributor_policy = get_field( "distributor_policy", 9 ); 
 
return $distributor_policy;
} 
add_shortcode('distributor_policy', 'distributor_policy_shortcode');

add_filter( 'gform_field_value_distributor_policy', 'my_custom_population_function' );
function my_custom_population_function( $value ) {
	$field_value = get_field( "distributor_policy", 9 );
    return $field_value ;
}



function vendor_application_shortcode() { 
 
$vendor_application = get_field( "vendor_application", 9 ); 
 
return $vendor_application;
} 
add_shortcode('vendor_application', 'vendor_application_shortcode');

add_filter( 'gform_field_value_vendor_application', 'vendor_application_function' );
function vendor_application_function( $value ) {
	$field_value = get_field( "vendor_application", 9 );
    return $field_value ;
}




function reseller_license_shortcode() { 
 
$reseller_license = get_field( "reseller_license", 9 ); 
 
return $reseller_license;
} 
add_shortcode('reseller_license', 'reseller_license_shortcode');

add_filter( 'gform_field_value_reseller_license', 'reseller_license_function' );
function reseller_license_function( $value ) {
	$field_value = get_field( "reseller_license", 9 );
    return $field_value ;
}



function purchase_of_nitrous_oxide_shortcode() { 
 
$purchase_of_nitrous_oxide = get_field( "purchase_of_nitrous_oxide", 9 ); 
 
return $purchase_of_nitrous_oxide;
} 
add_shortcode('purchase_of_nitrous_oxide', 'purchase_of_nitrous_oxide_shortcode');

add_filter( 'gform_field_value_purchase_of_nitrous_oxide', 'purchase_of_nitrous_oxide_function' );
function purchase_of_nitrous_oxide_function( $value ) {
	$field_value = get_field( "purchase_of_nitrous_oxide", 9 );
    return $field_value ;
}



function sale_acknowledgement_shortcode() { 
 
$sale_acknowledgement = get_field( "sale_acknowledgement", 9 ); 
 
return $sale_acknowledgement;
} 
add_shortcode('sale_acknowledgement', 'sale_acknowledgement_shortcode');

add_filter( 'gform_field_value_sale_acknowledgement', 'sale_acknowledgement_function' );
function sale_acknowledgement_function( $value ) {
	$field_value = get_field( "sale_acknowledgement", 9 );
    return $field_value ;
}


add_action( 'init', 'woocommerce_clear_cart_url' );
function woocommerce_clear_cart_url() {
	if ( isset( $_GET['clear-cart'] ) ) {
		global $woocommerce;
		$woocommerce->cart->empty_cart();
	}
}

function pmpro_add_fields_to_checkout(){
	//don't break if Register Helper is not loaded
	if(!function_exists( 'pmprorh_add_registration_field' )) {
		return false;
	}
	
	$fields = array();
	$fields[] = new PMProRH_Field(
		'company',					// input name, will also be used as meta key
		'text',						// type of field
		array(
			'label'		=> 'Business Name',		// custom field label
			'profile'	=> true,		// show in user profile
			'required'	=> true,		// make this field required
		)
	);
	
	
	$fields[] = new PMProRH_Field(
		'telephone',					// input name, will also be used as meta key
		'text',						// type of field
		array(
			'label'		=> 'Phone Number',	// custom field label
			'required'	=> true,	// make this field required
			'profile'	=> true,	// show in user profile
		)
	);
	
	$fields[] = new PMProRH_Field(
		'website',					// input name, will also be used as meta key
		'text',						// type of field
		array(
			'label'		=> 'Website',	// custom field label
		)
	);
	
	$fields[] = new PMProRH_Field(
		'message',					// input name, will also be used as meta key
		'text',						// type of field
		array(
			'label'		=> 'Message',	// custom field label
		)
	);
	
	$fields[] = new PMProRH_Field(
		'position',					// input name, will also be used as meta key
		'text',						// type of field
		array(
			'label'		=> 'Position At Company',	// custom field label
		)
	);
	
	$fields[] = new PMProRH_Field(
		'How did you hear about us?',							// input name, will also be used as meta key
		'select',							// type of field
		array(
			'options' => array(				// <option> elements for select field
				'Online Website'	=> 'Online Website',		// <option value="morethan10000">&gt; $10,000</option>
				'Mailer'	=> 'Mailer',		// <option value="morethan10000">&gt; $10,000</option>
				'Word of Mouth'	=> 'Word of Mouth',		// <option value="morethan10000">&gt; $10,000</option>
				'Another Retailer'	=> 'Another Retailer',		// <option value="morethan10000">&gt; $10,000</option>
				'Customer'	=> 'Customer',		// <option value="morethan10000">&gt; $10,000</option>
				'Other'	=> 'Other',		// <option value="morethan10000">&gt; $10,000</option>
			)
		)
	);

	//add the fields to default forms
	foreach($fields as $field){
		pmprorh_add_registration_field(
			'checkout_boxes', // location on checkout page
			$field	// PMProRH_Field object
		);
	}
}
add_action( 'init', 'pmpro_add_fields_to_checkout' );

/**
 * Get shipping methods.
 */
function dsk_cart_totals_shipping_html() {
	$packages = WC()->shipping()->get_packages();
	$first    = true;

	foreach ( $packages as $i => $package ) {
		$chosen_method = isset( WC()->session->chosen_shipping_methods[ $i ] ) ? WC()->session->chosen_shipping_methods[ $i ] : '';
		$product_names = array();
		$product_sku = array();
		$package_price = array();
		$package_quantity = array();
		$package_image = array();
		$package_stotal = array();

		if ( count( $packages ) > 1 ) {
			foreach ( $package['contents'] as $item_id => $values ) {
				$product_names[ $item_id ] = $values['data']->get_name();
				$product_sku[ $item_id ] = $values['data']->get_sku();
				$package_price[ $item_id ] = $values['data']->get_price_html();
				$package_quantity[ $item_id ] = $values['quantity'];
				$package_image[ $item_id ] = $values['data']->get_image();
				$package_stotal[ $item_id ] = ($values['data']->get_price() * $values['quantity']);
			}
			$product_names = apply_filters( 'woocommerce_shipping_package_details_array', $product_names, $package );
			$product_sku = apply_filters( 'woocommerce_shipping_package_details_array', $product_sku, $package );
			$package_price = apply_filters( 'woocommerce_shipping_package_details_array', $package_price, $package );
			$package_quantity = apply_filters( 'woocommerce_shipping_package_details_array', $package_quantity, $package );
			$package_image = apply_filters( 'woocommerce_shipping_package_details_array', $package_image, $package );
			$package_stotal = apply_filters( 'woocommerce_shipping_package_details_array', $package_stotal, $package );
		}

		wc_get_template(
			'cart/cart-shipping-dsk.php',
			array(
				'package'                  => $package,
				'available_methods'        => $package['rates'],
				'show_package_details'     => count( $packages ) > 1,
				'show_shipping_calculator' => is_cart() && apply_filters( 'woocommerce_shipping_show_shipping_calculator', $first, $i, $package ),
				'package_details'          => implode( ('</li><li>'), $product_names ),
				'package_sku'         	   => implode( '</li><li>', $product_sku ),
				'package_price'        	   => implode( '</li><li>', $package_price ),
				'package_quantity'         => implode( '</li><li>', $package_quantity ),
				'package_image'            => implode( '</li><li>', $package_image ),
				'package_stotal'           => implode( ',', $package_stotal ),
				/* translators: %d: shipping package number */
				'package_name'             => apply_filters( 'woocommerce_shipping_package_name', ( ( $i + 1 ) > 1 ) ? sprintf( _x( 'Shipping %d', 'shipping packages', 'woocommerce' ), ( $i + 1 ) ) : _x( 'Shipping', 'shipping packages', 'woocommerce' ), $i, $package ),
				'index'                    => $i,
				'chosen_method'            => $chosen_method,
				'formatted_destination'    => WC()->countries->get_formatted_address( $package['destination'], ', ' ),
				'has_calculated_shipping'  => WC()->customer->has_calculated_shipping(),
			)
		);

		$first = false;
	}
}

add_filter( 'woocommerce_cart_item_thumbnail', 'display_sku_after_item_name', 5, 3 );
function display_sku_after_item_name( $item_name, $cart_item, $cart_item_key ) {
    $product = $cart_item['data']; // The WC_Product Object

    if( is_cart() && $product->get_sku() ) {
        $item_name .= '<span class="item-sku">'. $product->get_sku() . '</span>';
    }
    return $item_name;
}

// Display the sku below under cart item name in checkout
add_filter( 'woocommerce_checkout_cart_item_quantity', 'display_sku_after_item_qty', 5, 3 );  
function display_sku_after_item_qty( $item_quantity, $cart_item, $cart_item_key ) {
    $product = $cart_item['data']; // The WC_Product Object

    if( $product->get_sku() ) {
        $item_quantity .= '<span class="item-sku">'. $product->get_sku() . '</span>';
    }
    return $item_quantity;
}

	
// -------------
// 1. Show plus minus buttons
  
add_action( 'woocommerce_after_quantity_input_field', 'bbloomer_display_quantity_plus' );
  
function bbloomer_display_quantity_plus() {
   echo '<button type="button" class="plus" title="Add 1 to all locations" >+</button>';
}
  
add_action( 'woocommerce_before_quantity_input_field', 'bbloomer_display_quantity_minus' );
  
function bbloomer_display_quantity_minus() {
   echo '<button type="button" class="minus" title="Remove 1 to all locations" >-</button>';
}
  
// -------------
// 2. Trigger update quantity script
  
add_action( 'wp_footer', 'bbloomer_add_cart_quantity_plus_minus' );
  
function bbloomer_add_cart_quantity_plus_minus() {
 
   if ( ! is_product() && ! is_cart() ) return;
    
   wc_enqueue_js( "   
           
      $('form.cart,form.woocommerce-cart-form').on( 'click', 'button.plus, button.minus', function() {
  
         var qty = $( this ).parent( '.quantity' ).find( '.qty' );
         var val = parseFloat(qty.val());
         var max = parseFloat(qty.attr( 'max' ));
         var min = parseFloat(qty.attr( 'min' ));
         var step = parseFloat(qty.attr( 'step' ));
 		 var submit = $('button.update_cart');
         if ( $( this ).is( '.plus' ) ) {
            if ( max && ( max <= val ) ) {
               qty.val( max );
            } else {
               qty.val( val + step );
			   submit.removeAttr('disabled');
            }
         } else {
            if ( min && ( min >= val ) ) {
               qty.val( min );
            } else if ( val > 1 ) {
               qty.val( val - step );
			   submit.removeAttr('disabled');
            }
         }
 
      });
        
   " );
}

// // Shortcode Entries
// function wpf_entries_table( $atts ) {
 
//     // Pull ID shortcode attributes.
//     $atts = shortcode_atts(
//         [
//             'id'     => '',
//             'user'   => '',
//             'fields' => '',
//             'number' => '',
//         ],
//         $atts
//     );
//   $theidone = wp_get_current_user();
 
//     // Check for an ID attribute (required) and that WPForms is in fact
//     // installed and activated.
//     if ( empty( $atts['id'] ) || ! function_exists( 'wpforms' ) ) {
//         return;
//     }
  
//     // Get the form, from the ID provided in the shortcode.
//     $form = wpforms()->form->get( absint( $atts['id'] ) );
  
//     // If the form doesn't exists, abort.
//     if ( empty( $form ) ) {
//         return;
//     }
  
//     // Pull and format the form data out of the form object.
//     $form_data = ! empty( $form->post_content ) ? wpforms_decode( $form->post_content ) : '';
  
//     // Check to see if we are showing all allowed fields, or only specific ones.
//     $form_field_ids = ! empty( $atts['fields'] ) ? explode( ',', str_replace( ' ', '', $atts['fields'] ) ) : [];
  
//     // Setup the form fields.
//     if ( empty( $form_field_ids ) ) {
//         $form_fields = $form_data['fields'];
//     } else {
//         $form_fields = [];
//         foreach ( $form_field_ids as $field_id ) {
//             if ( isset( $form_data['fields'][ $field_id ] ) ) {
//                 $form_fields[ $field_id ] = $form_data['fields'][ $field_id ];
//             }
//         }
//     }
  
//     if ( empty( $form_fields ) ) {
//         return;
//     }
  
//     // Here we define what the types of form fields we do NOT want to include,
//     // instead they should be ignored entirely.
// 	$form_fields_disallow = apply_filters( 'wpforms_frontend_entries_table_disallow', [ 'divider', 'html', 'pagebreak', 'captcha' ] );
  
//     // Loop through all form fields and remove any field types not allowed.
//     foreach ( $form_fields as $field_id => $form_field ) {
//         if ( in_array( $form_field['type'], $form_fields_disallow, false ) ) {
//             unset( $form_fields[ $field_id ] );
//         }
//     }
  
//     $entries_args = [
//         'form_id' => absint( $atts['id'] ),
//     ]; 
	
	
//     // Narrow entries by user if user_id shortcode attribute was used.
//     if ( ! empty( $atts['user'] ) ) {
//         if ( $atts['user'] === 'current' && is_user_logged_in() ) {
//             $entries_args['user_id'] = get_current_user_id();
//         } else {
//             $entries_args['user_id'] = absint( $atts['user'] );
//         }
//     }
  
//     // Number of entries to show. If empty, defaults to 30.
//     if ( ! empty( $atts['number'] ) ) {
//         $entries_args['number'] = absint( $atts['number'] );
//     }
  
//     // Get all entries for the form, according to arguments defined.
//     // There are many options available to query entries. To see more, check out
//     // the get_entries() function inside class-entry.php (https://a.cl.ly/bLuGnkGx).
//     $entries = wpforms()->entry->get_entries( $entries_args );
  
//     if ( empty( $entries ) ) {
//         echo do_shortcode('[wpforms id=""]');
//         return '<p></p>';
//     }
  
//     ob_start();
  
//     echo '<h3>Distributor Policy</h3> <div class="wrapper">';
  
//         echo '<div class="header-row">';
  
//             // Loop through the form data so we can output form field names in
//             // the table header.
//             foreach ( $form_fields as $form_field ) {
  				
//                 // Output the form field name/label.
//                 echo '<span class="column-label ">';
//                     echo esc_html_e( sanitize_text_field( $form_field['label'] ) );
//                 echo '</span>';
//             }
  
//         echo '</div>';
  
//         echo '<div class="entries">';
  
//             // Now, loop through all the form entries.
//             foreach ( $entries as $entry ) {
  
//                 echo '<div class="entry-details">';
  
//                 // Entry field values are in JSON, so we need to decode.
//                 $entry_fields = json_decode( $entry->fields, true );
//   				$i = 0;
//                 foreach ( $form_fields as $form_field ) {
//   					$class = $classes[$i++ % 6];
// $classes = array('promotional', 'beaches', 'volunteers');

//                     echo '<span class="details  ' . $class . '-' . $x . ' ">' ;
  
//                         foreach ( $entry_fields as $entry_field ) {
//                             if ( absint( $entry_field['id'] ) === absint( $form_field['id'] ) ) {
//                                 echo apply_filters( 'wpforms_html_field_value', wp_strip_all_tags( $entry_field['value'] ), $entry_field, $form_data, 'entry-frontend-table' );
//                                 break;
//                             }
//                         }
  
//                     echo '</span>';
//                 }
  
//                 echo '</div>';
//             }
  
//         echo '</div>';
  
//     echo '</div>';
  
//     $output = ob_get_clean();
  
//     return $output;
// }
// add_shortcode( 'wpforms_entries_table', 'wpf_entries_table' );


/**
 * Change number of related products output
 */ 
function woo_related_products_limit() {
  global $product;
	
	$args['posts_per_page'] = 6;
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args', 20 );
  function jk_related_products_args( $args ) {
	$args['posts_per_page'] = 6; // 4 related products
	$args['columns'] = 6; // arranged in 2 columns
	return $args;
}

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 10);


remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 40 );


//-Tab Postion -//
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_output_product_data_tabs', 60 );



// Remove additional information tab
add_filter( 'woocommerce_product_tabs', 'remove_additional_information_tab', 100, 1 );
function remove_additional_information_tab( $tabs ) {
    unset($tabs['additional_information']);

    return $tabs;
}

add_filter('add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');


function woocommerce_header_add_to_cart_fragment( $fragments ) {

                global $woocommerce; 

                ob_start(); 

                ?>

<a class="header__action-item-link header__cart-toggle cart-contents" href="<?php echo get_site_url();?>/cart/" >
              <div class="header__action-item-content">
                <div class="header__cart-icon icon-state" aria-expanded="false">
				  <span class="icon-state__primary"><svg focusable="false" class="icon icon--cart" viewBox="0 0 27 24" role="presentation">
					  <g transform="translate(0 1)" stroke-width="2" stroke="currentColor" fill="none" fill-rule="evenodd">
						<circle stroke-linecap="square" cx="11" cy="20" r="2"></circle>
						<circle stroke-linecap="square" cx="22" cy="20" r="2"></circle>
						<path d="M7.31 5h18.27l-1.44 10H9.78L6.22 0H0"></path>
					  </g>
					</svg><span class="header__cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
				  </span>
				</div>
				<span class="hidden-pocket hidden-lap">Cart</span>
			</div>
		</a>

                <?php 

                $fragments['a.cart-contents'] = ob_get_clean();

                return $fragments; 

}

// add_filter( 'woocommerce_get_availability', 'wcs_custom_get_availability', 1, 2);



// function wcs_custom_get_availability( $availability, $_product ) {
    
//     // Change In Stock Text
//     if ( $_product->is_in_stock() ) {
//         $availability['availability'] = __('Available', 'woocommerce');
//     }
//     // Change Out of Stock Text
//     if ( ! $_product->is_in_stock() ) {
//         $availability['availability'] = __('Sold Out', 'woocommerce');
//     }
//     return $availability;
// }

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );


// Remove default wrappers.
		//add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );
		add_theme_support( 'woocommerce', array(
			'thumbnail_image_width' => 150,
			'single_image_width'    => 300,
		) );
//
//add_theme_support( 'wc-product-gallery-zoom' );
//add_theme_support( 'wc-product-gallery-lightbox' );
//add_theme_support( 'wc-product-gallery-slider' );
//
// Add Shortcode
function custom_mini_cart() {
	echo '<a href="#" class="dropdown-back" data-toggle="dropdown"> ';
	    echo '<i class="fas fa-shopping-basket"></i>';
	    echo '<div class="basket-item-count" style="display: inline;">';
	        echo '<span class="cart-items-count count"><b>Cart</b>';
	            echo WC()->cart->get_cart_contents_count();
	        echo '<i class="fas fa-sort-down"></i></span>';
	    echo '</div>';
	echo '</a>';
	echo '<ul class="dropdown-menu dropdown-menu-mini-cart">';
	        echo '<li> <div class="widget_shopping_cart_content">';
	                  woocommerce_mini_cart();
	            echo '</div></li></ul>';
}
add_shortcode( 'custom-mini-cart', 'custom_mini_cart' );

function _remove_script_version( $src ){
$parts = explode( '?ver', $src );
return $parts[0];
}
add_filter( 'script_loader_src', '_remove_script_version', 15, 1 );
add_filter( 'style_loader_src', '_remove_script_version', 15, 1 );

// Add support for cropping default WordPress medium images -
if(!get_option("medium_crop"))
add_option("medium_crop", "1");
else
update_option("medium_crop", "1");

/**
WooCommerce
**/
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<div class="woocommerce">';
}

function my_theme_wrapper_end() {
  echo '</div>';
}
add_theme_support( 'woocommerce' );

add_filter( 'woocommerce_currencies', 'add_custom_currency' );
function add_custom_currency( $currencies ) {
  $currencies["DOLLAR"] = 'United States Dollar';
  return $currencies;
}

add_filter('woocommerce_currency_symbol', 'add_custom_currency_symbol', 10, 2);
function add_custom_currency_symbol( $currency_symbol, $currency ) {
switch( $currency ) {
  case 'DOLLAR': $currency_symbol = '$'; break;
}
return $currency_symbol;
}
/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640;

/** Tell WordPress to run dsk_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'dsk_setup' );

if ( ! function_exists( 'dsk_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override dsk_setup() in a child theme, add your own dsk_setup to your child theme's
 * functions.php file.
 *
 * @uses add_theme_support() To add support for post thumbnails, custom headers and backgrounds, and automatic feed links.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_editor_style() To style the visual editor.
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since DSK 1.0
 */
function dsk_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Post Format support. You can also use the legacy "gallery" or "asides" (note the plural) categories.
	add_theme_support( 'post-formats', array( 'aside', 'gallery' ) );

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'dsk', get_template_directory() . '/languages' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'dsk' ),
	) );

	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', array(
		// Let WordPress know what our default background color is.
		'default-color' => 'f1f1f1',
	) );

	// The custom header business starts here.

	$custom_header_support = array(
		// The default image to use.
		// The %s is a placeholder for the theme template directory URI.
		'default-image' => '%s/images/headers/path.jpg',
		// The height and width of our custom header.
		'width' => apply_filters( 'dsk_header_image_width', 940 ),
		'height' => apply_filters( 'dsk_header_image_height', 198 ),
		// Support flexible heights.
		'flex-height' => true,
		// Don't support text inside the header image.
		'header-text' => false,
		// Callback for styling the header preview in the admin.
		'admin-head-callback' => 'dsk_admin_header_style',
	);

	add_theme_support( 'custom-header', $custom_header_support );

	if ( ! function_exists( 'get_custom_header' ) ) {
		// This is all for compatibility with versions of WordPress prior to 3.4.
		define( 'HEADER_TEXTCOLOR', '' );
		define( 'NO_HEADER_TEXT', true );
		define( 'HEADER_IMAGE', $custom_header_support['default-image'] );
		define( 'HEADER_IMAGE_WIDTH', $custom_header_support['width'] );
		define( 'HEADER_IMAGE_HEIGHT', $custom_header_support['height'] );
		add_custom_image_header( '', $custom_header_support['admin-head-callback'] );
		add_custom_background();
	}

	// We'll be using post thumbnails for custom header images on posts and pages.
	// We want them to be 940 pixels wide by 198 pixels tall.
	// Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
	set_post_thumbnail_size( $custom_header_support['width'], $custom_header_support['height'], true );

	// ... and thus ends the custom header business.

	// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
	register_default_headers( array(
		'berries' => array(
			'url' => '%s/images/headers/berries.jpg',
			'thumbnail_url' => '%s/images/headers/berries-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Berries', 'dsk' )
		),
		'cherryblossom' => array(
			'url' => '%s/images/headers/cherryblossoms.jpg',
			'thumbnail_url' => '%s/images/headers/cherryblossoms-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Cherry Blossoms', 'dsk' )
		),
		'concave' => array(
			'url' => '%s/images/headers/concave.jpg',
			'thumbnail_url' => '%s/images/headers/concave-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Concave', 'dsk' )
		),
		'fern' => array(
			'url' => '%s/images/headers/fern.jpg',
			'thumbnail_url' => '%s/images/headers/fern-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Fern', 'dsk' )
		),
		'forestfloor' => array(
			'url' => '%s/images/headers/forestfloor.jpg',
			'thumbnail_url' => '%s/images/headers/forestfloor-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Forest Floor', 'dsk' )
		),
		'inkwell' => array(
			'url' => '%s/images/headers/inkwell.jpg',
			'thumbnail_url' => '%s/images/headers/inkwell-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Inkwell', 'dsk' )
		),
		'path' => array(
			'url' => '%s/images/headers/path.jpg',
			'thumbnail_url' => '%s/images/headers/path-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Path', 'dsk' )
		),
		'sunset' => array(
			'url' => '%s/images/headers/sunset.jpg',
			'thumbnail_url' => '%s/images/headers/sunset-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Sunset', 'dsk' )
		)
	) );
}
endif;

if ( ! function_exists( 'dsk_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_custom_image_header() in dsk_setup().
 *
 * @since DSK 1.0
 */
function dsk_admin_header_style() {
?>
<style type="text/css" id="dsk-admin-header-css">
/* Shows the same border as on front end */
#headimg {
	border-bottom: 1px solid #000;
	border-top: 4px solid #000;
}
/* If header-text was supported, you would style the text with these selectors:
	#headimg #name { }
	#headimg #desc { }
*/
</style>
<?php
}
endif;

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * To override this in a child theme, remove the filter and optionally add
 * your own function tied to the wp_page_menu_args filter hook.
 *
 * @since DSK 1.0
 */
function dsk_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'dsk_page_menu_args' );

/**
 * Sets the post excerpt length to 40 characters.
 *
 * To override this length in a child theme, remove the filter and add your own
 * function tied to the excerpt_length filter hook.
 *
 * @since DSK 1.0
 * @return int
 */

function dsk_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'dsk_excerpt_length' );

if ( ! function_exists( 'dsk_continue_reading_link' ) ) :
/**
 * Returns a "Continue Reading" link for excerpts
 *
 * @since DSK 1.0
 * @return string "Continue Reading" link
 */
function dsk_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'dsk' ) . '</a>';
}
endif;

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and dsk_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 *
 * @since DSK 1.0
 * @return string An ellipsis
 */
function dsk_auto_excerpt_more( $more ) {
	return ' &hellip;' . dsk_continue_reading_link();
}
add_filter( 'excerpt_more', 'dsk_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 *
 * @since DSK 1.0
 * @return string Excerpt with a pretty "Continue Reading" link
 */
function dsk_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= dsk_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'dsk_custom_excerpt_more' );

/**
 * Remove inline styles printed when the gallery shortcode is used.
 *
 * Galleries are styled by the theme in DSK's style.css. This is just
 * a simple filter call that tells WordPress to not use the default styles.
 *
 * @since DSK 1.2
 */
add_filter( 'use_default_gallery_style', '__return_false' );

/**
 * Deprecated way to remove inline styles printed when the gallery shortcode is used.
 *
 * This function is no longer needed or used. Use the use_default_gallery_style
 * filter instead, as seen above.
 *
 * @since DSK 1.0
 * @deprecated Deprecated in DSK 1.2 for WordPress 3.1
 *
 * @return string The gallery style filter, with the styles themselves removed.
 */
function dsk_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
// Backwards compatibility with WordPress 3.0.
if ( version_compare( $GLOBALS['wp_version'], '3.1', '<' ) )
	add_filter( 'gallery_style', 'dsk_remove_gallery_css' );

if ( ! function_exists( 'dsk_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own dsk_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since DSK 1.0
 */
function dsk_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
			<div class="comment-author vcard">
				<?php echo get_avatar( $comment, 40 ); ?>
				<?php printf( __( '%s <span class="says">says:</span>', 'dsk' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
			</div><!-- .comment-author .vcard -->
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'dsk' ); ?></em>
				<br />
			<?php endif; ?>

			<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
				<?php
					/* translators: 1: date, 2: time */
					printf( __( '%1$s at %2$s', 'dsk' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'dsk' ), ' ' );
				?>
			</div><!-- .comment-meta .commentmetadata -->

			<div class="comment-body"><?php comment_text(); ?></div>

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'dsk' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'dsk' ), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override dsk_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @since DSK 1.0
 * @uses register_sidebar
 */
function dsk_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Sidebar Widget Area', 'dsk' ),
		'id' => 'sidebar-widget-area',
		'description' => __( 'Add widgets here to appear in your sidebar.', 'dsk' ),
		'before_widget' => '<div class="sidebars sidebar-widget-area">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
	
	// Area 2, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Newsletter Widget Area', 'dsk' ),
		'id' => 'newsletter-widget-area',
		'description' => __( 'Add widgets here to appear in your sidebar.', 'dsk' ),
		'before_widget' => '<div class="newsletter-widget-area">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
	
	// Area 2, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Footer Top Widget Area', 'dsk' ),
		'id' => 'footer-top-widget-area',
		'description' => __( 'Add widgets here to appear in your sidebar.', 'dsk' ),
		'before_widget' => '<div class="item"><div class="footer-top-widget-area">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );
	
	// Area 2, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Footer Widget Area', 'dsk' ),
		'id' => 'footer-widget-area',
		'description' => __( 'Add widgets here to appear in your sidebar.', 'dsk' ),
		'before_widget' => '<div class="footer-widget-area">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );

}
/** Register sidebars by running dsk_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'dsk_widgets_init' );

/**
 * Removes the default styles that are packaged with the Recent Comments widget.
 *
 * To override this in a child theme, remove the filter and optionally add your own
 * function tied to the widgets_init action hook.
 *
 * This function uses a filter (show_recent_comments_widget_style) new in WordPress 3.1
 * to remove the default style. Using DSK 1.2 in WordPress 3.0 will show the styles,
 * but they won't have any effect on the widget in default DSK styling.
 *
 * @since DSK 1.0
 */

// function wpdocs_elite_scripts() {
//     wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/js/custom.js', true );
// }
// add_action( 'wp_enqueue_scripts', 'wpdocs_elite_scripts' );


function dsk_remove_recent_comments_style() {
	add_filter( 'show_recent_comments_widget_style', '__return_false' );
}
add_action( 'widgets_init', 'dsk_remove_recent_comments_style' );

if ( ! function_exists( 'dsk_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 * @since DSK 1.0
 */
function dsk_posted_on() {
	printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'dsk' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			esc_attr( sprintf( __( 'View all posts by %s', 'dsk' ), get_the_author() ) ),
			get_the_author()
		)
	);
}
endif;

if ( ! function_exists( 'dsk_posted_in' ) ) :
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 *
 * @since DSK 1.0
 */
function dsk_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'dsk' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'dsk' );
	} else {
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'dsk' );
	}
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;

/**
 * Retrieves the IDs for images in a gallery.
 *
 * @uses get_post_galleries() first, if available. Falls back to shortcode parsing,
 * then as last option uses a get_posts() call.
 *
 * @since DSK 1.6.
 *
 * @return array List of image IDs from the post gallery.
 */


function dsk_get_gallery_images() {
	$images = array();

	if ( function_exists( 'get_post_galleries' ) ) {
		$galleries = get_post_galleries( get_the_ID(), false );
		if ( isset( $galleries[0]['ids'] ) )
		 	$images = explode( ',', $galleries[0]['ids'] );
	} else {
		$pattern = get_shortcode_regex();
		preg_match( "/$pattern/s", get_the_content(), $match );
		$atts = shortcode_parse_atts( $match[3] );
		if ( isset( $atts['ids'] ) )
			$images = explode( ',', $atts['ids'] );
	}

	if ( ! $images ) {
		$images = get_posts( array(
			'fields'         => 'ids',
			'numberposts'    => 999,
			'order'          => 'ASC',
			'orderby'        => 'menu_order',
			'post_mime_type' => 'image',
			'post_parent'    => get_the_ID(),
			'post_type'      => 'attachment',
		) );
	}

	return $images;
}

// /*
//  * My Dashboard Link Account menu
// */
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

	echo get_field("imp_fullwidth_text","option");

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
 * Step 4
 */
// Go to Settings > Permalinks and just push "Save Changes" button.   

// Set User ID 
function set_dfx_max_user_id( $default_max_id ) {
    return 999999;
}
add_filter( 'dfx_random_user_id_max_id', 'set_dfx_max_user_id' );

function set_dfx_min_user_id( $default_max_id ) {
    return 100000;
}
add_filter( 'dfx_random_user_id_min_id', 'set_dfx_min_user_id' );

// end user ID

/**
 * Register the Smart Tag so it will be available to select in the form builder.
 *
 * @link   https://wpforms.com/developers/how-to-create-a-smart-tag-from-an-acf-field/
 *
 */
 
// function wpf_dev_register_smarttag( $tags ) {
  
//     // Key is the tag, item is the tag name.
//     $tags['portfolio_price'] = 'Portfolio Price';
  
//     return $tags;
// }
// add_filter( 'wpforms_smart_tags', 'wpf_dev_register_smarttag' );
  
// /**
//  * Process the Smart Tag.
//  *
//  * @link   https://wpforms.com/developers/how-to-create-a-smart-tag-from-an-acf-field/
//  *
//  */
// function wpf_dev_process_smarttag( $content, $tag ) {
  
//     // Only run if it is our desired tag.
//     if ( 'portfolio_price' === $tag ) {
 
//         //Get the field name from ACF
//         $my_acf_field = get_field( 'portfolio_price', get_the_ID() );
 
//         // Replace the tag with our link.
//         $content = str_replace( '{portfolio_price}', $my_acf_field, $content );
//     }
  
//     return $content;
// }
// add_filter( 'wpforms_smart_tag_process', 'wpf_dev_process_smarttag', 10, 2 );

// Add new stock status options
function filter_woocommerce_product_stock_status_options( $status ) {
    // Add new statuses
   
	$status['pre_order'] = __( 'Pre order Now', 'woocommerce' );
    $status['coming_soon'] = __( 'Coming Soon', 'woocommerce' );


    return $status;
}
add_filter( 'woocommerce_product_stock_status_options', 'filter_woocommerce_product_stock_status_options', 10, 1 );

// Availability text
function filter_woocommerce_get_availability_text( $availability, $product ) {
	
    // Get stock status
    switch( $product->get_stock_status() ) {
			case 'instock':
 			$availability = __( 'In Stock', 'woocommerce' ); 
			break;
        case 'pre_order':
            $availability = __( '<div class="stock-wrapper"><div class="stock-icon"></div> Product has been manufactured and is on the water heading to US.</div>', 'woocommerce' );
        break;
        case 'coming_soon':
            $availability = __( '<div class="stock-wrapper"><div class="stock-icon"></div> Coming soon</div>', 'woocommerce' );
        break;
		
		
    }

    return $availability; 
}
add_filter( 'woocommerce_get_availability_text', 'filter_woocommerce_get_availability_text', 10, 2 );

// Availability CSS class
function filter_woocommerce_get_availability_class( $class, $product ) {
    // Get stock status
    switch( $product->get_stock_status() ) {
        case 'instock':
            $class = 'in-stock';
        break;
			case 'pre_order':
            $class = 'pre-order';
        break;
        case 'coming_soon':
            $class = 'coming-soon';
        break;
		 
    }

    return $class;
}

add_filter( 'woocommerce_get_availability_class', 'filter_woocommerce_get_availability_class', 10, 2 );




add_action( 'admin_enqueue_scripts', 'my_admin_style');

function my_admin_style() {
  wp_enqueue_style( 'admin-style', get_stylesheet_directory_uri() . '/admin-style.css' );
}



 /**
  * Edit my account menu order
  */

 function my_account_menu_order() {
 	$menuOrder = array(
		'dashboard'          => __( 'Dashboard', 'woocommerce' ),
 		'orders'             => __( 'Your Orders', 'woocommerce' ),
 		'downloads'          => __( 'Downloads', 'woocommerce' ),
 		'edit-address'       => __( 'My Locations', 'woocommerce' ),
			'payment-methods'    => __( 'Payment Methods', 'woocommerce' ),
			'log-history'		 => __( 'Important Information', 'woocommerce' ),
 		'edit-account'    	=> __( 'Account Details', 'woocommerce' ),
 		'customer-logout'    => __( 'Logout', 'woocommerce' )
	
 	);
 	return $menuOrder;
 }
 add_filter ( 'woocommerce_account_menu_items', 'my_account_menu_order' );
 
// Add Shortcode
// 
// 


function custom_shortcode() {

	    
	if ( is_user_logged_in() ) {//This is only relevant to users who are logged in. 
	
	    $current_user = wp_get_current_user();//The curent user
	    
	   // $date = strtotime(current_time( 'mysql' ). ' -1 year'); //Today minus one year 
	    
	   // $startdate= date('Y-m-d', $date); //Today minus one year (Y-m-d format) 
	    
	   // $enddate = current_time( 'mysql' ); // Today
	    
	    $search_criteria = array(
	    
	        'status'     => 'active', //Active forms 
	        //'start_date' => $startdate, //Get entires starting one year ago 
	       // 'end_date'   => $enddate,   //upto now
	        'field_filters' => array( //which fields to search
	        
	            array(
	            
	                'key' => 'created_by', 'value' => $current_user->ID, //Current logged in user
	            )
	          )
	        );
	
	    $form_id= 3; //Set the ID of the form to check.
	    
	    // Now the main Gravity form api function to count the entries 
	    // using our custom search criteria.
	    $entry_count = GFAPI::count_entries( $form_id, $search_criteria );
	
	        //Test the output        
	        //echo $current_user->display_name;
	        //echo $form_id;
	        //echo $entry_count;
	        //echo $startdate; 
	        //echo $enddate;
	
	if($entry_count >= "1") { // If they have submitted the form:
	    
	    
		echo do_shortcode('[gravityview id="428"]');
	    
	} else {
	//What to do if they have not submitted the form.  
	  	
	    echo the_field('instruct'); 
		echo do_shortcode('[gravityform id="3" title="true" description="true"]');
	} }
	
	

}


add_shortcode( 'forma', 'custom_shortcode' );

add_filter("pmpro_email_filter", "my_pmpro_email_filter");
function my_pmpro_email_filter($email) {
    $extra_variables = array(
        'user_id' => get_current_user_id()     
    );
    foreach($extra_variables as $key => $value) {
        $email->subject = str_replace("!!" . $key . "!!", $value, $email->subject);
        $email->body = str_replace("!!" . $key . "!!", $value, $email->body);
    }
    return $email;
}


 function billing_onboarding_form($entry,$form ){
	 
				$form_fields = array(
					'billing_location_store' => rgar( $entry, '134' ),		
					'billing_location_number' => rgar( $entry, '13' ),	
					'billing_contact_name' => rgar( $entry, '135' ),	
					'billing_address' => rgar( $entry, '118' ),
					'billing_address_alt' => rgar( $entry, '119' ),
					'city' => rgar( $entry, '30' ),
					'state' => rgar( $entry, '31' ),
					'zip_code' => rgar( $entry, '32' ),
					'country' => rgar( $entry, '33' ),
					'billing_dock' => rgar( $entry, '133' )
				);
	 			$form_fields_shipping = array(
					'shipping_location_store' => rgar( $entry, '136' ),		
					'shipping_location_number' => rgar( $entry, '13' ),	
					'shipping_contact_name' => rgar( $entry, '137' ),
					'shipping_address' => rgar( $entry, '139' ),
					'shipping_address_alt' => rgar( $entry, '140' ),
					'shipping_city' => rgar( $entry, '141' ),
					'shipping_state' => rgar( $entry, '143' ),
					'shipping_zip' => rgar( $entry, '144' ),
					'shipping_country' => rgar( $entry, '145' ),
					'shipping_dock' => rgar( $entry, '138' )
				);
			  	global $wpdb; 
            	$tablename=$wpdb->prefix.'ocwma_billingadress';
				
				//$address_fields = wc()->countries->get_address_fields(get_user_meta(get_current_user_id(), 'billing_country', true));

            	$ocwma_userid= get_current_user_id();
	           $current_user = wp_get_current_user();
			  
			  	$billing_data = array(
					'reference_field' => 'Onboarding form submission',
					'billing_first_name' => $current_user->user_firstname,
					'billing_last_name'	=> $current_user->user_lastname,
					'billing_company' => $form_fields['billing_location_store'],
					'billing_location_contact_name' => $form_fields['billing_contact_name'],
					'billing_phone' => $form_fields['billing_location_number'],
					'billing_address_1' => $form_fields['billing_address'],
					'billing_address_2' => $form_fields['billing_address_alt'],
					'billing_city' => $form_fields['city'],
					'billing_state' => $form_fields['state'],
					'billing_country' => $form_fields['country'],
					'billing_postcode' => $form_fields['zip_code'],
					'billing_loading_dock' => $form_fields['billing_dock']
				);
            	$shipping_data_new = array(
					'reference_field' => 'Onboarding form submission',
					'shipping_first_name' => $current_user->user_firstname,
					'shipping_last_name' => $current_user->user_lastname,
					'shipping_company' => $form_fields_shipping['shipping_location_store'],
					'shipping_phone' => $form_fields_shipping['shipping_location_number'],
					'shipping_contact_name' => $form_fields_shipping['shipping_contact_name'],
					'shipping_address_1' => $form_fields_shipping['shipping_address'],
					'shipping_address_2' => $form_fields_shipping['shipping_address_alt'],
					'shipping_city' => $form_fields_shipping['shipping_city'],
					'shipping_state' => $form_fields_shipping['shipping_state'],
					'shipping_country' => $form_fields_shipping['shipping_country'],
					'shipping_postcode' => $form_fields_shipping['shipping_zip'],
					'shipping_loading_dock' => $form_fields_shipping['shipping_dock']
				);

				$billing_data_serialized=serialize( $billing_data );
				  $wpdb->insert($tablename, array(
                  'userid' =>$ocwma_userid,
                  'userdata' =>$billing_data_serialized,
                  'type' => 'billing' 
              	));

				$shipping_data_serialized=serialize( $shipping_data_new );
				  $wpdb->insert($tablename, array(
                  'userid' =>$ocwma_userid,
                  'userdata' =>$shipping_data_serialized,
                  'type' => 'shipping' 
              	));
		  }
		 
add_action( 'gform_after_submission_3', 'billing_onboarding_form', 1, 2 );


add_filter( 'gform_countries', 'remove_country' );
function remove_country( $countries ) {
    $key = array_search( 'United States', $countries );
    unset( $countries[ $key ] );
    return $countries;
}

add_filter( 'gform_countries', 'add_country' );
function add_country( $countries ) {
    $countries[] = 'US';
    sort( $countries );
    return $countries;
}

add_filter( 'woocommerce_order_number', 'change_woocommerce_order_number' );

function change_woocommerce_order_number( $order_id ) {

    $prefix = 'EG-'; //you can create a random number for prefix
    $order_id = str_ireplace("#", "", $order_id);//remove # before from order id
    $order_id_new = sprintf("%08d", $order_id);

    $new_order_id = $prefix . $order_id_new;
    return $new_order_id;
}

add_filter( 'ure_sort_wp_roles_list', 'sort_wp_roles_list_aphabetically', 10, 1);
function sort_wp_roles_list_aphabetically( $sort ) {
  $sort = true;
  return $sort;
}

remove_action( 'woocommerce_shop_loop_item_title','woocommerce_template_loop_product_title', 10 );

function customize_shop_page_product_title() {

  
    echo '<h2 class="woocommerce-loop-product__title">' . get_the_title() .'</br><span style="color:#df7800">'.get_field('subtitle').'</span></h2>';

}
add_action('woocommerce_shop_loop_item_title','customize_shop_page_product_title');




remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );

function woocommerce_add_custom_text_after_product_title(){

    the_title( '<h3 class="product_title entry-title">',' <span>'.get_field('subtitle').'</span></h3>' );

}
add_action( 'woocommerce_single_product_summary', 'woocommerce_add_custom_text_after_product_title', 5);

add_filter( 'manage_edit-product_columns', 'bbloomer_admin_products_visibility_column', 9999 );
 
function bbloomer_admin_products_visibility_column( $columns ){
   $columns['type'] = 'Type';
   return array_slice( $columns, 0, 3, true ) + array( 'type' => 'Type' ) + array_slice( $columns, 3, count( $columns ) - 3, true );

}
 
add_action( 'manage_product_posts_custom_column', 'bbloomer_admin_products_visibility_column_content', 10, 2 );
 
function bbloomer_admin_products_visibility_column_content( $column, $product_id ){
    if ( $column == 'type' ) {
        $product = wc_get_product( $product_id );
      echo the_field("subtitle");
    }
}

?>
<?php
register_nav_menus(array(
    "primary_menu" => array(
        "theme_location" => "Huvudmeny",
        "menu_class" => "my-primary-menu",
    ),
    "sub_menu" => "Undermeny",
    "footer_menu" => "Footermeny"
));


add_theme_support(
    'post-formats',
    array(
        'link',
        'aside',
        'gallery',
        'image',
        'quote',
        'status',
        'video',
        'audio',
        'chat',
    )
);
add_theme_support('responsive-embeds');
add_theme_support('post-thumbnails');
add_theme_support('widgets');
add_theme_support('woocommerce');
add_theme_support(
    'html5',
    array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
        'navigation-widgets',
    )
);
$bg_defaults = array(
    'default-image'          => '',
    'default-preset'         => 'default',
    'default-size'           => 'cover',
    'default-repeat'         => 'no-repeat',
    'default-attachment'     => 'scroll',
);

// Custom background color
add_theme_support(
    'custom-background',
    array(
        'default-color' => 'd1e4dd',  $bg_defaults
    )
);




function theme_register_widget_areas()
{
    $widget_areas = array(
        array(
            'name' => 'Sidebar Widget Area',
            'id' => 'sidebar-widget-area',
            'description' => 'This is the primary sidebar widget area.',
            'before_widget' => '<div class="sub-sidebar">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ),
        array(
            'name' => 'Footer Widget Area',
            'id' => 'footer-widget-area',
            'description' => 'This is the footer widget area.',
            'before_widget' => '<div class="sidebar">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ),
        array(
            'name' => 'Orientering',
            'id' => 'orientation',
            'description' => 'Dethär är sidomenyn för kategori, författare och arkivinsidan.',
            'before_widget' => '<div class="widget">',
            'after_widget' => '</div>',
            'before_title' => '<h2 class="widget-title">',
            'after_title' => '</h2>',
        ),
        array(
            'name'          => __('Sidomeny', 'text-domain'),
            'id'            => 'custom-sidebar',
            'description'   => __('Detta widget-område visas på de fyra anpassade sidorna.', 'text-domain'),
            'before_widget' => '<div id="sub-menu">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ),
        // Lägg till fler widget-områden här om du behöver.
    );

    foreach ($widget_areas as $widget_area) {
        register_sidebar($widget_area);
    }
}
add_action('widgets_init', 'theme_register_widget_areas');


add_action('init', 'remove_storefront_home_product_categories', 10);
function remove_storefront_home_product_categories()
{
    // Unhook storefront_product_categories() function from 'homepage' action hook
    remove_action('homepage', 'storefront_product_categories', 20);
}

add_action('after_setup_theme', 'remove_actions', 10);
function remove_actions(){
    remove_action( 'woocommerce_after_shop_loop', 'storefront_sorting_wrapper', 9 );
    remove_action( 'woocommerce_after_shop_loop', 'woocommerce_catalog_ordering', 10 );
    remove_action( 'woocommerce_after_shop_loop', 'woocommerce_result_count', 20 );
    remove_action( 'woocommerce_after_shop_loop', 'storefront_woocommerce_pagination', 30 );
    remove_action( 'woocommerce_after_shop_loop', 'storefront_sorting_wrapper_close', 31 );
}

add_action( 'init', 'storefront_remove_storefront_breadcrumbs' );

function storefront_remove_storefront_breadcrumbs() {

   remove_action( 'storefront_before_content', 'woocommerce_breadcrumb', 10 );
}
function hide_shipping_when_free_is_available( $rates, $package ) {
	$new_rates = array();
	foreach ( $rates as $rate_id => $rate ) {
		// Only modify rates if free_shipping is present.
		if ( 'free_shipping' === $rate->method_id ) {
			$new_rates[ $rate_id ] = $rate;
			break;
		}
	}

	if ( ! empty( $new_rates ) ) {
		//Save local pickup if it's present.
		foreach ( $rates as $rate_id => $rate ) {
			if ('local_pickup' === $rate->method_id ) {
				$new_rates[ $rate_id ] = $rate;
				break;
			}
		}
		return $new_rates;
	}

	return $rates;
}

add_filter( 'woocommerce_package_rates', 'hide_shipping_when_free_is_available', 10, 2 );


add_action( 'woocommerce_before_cart_table', 'cart_page_notice' );
 
function get_free_shipping_min_amount () {
    $zone_ids = array_keys( array('') + WC_Shipping_Zones::get_zones() );
    foreach ( $zone_ids as $zone_id ) {
        $shipping_zone = new WC_Shipping_Zone($zone_id);

        $shipping_methods = $shipping_zone->get_shipping_methods( true, 'values' );

        foreach ( $shipping_methods as $instance_id => $shipping_method ) {
            if($shipping_method->id == "free_shipping") {
                return $shipping_method->min_amount;

            }
        }
    }   
}
function cart_page_notice() {
    $min_amount  = (int)get_free_shipping_min_amount();
	$current = WC()->cart->subtotal;
	if ( $current < $min_amount ) {
		$added_text = '<div class="woocommerce-message">Köp produkter för ' . wc_price( $min_amount - $current ) . ' till gratis frakt!<br/>'; 
		$return_to = wc_get_page_permalink( 'shop' );
		$notice = sprintf( '%s<a href="%s">%s</a>', $added_text, esc_url( $return_to ), 'Continue shopping</div>' ); 
		echo $notice;
	}
}

function post_type_stores()
{
$supports = array(
'title', 
'editor',
'author',
'thumbnail',
'excerpt',
'custom-fields',
'comments',
'revisions',
'post-formats',
);
 
$labels = array(
'name' => _x('Butiker', 'plural'),
'singular_name' => _x('Butik', 'singular'),
'menu_name' => _x('Butiker', 'admin menu'),
'name_admin_bar' => _x('Butiker', 'admin bar'),
'add_new' => _x('Lägg till', 'add new'),
'add_new_item' => __('Lägg en ny butik'),
'new_item' => __('Ny butik'),
'edit_item' => __('Redigera butik'),
'view_item' => __('Visa butik'),
'all_items' => __('Alla butiker'),
'search_items' => __('Sök butik'),
'not_found' => __('Inget hittades.'),
);
 
$args = array(
'supports' => $supports, // Vilka "content" delar som ska användas i post-typen
'labels' => $labels, // Namn och text som syns i UI:t
'public' => true, // Om alla användare ska kunna skapa denna post-types
'query_var' => true, // Skapa en query-variabel för post-typen
'rewrite' => array('slug' => 'stores'), // Hur man når post-typen (t.ex. som inläggsida) http://localhost/news/
'has_archive' => false, // Ska post-typen ha arkiv-sida? Likt inlägg
'hierarchical' => true, // Ska de behandlas som sidor (true) eller inlägg (false)?
'menu_icon' => 'dashicons-store'
);
 
register_post_type('stores', $args);
}
 
add_action('init', 'post_type_stores');

add_action( 'init', 'remove_storefront_header_search' );

function remove_storefront_header_search() {

remove_action( 'storefront_header', 'storefront_product_search', 40 );

}


?>

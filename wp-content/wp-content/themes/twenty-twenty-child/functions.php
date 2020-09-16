<?php
/**
 * Twenty Twenty Child functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */

/* ADD PARENT THEME STYLE TO THE NEW CHILD THEME */

add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}

/* HIDE ADMIN BAR - EDITOR ROLE */

add_action('after_setup_theme', 'remove_admin_bar');
 
function remove_admin_bar() {
    if (current_user_can('editor')) {
      show_admin_bar(false);
    }
}

/* NEW CUSTOM POST TYPE CALLED PRODUCTS */

function cw_post_type_products() {
    $supports = array( 'title', 'editor', 'custom-fields');
    $labels = array(
        'name' => _x('products', 'plural'),
        'singular_name' => _x('products', 'singular'),
        'menu_name' => _x('products', 'admin menu'),
        'name_admin_bar' => _x('products', 'admin bar'),
        'add_new' => _x('Add New', 'add new'),
        'add_new_item' => __('Add New Product'),
        'new_item' => __('New product'),
        'edit_item' => __('Edit product'),
        'view_item' => __('View product'),
        'all_items' => __('All products'),
        'search_items' => __('Search product')
    );
    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'public' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'products'),
        'has_archive' => true,
        'hierarchical' => false
    );
    register_post_type('products', $args);
}
add_action('init', 'cw_post_type_products');

/* TAXONOMY CATEGORY TO PRODUCT */

function my_taxonomies_product() {
  $labels = array(
    'name'              => _x( 'Category', 'taxonomy general name' ),
    'singular_name'     => _x( 'Category', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Category' ),
    'all_items'         => __( 'All Categories' ),
    'parent_item'       => __( 'Parent Category' ),
    'parent_item_colon' => __( 'Parent Category:' ),
    'edit_item'         => __( 'Edit Category' ), 
    'update_item'       => __( 'Update Category' ),
    'add_new_item'      => __( 'Add New Category' ),
    'new_item_name'     => __( 'New Category' ),
    'menu_name'         => __( 'Product Categories' ),
  );
  $args = array(
    'labels' => $labels,
    'hierarchical' => true,
  );
  register_taxonomy( 'category', 'products', $args );
}
add_action( 'init', 'my_taxonomies_product', 0 );

/* ADD PRODUCT BOX SHORTCODE */

function product_box_function($atts = '') {
	$value = shortcode_atts( array(
        		'id' => 50,
        		'bg' => red,
    	), $atts );

	if($value['id']){
		$post_box = get_post($value['id']);
		$return_string = '<div class="box_product_short" style="background-color:'.$value['bg'].'"><div class="box_title">'.$post_box->post_title.'</div><div class="box_img"><image src="'.  get_field( 'main_image', $value['id']).'"></div><div class="box_price">'.get_field('price',$value['id']).'</div></div>';
   	}
   return $return_string;
}

function register_shortcodes(){
   add_shortcode('product-box', 'product_box_function');
}

add_action( 'init', 'register_shortcodes');

/* FILTER TO OVERRIDE THE SHORTCODE OUTPUT */

function add_output_to_original( $return_string, $tag ) {
	if ( 'product-box' !== $tag ) {
		return $return_string;
	}
	return $return_string . '<div class="box_prod_additional"></div>';
}
add_filter('do_shortcode_tag', 'add_output_to_original', 10, 2);

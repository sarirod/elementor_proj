<?php

function list_products($param){
	$field = is_numeric($param)?'tag_ID':'slug';

	$args = array(
    		'post_type'=> 'products',
    		'tax_query' => array(
        			array(
            				'taxonomy' => 'category',
            				'field'    => $field,
            				'terms'    => $param
       	 		)
    		)
	);

	$related = get_posts( $args );

	$products = array();

	foreach( $related as $post ) {
		setup_postdata($post);
	
		$product = array(
			 'Title'           => the_title(),
			'Description'  => the_content(),
			'Image'          => get_field('main_image'),
			'Price'            => get_field('price'),
			'Is_on_sale'     => get_field('is_on_sale'),
			'Sale_price'     => get_field('sale_price')
		 );
		array_push($products, $product);
	}
	$jsonstring = json_encode($products);

	return $jsonstring;


}

$category_param = $_GET['category_param'];

list_products($category_param);

?>
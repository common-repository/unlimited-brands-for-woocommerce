<?php


add_action('woocommerce_product_meta_start','woo_ub_add_pet_info' );
function woo_ub_add_pet_info($pet_info) {
    $product_brands = wp_get_post_terms( get_the_ID(), 'brands' );
	
	$arrayKeys = array_keys($product_brands);

	$lastArrayKey = array_pop($arrayKeys);
	
	echo '<div class="brand"><span class="single-product-brands"><p class="lable-brands">brand: </p>';

    foreach ((array)$product_brands as $key => $value) {
         if (is_object($value)) {
            $brand_id = $value->term_id;
            $brand_name = $value->name;
            if($key == $lastArrayKey) {
            	echo ' <a href="' . get_term_link( $value, 'brand' ) . '">' . $brand_name . '</a>';
            }
            else{
            	echo ' <a href="' . get_term_link( $value, 'brand' ) . '">' . $brand_name . '</a>, ';
            }
            
        }
    }
    echo '<span></div>';

}


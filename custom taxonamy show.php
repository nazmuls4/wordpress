<?php 

function cristina_product_tx() {
    register_taxonomy(
        'product_category',  
        'product',                  
        array(
            'hierarchical'          => true,
            'label'                 => 'Product Category',  
            'query_var'             => true,
            'show_admin_column'     => true,
            'rewrite'               => array(
                'slug'              => 'product-category', 
                'with_front'    => true 
                )
            )
    );
}
add_action( 'init', 'cristina_product_tx');



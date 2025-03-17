```php

// These are actions you can unhook/remove!
 
add_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
add_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
 
add_action( 'woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10 );
add_action( 'woocommerce_archive_description', 'woocommerce_product_archive_description', 10 );
 
add_action( 'woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10 );
add_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );
add_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30 );
 
add_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 ); 
 
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
 
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
 
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
 
add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
 
add_action( 'woocommerce_after_shop_loop', 'woocommerce_pagination', 10 );
 
add_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );


```
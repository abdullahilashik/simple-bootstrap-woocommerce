<?php

remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar');

function open_container_row_div_classes()
{
    echo '<div class="container"> <div class="row">';
}
add_action('woocommerce_before_main_content', 'open_container_row_div_classes', 5);

function close_container_row_div_classes()
{
    echo '</div></div>';
}
add_action('woocommerce_after_main_content', 'close_container_row_div_classes', 5);

add_action('template_redirect', 'custom_template_redirect');
function custom_template_redirect()
{
    if (is_shop()) {
        // if this is shop page

        add_action('woocommerce_before_main_content', 'open_product_grid', 6);
        function open_product_grid()
        {
            echo '<div class="col-sm-4">';
        }
        add_action('woocommerce_before_main_content', 'woocommerce_get_sidebar', 7);
        add_action('woocommerce_before_main_content', 'clonse_product_grid', 8);
        function clonse_product_grid()
        {
            echo '</div>';
        }

        add_action('woocommerce_before_main_content', 'open_shop_grid', 9);
        function open_shop_grid()
        {
            echo '<div class="col-sm-8">';
        }
        add_action('woocommerce_before_main_content', 'close_shop_grid', 10);
        function close_shop_grid()
        {
            echo '</div>';
        }
    }
}

// hide page title from the shop page
function hide_shop_page_title($val){
    $val = false;
    return $val;
}

add_filter('woocommerce_show_page_title','hide_shop_page_title');
add_filter('woocommerce_after_shop_loop_item_title','the_excerpt');

// remove the breadcrumb
remove_action('woocommerce_before_main_content','woocommerce_breadcrumb',20);
// remove all notices
remove_action('woocommerce_before_shop_loop','woocommerce_output_all_notices',10);
// remove result count
remove_action('woocommerce_before_shop_loop','woocommerce_result_count',20);
// remove showing the catalog ordering
remove_action('woocommerce_before_shop_loop','woocommerce_catalog_ordering',30);
// remove pagination
remove_action('woocommerce_after_shop_loop','woocommerce_pagination',10);
<?php

add_theme_support('custom-logo', array(
    'height' => 60,
    'width' => 60
));
function custom_theme_support()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('post-formats');
    add_theme_support('featured-content');
    add_theme_support('elementor');
}
add_action('init', 'custom_theme_support');

// custom woocommerce product support
function custom_woocommerce_theme_support()
{
    // woocommerce product support
    add_theme_support('wc-product-gallery-zoom');
    add_theme_support('wc-product-gallery-lightbox');
    add_theme_support('wc-product-gallery-slider');
}
add_action('after_setup_theme', 'custom_woocommerce_theme_support');

if (!function_exists('sbt_enqueue_scripts')) {
    function sbt_enqueue_scripts()
    {
        // style sheet
        wp_enqueue_style('bootstrap-custom-style', get_stylesheet_uri(), array(), '1.0.1', 'all');
        // theme.css
        wp_enqueue_style('sbt-custom-theme-css', get_template_directory_uri() . '/css/theme.css', array(), '1.0.1', 'all');
        // script
        wp_enqueue_script(
            'sbt_custom_script',
            get_template_directory_uri() . '/js/script.js',
            array('jquery'),
            '1.0.1',
            true
        );
    }
}

if (!function_exists('sbt_register_nav_menus')) {
    function sbt_register_nav_menus()
    {
        register_nav_menus(array(
            'primary' => 'Primary Menu',
            'secondary' => 'Secondary Menu',
            'sidebar' => 'Sidebar Menu',
            'footer' => 'Footer Menu'
        ));

        add_theme_support('woocommerce', array(
            'thumbnail_image_width' => '150',
            'single_image_width' => '200',
            "product_grid" => array(
                "default_columns" => 10,
                "min_columns" => 2,
                "max_columns" => 3
            )
        ));
    }
}

add_action('wp_enqueue_scripts', 'sbt_enqueue_scripts');
add_action('after_setup_theme', 'sbt_register_nav_menus');


// filters
function sbt_nav_menu_class_class_li($classes, $item, $args)
{
    $classes[] = 'nav-item';
    return $classes;
}
function sbt_nav_menu_link_attributes($classes, $item, $args)
{
    $classes['class'] = 'nav-link';
    return $classes;
}
add_filter('nav_menu_css_class', 'sbt_nav_menu_class_class_li', 1, 3);
add_filter('nav_menu_link_attributes', 'sbt_nav_menu_link_attributes', 1, 3);


/**
 * WooCommerce hooks and actions and filters
 */
if (class_exists('woocommerce')) {
    include 'include/wc-modifications.php';
}


/**
 * Show cart contents / total Ajax
 */
add_filter('woocommerce_add_to_cart_fragments', 'sbt_woocommerce_header_add_to_cart_fragment');

function sbt_woocommerce_header_add_to_cart_fragment($fragments)
{
    global $woocommerce;

    ob_start();

?>
    <a class="cart-customlocation btn btn-primary" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count); ?> – <?php echo $woocommerce->cart->get_cart_total(); ?></a>
<?php
    $fragments['a.cart-customlocation'] = ob_get_clean();
    return $fragments;
}


// customizer api
function register_custom_customizer_copyright_sbt($wp_customizer) {

    $wp_customizer->add_section('sec_copyright', array(
        'title' => 'Copyright Footer',
        'description' => 'Update copyright text in footer'
    ));

    $wp_customizer->add_setting('set_copyright', array(
        'type' => 'theme_mod',
        'default'=> '',
        'sanitize_callback' => 'sanitize_text_field'
    ));

    $wp_customizer->add_control('set_copyright', array(
        'label' => 'Copyright Footer Label',
        'description' => 'Update your copyright content , texts, year below',
        'section' => 'sec_copyright',
        'type' => 'text'
    ));

    // section of new arrival

    $wp_customizer->add_section('sec_new-arrival', array(
        'title' => 'Product Panel',
        'description' => 'Modify how many products and columns would you like to display in product panel'
    ));

    $wp_customizer->add_setting('set_new-arrival',array(
        'type' => 'theme_mod',
        'default' => 4,
        'sanitize_callback' => 'absint'
    ));
    $wp_customizer->add_control('set_new-arrival', array(
        'label' => 'Limit - New arrival',
        'description' => 'How many products would you like to display?',
        'type' => 'number',
        'section' => 'sec_new-arrival'
    ));

    $wp_customizer->add_setting('set_new-arrival-columns', array(
        'type' => 'theme_mod',
        'default' => 4,
        'sanitize_callback' => 'absint'
    ));
    $wp_customizer->add_control('set_new-arrival-columns', array(
        'label' => 'Columns - New Arrival',
        'description' => 'How many columns would you like to display?',
        'type' => 'number',
        'section' => 'sec_new-arrival'
    ));
   

    $wp_customizer->add_setting('set_popular-items',array(
        'type' => 'theme_mod',
        'default' => 4,
        'sanitize_callback' => 'absint'
    ));
    $wp_customizer->add_control('set_popular-items', array(
        'label' => 'Limit - Popular Items',
        'description' => 'How many products would you like to display?',
        'type' => 'number',
        'section' => 'sec_new-arrival'
    ));

    $wp_customizer->add_setting('set_popular-items-columns', array(
        'type' => 'theme_mod',
        'default' => 4,
        'sanitize_callback' => 'absint'
    ));
    $wp_customizer->add_control('set_popular-items-columns', array(
        'label' => 'Columns - Popular Items',
        'description' => 'How many columns would you like to display?',
        'type' => 'number',
        'section' => 'sec_new-arrival'
    ));

}

add_action('customize_register', 'register_custom_customizer_copyright_sbt');
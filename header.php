<!DOCTYPE html>
<html <?php language_attributes() ?>>
    <head>
        <meta charset="<?= bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="<?php echo bloginfo('description'); ?>" />
        <meta name="author" content="<?= bloginfo('author') ?>" />
        <!-- <title>Blog Home - Start Bootstrap Template</title> -->
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        
        <?php wp_head() ?>
    </head>
    <body <?php body_class(); ?>>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                
                <a class="navbar-brand" href="#!"><?php echo get_custom_logo(); ?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">Contact</a></li>
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#">Blog</a></li>
                    </ul> -->
                    <?php 
                        wp_nav_menu(array(
                            'container' => 'null',
                            'menu_container'=>null,
                            'theme_location' => 'primary',
                            'items_wrap'=> '<ul id="%1$s" class="navbar-nav ms-auto mb-2 mb-lg-0">%3$s</ul>',
                        ));
                    ?>
                    
                    <?php if (is_user_logged_in()): ?>
                        <a class="nav-link" style="color: white; margin: 0 12px" href="<?= get_permalink(get_option('woocommerce_myaccount_page_id')) ?>">My account</a>
                        <a href="<?= wp_logout_url(get_permalink(get_option('woocommerce_myaccount_page_id'))) ?>">Logout</a>
                    <?php else: ?>
                        <a class="nav-link" style="color: white; margin: 0 12px" href="<?= get_permalink(get_option('woocommerce_myaccount_page_id')) ?>">Login</a>
                    <?php endif; ?>
                    
                    <a href="<?= wc_get_cart_url(); ?>" class="cart-customlocation btn btn-primary">
                        Cart
                        <span>(<?= WC()->cart->get_cart_contents_count() ?>)</span>
                    </a>
                </div>
            </div>
        </nav>
        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Welcome to Blog Home!</h1>

                    
                    <p class="lead mb-0">A Bootstrap 5 starter layout for your next blog homepage</p>
                </div>
            </div>
        </header>
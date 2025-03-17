<?php
/**
 * Template Name: Elementor Blank
 */
get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php
        while ( have_posts() ) :
            the_post();
            the_content(); // Elementor will render its content here
        endwhile;
        ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
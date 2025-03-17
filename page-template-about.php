<?php
/*
Template Name: About Page
*/

get_header();
?>

<div class="elementor-page">
    <?php
        while ( have_posts() ) : the_post();
            the_content(); // Allows Elementor to take over
        endwhile;
    ?>    
</div>

<?php get_footer(); ?>

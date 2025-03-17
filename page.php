<?php get_header(); ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-12">
            <!-- Post content-->
            <?php
            if (have_posts()):
                while (have_posts()):
                    the_post();
            ?>
                    <article class="col">
                        <h2><?php the_title(); ?></h2>
                        <p><?php the_content(); ?></p>
                    </article>
            <?php
                endwhile;
            endif;
            ?>
            <!-- Comments section-->
            <?php get_comments(); ?>
        </div>        
    </div>
</div>
<?php get_footer(); ?>
<?php get_header(); ?>
<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- new arrival -->
             <div class="" style="display: flex; flex-direction: column;">
                <h1>New Arrivals</h1>
                <?php echo do_shortcode('[products columns="'.get_theme_mod('set_new-arrival-columns').'" limit="'.get_theme_mod('set_new-arrival').'" orderby="date" order="DESC" class="new-arrivals-custom-class"]') ?>
             </div>
             <div class="" style="display: flex; flex-direction: column;">
                <h1>Popular Items</h1>
                <?php echo do_shortcode('[products columns="'.get_theme_mod('set_popular-items-columns').'" limit="'.get_theme_mod('set_popular-items').'" orderby="popularity" order="DESC" class="popular-items-custom-class"]') ?>
             </div>
             <div class="" style="display: flex; flex-direction: column;">
                <h1>On Sale</h1>
                <?php echo do_shortcode('[products columns="3" limit="3" on_sale="true" class="on-sale-custom-class"]') ?>
             </div>
            <!-- Featured blog post-->
            <?php get_template_part('templates/content', 'featured') ?>
            <!-- Nested row for non-featured blog posts-->
            <div class="row">
                <?php
                if (have_posts()):
                    while (have_posts()):
                        the_post();
                        get_template_part('templates/content', 'article');
                    endwhile;
                endif;
                ?>
            </div>
            <!-- Pagination-->
            <nav aria-label="Pagination">
                <hr class="my-0" />
                <ul class="pagination justify-content-center my-4">
                    <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a></li>
                    <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                    <li class="page-item"><a class="page-link" href="#!">2</a></li>
                    <li class="page-item"><a class="page-link" href="#!">3</a></li>
                    <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                    <li class="page-item"><a class="page-link" href="#!">15</a></li>
                    <li class="page-item"><a class="page-link" href="#!">Older</a></li>
                </ul>
            </nav>
        </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
            <!-- Search widget-->
            <?php get_search_form(); ?>
            <!-- Categories widget-->
            <div class="card mb-4">
                <div class="card-header">Categories</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                <li><a href="#!">Web Design</a></li>
                                <li><a href="#!">HTML</a></li>
                                <li><a href="#!">Freebies</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                <li><a href="#!">JavaScript</a></li>
                                <li><a href="#!">CSS</a></li>
                                <li><a href="#!">Tutorials</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Side widget-->
            <div class="card mb-4">
                <div class="card-header">Side Widget</div>
                <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
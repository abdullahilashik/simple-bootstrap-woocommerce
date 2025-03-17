<?php get_header(); ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- Post content-->
            <?php if(have_posts()): while(have_posts()) : the_post(); ?>
                <article>
                    <!-- Post header-->
                    <header class="mb-4">
                        <!-- Post title-->
                        <h1 class="fw-bolder mb-1"><?php the_title(); ?></h1>                    
                        <?php 
                            the_tags('<ul><li class="badge"><span style="color:black">Tags:</span> ','</li><li class="badge">','</li></ul>')
                        ?>
                    </header>
                    <!-- Preview image figure-->
                    <?php 
                        $image_url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));
                    ?>
                    <figure class="mb-4"><img class="img-fluid rounded" src="<?= $image_url; ?>" alt="..." /></figure>
                    <!-- Post content-->
                    <section class="mb-5" style="width: 100%; overflow: clip;">
                        <?php the_content(); ?>
                    </section>
                </article>
            <?php endwhile; endif; ?>
            <!-- Comments section-->
            <?php get_comments(); ?>
        </div>
        <!-- Side widgets-->
        <div class="col-lg-4">
            <!-- Search widget-->
            <div class="card mb-4">
                <div class="card-header">Search</div>
                <div class="card-body">
                    <div class="input-group">
                        <input class="form-control" type="text" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                        <button class="btn btn-primary" id="button-search" type="button">Go!</button>
                    </div>
                </div>
            </div>
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
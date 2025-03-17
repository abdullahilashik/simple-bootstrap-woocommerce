<div class="card mb-4">
    <?php 
        $url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID()));                
    ?>
    <a href="<?php the_permalink() ?>"><img class="card-img-top" src="<?=$url?>" alt="..." /></a>
    <div class="card-body">
        <div class="small text-muted"><?php the_date(); ?></div>
        <h2 class="card-title h4"><?php the_title(); ?></h2>
        <p class="card-text"><?php the_excerpt(); ?></p>
        <a class="btn btn-primary" href="<?php the_permalink(); ?>">Read more →</a>
    </div>
</div>
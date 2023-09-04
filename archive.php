<?php get_header(); ?>

<div class="c-section l-section-top section-white">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-8">
                <h3 class="section__title u-text-left mb-8">Cards1</h3>
                <div class="row">
                    <?php     
                    while (have_posts()) : the_post(); 
                    ?>

                        <div class="col-12 col-sm-6">
                            <a href="<?php the_permalink($post->ID); ?>" class="c-card u-parent-link mb-8">
                                <div class="card__img" data-bg="<?= get_post_img($post->ID, "post_card"); ?>"></div>
                                <h3 class="card__title"><?= $post->post_title; ?></h3>
                                <p class="card__excerpt"><?= $post->post_excerpt; ?></p>
                                <div class="card__link child-link">Read more</div>
                            </a>
                        </div>

                    <?php endwhile;  ?>
                </div>
                <div class="row">
                    <div class="col-12">
                        <?php Pagination::view(); ?>
                    </div>
                </div>
            </div>
         
        </div>

    </div>
</div>

<?php get_footer(); ?>
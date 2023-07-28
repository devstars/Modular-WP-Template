<?php get_header(); ?>

<?php
include(locate_template('template-parts/banner.php'));
?>

<div class="c-section l-section-top section-white">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-8">
                <h3 class="section__title u-text-left mb-8">Cards</h3>
                <div class="row">
                    <?php 
                  /*   $paged = get_query_var("paged");

                    $id_post = $posts[0]->ID;

                    $args = array(
                        'post_type'      => 'post',
                        'posts_per_page' => 4,
                        'orderby' => 'post_date',
                        'order' => 'desc',
                        'paged'=>$paged,                        
                    );
            
                    $wp_query = new WP_Query($args);   */    
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
                        <?php Pagination::view();
                        //wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <?php get_sidebar(); ?>
            </div>
        </div>

    </div>
</div>

<?php get_footer(); ?>
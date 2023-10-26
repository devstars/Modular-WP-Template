<?php

/**
 * Template Name: Blog
 */

get_header();
?>

<div class="l-section-padding pb-6">
    <div class="container-fluid   section-white">

        <div class="row">

            <div class="col-12 col-xl-10 page-text mx-auto">                
                    <h1 class="u-text-left mb-8"><?php the_title() ?></h1>
                    <?= the_content(); ?>                
            </div>
        </div>
    </div>
</div>

<div class="c-section--post-feed pt-5 pt-lg-16 pb-16 pb-lg-17 section-white ">


    <div class="container-fluid   ">
        <?php
        $paged = get_query_var("paged");

        $args = array(
            'post_type' => 'post',
            'order' => 'DESC',
            'orderby' => 'post_date',
            'post_status' => 'publish',
            'posts_per_page' => get_option('posts_per_page'),
            'paged' => $paged,
        );
        $wp_query = new WP_Query($args);
        ?>
    
        <div class="row l-tiles">
            <?php
            $index = 0;
            while (have_posts()) : the_post();
            ?>

                <div class="col-6 col-lg-3 ">
                    <?php
                    $group = floor($index / 2);
                    $group_lg = floor($index / 4);
                    get_template_part('template-parts/post-tile', null, array("group" => $group, "group_lg" => $group_lg, "block_id" => "blog"));
                    $index++;
                    ?>
                </div>

            <?php endwhile;  ?>

        </div>

        <div class="row ">
            <div class="col-12">
                <?php Pagination::view(); ?>
            </div>
        </div>

    </div>

</div>

<?php get_footer(); ?>
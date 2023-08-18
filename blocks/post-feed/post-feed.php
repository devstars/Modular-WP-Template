<?php

/**
 * Block Post Feed
 */
?>

<?php
//$testimonials = get_field("testimonials");
$settings = get_field("settings");
$categories = get_field("filters");
$content = get_field("content");


$args = array(
    'post_type'      => $settings["post_type"],
    'category__in ' => $categories,
    'posts_per_page' => $settings["show"],
    'orderby' => 'post_date',
    'order' => 'desc',
    'post_status' => array('publish')
);
?>

<div class="c-section--post-feed section-white">
    <div class="container-fluid u-relative">

        <?php
        if ($content["headline_text"]) :
        ?>
            <h2 class="section__title "><?= $content["headline_text"]; ?></h2>
        <?php
        endif;
        ?>

        <?php
        if ($content["body_text"]) :
        ?>
            <p class="section__subtitle "><?= $content["body_text"] ?></p>
        <?php
        endif;
        ?>

        <div class="row mb-10 mb-lg-14">
            <div class="pf__wrapper post-feed-js owl-carousel owl-theme" carousel-id="<?= $block['id'] ?>">

                <?php
                $loop = new WP_Query($args);
                $index = 0;
                while ($loop->have_posts()) : $loop->the_post();
                ?>
                    <div class="col-12 ">
                        <a class="pf__tile" href="<?= get_permalink($loop->post->ID) ?>">

                            <div class="pf__image ratio-js" data-ratio="0.61" style="background-image:url(<?= get_post_img($loop->post->ID, "custom_medium") ?>)" alt="<?= get_post_alt($loop->post->ID) ?>"></div>

                            <h4 class="pf__title align-h-js" data-align="pf-title"> <?= get_the_title($loop->post->ID); ?> </h4>

                            <p class="pf__excerpt align-h-js " data-align="pf-excerpt"> <?= get_the_excerpt($loop->post->ID); ?> </p>

                            <!-- <p class="pf__more tile-hover">Read more</p> -->
                        </a>

                    </div>
                <?php
                endwhile;
                wp_reset_postdata();
                ?>

            </div>

        </div>


        <div class="u-nav ">
            <div class="u-nav l-btns-next-to nav-js" carousel-id="<?= $block['id'] ?>">
                <div class="prev-js o-nav-btn ml-0"> <?= file_get_contents(IMAGES . '/icons/arrow-left.svg'); ?> </div>
                <div class="next-js o-nav-btn mr-auto"> <?= file_get_contents(IMAGES . '/icons/arrow-right.svg'); ?> </div>
            </div>

            <a href="#" class="btn btn--outline-black mr-0 ml-auto">Show All</a>

        </div>






    </div>

</div>



<?php
wp_enqueue_script('post-feed-js', get_template_directory_uri() . '/blocks/post-feed/post-feed.js', array('jquery'), filemtime(get_template_directory() . '/blocks/post-feed/post-feed.js'), false);
?>
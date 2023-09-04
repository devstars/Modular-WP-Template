<?php

/**
 * Block Post Feed
 */
?>

<?php

$id = 'post-feed-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$settings = get_field("settings");
$categories = get_field("filters");
$content = get_field("content");

$data = block_start("post-feed", $block, $settings, "section-white");
$id = $data["id"];
$color_schema = $data["color_schema"];

$args = array(
    'post_type'      => "post",
    'category__in' => $categories,
    'posts_per_page' => $settings["show"],
    'orderby' => 'post_date',
    'order' => 'desc',
    'post_status' => array('publish')
);

?>

<div class="c-section--post-feed  <?= $color_schema ?>" id="<?php echo esc_attr($id); ?>">
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
                        <?php
                        $group = $block['id'] . floor($index / 4);
                        $group_lg = $block['id'] . floor($index / 4);
                        get_template_part('template-parts/post-tile', null, array("group" => $group, "group_lg" => $group_lg));
                        $index++;
                        ?>

                    </div>
                <?php
                endwhile;
                wp_reset_postdata();
                ?>

            </div>

        </div>

        <div class="u-nav ">
            <div class="u-nav l-btns-next-to nav-js" carousel-id="<?= $block['id'] ?>">
                <div class="prev-js o-nav-btn  ml-0"> <?= file_get_contents(IMAGES . '/icons/arrow-left.svg'); ?> </div>
                <div class="next-js o-nav-btn  mr-auto"> <?= file_get_contents(IMAGES . '/icons/arrow-right.svg'); ?> </div>
            </div>

            <?php
            if (!empty($settings["view_all"])) :
            ?>
                <a href="<?= get_permalink(get_option('page_for_posts')); ?>" class="std-btn-tertiary mr-0 ml-auto">Show All</a>
            <?php
            endif;
            ?>

        </div>


    </div>

</div>


<?php
wp_enqueue_script('post-feed-js', get_template_directory_uri() . '/blocks/post-feed/post-feed.js', array('jquery'), filemtime(get_template_directory() . '/blocks/post-feed/post-feed.js'), false);
?>
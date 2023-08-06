<?php

/**
 * Block Name: Banner
 */
?>

<?php

$id = 'banner-' . $block['id'];

$banner = get_field("banner");
$layout = get_field("layout");
$carousel = get_field("carousel");
?>
<div class="u-relative" style="height:890px;">
    <div class=" banner-wrapper banner-js owl-carousel owl-theme ">
        <?php
        foreach ($banner as $slide) :

            $content = $slide["content"];
            $background = $slide["background"];

            $background_image = ($background["image"]) ? "style='background-image:url(" . $background["image"]["sizes"]["extra_large"] . ")'" : "";
            $ctas = $slide["ctas"];

            include($layout["width"] . "-width.php");

        endforeach;
        ?>

    </div>

    <div class="container-fluid banner__nav">
        <div class="row">
            <div class="col-12 ">
                <div class="u-nav ">
                    <div class="t-prev-js nav__btn ml-auto "> <?= file_get_contents(IMAGES . '/icons/arrow-left.svg'); ?>  </div>
                    <div class="t-next-js nav__btn mr-0"> <?= file_get_contents(IMAGES . '/icons/arrow-right.svg'); ?> </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
wp_enqueue_script('banner-js', get_template_directory_uri() . '/blocks/banner/banner.js', array('jquery'), filemtime(get_template_directory() . '/blocks/banner/banner.js'), false);
wp_localize_script('banner-js', 'carouselData', array(
    'autoplay' => $carousel["autoplay"],
    'interval' => $carousel["interval"],
));
?>
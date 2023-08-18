<?php
/**
 * Block Name: Text & Media
 */
?>

<?php

$id = 'banner-' . $block['id'];

$banner = get_field("banner");
$layout = get_field("layout");

$carousel = get_field("carousel");

$color_schema = ($layout["width"] === "half") ? "section-white" : "section-transparent";

$mode = (trim(strtolower($carousel["mode"])) === "carousel") ? "carousel" : "single";
?>
<div class="u-relative <?= $color_schema; ?> ">
    <div class=" banner-wrapper <?= $layout["width"]; ?>  <?= ($mode === "carousel") ? "banner-js owl-carousel owl-theme" : ""; ?>   ">
        <?php
        foreach ($banner as $slide) :

            $content = $slide["content"];
            $background = $slide["background"];

            $background_image = ($background["image"]) ? "style='background-image:url(" . $background["image"]["sizes"]["extra_large"] . ")'" : "";
            $ctas = $slide["ctas"];

            include($layout["width"] . "-width.php");

            if ($mode === "single") break;

        endforeach;
        ?>

    </div>

    <?php if ($mode === "carousel" && $carousel["show_navigation"]) : ?>
        <div class="container-fluid banner__nav <?= $layout["width"]; ?> <?= $layout["image_aligment"]; ?> ">
            <div class="row">
                <?php
                $col_class = "col-12";
                if ($layout["width"] === "half" && $layout["image_aligment"] === "right") {
                    $col_class = "col-6";
                }

                if ($layout["image_aligment"])
                ?>
                <div class="<?= $col_class; ?>">
                    <div class="u-nav ">
                        <div class="tm-prev-js o-nav-btn "> <?= file_get_contents(IMAGES . '/icons/arrow-left.svg'); ?> </div>
                        <div class="tm-next-js o-nav-btn "> <?= file_get_contents(IMAGES . '/icons/arrow-right.svg'); ?> </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

</div>
<?php
if ($mode) {
    wp_enqueue_script('text-media-js', get_template_directory_uri() . '/blocks/text-media/text-media.js', array('jquery'), filemtime(get_template_directory() . '/blocks/text-media/text-media.js'), false);
    wp_localize_script('text-media-js', 'carouselData', array(
        'autoplay' => $carousel["autoplay"],
        'interval' => $carousel["interval"],
    ));
}
?>
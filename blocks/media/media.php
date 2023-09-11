<?php

/**
 * Block Media
 */
?>

<?php
$media = get_field("media");
$settings = get_field("settings");
$layout = strtolower($settings["layout"]);
$mode = strtolower($settings["mode"]);
$content = get_field("content");


$data = block_start("media", $block, $settings, "section-white");
$id = $data["id"];
$color_schema = $data["color_schema"];
?>

<div class="c-section--media u-relative  <?= $color_schema; ?> " id="<?php echo esc_attr($id); ?>">
    <div class="container-fluid    ">
        <?php
        if ($settings["mode"] === "gallery") :
        ?>

            <div class="gallery">
                <?php

                foreach ($content as $image) :

                    if ($layout === "mosaic") :
                ?>
                        <img class="gallery__image " src="<?= $image["image"]["sizes"]["custom_medium"]; ?>">
                    <?php
                    else :
                    ?>
                        <div class="gallery__item ratio-js" data-ratio="1" style="background-image:url(<?= $image["image"]["sizes"]["custom_medium"]; ?>)"></div>
                <?php
                    endif;

                endforeach;
                ?>
            </div>

        <?php
        endif;

        if (strtolower($mode) === "carousel") :

        ?>
            <div class="carousel-wrapper media-carousel-js owl-carousel owl-theme">
                <?php
                foreach ($content as $image) :
                    $image = $image["image"];
                ?>
                    <div class="carousel__image" style="background-image:url(<?= $image["sizes"]["max"]; ?>" alt="<?= $image["alt"] ?>)"></div>
                <?php
                endforeach;
                ?>

            </div>

            <div class="u-nav media-carousel-nav">
                <div class="prev-js o-nav-btn mr-auto"> <?= file_get_contents(IMAGES . '/icons/arrow-left.svg'); ?> </div>
                <div class="next-js o-nav-btn "> <?= file_get_contents(IMAGES . '/icons/arrow-right.svg'); ?> </div>
            </div>




        <?php
        endif;
        ?>

    </div>

    <div class="container-fluid l-nav">
        <div class="row">
            <div class="col-12">

            </div>
        </div>
    </div>

</div>
<?php
wp_enqueue_script('media-js', get_template_directory_uri() . '/blocks/media/media.js', array('jquery'), filemtime(get_template_directory() . '/blocks/media/media.js'), false);
?>
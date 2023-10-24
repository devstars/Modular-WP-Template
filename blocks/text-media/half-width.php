<div class="banner__start">
    <?php
    $data = block_start("tm_slide_" . $index, $block, $settings);
    $id = $data["id"];
    ?>
    <div id="<?= esc_attr($id); ?>" class="c-banner l-section-top  l-half ">

        <div class="container-fluid ">

            <div class="row <?= $settings["image_aligment"]; ?>">
                <div class="col-12 col-xl-6 col__content">
                    <div class="banner__content">
                        <<?= $heading_tag; ?> class="banner__title">
                            <?= $content["title"] ?>
                        </<?= $heading_tag; ?>>

                        <p class="banner__desc">
                            <?= $content["description"] ?>
                        </p>

                        <?php
                        echo btn_from_link($ctas["button_cta_left"], "std-btn-primary mr-3 mb-3 ");
                        ?>
                        <?php
                        echo btn_from_link($ctas["button_cta_right"], "std-btn-secondary mb-3");
                        ?>

                    </div>
                </div>
                <div class="col-12 col-xl-6 pr-0">
                    <?php
                    if ($background["image"]) :
                    ?>
                        <img class="banner__image" src="<?= $background["image"]["sizes"]["extra_large"]; ?>" alt="<?= $background["image"]["alt"] ?>">
                    <?php
                    endif;
                    ?>
                </div>

            </div>

        </div>

    </div>
</div>
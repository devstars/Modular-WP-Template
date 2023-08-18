<div class="c-banner l-section-top u-mask section-transparentt " <?= $background_image; ?>>

    <?php
    if ($background["video"]) :
    ?>
        <video playsinline autoplay muted loop id="introVideo" class="banner__video">
            <source src="<?= $background["video"]["url"] ?>" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
    <?php
    endif;
    ?>

    <div class="container-fluid u-z-index-10">
        <div class="row">
            <div class="col-12 ">
                <div class="banner__content  <?= $layout["horizontal_aligment"] ?>">
                    <h1 class="banner__title">
                        <?= $content["title"] ?>
                    </h1>

                    <p class="banner__desc">
                        <?= $content["description"] ?>
                    </p>

                    <?php
                    echo btn_from_link($ctas["button_cta_left"], "btn btn--yellow hover-white mr-3 mb-3 ");
                    ?>
                    <?php
                    echo btn_from_link($ctas["button_cta_right"], "btn btn--outline-yellow hover-white mb-3");
                    ?>
                </div>
            </div>
        </div>


    </div>
</div>
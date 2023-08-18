<div class="c-banner l-section-top  l-half section-whitee">

    <div class="container-fluid ">
        <div class="row">
            <div class="col-12">
                <div class="row <?= $layout["image_aligment"]; ?>">
                    <div class="col-12 col-xl-6 col__content">
                        <div class="banner__content">
                            <h1 class="banner__title">
                                <?= $content["title"] ?>
                            </h1>

                            <p class="banner__desc">
                                <?= $content["description"] ?>
                            </p>

                            <?php
                            echo btn_from_link($ctas["button_cta_left"], "btn btn--black hover-yellow mr-3 mb-3 ");
                            ?>
                            <?php
                            echo btn_from_link($ctas["button_cta_right"], "btn btn--outline-black hover-yellow mb-3");
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

</div>
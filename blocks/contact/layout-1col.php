<?php
$color_back = $settings["map"] ? "white" : "black";
?>

<?php if ($settings["map"]) : ?>

    <div class="c-section--contact contact__full section-<?= $color_back; ?>">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-12">
                    <?php
                    if ($content["headline_text"]) :
                    ?>
                        <h2 class="section__title mb-0"><?= $content["headline_text"]; ?></h2>
                    <?php
                    endif;
                    ?>

                    <?php
                    if ($content["body_text"]) :
                    ?>
                        <p class="section__subtitle mt-6 mb-0"><?= $content["body_text"] ?></p>
                    <?php
                    endif;
                    ?>

                </div>
            </div>

        </div>

    </div>

    <div id="googleMap" class="contact__map map-js"></div>

<?php
endif;





if ($settings["form"]) :
?>
    <div class="c-section--contact contact__full section-<?= $color_back; ?>">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-12 col-lg-10 mx-auto ">
                    <?php
                    if ($content["headline_text"]) :
                    ?>
                        <h2 class="section__title mb-0 u-text-center"><?= $content["headline_text"]; ?></h2>
                    <?php
                    endif;
                    ?>

                    <?php
                    if ($content["body_text"]) :
                    ?>
                        <p class="section__subtitle mt-6 u-text-center"><?= $content["body_text"] ?></p>
                    <?php
                    endif;
                    ?>

                </div>
            </div>

            <div class="row">
                <div class="col-12 col-lg-10 mx-auto">
                    <?php
                    include("form.php");
                    ?>
                </div>
            </div>
        </div>

    </div>



<?php
endif;
?>
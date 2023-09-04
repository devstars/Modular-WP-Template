<?php if ($settings["map"]) :

    if ($content["headline_text"] || $content["body_text"]) : ?>

        <div class="c-section--contact contact__full <?= $color_schema; ?>" id="<?php echo esc_attr($id); ?>">
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

    <?php
    endif; ?>

    <div id="googleMap" class="contact__map map-js"></div>

<?php endif; ?>

<?php if ($settings["form"]) : ?>
    <div class="c-section--contact  <?= $color_schema; ?>" id="<?php echo esc_attr($id); ?>">
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
<?php endif; ?>

<?php if ($settings["details"]) : ?>

    <div class="c-section--contact  contact__full <?= $color_schema; ?>" id="<?php echo esc_attr($id); ?>">
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
                    <div class="row details__full">
                        <div class="col-12 col-lg-4">
                            <div class="company__data">
                                <div class="label">Address:</div>
                                <div class="data"><?= Configuration::$contact["basic"]["address"]; ?></div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="company__data">
                                <div class="label">Phone(s):</div>
                                <div class="data"><?= Configuration::$contact["basic"]["phone"]; ?></div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <div class="company__data">
                                <div class="label">Email(s):</div>
                                <div class="data"><?= Configuration::$contact["basic"]["email"]; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

<?php endif; ?>
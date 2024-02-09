<?php 
if ($settings["2nd_row"]["column"] === "map") :
    ?> 
    <div id="googleMap" class="contact__map map-js"></div>
    <?php
endif; 

if ($settings["2nd_row"]["column"] === "form" ) : ?>
    <div class="c-section--contact  <?= $color_schema; ?>" id="<?php echo esc_attr($id); ?>">
        <div class="container-fluid ">
  

            <div class="row">
                <div class="col-12 col-lg-10 mx-auto">
                    <?php
                    include("form.php");
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php endif;

if ($settings["2nd_row"]["column"] === "details" ) : ?>

    <div class="c-section--contact  contact__full <?= $color_schema; ?>" id="<?php echo esc_attr($id); ?>">
        <div class="container-fluid ">         
            <div class="row">
                <div class="col-12 col-lg-10 mx-auto">
                    <div class="row details__full">
                        <div class="col-12 col-lg-4">
                            <div class="company__data">
                                <h4 class="label">Address:</h4>
                                <div class="data"><?= Configuration::$contact["basic"]["address"]; ?></div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-4">
                            <div class="company__data">
                                <h4 class="label">Phone(s):</h4>
                                <div class="data"><?= Configuration::$contact["basic"]["phone"]; ?></div>
                            </div>
                        </div>

                        <div class="col-12 col-lg-4">
                            <div class="company__data">
                                <h4 class="label">Email(s):</h4>
                                <div class="data"><?= Configuration::$contact["basic"]["email"]; ?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

<?php endif; ?>
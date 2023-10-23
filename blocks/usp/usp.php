<?php

/**
 * Block Name: usp
 */
?>

<?php

$id = 'usp-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

$settings = get_field("settings");
$images = strtolower($settings["images"]);
$content = get_field("content");

$tiles = get_field("tiles");
$button = btn_from_link($content["button"], "btn btn--black");


$data = block_start("usp", $block, $settings, "section-white");
$id = $data["id"];
$color_schema = $data["color_schema"];

?>

<div id="<?= $id ?>" class="c-section--usp <?= $color_schema; ?> ">

    <div class="container-fluid">
        <<?= $data["h_tag"]; ?> class="section__title"><?= $content["headline_text"]; ?></<?= $data["h_tag"]; ?>>
        <p class="section__subtitle"><?= $content["body_text"] ?></p>

        <div class="row">
            <?php
            //$col_classes = "col-6";
            if (sizeof($tiles) === 3) $col_classes = "col-12 col-md-6 col-lg-4";
            if (sizeof($tiles) === 4) $col_classes = "col-6 col-lg-3";

            foreach ($tiles as $index => $tile) :

                if(sizeof($tiles) === 3){
                    $group = floor($index / 1);
                    $group_md = floor($index / 2);
                    $group_lg = floor($index / 3);
                }elseif(sizeof($tiles) == 4){
                    $group = floor($index / 2);                    
                    $group_lg = floor($index / 4);
                }
                            
            ?>
                <div class="<?= $col_classes ?> ">
                    <?php
                    $button = $tile["button"];
                    if (!empty($button) && $button["url"]) :                        
                        $rel = ($button["target"] === "_blank") ? 'rel="external nofollow"' : '';
                    ?>
                        <a href="<?= $button["url"] ?>" target="<?= $button["target"] ?>" <?= $rel ?> class="usp__tile">
                        <?php
                    else :
                        ?>
                            <a class="usp__tile">
                            <?php
                        endif;
                            ?>

                            <?php
                            if ($images === "icon") :
                            ?>
                                <img class="usp__icon" src="<?= $tile["image"]["sizes"]["medium"] ?>" alt="<?= $tile["image"]["alt"] ?>">
                            <?php
                            else :
                            ?>
                                <div class="usp__image ratio-js" data-ratio="0.61" style="background-image:url(<?= $tile["image"]["sizes"]["custom_medium"] ?>)" alt="<?= $tile["image"]["alt"] ?>"></div>
                            <?php
                            endif;
                            ?>

                            <?php
                            $desc_class = ($images === "icon") ? "l-short" : "";
                            ?>

                            <?php
                            if (sizeof($tiles) == "3") :
                            ?>
                                <h3 class="usp__title <?= $desc_class; ?>  align-h-js " data-block="<?= $block['id'] ?>"  data-align="usp-desc-<?= $group; ?>" data-align-md="usp-desc-<?= $group_md; ?>" data-align-lg="usp-desc-<?= $group_lg; ?>" <?= get_the_excerpt($post->ID); ?>>
                                    <?= $tile["title"] ?>
                                </h3>
                            <?php
                            endif;
                            ?>

                            <?php
                            if (sizeof($tiles) == "4") :
                            ?>
                                <h3 class="usp__title <?= $desc_class; ?>  align-h-js " data-block="<?= $block['id'] ?>"  data-align="usp-desc-<?= $group; ?>" data-align-lg="usp-desc-<?= $group_lg; ?>" <?= get_the_excerpt($post->ID); ?>>
                                    <?= $tile["title"] ?>
                                </h3>
                            <?php
                            endif;
                            ?>



                            <?php
                            $button = $tile["button"];

                            if (!empty($button) && $button["url"]) :
                            ?>
                                <span class="custom-link"><?= $button["title"] ?> </span>
                            <?php
                            endif;
                            ?>

                            </a>
                </div>
            <?php
            endforeach;
            ?>

        </div>


    </div>
</div>
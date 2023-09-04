<?php
/**
 * Block Name: usp
 */
?>

<?php 

$id = 'usp-' . $block['id'];    
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

$settings = get_field("settings");
$images = strtolower($settings["images"]);
$content = get_field("content");

$tiles = get_field("tiles");
$button = btn_from_link($content["button"], "btn btn--black");


$data = block_start("usp", $block, $settings , "section-white");
$id = $data["id"];
$color_schema = $data["color_schema"];

?>

<div id="<?= $id ?>" class="c-section--usp <?= $color_schema; ?> ">

    <div class="container-fluid">
        <h2 class="section__title"><?= $content["headline_text"]; ?></h2>
        <p class="section__subtitle"><?= $content["body_text"] ?></p>

        <div class="row">
            <?php 
            $col_classes = "col-6";
            if(sizeof($tiles) == "3") $col_classes = "col-12 col-md-4";
            if(sizeof($tiles) == "4") $col_classes = "col-6 col-lg-3";

            foreach($tiles as $tile):                
                ?> 
                <div class="<?= $col_classes ?> ">                   
                <?php                 
                if (isset($tile["button"]) && $tile["button"]["url"]) :
                    $rel = ($button["target"] === "_blank") ? 'rel="external nofollow"' : '';
                    ?>
                    <a href="<?= $button["url"] ?>" target="<?= $button["target"] ?>" <?= $rel ?> class="usp__tile">
                    <?php
                else:
                    ?>
                    <a  class="usp__tile">
                    <?php
                endif;   
                ?>
                                    
                    <?php 
                    if($images === "icon"):                        
                        ?> 
                        <img class="usp__icon" src="<?= $tile["image"]["sizes"]["medium"] ?>" alt="<?= $tile["image"]["alt"] ?>">
                        <?php
                    else:
                        ?> 
                        <div class="usp__image ratio-js" data-ratio="0.61"  style="background-image:url(<?= $tile["image"]["sizes"]["custom_medium"] ?>)" alt="<?= $tile["image"]["alt"] ?>"></div>
                        <?php
                    endif;
                    ?>                 
                    
                    <?php 
                    $desc_class = ($images === "icon") ? "l-short" : "";
                    ?>

                    <p class="usp__desc <?= $desc_class; ?>">
                        <?= $tile["description"] ?>
                    </p>

                    <?php 
                    $button = $tile["button"];
                    
                    if (isset($button) && $button) :                        
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



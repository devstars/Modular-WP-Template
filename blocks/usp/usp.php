<?php
/**
 * Block Name: Section Two Columns
 */
?>

<?php 

$id = 'section-usp-' . $block['id'];    

$images = strtolower(get_field("layout")["images"]);
$color_scheme = strtolower(get_field("layout")["color_scheme"]);

$content = get_field("content");

$tiles = get_field("tiles");
$button = btn_from_link($content["button"], "btn btn--black");

?>

<div id="<?= $id ?>" class="c-section--usp section-<?= $color_scheme ?>  ">

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

                    <p class="usp__desc">
                        <?= $tile["description"] ?>
                    </p>

                    <?php 
                    $button = $tile["button"];
                    
                    if (isset($button) && $button) :                        
                        ?>
                        <span class="o-link--yellow"><?= $button["title"] ?> </span>
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



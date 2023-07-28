<?php
/**
 * Block Name: Section Two Columns
 */
?>

<?php 
$title = get_field("title");
$content = get_field("content");
$button = get_field("button");
$id = 'section-text-image-' . $block['id'];    
?>
<div id="<?= $id ?>" class="c-section--text-image">

    <div class="container-fluid l-container-lg">
        <h2 class="section__title"><?php echo $title; ?></h2>

        <div class="row c-row ">
            <div class="col-12 col-md-6 ls-col--lg-left mb-6 mb-md-0">
                <p class="u-text-center u-text-left--md u-white">
                    <?= $content["left"] ?>
                </p>
            </div>
            <div class="col-12 col-md-6 l-col--lg-right ">
                <p class="u-text-center u-text-left--md u-white">
                    <?= $content["right"] ?>
                </p>
            </div>
        </div>

        <?php
        if($button):
            ?> 
            <div class="u-w-100 u-text-center mt-12">
                <a class="btn btn--black" href="<?= $button["url"]?>" target="<?= $button["target"]?>"> <?= $button["title"]; ?></a>
            </div>
            <?php
        endif;
        ?>        

    </div>
</div>



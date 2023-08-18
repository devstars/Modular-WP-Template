<?php
/**
 * Block Name: Clients
 */
?>

<?php
$content = get_field("content");
$tiles = get_field("logotypes");
?>

<div class="c-section--logotypes section-white">
    <div class="container-fluid">
        <h2 class="section__title u-text-center"><?= $content["headline_text"]; ?></h2>
        <p class="section__subtitle u-text-center"><?= $content["body_text"] ?></p>

        <div class="logotypes-wrapper logotypes-js owl-carousel owl-theme " data-id="<?= $block['id']; ?>">
            <?php
            if ($tiles) :
                foreach ($tiles as $tile) :


                    $href = ($tile["url"])  ? "href='" . $tile["url"] . "' rel='external nofollow'" : "";


                    $image = $tile["image"];
            ?>
                    <a <?= $href ?> class="l__tile">
                        <img class="l__icon" src="<?= $image["sizes"]["medium"]; ?>" alt="<?= $image["alt"]; ?>">
                    </a>

            <?php
                endforeach;
            endif;
            ?>
        </div>

        <div class="u-nav l-btns-next-to">
            <div class="l-prev-js o-nav-btn ml-auto"> <?= file_get_contents(IMAGES . '/icons/arrow-left.svg'); ?> </div>
            <div class="l-next-js o-nav-btn mr-auto"> <?= file_get_contents(IMAGES . '/icons/arrow-right.svg'); ?> </div>
        </div>
    </div>
</div>

<?php
wp_enqueue_script('clients-js', get_template_directory_uri() . '/blocks/clients/clients.js', array('jquery'), filemtime(get_template_directory() . '/blocks/clients/clients.js'), false);
?>
<?php
/**
 * Block Name: Team
 */
?>

<?php
$content = get_field("content");
$tiles = get_field("tiles");
?>
<div class="c-section--team section-black u-overflow-hidden">
    <div class="container-fluid">
        <h2 class="section__title "><?= $content["headline_text"]; ?></h2>
        <p class="section__subtitle "><?= $content["body_text"] ?></p>
    </div>
    <div class="container-fluid ">        

        <div class="row u-cols-reverse">
            <div class="col-12 col-lg-5 mb-8 mb-lg-0 u-relative">
                <div class="team__content">
                    <h3 class="member__name m-name-js">  </h3>
                    <p class="member__position m-position-js"></p>
                    <p class="member__email m-email-js"></p>
                    <p class="member__phone m-phone-js"></p>
                    <p class="member__description m-description-js"></p>

                    <a class="member__social member-linkedin-js" href="">
                        <?= file_get_contents(IMAGES . '/icons/linkedin-frame.svg'); ?>
                    </a>
                </div>

                <div class="team__nav l-btns-vertical team-nav-js" carousel-id="<?= $block['id'] ?>">
                    <div class="t-next-js o-nav-btn "> <?= file_get_contents(IMAGES . '/icons/arrow-right.svg'); ?> </div>
                    <div class="t-prev-js o-nav-btn "> <?= file_get_contents(IMAGES . '/icons/arrow-left.svg'); ?> </div>
                </div>

            </div>
            <div class="col-12 col-lg-7 u-relative">
                <div class="team-wrapper team-js owl-carousel owl-theme " carousel-id="<?= $block['id'] ?>">
                    <?php
                    if ($tiles) :
                        $member_data = array();
                        foreach ($tiles as $index => $tile) :    
                            $teamData[$index]["name"] = $tile["basic"]["name"];
                            $teamData[$index]["position"] = $tile["basic"]["position"];

                            $teamData[$index]["position"] = $tile["additional"]["email"];
                            $teamData[$index]["phone"] = $tile["additional"]["phone"];
                            $teamData[$index]["description"] = $tile["additional"]["description"];
                            $teamData[$index]["linkedin"] = $tile["additional"]["linkedin"];
                        ?>
                            <img data-index="<?= $index; ?>" src="<?= $tile["basic"]["image"]["sizes"]["custom_medium"] ?>" alt=" <?= $tile["basic"]["image"]["alt"] ?>">
                        <?php
                        endforeach;
                    endif;
                    ?>
                </div>

            </div>
        </div>


    </div>
</div>

<?php
$ver = filemtime(get_template_directory() . '/blocks/team/team.js');
$teamData["ver"] = $ver;
$teamData = json_encode($teamData);
wp_enqueue_script('team-js', get_template_directory_uri() . '/blocks/team/team.js', array('jquery'), $ver, false);
wp_localize_script('team-js', 'teamData', $teamData);
?>
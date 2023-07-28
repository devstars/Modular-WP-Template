<?php

/**
 * Template Name: Home
 */

get_header();
?>

<?php
$scroll_down = true;
include(locate_template('template-parts/banner.php'));
?>

<div class="c-section l-section-top">
    <div class="container-fluid">
        <h1 class="section__title u-text-left">Title</h1>
        <div class="row">
            <div class="col-12">
                <?php
                $text_area = get_field("text_area");
                echo $text_area;

                echo "<br>";

                $editor = get_field("edytor_test");
                echo $editor;
                ?>
            </div>
        </div>
    </div>
</div>
<div class="c-section">
    <div class="container-fluid">
        <div class="u-nav">
            <div class="ml-0 mr-auto ml-lg-auto mr-lg-0">1</div>
            <div class="ml-0 mr-0">2</div>

        </div>
    </div>
</div>



<?php //get_template_part('template-parts/load-carousel'); ?>
<?php //get_template_part('template-parts/section-testimonials'); ?>

<div class="scroll-to-js"></div>
<?php //get_template_part('template-parts/section-form'); ?>
<?php get_template_part("template-parts/modal-support"); ?>

<?php get_footer(); ?>
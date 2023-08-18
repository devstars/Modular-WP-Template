<?php

/**
 * Block Testimonials
 */
?>

<?php
$testimonials = get_field("testimonials");
?>

<div class="c-section--testimonials section-white">
    <div class="container-fluid u-relative">
        <div class="testimonials-wrapper testimonials-js owl-carousel owl-theme">

            <?php
            foreach ($testimonials as $testimonial) :
            ?>
                <div class="t__content">
                    <p class="t__quote"><?= $testimonial["quote"]; ?></p>
                    <div class="u-nav">
                        <p class="t__name"> <?= $testimonial["name"]; ?></p>
                        <p class="t__company"> <?= $testimonial["company"]; ?></p>
                    </div>
                </div>
            <?php
            endforeach;
            ?>

        </div>

        <div class="t__nav l-btns-vertical team-nav-js" >
            <div class="next-js o-nav-btn "> <?= file_get_contents(IMAGES . '/icons/arrow-right.svg'); ?> </div>
            <div class="prev-js o-nav-btn "> <?= file_get_contents(IMAGES . '/icons/arrow-left.svg'); ?> </div>
        </div>
    </div>

</div>



<?php
wp_enqueue_script('testimonials-js', get_template_directory_uri() . '/blocks/testimonials/testimonials.js', array('jquery'), filemtime(get_template_directory() . '/blocks/testimonials/testimonials.js'), false);
?>
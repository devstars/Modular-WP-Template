<div class="banner__start">

    <div class="c-banner l-text">

        <div class="container-fluid u-z-index-10 <?= $carousel["horizontal_aligment"] ?>">
            <div class="row">
                <div class="col-12">
                    <div class="banner__content ">

                        <?php if($content["title"]): ?>

                        <<?= $heading_tag; ?> class="banner__title">
                            <?= $content["title"] ?>
                        </<?= $heading_tag; ?>>

                        <?php endif; ?>

                        <?php if($content["description"]): ?>

                        <div class="banner__desc wysiwyg">
                            <?= $content["description"] ?>
                        </div>

                        <?php endif; ?>                        

                        <?php 
                        if(isset($ctas["button_cta_left"]) && $ctas["button_cta_left"] || isset($ctas["button_cta_right"]) && $ctas["button_cta_right"]) :
                            ?> 
                            <div class="desc__bottom"></div>
                            <?php
                        endif;                        
                        ?>

                        <?php
                        $mr = isset($ctas["button_cta_right"]) && $ctas["button_cta_right"]  ? "mr-3" : "";
                                        
                        $btn_class_1 = ($color_schema === "section-bright") ? "std-btn-primary" : "btn btn--highlighted hover-white";
                        $btn_class_2 = ($color_schema === "section-bright") ? "std-btn-secondary" : "btn btn--outline-highlighted hover-white";


                        echo btn_from_link($ctas["button_cta_left"], $btn_class_1  . " "  . $mr);
                        ?>
                        <?php
                        echo btn_from_link($ctas["button_cta_right"], $btn_class_2);
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
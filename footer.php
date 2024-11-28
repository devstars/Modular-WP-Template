<?php get_template_part('template-parts/load-gallery');
?>

<script>
    // Prevent default scroll behavior on page load
    window.addEventListener('DOMContentLoaded', (event) => {
        if (window.location.hash) {
            event.preventDefault();
            // Clear the hash temporarily to prevent scroll
            const hash = window.location.hash;
            window.location.hash = '';


            setTimeout(() => {
                window.location.hash = hash;

                jQuery("html, body").scrollTop(0).delay(700);

                if (jQuery(window.location.hash).length) {
                    jQuery('html,body').animate({
                        scrollTop: jQuery(window.location.hash).offset().top - 100
                    }, 500);
                }

            }, 500);
        }
    });

    // Prevent automatic scrolling on hash change
    window.addEventListener('hashchange', (event) => {
        event.preventDefault();
    });
</script>
<?php wp_footer(); ?>

<?php //get_template_part('template-parts/load-recaptcha'); 
?>
<?php get_template_part('template-parts/load-recaptcha-v3'); ?>

<?php
$f_data = Configuration::$fields["footer"];

$block = array("id" => "footer", "anchor" => "footer");
$data = block_start("FAQ", $block, $f_data["settings"]);
$id = $data["id"];

$color_schema = $data["color_schema"];


$col_fourth = ($f_data["fourth_column"]["content"] || $f_data["fourth_column"]["heading"]) ? true : false;
$col_class = ($col_fourth) ? "col-lg-3"  : "col-lg-4";
?>

<footer class="c-footer footer-js <?= $color_schema; ?>" id="<?php echo esc_attr($id); ?>">
    <div class="container-fluid">
        <div class="row row__top">
            <div class="col-12 <?= $col_class; ?>">
                <h2 class="col__title"><?= $f_data["first_column"]["heading"] ?></h2>
                <p class="wysiwyg">
                    <?= $f_data["first_column"]["content"] ?>
                </p>
            </div>
            <div class="col-12 <?= $col_class; ?>">
                <h2 class="col__title"><?= $f_data["second_column"]["heading"] ?></h2>

                <p class="wysiwyg">
                    <?= $f_data["second_column"]["content"] ?>
                </p>
            </div>
            <div class="col-12 <?= $col_class; ?>">
                <h2 class="col__title"><?= $f_data["third_column"]["heading"] ?></h2>

                <?php
                if ($f_data["third_column"]["content"]):
                ?>
                    <div class="wysiwyg mb-4">
                        <?= do_shortcode($f_data["third_column"]["content"]) ?>
                    </div>
                <?php
                endif;
                ?>

            </div>

            <?php
            if ($col_fourth):
            ?>
                <div class="col-12 col-lg-3">
                    <h2 class="col__title"><?= $f_data["fourth_column"]["heading"] ?></h2>

                    <?php
                    if ($f_data["fourth_column"]["content"]):
                    ?>
                        <div class="wysiwyg mb-4">
                            <?= do_shortcode($f_data["fourth_column"]["content"]) ?>
                        </div>
                    <?php
                    endif;
                    ?>
                </div>
            <?php
            endif;
            ?>
        </div>

        <div class="row row__bottom">
            <div class="col-6 col-lg-3 col-xl-2 bottom__left">
                <p class="footer__copyrights">© <?= Configuration::$company_name ?> <?= date('Y'); ?> </p>
            </div>

            <div class="col-12 col-lg-6 col-xl-8 bottom__mid u-order-first u-order-lg-initial">
                <ul class="footer__menu ml-0">
                    <?php
                    $menu_footer = new Menu('footer');
                    $menu_footer->view();
                    ?>
                </ul>
            </div>

            <div class="col-6 col-lg-3 col-xl-2 bottom__right">
                <p class="made-by"> <span>Website by</span> <a href="https://www.devstars.com/" target="_blank" rel="external nofollow">Devstars</a></p>
            </div>
        </div>
    </div>
</footer>

<script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js" defer></script>

<script>
    (function() {
        lazyLoadCss('//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css');
    })();
    window.addEventListener("load", function() {
        window.cookieconsent.initialise({
            "content": {
                "message": "On our site we use cookies, to help deliver the best experience for you and to also let us know how visitors use our website. If you are happy for us to use cookies whilst you view our site, please hit \"Agree\". If you would like more information, please find this in our ",
                "dismiss": "Agree",
                "link": "Privacy Policy",
                "href": "<?= get_privacy_policy_url(); ?>"
            },
            "position": "bottom-left"
        })
    });
</script>

</body>

</html>
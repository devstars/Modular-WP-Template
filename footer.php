<?php get_template_part('template-parts/load-gallery'); ?>

<?php wp_footer(); ?>

<?php //get_template_part('template-parts/load-recaptcha'); 
?>
<?php get_template_part('template-parts/load-recaptcha-v3'); ?>

<?php
echo "kolory<br>";
$b = isColorBlack("#303030");
echo $b . "<br>";
$w = isColorWhite("#dddddd");
echo $w . "<br>";
$w = isColorWhite("#e2aaaa");
echo $w . "<br>";
$w = isColorWhite("#ede3e3");
echo $w . "<br>";

$f_data = Configuration::$fields["footer"];


$block = array("id" => "footer", "anchor" => "footer");
$data = block_start("FAQ", $block, $f_data["settings"]);
$id = $data["id"];
$color_schema = $data["color_schema"];
?>
<footer class="c-footer footer-js <?= $color_schema; ?>" id="<?php echo esc_attr($id); ?>">
    <div class="container-fluid">
        <div class="row row__top">

            <div class="col-12 col-lg-6 top__left">
                <h2 class="col__title"><?= $f_data["first_column"]["heading"] ?></h2>
                <p class="wysiwyg">
                    <?= $f_data["first_column"]["content"] ?>
                </p>
            </div>

            <div class="col-12 col-lg-6 ">
                <div class="row">
                    <div class="col-6 top__middle">
                        <h2 class="col__title"><?= $f_data["second_column"]["heading"] ?></h2>

                        <p class="wysiwyg">
                            <?= $f_data["second_column"]["content"] ?>
                        </p>

                    </div>
                    <div class="col-6 top__right">
                        <h2 class="col__title"><?= $f_data["third_column"]["heading"] ?></h2>

                        <?php
                        if ($f_data["third_column"]["content"]):
                        ?>
                            <p class="wysiwyg mb-4">
                                <?= $f_data["third_column"]["content"] ?>
                            </p>
                        <?php
                        endif;
                        ?>

                        <?php
                        foreach (Configuration::$socials as $index => $social) :
                        ?>
                            <a href="<?= $social["url"] ?>" class="c-media icon-link">

                                <?= file_get_contents(IMAGES . '/icons/' . strtolower($social["name"]) . '.svg'); ?>

                                <p class="media-body">
                                    <?= $social["name"]; ?>
                                </p>

                            </a>

                        <?php
                        endforeach;
                        ?>

                    </div>
                </div>

            </div>
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
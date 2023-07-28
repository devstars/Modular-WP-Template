<?php wp_footer(); ?>
<footer class="c-footer section-black footer-js">
    <div class="container-fluid">
        <div class="row row__top">
            <div class="col-12 col-lg-6">
                <h2 class="footer__title">Lorem ipsum</h2>
                <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>


            </div>
            <div class="col-12 col-lg-6">
                <div class="row">
                    <div class="col-6">
                        <h2 class="footer__title">Key Links</h2>

                    </div>
                    <div class="col-6">
                        <h2 class="footer__title">Follow Us</h2>

                    </div>
                </div>

            </div>
        </div>

        <div class="row row__bottom">
            <div class="col-6 col-lg-3 col-xl-2 col__left">
                <p class="footer__copyrights">© <?= Configuration::$company_name ?> <?= date('Y'); ?> </p>
            </div>

            <div class="col-12 col-lg-6 col-xl-8 col__mid u-order-first u-order-lg-initial">
                <ul class="footer__menu ml-0">
                    <?php
                    $menu_footer = new Menu('footer');
                    $menu_footer->view();
                    ?>
                </ul>
            </div>

            <div class="col-6 col-lg-3 col-xl-2 col__right">
                <p>Website by <a class="made-by" href="https://www.devstars.com/" target="_blank" rel="external nofollow"> Devstars</a></p>
            </div>
        </div>
    </div>
</footer>
</body>

</html>
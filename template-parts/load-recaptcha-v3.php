<script src="https://www.google.com/recaptcha/api.js?render=<?= Configuration::$rc_site_key ?>"></script>

<script>
    const rcAll = document.querySelectorAll(".g-recaptcha-v3");


    if (document.querySelector(".g-recaptcha-v3")) {
        setTimeout(() => {
            document.querySelector(".grecaptcha-badge").classList.add("visible");
        }, 1000);

    }

    /*     var onloadCallback = function() {


            window.rcArr = [];
            const rcAll = document.querySelectorAll(".g-recaptcha-v3");


            rcAll.forEach((item, index) => {

                const itemId = item.parentElement.parentElement.getAttribute("id");

                if (!item.classList.contains("active")) {
                    item.classList.add("active");
                    window.rcArr[itemId] = grecaptcha.render(item, {
                        'sitekey': "<?= Configuration::$rc_site_key ?>"
                    });

                }
                captchaContainer = grecaptcha.render(item, {
                    'sitekey': "<?= Configuration::$rc_site_key ?>"
                });
                window.rcArr[itemId] = captchaContainer;
            });

        } */
</script>
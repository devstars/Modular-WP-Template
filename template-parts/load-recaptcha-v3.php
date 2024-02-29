<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=<?= Configuration::$rc_site_key ?>"></script>

<script>
    var onloadCallback = function(){     
        const rc = document.querySelector(".g-recaptcha-v3");
        
        if(!rc.classList.contains("active")){
            rc.classList.add("active");
            window.rc_id = grecaptcha.render(rc, {
                'sitekey': "<?= Configuration::$rc_site_key ?>" 
            });         
            
            /* grecaptcha.ready(function(){
                document.querySelector("#banner-form .btn-submit-js").disabled = false;
            }); */
            
        }            
    }



    /*     window.rcArr = [];
        window.addEventListener("load", function() {
            const forms = document.querySelectorAll(".form-rc-js");        

            forms.forEach((form, index) => {
                form.querySelectorAll(".field-js").forEach(
                    (item, index) => {                    
                        item.addEventListener("click", recatpchaOn, false);   
                        item.form = form;                 
                    }
                );
                    
            });
        });


        function recatpchaOn(evt) {        

            const form = evt.currentTarget.form;                

            var captchaContainer = null;
            const rc = form.querySelectorAll(".recaptcha-js");        

            rc.forEach((item, index) => {
                item.classList.add("mb-4");
                captchaContainer = grecaptcha.render(item, {
                    'sitekey': "<?= Configuration::$rc_site_key ?>"
                });             
                window.rcArr[item.id] = captchaContainer;            
            });

            form.querySelectorAll(".field-js").forEach(
                (item, index) => {
                    item.removeEventListener("click", recatpchaOn);
                    item.form = "";
                }
            );

        }; */
</script>
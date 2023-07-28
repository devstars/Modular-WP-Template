<?php
wp_enqueue_script('baguetteBox-js', get_template_directory_uri() . '/js/baguetteBox/baguetteBox.js', array(), false, true);
wp_enqueue_style( 'baguetteBox-css',get_stylesheet_directory_uri() . '/js/baguetteBox/baguetteBox.css');
?>

<script>
    (function($) {        

        $(document).ready(
            function() {
                if ($(".wp-block-gallery, .wp-block-image").length > 0) {

                    $('.page-text .wp-block-gallery').find("a > img").parent().addClass("skip");
                    baguetteBox.run('.wp-block-gallery');
                    
                    var numItems = $('.page-text a > img').length;
                    if (numItems > 0) {
                        $(".page-text a > img").each(function() {
                            img = $(this).parent();
                            if (!img.hasClass("skip")) {
                                imgsrc = this.src;
                                wrapper = img.wrap("<span class='lightbox-wrapper'></span>");
                                $(this).css("cursor","pointer");
                            }

                        });

                        baguetteBox.run(".lightbox-wrapper", {
                            captions: true,
                        });
                    }         
                }
            }
        );
    }(jQuery));

    

</script>
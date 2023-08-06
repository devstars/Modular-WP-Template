<?php
wp_enqueue_script('owlcarousel-js', get_template_directory_uri() . '/js/owlcarousel/owl.carousel.min.js', array(), '1', true);
wp_enqueue_style('owl-style', THEME .'/js/owlcarousel/owl.carousel.min.css');
wp_enqueue_style('owl-style-default', THEME .'/js/owlcarousel/owl.theme.default.min.css');
?>
<!--     <script>
        (function() {    
            lazyLoadCss('<?= THEME ?>/js/owlcarousel/owl.carousel.min.css');
            lazyLoadCss('<?= THEME ?>/js/owlcarousel/owl.theme.default.min.css');        
        })();
    </script> -->
<?php
?>

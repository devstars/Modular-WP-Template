<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?php
        wp_title();
        ?>
    </title>
    <!-- <link rel="shortcut icon" href="<?= get_template_directory_uri() ?>/images/favicon/favicon.ico"> -->
    <link rel="icon" type="image/png" sizes="32x32" href="<?= Configuration::$favicon; ?>">
    <!-- <link rel="apple-touch-icon-precomposed" href="<?= get_template_directory_uri() ?>/images/favicon/mstile-150x150.png"> -->
    <script>
        const ajaxUrl = "<?php echo admin_url('admin-ajax.php'); ?>";
        const themeUri = '<?= THEME_URI ?>';
    </script>

    <?php get_template_part('template-parts/load-carousel');  ?>

    <?php wp_head(); ?>

    <?= Configuration::get_root_styles(); ?>

    <script>
        function lazyLoadCss(href) {
            var css = document.createElement('link');

            css.type = 'text/css';
            css.rel = 'stylesheet';
            css.href = href;

            var s = document.getElementsByTagName('link')[0];

            s.parentNode.insertBefore(css, s);
        }
    </script>

    <style>
        @media screen and (min-width: <?=  Configuration::$menu_top_breakpoint; ?>) {

            .nav-top__logo {
                min-width: 260px !important;
            }

            .menu-top {
                display: block !important;
            }

            .btns__wrapper {
                display: flex !important;
            }

            .c-toggler {
                display: none !important;
            }

            .nt__background {
                height: 122px !important;
            }

            .menu-mobile-wrapper{
                display: none;
            }

        }
    </style>


</head>

<body <?php body_class(); ?>>

    <?php
    global $post;
    $post_blocks = parse_blocks($post->post_content);

    if ($post_blocks[0]["blockName"] === "acf/text-media") {
        $nav_class = $post_blocks[0]["attrs"]["data"]["carousel_width"] === "full" ? "section-transparent" : "";
        $wrapper_class .= $post_blocks[0]["attrs"]["data"]["carousel_width"] === "half" ? " l-margin-top" : "";
    } else {
        $wrapper_class .= "l-section-top";
    }

    $h_fields = Configuration::$fields["header"];
    $scheme_colors = trim(strtolower($h_fields["color_scheme"]));

    $components_color = ($scheme_colors === "white") ? "black" : "white";
    $logo_white_url = $h_fields["nav"]["logo"]["white"]["sizes"]["thumbnail"];
    $logo_black_url = $h_fields["nav"]["logo"]["black"]["sizes"]["thumbnail"];

    $btn_cta_type = Configuration::$fields["header"]["nav"]["cta_group"]["type"];
    $btn_cta_colour = Configuration::$fields["header"]["nav"]["cta_group"]["colour"];
    $btn_cta = store_content_of_function('btn_from_link', [Configuration::$fields["header"]["nav"]["cta_group"]["link"], "btn btn-header $btn_cta_type"]);
    ?>

    <div class="c-nav-top nav-top-js section-<?= $scheme_colors; ?> <?= $nav_class ?> ">

        <div class="container-fluid pl-3 pr-3">

            <div class="u-nav">
                <a class="nav-top__logo u-relative ml-0 mr-auto" href="<?= home_url(); ?>">
                    <img class="logo--white" src="<?= $logo_white_url ?>" alt="logo">
                    <img class="logo--black" src="<?= $logo_black_url ?>" alt="logo">
                </a>

                <ul class="menu-top <?= ($btn_cta) ? "" : "ml-auto mr-0"; ?>">
                    <?php
                    $menu_top = new Menu('top');
                    $menu_top->view();
                    ?>
                </ul>

                <?php
                if ($btn_cta) :
                ?>
                    <div class="btns__wrapper ml-auto mr-0">
                        <?php
                        echo $btn_cta;
                        ?>
                    </div>
                <?php
                endif;
                ?>

                <button class="c-toggler hamburger-js ml-auto mr-0 " type="button" aria-expanded="false">
                    <span class="toggler__lines"></span>
                </button>
            </div>

        </div>


    </div>

    <?php if ($scheme_colors === "black") : ?>
        <div class="nt__background"></div>
    <?php endif; ?>

    <div class="menu-mobile-wrapper section-<?= $scheme_colors; ?> menu-mobile-js ">
        <div class="container-fluid">
            <div class="menu-mobile">
                <ul class="menu-mobile-list">
                    <?php
                    $menu_top = new Menu('top');
                    $menu_top->view();
                    ?>
                </ul>
            </div>
        </div>
    </div>



    <div class="<?= $wrapper_class ?>"></div>
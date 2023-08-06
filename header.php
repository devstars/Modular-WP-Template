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
    <script>
        var ajaxUrl = "<?php echo admin_url('admin-ajax.php'); ?>";
    </script>


    <?php get_template_part('template-parts/load-carousel');  ?>

    <?php wp_head(); ?>
        
    <?= Configuration::get_root_styles(); ?>
</head>

<body <?php body_class(); ?>>

    <?php
    global $post;
    $post_blocks = parse_blocks($post->post_content);    

    //$transparent_header = get_field("transparent_header") ? "section-transparent" : "";
    if($post_blocks[0]["blockName"] === "acf/banner"){        
        $transparent_header = $post_blocks[0]["attrs"]["data"]["layout_width"] === "full" ? "section-transparent" : "";
    }

    
    $h_fields = Configuration::$fields["header"];
    $scheme_colors = trim(strtolower($h_fields["color_scheme"]));

    $components_color = ($scheme_colors === "white") ? "black" : "white";
    $logo_white_url = $h_fields["nav"]["logo"]["white"]["sizes"]["thumbnail"];
    $logo_black_url = $h_fields["nav"]["logo"]["black"]["sizes"]["thumbnail"];
    
    $btn_cta = store_content_of_function('btn_from_link', [Configuration::$fields["header"]["nav"]["cta"], "btn btn-header"]);
    ?>

    <div class="c-nav-top nav-top-js section-<?= $scheme_colors; ?> <?= $transparent_header ?> ">

        <div class="container-fluid pl-3 pr-3">

            <div class="u-nav">
                <a class="nav-top__logo u-relative ml-0 mr-auto" href="<?= home_url(); ?>">
                    <img class="logo--white" src="<?= $logo_white_url ?>" alt="logo">
                    <img class="logo--black" src="<?= $logo_black_url ?>" alt="logo">
                </a>

                <ul class="menu-top d-none d-lg-block <?= ($btn_cta) ? "" : "ml-auto mr-0"; ?>">
                    <?php
                    $menu_top = new Menu('top');
                    $menu_top->view();
                    ?>
                </ul>

                <?php
                if ($btn_cta) :
                ?>
                    <div class="d-none d-lg-flex ml-auto mr-0">
                        <?php
                        echo $btn_cta;
                        ?>
                    </div>
                <?php
                endif;
                ?>

                <button class="c-toggler hamburger-js ml-auto mr-0 d-block d-lg-none" type="button" aria-expanded="false">
                    <span class="toggler__lines"></span>
                </button>
            </div>

        </div>


    </div>

    <div class="menu-mobile-wrapper section-<?= $scheme_colors; ?> menu-mobile-js d-flex d-lg-none">
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

    <div class=" section-<?= $scheme_colors; ?>"></div>
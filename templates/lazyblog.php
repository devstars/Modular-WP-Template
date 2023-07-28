<?php

/**
 * Template Name: Lazy Cards
 */

?>

<?php get_header(); ?>

<?php
include(locate_template('template-parts/banner.php'));
?>

<?php get_template_part('template-parts/breadcrumb'); ?>

<div class="section-gray">
    <div class="container c-prefix-menu fadeInUp40-js">                       
         
    <!-- 
<div class="menu__prefix <?= is_home()?"active":""; ?>"><a href="<?= home_url("/insights") ?>">Archives</a></div>
     -->
        
        <ul class="c-breadcrumb">
            <li>
                <a class="<?= is_home()?"active":""; ?>" href="<?= home_url("/insights") ?>">Archives</a>
            </li>

        <?php
            global $posts;

            $q = "SELECT YEAR(post_date) as Year
              FROM $wpdb->posts as p                      
              left join $wpdb->term_relationships as r on p.ID = r.object_id
              left join $wpdb->terms as t on t.term_id = r.term_taxonomy_id
              WHERE post_status = 'publish' AND post_type = 'post'
              GROUP BY Year
              ORDER BY post_date DESC;";

            $links = $wpdb->get_results($q);
                        
            preg_match('/^\d{4}/',$posts[0]->post_date,$result);
            $year_curr =  $result[0];
            ?>

            <?php foreach ($links as $link) :
                
                $class = ($year_curr == $link->Year && is_archive()) ? "active" : "";                
                ?>
                <li>
                    <a class="<?= $class; ?>" href="<?php echo esc_url(get_year_link($link->Year)) ?>"> <?= $link->Year; ?></a>
                </li>
            <?php endforeach; ?>
            
        </ul>
        <div class="clearfix"></div>
    </div>
</div>

<div class="c-section section-white">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h3 class="section__title text-left mb-8">Cards</h3>
                <div class="row cards-contenter-js" data-orderby="date" data-term="" data-post="post">
                    <?php
                    $lc = new LazyCards();
                    $lc->get(1, "date");
                    ?>
                </div>
            </div>
        </div>

    </div>
</div>

<?php get_footer(); ?>

<script>    
    var pageAjax = 2;
    var loadingTiles = false;
    var allTiles = false;
    $ = jQuery;

    $(document).ready(function() {

        var cc = $(".cards-contenter-js");

        if (cc.length > 0) {

            window.onscroll = function() {

                var endTiles = $(document).height() - $(window).height() - $(".footer-js").height() - 400;
                if ($(window).scrollTop() > endTiles) {

                    if (loadingTiles === false && allTiles === false) {
                        get_cards_by_ajax(cc.attr("data-orderby"), cc.attr("data-term"), cc.attr("data-post"));
                    }
                }
            };
        }

        function get_cards_by_ajax(orderby, term, postType) {
            loadingTiles = true;

            var data = {
                action: 'ajax_get_lc',
                page: pageAjax,
                postType: postType,
                orderby: orderby,
                term: term,
            };

            $.post(ajaxurl, data, function(response) {
                if (response.length > 0) {
                    cc.append(response);
                    $(window).lazyLoadXT();
                    pageAjax++;
                } else {
                    allTiles = true;
                }

                loadingTiles = false;
            });
        }
    });
</script>
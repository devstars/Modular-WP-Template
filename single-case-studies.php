<?php get_header(); ?>

<?php
if (function_exists('yoast_breadcrumb')) :
?>
    <div class="breadcrumb-wrapper section-gray ">
        <div class="c-breadcrumb-yoast ">
            <div class="container-fluid">
                <?php
                yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
                ?>
            </div>
        </div>
    </div>
<?php
endif;
?>

<div class="single-service">

    <div class="container-fluid   section-white">
        <div class="row">
            <div class="col-12 col-xl-10 mx-auto page-text">

                <?php
                global $wp_query;
                while (have_posts()) : the_post();
                ?>
                    <?php the_content(); ?>

                <?php endwhile; ?>
            </div>
        </div>
        <div class="l-single-bottom"></div>

    </div>
</div>

<?php get_footer(); ?>
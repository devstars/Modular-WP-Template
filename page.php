<?php get_header(); ?>

<?php //get_template_part('template-parts/load-gallery'); ?>

<?php include(locate_template('template-parts/banner.php')); ?>

<div class="c-section l-section-top section-white">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-10  mx-auto page-text">                
                <?php                 
                while (have_posts()) : the_post();
                    the_content();
                endwhile;
                ?>                 
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>


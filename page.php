<?php get_header(); ?>


<div class="l-section-padding pb-0 ">
    <div class="container-fluid  page-text section-white">
        <div class="row">
            <div class="col-12 col-xl-10 mx-auto">
                <h1 class="mb-8"> <?php the_title(); ?></h1>
                <?php
                global $wp_query;
                while (have_posts()) : the_post();
                ?>
                    <?php the_content(); ?>

                <?php endwhile; ?>
            </div>
        </div>

    </div>
</div>

<?php get_template_part('template-parts/load-gallery'); ?>
<?php get_footer(); ?>
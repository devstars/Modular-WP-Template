<?php get_header(); ?>
<div class="l-section-top">

</div>

<div class="container-fluid l-section-padding page-text section-white">
    <div class="row">
        <div class="col-12 col-xl-10 mx-auto">
            <?php
            global $wp_query;
            while (have_posts()) : the_post();
            ?>
                <?php the_content(); ?>

            <?php endwhile; ?>
        </div>
    </div>

</div>

<?php get_footer(); ?>
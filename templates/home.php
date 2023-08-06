<?php

/**
 * Template Name: Home
 */

get_header();
?>

<?php
//include(locate_template('template-parts/banner.php'));
?>

<div>
    <?php
    global $wp_query;

    while (have_posts()) : the_post();
    ?>

        <?php the_content(); ?>

    <?php endwhile; ?>
</div>


<?php //get_template_part('template-parts/section-testimonials'); 
?>


<?php //get_template_part('template-parts/section-form'); 
?>
<?php get_template_part("template-parts/modal-support"); ?>

<?php get_footer(); ?>
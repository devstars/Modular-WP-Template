<?php

/**
 * Template Name: Home
 */

get_header();
?>

<div>
    <?php
    global $wp_query;
    while (have_posts()) : the_post();
    ?>

        <?php the_content(); ?>

    <?php endwhile; ?>
</div>

<?php get_footer(); ?>
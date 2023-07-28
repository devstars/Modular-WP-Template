<?php
class LazyCards
{
    public function add_hooks()
    {        
        add_action('wp_ajax_nopriv_ajax_get_lc', array($this, 'ajax_get_lc'));
        add_action('wp_ajax_ajax_get_lc', array($this, 'ajax_get_lc'));
    }

    public function ajax_get_lc()
    {

        $paged = (int) $_POST['page'];
        $orderby = $_POST['orderby'];
        $term = sanitize_text_field($_POST['term']);
        $post_type = sanitize_text_field($_POST['postType']);

        $this->get($paged, $orderby,  $post_type, $term);

        die();
    }

    public function get($paged, $orderby, $post_type = "post", $term = "")
    {
        global $wp_query;

        $args = array(
            'post_type' => $post_type,
            'post_status' => 'publish',
            'paged' => $paged,
            'orderby' => $orderby,
            'posts_per_page' => '3'
        );

        $args['order'] = 'DESC';

        switch ($post_type) {

            case "post":
                $tax = "category";
                break;
        }

        if (!empty($term)) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => $tax,
                    'field' => 'slug',
                    'terms' => $term
                )
            );
        }

        $wp_query = new WP_Query($args);
        if ($wp_query->max_num_pages === 0) {
            die();
        }

        while (have_posts()) : the_post();
        $curr_post = $wp_query->post;
        ?>
            <div class="col-12 col-sm-4">
                <a href="<?php the_permalink($curr_post->ID); ?>" class="c-card parent-link mb-8">
                    <div class="card__img" data-bg="<?= get_post_img($curr_post->ID, "post_card"); ?>"></div>
                    <h3 class="card__title"><?= $curr_post->post_title; ?></h3>
                    <p class="card__excerpt"><?= $curr_post->post_excerpt; ?></p>
                    <div class="card__link child-link">Read more</div>
                </a>
            </div>
        <?php
        endwhile;

        wp_reset_postdata();
    }
}


?>
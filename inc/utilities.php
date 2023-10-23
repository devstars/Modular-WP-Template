<?php
add_filter('body_class', 'custom_class');
function custom_class($classes)
{
    if (!is_admin()) {
        /*$classes[] = 'example';*/
        return $classes;
    }
}

function get_post_img($id, $size = 'medium_large')
{
    // Thumbnail (150 x 150 hard cropped)
    // Medium resolution (300 x 300 max height 300px)
    // Medium Large (added in WP 4.4) resolution (768 x 0 infinite height)
    // Large resolution (1024 x 1024 max height 1024px)
    // Full resolution (original size uploaded)

    //With WooCommerce
    // Shop thumbnail (180 x 180 hard cropped)
    // Shop catalog (300 x 300 hard cropped)
    // Shop single (600 x 600 hard cropped)

    $img = wp_get_attachment_image_src(get_post_thumbnail_id($id), $size, false)[0];
    return $img;
}

function get_post_alt($id)
{
    return get_post_meta($id, '_wp_attachment_image_alt', TRUE);
}

function store_content_of_function($callback, $args)
{
    ob_start();

    call_user_func_array($callback, $args);

    return ob_get_clean();
}


function btn_from_link($button, $classes)
{

    if (isset($button) && $button) :
        $rel = ($button["target"] === "_blank") ? 'rel="external nofollow"' : '';
?>
        <a href="<?= $button["url"] ?>" target="<?= $button["target"] ?>" <?= $rel ?> class="<?= $classes; ?>"><?= $button["title"] ?> </a>
    <?php
    endif;
}


function get_permalink_by_template($template_file_php)
{
    global $wpdb;
    $filename = "templates/$template_file_php.php";
    $pages = $wpdb->get_results("SELECT `post_id` FROM $wpdb->postmeta
      WHERE `meta_key` ='_wp_page_template' AND `meta_value` = '$filename' ", ARRAY_A);
    return $pages ? get_permalink($pages[0]['post_id']) : null;
}

function wysiwyg_clean($value)
{
    return trim(strip_tags($value, '<h1><h2><h3><h4><h5><h6><span><br><p><b><strong><em><a><ul><ol><li>'));
}

function isColorDark($hexColor)
{
    // Remove the "#" symbol if present
    $hexColor = ltrim($hexColor, '#');

    // Convert hex to RGB values
    $red = hexdec(substr($hexColor, 0, 2));
    $green = hexdec(substr($hexColor, 2, 2));
    $blue = hexdec(substr($hexColor, 4, 2));

    // Calculate luminance
    $luminance = (0.299 * $red + 0.587 * $green + 0.114 * $blue) / 255;

    // You can adjust the threshold to your preference
    $threshold = 0.5;

    return $luminance <= $threshold;
}

function block_start($name, $block, $settings, $color_schema)
{
    $id = $name . '-' . $block['id'];
    if (!empty($block['anchor'])) {
        $id = $block['anchor'];
    }
    
    $custom_background = $settings["background"];
    if (!empty($custom_background)) :
        $color_schema = (isColorDark($custom_background)) ? "section-dark" : "section-bright";
    ?>
        <style>
            #<?= esc_attr($id); ?> {
                background-color: <?= $custom_background ?>;
            }
        </style>
    <?php
    endif;

    $h_tag = (isset($settings["h1"])  && !empty($settings["h1"]) ) ? "h1" : "h2" ;
    
    return array("id"=>$id, "color_schema" => $color_schema, "h_tag" => $h_tag);
}


?>
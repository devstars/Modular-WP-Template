<?php
function clean_str($str)
{
  return trim(nl2br($str));
}

function my_acf_load_value($value, $post_id, $field)
{
  if (!is_admin()) {
    if (is_string($value)) {
      $value = clean_str($value);
    }
  }

  return $value;
}

function acf_wysiwyg_load_value($value, $post_id, $field)
{
  if (!is_admin()) {
    if (is_string($value)) {
      $value = (strip_tags($value, '<br><p><b><strong><em><a><ul><ol><li>'));
    }
  }

  return $value;
}

add_filter('acf/load_value/type=text', 'my_acf_load_value', 10, 3);
add_filter('acf/load_value/type=url', 'my_acf_load_value', 10, 3);
add_filter('acf/load_value/type=textarea', 'acf_wysiwyg_load_value', 10, 3);

function updated_disable_comments_post_types_support()
{
  $types = get_post_types();
  foreach ($types as $type) {
    if (post_type_supports($type, 'comments')) {
      remove_post_type_support($type, 'comments');
      remove_post_type_support($type, 'trackbacks');
    }
  }
}
add_action('admin_init', 'updated_disable_comments_post_types_support');


function my_acf_google_map_api($api)
{

  $api['key'] = Configuration::$google_map_api_key;

  return $api;
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

function add_post_types_to_select($field)
{

  $custom_post_types = get_post_types(array('_builtin' => false));

  foreach ($custom_post_types as $key => $post_type) {

    if (!strstr($post_type, "acf")) {
      $field['choices']['option_' . $key] = $post_type;
    }
  }

  return $field;
}

add_filter('acf/load_field/name=post_type', 'add_post_types_to_select');



function set_default_content_for_new_post($content, $post)
{
  if ($post->post_type === 'post' && empty($content)) {

    $content = '<!-- wp:acf/pagination {"name":"acf/pagination","align":"wide","mode":"edit"} /-->';
  }
  return $content;
}
add_filter('default_content', 'set_default_content_for_new_post', 10, 2);


// Move Yoast to bottom
function yoasttobottom()
{
  return 'low';
}
add_filter('wpseo_metabox_prio', 'yoasttobottom');


// Extend WordPress search to include custom fields
function cf_search_join($join)
{
  global $wpdb;

  if (is_search()) {
    $join .= ' LEFT JOIN ' . $wpdb->postmeta . ' ON ' . $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
  }

  return $join;
}
add_filter('posts_join', 'cf_search_join');

// Modify the search query with posts_where
function cf_search_where($where)
{
  global $pagenow, $wpdb;

  if (is_search()) {
    $where = preg_replace(
      "/\(\s*" . $wpdb->posts . ".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
      "(" . $wpdb->posts . ".post_title LIKE $1) OR (" . $wpdb->postmeta . ".meta_value LIKE $1)",
      $where
    );
  }

  return $where;
}
add_filter('posts_where', 'cf_search_where');

// Prevent duplicates
function cf_search_distinct($where)
{
  global $wpdb;

  if (is_search()) {
    return "DISTINCT";
  }

  return $where;
}
add_filter('posts_distinct', 'cf_search_distinct');


function my_acf_input_admin_footer()
{
  //https://www.advancedcustomfields.com/resources/adding-custom-javascript-fields/
?>
  <script type="text/javascript">
    (function($) {      
      acf.add_filter('color_picker_args', function(args, $field) {    

        args.palettes = JSON.parse('<?= json_encode(Configuration::$brand_colours); ?>');

        return args;

      });

    })(jQuery);
  </script>
<?php

}

add_action('acf/input/admin_footer', 'my_acf_input_admin_footer');

?>
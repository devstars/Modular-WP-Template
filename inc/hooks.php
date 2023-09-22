<?php 
function clean_str($str){
    return trim(nl2br($str));
}

function my_acf_load_value( $value, $post_id, $field ) {
    if(!is_admin()){
        if( is_string($value) ) {
            $value = clean_str($value);
        }    
    }
    
    return $value;
}

function acf_wysiwyg_load_value( $value, $post_id, $field ) {
    if(!is_admin()){
        if( is_string($value) ) {
            $value = (strip_tags($value, '<br><p><b><strong><em><a><ul><ol><li>')); 
        }    
    }
    
    return $value;
}

add_filter('acf/load_value/type=text', 'my_acf_load_value', 10, 3);
add_filter('acf/load_value/type=url', 'my_acf_load_value', 10, 3);
add_filter('acf/load_value/type=textarea', 'acf_wysiwyg_load_value', 10, 3);

function updated_disable_comments_post_types_support() {
    $types = get_post_types();
    foreach ($types as $type) {
       if(post_type_supports($type, 'comments')) {
          remove_post_type_support($type, 'comments');
          remove_post_type_support($type, 'trackbacks');
       }
    }
 }
 add_action('admin_init', 'updated_disable_comments_post_types_support');


 function my_acf_google_map_api( $api ){
    
    $api['key'] = Configuration::$google_map_api_key;
    
    return $api;
    
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

function add_post_types_to_select($field) {

    $custom_post_types = get_post_types(array('_builtin' => false));
    
    foreach ($custom_post_types as $key => $post_type) {      
        
        if (!strstr($post_type, "acf")) {
            $field['choices']['option_'.$key] = $post_type;
        }
        
    }        

    return $field;
}

add_filter('acf/load_field/name=post_type', 'add_post_types_to_select');

function posts_link_next_class($format){
    $format = str_replace('href=', 'class="o-next-btn " href=', $format);
    return $format;
}
add_filter('next_post_link', 'posts_link_next_class');

function posts_link_prev_class($format) {
    $format = str_replace('href=', 'class="o-prev-btn " href=', $format);
    return $format;
}
add_filter('previous_post_link', 'posts_link_prev_class');

?>
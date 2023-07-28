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

function custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

?>
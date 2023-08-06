<?php
function checkCategoryOrder($categories)
{
    //custom category array
	$temp = array(        
            'slug' => 'M-blocks',
            'title' => 'M posts'        
    );

   
    //adding new custom category
    $newCategories = array();
    $newCategories[0] = $temp;    
    
    foreach ($categories as $category) {
        $newCategories[] = $category;
    }
    //return new categories
    return $newCategories;
}
add_filter( 'block_categories', 'checkCategoryOrder', 99, 1);

function mytheme_setup() {
    add_theme_support( 'align-wide' );
  }
add_action( 'after_setup_theme', 'mytheme_setup' );

function load_custom_wp_admin_style()
{
    wp_register_style('custom_wp_admin_css', get_stylesheet_directory_uri() . '/css/gutenberg.min.css', false, filemtime(get_stylesheet_directory() . '/css/gutenberg.min.css'));
    wp_enqueue_style('custom_wp_admin_css');
}

add_action('admin_enqueue_scripts', 'load_custom_wp_admin_style');

function pt_block_category($categories, $post)
{
    return array_merge(
        $categories,
        array(
            array(
                'slug' => 'M-blocks',
                'title' => 'M posts'
            )            
        )
    );
}

add_filter('block_categories', 'pt_block_category', 10, 2);

add_action('acf/init', 'my_acf_init');
function my_acf_init()
{
    
    if (function_exists('acf_register_block')) {    
        acf_register_block(array(
            'name' => 'section2cols',
            'title' => 'Section two columns',
            'description' => __('Section two columns'),
            'mode' => 'edit',
            'render_callback' => 'pt_block_render_callback',
            'category' => 'M-blocks',            
            'keywords' => array('columns'),
            'align'        => 'wide',
            'supports'    => array(
                'align'        => array( 'wide')   
            )          
        ));
    }    

    if (function_exists('acf_register_block')) {    
        acf_register_block(array(
            'name' => 'banner',
            'title' => 'Banner',
            'description' => __('Banner'),
            'mode' => 'edit',
            'render_callback' => 'pt_block_render_callback',
            'category' => 'M-blocks',            
            'keywords' => array('columns'),
            'align'        => 'wide',
            'supports'    => array(
                'align'        => array( 'wide')   
            )          
        ));
    } 
}

function pt_block_render_callback($block)
{
    $slug = str_replace('acf/', '', $block['name']);

    if (file_exists(get_theme_file_path("/blocks/{$slug}/{$slug}.php"))) {
        include(get_theme_file_path("/blocks/{$slug}/{$slug}.php"));
    }
}

function add_container_to_block( $block_content, $block ) {                        

/*         $blocks_without_section = array("acf/anchor","acf/title","acf/author","acf/intro", "acf/break","acf/button","acf/socials");
     
        if( strpos($block["blockName"], "acf") !== false && !in_array($block["blockName"], $blocks_without_section)) {                            
            $block_content = '</div></div></div>'.$block_content.
            '<div class="container-fluid l-container-lg page-text">
            <div class="row">
            <div class="col-12">';            
        }     */
                    	
	return $block_content;
}

add_filter( 'render_block', 'add_container_to_block', 10, 2 );


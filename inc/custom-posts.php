<?php
function create_posttype()
{
    register_post_type(
        'news',
        [
            'labels'             => [
                'name'          => __('News'),
                'singular_name' => __('News')
            ],
            'supports'           => ['title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'],
            'publicly_queryable' => true,
            'public'             => true,
            'has_archive'        => false,
            'rewrite'            => ['slug' => 'news', 'with_front' => false],
            'show_in_rest'       => true,
        ]
    );

    $args = [
        'label'        => __('Category'),
        'rewrite'      => ['slug' => 'categories-news', 'with_front' => false],
        'hierarchical' => true,
        'show_in_rest' => true,
        'show_ui'      => true,
        'show_admin_column' => true,
    ];
    register_taxonomy('categories-news', 'news', $args);
}



add_action('init', 'create_posttype');

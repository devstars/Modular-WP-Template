<?php
register_post_type(
    'news',
    [
        'labels'             => [
            'name'          => __('News'),
            'singular_name' => __('News')
        ],
        'supports'           => ['title', 'editor', 'excerpt', 'thumbnail'],
        'publicly_queryable' => true,
        'public'             => true,
        'has_archive'        => false,
        'taxonomies'         => ["categories-news"],
        'rewrite'            => ['slug' => 'news', 'with_front' => false],
        'show_in_rest'       => true,
    ]
);

$args = [
    'label'        => __('Category'),
    'rewrite'      => ['slug' => 'categories-news', 'with_front' => false],
    'hierarchical' => true,
    'show_in_rest' => false,
];
register_taxonomy('categories-news', 'news', $args);

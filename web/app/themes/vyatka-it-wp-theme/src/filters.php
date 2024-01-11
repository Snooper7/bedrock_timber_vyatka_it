<?php
use App\Resources\Service;

// Global Context
add_filter('timber/context', function ($context) {
    $context[ 'phone' ] = get_field('phone', 'options');

    return $context;
});

// Custom PostType
add_filter('timber/post/classmap', function ($classmap) {
    $custom_classmap = [
        'service' => Service::class,
    ];

    return array_merge($classmap, $custom_classmap);
});

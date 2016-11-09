<?php
namespace Agere\Autocomplete;


return [
    
    'default' => [
        'assets' => [
            '@autocomplete_js',
            '@autocomplete_css',
        ],
        'options' => [
            'mixin' => true,
        ],
    ],

    /*'controllers' => [
        'communicator' => [
            '@communicator_css',
            '@communicator_js',
        ],
    ],*/

    'modules' => [
        __NAMESPACE__ => [
            'root_path' => __DIR__ . '/../view/assets',
            'collections' => [
                'autocomplete_css' => [
                    'assets' => [
                        'css/autocomplete.css',
                    ],
                ],
                'autocomplete_js' => [
                    'assets' => [
                        'js/autocomplete.js',
                    ],
                ],
            ],
        ],
    ],
];
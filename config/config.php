<?php

return [

    /**
     * Provider.
     */
    'provider'  => 'litecms',

    /*
     * Package.
     */
    'package'   => 'forum',

    /*
     * Modules.
     */
    'modules'   => ['category', 
'question', 
'response'],

    'category'       => [
        'model' => [
            'model'                 => \Litecms\Forum\Models\Category::class,
            'table'                 => 'forum_categories',
            'presenter'             => \Litecms\Forum\Repositories\Presenter\CategoryPresenter::class,
            'hidden'                => [],
            'visible'               => [],
            'guarded'               => ['*'],
            'slugs'                 => ['slug' => 'name'],
            'dates'                 => ['deleted_at', 'created_at', 'updated_at'],
            'appends'               => [],
            'fillable'              => ['id',  'name',  'slug',  'status',  'user_id',  'user_type',  'upload_folder',  'deleted_at',  'created_at',  'updated_at'],
            'translatables'         => [],
            'upload_folder'         => 'forum/category',
            'uploads'               => [
            /*
                    'images' => [
                        'count' => 10,
                        'type'  => 'image',
                    ],
                    'file' => [
                        'count' => 1,
                        'type'  => 'file',
                    ],
            */
            ],

            'casts'                 => [
            /*
                'images'    => 'array',
                'file'      => 'array',
            */
            ],

            'revision'              => [],
            'perPage'               => '20',
            'search'        => [
                'name'  => 'like',
                'status',
            ]
        ],

        'controller' => [
            'provider'  => 'Litecms',
            'package'   => 'Forum',
            'module'    => 'Category',
        ],

    ],

    'question'       => [
        'model' => [
            'model'                 => \Litecms\Forum\Models\Question::class,
            'table'                 => 'forum_questions',
            'presenter'             => \Litecms\Forum\Repositories\Presenter\QuestionPresenter::class,
            'hidden'                => [],
            'visible'               => [],
            'guarded'               => ['*'],
            'slugs'                 => ['slug' => 'title'],
            'dates'                 => ['deleted_at', 'created_at', 'updated_at'],
            'appends'               => [],
            'fillable'              => ['id',  'category_id',  'user_id',  'user_type',  'title',  'question',  'slug',  'images',  'viewcount',  'published',  'status',  'upload_folder',  'created_at',  'updated_at',  'deleted_at'],
            'translatables'         => [],
            'upload_folder'         => 'forum/question',
            'uploads'               => [
            
                    'images' => [
                        'count' => 10,
                        'type'  => 'image',
                    ],
                    'file' => [
                        'count' => 1,
                        'type'  => 'file',
                    ],
            
            ],

            'casts'                 => [
            
                'images'    => 'array',
                'file'      => 'array',
            
            ],

            'revision'              => [],
            'perPage'               => '20',
            'search'        => [
                'title'  => 'like',
                'status',
            ]
        ],

        'controller' => [
            'provider'  => 'Litecms',
            'package'   => 'Forum',
            'module'    => 'Question',
        ],

    ],

    'response'       => [
        'model' => [
            'model'                 => \Litecms\Forum\Models\Response::class,
            'table'                 => 'forum_responses',
            'presenter'             => \Litecms\Forum\Repositories\Presenter\ResponsePresenter::class,
            'hidden'                => [],
            'visible'               => [],
            'guarded'               => ['*'],
            'slugs'                 => [],
            'dates'                 => ['deleted_at', 'created_at', 'updated_at'],
            'appends'               => [],
            'fillable'              => ['id',  'question_id',  'comment',  'images',   'status',  'best_answer',   'user_id',  'user_type',  'created_at',  'updated_at',  'deleted_at'],
            'translatables'         => [],
            'upload_folder'         => 'forum/response',
            'uploads'               => [
            
                    'images' => [
                        'count' => 10,
                        'type'  => 'image',
                    ],
                    'file' => [
                        'count' => 1,
                        'type'  => 'file',
                    ],
            
            ],

            'casts'                 => [
            
                'images'    => 'array',
                'file'      => 'array',
            
            ],

            'revision'              => [],
            'perPage'               => '20',
            'search'        => [
                'name'  => 'like',
                'status',
            ]
        ],

        'controller' => [
            'provider'  => 'Litecms',
            'package'   => 'Forum',
            'module'    => 'Response',
        ],

    ],
];

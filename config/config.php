<?php

return [

    /**
     * Provider.
     */
    'provider' => 'lavalite',

    /*
     * Package.
     */
    'package'  => 'forum',

    /*
     * Modules.
     */
    'modules'  => ['forum', 'category'],

    'forum'    => [
        'model'         => 'Litecms\Forum\Models\Forum',
        'table'         => 'forums',
        'presenter'     => \Litecms\Forum\Repositories\Presenter\ForumItemPresenter::class,
        'hidden'        => [],
        'visible'       => [],
        'guarded'       => ['*'],
        'slugs'         => ['slug' => 'title'],
        'dates'         => ['deleted_at'],
        'appends'       => [],
        'fillable'      => ['user_id', 'parent_id', 'category_id', 'title', 'description', 'status', 'published', 'best_answer','upload_folder'],
        'translate'     => [],

        'upload-folder' => '/uploads/forum/forum',
        'uploads'       => [
            'single'   => [],
            'multiple' => [],
        ],
        'casts'         => [
        ],
        'revision'      => [],
        'perPage'       => '20',
        'search'        => [
            'title' => 'like',
            'status',
            'published',
            'parent_id',
            'category_id',
        ],
    ],

    'category' => [
        'model'         => 'Litecms\Forum\Models\Category',
        'table'         => 'forum_categories',
        'presenter'     => \Litecms\Forum\Repositories\Presenter\CategoryItemPresenter::class,
        'hidden'        => [],
        'visible'       => [],
        'guarded'       => ['*'],
        'slugs'         => ['slug' => 'name'],
        'dates'         => ['deleted_at'],
        'appends'       => [],
        'fillable'      => ['user_id', 'name', 'status','upload_folder'],
        'translate'     => [],

        'upload-folder' => '/uploads/forum/category',
        'uploads'       => [
            'single'   => ['image'],
            'multiple' => [],
        ],
        'casts'         => ['image' => 'array',
        ],
        'revision'      => [],
        'perPage'       => '20',
        'search'        => [
            'name' => 'like',
            'status',
        ],
    ],
];

<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Language files for question in forum package
    |--------------------------------------------------------------------------
    |
    | The following language lines are  for  question module in forum package
    | and it is used by the template/view files in this module
    |
    */

    /**
     * Singlular and plural name of the module
     */
    'name'          => 'Question',
    'names'         => 'Questions',
    
    /**
     * Singlular and plural name of the module
     */
    'title'         => [
        'main'  => 'Questions',
        'sub'   => 'Questions',
        'list'  => 'List of questions',
        'edit'  => 'Edit question',
        'create'    => 'Create new question'
    ],

    /**
     * Options for select/radio/check.
     */
    'options'       => [
            'published'           => ['yes' => 'yes','no' => 'no'],
            'status'              => ['show' => 'show','hide' => 'hide'],
    ],

    /**
     * Placeholder for inputs
     */
    'placeholder'   => [
        'id'                         => 'Please enter id',
        'category_id'                => 'Please select category',
        'user_id'                    => 'Please enter user id',
        'user_type'                  => 'Please enter user type',
        'title'                      => 'Please enter title',
        'question'                   => 'Please enter question',
        'slug'                       => 'Please enter slug',
        'images'                     => 'Please enter images',
        'viewcount'                  => 'Please enter viewcount',
        'published'                  => 'Please select published',
        'status'                     => 'Please select status',
        'upload_folder'              => 'Please enter upload folder',
        'created_at'                 => 'Please select created at',
        'updated_at'                 => 'Please select updated at',
        'deleted_at'                 => 'Please select deleted at',
    ],

    /**
     * Labels for inputs.
     */
    'label'         => [
        'id'                         => 'Id',
        'category_id'                => 'Category id',
        'user_id'                    => 'User id',
        'user_type'                  => 'User type',
        'title'                      => 'Title',
        'question'                   => 'Question',
        'slug'                       => 'Slug',
        'images'                     => 'Images',
        'viewcount'                  => 'Viewcount',
        'published'                  => 'Published',
        'status'                     => 'Status',
        'upload_folder'              => 'Upload folder',
        'created_at'                 => 'Created at',
        'updated_at'                 => 'Updated at',
        'deleted_at'                 => 'Deleted at',
    ],

    /**
     * Columns array for show hide checkbox.
     */
    'cloumns'         => [
        'category_id'                => ['name' => 'Category id', 'data-column' => 1, 'checked'],
        'user_id'                    => ['name' => 'User id', 'data-column' => 2, 'checked'],
        'title'                      => ['name' => 'Title', 'data-column' => 3, 'checked'],
        'viewcount'                  => ['name' => 'Viewcount', 'data-column' => 4, 'checked'],
        'published'                  => ['name' => 'Published', 'data-column' => 5, 'checked'],
        'status'                     => ['name' => 'Status', 'data-column' => 6, 'checked'],
        'created_at'                 => ['name' => 'Created at', 'data-column' => 7, 'checked'],
    ],

    /**
     * Tab labels
     */
    'tab'           => [
        'name'  => 'Questions',
    ],

    /**
     * Texts  for the module
     */
    'text'          => [
        'preview' => 'Click on the below list for preview',
    ],
];

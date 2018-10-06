<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Language files for response in forum package
    |--------------------------------------------------------------------------
    |
    | The following language lines are  for  response module in forum package
    | and it is used by the template/view files in this module
    |
    */

    /**
     * Singlular and plural name of the module
     */
    'name'          => 'Response',
    'names'         => 'Responses',
    
    /**
     * Singlular and plural name of the module
     */
    'title'         => [
        'main'  => 'Responses',
        'sub'   => 'Responses',
        'list'  => 'List of responses',
        'edit'  => 'Edit response',
        'create'    => 'Create new response'
    ],

    /**
     * Options for select/radio/check.
     */
    'options'       => [
            'status'              => ['show' => 'show','hide' => 'hide'],
            'best_answer'         => ['yes' => 'yes','no' => 'no'],
    ],

    /**
     * Placeholder for inputs
     */
    'placeholder'   => [
        'id'                         => 'Please enter id',
        'question_id'                => 'Please enter question id',
        'comment'                    => 'Please enter comment',
        'images'                     => 'Please enter images',
        'status'                     => 'Please select status',
        'best_answer'                => 'Please select best answer',
        'user_id'                    => 'Please enter user id',
        'user_type'                  => 'Please enter user type',
        'created_at'                 => 'Please select created at',
        'updated_at'                 => 'Please select updated at',
        'deleted_at'                 => 'Please select deleted at',
    ],

    /**
     * Labels for inputs.
     */
    'label'         => [
        'id'                         => 'Id',
        'question_id'                => 'Question id',
        'comment'                    => 'Comment',
        'images'                     => 'Images',
        'status'                     => 'Status',
        'best_answer'                => 'Best answer',
        'user_id'                    => 'User id',
        'user_type'                  => 'User type',
        'created_at'                 => 'Created at',
        'updated_at'                 => 'Updated at',
        'deleted_at'                 => 'Deleted at',
    ],

    /**
     * Columns array for show hide checkbox.
     */
    'cloumns'         => [
        'question_id'                => ['name' => 'Question id', 'data-column' => 1, 'checked'],
        'comment'                    => ['name' => 'Comment', 'data-column' => 2, 'checked'],
        'status'                     => ['name' => 'Status', 'data-column' => 3, 'checked'],
        'best_answer'                => ['name' => 'Best answer', 'data-column' => 4, 'checked'],
        'user_id'                    => ['name' => 'User id', 'data-column' => 5, 'checked'],
    ],

    /**
     * Tab labels
     */
    'tab'           => [
        'name'  => 'Responses',
    ],

    /**
     * Texts  for the module
     */
    'text'          => [
        'preview' => 'Click on the below list for preview',
    ],
];

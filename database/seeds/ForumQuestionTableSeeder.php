<?php

namespace Litecms;

use DB;
use Illuminate\Database\Seeder;

class ForumQuestionTableSeeder extends Seeder
{
    public function run()
    {
        DB::table(config('litecms.forum.question.model.table'))->insert([
            ['id' => '1', 'category_id' => '2', 'user_id' => '1', 'user_type' => 'App\\Client', 'title' => 'Font Awesome 5 using Laravel-Mix on Laravel 5.5', 'question' => 'For my projects use font awesome 4, using,

npm install font-awesome
Add to app.scss

 @import "~font-awesome/scss/font-awesome.scss";
Add on muy templates

<span class="icon has-text-danger">
                            <i class="fa fa-ban"></i>
                            </span>', 'slug' => 'font-awesome-5-using-laravel-mix-on-laravel', 'images' => '[]', 'viewcount' => '12', 'published' => 'yes', 'status' => 'show', 'upload_folder' => null, 'created_at' => '2018-09-21 03:51:53', 'updated_at' => '2018-08-30 10:44:03', 'deleted_at' => null],
            ['id' => '2', 'category_id' => '3', 'user_id' => '1', 'user_type' => 'App\\Client', 'title' => 'How can i check Minimum amount should be less than maximum amount at jquery ?', 'question' => 'For my projects use font awesome 4, using,

npm install font-awesome
Add to app.scss


Add on muy templates

<span class="icon has-text-danger">', 'slug' => 'how-can-i-check-minimum-amount-should-be-less-than-maximum-amount-at-jquery', 'images' => '[]', 'viewcount' => '30', 'published' => 'yes', 'status' => 'show', 'upload_folder' => null, 'created_at' => '2018-09-21 03:51:57', 'updated_at' => '2018-06-29 05:16:43', 'deleted_at' => null],
            ['id' => '3', 'category_id' => '3', 'user_id' => '2', 'user_type' => 'App\\Client', 'title' => '500 Internal error - error TokenMismatchException not found', 'question' => 'Seem to be having problems with a TokenMismatchException on my Javascript button that are approving a comment. I have copied the code from a similar button system and changed it to match the requirements of this system. I am reusing the Session:Token variable, not sure if thats the issue?', 'slug' => '500-internal-error-error-tokenmismatchexception', 'images' => null, 'viewcount' => '12', 'published' => 'yes', 'status' => 'show', 'upload_folder' => null, 'created_at' => '2018-09-21 03:52:00', 'updated_at' => '2018-06-29 04:49:07', 'deleted_at' => null],
            ['id' => '4', 'category_id' => '1', 'user_id' => '2', 'user_type' => 'App\\Client', 'title' => 'How to drop table ?', 'question' => 'I renamed table role_users to role_user . When i migrate:refresh , in my database table role_users still exist . How can I delete it in my database .

Thankyou in advance', 'slug' => 'how-to-drop-table', 'images' => null, 'viewcount' => '43', 'published' => 'yes', 'status' => 'show', 'upload_folder' => null, 'created_at' => '2018-09-21 03:52:05', 'updated_at' => '2018-06-28 11:04:22', 'deleted_at' => null],
            ['id' => '5', 'category_id' => '2', 'user_id' => '2', 'user_type' => 'App\\Client', 'title' => 'Getting all image paths inside public directory folder', 'question' => 'Hi, I want to gather the path of all images inside given this direction: public > img > designs, and loop through them to show them in my blade template view.

This is my controller:', 'slug' => 'getting-all-image-paths-inside-public-directory-folder', 'images' => null, 'viewcount' => '15', 'published' => 'yes', 'status' => 'show', 'upload_folder' => null, 'created_at' => '2018-09-21 03:52:10', 'updated_at' => '2018-06-29 10:06:37', 'deleted_at' => null],

        ]);

        DB::table('permissions')->insert([
            [
                'slug' => 'forum.question.view',
                'name' => 'View Question',
            ],
            [
                'slug' => 'forum.question.create',
                'name' => 'Create Question',
            ],
            [
                'slug' => 'forum.question.edit',
                'name' => 'Update Question',
            ],
            [
                'slug' => 'forum.question.delete',
                'name' => 'Delete Question',
            ],

        ]);

        DB::table('menus')->insert([

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/forum/question',
                'name'        => 'Question',
                'description' => null,
                'icon'        => 'fa fa-newspaper-o',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 2,
                'key'         => null,
                'url'         => 'user/forum/question',
                'name'        => 'Question',
                'description' => null,
                'icon'        => 'icon-book-open',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 3,
                'key'         => null,
                'url'         => 'question',
                'name'        => 'Question',
                'description' => null,
                'icon'        => null,
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

        ]);

        DB::table('settings')->insert([
            // Uncomment  and edit this section for entering value to settings table.
            /*
        [
        'pacakge'   => 'Forum',
        'module'    => 'Question',
        'user_type' => null,
        'user_id'   => null,
        'key'       => 'forum.question.key',
        'name'      => 'Some name',
        'value'     => 'Some value',
        'type'      => 'Default',
        'control'   => 'text',
        ],
         */
        ]);
    }
}

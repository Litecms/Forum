<?php

namespace Litecms;

use DB;
use Illuminate\Database\Seeder;

class ForumCategoryTableSeeder extends Seeder
{
    public function run()
    {
        DB::table(config('litecms.forum.category.model.table'))->insert([
            ['id' => '1', 'name' => 'Laravel', 'slug' => 'laravel', 'status' => 'show', 'user_id' => '1', 'user_type' => 'App\\User', 'upload_folder' => null, 'deleted_at' => null, 'created_at' => '2018-06-26 11:19:44', 'updated_at' => '2018-06-26 11:19:44'],
            ['id' => '2', 'name' => 'General', 'slug' => 'general', 'status' => 'show', 'user_id' => '1', 'user_type' => 'App\\User', 'upload_folder' => null, 'deleted_at' => null, 'created_at' => '2018-06-26 11:21:07', 'updated_at' => '2018-06-26 11:21:07'],
            ['id' => '3', 'name' => 'JavaScript', 'slug' => 'javascript', 'status' => 'show', 'user_id' => '1', 'user_type' => 'App\\User', 'upload_folder' => null, 'deleted_at' => null, 'created_at' => '2018-06-26 11:21:36', 'updated_at' => '2018-06-26 11:21:36'],
            ['id' => '4', 'name' => 'Guides', 'slug' => 'guides', 'status' => 'show', 'user_id' => '1', 'user_type' => 'App\\User', 'upload_folder' => null, 'deleted_at' => null, 'created_at' => '2018-06-26 11:21:56', 'updated_at' => '2018-06-26 11:21:56'],
        ]);

        DB::table('permissions')->insert([
            [
                'slug' => 'forum.category.view',
                'name' => 'View Category',
            ],
            [
                'slug' => 'forum.category.create',
                'name' => 'Create Category',
            ],
            [
                'slug' => 'forum.category.edit',
                'name' => 'Update Category',
            ],
            [
                'slug' => 'forum.category.delete',
                'name' => 'Delete Category',
            ],

        ]);

        DB::table('menus')->insert([

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/forum/category',
                'name'        => 'Category',
                'description' => null,
                'icon'        => 'fa fa-newspaper-o',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 2,
                'key'         => null,
                'url'         => 'user/forum/category',
                'name'        => 'Category',
                'description' => null,
                'icon'        => 'icon-book-open',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 3,
                'key'         => null,
                'url'         => 'category',
                'name'        => 'Category',
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
        'module'    => 'Category',
        'user_type' => null,
        'user_id'   => null,
        'key'       => 'forum.category.key',
        'name'      => 'Some name',
        'value'     => 'Some value',
        'type'      => 'Default',
        'control'   => 'text',
        ],
         */
        ]);
    }
}

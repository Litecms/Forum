<?php

use Illuminate\Database\Seeder;

class ForumTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('forums')->insert([

            [
                'user_id'     => '1',
                'user_type'   => 'App\\User',
                'parent_id'   => '0',
                'category_id' => '2',
                'slug'        => 'lorem-ipsum-dolor-sit-amet',
                'title'       => 'LOREM IPSUM DOLOR SIT AMET',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat',
                'status'      => 'Show',
                'published'   => 'Yes',
                'best_answer' => '0',
                'created_at'  => '2016-07-19 15:17:19',
                'updated_at'  => '2016-07-19 09:47:19',
                'deleted_at'  => null,
            ],
            [
                'user_id'     => '1',
                'user_type'   => 'App\\User',
                'parent_id'   => '1',
                'category_id' => '0',
                'slug'        => '',
                'title'       => '',
                'description' => 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat',
                'status'      => 'Show',
                'published'   => 'Yes',
                'best_answer' => '0',
                'created_at'  => '2016-07-19 15:22:53',
                'updated_at'  => '2016-07-19 09:52:53',
                'deleted_at'  => null,
            ],
            [
                'user_id'     => '1',
                'user_type'   => 'App\\User',
                'parent_id'   => '1',
                'category_id' => '0',
                'slug'        => '-2',
                'title'       => '',
                'description' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis',
                'status'      => 'Show',
                'published'   => 'Yes',
                'best_answer' => '1',
                'created_at'  => '2016-07-19 15:19:11',
                'updated_at'  => '2016-07-19 09:49:11',
                'deleted_at'  => null,
            ],
            [
                'user_id'     => '1',
                'user_type'   => 'App\\User',
                'parent_id'   => '1',
                'category_id' => '0',
                'slug'        => '-3',
                'title'       => '',
                'description' => 'dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.  na aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo ',
                'status'      => 'Show',
                'published'   => 'Yes',
                'best_answer' => '0',
                'created_at'  => '2016-07-19 15:22:49',
                'updated_at'  => '2016-07-19 09:52:49',
                'deleted_at'  => null,
            ],
        ]);
        DB::table('forum_categories')->insert([
            [
                'slug'       => 'family',
                'name'       => 'FAMILY',
                'status'     => 'Show',
                'created_at' => '2016-07-19 09:39:46',
                'updated_at' => '2016-07-19 09:39:46',
                'deleted_at' => null,
            ],
            [
                'slug'       => 'adventure',
                'name'       => 'ADVENTURE',
                'status'     => 'Show',
                'created_at' => '2016-07-19 09:41:50',
                'updated_at' => '2016-07-19 09:41:50',
                'deleted_at' => null,
            ],
            [
                'slug'       => 'romantic',
                'name'       => 'ROMANTIC',
                'status'     => 'Show',
                'created_at' => '2016-07-19 09:42:11',
                'updated_at' => '2016-07-19 09:42:11',
                'deleted_at' => null,
            ],
            [
                'slug'       => 'wildlife',
                'name'       => 'WILDLIFE',
                'status'     => 'Show',
                'created_at' => '2016-07-19 09:42:37',
                'updated_at' => '2016-07-19 09:42:37',
                'deleted_at' => null,
            ],

        ]);

        DB::table('permissions')->insert([
            [
                'slug' => 'forum.forum.view',
                'name' => 'View Forum',
            ],
            [
                'slug' => 'forum.forum.create',
                'name' => 'Create Forum',
            ],
            [
                'slug' => 'forum.forum.edit',
                'name' => 'Update Forum',
            ],
            [
                'slug' => 'forum.forum.delete',
                'name' => 'Delete Forum',
            ],
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
                'url'         => 'admin/forum',
                'name'        => 'Forum',
                'description' => null,
                'icon'        => 'fa fa-comments-o',
                'target'      => null,
                'order'       => 160,
                'status'      => 1,
            ],
            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/forum/forum',
                'name'        => 'Forums',
                'description' => null,
                'icon'        => 'fa fa-comments-o',
                'target'      => null,
                'order'       => 161,
                'status'      => 1,
            ],
            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/forum/category',
                'name'        => 'Categories',
                'description' => null,
                'icon'        => 'fa fa-bars',
                'target'      => null,
                'order'       => 162,
                'status'      => 1,
            ],

            [
                'parent_id'   => 2,
                'key'         => null,
                'url'         => 'user/forum/forum',
                'name'        => 'User Forum',
                'description' => null,
                'icon'        => 'icon-bubbles',
                'target'      => null,
                'order'       => 160,
                'status'      => 1,
            ],

            [
                'parent_id'   => 3,
                'key'         => null,
                'url'         => 'forums',
                'name'        => 'Forum',
                'description' => null,
                'icon'        => null,
                'target'      => null,
                'order'       => 160,
                'status'      => 1,
            ],

        ]);

        DB::table('settings')->insert([
            // Uncomment  and edit this section for entering value to settings table.
            /*
            [
            'key'      => 'forum.forum.key',
            'name'     => 'Some name',
            'value'    => 'Some value',
            'type'     => 'Default',
            ],
             */
            // Uncomment  and edit this section for entering value to settings table.
            /*
        [
        'key'      => 'blog.category.key',
        'name'     => 'Some name',
        'value'    => 'Some value',
        'type'     => 'Default',
        ],
         */
        ]);
    }
}

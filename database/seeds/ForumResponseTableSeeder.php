<?php

namespace Litecms;

use DB;
use Illuminate\Database\Seeder;

class ForumResponseTableSeeder extends Seeder
{
    public function run()
    {
        DB::table(config('litecms.forum.response.model.table'))->insert([
            
        ]);

        DB::table('permissions')->insert([
            [
                'slug'      => 'forum.response.view',
                'name'      => 'View Response',
            ],
            [
                'slug'      => 'forum.response.create',
                'name'      => 'Create Response',
            ],
            [
                'slug'      => 'forum.response.edit',
                'name'      => 'Update Response',
            ],
            [
                'slug'      => 'forum.response.delete',
                'name'      => 'Delete Response',
            ],
            
            
        ]);

        DB::table('menus')->insert([

            [
                'parent_id'   => 1,
                'key'         => null,
                'url'         => 'admin/forum/response',
                'name'        => 'Response',
                'description' => null,
                'icon'        => 'fa fa-newspaper-o',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 2,
                'key'         => null,
                'url'         => 'user/forum/response',
                'name'        => 'Response',
                'description' => null,
                'icon'        => 'icon-book-open',
                'target'      => null,
                'order'       => 190,
                'status'      => 1,
            ],

            [
                'parent_id'   => 3,
                'key'         => null,
                'url'         => 'response',
                'name'        => 'Response',
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
                'module'    => 'Response',
                'user_type' => null,
                'user_id'   => null,
                'key'       => 'forum.response.key',
                'name'      => 'Some name',
                'value'     => 'Some value',
                'type'      => 'Default',
                'control'   => 'text',
            ],
            */
        ]);
    }
}

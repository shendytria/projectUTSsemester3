<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('menus')->insert([
            [
                'id_level' => '1',
                'menu_name' => 'Dashboard',
                'menu_link' => '/dashboard',
                'menu_icon' => 'dashboard_icon',
                'parent_id' => '0',
                'create_by' => 'admin',
                'create_date' => Carbon::now(),
                'delete_mark' => 'N',
                'update_by' => 'admin',
                'update-date' => Carbon::now(),
            ],
            [
                'id_level' => '2',
                'menu_name' => 'Users',
                'menu_link' => '/users',
                'menu_icon' => 'users_icon',
                'parent_id' => '0',
                'create_by' => 'admin',
                'create_date' => Carbon::now(),
                'delete_mark' => 'N',
                'update_by' => 'admin',
                'update-date' => Carbon::now(),
            ],
            // Add more entries as needed
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;
use App\MenuItem;
use Illuminate\Support\Carbon;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menuItems = [
            ['id' => 1, 'name' => 'Posts', 'route_name' => 'post.index', 'created_at' => Carbon::now(), 'status' => 0],
            ['id' => 2, 'name' => 'Categories', 'route_name' => 'category.index', 'created_at' => Carbon::now(), 'status' => 1],
        ];

        MenuItem::insert($menuItems);
        
    }
}

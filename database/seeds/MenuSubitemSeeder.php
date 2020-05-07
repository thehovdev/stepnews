<?php

use Illuminate\Database\Seeder;
use App\MenuSubitem;
use Illuminate\Support\Carbon;

class MenuSubitemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menuSubitems = [
            ['id' => 1, 'name' => 'Recent', 'route_name' => 'post.posts', 'menu_item_id' => 1, 'created_at' => Carbon::now(), 'status' => 0],
            ['id' => 2, 'name' => 'Most liked', 'route_name' => 'post.posts', 'menu_item_id' => 1, 'created_at' => Carbon::now(), 'status' => 1],
            ['id' => 3, 'name' => 'Lifestyle', 'route_name' => 'category.categories', 'menu_item_id' => 2, 'created_at' => Carbon::now(), 'status' => 1],
            ['id' => 4, 'name' => 'Sport', 'route_name' => 'category.categories', 'menu_item_id' => 2, 'created_at' => Carbon::now(), 'status' => 0],
            ['id' => 5, 'name' => 'Science', 'route_name' => 'category.categories', 'menu_item_id' => 2, 'created_at' =>Carbon::now(), 'status' => 0],
            ['id' => 6, 'name' => 'Food', 'route_name' => 'category.categories', 'menu_item_id' => 2, 'created_at' => Carbon::now(), 'status' => 1],
            ['id' => 7, 'name' => 'Health', 'route_name' => 'category.categories', 'menu_item_id' => 2, 'created_at' => Carbon::now(), 'status' => 1],
        ];

        MenuSubitem::insert($menuSubitems);
    }
}

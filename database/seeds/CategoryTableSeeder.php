<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    /*1 - доход
      0 - расход*/
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Зарплата',
            'icon' => 'attach_money',
            'flag' => 1,
            'color' => '#255622',
        ]);

        DB::table('categories')->insert([
            'name' => 'Жилье',
            'icon' => 'home',
            'flag' => 0,
            'color' => '#000a6a',
        ]);

        DB::table('categories')->insert([
            'name' => 'Транспорт',
            'icon' => 'directions_bus',
            'flag' => 0,
            'color' => '#fca136',
        ]);

        DB::table('categories')->insert([
            'name' => 'Еда',
            'icon' => 'fastfood',
            'flag' => 0,
            'color' => '#d70677',
        ]);

    }
}

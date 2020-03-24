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
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Зарплата',
            'icon' => 'attach_money',
            'flag' => 'income',
            'color' => '#255622',
        ]);

        DB::table('categories')->insert([
            'name' => 'Жилье',
            'icon' => 'home',
            'flag' => 'expense',
            'color' => '#000a6a',
        ]);

        DB::table('categories')->insert([
            'name' => 'Транспорт',
            'icon' => 'directions_bus',
            'flag' => 'expense',
            'color' => '#fca136',
        ]);

        DB::table('categories')->insert([
            'name' => 'Еда',
            'icon' => 'fastfood',
            'flag' => 'expense',
            'color' => '#d70677',
        ]);

    }
}

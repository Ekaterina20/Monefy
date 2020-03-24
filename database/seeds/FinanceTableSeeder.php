<?php

use Illuminate\Database\Seeder;
use App\Finance;

class FinanceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Finance::class, 50)->create();
    }
}

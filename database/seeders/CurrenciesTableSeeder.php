<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurrenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('currencies')->truncate();
        DB::table('currencies')->delete();
        DB::table('currencies')->insert([
            [
                'currency_name' => 'Kenya Shilling',
            ],
            [
                'currency_name' => 'Tanzania Shilling',
            ],
            [
                'currency_name' => 'Uganda Shilling',
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoanStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('loan_statuses')->truncate();
        DB::table('loan_statuses')->delete();
        DB::table('loan_statuses')->insert([
            [
                'status_name' => 'Requested',
            ],
            [
                'status_name' => 'Approve',
            ],
            [
                'status_name' => 'Disburse',
            ],
            [
                'status_name' => 'Repay',
            ],
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\IncomeCategory;

class IncomeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Business Income', 'description' => 'Income from business'],
            ['name' => 'Salary', 'description' => 'Monthly salary from job'],
            ['name' => 'Investment', 'description' => 'Income from investments'],
            ['name' => 'Freelancing', 'description' => 'Freelancing earning'],
            ['name' => 'Rental Income', 'description' => 'Income from renting properties']
        ];

        foreach ($categories as $cat) {
            IncomeCategory::create($cat);
        }
    }
}

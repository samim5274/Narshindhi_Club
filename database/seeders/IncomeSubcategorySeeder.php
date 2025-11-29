<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\IncomeSubCategory;

class IncomeSubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subcategories = [
            ['category_id' => 1, 'name' => 'Retail Shop', 'description' => 'Income from shop sales'],
            ['category_id' => 1, 'name' => 'Wholesale', 'description' => 'Wholesale business income'],

            ['category_id' => 2, 'name' => 'Basic Salary', 'description' => 'Monthly salary'],
            ['category_id' => 2, 'name' => 'Overtime', 'description' => 'Extra work payment'],

            ['category_id' => 3, 'name' => 'Stocks', 'description' => 'Income from stock investment'],
            ['category_id' => 3, 'name' => 'Bank Interest', 'description' => 'Interest income'],

            ['category_id' => 4, 'name' => 'Web Development', 'description' => 'Freelance projects'],
            ['category_id' => 4, 'name' => 'Graphics Design', 'description' => 'Freelance graphics work'],

            ['category_id' => 5, 'name' => 'House Rent', 'description' => 'Rent from homes'],
            ['category_id' => 5, 'name' => 'Shop Rent', 'description' => 'Rent from shops'],
        ];

        foreach ($subcategories as $sub) {
            IncomeSubCategory::create($sub);
        }
    }
}

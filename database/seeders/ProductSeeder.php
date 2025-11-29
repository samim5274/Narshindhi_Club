<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Fresh Atta',
                'purchase_price' => 220.00,
                'total_price' => 300.00,
                'stock' => 40,
                'remark' => 'Daily household atta',
            ],
            [
                'name' => 'Rupchanda Soybean Oil',
                'purchase_price' => 150.00,
                'total_price' => 185.00,
                'stock' => 60,
                'remark' => 'Premium soybean oil',
            ],
            [
                'name' => 'ACI Pure Salt',
                'purchase_price' => 25.00,
                'total_price' => 35.00,
                'stock' => 100,
                'remark' => 'Refined iodized salt',
            ],
            [
                'name' => 'Teer Sugar ',
                'purchase_price' => 85.00,
                'total_price' => 110.00,
                'stock' => 80,
                'remark' => 'Best quality sugar',
            ],
            [
                'name' => 'Miniket Rice',
                'purchase_price' => 360.00,
                'total_price' => 450.00,
                'stock' => 50,
                'remark' => 'Popular miniket rice',
            ],
            [
                'name' => 'Moshari ',
                'purchase_price' => 16.00,
                'total_price' => 25.00,
                'stock' => 70,
                'remark' => 'Daily essential mosquito coil',
            ],
            [
                'name' => 'Dettol Soap (100g)',
                'purchase_price' => 50.00,
                'total_price' => 70.00,
                'stock' => 90,
                'remark' => 'Protection antibacterial soap',
            ],
            [
                'name' => 'Horlicks Family Pack',
                'purchase_price' => 440.00,
                'total_price' => 550.00,
                'stock' => 25,
                'remark' => 'Popular health drink',
            ],
            [
                'name' => 'Fresh Milk Powder',
                'purchase_price' => 240.00,
                'total_price' => 310.00,
                'stock' => 35,
                'remark' => 'Daily milk powder',
            ],
            [
                'name' => 'Lifebuoy Handwash',
                'purchase_price' => 65.00,
                'total_price' => 85.00,
                'stock' => 70,
                'remark' => 'Daily hygiene product',
            ],
            [
                'name' => 'Savlon Antiseptic',
                'purchase_price' => 85.00,
                'total_price' => 120.00,
                'stock' => 50,
                'remark' => 'For first aid',
            ],
            [
                'name' => 'Mug Dal ',
                'purchase_price' => 115.00,
                'total_price' => 140.00,
                'stock' => 65,
                'remark' => 'Daily cooking dal',
            ],
            [
                'name' => 'Potato ',
                'purchase_price' => 24.00,
                'total_price' => 35.00,
                'stock' => 120,
                'remark' => 'Daily vegetable',
            ],
            [
                'name' => 'Onion ',
                'purchase_price' => 70.00,
                'total_price' => 90.00,
                'stock' => 100,
                'remark' => 'Essential kitchen item',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

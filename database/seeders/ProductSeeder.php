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
         Product::insert([
            [
                'title' => 'iPhone 14 Pro',
                'category' => 'Phones',
                'description' => 'Latest Apple smartphone with stunning display and A16 chip.',
                'price' => 1099.00,
                'image' => 'products/iphone14pro.jpg',
            ],
            [
                'title' => 'Dell Inspiron 15',
                'category' => 'Laptops',
                'description' => 'Powerful laptop for multitasking and productivity.',
                'price' => 749.00,
                'image' => 'products/dellinspiron.jpg',
            ],
            [
                'title' => 'Sony WH-1000XM5',
                'category' => 'Headphones',
                'description' => 'Premium noise-cancelling wireless headphones.',
                'price' => 399.00,
                'image' => 'products/sonyheadphones.jpg',
            ],
            [
                'title' => 'Canon EOS R10',
                'category' => 'Cameras',
                'description' => 'Professional-grade mirrorless camera for photography enthusiasts.',
                'price' => 999.00,
                'image' => 'products/canoneosr10.jpg',
            ],
        ]);
    }
}

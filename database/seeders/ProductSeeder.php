<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create main product categories
        $categories = [
            'Clothing' => [
                'description' => 'Fashion and apparel for all occasions',
                'is_featured' => true,
            ],
            'Electronics' => [
                'description' => 'Latest gadgets and electronic devices',
                'is_featured' => true,
            ],
            'Home & Kitchen' => [
                'description' => 'Everything for your home and kitchen',
                'is_featured' => true,
            ],
            'Beauty & Personal Care' => [
                'description' => 'Beauty products and personal care items',
                'is_featured' => true,
            ],
            'Sports & Outdoors' => [
                'description' => 'Equipment and gear for sports and outdoor activities',
                'is_featured' => false,
            ],
            'Books' => [
                'description' => 'Books across various genres and topics',
                'is_featured' => false,
            ],
        ];
        
        foreach ($categories as $name => $attributes) {
            Category::create([
                'name' => $name,
                'slug' => \Illuminate\Support\Str::slug($name),
                'description' => $attributes['description'],
                'is_active' => true,
                'is_featured' => $attributes['is_featured'],
            ]);
        }
        
        // Create products for each category
        $categoriesFromDb = Category::all();
        
        foreach ($categoriesFromDb as $category) {
            // Create 10-20 products per category
            $numProducts = rand(10, 20);
            Product::factory()->count($numProducts)->create([
                'category_id' => $category->id,
            ]);
        }
    }
}
<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->words(rand(2, 5), true);
        $slug = Str::slug($name);
        $price = $this->faker->randomFloat(2, 10, 500);
        $hasSalePrice = $this->faker->boolean(30);
        $salePrice = $hasSalePrice ? $this->faker->randomFloat(2, 5, $price * 0.9) : null;
        
        // Get a random category or create one if none exists
        $categoryId = Category::inRandomOrder()->first()?->id ?? 
            Category::factory()->create(['name' => 'General'])->id;
        
        // Generate a product image URL from Lorem Picsum
        $imageId = $this->faker->numberBetween(1, 1000);
        $imageUrl = "https://picsum.photos/id/{$imageId}/800/800";
        
        // Generate gallery images
        $galleryCount = $this->faker->numberBetween(0, 4);
        $gallery = [];
        for ($i = 0; $i < $galleryCount; $i++) {
            $galleryImageId = $this->faker->numberBetween(1, 1000);
            $gallery[] = "https://picsum.photos/id/{$galleryImageId}/800/800";
        }
        
        // Generate sizes
        $availableSizes = ['XS', 'S', 'M', 'L', 'XL', '2XL', '3XL', '4XL'];
        $sizeCount = $this->faker->numberBetween(1, count($availableSizes));
        $sizes = $this->faker->randomElements($availableSizes, $sizeCount);
        
        // Generate colors
        $availableColors = ['red', 'blue', 'green', 'yellow', 'purple', 'orange', 'black', 'white'];
        $colorCount = $this->faker->numberBetween(1, count($availableColors));
        $colors = $this->faker->randomElements($availableColors, $colorCount);
        
        return [
            'name' => ucfirst($name),
            'slug' => $slug,
            'description' => $this->faker->paragraphs(rand(3, 6), true),
            'short_description' => $this->faker->sentence(),
            'price' => $price,
            'sale_price' => $salePrice,
            'stock_quantity' => $this->faker->numberBetween(0, 100),
            'sku' => strtoupper($this->faker->bothify('??###??')),
            'image' => $imageUrl,
            'gallery' => $gallery,
            'sizes' => $sizes,
            'colors' => $colors,
            'rating' => $this->faker->randomFloat(1, 1, 5),
            'product_views' => $this->faker->numberBetween(0, 1000),
            'is_featured' => $this->faker->boolean(20),
            'is_active' => $this->faker->boolean(80),
            'category_id' => $categoryId,
        ];
    }
}
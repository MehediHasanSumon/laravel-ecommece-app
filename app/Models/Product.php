<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'slug',
        'description',
        'short_description',
        'price',
        'sale_price',
        'stock_quantity',
        'sku',
        'image',
        'gallery',
        'sizes',
        'colors',
        'rating',
        'product_views',
        'is_featured',
        'is_active',
        'category_id'
    ];
    
    protected $casts = [
        'price' => 'decimal:2',
        'sale_price' => 'decimal:2',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'gallery' => 'array',
        'sizes' => 'array',
        'colors' => 'array',
        'rating' => 'decimal:2',
        'stock_quantity' => 'integer',
        'product_views' => 'integer',
    ];
    
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    
    public function discounts(): BelongsToMany
    {
        return $this->belongsToMany(Discount::class);
    }
    
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
    
    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Discount extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'type',
        'value',
        'applies_to_all_products',
        'is_active',
        'starts_at',
        'expires_at'
    ];
    
    protected $casts = [
        'value' => 'decimal:2',
        'applies_to_all_products' => 'boolean',
        'is_active' => 'boolean',
        'starts_at' => 'datetime',
        'expires_at' => 'datetime',
    ];
    
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }
    
    public function scopeActive($query)
    {
        return $query->where('is_active', true)
            ->where(function($q) {
                $q->whereNull('starts_at')
                  ->orWhere('starts_at', '<=', now());
            })
            ->where(function($q) {
                $q->whereNull('expires_at')
                  ->orWhere('expires_at', '>=', now());
            });
    }
    
    public function isValid()
    {
        if (!$this->is_active) {
            return false;
        }
        
        if ($this->starts_at && $this->starts_at > now()) {
            return false;
        }
        
        if ($this->expires_at && $this->expires_at < now()) {
            return false;
        }
        
        return true;
    }
}

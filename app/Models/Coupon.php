<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'code',
        'description',
        'type',
        'value',
        'min_order_amount',
        'max_uses',
        'used_count',
        'is_active',
        'starts_at',
        'expires_at'
    ];
    
    protected $casts = [
        'value' => 'decimal:2',
        'min_order_amount' => 'decimal:2',
        'is_active' => 'boolean',
        'max_uses' => 'integer',
        'used_count' => 'integer',
        'starts_at' => 'datetime',
        'expires_at' => 'datetime',
    ];
    
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
        
        if ($this->max_uses && $this->used_count >= $this->max_uses) {
            return false;
        }
        
        return true;
    }
}

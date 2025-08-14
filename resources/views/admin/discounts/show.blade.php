@extends('layouts.admin')

@section('title', 'Discount Details')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Discount Details</h1>
    
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <i class="fas fa-percent me-1"></i>
                Discount: {{ $discount->name }}
            </div>
            <div>
                <a href="{{ route('admin.discounts.edit', $discount) }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <a href="{{ route('admin.discounts.index') }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i> Back to List
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-info-circle me-1"></i>
                            Discount Information
                        </div>
                        <div class="list-group list-group-flush">
                            <div class="list-group-item d-flex justify-content-between">
                                <strong>Name:</strong>
                                <span>{{ $discount->name }}</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between">
                                <strong>Type:</strong>
                                <span>{{ ucfirst($discount->type) }}</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between">
                                <strong>Value:</strong>
                                <span>
                                    @if($discount->type == 'percentage')
                                        {{ $discount->value }}%
                                    @else
                                        ${{ number_format($discount->value, 2) }}
                                    @endif
                                </span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between">
                                <strong>Applies To:</strong>
                                <span>
                                    @if($discount->applies_to_all_products)
                                        <span class="badge bg-info">All Products</span>
                                    @else
                                        <span class="badge bg-secondary">{{ $discount->products->count() }} selected products</span>
                                    @endif
                                </span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between">
                                <strong>Status:</strong>
                                <span>
                                    @if($discount->is_active && $discount->isValid())
                                        <span class="badge bg-success">Active</span>
                                    @elseif(!$discount->is_active)
                                        <span class="badge bg-danger">Inactive</span>
                                    @else
                                        <span class="badge bg-warning text-dark">Expired</span>
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    @if($discount->description)
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fas fa-align-left me-1"></i>
                                Description
                            </div>
                            <div class="card-body">
                                {{ $discount->description }}
                            </div>
                        </div>
                    @endif
                </div>
                
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-calendar-alt me-1"></i>
                            Validity Period
                        </div>
                        <div class="list-group list-group-flush">
                            <div class="list-group-item d-flex justify-content-between">
                                <strong>Start Date:</strong>
                                <span>
                                    @if($discount->starts_at)
                                        {{ $discount->starts_at->format('M d, Y H:i A') }}
                                        @if($discount->starts_at->isFuture())
                                            <span class="badge bg-warning text-dark">Not active yet</span>
                                        @endif
                                    @else
                                        <span class="text-muted">No start date (always valid)</span>
                                    @endif
                                </span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between">
                                <strong>Expiration Date:</strong>
                                <span>
                                    @if($discount->expires_at)
                                        {{ $discount->expires_at->format('M d, Y H:i A') }}
                                        @if($discount->expires_at->isPast())
                                            <span class="badge bg-danger">Expired</span>
                                        @elseif($discount->expires_at->diffInDays(now()) < 7)
                                            <span class="badge bg-warning text-dark">Ending soon</span>
                                        @endif
                                    @else
                                        <span class="text-muted">No expiration (never expires)</span>
                                    @endif
                                </span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between">
                                <strong>Created:</strong>
                                <span>{{ $discount->created_at->format('M d, Y H:i A') }}</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between">
                                <strong>Last Updated:</strong>
                                <span>{{ $discount->updated_at->format('M d, Y H:i A') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            @if(!$discount->applies_to_all_products && $discount->products->count() > 0)
                <div class="card mt-3">
                    <div class="card-header">
                        <i class="fas fa-boxes me-1"></i>
                        Applied Products ({{ $discount->products->count() }})
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>SKU</th>
                                        <th>Regular Price</th>
                                        <th>Discounted Price</th>
                                        <th>Savings</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($discount->products as $product)
                                        <tr>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    @if($product->image)
                                                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="img-thumbnail me-2" style="width: 40px; height: 40px; object-fit: cover;">
                                                    @endif
                                                    <a href="{{ route('admin.products.show', $product) }}">
                                                        {{ $product->name }}
                                                    </a>
                                                </div>
                                            </td>
                                            <td>{{ $product->sku }}</td>
                                            <td>${{ number_format($product->price, 2) }}</td>
                                            <td>
                                                @php
                                                    if ($discount->type == 'percentage') {
                                                        $discountedPrice = $product->price * (1 - $discount->value / 100);
                                                    } else {
                                                        $discountedPrice = max(0, $product->price - $discount->value);
                                                    }
                                                @endphp
                                                ${{ number_format($discountedPrice, 2) }}
                                            </td>
                                            <td>
                                                @php
                                                    $savings = $product->price - $discountedPrice;
                                                    $savingsPercent = ($product->price > 0) ? ($savings / $product->price) * 100 : 0;
                                                @endphp
                                                ${{ number_format($savings, 2) }} ({{ number_format($savingsPercent, 1) }}%)
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
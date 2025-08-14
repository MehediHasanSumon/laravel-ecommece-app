@extends('layouts.admin')

@section('title', 'Product Details')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Product Details</h1>
    
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <i class="fas fa-box me-1"></i>
                {{ $product->name }}
            </div>
            <div>
                <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i> Back to List
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    @if($product->image)
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="img-fluid rounded mb-3">
                    @else
                        <div class="bg-light rounded d-flex justify-content-center align-items-center" style="height: 300px;">
                            <span class="text-muted">No image available</span>
                        </div>
                    @endif
                    
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-info-circle me-1"></i>
                            Product Information
                        </div>
                        <div class="list-group list-group-flush">
                            <div class="list-group-item d-flex justify-content-between">
                                <strong>SKU:</strong>
                                <span>{{ $product->sku }}</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between">
                                <strong>Price:</strong>
                                <span>${{ number_format($product->price, 2) }}</span>
                            </div>
                            @if($product->sale_price)
                                <div class="list-group-item d-flex justify-content-between">
                                    <strong>Sale Price:</strong>
                                    <span>${{ number_format($product->sale_price, 2) }}</span>
                                </div>
                            @endif
                            <div class="list-group-item d-flex justify-content-between">
                                <strong>Stock:</strong>
                                <span class="{{ $product->stock > 0 ? 'text-success' : 'text-danger' }}">
                                    {{ $product->stock > 0 ? $product->stock . ' in stock' : 'Out of stock' }}
                                </span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between">
                                <strong>Category:</strong>
                                <span>{{ $product->category ? $product->category->name : 'Uncategorized' }}</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between">
                                <strong>Status:</strong>
                                <span>
                                    @if($product->is_active)
                                        <span class="badge bg-success">Active</span>
                                    @else
                                        <span class="badge bg-danger">Inactive</span>
                                    @endif
                                </span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between">
                                <strong>Featured:</strong>
                                <span>
                                    @if($product->is_featured)
                                        <span class="badge bg-primary">Featured</span>
                                    @else
                                        <span class="badge bg-secondary">Not Featured</span>
                                    @endif
                                </span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between">
                                <strong>Created:</strong>
                                <span>{{ $product->created_at->format('M d, Y') }}</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between">
                                <strong>Last Updated:</strong>
                                <span>{{ $product->updated_at->format('M d, Y') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-align-left me-1"></i>
                            Description
                        </div>
                        <div class="card-body">
                            @if($product->short_description)
                                <div class="mb-3">
                                    <h5>Short Description</h5>
                                    <p>{{ $product->short_description }}</p>
                                </div>
                            @endif
                            
                            @if($product->description)
                                <div>
                                    <h5>Full Description</h5>
                                    <div>
                                        {!! nl2br(e($product->description)) !!}
                                    </div>
                                </div>
                            @else
                                <p class="text-muted">No description available.</p>
                            @endif
                        </div>
                    </div>
                    
                    @if($product->discounts && $product->discounts->count() > 0)
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fas fa-percent me-1"></i>
                                Applied Discounts
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Type</th>
                                                <th>Value</th>
                                                <th>Status</th>
                                                <th>Valid Until</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($product->discounts as $discount)
                                                <tr>
                                                    <td>
                                                        <a href="{{ route('admin.discounts.show', $discount) }}">
                                                            {{ $discount->name }}
                                                        </a>
                                                    </td>
                                                    <td>{{ ucfirst($discount->type) }}</td>
                                                    <td>
                                                        @if($discount->type == 'percentage')
                                                            {{ $discount->value }}%
                                                        @else
                                                            ${{ number_format($discount->value, 2) }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($discount->is_active && $discount->isValid())
                                                            <span class="badge bg-success">Active</span>
                                                        @else
                                                            <span class="badge bg-danger">Inactive</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($discount->expires_at)
                                                            {{ $discount->expires_at->format('M d, Y') }}
                                                        @else
                                                            No expiration
                                                        @endif
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
    </div>
</div>
@endsection
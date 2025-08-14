@extends('layouts.admin')

@section('title', 'Edit Coupon')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Coupon</h1>
    
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-edit me-1"></i>
            Edit Coupon: {{ $coupon->code }}
        </div>
        <div class="card-body">
            <form action="{{ route('admin.coupons.update', $coupon) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="code">Coupon Code <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('code') is-invalid @enderror" id="code" name="code" value="{{ old('code', $coupon->code) }}" required>
                            <small class="form-text text-muted">Enter a unique code for this coupon (e.g., SUMMER2023).</small>
                            @error('code')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ old('description', $coupon->description) }}</textarea>
                            <small class="form-text text-muted">Brief description of the coupon for internal reference.</small>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="type">Discount Type <span class="text-danger">*</span></label>
                            <select class="form-control @error('type') is-invalid @enderror" id="type" name="type" required>
                                <option value="">Select Discount Type</option>
                                <option value="percentage" {{ old('type', $coupon->type) == 'percentage' ? 'selected' : '' }}>Percentage Discount</option>
                                <option value="fixed" {{ old('type', $coupon->type) == 'fixed' ? 'selected' : '' }}>Fixed Amount Discount</option>
                            </select>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="value">Discount Value <span class="text-danger">*</span></label>
                            <div class="input-group">
                                <input type="number" step="0.01" min="0" class="form-control @error('value') is-invalid @enderror" id="value" name="value" value="{{ old('value', $coupon->value) }}" required>
                                <span class="input-group-text" id="value-addon">{{ $coupon->type == 'percentage' ? '%' : '$' }}</span>
                            </div>
                            <small class="form-text text-muted">For percentage type, enter a value between 1-100. For fixed amount, enter the discount value in dollars.</small>
                            @error('value')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="min_order_amount">Minimum Order Amount</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" step="0.01" min="0" class="form-control @error('min_order_amount') is-invalid @enderror" id="min_order_amount" name="min_order_amount" value="{{ old('min_order_amount', $coupon->min_order_amount) }}">
                            </div>
                            <small class="form-text text-muted">Minimum order amount required to use this coupon. Set to 0 for no minimum.</small>
                            @error('min_order_amount')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="max_uses">Maximum Uses</label>
                            <input type="number" min="0" class="form-control @error('max_uses') is-invalid @enderror" id="max_uses" name="max_uses" value="{{ old('max_uses', $coupon->max_uses) }}">
                            <small class="form-text text-muted">Maximum number of times this coupon can be used. Leave empty for unlimited uses.</small>
                            @error('max_uses')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="used_count">Used Count</label>
                            <input type="number" min="0" class="form-control @error('used_count') is-invalid @enderror" id="used_count" name="used_count" value="{{ old('used_count', $coupon->used_count) }}" readonly>
                            <small class="form-text text-muted">Number of times this coupon has been used.</small>
                            @error('used_count')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="starts_at">Start Date</label>
                            <input type="datetime-local" class="form-control @error('starts_at') is-invalid @enderror" id="starts_at" name="starts_at" value="{{ old('starts_at', $coupon->starts_at ? $coupon->starts_at->format('Y-m-d\TH:i') : '') }}">
                            <small class="form-text text-muted">When this coupon becomes valid. Leave empty to make it valid immediately.</small>
                            @error('starts_at')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="expires_at">Expiration Date</label>
                            <input type="datetime-local" class="form-control @error('expires_at') is-invalid @enderror" id="expires_at" name="expires_at" value="{{ old('expires_at', $coupon->expires_at ? $coupon->expires_at->format('Y-m-d\TH:i') : '') }}">
                            <small class="form-text text-muted">When this coupon expires. Leave empty for no expiration.</small>
                            @error('expires_at')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $coupon->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">Active</label>
                            <small class="d-block form-text text-muted">Uncheck to disable this coupon regardless of dates.</small>
                        </div>
                    </div>
                </div>
                
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.coupons.index') }}" class="btn btn-secondary">Back to Coupons</a>
                    <button type="submit" class="btn btn-primary">Update Coupon</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Update value addon based on discount type
        function updateValueAddon() {
            var type = $('#type').val();
            if (type === 'percentage') {
                $('#value-addon').text('%');
            } else {
                $('#value-addon').text('$');
            }
        }
        
        // Initial update
        updateValueAddon();
        
        // Update on change
        $('#type').change(function() {
            updateValueAddon();
        });
    });
</script>
@endsection
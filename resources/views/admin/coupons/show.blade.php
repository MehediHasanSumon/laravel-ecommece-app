@extends('layouts.admin')

@section('title', 'Coupon Details')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Coupon Details</h1>
    
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <i class="fas fa-tag me-1"></i>
                Coupon: {{ $coupon->code }}
            </div>
            <div>
                <a href="{{ route('admin.coupons.edit', $coupon) }}" class="btn btn-primary btn-sm">
                    <i class="fas fa-edit"></i> Edit
                </a>
                <a href="{{ route('admin.coupons.index') }}" class="btn btn-secondary btn-sm">
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
                            Coupon Information
                        </div>
                        <div class="list-group list-group-flush">
                            <div class="list-group-item d-flex justify-content-between">
                                <strong>Code:</strong>
                                <span class="badge bg-dark">{{ $coupon->code }}</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between">
                                <strong>Type:</strong>
                                <span>{{ ucfirst($coupon->type) }}</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between">
                                <strong>Value:</strong>
                                <span>
                                    @if($coupon->type == 'percentage')
                                        {{ $coupon->value }}%
                                    @else
                                        ${{ number_format($coupon->value, 2) }}
                                    @endif
                                </span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between">
                                <strong>Minimum Order Amount:</strong>
                                <span>
                                    @if($coupon->min_order_amount > 0)
                                        ${{ number_format($coupon->min_order_amount, 2) }}
                                    @else
                                        <span class="text-muted">None</span>
                                    @endif
                                </span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between">
                                <strong>Status:</strong>
                                <span>
                                    @if($coupon->is_active && $coupon->isValid())
                                        <span class="badge bg-success">Active</span>
                                    @elseif(!$coupon->is_active)
                                        <span class="badge bg-danger">Inactive</span>
                                    @else
                                        <span class="badge bg-warning text-dark">Expired</span>
                                    @endif
                                </span>
                            </div>
                        </div>
                    </div>
                    
                    @if($coupon->description)
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fas fa-align-left me-1"></i>
                                Description
                            </div>
                            <div class="card-body">
                                {{ $coupon->description }}
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
                                    @if($coupon->starts_at)
                                        {{ $coupon->starts_at->format('M d, Y H:i A') }}
                                        @if($coupon->starts_at->isFuture())
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
                                    @if($coupon->expires_at)
                                        {{ $coupon->expires_at->format('M d, Y H:i A') }}
                                        @if($coupon->expires_at->isPast())
                                            <span class="badge bg-danger">Expired</span>
                                        @elseif($coupon->expires_at->diffInDays(now()) < 7)
                                            <span class="badge bg-warning text-dark">Ending soon</span>
                                        @endif
                                    @else
                                        <span class="text-muted">No expiration (never expires)</span>
                                    @endif
                                </span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between">
                                <strong>Created:</strong>
                                <span>{{ $coupon->created_at->format('M d, Y H:i A') }}</span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between">
                                <strong>Last Updated:</strong>
                                <span>{{ $coupon->updated_at->format('M d, Y H:i A') }}</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            Usage Statistics
                        </div>
                        <div class="list-group list-group-flush">
                            <div class="list-group-item d-flex justify-content-between">
                                <strong>Usage Limit:</strong>
                                <span>
                                    @if($coupon->max_uses)
                                        {{ $coupon->max_uses }} uses
                                    @else
                                        <span class="text-muted">Unlimited</span>
                                    @endif
                                </span>
                            </div>
                            <div class="list-group-item d-flex justify-content-between">
                                <strong>Times Used:</strong>
                                <span>{{ $coupon->used_count }}</span>
                            </div>
                            @if($coupon->max_uses)
                                <div class="list-group-item">
                                    <strong>Usage Progress:</strong>
                                    <div class="progress mt-2">
                                        @php
                                            $percentage = $coupon->max_uses > 0 ? min(100, ($coupon->used_count / $coupon->max_uses) * 100) : 0;
                                        @endphp
                                        <div class="progress-bar {{ $percentage > 80 ? 'bg-danger' : 'bg-success' }}" role="progressbar" style="width: {{ $percentage }}%" aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100">
                                            {{ round($percentage) }}%
                                        </div>
                                    </div>
                                    <small class="text-muted mt-1 d-block">
                                        {{ $coupon->used_count }} of {{ $coupon->max_uses }} uses ({{ $coupon->max_uses - $coupon->used_count }} remaining)
                                    </small>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
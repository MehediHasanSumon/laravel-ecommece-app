<div class="table-responsive">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Code</th>
                <th>Type</th>
                <th>Value</th>
                <th>Min Order</th>
                <th>Usage</th>
                <th>Status</th>
                <th>Expiration</th>
                <th>Created</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($coupons as $coupon)
                <tr>
                    <td>
                        <span class="badge bg-dark">{{ $coupon->code }}</span>
                    </td>
                    <td>{{ ucfirst($coupon->type) }}</td>
                    <td>
                        @if($coupon->type == 'percentage')
                            {{ $coupon->value }}%
                        @else
                            ${{ number_format($coupon->value, 2) }}
                        @endif
                    </td>
                    <td>
                        @if($coupon->min_order_amount > 0)
                            ${{ number_format($coupon->min_order_amount, 2) }}
                        @else
                            <span class="text-muted">None</span>
                        @endif
                    </td>
                    <td>
                        @if($coupon->max_uses)
                            {{ $coupon->used_count }} / {{ $coupon->max_uses }}
                        @else
                            {{ $coupon->used_count }} / ∞
                        @endif
                    </td>
                    <td>
                        @if($coupon->is_active && $coupon->isValid())
                            <span class="badge bg-success">Active</span>
                        @elseif(!$coupon->is_active)
                            <span class="badge bg-danger">Inactive</span>
                        @else
                            <span class="badge bg-warning text-dark">Expired</span>
                        @endif
                    </td>
                    <td>
                        @if($coupon->expires_at)
                            {{ $coupon->expires_at->format('M d, Y') }}
                            @if($coupon->expires_at->isPast())
                                <span class="badge bg-danger">Expired</span>
                            @elseif($coupon->expires_at->diffInDays(now()) < 7)
                                <span class="badge bg-warning text-dark">Ending soon</span>
                            @endif
                        @else
                            <span class="text-muted">No expiration</span>
                        @endif
                    </td>
                    <td>{{ $coupon->created_at->format('M d, Y') }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('admin.coupons.edit', $coupon) }}" class="btn btn-primary btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ route('admin.coupons.show', $coupon) }}" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <form action="{{ route('admin.coupons.destroy', $coupon) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm delete-coupon">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center">
                        No coupons found. <a href="{{ route('admin.coupons.create') }}">Create your first coupon</a>.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-between align-items-center mt-3">
    <div>
        Showing {{ $coupons->firstItem() ?? 0 }} to {{ $coupons->lastItem() ?? 0 }} of {{ $coupons->total() }} coupons
    </div>
    <div>
        {{ $coupons->appends(request()->except('page'))->links() }}
    </div>
</div>
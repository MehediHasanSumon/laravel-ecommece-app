<div class="table-responsive">
    <table class="table table-hover align-middle border-0">
        <thead class="bg-light">
            <tr>
                <th class="fw-bold text-uppercase text-muted small">Name</th>
                <th class="fw-bold text-uppercase text-muted small">Type</th>
                <th class="fw-bold text-uppercase text-muted small">Value</th>
                <th class="fw-bold text-uppercase text-muted small">Products</th>
                <th class="fw-bold text-uppercase text-muted small">Status</th>
                <th class="fw-bold text-uppercase text-muted small">Validity</th>
                <th class="fw-bold text-uppercase text-muted small">Created</th>
                <th class="fw-bold text-uppercase text-muted small text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($discounts as $discount)
                <tr class="border-bottom">
                    <td>
                        <div class="fw-bold">{{ $discount->name }}</div>
                    </td>
                    <td>
                        @if($discount->type == 'percentage')
                            <span class="badge bg-primary rounded-pill">Percentage</span>
                        @else
                            <span class="badge bg-info rounded-pill">Fixed Amount</span>
                        @endif
                    </td>
                    <td class="fw-bold">
                        @if($discount->type == 'percentage')
                            <span class="text-primary">{{ $discount->value }}%</span>
                        @else
                            <span class="text-success">${{ number_format($discount->value, 2) }}</span>
                        @endif
                    </td>
                    <td>
                        @if($discount->applies_to_all_products)
                            <span class="badge bg-info rounded-pill">All Products</span>
                        @else
                            <span class="badge bg-secondary rounded-pill">{{ $discount->products->count() }} products</span>
                            <a href="#" class="small ms-1 text-decoration-none" data-bs-toggle="tooltip" title="View Products"><i class="fas fa-info-circle"></i></a>
                        @endif
                    </td>
                    <td>
                        @if($discount->is_active && $discount->isValid())
                            <span class="badge bg-success rounded-pill"><i class="fas fa-check-circle me-1"></i> Active</span>
                        @elseif(!$discount->is_active)
                            <span class="badge bg-danger rounded-pill"><i class="fas fa-times-circle me-1"></i> Inactive</span>
                        @else
                            <span class="badge bg-warning text-dark rounded-pill"><i class="fas fa-exclamation-circle me-1"></i> Expired</span>
                        @endif
                    </td>
                    <td>
                        <div class="small">
                            @if($discount->starts_at && $discount->expires_at)
                                <i class="far fa-calendar-alt me-1"></i> {{ $discount->starts_at->format('M d') }} - {{ $discount->expires_at->format('M d, Y') }}
                                @if($discount->expires_at->isPast())
                                    <span class="badge bg-danger rounded-pill ms-1">Expired</span>
                                @elseif($discount->expires_at->diffInDays(now()) < 7)
                                    <span class="badge bg-warning text-dark rounded-pill ms-1">Ending soon</span>
                                @endif
                            @elseif($discount->expires_at)
                                <i class="far fa-calendar-alt me-1"></i> Until {{ $discount->expires_at->format('M d, Y') }}
                            @elseif($discount->starts_at)
                                <i class="far fa-calendar-alt me-1"></i> From {{ $discount->starts_at->format('M d, Y') }}
                            @else
                                <span class="text-muted"><i class="fas fa-infinity me-1"></i> Always valid</span>
                            @endif
                        </div>
                    </td>
                    <td>
                        <div class="small text-muted">
                            <i class="far fa-clock me-1"></i> {{ $discount->created_at->format('M d, Y') }}
                        </div>
                    </td>
                    <td>
                        <div class="d-flex justify-content-center gap-1">
                            <a href="{{ route('admin.discounts.edit', $discount) }}" class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" title="Edit Discount">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ route('admin.discounts.show', $discount) }}" class="btn btn-sm btn-outline-info" data-bs-toggle="tooltip" title="View Details">
                                <i class="fas fa-eye"></i>
                            </a>
                            <form action="{{ route('admin.discounts.destroy', $discount) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-outline-danger delete-discount" data-bs-toggle="tooltip" title="Delete Discount">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center py-4">
                        <div class="d-flex flex-column align-items-center">
                            <i class="fas fa-tags fa-3x text-muted mb-3"></i>
                            <p class="mb-1">No discounts found.</p>
                            <a href="{{ route('admin.discounts.create') }}" class="btn btn-sm btn-primary mt-2">
                                <i class="fas fa-plus-circle me-1"></i> Create your first discount
                            </a>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-between align-items-center mt-4">
    <div class="small text-muted">
        <i class="fas fa-info-circle me-1"></i> Showing {{ $discounts->firstItem() ?? 0 }} to {{ $discounts->lastItem() ?? 0 }} of {{ $discounts->total() }} discounts
    </div>
    <div>
        {{ $discounts->appends(request()->except('page'))->links() }}
    </div>
</div>
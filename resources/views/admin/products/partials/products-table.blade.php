<div class="table-responsive shadow-sm rounded">
    <table class="table table-hover align-middle mb-0" id="products-table" width="100%" cellspacing="0">
        <thead class="bg-light">
            <tr>
                <th class="border-0 rounded-start">Image</th>
                <th class="border-0">Name</th>
                <th class="border-0">SKU</th>
                <th class="border-0">Category</th>
                <th class="border-0">Price</th>
                <th class="border-0">Stock</th>
                <th class="border-0">Status</th>
                <th class="border-0">Created</th>
                <th class="border-0 rounded-end text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                <tr>
                    <td>
                        <div class="d-flex align-items-center justify-content-center">
                            @if($product->image)
                                <img src="{{ $product->image }}" alt="{{ $product->name }}" width="50" height="50" class="rounded" style="object-fit: cover;">
                            @else
                                <div class="bg-light rounded d-flex align-items-center justify-content-center" style="width: 50px; height: 50px;">
                                    <i class="fas fa-image text-secondary"></i>
                                </div>
                            @endif
                        </div>
                    </td>
                    <td>
                        <div>
                            <div class="fw-semibold text-truncate" style="max-width: 200px;" title="{{ $product->name }}">{{ $product->name }}</div>
                            @if($product->is_featured)
                                <span class="badge bg-warning text-dark mt-1">Featured</span>
                            @endif
                        </div>
                    </td>
                    <td><span class="badge bg-light text-dark border">{{ $product->sku }}</span></td>
                    <td>
                        <span class="badge bg-info text-white">
                            {{ $product->category ? $product->category->name : 'Uncategorized' }}
                        </span>
                    </td>
                    <td>
                        @if($product->sale_price)
                            <div>
                                <span class="text-decoration-line-through text-muted small">${{ number_format($product->price, 2) }}</span>
                            </div>
                            <div>
                                <span class="fw-bold text-danger">${{ number_format($product->sale_price, 2) }}</span>
                            </div>
                        @else
                            <span class="fw-bold">${{ number_format($product->price, 2) }}</span>
                        @endif
                    </td>
                    <td>
                        @if($product->stock_quantity > 10)
                            <span class="badge bg-success">{{ $product->stock_quantity }} in stock</span>
                        @elseif($product->stock_quantity > 0)
                            <span class="badge bg-warning text-dark">{{ $product->stock_quantity }} left</span>
                        @else
                            <span class="badge bg-danger">Out of stock</span>
                        @endif
                    </td>
                    <td>
                        @if($product->is_active)
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" checked disabled>
                            </div>
                        @else
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" disabled>
                            </div>
                        @endif
                    </td>
                    <td>{{ $product->created_at->format('M d, Y') }}</td>
                    <td>
                        <div class="d-flex justify-content-center gap-1">
                            <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ route('admin.products.show', $product) }}" class="btn btn-sm btn-outline-info" title="View">
                                <i class="fas fa-eye"></i>
                            </a>
                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete" onclick="return confirm('Are you sure you want to delete this product?')">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="9" class="text-center py-4">
                        <div class="d-flex flex-column align-items-center">
                            <i class="fas fa-box-open text-muted mb-3" style="font-size: 2rem;"></i>
                            <p class="text-muted">No products found.</p>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="d-flex justify-content-center mt-4">
    {{ $products->links() }}
</div>
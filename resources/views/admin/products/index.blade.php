@extends('layouts.admin')

@section('title', 'Products')

@section('content')
<!-- Page Header -->
<div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
    <div>
        <h2 class="text-2xl font-bold text-gray-800">Products</h2>
        <p class="mt-1 text-sm text-gray-500">Manage your store products and inventory</p>
    </div>
    <div class="mt-4 md:mt-0">
        <a href="{{ route('admin.products.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg flex items-center shadow-sm transition-all duration-200 transform hover:translate-y-[-2px]">
            <i class="fas fa-plus mr-2"></i> Add New Product
        </a>
    </div>
</div>
    
@if(session('success'))
<div class="bg-green-50 border border-green-200 rounded-lg shadow-sm p-4 mb-6 flex items-start" role="alert">
    <div class="flex-shrink-0 mr-3">
        <i class="fas fa-check-circle text-green-500 text-xl"></i>
    </div>
    <div>
        <h3 class="font-medium text-green-800">Success!</h3>
        <p class="text-green-700">{{ session('success') }}</p>
    </div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-100 inline-flex h-8 w-8" data-dismiss-target="#alert-3" aria-label="Close">
        <span class="sr-only">Close</span>
        <i class="fas fa-times"></i>
    </button>
</div>
@endif

@if(session('error'))
<div class="bg-red-50 border border-red-200 rounded-lg shadow-sm p-4 mb-6 flex items-start" role="alert">
    <div class="flex-shrink-0 mr-3">
        <i class="fas fa-exclamation-circle text-red-500 text-xl"></i>
    </div>
    <div>
        <h3 class="font-medium text-red-800">Error!</h3>
        <p class="text-red-700">{{ session('error') }}</p>
    </div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-100 inline-flex h-8 w-8" data-dismiss-target="#alert-2" aria-label="Close">
        <span class="sr-only">Close</span>
        <i class="fas fa-times"></i>
    </button>
</div>
@endif
    
<!-- Filters & Search -->
<div class="bg-white rounded-lg shadow-sm overflow-hidden mb-6 border border-gray-100">
    <div class="p-4 bg-gray-50 border-b border-gray-100">
        <div class="flex items-center">
            <i class="fas fa-filter text-indigo-500 mr-2"></i>
            <h3 class="font-medium text-gray-700">Filter Products</h3>
        </div>
    </div>
    
    <form id="products-filter-form" action="{{ route('admin.products.index') }}" method="GET" class="p-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
            <!-- Search -->
            <div class="col-span-1 md:col-span-2">
                <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                <div class="relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                    <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Search by name, SKU, or description..." class="block w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
            </div>
            
            <!-- Category Filter -->
            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                <select name="category_id" id="category_id" class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">All Categories</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <!-- Status Filter -->
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select name="status" id="status" class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">All Status</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
            <!-- Sort By -->
            <div>
                <label for="sort_by" class="block text-sm font-medium text-gray-700 mb-1">Sort By</label>
                <select name="sort_by" id="sort_by" class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="created_at" {{ request('sort_by') == 'created_at' ? 'selected' : '' }}>Date Added</option>
                    <option value="name" {{ request('sort_by') == 'name' ? 'selected' : '' }}>Name</option>
                    <option value="price" {{ request('sort_by') == 'price' ? 'selected' : '' }}>Price</option>
                    <option value="stock_quantity" {{ request('sort_by') == 'stock_quantity' ? 'selected' : '' }}>Stock</option>
                </select>
            </div>
            
            <!-- Sort Direction -->
            <div>
                <label for="sort_direction" class="block text-sm font-medium text-gray-700 mb-1">Order</label>
                <select name="sort_direction" id="sort_direction" class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="desc" {{ request('sort_direction') == 'desc' ? 'selected' : '' }}>Descending</option>
                    <option value="asc" {{ request('sort_direction') == 'asc' ? 'selected' : '' }}>Ascending</option>
                </select>
            </div>
            
            <!-- Stock Status -->
            <div>
                <label for="stock_status" class="block text-sm font-medium text-gray-700 mb-1">Stock Status</label>
                <select name="stock_status" id="stock_status" class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">All Stock Status</option>
                    <option value="in_stock" {{ request('stock_status') == 'in_stock' ? 'selected' : '' }}>In Stock</option>
                    <option value="low_stock" {{ request('stock_status') == 'low_stock' ? 'selected' : '' }}>Low Stock</option>
                    <option value="out_of_stock" {{ request('stock_status') == 'out_of_stock' ? 'selected' : '' }}>Out of Stock</option>
                </select>
            </div>
            
            <!-- Featured Status -->
            <div>
                <label for="is_featured" class="block text-sm font-medium text-gray-700 mb-1">Featured</label>
                <select name="is_featured" id="is_featured" class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">All Products</option>
                    <option value="1" {{ request('is_featured') == '1' ? 'selected' : '' }}>Featured Only</option>
                    <option value="0" {{ request('is_featured') == '0' ? 'selected' : '' }}>Non-Featured Only</option>
                </select>
            </div>
        </div>
        
        <div class="flex justify-end space-x-3">
            <a href="{{ route('admin.products.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <i class="fas fa-times mr-2"></i> Reset
            </a>
            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <i class="fas fa-filter mr-2"></i> Apply Filters
            </button>
        </div>
    </form>
</div>
    
<!-- Product Stats -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
    <!-- Total Products -->
    <div class="bg-gradient-to-br from-blue-50 to-white rounded-xl shadow-sm p-6 border border-blue-100 transition-all duration-300 hover:shadow-md hover:translate-y-[-2px]">
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center">
                <div class="p-3 bg-blue-100 rounded-lg mr-3">
                    <i class="fas fa-box text-blue-600"></i>
                </div>
                <h3 class="text-sm font-medium text-gray-700">Total Products</h3>
            </div>
            <span class="text-xs font-medium px-2 py-1 bg-blue-100 text-blue-800 rounded-full">All Time</span>
        </div>
        <div class="flex items-end justify-between">
            <div>
                <p class="text-3xl font-bold text-gray-800">{{ $stats['total'] }}</p>
                <p class="text-sm text-gray-500 mt-1">Products in database</p>
            </div>
            <div class="text-blue-500">
                <i class="fas fa-chart-line text-xl"></i>
            </div>
        </div>
    </div>
    
    <!-- Active Products -->
    <div class="bg-gradient-to-br from-green-50 to-white rounded-xl shadow-sm p-6 border border-green-100 transition-all duration-300 hover:shadow-md hover:translate-y-[-2px]">
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center">
                <div class="p-3 bg-green-100 rounded-lg mr-3">
                    <i class="fas fa-check-circle text-green-600"></i>
                </div>
                <h3 class="text-sm font-medium text-gray-700">Active Products</h3>
            </div>
            <span class="text-xs font-medium px-2 py-1 bg-green-100 text-green-800 rounded-full">{{ number_format(($stats['active'] / max($stats['total'], 1)) * 100, 0) }}%</span>
        </div>
        <div class="flex items-end justify-between">
            <div>
                <p class="text-3xl font-bold text-gray-800">{{ $stats['active'] }}</p>
                <p class="text-sm text-gray-500 mt-1">Currently active</p>
            </div>
            <div class="text-green-500">
                <i class="fas fa-chart-bar text-xl"></i>
            </div>
        </div>
    </div>
    
    <!-- Out of Stock -->
    <div class="bg-gradient-to-br from-red-50 to-white rounded-xl shadow-sm p-6 border border-red-100 transition-all duration-300 hover:shadow-md hover:translate-y-[-2px]">
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center">
                <div class="p-3 bg-red-100 rounded-lg mr-3">
                    <i class="fas fa-exclamation-triangle text-red-600"></i>
                </div>
                <h3 class="text-sm font-medium text-gray-700">Out of Stock</h3>
            </div>
            <span class="text-xs font-medium px-2 py-1 bg-red-100 text-red-800 rounded-full">{{ number_format(($stats['out_of_stock'] / max($stats['total'], 1)) * 100, 0) }}%</span>
        </div>
        <div class="flex items-end justify-between">
            <div>
                <p class="text-3xl font-bold text-gray-800">{{ $stats['out_of_stock'] }}</p>
                <p class="text-sm text-gray-500 mt-1">Need restocking</p>
            </div>
            <div class="text-red-500">
                <i class="fas fa-chart-line text-xl"></i>
            </div>
        </div>
    </div>
</div>
    
<!-- Products Table -->
<div class="bg-white rounded-xl shadow-sm overflow-hidden mb-6 border border-gray-100">
    <div class="p-5 border-b border-gray-100 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div class="flex items-center">
            <div class="p-2 bg-indigo-100 rounded-lg mr-3">
                <i class="fas fa-table text-indigo-600"></i>
            </div>
            <div>
                <h3 class="font-semibold text-gray-800 text-lg">Products List</h3>
                <p class="text-sm text-gray-500">Manage and organize your product inventory</p>
            </div>
        </div>
        <a href="{{ route('admin.products.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg flex items-center shadow-sm transition-all duration-200 transform hover:translate-y-[-2px]">
            <i class="fas fa-plus mr-2"></i> Add New Product
        </a>
    </div>
    <div class="overflow-x-auto">
        <div id="products-table-container" class="min-w-full">
            @include('admin.products.partials.products-table-tailwind')
        </div>
    </div>
</div>

<!-- Pagination -->
<div class="mt-6 flex justify-center">
    <div class="bg-white rounded-lg shadow-sm px-4 py-3 border border-gray-100">
        {{ $products->links() }}
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // AJAX filtering and pagination with loading indicators
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            getProducts(url);
            
            // Show loading indicator
            $('#products-table-container').append('<div class="loading-overlay flex items-center justify-center p-12"><div class="animate-spin rounded-full h-12 w-12 border-b-2 border-indigo-600"></div></div>');
        });
        
        $('#filter-form').on('submit', function(e) {
            e.preventDefault();
            var url = $(this).attr('action') + '?' + $(this).serialize();
            getProducts(url);
            
            // Show loading indicator
            $('#products-table-container').append('<div class="loading-overlay flex items-center justify-center p-12"><div class="animate-spin rounded-full h-12 w-12 border-b-2 border-indigo-600"></div></div>');
        });
        
        // Enhanced delete confirmation
        $(document).on('click', '.delete-product', function(e) {
            e.preventDefault();
            var deleteUrl = $(this).attr('href');
            
            // Use SweetAlert if available, otherwise fallback to standard confirm
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    title: 'Are you sure?',
                    text: "This product will be permanently deleted!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#4f46e5',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = deleteUrl;
                    }
                });
            } else {
                if (confirm('Are you sure you want to delete this product? This action cannot be undone.')) {
                    window.location.href = deleteUrl;
                }
            }
        });
        
        function getProducts(url) {
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Remove loading overlay if exists
                    $('.loading-overlay').remove();
                    
                    $('#products-table-container').html(data.products + data.pagination);
                    // Update URL without page refresh
                    window.history.pushState("", "", url);
                },
                error: function(xhr, status, error) {
                    // Remove loading overlay if exists
                    $('.loading-overlay').remove();
                    console.error(error);
                    
                    // Show error notification
                    if ($('.notification-container').length === 0) {
                        $('body').append('<div class="notification-container fixed top-5 right-5 z-50"></div>');
                    }
                    
                    $('.notification-container').append(
                        '<div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-3 rounded shadow-md animate-fade-in-down">' +
                        '<div class="flex items-center">' +
                        '<div class="py-1"><i class="fas fa-exclamation-circle mr-2"></i></div>' +
                        '<div><p class="font-bold">Error</p><p>Failed to load products. Please try again.</p></div>' +
                        '</div>' +
                        '</div>'
                    );
                    
                    // Auto-remove notification after 5 seconds
                    setTimeout(function() {
                        $('.notification-container .bg-red-100').first().remove();
                    }, 5000);
                }
            });
        }
    });
</script>
@endsection
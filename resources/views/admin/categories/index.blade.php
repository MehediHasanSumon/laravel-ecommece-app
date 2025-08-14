@extends('layouts.admin')

@section('title', 'Categories')

@section('content')
<!-- Page Header -->
<div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
    <div>
        <h2 class="text-2xl font-bold">Categories</h2>
        <p class="mt-1 text-sm text-gray-500">Manage your product categories</p>
    </div>
    <div class="mt-4 md:mt-0">
        <a href="{{ route('admin.categories.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-plus mr-2"></i> Add New Category
        </a>
    </div>
</div>

@if(session('success'))
<div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
    <p>{{ session('success') }}</p>
</div>
@endif

@if(session('error'))
<div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
    <p>{{ session('error') }}</p>
</div>
@endif

<!-- Filters & Search -->
<form id="categories-filter-form" action="{{ route('admin.categories.index') }}" method="GET" class="bg-white rounded-lg shadow-sm p-4 mb-6">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
        <!-- Search -->
        <div class="relative w-full md:w-64">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search categories..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
        </div>
        
        <!-- Filters -->
        <div class="flex flex-wrap items-center gap-3">
            <select name="status" class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                <option value="">All Status</option>
                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
            
            <select name="parent_id" class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                <option value="">All Categories</option>
                <option value="parent" {{ request('parent_id') == 'parent' ? 'selected' : '' }}>Parent Categories</option>
                @foreach($parentCategories as $parentCategory)
                    <option value="{{ $parentCategory->id }}" {{ request('parent_id') == $parentCategory->id ? 'selected' : '' }}>
                        {{ $parentCategory->name }}
                    </option>
                @endforeach
            </select>
            
            <select name="sort_by" class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                <option value="created_at" {{ (request('sort_by') == 'created_at' || !request('sort_by')) ? 'selected' : '' }}>Date Created</option>
                <option value="name" {{ request('sort_by') == 'name' ? 'selected' : '' }}>Name</option>
                <option value="product_count" {{ request('sort_by') == 'product_count' ? 'selected' : '' }}>Products</option>
            </select>
            
            <select name="sort_direction" class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                <option value="desc" {{ (request('sort_direction') == 'desc' || !request('sort_direction')) ? 'selected' : '' }}>Descending</option>
                <option value="asc" {{ request('sort_direction') == 'asc' ? 'selected' : '' }}>Ascending</option>
            </select>
            
            <button type="submit" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg">
                <i class="fas fa-filter mr-2"></i> Filter
            </button>
            
            <a href="{{ route('admin.categories.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-4 py-2 rounded-lg">
                <i class="fas fa-times mr-2"></i> Reset
            </a>
        </div>
    </div>
</form>

<!-- Category Stats -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    <!-- Total Categories -->
    <div class="admin-card bg-white rounded-lg shadow-sm p-4">
        <div class="flex items-center justify-between mb-3">
            <h3 class="text-sm font-medium text-gray-500">Total Categories</h3>
        </div>
        <div class="flex items-end justify-between">
            <p class="text-2xl font-bold">{{ $stats['total'] }}</p>
            <div class="p-2 bg-purple-100 rounded-md">
                <i class="fas fa-folder text-purple-500"></i>
            </div>
        </div>
    </div>
    
    <!-- Active Categories -->
    <div class="admin-card bg-white rounded-lg shadow-sm p-4">
        <div class="flex items-center justify-between mb-3">
            <h3 class="text-sm font-medium text-gray-500">Active Categories</h3>
        </div>
        <div class="flex items-end justify-between">
            <p class="text-2xl font-bold">{{ $stats['active'] }}</p>
            <div class="p-2 bg-green-100 rounded-md">
                <i class="fas fa-check-circle text-green-500"></i>
            </div>
        </div>
    </div>
    
    <!-- Products Categorized -->
    <div class="admin-card bg-white rounded-lg shadow-sm p-4">
        <div class="flex items-center justify-between mb-3">
            <h3 class="text-sm font-medium text-gray-500">Products Categorized</h3>
        </div>
        <div class="flex items-end justify-between">
            <p class="text-2xl font-bold">{{ $stats['products'] }}</p>
            <div class="p-2 bg-blue-100 rounded-md">
                <i class="fas fa-box text-blue-500"></i>
            </div>
        </div>
    </div>
</div>

<!-- Categories Table -->
<div id="categories-table-container" class="bg-white rounded-lg shadow-sm overflow-hidden mb-6">
    @include('admin.categories.partials.categories-table')
</div>

<!-- Pagination -->
<div id="pagination-container">
    @include('admin.partials.pagination', ['paginator' => $categories])
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('categories-filter-form');
        const filterInputs = form.querySelectorAll('input, select');
        
        // Handle filter changes
        filterInputs.forEach(input => {
            if (input.type !== 'submit') {
                input.addEventListener('change', function() {
                    applyFilters();
                });
            }
        });
        
        // Handle form submission
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            applyFilters();
        });
        
        // Apply filters via AJAX
        function applyFilters() {
            const formData = new FormData(form);
            const searchParams = new URLSearchParams(formData);
            const url = `${form.action}?${searchParams.toString()}`;
            
            // Update URL without reloading the page
            window.history.pushState({}, '', url);
            
            // Fetch filtered results
            fetch(url, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('categories-table-container').innerHTML = data.categories;
                document.getElementById('pagination-container').innerHTML = data.pagination;
            })
            .catch(error => console.error('Error:', error));
        }
    });
</script>
@endsection
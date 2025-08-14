@extends('layouts.admin')

@section('title', 'Manage Discounts')

@section('content')
<!-- Page Header -->
<div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
    <div>
        <h2 class="text-2xl font-bold text-gray-800">Discounts</h2>
        <p class="mt-1 text-sm text-gray-500">Manage your store discounts and promotional offers</p>
    </div>
    <div class="mt-4 md:mt-0">
        <a href="{{ route('admin.discounts.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg flex items-center shadow-sm transition-all duration-200 transform hover:translate-y-[-2px]">
            <i class="fas fa-plus mr-2"></i> Add New Discount
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
            <h3 class="font-medium text-gray-700">Filter Discounts</h3>
        </div>
    </div>
    
    <form id="filter-form" action="{{ route('admin.discounts.index') }}" method="GET" class="p-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
            <!-- Search -->
            <div class="col-span-1 md:col-span-2">
                <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                <div class="relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-search text-gray-400"></i>
                    </div>
                    <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Search by name or description..." class="block w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
            </div>
            
            <!-- Status Filter -->
            <div>
                <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                <select name="status" id="status" class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">All Statuses</option>
                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                    <option value="expired" {{ request('status') == 'expired' ? 'selected' : '' }}>Expired</option>
                </select>
            </div>
            
            <!-- Type Filter -->
            <div>
                <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Discount Type</label>
                <select name="type" id="type" class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">All Types</option>
                    <option value="percentage" {{ request('type') == 'percentage' ? 'selected' : '' }}>Percentage</option>
                    <option value="fixed" {{ request('type') == 'fixed' ? 'selected' : '' }}>Fixed Amount</option>
                </select>
            </div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-4">
            <!-- Date Range -->
            <div>
                <label for="date_range" class="block text-sm font-medium text-gray-700 mb-1">Date Range</label>
                <div class="relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-calendar-alt text-gray-400"></i>
                    </div>
                    <input type="text" id="date_range" name="date_range" value="{{ request('date_range') }}" placeholder="Select date range" class="block w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                </div>
            </div>
            
            <!-- Product Filter -->
            <div>
                <label for="product_filter" class="block text-sm font-medium text-gray-700 mb-1">Product Applicability</label>
                <select name="product_filter" id="product_filter" class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">All Discounts</option>
                    <option value="all_products" {{ request('product_filter') == 'all_products' ? 'selected' : '' }}>All Products</option>
                    <option value="specific_products" {{ request('product_filter') == 'specific_products' ? 'selected' : '' }}>Specific Products</option>
                </select>
            </div>
            
            <!-- Sort By -->
            <div>
                <label for="sort_by" class="block text-sm font-medium text-gray-700 mb-1">Sort By</label>
                <select name="sort_by" id="sort_by" class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="created_at" {{ request('sort_by') == 'created_at' ? 'selected' : '' }}>Date Added</option>
                    <option value="name" {{ request('sort_by') == 'name' ? 'selected' : '' }}>Name</option>
                    <option value="value" {{ request('sort_by') == 'value' ? 'selected' : '' }}>Value</option>
                    <option value="expires_at" {{ request('sort_by') == 'expires_at' ? 'selected' : '' }}>Expiry Date</option>
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
        </div>
        
        <div class="flex justify-end space-x-3">
            <a href="{{ route('admin.discounts.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <i class="fas fa-times mr-2"></i> Reset
            </a>
            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                <i class="fas fa-filter mr-2"></i> Apply Filters
            </button>
        </div>
    </form>
</div>
            
<!-- Discount Stats -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
    <!-- Total Discounts -->
    <div class="bg-gradient-to-br from-white to-indigo-50 rounded-lg shadow-sm p-6 border border-gray-100 transition-all duration-200 transform hover:shadow-md hover:translate-y-[-2px]">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-700">Total Discounts</h3>
                <p class="text-3xl font-bold text-indigo-600 mt-2">{{ $stats['total'] }}</p>
                <p class="text-sm text-gray-500 mt-1">All Time</p>
            </div>
            <div class="bg-indigo-100 p-3 rounded-full shadow-sm">
                <i class="fas fa-tags text-2xl text-indigo-600"></i>
            </div>
        </div>
        @if($stats['total'] > 0)
        <div class="mt-4 pt-3 border-t border-gray-100">
            <p class="text-sm text-gray-600">
                <i class="fas fa-chart-line text-indigo-500 mr-1"></i> 
                {{ round(($stats['active'] / $stats['total']) * 100) }}% currently active
            </p>
        </div>
        @endif
    </div>
    
    <!-- Active Discounts -->
    <div class="bg-gradient-to-br from-white to-green-50 rounded-lg shadow-sm p-6 border border-gray-100 transition-all duration-200 transform hover:shadow-md hover:translate-y-[-2px]">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-700">Active Discounts</h3>
                <p class="text-3xl font-bold text-green-600 mt-2">{{ $stats['active'] }}</p>
                <p class="text-sm text-gray-500 mt-1">Currently Running</p>
            </div>
            <div class="bg-green-100 p-3 rounded-full shadow-sm">
                <i class="fas fa-check-circle text-2xl text-green-600"></i>
            </div>
        </div>
        @if($stats['active'] > 0)
        <div class="mt-4 pt-3 border-t border-gray-100">
            <p class="text-sm text-gray-600">
                <i class="fas fa-percentage text-green-500 mr-1"></i>
                {{ $stats['percentage'] ?? 0 }} percentage & {{ $stats['fixed'] ?? 0 }} fixed
            </p>
        </div>
        @endif
    </div>
    
    <!-- Expired Discounts -->
    <div class="bg-gradient-to-br from-white to-red-50 rounded-lg shadow-sm p-6 border border-gray-100 transition-all duration-200 transform hover:shadow-md hover:translate-y-[-2px]">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-700">Expired Discounts</h3>
                <p class="text-3xl font-bold text-red-600 mt-2">{{ $stats['expired'] }}</p>
                <p class="text-sm text-gray-500 mt-1">Need Renewal</p>
            </div>
            <div class="bg-red-100 p-3 rounded-full shadow-sm">
                <i class="fas fa-calendar-times text-2xl text-red-600"></i>
            </div>
        </div>
        @if($stats['expired'] > 0)
        <div class="mt-4 pt-3 border-t border-gray-100">
            <p class="text-sm text-gray-600">
                <i class="fas fa-history text-red-500 mr-1"></i>
                {{ $stats['recently_expired'] ?? 0 }} expired in last 7 days
            </p>
        </div>
        @endif
    </div>
</div>
            
<!-- Discounts Table -->
<div class="bg-white rounded-lg shadow-sm overflow-hidden mb-6 border border-gray-100">
    <div class="p-4 border-b border-gray-200 flex justify-between items-center bg-gray-50">
        <div class="flex items-center">
            <i class="fas fa-tags mr-2 text-indigo-500"></i>
            <h3 class="font-medium text-gray-800">Discounts List</h3>
        </div>
        <a href="{{ route('admin.discounts.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200 transform hover:translate-y-[-2px]">
            <i class="fas fa-plus mr-2"></i> Add New Discount
        </a>
    </div>
    <div class="overflow-x-auto">
        <div id="discounts-table-container">
            @include('admin.discounts.partials.discounts-table-tailwind')
        </div>
    </div>
</div>

<!-- Pagination -->
<div class="mt-4 flex justify-center">
    {{ $discounts->appends(request()->query())->links() }}
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Date range picker initialization with improved styling
        $('#date_range').daterangepicker({
            autoUpdateInput: false,
            opens: 'left',
            drops: 'down',
            locale: {
                cancelLabel: 'Clear',
                format: 'MM/DD/YYYY',
                applyLabel: 'Apply',
                separator: ' - '
            },
            ranges: {
               'Today': [moment(), moment()],
               'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
               'Last 7 Days': [moment().subtract(6, 'days'), moment()],
               'Last 30 Days': [moment().subtract(29, 'days'), moment()],
               'This Month': [moment().startOf('month'), moment().endOf('month')],
               'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        });
        
        $('#date_range').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
            $('#filter-form').submit();
        });
        
        $('#date_range').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
            $('#filter-form').submit();
        });
        
        // AJAX pagination with loading indicator
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            
            // Add loading indicator
            $('#discounts-table-container').addClass('opacity-50');
            $('<div class="flex justify-center py-6"><i class="fas fa-spinner fa-spin text-indigo-500 text-2xl"></i></div>').insertAfter('#discounts-table-container');
            
            $.ajax({
                url: url,
                data: $('#filter-form').serialize(),
                success: function(data) {
                    $('#discounts-table-container').removeClass('opacity-50');
                    $('.fa-spinner').parent().remove();
                    $('#discounts-table-container').html(data);
                },
                error: function() {
                    $('#discounts-table-container').removeClass('opacity-50');
                    $('.fa-spinner').parent().remove();
                    alert('An error occurred while loading the data. Please try again.');
                }
            });
        });
        
        // AJAX filtering with loading indicator
        $('#filter-form').on('submit', function(e) {
            e.preventDefault();
            
            // Add loading indicator
            $('#discounts-table-container').addClass('opacity-50');
            $('<div class="flex justify-center py-6"><i class="fas fa-spinner fa-spin text-indigo-500 text-2xl"></i></div>').insertAfter('#discounts-table-container');
            
            $.ajax({
                url: $(this).attr('action'),
                data: $(this).serialize(),
                success: function(data) {
                    $('#discounts-table-container').removeClass('opacity-50');
                    $('.fa-spinner').parent().remove();
                    $('#discounts-table-container').html(data);
                    
                    // Update URL with filters for bookmarking/sharing
                    window.history.pushState({}, '', '?' + $('#filter-form').serialize());
                },
                error: function() {
                    $('#discounts-table-container').removeClass('opacity-50');
                    $('.fa-spinner').parent().remove();
                    alert('An error occurred while filtering the data. Please try again.');
                }
            });
        });
        
        // Auto-submit on select change
        $('#filter-form select').change(function() {
            $('#filter-form').submit();
        });
        
        // Enhanced delete confirmation with SweetAlert if available, fallback to standard confirm
        $(document).on('click', '.delete-discount', function(e) {
            e.preventDefault();
            var deleteForm = $(this).closest('form');
            
            if (typeof Swal !== 'undefined') {
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'This discount will be permanently deleted. This action cannot be undone.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        deleteForm.submit();
                    }
                });
            } else {
                if (confirm('Are you sure you want to delete this discount? This action cannot be undone.')) {
                    deleteForm.submit();
                }
            }
        });
        
        // Initialize tooltips
        if (typeof bootstrap !== 'undefined' && bootstrap.Tooltip) {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl);
            });
        }
    });
</script>
@endsection
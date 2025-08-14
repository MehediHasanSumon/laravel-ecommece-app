@extends('layouts.admin')

@section('title', 'Manage Coupons')

@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Coupons</h1>
    
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <i class="fas fa-tag me-1"></i>
                Coupon Management
            </div>
            <a href="{{ route('admin.coupons.create') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus"></i> Add New Coupon
            </a>
        </div>
        <div class="card-body">
            <form id="filter-form" action="{{ route('admin.coupons.index') }}" method="GET" class="mb-4">
                <div class="row g-3">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="search">Search</label>
                            <input type="text" class="form-control" id="search" name="search" value="{{ request('search') }}" placeholder="Code or description...">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="">All</option>
                                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                <option value="expired" {{ request('status') == 'expired' ? 'selected' : '' }}>Expired</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select class="form-control" id="type" name="type">
                                <option value="">All</option>
                                <option value="percentage" {{ request('type') == 'percentage' ? 'selected' : '' }}>Percentage</option>
                                <option value="fixed" {{ request('type') == 'fixed' ? 'selected' : '' }}>Fixed Amount</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="date_range">Date Range</label>
                            <input type="text" class="form-control" id="date_range" name="date_range" value="{{ request('date_range') }}" placeholder="Select date range">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="sort">Sort By</label>
                            <select class="form-control" id="sort" name="sort">
                                <option value="created_at_desc" {{ request('sort') == 'created_at_desc' ? 'selected' : '' }}>Newest First</option>
                                <option value="created_at_asc" {{ request('sort') == 'created_at_asc' ? 'selected' : '' }}>Oldest First</option>
                                <option value="code_asc" {{ request('sort') == 'code_asc' ? 'selected' : '' }}>Code (A-Z)</option>
                                <option value="code_desc" {{ request('sort') == 'code_desc' ? 'selected' : '' }}>Code (Z-A)</option>
                                <option value="value_asc" {{ request('sort') == 'value_asc' ? 'selected' : '' }}>Value (Low-High)</option>
                                <option value="value_desc" {{ request('sort') == 'value_desc' ? 'selected' : '' }}>Value (High-Low)</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fas fa-filter"></i> Filter
                    </button>
                    <a href="{{ route('admin.coupons.index') }}" class="btn btn-secondary btn-sm">
                        <i class="fas fa-sync"></i> Reset
                    </a>
                </div>
            </form>
            
            <div class="row mb-3">
                <div class="col-md-4">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="mb-0">Total Coupons</h5>
                                    <p class="mb-0">All coupons in system</p>
                                </div>
                                <div>
                                    <h2 class="mb-0">{{ $stats['total'] }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="mb-0">Active Coupons</h5>
                                    <p class="mb-0">Currently valid</p>
                                </div>
                                <div>
                                    <h2 class="mb-0">{{ $stats['active'] }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="mb-0">Expired Coupons</h5>
                                    <p class="mb-0">No longer valid</p>
                                </div>
                                <div>
                                    <h2 class="mb-0">{{ $stats['expired'] }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div id="coupons-table-container">
                @include('admin.coupons.partials.coupons-table')
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Date range picker initialization
        $('#date_range').daterangepicker({
            autoUpdateInput: false,
            locale: {
                cancelLabel: 'Clear'
            }
        });
        
        $('#date_range').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
        });
        
        $('#date_range').on('cancel.daterangepicker', function(ev, picker) {
            $(this).val('');
        });
        
        // AJAX pagination
        $(document).on('click', '.pagination a', function(e) {
            e.preventDefault();
            var url = $(this).attr('href');
            $.ajax({
                url: url,
                data: $('#filter-form').serialize(),
                success: function(data) {
                    $('#coupons-table-container').html(data);
                }
            });
        });
        
        // AJAX filtering
        $('#filter-form select').change(function() {
            $('#filter-form').submit();
        });
        
        // Confirm delete
        $(document).on('click', '.delete-coupon', function(e) {
            e.preventDefault();
            if (confirm('Are you sure you want to delete this coupon?')) {
                $(this).closest('form').submit();
            }
        });
    });
</script>
@endsection
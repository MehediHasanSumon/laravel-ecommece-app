@extends('layouts.admin')

@section('content')
<div class="container px-6 py-8 mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Permission Management</h2>
        <a href="{{ route('admin.permissions.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition">
            <i class="fas fa-plus mr-2"></i> Add New Permission
        </a>
    </div>
    
    <div class="bg-white rounded-lg shadow-md p-4 mb-6">
        <form id="permission-filter-form" action="{{ route('admin.permissions.index') }}" method="GET" class="flex flex-wrap items-end gap-4">
            <div class="w-full md:w-auto">
                <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                <input type="text" name="search" id="search" value="{{ request('search') }}" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Permission name">
            </div>
            <div class="w-full md:w-auto">
                <label for="group" class="block text-sm font-medium text-gray-700 mb-1">Group</label>
                <select name="group" id="group" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                    <option value="">All Groups</option>
                    @foreach($groups as $group)
                        <option value="{{ $group }}" {{ request('group') == $group ? 'selected' : '' }}>{{ $group }}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-full md:w-auto">
                <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Associated Role</label>
                <select name="role" id="role" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                    <option value="">All Roles</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{ request('role') == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="w-full md:w-auto">
                <label for="date_from" class="block text-sm font-medium text-gray-700 mb-1">Date From</label>
                <input type="date" name="date_from" id="date_from" value="{{ request('date_from') }}" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="w-full md:w-auto">
                <label for="date_to" class="block text-sm font-medium text-gray-700 mb-1">Date To</label>
                <input type="date" name="date_to" id="date_to" value="{{ request('date_to') }}" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
            </div>
            <div class="w-full md:w-auto flex space-x-2">
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition">
                    <i class="fas fa-search mr-2"></i> Filter
                </button>
                <button type="button" id="reset-filter" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 transition">
                    <i class="fas fa-times mr-2"></i> Reset
                </button>
            </div>
            <input type="hidden" name="sort_by" id="sort_by" value="{{ request('sort_by', 'created_at') }}">
            <input type="hidden" name="sort_direction" id="sort_direction" value="{{ request('sort_direction', 'desc') }}">
        </form>
    </div>

    @if (session('success'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
        <p>{{ session('success') }}</p>
    </div>
    @endif

    <div id="permissions-table-container" class="bg-white rounded-lg shadow-md overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <a href="#" class="sort-link flex items-center" data-column="id">
                            ID
                            @if(request('sort_by') === 'id')
                                <i class="fas fa-sort-{{ request('sort_direction') === 'asc' ? 'up' : 'down' }} ml-1"></i>
                            @else
                                <i class="fas fa-sort ml-1 text-gray-400"></i>
                            @endif
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <a href="#" class="sort-link flex items-center" data-column="name">
                            Name
                            @if(request('sort_by') === 'name')
                                <i class="fas fa-sort-{{ request('sort_direction') === 'asc' ? 'up' : 'down' }} ml-1"></i>
                            @else
                                <i class="fas fa-sort ml-1 text-gray-400"></i>
                            @endif
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <a href="#" class="sort-link flex items-center" data-column="group">
                            Group
                            @if(request('sort_by') === 'group')
                                <i class="fas fa-sort-{{ request('sort_direction') === 'asc' ? 'up' : 'down' }} ml-1"></i>
                            @else
                                <i class="fas fa-sort ml-1 text-gray-400"></i>
                            @endif
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Roles</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        <a href="#" class="sort-link flex items-center" data-column="created_at">
                            Created At
                            @if(request('sort_by') === 'created_at' || !request('sort_by'))
                                <i class="fas fa-sort-{{ request('sort_direction', 'desc') === 'asc' ? 'up' : 'down' }} ml-1"></i>
                            @else
                                <i class="fas fa-sort ml-1 text-gray-400"></i>
                            @endif
                        </a>
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @include('admin.permissions.partials.permissions-table')
            </tbody>
        </table>
    </div>
    <div id="pagination-container" class="px-6 py-4 border-t border-gray-200">
        {{ $permissions->links() }}
    </div>
</div>

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Function to load permissions with AJAX
        function loadPermissions(url) {
            $.ajax({
                url: url || '{{ route("admin.permissions.index") }}',
                type: 'GET',
                data: $('#permission-filter-form').serialize(),
                beforeSend: function() {
                    // Show loading indicator
                    $('#permissions-table-container').addClass('opacity-50');
                },
                success: function(response) {
                    // Update the table and pagination
                    $('#permissions-table-container tbody').html(response.permissions);
                    $('#pagination-container').html(response.pagination);
                    $('#permissions-table-container').removeClass('opacity-50');
                    
                    // Reinitialize pagination links for AJAX
                    initPaginationLinks();
                },
                error: function() {
                    alert('An error occurred while loading permissions.');
                    $('#permissions-table-container').removeClass('opacity-50');
                }
            });
        }
        
        // Initialize pagination links for AJAX
        function initPaginationLinks() {
            $('#pagination-container a').click(function(e) {
                e.preventDefault();
                loadPermissions($(this).attr('href'));
            });
        }
        
        // Handle form submission
        $('#permission-filter-form').on('submit', function(e) {
            e.preventDefault();
            loadPermissions();
        });
        
        // Handle sorting
        $('.sort-link').click(function(e) {
            e.preventDefault();
            const column = $(this).data('column');
            const currentSortBy = $('#sort_by').val();
            const currentSortDirection = $('#sort_direction').val();
            
            let newDirection = 'asc';
            if (column === currentSortBy && currentSortDirection === 'asc') {
                newDirection = 'desc';
            }
            
            $('#sort_by').val(column);
            $('#sort_direction').val(newDirection);
            
            loadPermissions();
        });
        
        // Handle reset button
        $('#reset-filter').click(function() {
            $('#permission-filter-form')[0].reset();
            $('#sort_by').val('created_at');
            $('#sort_direction').val('desc');
            loadPermissions();
        });
        
        // Initialize pagination links on page load
        initPaginationLinks();
        
        // Real-time filtering for search input with debounce
        let searchTimer;
        $('#search').on('input', function() {
            clearTimeout(searchTimer);
            searchTimer = setTimeout(function() {
                loadPermissions();
            }, 500);
        });
        
        // Real-time filtering for select inputs
        $('#group, #role').on('change', function() {
            loadPermissions();
        });
        
        // Real-time filtering for date inputs
        $('#date_from, #date_to').on('change', function() {
            loadPermissions();
        });
    });
</script>
@endpush
@endsection
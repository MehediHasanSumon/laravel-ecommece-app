@extends('layouts.admin')

@section('content')
<div class="container px-6 py-8 mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Role Management</h2>
        <a href="{{ route('admin.roles.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition">
            <i class="fas fa-plus mr-2"></i> Add New Role
        </a>
    </div>
    
    <div class="bg-white rounded-lg shadow-md p-4 mb-6">
        <form id="role-filter-form" action="{{ route('admin.roles.index') }}" method="GET" class="flex flex-wrap items-end gap-4">
            <div class="w-full md:w-auto">
                <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                <input type="text" name="search" id="search" value="{{ request('search') }}" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Role name">
            </div>
            <div class="w-full md:w-auto">
                <label for="permission_count" class="block text-sm font-medium text-gray-700 mb-1">Permission Count</label>
                <div class="flex space-x-2">
                    <select name="permission_count_operator" id="permission_count_operator" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                        <option value="=" {{ request('permission_count_operator') == '=' ? 'selected' : '' }}>=</option>
                        <option value=">" {{ request('permission_count_operator') == '>' ? 'selected' : '' }}>></option>
                        <option value="<" {{ request('permission_count_operator') == '<' ? 'selected' : '' }}><</option>
                        <option value=">=" {{ request('permission_count_operator') == '>=' ? 'selected' : '' }}>>=</option>
                        <option value="<=" {{ request('permission_count_operator') == '<=' ? 'selected' : '' }}><=</option>
                    </select>
                    <input type="number" name="permission_count" id="permission_count" value="{{ request('permission_count') }}" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" placeholder="Count">
                </div>
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

    <div id="roles-table-container" class="bg-white rounded-lg shadow-md overflow-hidden">
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
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Permissions</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Users</th>
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
                @include('admin.roles.partials.roles-table')
            </tbody>
        </table>
    </div>
    <div id="pagination-container" class="px-6 py-4 border-t border-gray-200">
        {{ $roles->links() }}
    </div>
</div>

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Function to load roles with AJAX
        function loadRoles(url) {
            $.ajax({
                url: url || '{{ route("admin.roles.index") }}',
                type: 'GET',
                data: $('#role-filter-form').serialize(),
                beforeSend: function() {
                    // Show loading indicator
                    $('#roles-table-container').addClass('opacity-50');
                },
                success: function(response) {
                    // Update the table and pagination
                    $('#roles-table-container tbody').html(response.roles);
                    $('#pagination-container').html(response.pagination);
                    $('#roles-table-container').removeClass('opacity-50');
                    
                    // Reinitialize pagination links for AJAX
                    initPaginationLinks();
                },
                error: function() {
                    alert('An error occurred while loading roles.');
                    $('#roles-table-container').removeClass('opacity-50');
                }
            });
        }
        
        // Initialize pagination links for AJAX
        function initPaginationLinks() {
            $('#pagination-container a').click(function(e) {
                e.preventDefault();
                loadRoles($(this).attr('href'));
            });
        }
        
        // Handle form submission
        $('#role-filter-form').on('submit', function(e) {
            e.preventDefault();
            loadRoles();
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
            
            loadRoles();
        });
        
        // Handle reset button
        $('#reset-filter').click(function() {
            $('#role-filter-form')[0].reset();
            $('#sort_by').val('created_at');
            $('#sort_direction').val('desc');
            loadRoles();
        });
        
        // Initialize pagination links on page load
        initPaginationLinks();
        
        // Real-time filtering for search input with debounce
        let searchTimer;
        $('#search').on('input', function() {
            clearTimeout(searchTimer);
            searchTimer = setTimeout(function() {
                loadRoles();
            }, 500);
        });
        
        // Real-time filtering for select and number inputs
        $('#permission_count_operator, #permission_count').on('change', function() {
            loadRoles();
        });
        
        // Real-time filtering for date inputs
        $('#date_from, #date_to').on('change', function() {
            loadRoles();
        });
    });
</script>
@endpush
@endsection
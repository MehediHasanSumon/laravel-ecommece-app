@extends('layouts.admin')

@section('content')
<div class="container px-6 py-8 mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Create New Role</h2>
        <a href="{{ route('admin.roles.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 transition">
            <i class="fas fa-arrow-left mr-2"></i> Back to Roles
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden p-6">
        <form action="{{ route('admin.roles.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Role Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Permissions</label>
                
                @foreach($permissionGroups as $group => $permissions)
                <div class="mb-4">
                    <h3 class="text-md font-medium text-gray-700 mb-2 border-b pb-1">{{ ucfirst($group) }}</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                        @foreach($permissions as $permission)
                        <div class="flex items-center">
                            <input type="checkbox" name="permissions[]" id="permission_{{ $permission->id }}" value="{{ $permission->id }}" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                            <label for="permission_{{ $permission->id }}" class="ml-2 block text-sm text-gray-900">{{ $permission->name }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
                
                @error('permissions')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition">
                    <i class="fas fa-save mr-2"></i> Create Role
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
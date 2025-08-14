@extends('layouts.admin')

@section('content')
<div class="container px-6 py-8 mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Edit Role: {{ $role->name }}</h2>
        <a href="{{ route('admin.roles.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 transition">
            <i class="fas fa-arrow-left mr-2"></i> Back to Roles
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden p-6">
        <form action="{{ route('admin.roles.update', $role) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Role Name</label>
                <input type="text" name="name" id="name" value="{{ old('name', $role->name) }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" {{ $role->name == 'Super Admin' ? 'readonly' : 'required' }}>
                @if($role->name == 'Super Admin')
                <p class="text-yellow-600 text-xs mt-1">The Super Admin role name cannot be changed.</p>
                @endif
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-2">Permissions</label>
                
                @if($role->name == 'Super Admin')
                <p class="text-yellow-600 text-sm mb-4">The Super Admin role has all permissions by default and cannot be modified.</p>
                @else
                    @foreach($permissionGroups as $group => $permissions)
                    <div class="mb-4">
                        <h3 class="text-md font-medium text-gray-700 mb-2 border-b pb-1">{{ ucfirst($group) }}</h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-2">
                            @foreach($permissions as $permission)
                            <div class="flex items-center">
                                <input type="checkbox" name="permissions[]" id="permission_{{ $permission->id }}" value="{{ $permission->id }}" 
                                    {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}
                                    class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                                <label for="permission_{{ $permission->id }}" class="ml-2 block text-sm text-gray-900">{{ $permission->name }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                @endif
                
                @error('permissions')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition" {{ $role->name == 'Super Admin' ? 'disabled' : '' }}>
                    <i class="fas fa-save mr-2"></i> Update Role
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
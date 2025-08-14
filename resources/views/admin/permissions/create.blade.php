@extends('layouts.admin')

@section('content')
<div class="container px-6 py-8 mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Create New Permission</h2>
        <a href="{{ route('admin.permissions.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600 transition">
            <i class="fas fa-arrow-left mr-2"></i> Back to Permissions
        </a>
    </div>

    <div class="bg-white rounded-lg shadow-md overflow-hidden p-6">
        <form action="{{ route('admin.permissions.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Permission Name</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
                <p class="text-xs text-gray-500 mt-1">Recommended format: verb-resource (e.g., create-users, edit-products)</p>
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="group" class="block text-sm font-medium text-gray-700 mb-2">Permission Group</label>
                <select name="group" id="group" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">Select a group</option>
                    @foreach($groups as $group)
                        <option value="{{ $group }}" {{ old('group') == $group ? 'selected' : '' }}>{{ ucfirst($group) }}</option>
                    @endforeach
                    <option value="new">Create new group</option>
                </select>
                @error('group')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div id="newGroupField" class="mb-4 hidden">
                <label for="new_group" class="block text-sm font-medium text-gray-700 mb-2">New Group Name</label>
                <input type="text" name="new_group" id="new_group" value="{{ old('new_group') }}" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                @error('new_group')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition">
                    <i class="fas fa-save mr-2"></i> Create Permission
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const groupSelect = document.getElementById('group');
        const newGroupField = document.getElementById('newGroupField');
        
        groupSelect.addEventListener('change', function() {
            if (this.value === 'new') {
                newGroupField.classList.remove('hidden');
            } else {
                newGroupField.classList.add('hidden');
            }
        });
        
        // Check on page load in case of form validation error
        if (groupSelect.value === 'new') {
            newGroupField.classList.remove('hidden');
        }
    });
</script>
@endpush
@endsection
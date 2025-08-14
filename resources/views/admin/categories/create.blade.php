@extends('layouts.admin')

@section('title', 'Create Category')

@section('content')
<!-- Page Header -->
<div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
    <div>
        <h2 class="text-2xl font-bold">Create Category</h2>
        <p class="mt-1 text-sm text-gray-500">Add a new product category</p>
    </div>
    <div class="mt-4 md:mt-0">
        <a href="{{ route('admin.categories.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Back to Categories
        </a>
    </div>
</div>

<!-- Create Category Form -->
<div class="bg-white rounded-lg shadow-sm overflow-hidden mb-6">
    <form action="{{ route('admin.categories.store') }}" method="POST" class="p-6">
        @csrf
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name <span class="text-red-500">*</span></label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('name') border-red-500 @enderror">
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Slug -->
            <div>
                <label for="slug" class="block text-sm font-medium text-gray-700 mb-1">Slug</label>
                <input type="text" name="slug" id="slug" value="{{ old('slug') }}" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('slug') border-red-500 @enderror">
                <p class="text-xs text-gray-500 mt-1">Leave empty to auto-generate from name</p>
                @error('slug')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Parent Category -->
            <div>
                <label for="parent_id" class="block text-sm font-medium text-gray-700 mb-1">Parent Category</label>
                <select name="parent_id" id="parent_id" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('parent_id') border-red-500 @enderror">
                    <option value="">None (Top Level Category)</option>
                    @foreach($parentCategories as $parentCategory)
                        <option value="{{ $parentCategory->id }}" {{ old('parent_id') == $parentCategory->id ? 'selected' : '' }}>
                            {{ $parentCategory->name }}
                        </option>
                    @endforeach
                </select>
                @error('parent_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Icon -->
            <div>
                <label for="icon" class="block text-sm font-medium text-gray-700 mb-1">Icon Class</label>
                <input type="text" name="icon" id="icon" value="{{ old('icon') }}" placeholder="fas fa-tag" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('icon') border-red-500 @enderror">
                <p class="text-xs text-gray-500 mt-1">FontAwesome class (e.g. fas fa-tag)</p>
                @error('icon')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Status -->
            <div class="flex items-center space-x-6">
                <div>
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <span class="ml-2 text-sm text-gray-700">Active</span>
                    </label>
                </div>
                
                <div>
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        <span class="ml-2 text-sm text-gray-700">Featured</span>
                    </label>
                </div>
            </div>
        </div>
        
        <!-- Description -->
        <div class="mt-6">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
            <textarea name="description" id="description" rows="4" class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
            @error('description')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>
        
        <!-- Submit Button -->
        <div class="mt-6 flex justify-end">
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-lg flex items-center">
                <i class="fas fa-save mr-2"></i> Create Category
            </button>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const nameInput = document.getElementById('name');
        const slugInput = document.getElementById('slug');
        
        // Auto-generate slug from name
        nameInput.addEventListener('input', function() {
            if (!slugInput.value) {
                slugInput.value = nameInput.value
                    .toLowerCase()
                    .replace(/\s+/g, '-')
                    .replace(/[^\w\-]+/g, '')
                    .replace(/\-\-+/g, '-')
                    .replace(/^-+/, '')
                    .replace(/-+$/, '');
            }
        });
    });
</script>
@endsection
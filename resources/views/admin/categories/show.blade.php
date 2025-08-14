@extends('layouts.admin')

@section('title', 'Category Details')

@section('content')
<!-- Page Header -->
<div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
    <div>
        <h2 class="text-2xl font-bold">Category Details</h2>
        <p class="mt-1 text-sm text-gray-500">Viewing details for: {{ $category->name }}</p>
    </div>
    <div class="mt-4 md:mt-0 flex space-x-2">
        <a href="{{ route('admin.categories.edit', $category) }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-edit mr-2"></i> Edit
        </a>
        <a href="{{ route('admin.categories.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-arrow-left mr-2"></i> Back
        </a>
    </div>
</div>

<!-- Category Details -->
<div class="bg-white rounded-lg shadow-sm overflow-hidden mb-6">
    <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Basic Info -->
            <div>
                <h3 class="text-lg font-medium text-gray-900 mb-4">Basic Information</h3>
                
                <div class="space-y-3">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Name</p>
                        <p class="mt-1">{{ $category->name }}</p>
                    </div>
                    
                    <div>
                        <p class="text-sm font-medium text-gray-500">Slug</p>
                        <p class="mt-1">{{ $category->slug }}</p>
                    </div>
                    
                    <div>
                        <p class="text-sm font-medium text-gray-500">Parent Category</p>
                        <p class="mt-1">{{ $category->parent ? $category->parent->name : 'None (Top Level)' }}</p>
                    </div>
                    
                    <div>
                        <p class="text-sm font-medium text-gray-500">Icon</p>
                        <p class="mt-1">
                            @if($category->icon)
                                <i class="{{ $category->icon }} mr-2"></i> {{ $category->icon }}
                            @else
                                None
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Status Info -->
            <div>
                <h3 class="text-lg font-medium text-gray-900 mb-4">Status & Metrics</h3>
                
                <div class="space-y-3">
                    <div>
                        <p class="text-sm font-medium text-gray-500">Status</p>
                        <p class="mt-1">
                            @if($category->is_active)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Active
                                </span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                    Inactive
                                </span>
                            @endif
                        </p>
                    </div>
                    
                    <div>
                        <p class="text-sm font-medium text-gray-500">Featured</p>
                        <p class="mt-1">
                            @if($category->is_featured)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">
                                    Featured
                                </span>
                            @else
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                    Not Featured
                                </span>
                            @endif
                        </p>
                    </div>
                    
                    <div>
                        <p class="text-sm font-medium text-gray-500">Products Count</p>
                        <p class="mt-1">{{ $category->product_count }}</p>
                    </div>
                    
                    <div>
                        <p class="text-sm font-medium text-gray-500">Created At</p>
                        <p class="mt-1">{{ $category->created_at->format('F d, Y h:i A') }}</p>
                    </div>
                    
                    <div>
                        <p class="text-sm font-medium text-gray-500">Last Updated</p>
                        <p class="mt-1">{{ $category->updated_at->format('F d, Y h:i A') }}</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Description -->
        <div class="mt-6">
            <h3 class="text-lg font-medium text-gray-900 mb-2">Description</h3>
            <div class="bg-gray-50 p-4 rounded-lg">
                @if($category->description)
                    <p>{{ $category->description }}</p>
                @else
                    <p class="text-gray-500 italic">No description provided</p>
                @endif
            </div>
        </div>
        
        <!-- Subcategories -->
        @if($category->children->count() > 0)
        <div class="mt-6">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Subcategories</h3>
            
            <div class="bg-gray-50 rounded-lg overflow-hidden">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Products</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($category->children as $child)
                        <tr>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $child->name }}</div>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                <div class="text-sm text-gray-500">{{ $child->product_count }}</div>
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap">
                                @if($child->is_active)
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        Active
                                    </span>
                                @else
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                        Inactive
                                    </span>
                                @endif
                            </td>
                            <td class="px-4 py-3 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('admin.categories.show', $child) }}" class="text-blue-600 hover:text-blue-900 mr-3">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.categories.edit', $child) }}" class="text-indigo-600 hover:text-indigo-900">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
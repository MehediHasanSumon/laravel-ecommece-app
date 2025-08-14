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
        <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-plus mr-2"></i> Add New Category
        </button>
    </div>
</div>

<!-- Filters & Search -->
<div class="bg-white rounded-lg shadow-sm p-4 mb-6">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
        <!-- Search -->
        <div class="relative w-full md:w-64">
            <input type="text" placeholder="Search categories..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
        </div>
        
        <!-- Filters -->
        <div class="flex flex-wrap items-center gap-3">
            <select class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                <option value="">All Categories</option>
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
                <option value="featured">Featured</option>
            </select>
            
            <select class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                <option value="">Sort By</option>
                <option value="name_asc">Name (A-Z)</option>
                <option value="name_desc">Name (Z-A)</option>
                <option value="products_desc">Products (High to Low)</option>
                <option value="products_asc">Products (Low to High)</option>
                <option value="date_desc">Date Created (Newest)</option>
                <option value="date_asc">Date Created (Oldest)</option>
            </select>
        </div>
    </div>
</div>

<!-- Category Stats -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
    <!-- Total Categories -->
    <div class="admin-card bg-white rounded-lg shadow-sm p-4">
        <div class="flex items-center justify-between mb-3">
            <h3 class="text-sm font-medium text-gray-500">Total Categories</h3>
        </div>
        <div class="flex items-end justify-between">
            <p class="text-2xl font-bold">24</p>
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
            <p class="text-2xl font-bold">21</p>
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
            <p class="text-2xl font-bold">142</p>
            <div class="p-2 bg-blue-100 rounded-md">
                <i class="fas fa-box text-blue-500"></i>
            </div>
        </div>
    </div>
</div>

<!-- Categories Table -->
<div class="bg-white rounded-lg shadow-sm overflow-hidden mb-6">
    <div class="overflow-x-auto">
        <table class="admin-table w-full">
            <thead class="bg-gray-50 text-xs font-medium text-gray-500 uppercase tracking-wider">
                <tr>
                    <th class="px-4 py-3 text-left">
                        <div class="flex items-center">
                            <input type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        </div>
                    </th>
                    <th class="px-4 py-3 text-left">Category</th>
                    <th class="px-4 py-3 text-left">Slug</th>
                    <th class="px-4 py-3 text-left">Products</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-left">Created</th>
                    <th class="px-4 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <!-- Category 1 -->
                <tr class="text-sm text-gray-700 hover:bg-gray-50">
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <input type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        </div>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <div class="w-8 h-8 rounded-md bg-indigo-100 flex items-center justify-center mr-3">
                                <i class="fas fa-tshirt text-indigo-500"></i>
                            </div>
                            <div>
                                <p class="font-medium">Clothing</p>
                                <p class="text-xs text-gray-500">Parent Category</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3">clothing</td>
                    <td class="px-4 py-3">42</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Active</span>
                    </td>
                    <td class="px-4 py-3">Jan 15, 2023</td>
                    <td class="px-4 py-3">
                        <div class="flex items-center space-x-2">
                            <button class="text-gray-500 hover:text-indigo-600 transition">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="text-gray-500 hover:text-indigo-600 transition">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-gray-500 hover:text-gray-700 transition">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                
                <!-- Category 2 -->
                <tr class="text-sm text-gray-700 hover:bg-gray-50">
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <input type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        </div>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <div class="w-8 h-8 rounded-md bg-blue-100 flex items-center justify-center mr-3">
                                <i class="fas fa-laptop text-blue-500"></i>
                            </div>
                            <div>
                                <p class="font-medium">Electronics</p>
                                <p class="text-xs text-gray-500">Parent Category</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3">electronics</td>
                    <td class="px-4 py-3">38</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Active</span>
                    </td>
                    <td class="px-4 py-3">Jan 12, 2023</td>
                    <td class="px-4 py-3">
                        <div class="flex items-center space-x-2">
                            <button class="text-gray-500 hover:text-indigo-600 transition">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="text-gray-500 hover:text-indigo-600 transition">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-gray-500 hover:text-gray-700 transition">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                
                <!-- Category 3 -->
                <tr class="text-sm text-gray-700 hover:bg-gray-50">
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <input type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        </div>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <div class="w-8 h-8 rounded-md bg-green-100 flex items-center justify-center mr-3">
                                <i class="fas fa-utensils text-green-500"></i>
                            </div>
                            <div>
                                <p class="font-medium">Kitchen</p>
                                <p class="text-xs text-gray-500">Parent Category</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3">kitchen</td>
                    <td class="px-4 py-3">27</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Active</span>
                    </td>
                    <td class="px-4 py-3">Jan 18, 2023</td>
                    <td class="px-4 py-3">
                        <div class="flex items-center space-x-2">
                            <button class="text-gray-500 hover:text-indigo-600 transition">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="text-gray-500 hover:text-indigo-600 transition">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-gray-500 hover:text-gray-700 transition">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                
                <!-- Category 4 -->
                <tr class="text-sm text-gray-700 hover:bg-gray-50">
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <input type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        </div>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <div class="w-8 h-8 rounded-md bg-indigo-100 flex items-center justify-center mr-3">
                                <i class="fas fa-socks text-indigo-500"></i>
                            </div>
                            <div>
                                <p class="font-medium">Men's Clothing</p>
                                <p class="text-xs text-gray-500">Child of Clothing</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3">mens-clothing</td>
                    <td class="px-4 py-3">18</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Active</span>
                    </td>
                    <td class="px-4 py-3">Jan 20, 2023</td>
                    <td class="px-4 py-3">
                        <div class="flex items-center space-x-2">
                            <button class="text-gray-500 hover:text-indigo-600 transition">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="text-gray-500 hover:text-indigo-600 transition">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-gray-500 hover:text-gray-700 transition">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                
                <!-- Category 5 -->
                <tr class="text-sm text-gray-700 hover:bg-gray-50">
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <input type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        </div>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <div class="w-8 h-8 rounded-md bg-indigo-100 flex items-center justify-center mr-3">
                                <i class="fas fa-female text-indigo-500"></i>
                            </div>
                            <div>
                                <p class="font-medium">Women's Clothing</p>
                                <p class="text-xs text-gray-500">Child of Clothing</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3">womens-clothing</td>
                    <td class="px-4 py-3">24</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Active</span>
                    </td>
                    <td class="px-4 py-3">Jan 22, 2023</td>
                    <td class="px-4 py-3">
                        <div class="flex items-center space-x-2">
                            <button class="text-gray-500 hover:text-indigo-600 transition">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="text-gray-500 hover:text-indigo-600 transition">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-gray-500 hover:text-gray-700 transition">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <!-- Pagination -->
    <div class="px-4 py-3 border-t">
        <div class="flex items-center justify-between">
            <div class="text-sm text-gray-500">
                Showing <span class="font-medium">1</span> to <span class="font-medium">5</span> of <span class="font-medium">24</span> categories
            </div>
            <div class="flex space-x-1">
                <button class="px-3 py-1 rounded-md bg-white border border-gray-300 text-gray-500 hover:bg-gray-50 disabled:opacity-50" disabled>
                    <i class="fas fa-chevron-left text-xs"></i>
                </button>
                <button class="px-3 py-1 rounded-md bg-indigo-600 text-white hover:bg-indigo-700">1</button>
                <button class="px-3 py-1 rounded-md bg-white border border-gray-300 text-gray-500 hover:bg-gray-50">2</button>
                <button class="px-3 py-1 rounded-md bg-white border border-gray-300 text-gray-500 hover:bg-gray-50">3</button>
                <button class="px-3 py-1 rounded-md bg-white border border-gray-300 text-gray-500 hover:bg-gray-50">
                    <i class="fas fa-chevron-right text-xs"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Category Tree -->
<div class="bg-white rounded-lg shadow-sm p-4 mb-6">
    <h3 class="text-lg font-medium mb-4">Category Hierarchy</h3>
    <div class="space-y-3">
        <!-- Parent Category 1 -->
        <div>
            <div class="flex items-center">
                <i class="fas fa-folder text-indigo-500 mr-2"></i>
                <span class="font-medium">Clothing</span>
                <span class="ml-2 text-xs text-gray-500">(42 products)</span>
                <div class="ml-auto flex items-center space-x-2">
                    <button class="text-gray-500 hover:text-indigo-600 transition">
                        <i class="fas fa-plus-circle"></i>
                    </button>
                    <button class="text-gray-500 hover:text-indigo-600 transition">
                        <i class="fas fa-edit"></i>
                    </button>
                </div>
            </div>
            <!-- Children -->
            <div class="ml-6 mt-2 space-y-2">
                <div class="flex items-center">
                    <i class="fas fa-folder-open text-indigo-400 mr-2"></i>
                    <span>Men's Clothing</span>
                    <span class="ml-2 text-xs text-gray-500">(18 products)</span>
                    <div class="ml-auto flex items-center space-x-2">
                        <button class="text-gray-500 hover:text-indigo-600 transition">
                            <i class="fas fa-plus-circle"></i>
                        </button>
                        <button class="text-gray-500 hover:text-indigo-600 transition">
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>
                </div>
                <div class="flex items-center">
                    <i class="fas fa-folder-open text-indigo-400 mr-2"></i>
                    <span>Women's Clothing</span>
                    <span class="ml-2 text-xs text-gray-500">(24 products)</span>
                    <div class="ml-auto flex items-center space-x-2">
                        <button class="text-gray-500 hover:text-indigo-600 transition">
                            <i class="fas fa-plus-circle"></i>
                        </button>
                        <button class="text-gray-500 hover:text-indigo-600 transition">
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Parent Category 2 -->
        <div>
            <div class="flex items-center">
                <i class="fas fa-folder text-blue-500 mr-2"></i>
                <span class="font-medium">Electronics</span>
                <span class="ml-2 text-xs text-gray-500">(38 products)</span>
                <div class="ml-auto flex items-center space-x-2">
                    <button class="text-gray-500 hover:text-indigo-600 transition">
                        <i class="fas fa-plus-circle"></i>
                    </button>
                    <button class="text-gray-500 hover:text-indigo-600 transition">
                        <i class="fas fa-edit"></i>
                    </button>
                </div>
            </div>
            <!-- Children -->
            <div class="ml-6 mt-2 space-y-2">
                <div class="flex items-center">
                    <i class="fas fa-folder-open text-blue-400 mr-2"></i>
                    <span>Smartphones</span>
                    <span class="ml-2 text-xs text-gray-500">(12 products)</span>
                    <div class="ml-auto flex items-center space-x-2">
                        <button class="text-gray-500 hover:text-indigo-600 transition">
                            <i class="fas fa-plus-circle"></i>
                        </button>
                        <button class="text-gray-500 hover:text-indigo-600 transition">
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>
                </div>
                <div class="flex items-center">
                    <i class="fas fa-folder-open text-blue-400 mr-2"></i>
                    <span>Laptops</span>
                    <span class="ml-2 text-xs text-gray-500">(15 products)</span>
                    <div class="ml-auto flex items-center space-x-2">
                        <button class="text-gray-500 hover:text-indigo-600 transition">
                            <i class="fas fa-plus-circle"></i>
                        </button>
                        <button class="text-gray-500 hover:text-indigo-600 transition">
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>
                </div>
                <div class="flex items-center">
                    <i class="fas fa-folder-open text-blue-400 mr-2"></i>
                    <span>Accessories</span>
                    <span class="ml-2 text-xs text-gray-500">(11 products)</span>
                    <div class="ml-auto flex items-center space-x-2">
                        <button class="text-gray-500 hover:text-indigo-600 transition">
                            <i class="fas fa-plus-circle"></i>
                        </button>
                        <button class="text-gray-500 hover:text-indigo-600 transition">
                            <i class="fas fa-edit"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Parent Category 3 -->
        <div>
            <div class="flex items-center">
                <i class="fas fa-folder text-green-500 mr-2"></i>
                <span class="font-medium">Kitchen</span>
                <span class="ml-2 text-xs text-gray-500">(27 products)</span>
                <div class="ml-auto flex items-center space-x-2">
                    <button class="text-gray-500 hover:text-indigo-600 transition">
                        <i class="fas fa-plus-circle"></i>
                    </button>
                    <button class="text-gray-500 hover:text-indigo-600 transition">
                        <i class="fas fa-edit"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
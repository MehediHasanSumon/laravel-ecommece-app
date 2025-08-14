@extends('layouts.admin')

@section('title', 'Products')

@section('content')
<!-- Page Header -->
<div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
    <div>
        <h2 class="text-2xl font-bold">Products</h2>
        <p class="mt-1 text-sm text-gray-500">Manage your product inventory</p>
    </div>
    <div class="mt-4 md:mt-0">
        <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-plus mr-2"></i> Add New Product
        </button>
    </div>
</div>

<!-- Filters & Search -->
<div class="bg-white rounded-lg shadow-sm p-4 mb-6">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
        <!-- Search -->
        <div class="relative w-full md:w-64">
            <input type="text" placeholder="Search products..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
        </div>
        
        <!-- Filters -->
        <div class="flex flex-wrap items-center gap-3">
            <select class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                <option value="">All Categories</option>
                <option value="electronics">Electronics</option>
                <option value="clothing">Clothing</option>
                <option value="home">Home & Kitchen</option>
                <option value="books">Books</option>
                <option value="toys">Toys & Games</option>
            </select>
            
            <select class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                <option value="">All Status</option>
                <option value="in_stock">In Stock</option>
                <option value="low_stock">Low Stock</option>
                <option value="out_of_stock">Out of Stock</option>
            </select>
            
            <select class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                <option value="">Sort By</option>
                <option value="name_asc">Name (A-Z)</option>
                <option value="name_desc">Name (Z-A)</option>
                <option value="price_asc">Price (Low to High)</option>
                <option value="price_desc">Price (High to Low)</option>
                <option value="stock_asc">Stock (Low to High)</option>
                <option value="stock_desc">Stock (High to Low)</option>
            </select>
            
            <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-3 py-2 rounded-lg flex items-center">
                <i class="fas fa-filter mr-2"></i> More Filters
            </button>
        </div>
    </div>
</div>

<!-- Products Table -->
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
                    <th class="px-4 py-3 text-left">Product</th>
                    <th class="px-4 py-3 text-left">Category</th>
                    <th class="px-4 py-3 text-left">Price</th>
                    <th class="px-4 py-3 text-left">Stock</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <!-- Product 1 -->
                <tr class="text-sm text-gray-700 hover:bg-gray-50">
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <input type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        </div>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-gray-200 rounded-md mr-3 flex-shrink-0"></div>
                            <div>
                                <p class="font-medium">Wireless Earbuds</p>
                                <p class="text-xs text-gray-500">SKU: PRD-001</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3">Electronics</td>
                    <td class="px-4 py-3">$59.99</td>
                    <td class="px-4 py-3">124</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">In Stock</span>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center space-x-2">
                            <button class="text-gray-500 hover:text-indigo-600 transition">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-gray-500 hover:text-red-600 transition">
                                <i class="fas fa-trash"></i>
                            </button>
                            <button class="text-gray-500 hover:text-gray-700 transition">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                
                <!-- Product 2 -->
                <tr class="text-sm text-gray-700 hover:bg-gray-50">
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <input type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        </div>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-gray-200 rounded-md mr-3 flex-shrink-0"></div>
                            <div>
                                <p class="font-medium">Smart Watch</p>
                                <p class="text-xs text-gray-500">SKU: PRD-002</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3">Electronics</td>
                    <td class="px-4 py-3">$129.99</td>
                    <td class="px-4 py-3">98</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">In Stock</span>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center space-x-2">
                            <button class="text-gray-500 hover:text-indigo-600 transition">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-gray-500 hover:text-red-600 transition">
                                <i class="fas fa-trash"></i>
                            </button>
                            <button class="text-gray-500 hover:text-gray-700 transition">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                
                <!-- Product 3 -->
                <tr class="text-sm text-gray-700 hover:bg-gray-50">
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <input type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        </div>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-gray-200 rounded-md mr-3 flex-shrink-0"></div>
                            <div>
                                <p class="font-medium">Yoga Mat</p>
                                <p class="text-xs text-gray-500">SKU: PRD-003</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3">Fitness</td>
                    <td class="px-4 py-3">$24.99</td>
                    <td class="px-4 py-3">87</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">In Stock</span>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center space-x-2">
                            <button class="text-gray-500 hover:text-indigo-600 transition">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-gray-500 hover:text-red-600 transition">
                                <i class="fas fa-trash"></i>
                            </button>
                            <button class="text-gray-500 hover:text-gray-700 transition">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                
                <!-- Product 4 -->
                <tr class="text-sm text-gray-700 hover:bg-gray-50">
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <input type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        </div>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-gray-200 rounded-md mr-3 flex-shrink-0"></div>
                            <div>
                                <p class="font-medium">Coffee Maker</p>
                                <p class="text-xs text-gray-500">SKU: PRD-004</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3">Home</td>
                    <td class="px-4 py-3">$89.99</td>
                    <td class="px-4 py-3">76</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">In Stock</span>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center space-x-2">
                            <button class="text-gray-500 hover:text-indigo-600 transition">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-gray-500 hover:text-red-600 transition">
                                <i class="fas fa-trash"></i>
                            </button>
                            <button class="text-gray-500 hover:text-gray-700 transition">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                
                <!-- Product 5 -->
                <tr class="text-sm text-gray-700 hover:bg-gray-50">
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <input type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        </div>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-gray-200 rounded-md mr-3 flex-shrink-0"></div>
                            <div>
                                <p class="font-medium">Desk Lamp</p>
                                <p class="text-xs text-gray-500">SKU: PRD-005</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3">Home</td>
                    <td class="px-4 py-3">$34.99</td>
                    <td class="px-4 py-3">12</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-800">Low Stock</span>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center space-x-2">
                            <button class="text-gray-500 hover:text-indigo-600 transition">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-gray-500 hover:text-red-600 transition">
                                <i class="fas fa-trash"></i>
                            </button>
                            <button class="text-gray-500 hover:text-gray-700 transition">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                
                <!-- Product 6 -->
                <tr class="text-sm text-gray-700 hover:bg-gray-50">
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <input type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        </div>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-gray-200 rounded-md mr-3 flex-shrink-0"></div>
                            <div>
                                <p class="font-medium">Bluetooth Speaker</p>
                                <p class="text-xs text-gray-500">SKU: PRD-006</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3">Electronics</td>
                    <td class="px-4 py-3">$49.99</td>
                    <td class="px-4 py-3">0</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-800">Out of Stock</span>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center space-x-2">
                            <button class="text-gray-500 hover:text-indigo-600 transition">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-gray-500 hover:text-red-600 transition">
                                <i class="fas fa-trash"></i>
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
                Showing <span class="font-medium">1</span> to <span class="font-medium">6</span> of <span class="font-medium">24</span> products
            </div>
            <div class="flex space-x-1">
                <button class="px-3 py-1 rounded-md bg-white border border-gray-300 text-gray-500 hover:bg-gray-50 disabled:opacity-50" disabled>
                    <i class="fas fa-chevron-left text-xs"></i>
                </button>
                <button class="px-3 py-1 rounded-md bg-indigo-600 text-white hover:bg-indigo-700">1</button>
                <button class="px-3 py-1 rounded-md bg-white border border-gray-300 text-gray-500 hover:bg-gray-50">2</button>
                <button class="px-3 py-1 rounded-md bg-white border border-gray-300 text-gray-500 hover:bg-gray-50">3</button>
                <button class="px-3 py-1 rounded-md bg-white border border-gray-300 text-gray-500 hover:bg-gray-50">4</button>
                <button class="px-3 py-1 rounded-md bg-white border border-gray-300 text-gray-500 hover:bg-gray-50">
                    <i class="fas fa-chevron-right text-xs"></i>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Bulk Actions -->
<div class="bg-white rounded-lg shadow-sm p-4 mb-6">
    <div class="flex flex-wrap items-center gap-3">
        <span class="text-sm font-medium">Bulk Actions:</span>
        <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-3 py-2 rounded-lg flex items-center text-sm">
            <i class="fas fa-tag mr-2"></i> Update Prices
        </button>
        <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-3 py-2 rounded-lg flex items-center text-sm">
            <i class="fas fa-box mr-2"></i> Update Stock
        </button>
        <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-3 py-2 rounded-lg flex items-center text-sm">
            <i class="fas fa-folder mr-2"></i> Move to Category
        </button>
        <button class="bg-red-100 hover:bg-red-200 text-red-700 px-3 py-2 rounded-lg flex items-center text-sm">
            <i class="fas fa-trash mr-2"></i> Delete Selected
        </button>
    </div>
</div>
@endsection
@extends('layouts.admin')

@section('title', 'Discounts')

@section('content')
<!-- Page Header -->
<div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
    <div>
        <h2 class="text-2xl font-bold">Discounts</h2>
        <p class="mt-1 text-sm text-gray-500">Manage your store discounts and promotions</p>
    </div>
    <div class="mt-4 md:mt-0">
        <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-plus mr-2"></i> Create Discount
        </button>
    </div>
</div>

<!-- Filters & Search -->
<div class="bg-white rounded-lg shadow-sm p-4 mb-6">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
        <!-- Search -->
        <div class="relative w-full md:w-64">
            <input type="text" placeholder="Search discounts..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
        </div>
        
        <!-- Filters -->
        <div class="flex flex-wrap items-center gap-3">
            <select class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                <option value="">All Discounts</option>
                <option value="active">Active</option>
                <option value="scheduled">Scheduled</option>
                <option value="expired">Expired</option>
            </select>
            
            <select class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                <option value="">All Types</option>
                <option value="percentage">Percentage</option>
                <option value="fixed">Fixed Amount</option>
                <option value="free_shipping">Free Shipping</option>
                <option value="bogo">Buy One Get One</option>
            </select>
            
            <select class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                <option value="">Sort By</option>
                <option value="name_asc">Name (A-Z)</option>
                <option value="name_desc">Name (Z-A)</option>
                <option value="date_desc">Date Created (Newest)</option>
                <option value="date_asc">Date Created (Oldest)</option>
                <option value="value_desc">Value (High to Low)</option>
                <option value="value_asc">Value (Low to High)</option>
            </select>
        </div>
    </div>
</div>

<!-- Discount Stats -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    <!-- Active Discounts -->
    <div class="admin-card bg-white rounded-lg shadow-sm p-4">
        <div class="flex items-center justify-between mb-3">
            <h3 class="text-sm font-medium text-gray-500">Active Discounts</h3>
        </div>
        <div class="flex items-end justify-between">
            <p class="text-2xl font-bold">8</p>
            <div class="p-2 bg-green-100 rounded-md">
                <i class="fas fa-tag text-green-500"></i>
            </div>
        </div>
    </div>
    
    <!-- Scheduled Discounts -->
    <div class="admin-card bg-white rounded-lg shadow-sm p-4">
        <div class="flex items-center justify-between mb-3">
            <h3 class="text-sm font-medium text-gray-500">Scheduled</h3>
        </div>
        <div class="flex items-end justify-between">
            <p class="text-2xl font-bold">3</p>
            <div class="p-2 bg-blue-100 rounded-md">
                <i class="fas fa-calendar-alt text-blue-500"></i>
            </div>
        </div>
    </div>
    
    <!-- Expired Discounts -->
    <div class="admin-card bg-white rounded-lg shadow-sm p-4">
        <div class="flex items-center justify-between mb-3">
            <h3 class="text-sm font-medium text-gray-500">Expired</h3>
        </div>
        <div class="flex items-end justify-between">
            <p class="text-2xl font-bold">12</p>
            <div class="p-2 bg-gray-100 rounded-md">
                <i class="fas fa-calendar-times text-gray-500"></i>
            </div>
        </div>
    </div>
    
    <!-- Total Savings -->
    <div class="admin-card bg-white rounded-lg shadow-sm p-4">
        <div class="flex items-center justify-between mb-3">
            <h3 class="text-sm font-medium text-gray-500">Total Savings</h3>
        </div>
        <div class="flex items-end justify-between">
            <p class="text-2xl font-bold">$4,285.75</p>
            <div class="p-2 bg-yellow-100 rounded-md">
                <i class="fas fa-dollar-sign text-yellow-500"></i>
            </div>
        </div>
    </div>
</div>

<!-- Discounts Table -->
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
                    <th class="px-4 py-3 text-left">Discount</th>
                    <th class="px-4 py-3 text-left">Code</th>
                    <th class="px-4 py-3 text-left">Type</th>
                    <th class="px-4 py-3 text-left">Value</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-left">Usage / Limit</th>
                    <th class="px-4 py-3 text-left">Dates</th>
                    <th class="px-4 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <!-- Discount 1 -->
                <tr class="text-sm text-gray-700 hover:bg-gray-50">
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <input type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        </div>
                    </td>
                    <td class="px-4 py-3">
                        <div>
                            <p class="font-medium">Summer Sale</p>
                            <p class="text-xs text-gray-500">All Products</p>
                        </div>
                    </td>
                    <td class="px-4 py-3">SUMMER20</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 text-xs rounded-full bg-purple-100 text-purple-800">Percentage</span>
                    </td>
                    <td class="px-4 py-3 font-medium">20%</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Active</span>
                    </td>
                    <td class="px-4 py-3">124 / 500</td>
                    <td class="px-4 py-3">
                        <div class="text-xs">
                            <p>Start: Jun 1, 2023</p>
                            <p>End: Aug 31, 2023</p>
                        </div>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center space-x-2">
                            <button class="text-gray-500 hover:text-indigo-600 transition">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-gray-500 hover:text-gray-700 transition">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                
                <!-- Discount 2 -->
                <tr class="text-sm text-gray-700 hover:bg-gray-50">
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <input type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        </div>
                    </td>
                    <td class="px-4 py-3">
                        <div>
                            <p class="font-medium">New Customer</p>
                            <p class="text-xs text-gray-500">First Order Only</p>
                        </div>
                    </td>
                    <td class="px-4 py-3">WELCOME15</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 text-xs rounded-full bg-purple-100 text-purple-800">Percentage</span>
                    </td>
                    <td class="px-4 py-3 font-medium">15%</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Active</span>
                    </td>
                    <td class="px-4 py-3">87 / Unlimited</td>
                    <td class="px-4 py-3">
                        <div class="text-xs">
                            <p>Start: Jan 1, 2023</p>
                            <p>End: Dec 31, 2023</p>
                        </div>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center space-x-2">
                            <button class="text-gray-500 hover:text-indigo-600 transition">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-gray-500 hover:text-gray-700 transition">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                
                <!-- Discount 3 -->
                <tr class="text-sm text-gray-700 hover:bg-gray-50">
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <input type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        </div>
                    </td>
                    <td class="px-4 py-3">
                        <div>
                            <p class="font-medium">Free Shipping</p>
                            <p class="text-xs text-gray-500">Orders over $50</p>
                        </div>
                    </td>
                    <td class="px-4 py-3">FREESHIP</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-800">Free Shipping</span>
                    </td>
                    <td class="px-4 py-3 font-medium">100%</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Active</span>
                    </td>
                    <td class="px-4 py-3">215 / Unlimited</td>
                    <td class="px-4 py-3">
                        <div class="text-xs">
                            <p>Start: Mar 15, 2023</p>
                            <p>End: No Expiry</p>
                        </div>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center space-x-2">
                            <button class="text-gray-500 hover:text-indigo-600 transition">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-gray-500 hover:text-gray-700 transition">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                
                <!-- Discount 4 -->
                <tr class="text-sm text-gray-700 hover:bg-gray-50">
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <input type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        </div>
                    </td>
                    <td class="px-4 py-3">
                        <div>
                            <p class="font-medium">Black Friday</p>
                            <p class="text-xs text-gray-500">Electronics Only</p>
                        </div>
                    </td>
                    <td class="px-4 py-3">BF2023</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 text-xs rounded-full bg-purple-100 text-purple-800">Percentage</span>
                    </td>
                    <td class="px-4 py-3 font-medium">30%</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-800">Scheduled</span>
                    </td>
                    <td class="px-4 py-3">0 / 1000</td>
                    <td class="px-4 py-3">
                        <div class="text-xs">
                            <p>Start: Nov 24, 2023</p>
                            <p>End: Nov 27, 2023</p>
                        </div>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center space-x-2">
                            <button class="text-gray-500 hover:text-indigo-600 transition">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="text-gray-500 hover:text-gray-700 transition">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                
                <!-- Discount 5 -->
                <tr class="text-sm text-gray-700 hover:bg-gray-50">
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <input type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        </div>
                    </td>
                    <td class="px-4 py-3">
                        <div>
                            <p class="font-medium">Spring Sale</p>
                            <p class="text-xs text-gray-500">All Products</p>
                        </div>
                    </td>
                    <td class="px-4 py-3">SPRING15</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 text-xs rounded-full bg-purple-100 text-purple-800">Percentage</span>
                    </td>
                    <td class="px-4 py-3 font-medium">15%</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 text-xs rounded-full bg-gray-100 text-gray-800">Expired</span>
                    </td>
                    <td class="px-4 py-3">342 / 500</td>
                    <td class="px-4 py-3">
                        <div class="text-xs">
                            <p>Start: Mar 1, 2023</p>
                            <p>End: May 31, 2023</p>
                        </div>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center space-x-2">
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
                Showing <span class="font-medium">1</span> to <span class="font-medium">5</span> of <span class="font-medium">23</span> discounts
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

<!-- Bulk Actions -->
<div class="bg-white rounded-lg shadow-sm p-4 mb-6">
    <div class="flex flex-wrap items-center gap-3">
        <span class="text-sm font-medium">Bulk Actions:</span>
        <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-3 py-2 rounded-lg flex items-center text-sm">
            <i class="fas fa-check-circle mr-2"></i> Activate
        </button>
        <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-3 py-2 rounded-lg flex items-center text-sm">
            <i class="fas fa-pause-circle mr-2"></i> Deactivate
        </button>
        <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-3 py-2 rounded-lg flex items-center text-sm">
            <i class="fas fa-copy mr-2"></i> Duplicate
        </button>
        <button class="bg-red-100 hover:bg-red-200 text-red-700 px-3 py-2 rounded-lg flex items-center text-sm">
            <i class="fas fa-trash mr-2"></i> Delete Selected
        </button>
    </div>
</div>
@endsection
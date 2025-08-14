@extends('layouts.admin')

@section('title', 'Orders')

@section('content')
<!-- Page Header -->
<div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
    <div>
        <h2 class="text-2xl font-bold">Orders</h2>
        <p class="mt-1 text-sm text-gray-500">Manage customer orders</p>
    </div>
    <div class="mt-4 md:mt-0">
        <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-plus mr-2"></i> Create Manual Order
        </button>
    </div>
</div>

<!-- Filters & Search -->
<div class="bg-white rounded-lg shadow-sm p-4 mb-6">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
        <!-- Search -->
        <div class="relative w-full md:w-64">
            <input type="text" placeholder="Search orders..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
        </div>
        
        <!-- Filters -->
        <div class="flex flex-wrap items-center gap-3">
            <select class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                <option value="">All Status</option>
                <option value="pending">Pending</option>
                <option value="processing">Processing</option>
                <option value="completed">Completed</option>
                <option value="cancelled">Cancelled</option>
                <option value="refunded">Refunded</option>
            </select>
            
            <select class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                <option value="">Payment Status</option>
                <option value="paid">Paid</option>
                <option value="unpaid">Unpaid</option>
                <option value="partial">Partial</option>
            </select>
            
            <select class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                <option value="">Sort By</option>
                <option value="date_desc">Date (Newest)</option>
                <option value="date_asc">Date (Oldest)</option>
                <option value="total_desc">Total (High to Low)</option>
                <option value="total_asc">Total (Low to High)</option>
            </select>
            
            <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-3 py-2 rounded-lg flex items-center">
                <i class="fas fa-filter mr-2"></i> More Filters
            </button>
        </div>
    </div>
</div>

<!-- Orders Stats -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    <!-- Total Orders -->
    <div class="admin-card bg-white rounded-lg shadow-sm p-4">
        <div class="flex items-center justify-between mb-3">
            <h3 class="text-sm font-medium text-gray-500">Total Orders</h3>
        </div>
        <div class="flex items-end justify-between">
            <p class="text-2xl font-bold">1,482</p>
            <div class="p-2 bg-blue-100 rounded-md">
                <i class="fas fa-shopping-cart text-blue-500"></i>
            </div>
        </div>
    </div>
    
    <!-- Pending Orders -->
    <div class="admin-card bg-white rounded-lg shadow-sm p-4">
        <div class="flex items-center justify-between mb-3">
            <h3 class="text-sm font-medium text-gray-500">Pending Orders</h3>
        </div>
        <div class="flex items-end justify-between">
            <p class="text-2xl font-bold">24</p>
            <div class="p-2 bg-yellow-100 rounded-md">
                <i class="fas fa-clock text-yellow-500"></i>
            </div>
        </div>
    </div>
    
    <!-- Completed Orders -->
    <div class="admin-card bg-white rounded-lg shadow-sm p-4">
        <div class="flex items-center justify-between mb-3">
            <h3 class="text-sm font-medium text-gray-500">Completed Orders</h3>
        </div>
        <div class="flex items-end justify-between">
            <p class="text-2xl font-bold">1,284</p>
            <div class="p-2 bg-green-100 rounded-md">
                <i class="fas fa-check-circle text-green-500"></i>
            </div>
        </div>
    </div>
    
    <!-- Cancelled Orders -->
    <div class="admin-card bg-white rounded-lg shadow-sm p-4">
        <div class="flex items-center justify-between mb-3">
            <h3 class="text-sm font-medium text-gray-500">Cancelled Orders</h3>
        </div>
        <div class="flex items-end justify-between">
            <p class="text-2xl font-bold">174</p>
            <div class="p-2 bg-red-100 rounded-md">
                <i class="fas fa-times-circle text-red-500"></i>
            </div>
        </div>
    </div>
</div>

<!-- Orders Table -->
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
                    <th class="px-4 py-3 text-left">Order ID</th>
                    <th class="px-4 py-3 text-left">Customer</th>
                    <th class="px-4 py-3 text-left">Date</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-left">Payment</th>
                    <th class="px-4 py-3 text-left">Total</th>
                    <th class="px-4 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <!-- Order 1 -->
                <tr class="text-sm text-gray-700 hover:bg-gray-50">
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <input type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        </div>
                    </td>
                    <td class="px-4 py-3 font-medium">#ORD-7246</td>
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <img src="https://randomuser.me/api/portraits/women/12.jpg" alt="Customer" class="w-6 h-6 rounded-full mr-2">
                            <span>Emma Wilson</span>
                        </div>
                    </td>
                    <td class="px-4 py-3">2 hours ago</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Completed</span>
                    </td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Paid</span>
                    </td>
                    <td class="px-4 py-3 font-medium">$96.20</td>
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
                
                <!-- Order 2 -->
                <tr class="text-sm text-gray-700 hover:bg-gray-50">
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <input type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        </div>
                    </td>
                    <td class="px-4 py-3 font-medium">#ORD-7245</td>
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Customer" class="w-6 h-6 rounded-full mr-2">
                            <span>Michael Brown</span>
                        </div>
                    </td>
                    <td class="px-4 py-3">3 hours ago</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-800">Processing</span>
                    </td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Paid</span>
                    </td>
                    <td class="px-4 py-3 font-medium">$142.50</td>
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
                
                <!-- Order 3 -->
                <tr class="text-sm text-gray-700 hover:bg-gray-50">
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <input type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        </div>
                    </td>
                    <td class="px-4 py-3 font-medium">#ORD-7244</td>
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Customer" class="w-6 h-6 rounded-full mr-2">
                            <span>Sophia Martinez</span>
                        </div>
                    </td>
                    <td class="px-4 py-3">5 hours ago</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                    </td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-800">Unpaid</span>
                    </td>
                    <td class="px-4 py-3 font-medium">$56.75</td>
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
                
                <!-- Order 4 -->
                <tr class="text-sm text-gray-700 hover:bg-gray-50">
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <input type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        </div>
                    </td>
                    <td class="px-4 py-3 font-medium">#ORD-7243</td>
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Customer" class="w-6 h-6 rounded-full mr-2">
                            <span>James Johnson</span>
                        </div>
                    </td>
                    <td class="px-4 py-3">6 hours ago</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Completed</span>
                    </td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800">Paid</span>
                    </td>
                    <td class="px-4 py-3 font-medium">$210.40</td>
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
                
                <!-- Order 5 -->
                <tr class="text-sm text-gray-700 hover:bg-gray-50">
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <input type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        </div>
                    </td>
                    <td class="px-4 py-3 font-medium">#ORD-7242</td>
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <img src="https://randomuser.me/api/portraits/women/22.jpg" alt="Customer" class="w-6 h-6 rounded-full mr-2">
                            <span>Olivia Davis</span>
                        </div>
                    </td>
                    <td class="px-4 py-3">8 hours ago</td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-800">Cancelled</span>
                    </td>
                    <td class="px-4 py-3">
                        <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-800">Refunded</span>
                    </td>
                    <td class="px-4 py-3 font-medium">$87.65</td>
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
                Showing <span class="font-medium">1</span> to <span class="font-medium">5</span> of <span class="font-medium">1,482</span> orders
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
            <i class="fas fa-check-circle mr-2"></i> Mark as Completed
        </button>
        <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-3 py-2 rounded-lg flex items-center text-sm">
            <i class="fas fa-truck mr-2"></i> Update Shipping
        </button>
        <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-3 py-2 rounded-lg flex items-center text-sm">
            <i class="fas fa-print mr-2"></i> Print Invoices
        </button>
        <button class="bg-red-100 hover:bg-red-200 text-red-700 px-3 py-2 rounded-lg flex items-center text-sm">
            <i class="fas fa-times-circle mr-2"></i> Cancel Orders
        </button>
    </div>
</div>
@endsection
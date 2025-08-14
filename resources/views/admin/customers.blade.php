@extends('layouts.admin')

@section('title', 'Customers')

@section('content')
<!-- Page Header -->
<div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
    <div>
        <h2 class="text-2xl font-bold">Customers</h2>
        <p class="mt-1 text-sm text-gray-500">Manage your customer database</p>
    </div>
    <div class="mt-4 md:mt-0">
        <button class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg flex items-center">
            <i class="fas fa-plus mr-2"></i> Add New Customer
        </button>
    </div>
</div>

<!-- Filters & Search -->
<div class="bg-white rounded-lg shadow-sm p-4 mb-6">
    <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
        <!-- Search -->
        <div class="relative w-full md:w-64">
            <input type="text" placeholder="Search customers..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
        </div>
        
        <!-- Filters -->
        <div class="flex flex-wrap items-center gap-3">
            <select class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                <option value="">All Customers</option>
                <option value="new">New Customers</option>
                <option value="returning">Returning Customers</option>
                <option value="vip">VIP Customers</option>
            </select>
            
            <select class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                <option value="">Sort By</option>
                <option value="name_asc">Name (A-Z)</option>
                <option value="name_desc">Name (Z-A)</option>
                <option value="date_desc">Date Joined (Newest)</option>
                <option value="date_asc">Date Joined (Oldest)</option>
                <option value="orders_desc">Orders (High to Low)</option>
                <option value="orders_asc">Orders (Low to High)</option>
            </select>
            
            <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-3 py-2 rounded-lg flex items-center">
                <i class="fas fa-filter mr-2"></i> More Filters
            </button>
        </div>
    </div>
</div>

<!-- Customer Stats -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    <!-- Total Customers -->
    <div class="admin-card bg-white rounded-lg shadow-sm p-4">
        <div class="flex items-center justify-between mb-3">
            <h3 class="text-sm font-medium text-gray-500">Total Customers</h3>
            <span class="text-green-500 text-xs font-medium">+5.3%</span>
        </div>
        <div class="flex items-end justify-between">
            <p class="text-2xl font-bold">892</p>
            <div class="p-2 bg-purple-100 rounded-md">
                <i class="fas fa-users text-purple-500"></i>
            </div>
        </div>
        <p class="text-xs text-gray-500 mt-2">Compared to 847 last month</p>
    </div>
    
    <!-- New Customers -->
    <div class="admin-card bg-white rounded-lg shadow-sm p-4">
        <div class="flex items-center justify-between mb-3">
            <h3 class="text-sm font-medium text-gray-500">New Customers</h3>
            <span class="text-green-500 text-xs font-medium">+12.8%</span>
        </div>
        <div class="flex items-end justify-between">
            <p class="text-2xl font-bold">45</p>
            <div class="p-2 bg-green-100 rounded-md">
                <i class="fas fa-user-plus text-green-500"></i>
            </div>
        </div>
        <p class="text-xs text-gray-500 mt-2">Compared to 40 last month</p>
    </div>
    
    <!-- Active Customers -->
    <div class="admin-card bg-white rounded-lg shadow-sm p-4">
        <div class="flex items-center justify-between mb-3">
            <h3 class="text-sm font-medium text-gray-500">Active Customers</h3>
            <span class="text-green-500 text-xs font-medium">+3.2%</span>
        </div>
        <div class="flex items-end justify-between">
            <p class="text-2xl font-bold">624</p>
            <div class="p-2 bg-blue-100 rounded-md">
                <i class="fas fa-user-check text-blue-500"></i>
            </div>
        </div>
        <p class="text-xs text-gray-500 mt-2">Compared to 605 last month</p>
    </div>
    
    <!-- Average Order Value -->
    <div class="admin-card bg-white rounded-lg shadow-sm p-4">
        <div class="flex items-center justify-between mb-3">
            <h3 class="text-sm font-medium text-gray-500">Avg. Order Value</h3>
            <span class="text-green-500 text-xs font-medium">+7.4%</span>
        </div>
        <div class="flex items-end justify-between">
            <p class="text-2xl font-bold">$86.42</p>
            <div class="p-2 bg-yellow-100 rounded-md">
                <i class="fas fa-dollar-sign text-yellow-500"></i>
            </div>
        </div>
        <p class="text-xs text-gray-500 mt-2">Compared to $80.47 last month</p>
    </div>
</div>

<!-- Customers Table -->
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
                    <th class="px-4 py-3 text-left">Customer</th>
                    <th class="px-4 py-3 text-left">Email</th>
                    <th class="px-4 py-3 text-left">Phone</th>
                    <th class="px-4 py-3 text-left">Orders</th>
                    <th class="px-4 py-3 text-left">Total Spent</th>
                    <th class="px-4 py-3 text-left">Last Order</th>
                    <th class="px-4 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <!-- Customer 1 -->
                <tr class="text-sm text-gray-700 hover:bg-gray-50">
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <input type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        </div>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <img src="https://randomuser.me/api/portraits/women/12.jpg" alt="Customer" class="w-8 h-8 rounded-full mr-3">
                            <div>
                                <p class="font-medium">Emma Wilson</p>
                                <p class="text-xs text-gray-500">Member since Jan 2023</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3">emma.wilson@example.com</td>
                    <td class="px-4 py-3">+1 (555) 123-4567</td>
                    <td class="px-4 py-3">12</td>
                    <td class="px-4 py-3 font-medium">$1,245.80</td>
                    <td class="px-4 py-3">2 hours ago</td>
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
                
                <!-- Customer 2 -->
                <tr class="text-sm text-gray-700 hover:bg-gray-50">
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <input type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        </div>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Customer" class="w-8 h-8 rounded-full mr-3">
                            <div>
                                <p class="font-medium">Michael Brown</p>
                                <p class="text-xs text-gray-500">Member since Mar 2023</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3">michael.brown@example.com</td>
                    <td class="px-4 py-3">+1 (555) 234-5678</td>
                    <td class="px-4 py-3">8</td>
                    <td class="px-4 py-3 font-medium">$876.50</td>
                    <td class="px-4 py-3">3 hours ago</td>
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
                
                <!-- Customer 3 -->
                <tr class="text-sm text-gray-700 hover:bg-gray-50">
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <input type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        </div>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Customer" class="w-8 h-8 rounded-full mr-3">
                            <div>
                                <p class="font-medium">Sophia Martinez</p>
                                <p class="text-xs text-gray-500">Member since Feb 2023</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3">sophia.martinez@example.com</td>
                    <td class="px-4 py-3">+1 (555) 345-6789</td>
                    <td class="px-4 py-3">5</td>
                    <td class="px-4 py-3 font-medium">$432.25</td>
                    <td class="px-4 py-3">5 hours ago</td>
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
                
                <!-- Customer 4 -->
                <tr class="text-sm text-gray-700 hover:bg-gray-50">
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <input type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        </div>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <img src="https://randomuser.me/api/portraits/men/45.jpg" alt="Customer" class="w-8 h-8 rounded-full mr-3">
                            <div>
                                <p class="font-medium">James Johnson</p>
                                <p class="text-xs text-gray-500">Member since Dec 2022</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3">james.johnson@example.com</td>
                    <td class="px-4 py-3">+1 (555) 456-7890</td>
                    <td class="px-4 py-3">18</td>
                    <td class="px-4 py-3 font-medium">$2,145.60</td>
                    <td class="px-4 py-3">6 hours ago</td>
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
                
                <!-- Customer 5 -->
                <tr class="text-sm text-gray-700 hover:bg-gray-50">
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <input type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                        </div>
                    </td>
                    <td class="px-4 py-3">
                        <div class="flex items-center">
                            <img src="https://randomuser.me/api/portraits/women/22.jpg" alt="Customer" class="w-8 h-8 rounded-full mr-3">
                            <div>
                                <p class="font-medium">Olivia Davis</p>
                                <p class="text-xs text-gray-500">Member since Apr 2023</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-4 py-3">olivia.davis@example.com</td>
                    <td class="px-4 py-3">+1 (555) 567-8901</td>
                    <td class="px-4 py-3">3</td>
                    <td class="px-4 py-3 font-medium">$187.65</td>
                    <td class="px-4 py-3">8 hours ago</td>
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
                Showing <span class="font-medium">1</span> to <span class="font-medium">5</span> of <span class="font-medium">892</span> customers
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
            <i class="fas fa-envelope mr-2"></i> Send Email
        </button>
        <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-3 py-2 rounded-lg flex items-center text-sm">
            <i class="fas fa-tag mr-2"></i> Add Tag
        </button>
        <button class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-3 py-2 rounded-lg flex items-center text-sm">
            <i class="fas fa-user-tag mr-2"></i> Change Group
        </button>
        <button class="bg-red-100 hover:bg-red-200 text-red-700 px-3 py-2 rounded-lg flex items-center text-sm">
            <i class="fas fa-trash mr-2"></i> Delete Selected
        </button>
    </div>
</div>
@endsection
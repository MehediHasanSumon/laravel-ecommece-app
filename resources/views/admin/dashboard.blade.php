@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<!-- Welcome Banner -->
<div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-xl shadow-lg mb-6 overflow-hidden">
    <div class="p-6 sm:p-8 md:p-10 text-white relative">
        <!-- Decorative elements -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-white opacity-10 rounded-full -mt-20 -mr-20"></div>
        <div class="absolute bottom-0 left-0 w-40 h-40 bg-white opacity-10 rounded-full -mb-10 -ml-10"></div>
        
        <div class="relative z-10">
            <div class="flex items-center mb-4">
                <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Admin" class="w-12 h-12 rounded-full border-2 border-white mr-4">
                <div>
                    <h2 class="text-2xl font-bold">Welcome back, {{ Auth::user()->name ?? 'Admin' }}!</h2>
                    <p class="text-indigo-100">Here's what's happening with your store today.</p>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-6">
                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 flex items-center">
                    <div class="p-3 rounded-full bg-white/20 mr-4">
                        <i class="fas fa-shopping-cart text-xl"></i>
                    </div>
                    <div>
                        <p class="text-sm text-indigo-100">Today's Orders</p>
                        <p class="text-2xl font-bold">24</p>
                    </div>
                </div>
                
                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 flex items-center">
                    <div class="p-3 rounded-full bg-white/20 mr-4">
                        <i class="fas fa-dollar-sign text-xl"></i>
                    </div>
                    <div>
                        <p class="text-sm text-indigo-100">Today's Revenue</p>
                        <p class="text-2xl font-bold">$1,284.50</p>
                    </div>
                </div>
                
                <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4 flex items-center">
                    <div class="p-3 rounded-full bg-white/20 mr-4">
                        <i class="fas fa-users text-xl"></i>
                    </div>
                    <div>
                        <p class="text-sm text-indigo-100">New Customers</p>
                        <p class="text-2xl font-bold">12</p>
                    </div>
                </div>
            </div>
            
            <div class="mt-6 flex flex-wrap gap-3">
                <a href="{{ route('admin.products.index') }}" class="inline-flex items-center px-4 py-2 bg-white/20 hover:bg-white/30 rounded-lg transition-all">
                    <i class="fas fa-plus mr-2"></i> Add Product
                </a>
                <a href="{{ route('admin.orders.index') }}" class="inline-flex items-center px-4 py-2 bg-white/20 hover:bg-white/30 rounded-lg transition-all">
                    <i class="fas fa-list mr-2"></i> View Orders
                </a>
                <a href="#" class="inline-flex items-center px-4 py-2 bg-white/20 hover:bg-white/30 rounded-lg transition-all">
                    <i class="fas fa-chart-bar mr-2"></i> Analytics
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    <!-- Total Sales -->
    <div class="admin-card bg-gradient-to-br from-white to-gray-50 rounded-xl shadow-md p-5 border border-gray-100 transform transition-all duration-200 hover:shadow-lg">
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center">
                <div class="p-3 bg-green-100 rounded-lg mr-3">
                    <i class="fas fa-chart-line text-green-600"></i>
                </div>
                <h3 class="text-sm font-medium text-gray-700">Total Sales</h3>
            </div>
            <span class="text-xs font-medium px-2 py-1 bg-green-100 text-green-800 rounded-full">+12.5%</span>
        </div>
        <div class="flex items-end justify-between">
            <div>
                <p class="text-3xl font-bold text-gray-800">$24,780</p>
                <p class="text-sm text-gray-500 mt-1">This month</p>
            </div>
            <div class="text-green-500">
                <i class="fas fa-arrow-up text-xl"></i>
            </div>
        </div>
    </div>
    
    <!-- Total Orders -->
    <div class="admin-card bg-gradient-to-br from-white to-gray-50 rounded-xl shadow-md p-5 border border-gray-100 transform transition-all duration-200 hover:shadow-lg">
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center">
                <div class="p-3 bg-blue-100 rounded-lg mr-3">
                    <i class="fas fa-shopping-cart text-blue-600"></i>
                </div>
                <h3 class="text-sm font-medium text-gray-700">Total Orders</h3>
            </div>
            <span class="text-xs font-medium px-2 py-1 bg-blue-100 text-blue-800 rounded-full">+8.2%</span>
        </div>
        <div class="flex items-end justify-between">
            <div>
                <p class="text-3xl font-bold text-gray-800">1,482</p>
                <p class="text-sm text-gray-500 mt-1">This month</p>
            </div>
            <div class="text-blue-500">
                <i class="fas fa-arrow-up text-xl"></i>
            </div>
        </div>
    </div>
    
    <!-- Total Customers -->
    <div class="admin-card bg-gradient-to-br from-white to-gray-50 rounded-xl shadow-md p-5 border border-gray-100 transform transition-all duration-200 hover:shadow-lg">
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center">
                <div class="p-3 bg-purple-100 rounded-lg mr-3">
                    <i class="fas fa-users text-purple-600"></i>
                </div>
                <h3 class="text-sm font-medium text-gray-700">Total Customers</h3>
            </div>
            <span class="text-xs font-medium px-2 py-1 bg-purple-100 text-purple-800 rounded-full">+5.3%</span>
        </div>
        <div class="flex items-end justify-between">
            <div>
                <p class="text-3xl font-bold text-gray-800">892</p>
                <p class="text-sm text-gray-500 mt-1">Active accounts</p>
            </div>
            <div class="text-purple-500">
                <i class="fas fa-arrow-up text-xl"></i>
            </div>
        </div>
    </div>
    
    <!-- Conversion Rate -->
    <div class="admin-card bg-gradient-to-br from-white to-gray-50 rounded-xl shadow-md p-5 border border-gray-100 transform transition-all duration-200 hover:shadow-lg">
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center">
                <div class="p-3 bg-yellow-100 rounded-lg mr-3">
                    <i class="fas fa-chart-pie text-yellow-600"></i>
                </div>
                <h3 class="text-sm font-medium text-gray-700">Conversion Rate</h3>
            </div>
            <span class="text-xs font-medium px-2 py-1 bg-red-100 text-red-800 rounded-full">-2.1%</span>
        </div>
        <div class="flex items-end justify-between">
            <div>
                <p class="text-3xl font-bold text-gray-800">3.42%</p>
                <p class="text-sm text-gray-500 mt-1">Needs improvement</p>
            </div>
            <div class="text-red-500">
                <i class="fas fa-arrow-down text-xl"></i>
            </div>
        </div>
    </div>
</div>

<!-- Recent Orders & Top Products -->
<div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
    <!-- Recent Orders -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
        <div class="p-5 border-b border-gray-100 flex items-center">
            <div class="p-2 bg-blue-100 rounded-lg mr-3">
                <i class="fas fa-shopping-bag text-blue-600"></i>
            </div>
            <div>
                <h3 class="font-semibold text-gray-800 text-lg">Recent Orders</h3>
                <p class="text-sm text-gray-500">Latest customer purchases</p>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="admin-table w-full">
                <thead class="bg-gray-50 text-xs font-medium text-gray-500 uppercase tracking-wider">
                    <tr>
                        <th class="px-4 py-3 text-left">Order ID</th>
                        <th class="px-4 py-3 text-left">Customer</th>
                        <th class="px-4 py-3 text-left">Status</th>
                        <th class="px-4 py-3 text-left">Amount</th>
                        <th class="px-4 py-3 text-left">Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr class="text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-150">
                        <td class="px-4 py-3 font-medium">#ORD-7246</td>
                        <td class="px-4 py-3 flex items-center">
                            <span class="w-7 h-7 rounded-full bg-indigo-100 text-indigo-800 flex items-center justify-center mr-2 text-xs font-bold">EW</span>
                            Emma Wilson
                        </td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800 font-medium">Completed</span>
                        </td>
                        <td class="px-4 py-3 font-medium">$96.20</td>
                        <td class="px-4 py-3 text-gray-500">2 hours ago</td>
                    </tr>
                    <tr class="text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-150">
                        <td class="px-4 py-3 font-medium">#ORD-7245</td>
                        <td class="px-4 py-3 flex items-center">
                            <span class="w-7 h-7 rounded-full bg-blue-100 text-blue-800 flex items-center justify-center mr-2 text-xs font-bold">MB</span>
                            Michael Brown
                        </td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 text-xs rounded-full bg-blue-100 text-blue-800 font-medium">Processing</span>
                        </td>
                        <td class="px-4 py-3 font-medium">$142.50</td>
                        <td class="px-4 py-3 text-gray-500">3 hours ago</td>
                    </tr>
                    <tr class="text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-150">
                        <td class="px-4 py-3 font-medium">#ORD-7244</td>
                        <td class="px-4 py-3 flex items-center">
                            <span class="w-7 h-7 rounded-full bg-pink-100 text-pink-800 flex items-center justify-center mr-2 text-xs font-bold">SM</span>
                            Sophia Martinez
                        </td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 text-xs rounded-full bg-yellow-100 text-yellow-800 font-medium">Pending</span>
                        </td>
                        <td class="px-4 py-3 font-medium">$56.75</td>
                        <td class="px-4 py-3 text-gray-500">5 hours ago</td>
                    </tr>
                    <tr class="text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-150">
                        <td class="px-4 py-3 font-medium">#ORD-7243</td>
                        <td class="px-4 py-3 flex items-center">
                            <span class="w-7 h-7 rounded-full bg-green-100 text-green-800 flex items-center justify-center mr-2 text-xs font-bold">JJ</span>
                            James Johnson
                        </td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 text-xs rounded-full bg-green-100 text-green-800 font-medium">Completed</span>
                        </td>
                        <td class="px-4 py-3 font-medium">$210.40</td>
                        <td class="px-4 py-3 text-gray-500">6 hours ago</td>
                    </tr>
                    <tr class="text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-150">
                        <td class="px-4 py-3 font-medium">#ORD-7242</td>
                        <td class="px-4 py-3 flex items-center">
                            <span class="w-7 h-7 rounded-full bg-red-100 text-red-800 flex items-center justify-center mr-2 text-xs font-bold">OD</span>
                            Olivia Davis
                        </td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 text-xs rounded-full bg-red-100 text-red-800 font-medium">Cancelled</span>
                        </td>
                        <td class="px-4 py-3 font-medium">$87.65</td>
                        <td class="px-4 py-3 text-gray-500">8 hours ago</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t text-right">
            <a href="{{ route('admin.orders.index') }}" class="inline-flex items-center px-4 py-2 bg-indigo-50 text-indigo-700 rounded-lg hover:bg-indigo-100 transition-all duration-200 font-medium text-sm">
                View All Orders <i class="fas fa-arrow-right ml-2"></i>
            </a>
        </div>
    </div>
    
    <!-- Top Products -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
        <div class="p-5 border-b border-gray-100 flex items-center">
            <div class="p-2 bg-green-100 rounded-lg mr-3">
                <i class="fas fa-crown text-green-600"></i>
            </div>
            <div>
                <h3 class="font-semibold text-gray-800 text-lg">Top Selling Products</h3>
                <p class="text-sm text-gray-500">Best performing items in your store</p>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="admin-table w-full">
                <thead class="bg-gray-50 text-xs font-medium text-gray-500 uppercase tracking-wider">
                    <tr>
                        <th class="px-4 py-3 text-left">Product</th>
                        <th class="px-4 py-3 text-left">Category</th>
                        <th class="px-4 py-3 text-left">Price</th>
                        <th class="px-4 py-3 text-left">Sold</th>
                        <th class="px-4 py-3 text-left">Revenue</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    <tr class="text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-150">
                        <td class="px-4 py-3 flex items-center">
                            <div class="w-10 h-10 bg-indigo-100 rounded-lg mr-3 flex items-center justify-center text-indigo-600">
                                <i class="fas fa-headphones"></i>
                            </div>
                            <span class="font-medium">Wireless Earbuds</span>
                        </td>
                        <td class="px-4 py-3"><span class="px-2 py-1 bg-indigo-50 text-indigo-700 rounded text-xs font-medium">Electronics</span></td>
                        <td class="px-4 py-3 font-medium">$59.99</td>
                        <td class="px-4 py-3 font-medium">124</td>
                        <td class="px-4 py-3 font-medium text-green-600">$7,438.76</td>
                    </tr>
                    <tr class="text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-150">
                        <td class="px-4 py-3 flex items-center">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg mr-3 flex items-center justify-center text-blue-600">
                                <i class="fas fa-clock"></i>
                            </div>
                            <span class="font-medium">Smart Watch</span>
                        </td>
                        <td class="px-4 py-3"><span class="px-2 py-1 bg-indigo-50 text-indigo-700 rounded text-xs font-medium">Electronics</span></td>
                        <td class="px-4 py-3 font-medium">$129.99</td>
                        <td class="px-4 py-3 font-medium">98</td>
                        <td class="px-4 py-3 font-medium text-green-600">$12,739.02</td>
                    </tr>
                    <tr class="text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-150">
                        <td class="px-4 py-3 flex items-center">
                            <div class="w-10 h-10 bg-purple-100 rounded-lg mr-3 flex items-center justify-center text-purple-600">
                                <i class="fas fa-dumbbell"></i>
                            </div>
                            <span class="font-medium">Yoga Mat</span>
                        </td>
                        <td class="px-4 py-3"><span class="px-2 py-1 bg-purple-50 text-purple-700 rounded text-xs font-medium">Fitness</span></td>
                        <td class="px-4 py-3 font-medium">$24.99</td>
                        <td class="px-4 py-3 font-medium">87</td>
                        <td class="px-4 py-3 font-medium text-green-600">$2,174.13</td>
                    </tr>
                    <tr class="text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-150">
                        <td class="px-4 py-3 flex items-center">
                            <div class="w-10 h-10 bg-orange-100 rounded-lg mr-3 flex items-center justify-center text-orange-600">
                                <i class="fas fa-coffee"></i>
                            </div>
                            <span class="font-medium">Coffee Maker</span>
                        </td>
                        <td class="px-4 py-3"><span class="px-2 py-1 bg-orange-50 text-orange-700 rounded text-xs font-medium">Home</span></td>
                        <td class="px-4 py-3 font-medium">$89.99</td>
                        <td class="px-4 py-3 font-medium">76</td>
                        <td class="px-4 py-3 font-medium text-green-600">$6,839.24</td>
                    </tr>
                    <tr class="text-sm text-gray-700 hover:bg-gray-50 transition-colors duration-150">
                        <td class="px-4 py-3 flex items-center">
                            <div class="w-10 h-10 bg-yellow-100 rounded-lg mr-3 flex items-center justify-center text-yellow-600">
                                <i class="fas fa-lightbulb"></i>
                            </div>
                            <span class="font-medium">Desk Lamp</span>
                        </td>
                        <td class="px-4 py-3"><span class="px-2 py-1 bg-orange-50 text-orange-700 rounded text-xs font-medium">Home</span></td>
                        <td class="px-4 py-3 font-medium">$34.99</td>
                        <td class="px-4 py-3 font-medium">65</td>
                        <td class="px-4 py-3 font-medium text-green-600">$2,274.35</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="p-4 border-t border-gray-100 bg-gray-50 flex justify-center">
            <a href="{{ route('admin.products.index') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-lg transition-colors duration-150 shadow-sm hover:shadow">
                <i class="fas fa-eye mr-2"></i> View All Products
            </a>
        </div>
    </div>
</div>

<!-- Sales Analytics Chart -->
<div class="bg-white rounded-xl shadow-sm p-5 mb-6 border border-gray-100">
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center">
            <div class="p-2 bg-blue-100 rounded-lg mr-3">
                <i class="fas fa-chart-line text-blue-600"></i>
            </div>
            <div>
                <h3 class="font-semibold text-gray-800 text-lg">Sales Analytics</h3>
                <p class="text-sm text-gray-500">Revenue trends over time</p>
            </div>
        </div>
        <div class="flex space-x-2">
            <button class="px-4 py-2 text-xs font-medium bg-indigo-600 text-white rounded-lg shadow-sm hover:bg-indigo-700 transition-colors duration-150">Weekly</button>
            <button class="px-4 py-2 text-xs font-medium bg-gray-100 text-gray-600 rounded-lg hover:bg-gray-200 transition-colors duration-150">Monthly</button>
            <button class="px-4 py-2 text-xs font-medium bg-gray-100 text-gray-600 rounded-lg hover:bg-gray-200 transition-colors duration-150">Yearly</button>
        </div>
    </div>
    <div class="p-2">
        <canvas id="salesChart" height="120"></canvas>
    </div>
</div>

<!-- Recent Activity & Quick Actions -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
    <!-- Recent Activity -->
    <div class="lg:col-span-2 bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
        <div class="p-5 border-b border-gray-100 flex items-center">
            <div class="p-2 bg-purple-100 rounded-lg mr-3">
                <i class="fas fa-history text-purple-600"></i>
            </div>
            <div>
                <h3 class="font-semibold text-gray-800 text-lg">Recent Activity</h3>
                <p class="text-sm text-gray-500">Latest actions in your store</p>
            </div>
        </div>
        <div class="p-5">
            <div class="space-y-5">
                <div class="flex items-start hover:bg-gray-50 p-3 rounded-lg transition-colors duration-150">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-green-100 flex items-center justify-center mr-4 shadow-sm">
                        <i class="fas fa-shopping-cart text-green-500"></i>
                    </div>
                    <div>
                        <p class="text-sm"><span class="font-medium text-gray-800">New order</span> placed by <span class="font-medium text-indigo-600">Emma Wilson</span></p>
                        <p class="text-xs text-gray-500 mt-1 flex items-center">
                            <i class="fas fa-clock mr-1"></i> 2 hours ago
                        </p>
                    </div>
                </div>
                <div class="flex items-start hover:bg-gray-50 p-3 rounded-lg transition-colors duration-150">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center mr-4 shadow-sm">
                        <i class="fas fa-user text-blue-500"></i>
                    </div>
                    <div>
                        <p class="text-sm"><span class="font-medium text-gray-800">New customer</span> registered</p>
                        <p class="text-xs text-gray-500 mt-1 flex items-center">
                            <i class="fas fa-clock mr-1"></i> 3 hours ago
                        </p>
                    </div>
                </div>
                <div class="flex items-start hover:bg-gray-50 p-3 rounded-lg transition-colors duration-150">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-yellow-100 flex items-center justify-center mr-4 shadow-sm">
                        <i class="fas fa-star text-yellow-500"></i>
                    </div>
                    <div>
                        <p class="text-sm"><span class="font-medium text-gray-800">New review</span> for <span class="font-medium text-indigo-600">Wireless Earbuds</span></p>
                        <p class="text-xs text-gray-500 mt-1 flex items-center">
                            <i class="fas fa-clock mr-1"></i> 4 hours ago
                        </p>
                    </div>
                </div>
                <div class="flex items-start hover:bg-gray-50 p-3 rounded-lg transition-colors duration-150">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center mr-4 shadow-sm">
                        <i class="fas fa-box text-purple-500"></i>
                    </div>
                    <div>
                        <p class="text-sm"><span class="font-medium text-gray-800">Product stock</span> updated for <span class="font-medium text-indigo-600">Smart Watch</span></p>
                        <p class="text-xs text-gray-500 mt-1 flex items-center">
                            <i class="fas fa-clock mr-1"></i> 5 hours ago
                        </p>
                    </div>
                </div>
                <div class="flex items-start hover:bg-gray-50 p-3 rounded-lg transition-colors duration-150">
                    <div class="flex-shrink-0 w-10 h-10 rounded-full bg-red-100 flex items-center justify-center mr-4 shadow-sm">
                        <i class="fas fa-times text-red-500"></i>
                    </div>
                    <div>
                        <p class="text-sm"><span class="font-medium text-gray-800">Order cancelled</span> by <span class="font-medium text-indigo-600">Olivia Davis</span></p>
                        <p class="text-xs text-gray-500 mt-1 flex items-center">
                            <i class="fas fa-clock mr-1"></i> 8 hours ago
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Quick Actions -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden border border-gray-100">
        <div class="p-5 border-b border-gray-100 flex items-center">
            <div class="p-2 bg-indigo-100 rounded-lg mr-3">
                <i class="fas fa-bolt text-indigo-600"></i>
            </div>
            <div>
                <h3 class="font-semibold text-gray-800 text-lg">Quick Actions</h3>
                <p class="text-sm text-gray-500">Frequently used shortcuts</p>
            </div>
        </div>
        <div class="p-5">
            <div class="grid grid-cols-2 gap-4">
                <a href="{{ route('admin.products.index') }}" class="flex flex-col items-center justify-center p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors duration-150 border border-gray-100 hover:shadow-sm">
                    <div class="w-12 h-12 rounded-xl bg-indigo-100 flex items-center justify-center mb-3 shadow-sm">
                        <i class="fas fa-box text-indigo-600"></i>
                    </div>
                    <span class="text-sm font-medium text-gray-800">Add Product</span>
                </a>
                <a href="{{ route('admin.categories.index') }}" class="flex flex-col items-center justify-center p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors duration-150 border border-gray-100 hover:shadow-sm">
                    <div class="w-12 h-12 rounded-xl bg-green-100 flex items-center justify-center mb-3 shadow-sm">
                        <i class="fas fa-tags text-green-600"></i>
                    </div>
                    <span class="text-sm font-medium text-gray-800">Categories</span>
                </a>
                <a href="{{ route('admin.orders.index') }}" class="flex flex-col items-center justify-center p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors duration-150 border border-gray-100 hover:shadow-sm">
                    <div class="w-12 h-12 rounded-xl bg-blue-100 flex items-center justify-center mb-3 shadow-sm">
                        <i class="fas fa-shopping-cart text-blue-600"></i>
                    </div>
                    <span class="text-sm font-medium text-gray-800">Orders</span>
                </a>
                <a href="{{ route('admin.customers.index') }}" class="flex flex-col items-center justify-center p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors duration-150 border border-gray-100 hover:shadow-sm">
                    <div class="w-12 h-12 rounded-xl bg-purple-100 flex items-center justify-center mb-3 shadow-sm">
                        <i class="fas fa-users text-purple-600"></i>
                    </div>
                    <span class="text-sm font-medium text-gray-800">Customers</span>
                </a>
                <a href="{{ route('admin.discounts.index') }}" class="flex flex-col items-center justify-center p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors duration-150 border border-gray-100 hover:shadow-sm">
                    <div class="w-12 h-12 rounded-xl bg-yellow-100 flex items-center justify-center mb-3 shadow-sm">
                        <i class="fas fa-percent text-yellow-600"></i>
                    </div>
                    <span class="text-sm font-medium text-gray-800">Discounts</span>
                </a>
                <a href="{{ route('admin.settings.index') }}" class="flex flex-col items-center justify-center p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors duration-150 border border-gray-100 hover:shadow-sm">
                    <div class="w-12 h-12 rounded-xl bg-gray-200 flex items-center justify-center mb-3 shadow-sm">
                        <i class="fas fa-cog text-gray-600"></i>
                    </div>
                    <span class="text-sm font-medium text-gray-800">Settings</span>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Initialize Charts -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Sales Chart
        const salesCtx = document.getElementById('salesChart').getContext('2d');
        const salesChart = new Chart(salesCtx, {
            type: 'line',
            data: {
                labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                datasets: [{
                    label: 'Sales',
                    data: [1200, 1900, 1500, 2500, 1800, 2800, 3200],
                    backgroundColor: 'rgba(79, 70, 229, 0.1)',
                    borderColor: 'rgba(79, 70, 229, 1)',
                    borderWidth: 3,
                    tension: 0.4,
                    fill: true,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: 'rgba(79, 70, 229, 1)',
                    pointBorderWidth: 2,
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgba(79, 70, 229, 1)',
                    pointHoverBorderWidth: 3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    tooltip: {
                        backgroundColor: '#1F2937',
                        titleColor: '#F3F4F6',
                        bodyColor: '#F3F4F6',
                        bodyFont: {
                            size: 14,
                            weight: 'bold'
                        },
                        titleFont: {
                            size: 14,
                            weight: 'bold'
                        },
                        displayColors: false,
                        padding: 12,
                        cornerRadius: 8,
                        caretSize: 6,
                        callbacks: {
                            label: function(context) {
                                return `Revenue: $${context.parsed.y.toLocaleString()}`;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                size: 13,
                                weight: 'bold'
                            },
                            color: '#6B7280'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            borderDash: [3, 5],
                            color: '#E5E7EB'
                        },
                        ticks: {
                            font: {
                                size: 13,
                                weight: 'bold'
                            },
                            color: '#6B7280',
                            padding: 10,
                            callback: function(value) {
                                return '$' + value.toLocaleString();
                            }
                        }
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index'
                },
                hover: {
                    mode: 'index',
                    intersect: false
                },
                elements: {
                    line: {
                        borderJoinStyle: 'round'
                    }
                }
            }
        });
    });
</script>
@endsection
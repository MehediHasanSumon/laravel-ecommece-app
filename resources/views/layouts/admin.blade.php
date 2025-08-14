<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - Admin</title>
    
    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <!-- Chart.js for Admin Analytics -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <style>
        /* Admin Panel Specific Styles */
        .sidebar-active {
            background-color: rgba(79, 70, 229, 0.1);
            border-left: 3px solid #4F46E5;
            color: #4F46E5;
        }
        
        .sidebar-link:hover {
            background-color: rgba(79, 70, 229, 0.05);
        }
        
        .admin-card {
            transition: all 0.3s ease;
        }
        
        .admin-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        
        /* Table Styles */
        .admin-table th {
            position: relative;
        }
        
        .admin-table th:after {
            content: '';
            position: absolute;
            right: 8px;
            top: 50%;
            transform: translateY(-50%);
            width: 0;
            height: 0;
            border-left: 5px solid transparent;
            border-right: 5px solid transparent;
            border-top: 5px solid #9CA3AF;
            cursor: pointer;
        }
        
        /* Dark Mode Styles */
        .dark .admin-card {
            background-color: #1F2937;
            color: #F3F4F6;
        }
        
        .dark .sidebar-active {
            background-color: rgba(79, 70, 229, 0.2);
        }
        
        .dark .admin-table th:after {
            border-top: 5px solid #D1D5DB;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        .animate-pulse-slow {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside class="hidden md:flex md:flex-col w-64 bg-white shadow-md z-30">
            <!-- Logo -->
            <div class="flex items-center justify-between p-4 border-b">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-indigo-600">{{ config('app.name', 'Laravel') }}</a>
                <span class="px-2 py-1 text-xs font-semibold text-white bg-indigo-600 rounded-md">Admin</span>
            </div>
            
            <!-- Admin Navigation -->
            <nav class="flex-1 overflow-y-auto py-4">
                <ul class="space-y-1">
                    <li>
                        <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'sidebar-active' : '' }} flex items-center px-4 py-3 text-gray-700">
                            <i class="fas fa-tachometer-alt w-5 h-5 mr-3"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.products.index') }}" class="sidebar-link {{ request()->routeIs('admin.products.*') ? 'sidebar-active' : '' }} flex items-center px-4 py-3 text-gray-700 hover:text-indigo-600 transition">
                            <i class="fas fa-box w-5 h-5 mr-3"></i>
                            <span>Products</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.orders.index') }}" class="sidebar-link {{ request()->routeIs('admin.orders.*') ? 'sidebar-active' : '' }} flex items-center px-4 py-3 text-gray-700 hover:text-indigo-600 transition">
                            <i class="fas fa-shopping-cart w-5 h-5 mr-3"></i>
                            <span>Orders</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.customers.index') }}" class="sidebar-link {{ request()->routeIs('admin.customers.*') ? 'sidebar-active' : '' }} flex items-center px-4 py-3 text-gray-700 hover:text-indigo-600 transition">
                            <i class="fas fa-users w-5 h-5 mr-3"></i>
                            <span>Customers</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.categories.index') }}" class="sidebar-link {{ request()->routeIs('admin.categories.*') ? 'sidebar-active' : '' }} flex items-center px-4 py-3 text-gray-700 hover:text-indigo-600 transition">
                            <i class="fas fa-tags w-5 h-5 mr-3"></i>
                            <span>Categories</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.discounts.index') }}" class="sidebar-link {{ request()->routeIs('admin.discounts.*') ? 'sidebar-active' : '' }} flex items-center px-4 py-3 text-gray-700 hover:text-indigo-600 transition">
                            <i class="fas fa-percent w-5 h-5 mr-3"></i>
                            <span>Discounts</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.settings.index') }}" class="sidebar-link {{ request()->routeIs('admin.settings.*') ? 'sidebar-active' : '' }} flex items-center px-4 py-3 text-gray-700 hover:text-indigo-600 transition">
                            <i class="fas fa-cog w-5 h-5 mr-3"></i>
                            <span>Settings</span>
                        </a>
                    </li>
                    
                    <!-- User Management Section -->
                    <li class="mt-4">
                        <h3 class="px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">User Management</h3>
                    </li>
                    <li>
                        <a href="{{ route('admin.users.index') }}" class="sidebar-link {{ request()->routeIs('admin.users.*') ? 'sidebar-active' : '' }} flex items-center px-4 py-3 text-gray-700 hover:text-indigo-600 transition">
                            <i class="fas fa-user-shield w-5 h-5 mr-3"></i>
                            <span>Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.roles.index') }}" class="sidebar-link {{ request()->routeIs('admin.roles.*') ? 'sidebar-active' : '' }} flex items-center px-4 py-3 text-gray-700 hover:text-indigo-600 transition">
                            <i class="fas fa-user-tag w-5 h-5 mr-3"></i>
                            <span>Roles</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.permissions.index') }}" class="sidebar-link {{ request()->routeIs('admin.permissions.*') ? 'sidebar-active' : '' }} flex items-center px-4 py-3 text-gray-700 hover:text-indigo-600 transition">
                            <i class="fas fa-key w-5 h-5 mr-3"></i>
                            <span>Permissions</span>
                        </a>
                    </li>
                </ul>
            </nav>
            
            <!-- Admin User -->
            <div class="p-4 border-t">
                <div class="flex items-center">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Admin" class="w-10 h-10 rounded-full mr-3">
                    <div>
                        <p class="text-sm font-medium">{{ Auth::user()->name ?? 'Admin User' }}</p>
                        <p class="text-xs text-gray-500">Administrator</p>
                    </div>
                    <div class="ml-auto">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-gray-500 hover:text-indigo-600 transition">
                                <i class="fas fa-sign-out-alt"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </aside>
        
        <!-- Mobile Sidebar Toggle -->
        <div class="md:hidden fixed bottom-4 right-4 z-40">
            <button id="sidebarToggle" class="bg-indigo-600 text-white w-12 h-12 rounded-full flex items-center justify-center shadow-lg">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        
        <!-- Mobile Sidebar (Hidden by default) -->
        <div id="mobileSidebar" class="fixed inset-0 bg-gray-900 bg-opacity-50 z-50 hidden">
            <div class="absolute right-0 top-0 h-full w-64 bg-white shadow-lg transform transition-transform duration-300 translate-x-0">
                <!-- Mobile Sidebar Content -->
                <div class="flex items-center justify-between p-4 border-b">
                    <a href="{{ route('home') }}" class="text-2xl font-bold text-indigo-600">{{ config('app.name', 'Laravel') }}</a>
                    <button id="closeSidebar" class="text-gray-500 hover:text-gray-700">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                
                <!-- Mobile Admin Navigation -->
                <nav class="overflow-y-auto py-4">
                    <ul class="space-y-1">
                        <li>
                            <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'sidebar-active' : '' }} flex items-center px-4 py-3 text-gray-700">
                                <i class="fas fa-tachometer-alt w-5 h-5 mr-3"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.products.index') }}" class="sidebar-link {{ request()->routeIs('admin.products.*') ? 'sidebar-active' : '' }} flex items-center px-4 py-3 text-gray-700 hover:text-indigo-600 transition">
                                <i class="fas fa-box w-5 h-5 mr-3"></i>
                                <span>Products</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.orders.index') }}" class="sidebar-link {{ request()->routeIs('admin.orders.*') ? 'sidebar-active' : '' }} flex items-center px-4 py-3 text-gray-700 hover:text-indigo-600 transition">
                                <i class="fas fa-shopping-cart w-5 h-5 mr-3"></i>
                                <span>Orders</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.customers.index') }}" class="sidebar-link {{ request()->routeIs('admin.customers.*') ? 'sidebar-active' : '' }} flex items-center px-4 py-3 text-gray-700 hover:text-indigo-600 transition">
                                <i class="fas fa-users w-5 h-5 mr-3"></i>
                                <span>Customers</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.categories.index') }}" class="sidebar-link {{ request()->routeIs('admin.categories.*') ? 'sidebar-active' : '' }} flex items-center px-4 py-3 text-gray-700 hover:text-indigo-600 transition">
                                <i class="fas fa-tags w-5 h-5 mr-3"></i>
                                <span>Categories</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.discounts.index') }}" class="sidebar-link {{ request()->routeIs('admin.discounts.*') ? 'sidebar-active' : '' }} flex items-center px-4 py-3 text-gray-700 hover:text-indigo-600 transition">
                                <i class="fas fa-percent w-5 h-5 mr-3"></i>
                                <span>Discounts</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.settings.index') }}" class="sidebar-link {{ request()->routeIs('admin.settings.*') ? 'sidebar-active' : '' }} flex items-center px-4 py-3 text-gray-700 hover:text-indigo-600 transition">
                                <i class="fas fa-cog w-5 h-5 mr-3"></i>
                                <span>Settings</span>
                            </a>
                        </li>
                        
                        <!-- Mobile User Management Section -->
                        <li class="mt-4">
                            <h3 class="px-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">User Management</h3>
                        </li>
                        <li>
                            <a href="{{ route('admin.users.index') }}" class="sidebar-link {{ request()->routeIs('admin.users.*') ? 'sidebar-active' : '' }} flex items-center px-4 py-3 text-gray-700 hover:text-indigo-600 transition">
                                <i class="fas fa-user-shield w-5 h-5 mr-3"></i>
                                <span>Users</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.roles.index') }}" class="sidebar-link {{ request()->routeIs('admin.roles.*') ? 'sidebar-active' : '' }} flex items-center px-4 py-3 text-gray-700 hover:text-indigo-600 transition">
                                <i class="fas fa-user-tag w-5 h-5 mr-3"></i>
                                <span>Roles</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.permissions.index') }}" class="sidebar-link {{ request()->routeIs('admin.permissions.*') ? 'sidebar-active' : '' }} flex items-center px-4 py-3 text-gray-700 hover:text-indigo-600 transition">
                                <i class="fas fa-key w-5 h-5 mr-3"></i>
                                <span>Permissions</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                
                <!-- Mobile Admin User -->
                <div class="p-4 border-t mt-auto">
                    <div class="flex items-center">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Admin" class="w-10 h-10 rounded-full mr-3">
                        <div>
                            <p class="text-sm font-medium">{{ Auth::user()->name ?? 'Admin User' }}</p>
                            <p class="text-xs text-gray-500">Administrator</p>
                        </div>
                        <div class="ml-auto">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="text-gray-500 hover:text-indigo-600 transition">
                                    <i class="fas fa-sign-out-alt"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Main Content -->
        <main class="flex-1 overflow-y-auto bg-gray-50">
            <!-- Top Header -->
            <header class="bg-white shadow-sm sticky top-0 z-20">
                <div class="flex items-center justify-between p-4">
                    <!-- Page Title -->
                    <h1 class="text-xl font-semibold text-gray-800">@yield('title', 'Dashboard')</h1>
                    
                    <!-- Header Actions -->
                    <div class="flex items-center space-x-4">
                        <!-- Search -->
                        <div class="relative hidden md:block">
                            <input type="text" placeholder="Search..." class="w-64 pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                        
                        <!-- Notifications -->
                        <div class="relative">
                            <button class="text-gray-500 hover:text-indigo-600 transition">
                                <i class="fas fa-bell text-xl"></i>
                                <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs w-4 h-4 flex items-center justify-center rounded-full">3</span>
                            </button>
                        </div>
                        
                        <!-- Messages -->
                        <div class="relative">
                            <button class="text-gray-500 hover:text-indigo-600 transition">
                                <i class="fas fa-envelope text-xl"></i>
                                <span class="absolute -top-1 -right-1 bg-indigo-500 text-white text-xs w-4 h-4 flex items-center justify-center rounded-full">5</span>
                            </button>
                        </div>
                        
                        <!-- Dark Mode Toggle -->
                        <button class="text-gray-500 hover:text-indigo-600 transition" id="darkModeToggle">
                            <i class="fas fa-moon text-xl"></i>
                        </button>
                    </div>
                </div>
            </header>
            
            <!-- Page Content -->
            <div class="p-4 md:p-6">
                @yield('content')
            </div>
        </main>
    </div>
    
    <!-- JavaScript for Mobile Sidebar Toggle -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.getElementById('sidebarToggle');
            const closeSidebar = document.getElementById('closeSidebar');
            const mobileSidebar = document.getElementById('mobileSidebar');
            const darkModeToggle = document.getElementById('darkModeToggle');
            
            if (sidebarToggle && mobileSidebar) {
                sidebarToggle.addEventListener('click', function() {
                    mobileSidebar.classList.remove('hidden');
                });
            }
            
            if (closeSidebar && mobileSidebar) {
                closeSidebar.addEventListener('click', function() {
                    mobileSidebar.classList.add('hidden');
                });
            }
            
            if (darkModeToggle) {
                darkModeToggle.addEventListener('click', function() {
                    document.documentElement.classList.toggle('dark');
                    
                    // Save preference to localStorage
                    if (document.documentElement.classList.contains('dark')) {
                        localStorage.setItem('darkMode', 'enabled');
                        darkModeToggle.innerHTML = '<i class="fas fa-sun text-xl"></i>';
                    } else {
                        localStorage.setItem('darkMode', 'disabled');
                        darkModeToggle.innerHTML = '<i class="fas fa-moon text-xl"></i>';
                    }
                });
                
                // Check for saved preference
                if (localStorage.getItem('darkMode') === 'enabled') {
                    document.documentElement.classList.add('dark');
                    darkModeToggle.innerHTML = '<i class="fas fa-sun text-xl"></i>';
                }
            }
        });
    </script>
    
    @stack('scripts')
</body>
</html>
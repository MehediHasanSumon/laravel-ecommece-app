@extends('layouts.shop')

@section('title', 'Categories - ShopEase')

@section('content')
    <!-- Breadcrumb -->
    <div class="bg-gray-100 py-3">
        <div class="container mx-auto px-4">
            <div class="flex items-center space-x-2 text-sm">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-indigo-600 transition">Home</a>
                <span class="text-gray-400">/</span>
                <span class="text-indigo-600 font-medium">Categories</span>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <!-- Page Header -->
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-bold mb-4">Shop by Category</h1>
            <p class="text-gray-600 max-w-2xl mx-auto">Browse our wide selection of products organized by category to find exactly what you're looking for.</p>
        </div>
        
        <!-- Featured Categories -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            <!-- Category 1 -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden group">
                <a href="#" class="block relative">
                    <div class="h-48 bg-gray-200 overflow-hidden">
                        <img src="{{ asset('images/categories/electronics.jpg') }}" alt="Electronics" class="w-full h-full object-cover object-center group-hover:scale-105 transition duration-300">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end p-6">
                        <div class="text-white">
                            <h3 class="text-xl font-bold mb-1">Electronics</h3>
                            <p class="text-sm text-gray-200">120 Products</p>
                        </div>
                    </div>
                </a>
            </div>
            
            <!-- Category 2 -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden group">
                <a href="#" class="block relative">
                    <div class="h-48 bg-gray-200 overflow-hidden">
                        <img src="{{ asset('images/categories/clothing.jpg') }}" alt="Clothing" class="w-full h-full object-cover object-center group-hover:scale-105 transition duration-300">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end p-6">
                        <div class="text-white">
                            <h3 class="text-xl font-bold mb-1">Clothing</h3>
                            <p class="text-sm text-gray-200">85 Products</p>
                        </div>
                    </div>
                </a>
            </div>
            
            <!-- Category 3 -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden group">
                <a href="#" class="block relative">
                    <div class="h-48 bg-gray-200 overflow-hidden">
                        <img src="{{ asset('images/categories/home-kitchen.jpg') }}" alt="Home & Kitchen" class="w-full h-full object-cover object-center group-hover:scale-105 transition duration-300">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end p-6">
                        <div class="text-white">
                            <h3 class="text-xl font-bold mb-1">Home & Kitchen</h3>
                            <p class="text-sm text-gray-200">65 Products</p>
                        </div>
                    </div>
                </a>
            </div>
            
            <!-- Category 4 -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden group">
                <a href="#" class="block relative">
                    <div class="h-48 bg-gray-200 overflow-hidden">
                        <img src="{{ asset('images/categories/beauty.jpg') }}" alt="Beauty & Personal Care" class="w-full h-full object-cover object-center group-hover:scale-105 transition duration-300">
                    </div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent flex items-end p-6">
                        <div class="text-white">
                            <h3 class="text-xl font-bold mb-1">Beauty & Personal Care</h3>
                            <p class="text-sm text-gray-200">50 Products</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        
        <!-- All Categories -->
        <div class="mb-12">
            <h2 class="text-2xl font-bold mb-6">All Categories</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                <!-- Category Group 1: Electronics -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-laptop text-indigo-600"></i>
                        </div>
                        <h3 class="text-lg font-bold">Electronics</h3>
                    </div>
                    <ul class="space-y-2">
                        <li>
                            <a href="#" class="flex items-center justify-between text-gray-700 hover:text-indigo-600 transition">
                                <span>Smartphones</span>
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2 py-1 rounded-full">42</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between text-gray-700 hover:text-indigo-600 transition">
                                <span>Laptops</span>
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2 py-1 rounded-full">38</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between text-gray-700 hover:text-indigo-600 transition">
                                <span>Audio</span>
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2 py-1 rounded-full">25</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between text-gray-700 hover:text-indigo-600 transition">
                                <span>Wearables</span>
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2 py-1 rounded-full">15</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-indigo-600 hover:text-indigo-700 transition text-sm font-medium">View all <i class="fas fa-arrow-right ml-1"></i></a>
                        </li>
                    </ul>
                </div>
                
                <!-- Category Group 2: Clothing -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-tshirt text-indigo-600"></i>
                        </div>
                        <h3 class="text-lg font-bold">Clothing</h3>
                    </div>
                    <ul class="space-y-2">
                        <li>
                            <a href="#" class="flex items-center justify-between text-gray-700 hover:text-indigo-600 transition">
                                <span>Men's</span>
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2 py-1 rounded-full">32</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between text-gray-700 hover:text-indigo-600 transition">
                                <span>Women's</span>
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2 py-1 rounded-full">28</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between text-gray-700 hover:text-indigo-600 transition">
                                <span>Kids</span>
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2 py-1 rounded-full">15</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between text-gray-700 hover:text-indigo-600 transition">
                                <span>Accessories</span>
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2 py-1 rounded-full">10</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-indigo-600 hover:text-indigo-700 transition text-sm font-medium">View all <i class="fas fa-arrow-right ml-1"></i></a>
                        </li>
                    </ul>
                </div>
                
                <!-- Category Group 3: Home & Kitchen -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-home text-indigo-600"></i>
                        </div>
                        <h3 class="text-lg font-bold">Home & Kitchen</h3>
                    </div>
                    <ul class="space-y-2">
                        <li>
                            <a href="#" class="flex items-center justify-between text-gray-700 hover:text-indigo-600 transition">
                                <span>Cookware</span>
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2 py-1 rounded-full">18</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between text-gray-700 hover:text-indigo-600 transition">
                                <span>Appliances</span>
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2 py-1 rounded-full">22</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between text-gray-700 hover:text-indigo-600 transition">
                                <span>Furniture</span>
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2 py-1 rounded-full">15</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between text-gray-700 hover:text-indigo-600 transition">
                                <span>Decor</span>
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2 py-1 rounded-full">10</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-indigo-600 hover:text-indigo-700 transition text-sm font-medium">View all <i class="fas fa-arrow-right ml-1"></i></a>
                        </li>
                    </ul>
                </div>
                
                <!-- Category Group 4: Beauty & Personal Care -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-spa text-indigo-600"></i>
                        </div>
                        <h3 class="text-lg font-bold">Beauty & Personal Care</h3>
                    </div>
                    <ul class="space-y-2">
                        <li>
                            <a href="#" class="flex items-center justify-between text-gray-700 hover:text-indigo-600 transition">
                                <span>Skincare</span>
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2 py-1 rounded-full">15</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between text-gray-700 hover:text-indigo-600 transition">
                                <span>Makeup</span>
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2 py-1 rounded-full">12</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between text-gray-700 hover:text-indigo-600 transition">
                                <span>Hair Care</span>
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2 py-1 rounded-full">14</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between text-gray-700 hover:text-indigo-600 transition">
                                <span>Fragrances</span>
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2 py-1 rounded-full">9</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-indigo-600 hover:text-indigo-700 transition text-sm font-medium">View all <i class="fas fa-arrow-right ml-1"></i></a>
                        </li>
                    </ul>
                </div>
                
                <!-- Category Group 5: Sports & Outdoors -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-running text-indigo-600"></i>
                        </div>
                        <h3 class="text-lg font-bold">Sports & Outdoors</h3>
                    </div>
                    <ul class="space-y-2">
                        <li>
                            <a href="#" class="flex items-center justify-between text-gray-700 hover:text-indigo-600 transition">
                                <span>Fitness</span>
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2 py-1 rounded-full">20</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between text-gray-700 hover:text-indigo-600 transition">
                                <span>Outdoor Recreation</span>
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2 py-1 rounded-full">18</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between text-gray-700 hover:text-indigo-600 transition">
                                <span>Team Sports</span>
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2 py-1 rounded-full">15</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between text-gray-700 hover:text-indigo-600 transition">
                                <span>Camping</span>
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2 py-1 rounded-full">12</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-indigo-600 hover:text-indigo-700 transition text-sm font-medium">View all <i class="fas fa-arrow-right ml-1"></i></a>
                        </li>
                    </ul>
                </div>
                
                <!-- Category Group 6: Toys & Games -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-gamepad text-indigo-600"></i>
                        </div>
                        <h3 class="text-lg font-bold">Toys & Games</h3>
                    </div>
                    <ul class="space-y-2">
                        <li>
                            <a href="#" class="flex items-center justify-between text-gray-700 hover:text-indigo-600 transition">
                                <span>Board Games</span>
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2 py-1 rounded-full">14</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between text-gray-700 hover:text-indigo-600 transition">
                                <span>Action Figures</span>
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2 py-1 rounded-full">16</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between text-gray-700 hover:text-indigo-600 transition">
                                <span>Puzzles</span>
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2 py-1 rounded-full">10</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between text-gray-700 hover:text-indigo-600 transition">
                                <span>Educational</span>
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2 py-1 rounded-full">12</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-indigo-600 hover:text-indigo-700 transition text-sm font-medium">View all <i class="fas fa-arrow-right ml-1"></i></a>
                        </li>
                    </ul>
                </div>
                
                <!-- Category Group 7: Books & Media -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-book text-indigo-600"></i>
                        </div>
                        <h3 class="text-lg font-bold">Books & Media</h3>
                    </div>
                    <ul class="space-y-2">
                        <li>
                            <a href="#" class="flex items-center justify-between text-gray-700 hover:text-indigo-600 transition">
                                <span>Fiction</span>
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2 py-1 rounded-full">25</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between text-gray-700 hover:text-indigo-600 transition">
                                <span>Non-Fiction</span>
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2 py-1 rounded-full">22</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between text-gray-700 hover:text-indigo-600 transition">
                                <span>Movies</span>
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2 py-1 rounded-full">18</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between text-gray-700 hover:text-indigo-600 transition">
                                <span>Music</span>
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2 py-1 rounded-full">15</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-indigo-600 hover:text-indigo-700 transition text-sm font-medium">View all <i class="fas fa-arrow-right ml-1"></i></a>
                        </li>
                    </ul>
                </div>
                
                <!-- Category Group 8: Automotive -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-car text-indigo-600"></i>
                        </div>
                        <h3 class="text-lg font-bold">Automotive</h3>
                    </div>
                    <ul class="space-y-2">
                        <li>
                            <a href="#" class="flex items-center justify-between text-gray-700 hover:text-indigo-600 transition">
                                <span>Parts & Accessories</span>
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2 py-1 rounded-full">20</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between text-gray-700 hover:text-indigo-600 transition">
                                <span>Tools & Equipment</span>
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2 py-1 rounded-full">15</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between text-gray-700 hover:text-indigo-600 transition">
                                <span>Car Care</span>
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2 py-1 rounded-full">12</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center justify-between text-gray-700 hover:text-indigo-600 transition">
                                <span>Electronics</span>
                                <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2 py-1 rounded-full">8</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="text-indigo-600 hover:text-indigo-700 transition text-sm font-medium">View all <i class="fas fa-arrow-right ml-1"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- Popular Brands -->
        <div class="mb-12">
            <h2 class="text-2xl font-bold mb-6">Popular Brands</h2>
            
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                <!-- Brand 1 -->
                <div class="bg-white rounded-lg shadow-sm p-6 flex items-center justify-center hover:shadow-md transition">
                    <img src="{{ asset('images/brands/brand1.png') }}" alt="Brand 1" class="max-h-10">
                </div>
                
                <!-- Brand 2 -->
                <div class="bg-white rounded-lg shadow-sm p-6 flex items-center justify-center hover:shadow-md transition">
                    <img src="{{ asset('images/brands/brand2.png') }}" alt="Brand 2" class="max-h-10">
                </div>
                
                <!-- Brand 3 -->
                <div class="bg-white rounded-lg shadow-sm p-6 flex items-center justify-center hover:shadow-md transition">
                    <img src="{{ asset('images/brands/brand3.png') }}" alt="Brand 3" class="max-h-10">
                </div>
                
                <!-- Brand 4 -->
                <div class="bg-white rounded-lg shadow-sm p-6 flex items-center justify-center hover:shadow-md transition">
                    <img src="{{ asset('images/brands/brand4.png') }}" alt="Brand 4" class="max-h-10">
                </div>
                
                <!-- Brand 5 -->
                <div class="bg-white rounded-lg shadow-sm p-6 flex items-center justify-center hover:shadow-md transition">
                    <img src="{{ asset('images/brands/brand5.png') }}" alt="Brand 5" class="max-h-10">
                </div>
                
                <!-- Brand 6 -->
                <div class="bg-white rounded-lg shadow-sm p-6 flex items-center justify-center hover:shadow-md transition">
                    <img src="{{ asset('images/brands/brand6.png') }}" alt="Brand 6" class="max-h-10">
                </div>
            </div>
        </div>
        
        <!-- Call to Action -->
        <div class="bg-indigo-100 rounded-xl p-8 md:p-12">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="mb-6 md:mb-0 md:mr-8">
                    <h3 class="text-2xl font-bold mb-2">Ready to Start Shopping?</h3>
                    <p class="text-gray-700">Browse our full collection and find exactly what you're looking for.</p>
                </div>
                <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4">
                    <a href="{{ route('shop') }}" class="bg-indigo-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-indigo-700 transition text-center">
                        <i class="fas fa-shopping-bag mr-2"></i>
                        <span>Shop All Products</span>
                    </a>
                    <a href="{{ route('contact') }}" class="border border-indigo-600 text-indigo-600 px-6 py-3 rounded-lg font-medium hover:bg-indigo-600 hover:text-white transition text-center">
                        <i class="fas fa-question-circle mr-2"></i>
                        <span>Need Help?</span>
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection
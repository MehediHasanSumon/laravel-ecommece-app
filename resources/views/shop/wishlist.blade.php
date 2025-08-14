@extends('layouts.shop')

@section('title', 'My Wishlist - ShopEase')

@section('content')
    <!-- Breadcrumb -->
    <div class="bg-gray-100 py-3">
        <div class="container mx-auto px-4">
            <div class="flex items-center space-x-2 text-sm">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-indigo-600 transition">Home</a>
                <span class="text-gray-400">/</span>
                <span class="text-indigo-600 font-medium">My Wishlist</span>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <!-- Page Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl md:text-4xl font-bold mb-2">My Wishlist</h1>
            <p class="text-gray-600">You have 4 items in your wishlist</p>
        </div>
        
        <!-- Wishlist Items -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <!-- Wishlist Item 1 -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden group">
                <div class="relative">
                    <img src="{{ asset('images/products/product1.jpg') }}" alt="Product 1" class="w-full h-64 object-cover object-center">
                    <div class="absolute top-2 left-2">
                        <span class="bg-red-500 text-white text-xs font-bold px-2 py-1 rounded">-20%</span>
                    </div>
                    <div class="absolute top-2 right-2">
                        <button class="bg-white p-2 rounded-full text-red-500 hover:text-red-600 transition">
                            <i class="fas fa-heart"></i>
                        </button>
                    </div>
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                        <div class="flex space-x-2">
                            <button class="bg-white text-gray-700 p-2 rounded-full hover:bg-gray-100 transition">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="bg-indigo-600 text-white p-2 rounded-full hover:bg-indigo-700 transition">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-gray-500 text-sm">Electronics</span>
                        <div class="flex text-yellow-400 text-sm">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span class="text-gray-500 ml-1">(4.5)</span>
                        </div>
                    </div>
                    <h3 class="font-medium text-gray-900 mb-2">Wireless Bluetooth Earbuds with Noise Cancellation</h3>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <span class="text-indigo-600 font-bold">$79.99</span>
                            <span class="text-gray-400 line-through ml-2">$99.99</span>
                        </div>
                        <div class="flex space-x-2">
                            <button class="bg-indigo-600 text-white px-3 py-1 rounded-lg text-sm font-medium hover:bg-indigo-700 transition">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Wishlist Item 2 -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden group">
                <div class="relative">
                    <img src="{{ asset('images/products/product2.jpg') }}" alt="Product 2" class="w-full h-64 object-cover object-center">
                    <div class="absolute top-2 right-2">
                        <button class="bg-white p-2 rounded-full text-red-500 hover:text-red-600 transition">
                            <i class="fas fa-heart"></i>
                        </button>
                    </div>
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                        <div class="flex space-x-2">
                            <button class="bg-white text-gray-700 p-2 rounded-full hover:bg-gray-100 transition">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="bg-indigo-600 text-white p-2 rounded-full hover:bg-indigo-700 transition">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-gray-500 text-sm">Home & Kitchen</span>
                        <div class="flex text-yellow-400 text-sm">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span class="text-gray-500 ml-1">(5.0)</span>
                        </div>
                    </div>
                    <h3 class="font-medium text-gray-900 mb-2">Stainless Steel Kitchen Knife Set with Block</h3>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <span class="text-indigo-600 font-bold">$129.99</span>
                        </div>
                        <div class="flex space-x-2">
                            <button class="bg-indigo-600 text-white px-3 py-1 rounded-lg text-sm font-medium hover:bg-indigo-700 transition">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Wishlist Item 3 -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden group">
                <div class="relative">
                    <img src="{{ asset('images/products/product3.jpg') }}" alt="Product 3" class="w-full h-64 object-cover object-center">
                    <div class="absolute top-2 left-2">
                        <span class="bg-green-500 text-white text-xs font-bold px-2 py-1 rounded">New</span>
                    </div>
                    <div class="absolute top-2 right-2">
                        <button class="bg-white p-2 rounded-full text-red-500 hover:text-red-600 transition">
                            <i class="fas fa-heart"></i>
                        </button>
                    </div>
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                        <div class="flex space-x-2">
                            <button class="bg-white text-gray-700 p-2 rounded-full hover:bg-gray-100 transition">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="bg-indigo-600 text-white p-2 rounded-full hover:bg-indigo-700 transition">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-gray-500 text-sm">Clothing</span>
                        <div class="flex text-yellow-400 text-sm">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <span class="text-gray-500 ml-1">(4.0)</span>
                        </div>
                    </div>
                    <h3 class="font-medium text-gray-900 mb-2">Men's Casual Cotton Slim Fit Button-Down Shirt</h3>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <span class="text-indigo-600 font-bold">$45.99</span>
                        </div>
                        <div class="flex space-x-2">
                            <button class="bg-indigo-600 text-white px-3 py-1 rounded-lg text-sm font-medium hover:bg-indigo-700 transition">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Wishlist Item 4 -->
            <div class="bg-white rounded-lg shadow-sm overflow-hidden group">
                <div class="relative">
                    <img src="{{ asset('images/products/product4.jpg') }}" alt="Product 4" class="w-full h-64 object-cover object-center">
                    <div class="absolute top-2 left-2">
                        <span class="bg-red-500 text-white text-xs font-bold px-2 py-1 rounded">-15%</span>
                    </div>
                    <div class="absolute top-2 right-2">
                        <button class="bg-white p-2 rounded-full text-red-500 hover:text-red-600 transition">
                            <i class="fas fa-heart"></i>
                        </button>
                    </div>
                    <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                        <div class="flex space-x-2">
                            <button class="bg-white text-gray-700 p-2 rounded-full hover:bg-gray-100 transition">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="bg-indigo-600 text-white p-2 rounded-full hover:bg-indigo-700 transition">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    <div class="flex items-center justify-between mb-2">
                        <span class="text-gray-500 text-sm">Beauty & Personal Care</span>
                        <div class="flex text-yellow-400 text-sm">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                            <span class="text-gray-500 ml-1">(3.5)</span>
                        </div>
                    </div>
                    <h3 class="font-medium text-gray-900 mb-2">Facial Cleansing Brush Set</h3>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center">
                            <span class="text-indigo-600 font-bold">$33.99</span>
                            <span class="text-gray-400 line-through ml-2">$39.99</span>
                        </div>
                        <div class="flex space-x-2">
                            <button class="bg-indigo-600 text-white px-3 py-1 rounded-lg text-sm font-medium hover:bg-indigo-700 transition">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Empty Wishlist State (Hidden by default) -->
        <div class="hidden text-center py-12">
            <div class="inline-flex items-center justify-center w-24 h-24 bg-gray-100 rounded-full mb-6">
                <i class="far fa-heart text-4xl text-gray-400"></i>
            </div>
            <h2 class="text-2xl font-bold mb-2">Your Wishlist is Empty</h2>
            <p class="text-gray-600 mb-6">Save items you love to your wishlist and find them here anytime.</p>
            <a href="{{ route('shop') }}" class="bg-indigo-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-indigo-700 transition inline-block">
                Start Shopping
            </a>
        </div>
    </main>
@endsection
@extends('layouts.shop')

@section('title', 'Shopping Cart - ShopEase')

@section('content')
    <!-- Breadcrumb -->
    <div class="bg-gray-100 py-3">
        <div class="container mx-auto px-4">
            <div class="flex items-center space-x-2 text-sm">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-indigo-600 transition">Home</a>
                <span class="text-gray-400">/</span>
                <span class="text-indigo-600 font-medium">Shopping Cart</span>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <!-- Page Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl md:text-4xl font-bold mb-2">Your Shopping Cart</h1>
            <p class="text-gray-600">You have 3 items in your cart</p>
        </div>
        
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Cart Items -->
            <div class="lg:w-2/3">
                <div class="bg-white rounded-lg shadow-sm overflow-hidden mb-6">
                    <div class="p-4 border-b">
                        <h2 class="text-lg font-bold">Cart Items</h2>
                    </div>
                    
                    <!-- Cart Item 1 -->
                    <div class="p-4 border-b flex flex-col sm:flex-row items-center sm:items-start gap-4">
                        <div class="w-24 h-24 flex-shrink-0">
                            <img src="{{ asset('images/products/product1.jpg') }}" alt="Product 1" class="w-full h-full object-cover object-center rounded">
                        </div>
                        <div class="flex-grow text-center sm:text-left">
                            <h3 class="font-medium text-gray-900 mb-1">Wireless Bluetooth Earbuds with Noise Cancellation</h3>
                            <p class="text-gray-500 text-sm mb-2">Electronics | Color: Black</p>
                            <div class="flex items-center justify-center sm:justify-start text-sm text-gray-500 mb-2">
                                <span>Sold by: </span>
                                <a href="#" class="text-indigo-600 hover:text-indigo-700 transition ml-1">TechGadgets</a>
                            </div>
                            <div class="flex items-center justify-center sm:justify-start space-x-4">
                                <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden">
                                    <button class="px-3 py-1 bg-gray-100 text-gray-600 hover:bg-gray-200 transition">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <input type="number" value="1" min="1" class="w-12 text-center border-0 focus:ring-0">
                                    <button class="px-3 py-1 bg-gray-100 text-gray-600 hover:bg-gray-200 transition">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <button class="text-gray-400 hover:text-red-500 transition">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-indigo-600 font-bold mb-1">$79.99</p>
                            <p class="text-gray-400 line-through text-sm">$99.99</p>
                        </div>
                    </div>
                    
                    <!-- Cart Item 2 -->
                    <div class="p-4 border-b flex flex-col sm:flex-row items-center sm:items-start gap-4">
                        <div class="w-24 h-24 flex-shrink-0">
                            <img src="{{ asset('images/products/product2.jpg') }}" alt="Product 2" class="w-full h-full object-cover object-center rounded">
                        </div>
                        <div class="flex-grow text-center sm:text-left">
                            <h3 class="font-medium text-gray-900 mb-1">Men's Casual Cotton Slim Fit Button-Down Shirt</h3>
                            <p class="text-gray-500 text-sm mb-2">Clothing | Size: M | Color: Blue</p>
                            <div class="flex items-center justify-center sm:justify-start text-sm text-gray-500 mb-2">
                                <span>Sold by: </span>
                                <a href="#" class="text-indigo-600 hover:text-indigo-700 transition ml-1">FashionHub</a>
                            </div>
                            <div class="flex items-center justify-center sm:justify-start space-x-4">
                                <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden">
                                    <button class="px-3 py-1 bg-gray-100 text-gray-600 hover:bg-gray-200 transition">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <input type="number" value="1" min="1" class="w-12 text-center border-0 focus:ring-0">
                                    <button class="px-3 py-1 bg-gray-100 text-gray-600 hover:bg-gray-200 transition">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <button class="text-gray-400 hover:text-red-500 transition">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-indigo-600 font-bold">$45.99</p>
                        </div>
                    </div>
                    
                    <!-- Cart Item 3 -->
                    <div class="p-4 flex flex-col sm:flex-row items-center sm:items-start gap-4">
                        <div class="w-24 h-24 flex-shrink-0">
                            <img src="{{ asset('images/products/product3.jpg') }}" alt="Product 3" class="w-full h-full object-cover object-center rounded">
                        </div>
                        <div class="flex-grow text-center sm:text-left">
                            <h3 class="font-medium text-gray-900 mb-1">Stainless Steel Kitchen Knife Set with Block</h3>
                            <p class="text-gray-500 text-sm mb-2">Home & Kitchen</p>
                            <div class="flex items-center justify-center sm:justify-start text-sm text-gray-500 mb-2">
                                <span>Sold by: </span>
                                <a href="#" class="text-indigo-600 hover:text-indigo-700 transition ml-1">KitchenPro</a>
                            </div>
                            <div class="flex items-center justify-center sm:justify-start space-x-4">
                                <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden">
                                    <button class="px-3 py-1 bg-gray-100 text-gray-600 hover:bg-gray-200 transition">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <input type="number" value="1" min="1" class="w-12 text-center border-0 focus:ring-0">
                                    <button class="px-3 py-1 bg-gray-100 text-gray-600 hover:bg-gray-200 transition">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <button class="text-gray-400 hover:text-red-500 transition">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-indigo-600 font-bold">$129.99</p>
                        </div>
                    </div>
                </div>
                
                <!-- Cart Actions -->
                <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('shop') }}" class="flex items-center text-indigo-600 hover:text-indigo-700 transition">
                            <i class="fas fa-arrow-left mr-2"></i>
                            <span>Continue Shopping</span>
                        </a>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button class="border border-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-50 transition">
                            <i class="fas fa-sync-alt mr-2"></i>
                            <span>Update Cart</span>
                        </button>
                        <button class="border border-red-300 text-red-600 px-4 py-2 rounded-lg hover:bg-red-50 transition">
                            <i class="fas fa-trash-alt mr-2"></i>
                            <span>Clear Cart</span>
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Order Summary -->
            <div class="lg:w-1/3">
                <div class="bg-white rounded-lg shadow-sm overflow-hidden sticky top-6">
                    <div class="p-4 border-b">
                        <h2 class="text-lg font-bold">Order Summary</h2>
                    </div>
                    <div class="p-4">
                        <div class="space-y-3 mb-4">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Subtotal (3 items)</span>
                                <span class="font-medium">$255.97</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Discount</span>
                                <span class="font-medium text-green-600">-$20.00</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Shipping</span>
                                <span class="font-medium">$8.99</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Tax</span>
                                <span class="font-medium">$19.60</span>
                            </div>
                            <div class="border-t pt-3 mt-3">
                                <div class="flex justify-between font-bold">
                                    <span>Total</span>
                                    <span class="text-indigo-600">$264.56</span>
                                </div>
                                <p class="text-gray-500 text-xs mt-1">Including VAT</p>
                            </div>
                        </div>
                        
                        <!-- Coupon Code -->
                        <div class="mb-4">
                            <label for="coupon" class="block text-gray-700 font-medium mb-2">Apply Coupon Code</label>
                            <div class="flex">
                                <input type="text" id="coupon" class="flex-grow border border-gray-300 rounded-l-lg px-4 py-2 focus:outline-none focus:border-indigo-500" placeholder="Enter coupon code">
                                <button class="bg-indigo-600 text-white px-4 py-2 rounded-r-lg font-medium hover:bg-indigo-700 transition">Apply</button>
                            </div>
                        </div>
                        
                        <!-- Checkout Button -->
                        <button class="w-full bg-indigo-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-indigo-700 transition mb-3">
                            <i class="fas fa-lock mr-2"></i>
                            <span>Proceed to Checkout</span>
                        </button>
                        
                        <!-- Payment Methods -->
                        <div class="flex justify-center space-x-2 text-gray-400">
                            <i class="fab fa-cc-visa text-xl"></i>
                            <i class="fab fa-cc-mastercard text-xl"></i>
                            <i class="fab fa-cc-amex text-xl"></i>
                            <i class="fab fa-cc-paypal text-xl"></i>
                            <i class="fab fa-cc-apple-pay text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- You May Also Like -->
        <div class="mt-12">
            <h2 class="text-2xl font-bold mb-6">You May Also Like</h2>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Product 1 -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden group">
                    <div class="relative">
                        <img src="{{ asset('images/products/related1.jpg') }}" alt="Related Product 1" class="w-full h-48 object-cover object-center">
                        <div class="absolute top-2 right-2">
                            <button class="bg-white p-2 rounded-full text-gray-400 hover:text-red-500 transition">
                                <i class="far fa-heart"></i>
                            </button>
                        </div>
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                            <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-indigo-700 transition">
                                <i class="fas fa-shopping-cart mr-1"></i> Add to Cart
                            </button>
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
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                        <h3 class="font-medium text-gray-900 mb-2">Portable Bluetooth Speaker</h3>
                        <div class="flex items-center justify-between">
                            <span class="text-indigo-600 font-bold">$49.99</span>
                            <button class="bg-indigo-100 p-2 rounded-full text-indigo-600 hover:bg-indigo-200 transition">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Product 2 -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden group">
                    <div class="relative">
                        <img src="{{ asset('images/products/related2.jpg') }}" alt="Related Product 2" class="w-full h-48 object-cover object-center">
                        <div class="absolute top-2 left-2">
                            <span class="bg-red-500 text-white text-xs font-bold px-2 py-1 rounded">-15%</span>
                        </div>
                        <div class="absolute top-2 right-2">
                            <button class="bg-white p-2 rounded-full text-gray-400 hover:text-red-500 transition">
                                <i class="far fa-heart"></i>
                            </button>
                        </div>
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                            <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-indigo-700 transition">
                                <i class="fas fa-shopping-cart mr-1"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-gray-500 text-sm">Home & Kitchen</span>
                            <div class="flex text-yellow-400 text-sm">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                        <h3 class="font-medium text-gray-900 mb-2">Coffee Maker with Grinder</h3>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <span class="text-indigo-600 font-bold">$84.99</span>
                                <span class="text-gray-400 line-through ml-2">$99.99</span>
                            </div>
                            <button class="bg-indigo-100 p-2 rounded-full text-indigo-600 hover:bg-indigo-200 transition">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Product 3 -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden group">
                    <div class="relative">
                        <img src="{{ asset('images/products/related3.jpg') }}" alt="Related Product 3" class="w-full h-48 object-cover object-center">
                        <div class="absolute top-2 right-2">
                            <button class="bg-white p-2 rounded-full text-gray-400 hover:text-red-500 transition">
                                <i class="far fa-heart"></i>
                            </button>
                        </div>
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                            <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-indigo-700 transition">
                                <i class="fas fa-shopping-cart mr-1"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="flex items-center justify-between mb-2">
                            <span class="text-gray-500 text-sm">Beauty & Personal Care</span>
                            <div class="flex text-yellow-400 text-sm">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        <h3 class="font-medium text-gray-900 mb-2">Facial Cleansing Brush Set</h3>
                        <div class="flex items-center justify-between">
                            <span class="text-indigo-600 font-bold">$39.99</span>
                            <button class="bg-indigo-100 p-2 rounded-full text-indigo-600 hover:bg-indigo-200 transition">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Product 4 -->
                <div class="bg-white rounded-lg shadow-sm overflow-hidden group">
                    <div class="relative">
                        <img src="{{ asset('images/products/related4.jpg') }}" alt="Related Product 4" class="w-full h-48 object-cover object-center">
                        <div class="absolute top-2 left-2">
                            <span class="bg-green-500 text-white text-xs font-bold px-2 py-1 rounded">New</span>
                        </div>
                        <div class="absolute top-2 right-2">
                            <button class="bg-white p-2 rounded-full text-gray-400 hover:text-red-500 transition">
                                <i class="far fa-heart"></i>
                            </button>
                        </div>
                        <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                            <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-indigo-700 transition">
                                <i class="fas fa-shopping-cart mr-1"></i> Add to Cart
                            </button>
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
                            </div>
                        </div>
                        <h3 class="font-medium text-gray-900 mb-2">Unisex Cotton Baseball Cap</h3>
                        <div class="flex items-center justify-between">
                            <span class="text-indigo-600 font-bold">$24.99</span>
                            <button class="bg-indigo-100 p-2 rounded-full text-indigo-600 hover:bg-indigo-200 transition">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
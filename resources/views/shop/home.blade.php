@extends('layouts.shop')

@section('title', 'ShopEase - Your One-Stop Shopping Destination')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-indigo-600 to-purple-600 text-white py-20">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="20" height="20" xmlns="http://www.w3.org/2000/svg"%3E%3Cpath d="M0 0h20v20H0z" fill="none"%3E%3C/path%3E%3Cpath d="M10 10l5-5M10 10l-5 5M10 10l5 5M10 10l-5-5" stroke="%23fff" stroke-width=".5"%3E%3C/path%3E%3C/svg%3E'); background-size: 20px 20px;"></div>
        </div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-8 md:mb-0 animate-slide-up">
                    <span class="inline-block bg-white bg-opacity-20 text-white px-4 py-1 rounded-full text-sm font-semibold mb-4">Limited Time Offer</span>
                    <h1 class="text-4xl md:text-6xl font-bold mb-4 leading-tight">Summer Collection <span class="text-yellow-300">{{ date('Y') }}</span></h1>
                    <p class="text-xl mb-6 text-indigo-100">Discover the season's hottest styles with up to 50% off on selected items.</p>
                    <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4">
                        <a href="{{ route('shop') }}" class="bg-white text-indigo-600 px-8 py-4 rounded-lg font-semibold hover:bg-gray-100 transition transform hover:scale-105 shadow-lg flex items-center justify-center">
                            <span>Shop Now</span>
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                        <a href="{{ route('deals') }}" class="border-2 border-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-indigo-600 transition transform hover:scale-105 flex items-center justify-center">
                            <i class="fas fa-tag mr-2"></i>
                            <span>View Deals</span>
                        </a>
                    </div>
                    <div class="mt-8 flex items-center">
                        <div class="flex -space-x-2">
                            <img src="https://randomuser.me/api/portraits/women/17.jpg" alt="Customer" class="w-10 h-10 rounded-full border-2 border-white">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Customer" class="w-10 h-10 rounded-full border-2 border-white">
                            <img src="https://randomuser.me/api/portraits/women/23.jpg" alt="Customer" class="w-10 h-10 rounded-full border-2 border-white">
                        </div>
                        <div class="ml-4">
                            <div class="flex text-yellow-300">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <p class="text-sm">Trusted by 10,000+ happy customers</p>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2 relative animate-fade-in">
                    <img src="/images/hero-banner.svg" alt="Summer Sale" class="rounded-2xl shadow-2xl w-full transform hover:scale-105 transition duration-500">
                    <div class="absolute -bottom-5 -left-5 bg-yellow-400 text-indigo-900 rounded-lg py-2 px-4 font-bold shadow-lg animate-pulse">
                        <span class="text-2xl">50%</span>
                        <span class="text-lg">OFF</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0 h-16 bg-gradient-to-t from-gray-50 to-transparent"></div>
    </section>

    <!-- Featured Categories -->
    <section class="py-16 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <span class="inline-block px-3 py-1 bg-indigo-100 text-indigo-600 rounded-full text-sm font-semibold mb-3">DISCOVER</span>
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Shop by Category</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Explore our wide range of products across various categories tailored to meet your everyday needs with style and quality.</p>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                <a href="{{ route('categories') }}?category=electronics" class="group">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden transition transform group-hover:scale-105 border border-gray-100 h-full">
                        <div class="h-48 bg-gradient-to-br from-blue-50 to-indigo-100 flex items-center justify-center relative overflow-hidden">
                            <div class="absolute inset-0 bg-indigo-500 opacity-0 group-hover:opacity-10 transition-opacity"></div>
                            <i class="fas fa-laptop text-6xl text-indigo-500 transform group-hover:scale-110 transition-transform duration-300"></i>
                        </div>
                        <div class="p-6 text-center">
                            <h3 class="font-bold text-xl mb-2 text-gray-800 group-hover:text-indigo-600 transition">Electronics</h3>
                            <p class="text-gray-600">Latest gadgets and tech accessories for your digital lifestyle</p>
                            <div class="mt-4 inline-flex items-center text-indigo-600 font-medium">
                                <span>Shop Now</span>
                                <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-2 transition-transform"></i>
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('categories') }}?category=fashion" class="group">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden transition transform group-hover:scale-105 border border-gray-100 h-full">
                        <div class="h-48 bg-gradient-to-br from-pink-50 to-purple-100 flex items-center justify-center relative overflow-hidden">
                            <div class="absolute inset-0 bg-purple-500 opacity-0 group-hover:opacity-10 transition-opacity"></div>
                            <i class="fas fa-tshirt text-6xl text-purple-500 transform group-hover:scale-110 transition-transform duration-300"></i>
                        </div>
                        <div class="p-6 text-center">
                            <h3 class="font-bold text-xl mb-2 text-gray-800 group-hover:text-purple-600 transition">Fashion</h3>
                            <p class="text-gray-600">Trendy clothing, accessories, and footwear for every season</p>
                            <div class="mt-4 inline-flex items-center text-purple-600 font-medium">
                                <span>Shop Now</span>
                                <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-2 transition-transform"></i>
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('categories') }}?category=home" class="group">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden transition transform group-hover:scale-105 border border-gray-100 h-full">
                        <div class="h-48 bg-gradient-to-br from-green-50 to-teal-100 flex items-center justify-center relative overflow-hidden">
                            <div class="absolute inset-0 bg-teal-500 opacity-0 group-hover:opacity-10 transition-opacity"></div>
                            <i class="fas fa-home text-6xl text-teal-500 transform group-hover:scale-110 transition-transform duration-300"></i>
                        </div>
                        <div class="p-6 text-center">
                            <h3 class="font-bold text-xl mb-2 text-gray-800 group-hover:text-teal-600 transition">Home & Living</h3>
                            <p class="text-gray-600">Beautiful decor, furniture, and essentials for your living space</p>
                            <div class="mt-4 inline-flex items-center text-teal-600 font-medium">
                                <span>Shop Now</span>
                                <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-2 transition-transform"></i>
                            </div>
                        </div>
                    </div>
                </a>
                
                <a href="{{ route('categories') }}?category=beauty" class="group">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden transition transform group-hover:scale-105 border border-gray-100 h-full">
                        <div class="h-48 bg-gradient-to-br from-yellow-50 to-amber-100 flex items-center justify-center relative overflow-hidden">
                            <div class="absolute inset-0 bg-amber-500 opacity-0 group-hover:opacity-10 transition-opacity"></div>
                            <i class="fas fa-spa text-6xl text-amber-500 transform group-hover:scale-110 transition-transform duration-300"></i>
                        </div>
                        <div class="p-6 text-center">
                            <h3 class="font-bold text-xl mb-2 text-gray-800 group-hover:text-amber-600 transition">Beauty</h3>
                            <p class="text-gray-600">Premium skincare, makeup, and personal care products</p>
                            <div class="mt-4 inline-flex items-center text-amber-600 font-medium">
                                <span>Shop Now</span>
                                <i class="fas fa-arrow-right ml-2 transform group-hover:translate-x-2 transition-transform"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            
            <div class="mt-12 text-center">
                <a href="{{ route('categories') }}" class="inline-flex items-center justify-center px-8 py-3 border border-indigo-600 text-indigo-600 bg-white rounded-lg font-semibold hover:bg-indigo-600 hover:text-white transition duration-300 shadow-md">
                    <span>View All Categories</span>
                    <i class="fas fa-th-large ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Trending Products -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <span class="inline-block px-3 py-1 bg-indigo-100 text-indigo-600 rounded-full text-sm font-semibold mb-3">POPULAR CHOICES</span>
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Trending Products</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Discover our most popular items that customers are loving right now. Updated weekly based on sales and reviews.</p>
            </div>
            
            <div class="flex justify-between items-center mb-8">
                <div class="flex space-x-2 overflow-x-auto pb-2">
                    <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-indigo-700 transition whitespace-nowrap">All</button>
                    <button class="bg-white text-gray-700 px-4 py-2 rounded-lg font-medium hover:bg-gray-100 transition whitespace-nowrap">New Arrivals</button>
                    <button class="bg-white text-gray-700 px-4 py-2 rounded-lg font-medium hover:bg-gray-100 transition whitespace-nowrap">Best Sellers</button>
                    <button class="bg-white text-gray-700 px-4 py-2 rounded-lg font-medium hover:bg-gray-100 transition whitespace-nowrap">Featured</button>
                </div>
                <a href="{{ route('shop') }}" class="text-indigo-600 hover:text-indigo-800 font-semibold flex items-center whitespace-nowrap">
                    <span>View All</span>
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                <!-- Product Card 1 -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden group hover:shadow-xl transition-all duration-300 border border-gray-100">
                    <div class="relative">
                        <img src="/images/product-placeholder.svg" alt="Wireless Earbuds" class="w-full h-64 object-cover transform group-hover:scale-105 transition duration-500">
                        <div class="absolute top-3 left-3 bg-red-500 text-white font-bold px-3 py-1 rounded-full shadow-md">
                            <span class="text-sm">20% OFF</span>
                        </div>
                        <div class="absolute top-3 right-3">
                            <button class="bg-white p-2 rounded-full shadow-md hover:bg-indigo-500 hover:text-white transition">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                        <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center space-x-3">
                            <button class="bg-white p-3 rounded-full shadow-md hover:bg-indigo-500 hover:text-white transition transform hover:scale-110">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="bg-indigo-600 p-3 rounded-full shadow-md hover:bg-indigo-700 text-white transition transform hover:scale-110">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                        <div class="absolute bottom-3 left-3 bg-yellow-400 text-xs font-bold px-2 py-1 rounded-full flex items-center">
                            <i class="fas fa-bolt mr-1"></i>
                            <span>TRENDING</span>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-xs font-medium text-indigo-600 bg-indigo-50 px-2 py-1 rounded">Electronics</span>
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span class="text-gray-500 text-sm ml-1">(42)</span>
                            </div>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-gray-800 group-hover:text-indigo-600 transition">Wireless Earbuds Pro</h3>
                        <p class="text-gray-600 mb-4">Premium sound quality with active noise cancellation and 24-hour battery life.</p>
                        <div class="flex justify-between items-center">
                            <div class="flex flex-col">
                                <span class="text-gray-400 line-through text-sm">$129.99</span>
                                <span class="text-indigo-600 font-bold text-xl">$99.99</span>
                            </div>
                            <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition flex items-center">
                                <i class="fas fa-shopping-cart mr-2"></i>
                                <span>Add to Cart</span>
                            </button>
                        </div>
                        <div class="mt-4 text-sm text-gray-500 flex items-center">
                            <i class="fas fa-truck mr-2"></i>
                            <span>Free shipping</span>
                            <span class="mx-2">•</span>
                            <i class="fas fa-box-open mr-2"></i>
                            <span>In stock</span>
                        </div>
                    </div>
                </div>
                
                <!-- Product Card 2 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden group">
                    <div class="relative">
                        <img src="/images/product-placeholder.svg" alt="Smart Watch" class="w-full h-64 object-cover">
                        <div class="absolute top-2 right-2 bg-green-500 text-white text-xs font-bold px-2 py-1 rounded">NEW</div>
                        <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center space-x-2">
                            <button class="bg-white p-2 rounded-full hover:bg-indigo-500 hover:text-white transition">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="bg-white p-2 rounded-full hover:bg-indigo-500 hover:text-white transition">
                                <i class="fas fa-heart"></i>
                            </button>
                            <button class="bg-white p-2 rounded-full hover:bg-indigo-500 hover:text-white transition">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="text-gray-500 text-sm ml-2">(87)</span>
                        </div>
                        <h3 class="font-semibold text-lg mb-1">Smart Watch Series 5</h3>
                        <p class="text-gray-600 text-sm mb-2">Health tracking & notifications</p>
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-indigo-600 font-bold">$199.99</span>
                            </div>
                            <button class="bg-indigo-600 text-white p-2 rounded-full hover:bg-indigo-700 transition">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Product Card 3 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden group">
                    <div class="relative">
                        <img src="/images/product-placeholder.svg" alt="Laptop Backpack" class="w-full h-64 object-cover">
                        <div class="absolute top-2 right-2 bg-orange-500 text-white text-xs font-bold px-2 py-1 rounded">HOT</div>
                        <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center space-x-2">
                            <button class="bg-white p-2 rounded-full hover:bg-indigo-500 hover:text-white transition">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="bg-white p-2 rounded-full hover:bg-indigo-500 hover:text-white transition">
                                <i class="fas fa-heart"></i>
                            </button>
                            <button class="bg-white p-2 rounded-full hover:bg-indigo-500 hover:text-white transition">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <span class="text-gray-500 text-sm ml-2">(35)</span>
                        </div>
                        <h3 class="font-semibold text-lg mb-1">Premium Laptop Backpack</h3>
                        <p class="text-gray-600 text-sm mb-2">Water-resistant with USB port</p>
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-gray-400 line-through">$89.99</span>
                                <span class="text-indigo-600 font-bold ml-2">$69.99</span>
                            </div>
                            <button class="bg-indigo-600 text-white p-2 rounded-full hover:bg-indigo-700 transition">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Product Card 4 -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden group">
                    <div class="relative">
                        <img src="/images/product-placeholder.svg" alt="Bluetooth Speaker" class="w-full h-64 object-cover">
                        <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center space-x-2">
                            <button class="bg-white p-2 rounded-full hover:bg-indigo-500 hover:text-white transition">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="bg-white p-2 rounded-full hover:bg-indigo-500 hover:text-white transition">
                                <i class="fas fa-heart"></i>
                            </button>
                            <button class="bg-white p-2 rounded-full hover:bg-indigo-500 hover:text-white transition">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                    <div class="p-4">
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <span class="text-gray-500 text-sm ml-2">(124)</span>
                        </div>
                        <h3 class="font-semibold text-lg mb-1">Portable Bluetooth Speaker</h3>
                        <p class="text-gray-600 text-sm mb-2">Waterproof with 20hr battery</p>
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-indigo-600 font-bold">$79.99</span>
                            </div>
                            <button class="bg-indigo-600 text-white p-2 rounded-full hover:bg-indigo-700 transition">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <span class="inline-block px-3 py-1 bg-indigo-100 text-indigo-600 rounded-full text-sm font-semibold mb-3">WHY CHOOSE US</span>
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Shopping Made Easy</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">We're committed to providing the best shopping experience with these key benefits.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Feature 1 -->
                <div class="bg-gray-50 rounded-xl p-6 text-center hover:shadow-lg transition duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-truck text-2xl text-indigo-600"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Free Shipping</h3>
                    <p class="text-gray-600">Free shipping on all orders over $50. Fast delivery to your doorstep.</p>
                </div>
                
                <!-- Feature 2 -->
                <div class="bg-gray-50 rounded-xl p-6 text-center hover:shadow-lg transition duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-undo text-2xl text-indigo-600"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Easy Returns</h3>
                    <p class="text-gray-600">30-day return policy. No questions asked, hassle-free returns.</p>
                </div>
                
                <!-- Feature 3 -->
                <div class="bg-gray-50 rounded-xl p-6 text-center hover:shadow-lg transition duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-shield-alt text-2xl text-indigo-600"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Secure Payments</h3>
                    <p class="text-gray-600">Multiple secure payment options. Your data is always protected.</p>
                </div>
                
                <!-- Feature 4 -->
                <div class="bg-gray-50 rounded-xl p-6 text-center hover:shadow-lg transition duration-300 transform hover:-translate-y-2">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-headset text-2xl text-indigo-600"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">24/7 Support</h3>
                    <p class="text-gray-600">Our customer service team is available around the clock to assist you.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Flash Sale Section -->
    <section class="py-16 bg-gradient-to-r from-red-500 to-pink-500 text-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <span class="inline-block px-3 py-1 bg-white text-red-600 rounded-full text-sm font-semibold mb-3">LIMITED TIME OFFER</span>
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Flash Sale</h2>
                <p class="text-white max-w-2xl mx-auto">Grab these deals before they're gone! Limited stock available at incredible prices.</p>
                
                <!-- Countdown Timer -->
                <div class="flex justify-center space-x-4 mt-6">
                    <div class="bg-white bg-opacity-20 rounded-lg p-3 w-20">
                        <div class="text-2xl font-bold" id="days">00</div>
                        <div class="text-xs">Days</div>
                    </div>
                    <div class="bg-white bg-opacity-20 rounded-lg p-3 w-20">
                        <div class="text-2xl font-bold" id="hours">00</div>
                        <div class="text-xs">Hours</div>
                    </div>
                    <div class="bg-white bg-opacity-20 rounded-lg p-3 w-20">
                        <div class="text-2xl font-bold" id="minutes">00</div>
                        <div class="text-xs">Minutes</div>
                    </div>
                    <div class="bg-white bg-opacity-20 rounded-lg p-3 w-20">
                        <div class="text-2xl font-bold" id="seconds">00</div>
                        <div class="text-xs">Seconds</div>
                    </div>
                </div>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($flashSaleProducts as $product)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden group hover:shadow-xl transition-all duration-300 text-gray-800">
                    <div class="relative">
                        <img src="{{ $product->image ? asset('uploads/products/' . $product->image) : '/images/product-placeholder.svg' }}" 
                             alt="{{ $product->name }}" 
                             class="w-full h-64 object-cover transform group-hover:scale-105 transition duration-500">
                        <div class="absolute top-3 left-3 bg-red-500 text-white font-bold px-3 py-1 rounded-full shadow-md animate-pulse">
                            @if($product->discounts->isNotEmpty())
                                @php
                                    $discount = $product->discounts->first();
                                    $discountValue = $discount->type === 'percentage' 
                                        ? $discount->value . '%' 
                                        : '$' . number_format($discount->value, 2);
                                @endphp
                                <span class="text-sm">{{ $discountValue }} OFF</span>
                            @else
                                <span class="text-sm">SALE</span>
                            @endif
                        </div>
                        <div class="absolute top-3 right-3">
                            <button class="bg-white p-2 rounded-full shadow-md hover:bg-red-500 hover:text-white transition">
                                <i class="fas fa-heart"></i>
                            </button>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-xs font-medium text-red-600 bg-red-50 px-2 py-1 rounded">{{ $product->category->name }}</span>
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-gray-800 group-hover:text-red-600 transition">{{ $product->name }}</h3>
                        <p class="text-gray-600 mb-4">{{ $product->short_description }}</p>
                        <div class="flex justify-between items-center">
                            <div class="flex flex-col">
                                <span class="text-gray-400 line-through text-sm">${{ number_format($product->price, 2) }}</span>
                                <span class="text-red-600 font-bold text-xl">${{ number_format($product->sale_price, 2) }}</span>
                            </div>
                            <button class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 transition flex items-center">
                                <i class="fas fa-shopping-cart mr-2"></i>
                                <span>Add to Cart</span>
                            </button>
                        </div>
                        <div class="mt-4 text-sm text-gray-500">
                            <div class="flex items-center">
                                <i class="fas fa-fire text-red-500 mr-2"></i>
                                <span>Selling fast! Limited stock available</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            
            <div class="mt-12 text-center">
                <a href="{{ route('deals') }}" class="inline-flex items-center justify-center px-8 py-3 border-2 border-white text-white bg-transparent rounded-lg font-semibold hover:bg-white hover:text-red-600 transition duration-300 shadow-md">
                    <span>View All Deals</span>
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Personalized Recommendations -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <span class="inline-block px-3 py-1 bg-indigo-100 text-indigo-600 rounded-full text-sm font-semibold mb-3">JUST FOR YOU</span>
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Recommended For You</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Based on your browsing history and preferences, we think you'll love these products.</p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                @foreach($recommendedProducts as $product)
                <div class="bg-white rounded-xl shadow-md overflow-hidden group hover:shadow-xl transition-all duration-300 border border-gray-100">
                    <div class="relative">
                        <img src="{{ $product->image ? asset('uploads/products/' . $product->image) : '/images/product-placeholder.svg' }}" 
                             alt="{{ $product->name }}" 
                             class="w-full h-64 object-cover transform group-hover:scale-105 transition duration-500">
                        <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center space-x-3">
                            <button class="bg-white p-3 rounded-full shadow-md hover:bg-indigo-500 hover:text-white transition transform hover:scale-110">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button class="bg-indigo-600 p-3 rounded-full shadow-md hover:bg-indigo-700 text-white transition transform hover:scale-110">
                                <i class="fas fa-shopping-cart"></i>
                            </button>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="flex justify-between items-center mb-3">
                            <span class="text-xs font-medium text-indigo-600 bg-indigo-50 px-2 py-1 rounded">{{ $product->category->name }}</span>
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                        <h3 class="font-bold text-xl mb-2 text-gray-800 group-hover:text-indigo-600 transition">{{ $product->name }}</h3>
                        <p class="text-gray-600 mb-4">{{ $product->short_description }}</p>
                        <div class="flex justify-between items-center">
                            <div class="flex flex-col">
                                @if($product->sale_price < $product->price)
                                <span class="text-gray-400 line-through text-sm">${{ number_format($product->price, 2) }}</span>
                                <span class="text-indigo-600 font-bold text-xl">${{ number_format($product->sale_price, 2) }}</span>
                                @else
                                <span class="text-indigo-600 font-bold text-xl">${{ number_format($product->price, 2) }}</span>
                                @endif
                            </div>
                            <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition flex items-center">
                                <i class="fas fa-shopping-cart mr-2"></i>
                                <span>Add to Cart</span>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Newsletter Signup -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 rounded-2xl shadow-xl overflow-hidden">
                <div class="flex flex-col md:flex-row items-center">
                    <div class="md:w-1/2 p-12">
                        <span class="inline-block px-3 py-1 bg-white text-indigo-600 rounded-full text-sm font-semibold mb-3">STAY UPDATED</span>
                        <h2 class="text-3xl md:text-4xl font-bold mb-4 text-white">Subscribe to Our Newsletter</h2>
                        <p class="text-indigo-100 mb-8">Get the latest updates on new products, special offers, and exclusive content straight to your inbox.</p>
                        
                        <form action="#" method="POST" class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-3">
                            @csrf
                            <input type="email" name="email" placeholder="Your email address" required 
                                   class="flex-1 px-4 py-3 rounded-lg focus:outline-none focus:ring-2 focus:ring-white">
                            <button type="submit" class="bg-white text-indigo-600 px-6 py-3 rounded-lg font-semibold hover:bg-indigo-50 transition shadow-lg">
                                Subscribe
                            </button>
                        </form>
                        
                        <p class="text-indigo-200 text-sm mt-4">
                            <i class="fas fa-shield-alt mr-2"></i>
                            We respect your privacy. Unsubscribe at any time.
                        </p>
                    </div>
                    <div class="md:w-1/2 p-12 hidden md:block">
                        <div class="relative">
                            <div class="absolute top-0 right-0 -mt-16 -mr-16 bg-purple-500 bg-opacity-30 rounded-full w-64 h-64"></div>
                            <div class="absolute bottom-0 right-0 -mb-16 -mr-16 bg-indigo-500 bg-opacity-30 rounded-full w-64 h-64"></div>
                            <div class="bg-white bg-opacity-10 rounded-xl p-8 backdrop-filter backdrop-blur-sm border border-white border-opacity-20 relative z-10">
                                <div class="flex items-center mb-6">
                                    <img src="https://randomuser.me/api/portraits/women/32.jpg" alt="Customer" class="w-12 h-12 rounded-full mr-4">
                                    <div>
                                        <h4 class="text-white font-semibold">Sarah Johnson</h4>
                                        <div class="flex text-yellow-300">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="text-white italic">"I love the weekly newsletter! It helps me stay updated on the latest trends and I've found some amazing deals that I would have missed otherwise."</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Social Media & Trust Badges -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <span class="inline-block px-3 py-1 bg-indigo-100 text-indigo-600 rounded-full text-sm font-semibold mb-3">CONNECT WITH US</span>
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Follow Us on Social Media</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Join our community for exclusive content, giveaways, and behind-the-scenes updates.</p>
                
                <div class="flex justify-center space-x-6 mt-8">
                    <a href="#" class="w-12 h-12 bg-blue-600 text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition transform hover:scale-110">
                        <i class="fab fa-facebook-f text-xl"></i>
                    </a>
                    <a href="#" class="w-12 h-12 bg-pink-600 text-white rounded-full flex items-center justify-center hover:bg-pink-700 transition transform hover:scale-110">
                        <i class="fab fa-instagram text-xl"></i>
                    </a>
                    <a href="#" class="w-12 h-12 bg-sky-500 text-white rounded-full flex items-center justify-center hover:bg-sky-600 transition transform hover:scale-110">
                        <i class="fab fa-twitter text-xl"></i>
                    </a>
                    <a href="#" class="w-12 h-12 bg-red-600 text-white rounded-full flex items-center justify-center hover:bg-red-700 transition transform hover:scale-110">
                        <i class="fab fa-youtube text-xl"></i>
                    </a>
                    <a href="#" class="w-12 h-12 bg-blue-700 text-white rounded-full flex items-center justify-center hover:bg-blue-800 transition transform hover:scale-110">
                        <i class="fab fa-linkedin-in text-xl"></i>
                    </a>
                </div>
            </div>
            
            <div class="mt-16">
                <h3 class="text-xl font-bold text-center mb-8">Trusted By</h3>
                <div class="grid grid-cols-2 md:grid-cols-5 gap-8 items-center">
                    <div class="flex justify-center">
                        <img src="/images/visa.svg" alt="Visa" class="h-10 opacity-70 hover:opacity-100 transition">
                    </div>
                    <div class="flex justify-center">
                        <img src="/images/mastercard.svg" alt="Mastercard" class="h-10 opacity-70 hover:opacity-100 transition">
                    </div>
                    <div class="flex justify-center">
                        <img src="/images/paypal.svg" alt="PayPal" class="h-10 opacity-70 hover:opacity-100 transition">
                    </div>
                    <div class="flex justify-center">
                        <img src="/images/apple-pay.svg" alt="Apple Pay" class="h-10 opacity-70 hover:opacity-100 transition">
                    </div>
                    <div class="flex justify-center">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-shield-alt text-2xl text-gray-400"></i>
                            <span class="text-gray-600 font-semibold">Secure Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script>
    // Add any page-specific JavaScript here
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize countdown timer for flash sale
        const countDownDate = new Date();
        countDownDate.setDate(countDownDate.getDate() + 3); // 3 days from now
        
        const countdown = setInterval(function() {
            const now = new Date().getTime();
            const distance = countDownDate - now;
            
            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
            document.getElementById("days").innerHTML = days.toString().padStart(2, '0');
            document.getElementById("hours").innerHTML = hours.toString().padStart(2, '0');
            document.getElementById("minutes").innerHTML = minutes.toString().padStart(2, '0');
            document.getElementById("seconds").innerHTML = seconds.toString().padStart(2, '0');
            
            if (distance < 0) {
                clearInterval(countdown);
                document.getElementById("days").innerHTML = "00";
                document.getElementById("hours").innerHTML = "00";
                document.getElementById("minutes").innerHTML = "00";
                document.getElementById("seconds").innerHTML = "00";
            }
        }, 1000);
        
        console.log('Home page loaded');
    });
</script>
@endsection
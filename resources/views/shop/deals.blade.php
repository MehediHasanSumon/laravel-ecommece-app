@extends('layouts.shop')

@section('title', 'Special Deals & Offers - ShopEase')

@section('content')
    <!-- Breadcrumb -->
    <div class="bg-gray-100 py-4">
        <div class="container mx-auto px-4">
            <div class="flex items-center space-x-2 text-sm">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-indigo-600 transition">Home</a>
                <span class="text-gray-400">
                    <i class="fas fa-chevron-right"></i>
                </span>
                <span class="text-indigo-600 font-medium">Deals & Offers</span>
            </div>
        </div>
    </div>

    <!-- Hero Banner -->
    <section class="relative py-12 bg-gradient-to-r from-red-600 to-pink-600 overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute inset-0" style="background-image: url('data:image/svg+xml,%3Csvg width="20" height="20" xmlns="http://www.w3.org/2000/svg"%3E%3Cpath d="M0 0h20v20H0z" fill="none"%3E%3C/path%3E%3Cpath d="M10 10l5-5M10 10l-5 5M10 10l5 5M10 10l-5-5" stroke="%23fff" stroke-width=".5"%3E%3C/path%3E%3C/svg%3E'); background-size: 20px 20px;"></div>
        </div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-8 md:mb-0">
                    <span class="inline-block bg-white text-red-600 px-4 py-1 rounded-full text-sm font-semibold mb-4">Limited Time Offers</span>
                    <h1 class="text-4xl md:text-5xl font-bold mb-4 text-white">Flash Sale Up To 70% Off</h1>
                    <p class="text-xl mb-6 text-white opacity-90">Discover incredible savings on top brands and our premium selection. Don't miss these exclusive deals on top brands and must-have products.</p>
                    <div class="flex space-x-4">
                        <a href="#all-deals" class="bg-white text-red-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition shadow-lg">
                            <i class="fas fa-tag mr-2"></i>
                            <span>View All Deals</span>
                        </a>
                    </div>
                </div>
                <div class="md:w-1/2 relative">
                    <img src="/images/deals-banner.svg" alt="Flash Sale" class="w-full rounded-lg shadow-xl">
                    <div class="absolute top-4 right-4 bg-red-600 text-white rounded-full w-20 h-20 flex items-center justify-center font-bold text-xl animate-pulse-slow shadow-lg">70% OFF</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Deal Categories Section -->
    <section class="py-16" id="all-deals">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Shop Deals By Category</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Browse our hottest deals across popular categories and find exactly what you're looking for at unbeatable prices.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Electronics Category -->
                <a href="#electronics-deals" class="group">
                    <div class="bg-blue-100 rounded-xl overflow-hidden shadow-md transition transform group-hover:scale-105 group-hover:shadow-lg">
                        <div class="p-6">
                            <div class="w-16 h-16 bg-blue-500 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-laptop text-white text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-semibold mb-2 group-hover:text-blue-600">Electronics</h3>
                            <p class="text-gray-600 mb-4">Up to 50% off on laptops, smartphones, and more</p>
                            <span class="text-blue-600 font-medium flex items-center">
                                Shop Now
                                <i class="fas fa-arrow-right ml-2 transition transform group-hover:translate-x-2"></i>
                            </span>
                        </div>
                    </div>
                </a>
                
                <!-- Fashion Category -->
                <a href="#fashion-deals" class="group">
                    <div class="bg-pink-100 rounded-xl overflow-hidden shadow-md transition transform group-hover:scale-105 group-hover:shadow-lg">
                        <div class="p-6">
                            <div class="w-16 h-16 bg-pink-500 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-tshirt text-white text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-semibold mb-2 group-hover:text-pink-600">Fashion</h3>
                            <p class="text-gray-600 mb-4">Up to 60% off on clothing, shoes, and accessories</p>
                            <span class="text-pink-600 font-medium flex items-center">
                                Shop Now
                                <i class="fas fa-arrow-right ml-2 transition transform group-hover:translate-x-2"></i>
                            </span>
                        </div>
                    </div>
                </a>
                
                <!-- Home & Kitchen Category -->
                <a href="#home-deals" class="group">
                    <div class="bg-amber-100 rounded-xl overflow-hidden shadow-md transition transform group-hover:scale-105 group-hover:shadow-lg">
                        <div class="p-6">
                            <div class="w-16 h-16 bg-amber-500 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-home text-white text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-semibold mb-2 group-hover:text-amber-600">Home & Kitchen</h3>
                            <p class="text-gray-600 mb-4">Up to 40% off on appliances, decor, and kitchenware</p>
                            <span class="text-amber-600 font-medium flex items-center">
                                Shop Now
                                <i class="fas fa-arrow-right ml-2 transition transform group-hover:translate-x-2"></i>
                            </span>
                        </div>
                    </div>
                </a>
                
                <!-- Beauty Category -->
                <a href="#beauty-deals" class="group">
                    <div class="bg-purple-100 rounded-xl overflow-hidden shadow-md transition transform group-hover:scale-105 group-hover:shadow-lg">
                        <div class="p-6">
                            <div class="w-16 h-16 bg-purple-500 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-spa text-white text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-semibold mb-2 group-hover:text-purple-600">Beauty & Personal Care</h3>
                            <p class="text-gray-600 mb-4">Up to 30% off on skincare, makeup, and fragrances</p>
                            <span class="text-purple-600 font-medium flex items-center">
                                Shop Now
                                <i class="fas fa-arrow-right ml-2 transition transform group-hover:translate-x-2"></i>
                            </span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </section>
    
    <!-- Beauty Deals -->
    <section class="mb-16" id="beauty-deals">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center mb-8">
                <div>
                    <h2 class="text-2xl font-bold mb-2">Beauty & Personal Care Deals</h2>
                    <p class="text-gray-600">Pamper yourself with exclusive deals on premium products</p>
                </div>
                <a href="{{ route('shop') }}" class="mt-4 md:mt-0 flex items-center text-sm font-medium">
                    <i class="fas fa-th-large mr-2"></i>
                    <span class="text-purple-700 font-medium">View All Deals</span>
                </a>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Product 1 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                    <div class="relative">
                        <img src="https://placehold.co/300x300/8B5CF6/FFFFFF?text=Beauty+Product" alt="Beauty Product" class="w-full h-64 object-cover">
                        <div class="absolute top-0 left-0 bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-br-lg">-30%</div>
                        <button class="absolute top-2 right-2 bg-white p-2 rounded-full shadow hover:bg-gray-100 transition">
                            <i class="far fa-heart text-gray-600"></i>
                        </button>
                        <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 hover:opacity-100 transition-opacity duration-300 flex items-center justify-center space-x-2">
                            <a href="#" class="bg-white p-3 rounded-full hover:bg-gray-100 transition">
                                <i class="fas fa-eye text-gray-700"></i>
                            </a>
                            <a href="#" class="bg-indigo-600 p-3 rounded-full hover:bg-indigo-700 transition">
                                <i class="fas fa-shopping-cart text-white"></i>
                            </a>
                        </div>
                    </div>
                    <div class="p-4">
                        <span class="text-xs text-gray-500">Beauty</span>
                        <div class="flex text-yellow-400 text-xs mb-1">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span class="text-gray-500 ml-1">(4.5)</span>
                        </div>
                        <h3 class="font-medium text-gray-900 mb-2">Premium Skincare Set</h3>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-gray-400 line-through">$99.99</span>
                                <span class="text-lg font-bold text-gray-900 ml-1">$69.99</span>
                            </div>
                            <button class="text-indigo-600 hover:text-indigo-800 transition">
                                <i class="fas fa-plus-circle"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Product 2 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                    <div class="relative">
                        <img src="https://placehold.co/300x300/8B5CF6/FFFFFF?text=Beauty+Product" alt="Beauty Product" class="w-full h-64 object-cover">
                        <div class="absolute top-0 left-0 bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-br-lg">-25%</div>
                        <button class="absolute top-2 right-2 bg-white p-2 rounded-full shadow hover:bg-gray-100 transition">
                            <i class="far fa-heart text-gray-600"></i>
                        </button>
                        <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 hover:opacity-100 transition-opacity duration-300 flex items-center justify-center space-x-2">
                            <a href="#" class="bg-white p-3 rounded-full hover:bg-gray-100 transition">
                                <i class="fas fa-eye text-gray-700"></i>
                            </a>
                            <a href="#" class="bg-indigo-600 p-3 rounded-full hover:bg-indigo-700 transition">
                                <i class="fas fa-shopping-cart text-white"></i>
                            </a>
                        </div>
                    </div>
                    <div class="p-4">
                        <span class="text-xs text-gray-500">Beauty</span>
                        <div class="flex text-yellow-400 text-xs mb-1">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <span class="text-gray-500 ml-1">(4.0)</span>
                        </div>
                        <h3 class="font-medium text-gray-900 mb-2">Luxury Perfume Collection</h3>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-gray-400 line-through">$129.99</span>
                                <span class="text-lg font-bold text-gray-900 ml-1">$97.49</span>
                            </div>
                            <button class="text-indigo-600 hover:text-indigo-800 transition">
                                <i class="fas fa-plus-circle"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Product 3 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                    <div class="relative">
                        <img src="https://placehold.co/300x300/8B5CF6/FFFFFF?text=Beauty+Product" alt="Beauty Product" class="w-full h-64 object-cover">
                        <div class="absolute top-0 left-0 bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-br-lg">-40%</div>
                        <button class="absolute top-2 right-2 bg-white p-2 rounded-full shadow hover:bg-gray-100 transition">
                            <i class="far fa-heart text-gray-600"></i>
                        </button>
                        <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 hover:opacity-100 transition-opacity duration-300 flex items-center justify-center space-x-2">
                            <a href="#" class="bg-white p-3 rounded-full hover:bg-gray-100 transition">
                                <i class="fas fa-eye text-gray-700"></i>
                            </a>
                            <a href="#" class="bg-indigo-600 p-3 rounded-full hover:bg-indigo-700 transition">
                                <i class="fas fa-shopping-cart text-white"></i>
                            </a>
                        </div>
                    </div>
                    <div class="p-4">
                        <span class="text-xs text-gray-500">Beauty</span>
                        <div class="flex text-yellow-400 text-xs mb-1">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <span class="text-gray-500 ml-1">(5.0)</span>
                        </div>
                        <h3 class="font-medium text-gray-900 mb-2">Professional Makeup Kit</h3>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-gray-400 line-through">$149.99</span>
                                <span class="text-lg font-bold text-gray-900 ml-1">$89.99</span>
                            </div>
                            <button class="text-indigo-600 hover:text-indigo-800 transition">
                                <i class="fas fa-plus-circle"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Product 4 -->
                <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
                    <div class="relative">
                        <img src="https://placehold.co/300x300/8B5CF6/FFFFFF?text=Beauty+Product" alt="Beauty Product" class="w-full h-64 object-cover">
                        <div class="absolute top-0 left-0 bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-br-lg">-20%</div>
                        <button class="absolute top-2 right-2 bg-white p-2 rounded-full shadow hover:bg-gray-100 transition">
                            <i class="far fa-heart text-gray-600"></i>
                        </button>
                        <div class="absolute inset-0 bg-black bg-opacity-20 opacity-0 hover:opacity-100 transition-opacity duration-300 flex items-center justify-center space-x-2">
                            <a href="#" class="bg-white p-3 rounded-full hover:bg-gray-100 transition">
                                <i class="fas fa-eye text-gray-700"></i>
                            </a>
                            <a href="#" class="bg-indigo-600 p-3 rounded-full hover:bg-indigo-700 transition">
                                <i class="fas fa-shopping-cart text-white"></i>
                            </a>
                        </div>
                    </div>
                    <div class="p-4">
                        <span class="text-xs text-gray-500">Beauty</span>
                        <div class="flex text-yellow-400 text-xs mb-1">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <i class="far fa-star"></i>
                            <span class="text-gray-500 ml-1">(3.5)</span>
                        </div>
                        <h3 class="font-medium text-gray-900 mb-2">Organic Hair Care Bundle</h3>
                        <div class="flex items-center justify-between">
                            <div>
                                <span class="text-gray-400 line-through">$79.99</span>
                                <span class="text-lg font-bold text-gray-900 ml-1">$63.99</span>
                            </div>
                            <button class="text-indigo-600 hover:text-indigo-800 transition">
                                <i class="fas fa-plus-circle"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Membership Banner -->
    <section class="py-12 bg-indigo-600 text-white">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="md:w-1/2 mb-8 md:mb-0">
                    <h2 class="text-3xl font-bold mb-4">Get Exclusive Deals & Offers</h2>
                    <p class="text-xl mb-6 text-indigo-100">Join our membership program today and enjoy special discounts, early access to sales, and personalized recommendations.</p>
                    <ul class="space-y-2 mb-6">
                        <li class="flex items-center">
                            <i class="fas fa-check-circle mr-2 text-indigo-300"></i>
                            <span>Free shipping on all orders</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle mr-2 text-indigo-300"></i>
                            <span>Members-only deals not available elsewhere</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle mr-2 text-indigo-300"></i>
                            <span>Early access to new products and sales</span>
                        </li>
                    </ul>
                    <a href="#" class="inline-block bg-white text-indigo-600 px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition shadow-lg">
                        Join Now
                    </a>
                </div>
                <div class="md:w-1/2 md:pl-12">
                    <img src="/images/membership-card.svg" alt="Membership Card" class="w-full max-w-md mx-auto rounded-lg shadow-xl">
                </div>
            </div>
        </div>
    </section>

    <!-- Flash Deals Countdown -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Flash Deals Ending Soon</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Don't miss out on these limited-time offers. Grab them before they're gone!</p>
                
                <!-- Countdown Timer -->
                <div class="flex justify-center space-x-4 mt-8">
                    <div class="bg-white rounded-lg shadow-md p-4 w-20">
                        <div class="text-3xl font-bold text-indigo-600" id="days">00</div>
                        <div class="text-gray-500 text-sm">Days</div>
                    </div>
                    <div class="bg-white rounded-lg shadow-md p-4 w-20">
                        <div class="text-3xl font-bold text-indigo-600" id="hours">00</div>
                        <div class="text-gray-500 text-sm">Hours</div>
                    </div>
                    <div class="bg-white rounded-lg shadow-md p-4 w-20">
                        <div class="text-3xl font-bold text-indigo-600" id="minutes">00</div>
                        <div class="text-gray-500 text-sm">Minutes</div>
                    </div>
                    <div class="bg-white rounded-lg shadow-md p-4 w-20">
                        <div class="text-3xl font-bold text-indigo-600" id="seconds">00</div>
                        <div class="text-gray-500 text-sm">Seconds</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Electronics Deals -->
    <section class="mb-12" id="electronics-deals">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center mb-8">
                <div>
                    <h2 class="text-2xl font-bold">Electronics Deals</h2>
                </div>
                <a href="{{ route('shop') }}" class="mt-4 md:mt-0 flex items-center text-sm font-medium">
                    <i class="fas fa-th-large mr-2"></i>
                    <span class="text-blue-600 font-medium">View All</span>
                </a>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Electronics Products -->
                <!-- Similar product cards as above but for electronics -->
            </div>
        </div>
    </section>

    <!-- Fashion Deals -->
    <section class="mb-12" id="fashion-deals">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center mb-8">
                <div>
                    <h2 class="text-2xl font-bold">Fashion Deals</h2>
                </div>
                <a href="{{ route('shop') }}" class="mt-4 md:mt-0 flex items-center text-sm font-medium">
                    <i class="fas fa-th-large mr-2"></i>
                    <span class="text-pink-600 font-medium">View All</span>
                </a>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Fashion Products -->
                <!-- Similar product cards as above but for fashion -->
            </div>
        </div>
    </section>

    <!-- Home & Kitchen Deals -->
    <section class="mb-12" id="home-deals">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center mb-8">
                <div>
                    <h2 class="text-2xl font-bold">Home & Kitchen Deals</h2>
                </div>
                <a href="{{ route('shop') }}" class="mt-4 md:mt-0 flex items-center text-sm font-medium">
                    <i class="fas fa-th-large mr-2"></i>
                    <span class="text-amber-600 font-medium">View All</span>
                </a>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Home & Kitchen Products -->
                <!-- Similar product cards as above but for home & kitchen -->
            </div>
        </div>
    </section>
@endsection

@section('scripts')
<script>
    // Countdown Timer Script
    document.addEventListener('DOMContentLoaded', function() {
        // Set the date we're counting down to (7 days from now)
        const countDownDate = new Date();
        countDownDate.setDate(countDownDate.getDate() + 7);
        
        // Update the countdown every 1 second
        const x = setInterval(function() {
            // Get today's date and time
            const now = new Date().getTime();
            
            // Find the distance between now and the countdown date
            const distance = countDownDate - now;
            
            // Time calculations for days, hours, minutes and seconds
            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
            // Display the result
            document.getElementById('days').innerHTML = days < 10 ? '0' + days : days;
            document.getElementById('hours').innerHTML = hours < 10 ? '0' + hours : hours;
            document.getElementById('minutes').innerHTML = minutes < 10 ? '0' + minutes : minutes;
            document.getElementById('seconds').innerHTML = seconds < 10 ? '0' + seconds : seconds;
            
            // If the countdown is finished, display expired message
            if (distance < 0) {
                clearInterval(x);
                document.getElementById('days').innerHTML = '00';
                document.getElementById('hours').innerHTML = '00';
                document.getElementById('minutes').innerHTML = '00';
                document.getElementById('seconds').innerHTML = '00';
            }
        }, 1000);
    });
</script>
@endsection
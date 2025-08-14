@extends('layouts.shop')

@section('title', 'About Us - ShopEase')

@section('content')
    <!-- Breadcrumb -->
    <div class="bg-gray-100 py-3">
        <div class="container mx-auto px-4">
            <div class="flex items-center space-x-2 text-sm">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-indigo-600 transition">Home</a>
                <span class="text-gray-400">/</span>
                <span class="text-indigo-600 font-medium">About Us</span>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <!-- Hero Section -->
        <div class="bg-indigo-600 rounded-xl overflow-hidden mb-12">
            <div class="flex flex-col md:flex-row">
                <div class="md:w-1/2 p-8 md:p-12 flex items-center">
                    <div>
                        <h1 class="text-3xl md:text-4xl font-bold text-white mb-4">Our Story</h1>
                        <p class="text-indigo-100 mb-6">Founded in 2018, ShopEase was born from a simple idea: shopping should be easy, enjoyable, and accessible to everyone. What started as a small online store has grown into a trusted e-commerce destination serving customers worldwide.</p>
                        <p class="text-indigo-100 mb-6">Our mission is to provide high-quality products at affordable prices while delivering exceptional customer service and a seamless shopping experience.</p>
                        <div class="flex space-x-4">
                            <a href="{{ route('contact') }}" class="bg-white text-indigo-600 hover:bg-gray-100 py-2 px-6 rounded-lg font-medium transition">Contact Us</a>
                            <a href="{{ route('shop') }}" class="border border-white text-white hover:bg-indigo-700 py-2 px-6 rounded-lg font-medium transition">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="md:w-1/2 bg-indigo-700 flex items-center justify-center p-8">
                    <div class="w-full h-64 md:h-full bg-indigo-800 rounded-lg flex items-center justify-center">
                        <!-- Placeholder for about image -->
                        <div class="text-center text-indigo-200">
                            <i class="fas fa-store text-6xl mb-4"></i>
                            <p class="text-xl font-medium">ShopEase Storefront</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Our Values -->
        <div class="mb-16">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Our Values</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">At ShopEase, our core values guide everything we do. They shape our culture, influence our decisions, and define how we interact with our customers and partners.</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Value 1 -->
                <div class="bg-white rounded-lg shadow-sm p-6 text-center">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-star text-2xl text-indigo-600"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Quality</h3>
                    <p class="text-gray-600">We're committed to offering products that meet the highest standards of quality and durability. We carefully select our suppliers and rigorously test all products before they reach our customers.</p>
                </div>
                
                <!-- Value 2 -->
                <div class="bg-white rounded-lg shadow-sm p-6 text-center">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-users text-2xl text-indigo-600"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Customer-Centric</h3>
                    <p class="text-gray-600">Our customers are at the heart of everything we do. We listen to your feedback, anticipate your needs, and continuously improve our services to exceed your expectations.</p>
                </div>
                
                <!-- Value 3 -->
                <div class="bg-white rounded-lg shadow-sm p-6 text-center">
                    <div class="w-16 h-16 bg-indigo-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-leaf text-2xl text-indigo-600"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3">Sustainability</h3>
                    <p class="text-gray-600">We're committed to reducing our environmental footprint. From eco-friendly packaging to partnering with sustainable brands, we strive to make responsible choices for our planet.</p>
                </div>
            </div>
        </div>
        
        <!-- Our Journey -->
        <div class="mb-16">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Our Journey</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">From our humble beginnings to where we are today, it's been an incredible journey of growth and learning.</p>
            </div>
            
            <div class="relative">
                <!-- Timeline Line -->
                <div class="absolute left-1/2 transform -translate-x-1/2 h-full w-1 bg-indigo-100"></div>
                
                <!-- Timeline Items -->
                <div class="relative z-10">
                    <!-- Year 2018 -->
                    <div class="flex flex-col md:flex-row items-center mb-12">
                        <div class="md:w-1/2 md:pr-12 md:text-right mb-6 md:mb-0">
                            <div class="bg-white p-6 rounded-lg shadow-sm inline-block">
                                <h3 class="text-xl font-bold mb-2 text-indigo-600">2018</h3>
                                <h4 class="text-lg font-semibold mb-3">The Beginning</h4>
                                <p class="text-gray-600">ShopEase was founded with a vision to simplify online shopping. We started with just 5 team members and a small selection of products.</p>
                            </div>
                        </div>
                        <div class="bg-indigo-500 rounded-full w-8 h-8 flex items-center justify-center border-4 border-white shadow-md z-10">
                            <i class="fas fa-star text-white text-xs"></i>
                        </div>
                        <div class="md:w-1/2 md:pl-12 hidden md:block"></div>
                    </div>
                    
                    <!-- Year 2019 -->
                    <div class="flex flex-col md:flex-row items-center mb-12">
                        <div class="md:w-1/2 md:pr-12 hidden md:block"></div>
                        <div class="bg-indigo-500 rounded-full w-8 h-8 flex items-center justify-center border-4 border-white shadow-md z-10">
                            <i class="fas fa-chart-line text-white text-xs"></i>
                        </div>
                        <div class="md:w-1/2 md:pl-12 mb-6 md:mb-0">
                            <div class="bg-white p-6 rounded-lg shadow-sm inline-block">
                                <h3 class="text-xl font-bold mb-2 text-indigo-600">2019</h3>
                                <h4 class="text-lg font-semibold mb-3">Expansion</h4>
                                <p class="text-gray-600">We expanded our product range and launched our mobile app. Our customer base grew to over 10,000 loyal shoppers.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Year 2020 -->
                    <div class="flex flex-col md:flex-row items-center mb-12">
                        <div class="md:w-1/2 md:pr-12 md:text-right mb-6 md:mb-0">
                            <div class="bg-white p-6 rounded-lg shadow-sm inline-block">
                                <h3 class="text-xl font-bold mb-2 text-indigo-600">2020</h3>
                                <h4 class="text-lg font-semibold mb-3">Adaptation</h4>
                                <p class="text-gray-600">During the global pandemic, we pivoted to focus on essential items and implemented contactless delivery to serve our customers safely.</p>
                            </div>
                        </div>
                        <div class="bg-indigo-500 rounded-full w-8 h-8 flex items-center justify-center border-4 border-white shadow-md z-10">
                            <i class="fas fa-sync text-white text-xs"></i>
                        </div>
                        <div class="md:w-1/2 md:pl-12 hidden md:block"></div>
                    </div>
                    
                    <!-- Year 2021 -->
                    <div class="flex flex-col md:flex-row items-center mb-12">
                        <div class="md:w-1/2 md:pr-12 hidden md:block"></div>
                        <div class="bg-indigo-500 rounded-full w-8 h-8 flex items-center justify-center border-4 border-white shadow-md z-10">
                            <i class="fas fa-globe text-white text-xs"></i>
                        </div>
                        <div class="md:w-1/2 md:pl-12 mb-6 md:mb-0">
                            <div class="bg-white p-6 rounded-lg shadow-sm inline-block">
                                <h3 class="text-xl font-bold mb-2 text-indigo-600">2021</h3>
                                <h4 class="text-lg font-semibold mb-3">International Growth</h4>
                                <p class="text-gray-600">We expanded to international markets, opening our platform to customers in Europe and Asia. Our team grew to 50 members.</p>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Year 2022 -->
                    <div class="flex flex-col md:flex-row items-center mb-12">
                        <div class="md:w-1/2 md:pr-12 md:text-right mb-6 md:mb-0">
                            <div class="bg-white p-6 rounded-lg shadow-sm inline-block">
                                <h3 class="text-xl font-bold mb-2 text-indigo-600">2022</h3>
                                <h4 class="text-lg font-semibold mb-3">Innovation</h4>
                                <p class="text-gray-600">We launched our premium membership program and implemented AI-powered recommendations to enhance the shopping experience.</p>
                            </div>
                        </div>
                        <div class="bg-indigo-500 rounded-full w-8 h-8 flex items-center justify-center border-4 border-white shadow-md z-10">
                            <i class="fas fa-lightbulb text-white text-xs"></i>
                        </div>
                        <div class="md:w-1/2 md:pl-12 hidden md:block"></div>
                    </div>
                    
                    <!-- Year 2023 -->
                    <div class="flex flex-col md:flex-row items-center">
                        <div class="md:w-1/2 md:pr-12 hidden md:block"></div>
                        <div class="bg-indigo-500 rounded-full w-8 h-8 flex items-center justify-center border-4 border-white shadow-md z-10">
                            <i class="fas fa-rocket text-white text-xs"></i>
                        </div>
                        <div class="md:w-1/2 md:pl-12">
                            <div class="bg-white p-6 rounded-lg shadow-sm inline-block">
                                <h3 class="text-xl font-bold mb-2 text-indigo-600">2023</h3>
                                <h4 class="text-lg font-semibold mb-3">Today & Beyond</h4>
                                <p class="text-gray-600">Today, we serve over 1 million customers worldwide and continue to innovate and expand our offerings. The future is bright for ShopEase!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Our Team -->
        <div class="mb-16">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Meet Our Team</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">The passionate individuals behind ShopEase who work tirelessly to bring you the best shopping experience.</p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
                <!-- Team Member 1 -->
                <div class="bg-white rounded-lg overflow-hidden shadow-sm group">
                    <div class="relative">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="John Smith" class="w-full h-64 object-cover object-center">
                        <div class="absolute inset-0 bg-indigo-600 bg-opacity-70 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <div class="flex space-x-3">
                                <a href="#" class="bg-white p-2 rounded-full text-indigo-600 hover:bg-gray-100 transition">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="#" class="bg-white p-2 rounded-full text-indigo-600 hover:bg-gray-100 transition">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="bg-white p-2 rounded-full text-indigo-600 hover:bg-gray-100 transition">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 text-center">
                        <h3 class="font-bold text-lg mb-1">John Smith</h3>
                        <p class="text-indigo-600 mb-2">CEO & Founder</p>
                        <p class="text-gray-600 text-sm">Visionary leader with 15+ years of e-commerce experience.</p>
                    </div>
                </div>
                
                <!-- Team Member 2 -->
                <div class="bg-white rounded-lg overflow-hidden shadow-sm group">
                    <div class="relative">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Sarah Johnson" class="w-full h-64 object-cover object-center">
                        <div class="absolute inset-0 bg-indigo-600 bg-opacity-70 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <div class="flex space-x-3">
                                <a href="#" class="bg-white p-2 rounded-full text-indigo-600 hover:bg-gray-100 transition">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="#" class="bg-white p-2 rounded-full text-indigo-600 hover:bg-gray-100 transition">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="bg-white p-2 rounded-full text-indigo-600 hover:bg-gray-100 transition">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 text-center">
                        <h3 class="font-bold text-lg mb-1">Sarah Johnson</h3>
                        <p class="text-indigo-600 mb-2">Chief Marketing Officer</p>
                        <p class="text-gray-600 text-sm">Digital marketing expert with a passion for brand storytelling.</p>
                    </div>
                </div>
                
                <!-- Team Member 3 -->
                <div class="bg-white rounded-lg overflow-hidden shadow-sm group">
                    <div class="relative">
                        <img src="https://randomuser.me/api/portraits/men/67.jpg" alt="David Chen" class="w-full h-64 object-cover object-center">
                        <div class="absolute inset-0 bg-indigo-600 bg-opacity-70 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <div class="flex space-x-3">
                                <a href="#" class="bg-white p-2 rounded-full text-indigo-600 hover:bg-gray-100 transition">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="#" class="bg-white p-2 rounded-full text-indigo-600 hover:bg-gray-100 transition">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="bg-white p-2 rounded-full text-indigo-600 hover:bg-gray-100 transition">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 text-center">
                        <h3 class="font-bold text-lg mb-1">David Chen</h3>
                        <p class="text-indigo-600 mb-2">CTO</p>
                        <p class="text-gray-600 text-sm">Tech innovator focused on creating seamless user experiences.</p>
                    </div>
                </div>
                
                <!-- Team Member 4 -->
                <div class="bg-white rounded-lg overflow-hidden shadow-sm group">
                    <div class="relative">
                        <img src="https://randomuser.me/api/portraits/women/17.jpg" alt="Emily Rodriguez" class="w-full h-64 object-cover object-center">
                        <div class="absolute inset-0 bg-indigo-600 bg-opacity-70 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                            <div class="flex space-x-3">
                                <a href="#" class="bg-white p-2 rounded-full text-indigo-600 hover:bg-gray-100 transition">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                                <a href="#" class="bg-white p-2 rounded-full text-indigo-600 hover:bg-gray-100 transition">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="bg-white p-2 rounded-full text-indigo-600 hover:bg-gray-100 transition">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 text-center">
                        <h3 class="font-bold text-lg mb-1">Emily Rodriguez</h3>
                        <p class="text-indigo-600 mb-2">Customer Experience Director</p>
                        <p class="text-gray-600 text-sm">Dedicated to ensuring every customer interaction exceeds expectations.</p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Call to Action -->
        <div class="bg-indigo-100 rounded-xl p-8 md:p-12 mb-8">
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="mb-6 md:mb-0 md:mr-8">
                    <h3 class="text-2xl font-bold mb-2">Ready to Start Shopping?</h3>
                    <p class="text-gray-700">Join thousands of satisfied customers and discover the ShopEase difference today.</p>
                </div>
                <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4">
                    <a href="{{ route('shop') }}" class="bg-indigo-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-indigo-700 transition text-center">
                        <i class="fas fa-shopping-bag mr-2"></i>
                        <span>Shop Now</span>
                    </a>
                    <a href="{{ route('contact') }}" class="border border-indigo-600 text-indigo-600 px-6 py-3 rounded-lg font-medium hover:bg-indigo-600 hover:text-white transition text-center">
                        <i class="fas fa-envelope mr-2"></i>
                        <span>Contact Us</span>
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection
@extends('layouts.shop')

@section('title', 'Contact Us - ShopEase')

@section('content')
    <!-- Breadcrumb -->
    <div class="bg-gray-100 py-3">
        <div class="container mx-auto px-4">
            <div class="flex items-center space-x-2 text-sm">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-indigo-600 transition">Home</a>
                <span class="text-gray-400">/</span>
                <span class="text-indigo-600 font-medium">Contact Us</span>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <!-- Page Header -->
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-4xl font-bold mb-4">Contact Us</h1>
            <p class="text-gray-600 max-w-2xl mx-auto">Have a question, feedback, or need assistance? We're here to help! Reach out to our team using any of the methods below.</p>
        </div>
        
        <!-- Contact Information & Form -->
        <div class="flex flex-col lg:flex-row gap-8 mb-12">
            <!-- Contact Information -->
            <div class="lg:w-1/3">
                <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                    <h2 class="text-xl font-bold mb-4">Contact Information</h2>
                    
                    <div class="space-y-4">
                        <!-- Address -->
                        <div class="flex">
                            <div class="flex-shrink-0 mr-3">
                                <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-map-marker-alt text-indigo-600"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="font-medium mb-1">Address</h3>
                                <p class="text-gray-600">123 Commerce Street<br>Suite 500<br>New York, NY 10001</p>
                            </div>
                        </div>
                        
                        <!-- Phone -->
                        <div class="flex">
                            <div class="flex-shrink-0 mr-3">
                                <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-phone-alt text-indigo-600"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="font-medium mb-1">Phone</h3>
                                <p class="text-gray-600">Customer Service: (800) 123-4567<br>Technical Support: (800) 765-4321</p>
                            </div>
                        </div>
                        
                        <!-- Email -->
                        <div class="flex">
                            <div class="flex-shrink-0 mr-3">
                                <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-envelope text-indigo-600"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="font-medium mb-1">Email</h3>
                                <p class="text-gray-600">General Inquiries: info@shopease.com<br>Customer Support: support@shopease.com</p>
                            </div>
                        </div>
                        
                        <!-- Hours -->
                        <div class="flex">
                            <div class="flex-shrink-0 mr-3">
                                <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-clock text-indigo-600"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="font-medium mb-1">Business Hours</h3>
                                <p class="text-gray-600">Monday - Friday: 9:00 AM - 6:00 PM EST<br>Saturday: 10:00 AM - 4:00 PM EST<br>Sunday: Closed</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Social Media -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h2 class="text-xl font-bold mb-4">Connect With Us</h2>
                    <p class="text-gray-600 mb-4">Follow us on social media for updates, promotions, and more!</p>
                    
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-indigo-600 text-white rounded-full flex items-center justify-center hover:bg-indigo-700 transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-indigo-600 text-white rounded-full flex items-center justify-center hover:bg-indigo-700 transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-indigo-600 text-white rounded-full flex items-center justify-center hover:bg-indigo-700 transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-indigo-600 text-white rounded-full flex items-center justify-center hover:bg-indigo-700 transition">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-indigo-600 text-white rounded-full flex items-center justify-center hover:bg-indigo-700 transition">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div class="lg:w-2/3">
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h2 class="text-xl font-bold mb-4">Send Us a Message</h2>
                    <p class="text-gray-600 mb-6">Fill out the form below and we'll get back to you as soon as possible.</p>
                    
                    <form action="#" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <!-- First Name -->
                            <div>
                                <label for="first_name" class="block text-gray-700 font-medium mb-2">First Name</label>
                                <input type="text" id="first_name" name="first_name" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-indigo-500" required>
                            </div>
                            
                            <!-- Last Name -->
                            <div>
                                <label for="last_name" class="block text-gray-700 font-medium mb-2">Last Name</label>
                                <input type="text" id="last_name" name="last_name" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-indigo-500" required>
                            </div>
                            
                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-gray-700 font-medium mb-2">Email Address</label>
                                <input type="email" id="email" name="email" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-indigo-500" required>
                            </div>
                            
                            <!-- Phone -->
                            <div>
                                <label for="phone" class="block text-gray-700 font-medium mb-2">Phone Number</label>
                                <input type="tel" id="phone" name="phone" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-indigo-500">
                            </div>
                        </div>
                        
                        <!-- Subject -->
                        <div class="mb-6">
                            <label for="subject" class="block text-gray-700 font-medium mb-2">Subject</label>
                            <input type="text" id="subject" name="subject" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-indigo-500" required>
                        </div>
                        
                        <!-- Message -->
                        <div class="mb-6">
                            <label for="message" class="block text-gray-700 font-medium mb-2">Message</label>
                            <textarea id="message" name="message" rows="5" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-indigo-500" required></textarea>
                        </div>
                        
                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-indigo-700 transition">
                                <i class="fas fa-paper-plane mr-2"></i>
                                <span>Send Message</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- FAQ Section -->
        <div class="mb-12">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold">Frequently Asked Questions</h2>
                <p class="text-gray-600">Find quick answers to common questions</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- FAQ Item 1 -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h3 class="font-bold text-lg mb-3">What are your shipping options?</h3>
                    <p class="text-gray-600">We offer standard shipping (3-5 business days), express shipping (1-2 business days), and same-day delivery in select areas. Shipping costs vary based on location and order value.</p>
                </div>
                
                <!-- FAQ Item 2 -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h3 class="font-bold text-lg mb-3">What is your return policy?</h3>
                    <p class="text-gray-600">We accept returns within 30 days of purchase. Items must be in original condition with tags attached. Return shipping is free for defective items.</p>
                </div>
                
                <!-- FAQ Item 3 -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h3 class="font-bold text-lg mb-3">Do you ship internationally?</h3>
                    <p class="text-gray-600">Yes, we ship to over 50 countries worldwide. International shipping typically takes 7-14 business days, depending on the destination.</p>
                </div>
                
                <!-- FAQ Item 4 -->
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h3 class="font-bold text-lg mb-3">How can I track my order?</h3>
                    <p class="text-gray-600">Once your order ships, you'll receive a tracking number via email. You can also track your order in your account dashboard under "Order History."</p>
                </div>
            </div>
            
            <div class="text-center mt-8">
                <a href="#" class="text-indigo-600 font-medium hover:text-indigo-700 transition">View all FAQs <i class="fas fa-arrow-right ml-1"></i></a>
            </div>
        </div>
        
        <!-- Map Section -->
        <div class="mb-12">
            <div class="bg-gray-200 rounded-lg overflow-hidden h-96 flex items-center justify-center">
                <!-- Placeholder for map -->
                <div class="text-center">
                    <i class="fas fa-map-marked-alt text-5xl text-gray-400 mb-4"></i>
                    <p class="text-gray-600 font-medium">Interactive Map Would Be Displayed Here</p>
                </div>
            </div>
        </div>
    </main>
@endsection
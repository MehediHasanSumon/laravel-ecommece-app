<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', config('app.name', 'ShopEase'))</title>
    
    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Additional Styles -->
    @yield('styles')
</head>
<body class="bg-gray-50">
    <!-- Header Section -->
    <header class="bg-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-4 py-3">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <div class="flex items-center space-x-2">
                    <a href="{{ route('home') }}" class="text-2xl font-bold text-indigo-600">{{ config('app.name', 'ShopEase') }}</a>
                </div>
                
                <!-- Search Bar -->
                <div class="hidden md:flex items-center flex-1 max-w-md mx-4">
                    <div class="relative w-full">
                        <input type="text" placeholder="Search for products..." class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <button class="absolute right-2 top-2 text-gray-500 hover:text-indigo-600">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
                
                <!-- Navigation -->
                <nav class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('shop') }}" class="text-gray-600 hover:text-indigo-600 transition">Shop</a>
                    <a href="{{ route('categories') }}" class="text-gray-600 hover:text-indigo-600 transition">Categories</a>
                    <a href="{{ route('deals') }}" class="text-gray-600 hover:text-indigo-600 transition">Deals</a>
                    <a href="{{ route('about') }}" class="text-gray-600 hover:text-indigo-600 transition">About</a>
                    <a href="{{ route('contact') }}" class="text-gray-600 hover:text-indigo-600 transition">Contact</a>
                </nav>
                
                <!-- User Actions -->
                <div class="flex items-center space-x-4">
                    <a href="{{ route('wishlist') }}" class="text-gray-600 hover:text-indigo-600 transition relative">
                        <i class="fas fa-heart text-xl"></i>
                        <span class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs">0</span>
                    </a>
                    <a href="{{ route('cart') }}" class="text-gray-600 hover:text-indigo-600 transition relative">
                        <i class="fas fa-shopping-cart text-xl"></i>
                        <span class="absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs">0</span>
                    </a>
                    @auth
                        <a href="{{ route('profile.edit') }}" class="text-gray-600 hover:text-indigo-600 transition">
                            <i class="fas fa-user text-xl"></i>
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-600 hover:text-indigo-600 transition">
                                <i class="fas fa-sign-out-alt text-xl"></i>
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-indigo-600 transition">
                            <i class="fas fa-sign-in-alt text-xl"></i>
                        </a>
                    @endauth
                    <button id="darkModeToggle" class="text-gray-600 hover:text-indigo-600 transition">
                        <i class="fas fa-moon text-xl"></i>
                    </button>
                    <button class="md:hidden text-gray-600 hover:text-indigo-600 transition" id="mobileMenuButton">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>
            
            <!-- Mobile Search (Hidden on Desktop) -->
            <div class="mt-3 md:hidden">
                <div class="relative w-full">
                    <input type="text" placeholder="Search for products..." class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    <button class="absolute right-2 top-2 text-gray-500 hover:text-indigo-600">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
            
            <!-- Mobile Menu (Hidden by Default) -->
            <div class="md:hidden hidden" id="mobileMenu">
                <nav class="mt-3 flex flex-col space-y-3 pb-3">
                    <a href="{{ route('shop') }}" class="text-gray-600 hover:text-indigo-600 transition">Shop</a>
                    <a href="{{ route('categories') }}" class="text-gray-600 hover:text-indigo-600 transition">Categories</a>
                    <a href="{{ route('deals') }}" class="text-gray-600 hover:text-indigo-600 transition">Deals</a>
                    <a href="{{ route('about') }}" class="text-gray-600 hover:text-indigo-600 transition">About</a>
                    <a href="{{ route('contact') }}" class="text-gray-600 hover:text-indigo-600 transition">Contact</a>
                </nav>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white pt-12 pb-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Company Info -->
                <div>
                    <h3 class="text-xl font-bold mb-4">{{ config('app.name', 'ShopEase') }}</h3>
                    <p class="text-gray-400 mb-4">Your one-stop shopping destination for quality products at affordable prices.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition">
                            <i class="fab fa-pinterest-p"></i>
                        </a>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-gray-400 hover:text-white transition">Home</a></li>
                        <li><a href="{{ route('shop') }}" class="text-gray-400 hover:text-white transition">Shop</a></li>
                        <li><a href="{{ route('categories') }}" class="text-gray-400 hover:text-white transition">Categories</a></li>
                        <li><a href="{{ route('deals') }}" class="text-gray-400 hover:text-white transition">Deals</a></li>
                        <li><a href="{{ route('about') }}" class="text-gray-400 hover:text-white transition">About Us</a></li>
                        <li><a href="{{ route('contact') }}" class="text-gray-400 hover:text-white transition">Contact</a></li>
                    </ul>
                </div>
                
                <!-- Customer Service -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Customer Service</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition">FAQ</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Shipping & Returns</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Terms & Conditions</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition">Privacy Policy</a></li>
                    </ul>
                </div>
                
                <!-- Newsletter -->
                <div>
                    <h3 class="text-lg font-semibold mb-4">Newsletter</h3>
                    <p class="text-gray-400 mb-4">Subscribe to our newsletter for the latest updates and offers.</p>
                    <form action="#" method="POST" class="flex">
                        <input type="email" placeholder="Your email address" class="px-4 py-2 rounded-l-lg focus:outline-none flex-1">
                        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-r-lg hover:bg-indigo-700 transition">
                            <i class="fas fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
            
            <hr class="border-gray-700 my-8">
            
            <!-- Bottom Footer -->
            <div class="flex flex-col md:flex-row justify-between items-center">
                <p class="text-gray-400 text-sm">&copy; {{ date('Y') }} {{ config('app.name', 'ShopEase') }}. All rights reserved.</p>
                <div class="flex space-x-4 mt-4 md:mt-0">
                    <img src="/images/visa.svg" alt="Visa" class="h-8">
                    <img src="/images/mastercard.svg" alt="Mastercard" class="h-8">
                    <img src="/images/paypal.svg" alt="PayPal" class="h-8">
                    <img src="/images/apple-pay.svg" alt="Apple Pay" class="h-8">
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        // Mobile Menu Toggle
        document.getElementById('mobileMenuButton').addEventListener('click', function() {
            document.getElementById('mobileMenu').classList.toggle('hidden');
        });
        
        // Dark Mode Toggle
        document.getElementById('darkModeToggle').addEventListener('click', function() {
            document.documentElement.classList.toggle('dark');
            const icon = this.querySelector('i');
            if (document.documentElement.classList.contains('dark')) {
                icon.classList.remove('fa-moon');
                icon.classList.add('fa-sun');
            } else {
                icon.classList.remove('fa-sun');
                icon.classList.add('fa-moon');
            }
        });
    </script>
    
    @yield('scripts')
</body>
</html>
@extends('layouts.shop')

@section('title', $product->name . ' - ShopEase')

@section('content')
    <!-- Breadcrumb -->
    <div class="bg-gray-100 py-3">
        <div class="container mx-auto px-4">
            <div class="flex items-center space-x-2 text-sm">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-indigo-600 transition">Home</a>
                <span class="text-gray-400">/</span>
                <a href="{{ route('shop') }}" class="text-gray-600 hover:text-indigo-600 transition">Shop</a>
                <span class="text-gray-400">/</span>
                @if($product->category)
                <a href="{{ route('category.show', $product->category->slug) }}" class="text-gray-600 hover:text-indigo-600 transition">{{ $product->category->name }}</a>
                <span class="text-gray-400">/</span>
                @endif
                <span class="text-indigo-600 font-medium">{{ $product->name }}</span>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Product Images -->
            <div class="lg:w-2/5">
                <div class="mb-4">
                    <div class="bg-white rounded-lg overflow-hidden">
                        <img src="{{ asset('images/products/product-main.jpg') }}" alt="Product Main Image" class="w-full h-auto object-cover object-center" id="main-image">
                    </div>
                </div>
                <div class="grid grid-cols-4 gap-2">
                    <div class="bg-white rounded-lg overflow-hidden border-2 border-indigo-600 cursor-pointer">
                        <img src="{{ asset('images/products/thumbnail1.jpg') }}" alt="Thumbnail 1" class="w-full h-auto object-cover object-center thumbnail" onclick="changeImage(this.src)">
                    </div>
                    <div class="bg-white rounded-lg overflow-hidden border border-gray-200 cursor-pointer">
                        <img src="{{ asset('images/products/thumbnail2.jpg') }}" alt="Thumbnail 2" class="w-full h-auto object-cover object-center thumbnail" onclick="changeImage(this.src)">
                    </div>
                    <div class="bg-white rounded-lg overflow-hidden border border-gray-200 cursor-pointer">
                        <img src="{{ asset('images/products/thumbnail3.jpg') }}" alt="Thumbnail 3" class="w-full h-auto object-cover object-center thumbnail" onclick="changeImage(this.src)">
                    </div>
                    <div class="bg-white rounded-lg overflow-hidden border border-gray-200 cursor-pointer">
                        <img src="{{ asset('images/products/thumbnail4.jpg') }}" alt="Thumbnail 4" class="w-full h-auto object-cover object-center thumbnail" onclick="changeImage(this.src)">
                    </div>
                </div>
            </div>
            
            <!-- Product Details -->
            <div class="lg:w-3/5">
                <div class="bg-white rounded-lg shadow-sm p-6">
                    <div class="mb-4">
                        <div class="flex items-center mb-2">
                            <span class="bg-red-500 text-white text-xs font-bold px-2 py-1 rounded mr-2">-20%</span>
                            <span class="bg-green-500 text-white text-xs font-bold px-2 py-1 rounded">In Stock</span>
                        </div>
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-900 mb-2">Wireless Bluetooth Earbuds with Noise Cancellation</h1>
                        <div class="flex items-center mb-2">
                            <div class="flex text-yellow-400 mr-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="text-gray-600 text-sm">4.5 (128 reviews)</span>
                        </div>
                        <div class="flex items-center">
                            <span class="text-gray-500">Brand:</span>
                            <a href="#" class="text-indigo-600 hover:text-indigo-700 transition ml-2">TechAudio</a>
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <div class="flex items-center mb-4">
                            <span class="text-3xl font-bold text-indigo-600 mr-3">$79.99</span>
                            <span class="text-xl text-gray-400 line-through">$99.99</span>
                        </div>
                        <p class="text-gray-600 mb-4">
                            Experience premium sound quality with these wireless Bluetooth earbuds featuring active noise cancellation, touch controls, and up to 30 hours of battery life with the charging case.
                        </p>
                        <div class="flex items-center text-sm text-gray-500">
                            <i class="fas fa-check-circle text-green-500 mr-2"></i>
                            <span>Free shipping on orders over $50</span>
                        </div>
                    </div>
                    
                    <!-- Color Options -->
                    <div class="mb-6">
                        <h3 class="text-gray-900 font-medium mb-3">Color</h3>
                        <div class="flex space-x-3">
                            <div class="w-8 h-8 rounded-full bg-black border-2 border-indigo-600 cursor-pointer flex items-center justify-center">
                                <i class="fas fa-check text-white text-xs"></i>
                            </div>
                            <div class="w-8 h-8 rounded-full bg-white border border-gray-300 cursor-pointer"></div>
                            <div class="w-8 h-8 rounded-full bg-blue-600 border border-gray-300 cursor-pointer"></div>
                            <div class="w-8 h-8 rounded-full bg-red-600 border border-gray-300 cursor-pointer"></div>
                        </div>
                    </div>
                    
                    <!-- Quantity -->
                    <div class="mb-6">
                        <h3 class="text-gray-900 font-medium mb-3">Quantity</h3>
                        <div class="flex items-center">
                            <div class="flex items-center border border-gray-300 rounded-lg overflow-hidden">
                                <button class="px-4 py-2 bg-gray-100 text-gray-600 hover:bg-gray-200 transition">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <input type="number" value="1" min="1" class="w-16 text-center border-0 focus:ring-0">
                                <button class="px-4 py-2 bg-gray-100 text-gray-600 hover:bg-gray-200 transition">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <span class="text-gray-500 text-sm ml-3">Only 12 items left</span>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-3 mb-6">
                        <button class="flex-grow bg-indigo-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-indigo-700 transition">
                            <i class="fas fa-shopping-cart mr-2"></i>
                            <span>Add to Cart</span>
                        </button>
                        <button class="flex-grow border border-gray-300 text-gray-700 px-6 py-3 rounded-lg font-medium hover:bg-gray-50 transition">
                            <i class="far fa-heart mr-2"></i>
                            <span>Add to Wishlist</span>
                        </button>
                    </div>
                    
                    <!-- Product Meta -->
                    <div class="border-t border-gray-200 pt-4">
                        <div class="flex items-center mb-2">
                            <span class="text-gray-500 w-24">SKU:</span>
                            <span class="text-gray-900">EB-BT-2023-BLK</span>
                        </div>
                        <div class="flex items-center mb-2">
                            <span class="text-gray-500 w-24">Category:</span>
                            <a href="#" class="text-indigo-600 hover:text-indigo-700 transition">Electronics</a>
                        </div>
                        <div class="flex items-center mb-2">
                            <span class="text-gray-500 w-24">Tags:</span>
                            <div class="flex flex-wrap">
                                <a href="#" class="text-indigo-600 hover:text-indigo-700 transition mr-2">Wireless</a>
                                <a href="#" class="text-indigo-600 hover:text-indigo-700 transition mr-2">Bluetooth</a>
                                <a href="#" class="text-indigo-600 hover:text-indigo-700 transition">Earbuds</a>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <span class="text-gray-500 w-24">Share:</span>
                            <div class="flex space-x-2">
                                <a href="#" class="text-gray-400 hover:text-blue-600 transition"><i class="fab fa-facebook-f"></i></a>
                                <a href="#" class="text-gray-400 hover:text-blue-400 transition"><i class="fab fa-twitter"></i></a>
                                <a href="#" class="text-gray-400 hover:text-red-600 transition"><i class="fab fa-pinterest-p"></i></a>
                                <a href="#" class="text-gray-400 hover:text-blue-800 transition"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Product Tabs -->
        <div class="mt-8">
            <div class="border-b border-gray-200">
                <nav class="-mb-px flex space-x-8">
                    <button class="border-indigo-600 text-indigo-600 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm" id="tab-description">Description</button>
                    <button class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm" id="tab-specifications">Specifications</button>
                    <button class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm" id="tab-reviews">Reviews (128)</button>
                </nav>
            </div>
            
            <!-- Tab Content -->
            <div class="py-6">
                <!-- Description Tab -->
                <div class="tab-content" id="content-description">
                    <div class="prose max-w-none">
                        <h3>Product Description</h3>
                        <p>Experience premium sound quality with our Wireless Bluetooth Earbuds featuring active noise cancellation technology that blocks out ambient noise, allowing you to immerse yourself in your music or calls.</p>
                        
                        <h4>Key Features:</h4>
                        <ul>
                            <li><strong>Active Noise Cancellation:</strong> Reduces ambient noise by up to 90% for an immersive audio experience.</li>
                            <li><strong>Premium Sound Quality:</strong> 10mm dynamic drivers deliver rich bass and crystal-clear highs.</li>
                            <li><strong>Long Battery Life:</strong> Up to 8 hours of playback on a single charge, and up to 30 hours with the charging case.</li>
                            <li><strong>Touch Controls:</strong> Easily control your music, calls, and voice assistant with intuitive touch controls.</li>
                            <li><strong>Water Resistant:</strong> IPX5 rating makes these earbuds resistant to sweat and light rain, perfect for workouts.</li>
                            <li><strong>Bluetooth 5.2:</strong> Provides a stable, low-latency connection with a range of up to 10 meters.</li>
                            <li><strong>Comfortable Fit:</strong> Includes three sizes of silicone ear tips for a secure and comfortable fit.</li>
                        </ul>
                        
                        <h4>What's in the Box:</h4>
                        <ul>
                            <li>Wireless Bluetooth Earbuds</li>
                            <li>Charging Case</li>
                            <li>USB-C Charging Cable</li>
                            <li>3 Pairs of Silicone Ear Tips (S, M, L)</li>
                            <li>User Manual</li>
                            <li>Warranty Card</li>
                        </ul>
                        
                        <p>Elevate your audio experience with our Wireless Bluetooth Earbuds, designed for music lovers, commuters, and fitness enthusiasts who demand high-quality sound and convenience.</p>
                    </div>
                </div>
                
                <!-- Specifications Tab (Hidden by default) -->
                <div class="tab-content hidden" id="content-specifications">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h3 class="text-lg font-bold mb-4">Technical Specifications</h3>
                            <table class="w-full">
                                <tbody>
                                    <tr class="border-b border-gray-200">
                                        <td class="py-3 text-gray-500">Model</td>
                                        <td class="py-3 text-gray-900">EB-2023</td>
                                    </tr>
                                    <tr class="border-b border-gray-200">
                                        <td class="py-3 text-gray-500">Driver Size</td>
                                        <td class="py-3 text-gray-900">10mm Dynamic Drivers</td>
                                    </tr>
                                    <tr class="border-b border-gray-200">
                                        <td class="py-3 text-gray-500">Bluetooth Version</td>
                                        <td class="py-3 text-gray-900">5.2</td>
                                    </tr>
                                    <tr class="border-b border-gray-200">
                                        <td class="py-3 text-gray-500">Bluetooth Range</td>
                                        <td class="py-3 text-gray-900">10 meters (33 feet)</td>
                                    </tr>
                                    <tr class="border-b border-gray-200">
                                        <td class="py-3 text-gray-500">Battery Capacity (Earbuds)</td>
                                        <td class="py-3 text-gray-900">60mAh each</td>
                                    </tr>
                                    <tr class="border-b border-gray-200">
                                        <td class="py-3 text-gray-500">Battery Capacity (Case)</td>
                                        <td class="py-3 text-gray-900">500mAh</td>
                                    </tr>
                                    <tr class="border-b border-gray-200">
                                        <td class="py-3 text-gray-500">Playtime (Earbuds)</td>
                                        <td class="py-3 text-gray-900">Up to 8 hours</td>
                                    </tr>
                                    <tr class="border-b border-gray-200">
                                        <td class="py-3 text-gray-500">Playtime (With Case)</td>
                                        <td class="py-3 text-gray-900">Up to 30 hours</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div>
                            <h3 class="text-lg font-bold mb-4">Physical Specifications</h3>
                            <table class="w-full">
                                <tbody>
                                    <tr class="border-b border-gray-200">
                                        <td class="py-3 text-gray-500">Dimensions (Earbuds)</td>
                                        <td class="py-3 text-gray-900">22 x 18 x 25 mm</td>
                                    </tr>
                                    <tr class="border-b border-gray-200">
                                        <td class="py-3 text-gray-500">Dimensions (Case)</td>
                                        <td class="py-3 text-gray-900">60 x 45 x 25 mm</td>
                                    </tr>
                                    <tr class="border-b border-gray-200">
                                        <td class="py-3 text-gray-500">Weight (Earbuds)</td>
                                        <td class="py-3 text-gray-900">5g each</td>
                                    </tr>
                                    <tr class="border-b border-gray-200">
                                        <td class="py-3 text-gray-500">Weight (Case)</td>
                                        <td class="py-3 text-gray-900">45g</td>
                                    </tr>
                                    <tr class="border-b border-gray-200">
                                        <td class="py-3 text-gray-500">Water Resistance</td>
                                        <td class="py-3 text-gray-900">IPX5</td>
                                    </tr>
                                    <tr class="border-b border-gray-200">
                                        <td class="py-3 text-gray-500">Available Colors</td>
                                        <td class="py-3 text-gray-900">Black, White, Blue, Red</td>
                                    </tr>
                                    <tr class="border-b border-gray-200">
                                        <td class="py-3 text-gray-500">Charging Port</td>
                                        <td class="py-3 text-gray-900">USB Type-C</td>
                                    </tr>
                                    <tr class="border-b border-gray-200">
                                        <td class="py-3 text-gray-500">Charging Time</td>
                                        <td class="py-3 text-gray-900">1.5 hours</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
                <!-- Reviews Tab (Hidden by default) -->
                <div class="tab-content hidden" id="content-reviews">
                    <div class="mb-8">
                        <div class="flex items-center mb-4">
                            <div class="flex text-yellow-400 text-xl mr-4">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                            <span class="text-gray-900 font-bold text-xl">4.5 out of 5</span>
                        </div>
                        <p class="text-gray-600 mb-4">Based on 128 reviews</p>
                        <div class="space-y-2">
                            <div class="flex items-center">
                                <span class="text-gray-600 w-12">5 star</span>
                                <div class="flex-grow h-4 mx-3 bg-gray-200 rounded-full overflow-hidden">
                                    <div class="bg-yellow-400 h-full rounded-full" style="width: 75%"></div>
                                </div>
                                <span class="text-gray-600 w-12 text-right">75%</span>
                            </div>
                            <div class="flex items-center">
                                <span class="text-gray-600 w-12">4 star</span>
                                <div class="flex-grow h-4 mx-3 bg-gray-200 rounded-full overflow-hidden">
                                    <div class="bg-yellow-400 h-full rounded-full" style="width: 15%"></div>
                                </div>
                                <span class="text-gray-600 w-12 text-right">15%</span>
                            </div>
                            <div class="flex items-center">
                                <span class="text-gray-600 w-12">3 star</span>
                                <div class="flex-grow h-4 mx-3 bg-gray-200 rounded-full overflow-hidden">
                                    <div class="bg-yellow-400 h-full rounded-full" style="width: 5%"></div>
                                </div>
                                <span class="text-gray-600 w-12 text-right">5%</span>
                            </div>
                            <div class="flex items-center">
                                <span class="text-gray-600 w-12">2 star</span>
                                <div class="flex-grow h-4 mx-3 bg-gray-200 rounded-full overflow-hidden">
                                    <div class="bg-yellow-400 h-full rounded-full" style="width: 3%"></div>
                                </div>
                                <span class="text-gray-600 w-12 text-right">3%</span>
                            </div>
                            <div class="flex items-center">
                                <span class="text-gray-600 w-12">1 star</span>
                                <div class="flex-grow h-4 mx-3 bg-gray-200 rounded-full overflow-hidden">
                                    <div class="bg-yellow-400 h-full rounded-full" style="width: 2%"></div>
                                </div>
                                <span class="text-gray-600 w-12 text-right">2%</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Write Review Button -->
                    <div class="mb-8">
                        <button class="bg-indigo-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-indigo-700 transition">
                            <i class="fas fa-pencil-alt mr-2"></i>
                            <span>Write a Review</span>
                        </button>
                    </div>
                    
                    <!-- Customer Reviews -->
                    <div class="space-y-6">
                        <!-- Review 1 -->
                        <div class="border-b border-gray-200 pb-6">
                            <div class="flex items-center mb-2">
                                <div class="flex text-yellow-400 mr-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4 class="font-bold text-gray-900">Amazing sound quality!</h4>
                            </div>
                            <div class="flex items-center text-sm text-gray-500 mb-3">
                                <span>By John D. on May 15, 2023</span>
                                <span class="mx-2">|</span>
                                <span>Verified Purchase</span>
                            </div>
                            <p class="text-gray-600 mb-3">
                                I've tried many wireless earbuds, but these are by far the best. The noise cancellation is excellent, and the sound quality is comparable to much more expensive brands. Battery life is impressive too - I can go several days without needing to charge the case.
                            </p>
                            <div class="flex items-center">
                                <button class="text-gray-500 hover:text-gray-700 transition mr-4">
                                    <i class="far fa-thumbs-up mr-1"></i>
                                    <span>Helpful (24)</span>
                                </button>
                                <button class="text-gray-500 hover:text-gray-700 transition">
                                    <i class="far fa-comment-alt mr-1"></i>
                                    <span>Comment</span>
                                </button>
                            </div>
                        </div>
                        
                        <!-- Review 2 -->
                        <div class="border-b border-gray-200 pb-6">
                            <div class="flex items-center mb-2">
                                <div class="flex text-yellow-400 mr-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <h4 class="font-bold text-gray-900">Great earbuds with minor issues</h4>
                            </div>
                            <div class="flex items-center text-sm text-gray-500 mb-3">
                                <span>By Sarah M. on April 28, 2023</span>
                                <span class="mx-2">|</span>
                                <span>Verified Purchase</span>
                            </div>
                            <p class="text-gray-600 mb-3">
                                The sound quality and noise cancellation are excellent. The touch controls are a bit too sensitive, and I sometimes pause my music accidentally when adjusting the earbuds. Battery life is good, but not quite as long as advertised. Overall, I'm happy with my purchase.
                            </p>
                            <div class="flex items-center">
                                <button class="text-gray-500 hover:text-gray-700 transition mr-4">
                                    <i class="far fa-thumbs-up mr-1"></i>
                                    <span>Helpful (16)</span>
                                </button>
                                <button class="text-gray-500 hover:text-gray-700 transition">
                                    <i class="far fa-comment-alt mr-1"></i>
                                    <span>Comment</span>
                                </button>
                            </div>
                        </div>
                        
                        <!-- Review 3 -->
                        <div class="border-b border-gray-200 pb-6">
                            <div class="flex items-center mb-2">
                                <div class="flex text-yellow-400 mr-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                                <h4 class="font-bold text-gray-900">Perfect for workouts!</h4>
                            </div>
                            <div class="flex items-center text-sm text-gray-500 mb-3">
                                <span>By Michael T. on May 3, 2023</span>
                                <span class="mx-2">|</span>
                                <span>Verified Purchase</span>
                            </div>
                            <p class="text-gray-600 mb-3">
                                I use these earbuds primarily for workouts, and they're perfect. They stay in place even during intense sessions, and the sweat resistance works as advertised. The sound quality motivates me during workouts, and the noise cancellation helps me focus. Highly recommended for fitness enthusiasts!
                            </p>
                            <div class="flex items-center">
                                <button class="text-gray-500 hover:text-gray-700 transition mr-4">
                                    <i class="far fa-thumbs-up mr-1"></i>
                                    <span>Helpful (19)</span>
                                </button>
                                <button class="text-gray-500 hover:text-gray-700 transition">
                                    <i class="far fa-comment-alt mr-1"></i>
                                    <span>Comment</span>
                                </button>
                            </div>
                        </div>
                        
                        <!-- Load More Button -->
                        <div class="text-center">
                            <button class="border border-gray-300 text-gray-700 px-6 py-3 rounded-lg font-medium hover:bg-gray-50 transition">
                                Load More Reviews
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Related Products -->
        <div class="mt-12">
            <h2 class="text-2xl font-bold mb-6">Related Products</h2>
            
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
                            <span class="text-gray-500 text-sm">Electronics</span>
                            <div class="flex text-yellow-400 text-sm">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                        <h3 class="font-medium text-gray-900 mb-2">Wireless Headphones</h3>
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
                            <span class="text-gray-500 text-sm">Electronics</span>
                            <div class="flex text-yellow-400 text-sm">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        <h3 class="font-medium text-gray-900 mb-2">Bluetooth Smartwatch</h3>
                        <div class="flex items-center justify-between">
                            <span class="text-indigo-600 font-bold">$129.99</span>
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
                            <span class="text-gray-500 text-sm">Electronics</span>
                            <div class="flex text-yellow-400 text-sm">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                        </div>
                        <h3 class="font-medium text-gray-900 mb-2">Wireless Charging Pad</h3>
                        <div class="flex items-center justify-between">
                            <span class="text-indigo-600 font-bold">$34.99</span>
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

@section('scripts')
<script>
    // Image Gallery
    function changeImage(src) {
        document.getElementById('main-image').src = src;
        
        // Update thumbnail borders
        document.querySelectorAll('.thumbnail').forEach(thumb => {
            if (thumb.src === src) {
                thumb.parentElement.classList.remove('border-gray-200');
                thumb.parentElement.classList.add('border-indigo-600', 'border-2');
            } else {
                thumb.parentElement.classList.remove('border-indigo-600', 'border-2');
                thumb.parentElement.classList.add('border-gray-200');
            }
        });
    }
    
    // Tabs
    document.addEventListener('DOMContentLoaded', function() {
        const tabs = ['description', 'specifications', 'reviews'];
        
        tabs.forEach(tab => {
            document.getElementById(`tab-${tab}`).addEventListener('click', function() {
                // Hide all content
                tabs.forEach(t => {
                    document.getElementById(`content-${t}`).classList.add('hidden');
                    document.getElementById(`tab-${t}`).classList.remove('border-indigo-600', 'text-indigo-600');
                    document.getElementById(`tab-${t}`).classList.add('border-transparent', 'text-gray-500');
                });
                
                // Show selected content
                document.getElementById(`content-${tab}`).classList.remove('hidden');
                document.getElementById(`tab-${tab}`).classList.remove('border-transparent', 'text-gray-500');
                document.getElementById(`tab-${tab}`).classList.add('border-indigo-600', 'text-indigo-600');
            });
        });
    });
</script>
@endsection
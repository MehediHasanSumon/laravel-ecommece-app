@if($viewMode === 'grid')
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @foreach($products as $product)
            <div class="product-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300">
                <div class="relative">
                    <!-- Product Image -->
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-64 object-cover">
                    
                    <!-- Discount Badge -->
                    @if($product->discounts->isNotEmpty() && $product->sale_price < $product->price)
                        @php
                            $discountPercentage = round((($product->price - $product->sale_price) / $product->price) * 100);
                        @endphp
                        <div class="absolute top-2 left-2 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded">
                            -{{ $discountPercentage }}%
                        </div>
                    @endif
                    
                    <!-- Quick Actions -->
                    <div class="absolute top-2 right-2 flex flex-col space-y-2">
                        <button onclick="openQuickView({{ $product->id }})" class="bg-white p-2 rounded-full shadow hover:bg-gray-100 transition-colors duration-300">
                            <i class="fas fa-eye text-gray-600"></i>
                        </button>
                        <button onclick="addToWishlist({{ $product->id }})" class="bg-white p-2 rounded-full shadow hover:bg-gray-100 transition-colors duration-300">
                            <i class="far fa-heart text-gray-600"></i>
                        </button>
                    </div>
                </div>
                
                <div class="p-4">
                    <!-- Category -->
                    <div class="text-xs text-gray-500 mb-1">{{ $product->category->name ?? 'Uncategorized' }}</div>
                    
                    <!-- Product Name -->
                    <h3 class="text-lg font-semibold mb-2 hover:text-indigo-600 transition-colors duration-300">
                        <a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a>
                    </h3>
                    
                    <!-- Rating -->
                    <div class="flex items-center mb-2">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= floor($product->rating))
                                <i class="fas fa-star text-yellow-400"></i>
                            @elseif($i - 0.5 <= $product->rating)
                                <i class="fas fa-star-half-alt text-yellow-400"></i>
                            @else
                                <i class="far fa-star text-yellow-400"></i>
                            @endif
                        @endfor
                        <span class="text-gray-500 text-xs ml-1">({{ $product->rating }})</span>
                    </div>
                    
                    <!-- Price -->
                    <div class="flex items-center justify-between">
                        <div>
                            @if($product->sale_price && $product->sale_price < $product->price)
                                <span class="text-indigo-600 font-bold">${{ number_format($product->sale_price, 2) }}</span>
                                <span class="text-gray-400 line-through text-sm ml-2">${{ number_format($product->price, 2) }}</span>
                            @else
                                <span class="text-indigo-600 font-bold">${{ number_format($product->price, 2) }}</span>
                            @endif
                        </div>
                        
                        <!-- Add to Cart -->
                        <button 
                            onclick="addToCart({{ $product->id }}, 1)" 
                            class="bg-indigo-600 text-white px-3 py-1 rounded-full text-sm hover:bg-indigo-700 transition-colors duration-300"
                        >
                            <i class="fas fa-shopping-cart mr-1"></i> Add
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@else
    <div class="space-y-6">
        @foreach($products as $product)
            <div class="product-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow duration-300 flex flex-col md:flex-row">
                <!-- Product Image -->
                <div class="relative md:w-1/4">
                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-64 md:h-full object-cover">
                    
                    <!-- Discount Badge -->
                    @if($product->discounts->isNotEmpty() && $product->sale_price < $product->price)
                        @php
                            $discountPercentage = round((($product->price - $product->sale_price) / $product->price) * 100);
                        @endphp
                        <div class="absolute top-2 left-2 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded">
                            -{{ $discountPercentage }}%
                        </div>
                    @endif
                </div>
                
                <div class="p-4 md:w-3/4 flex flex-col justify-between">
                    <div>
                        <!-- Category -->
                        <div class="text-xs text-gray-500 mb-1">{{ $product->category->name ?? 'Uncategorized' }}</div>
                        
                        <!-- Product Name -->
                        <h3 class="text-xl font-semibold mb-2 hover:text-indigo-600 transition-colors duration-300">
                            <a href="{{ route('shop.show', $product->slug) }}">{{ $product->name }}</a>
                        </h3>
                        
                        <!-- Rating -->
                        <div class="flex items-center mb-2">
                            @for($i = 1; $i <= 5; $i++)
                                @if($i <= floor($product->rating))
                                    <i class="fas fa-star text-yellow-400"></i>
                                @elseif($i - 0.5 <= $product->rating)
                                    <i class="fas fa-star-half-alt text-yellow-400"></i>
                                @else
                                    <i class="far fa-star text-yellow-400"></i>
                                @endif
                            @endfor
                            <span class="text-gray-500 text-xs ml-1">({{ $product->rating }})</span>
                        </div>
                        
                        <!-- Short Description -->
                        <p class="text-gray-600 mb-4 line-clamp-2">{{ $product->short_description }}</p>
                    </div>
                    
                    <div class="flex items-center justify-between mt-4">
                        <!-- Price -->
                        <div>
                            @if($product->sale_price && $product->sale_price < $product->price)
                                <span class="text-indigo-600 font-bold text-xl">${{ number_format($product->sale_price, 2) }}</span>
                                <span class="text-gray-400 line-through text-sm ml-2">${{ number_format($product->price, 2) }}</span>
                            @else
                                <span class="text-indigo-600 font-bold text-xl">${{ number_format($product->price, 2) }}</span>
                            @endif
                        </div>
                        
                        <!-- Actions -->
                        <div class="flex space-x-2">
                            <button onclick="openQuickView({{ $product->id }})" class="bg-gray-200 p-2 rounded-full hover:bg-gray-300 transition-colors duration-300">
                                <i class="fas fa-eye text-gray-600"></i>
                            </button>
                            <button onclick="addToWishlist({{ $product->id }})" class="bg-gray-200 p-2 rounded-full hover:bg-gray-300 transition-colors duration-300">
                                <i class="far fa-heart text-gray-600"></i>
                            </button>
                            <button 
                                onclick="addToCart({{ $product->id }}, 1)" 
                                class="bg-indigo-600 text-white px-4 py-2 rounded-full hover:bg-indigo-700 transition-colors duration-300 flex items-center"
                            >
                                <i class="fas fa-shopping-cart mr-2"></i> Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif

<!-- Pagination Links -->
<div class="mt-8">
    {{ $products->links() }}
</div>
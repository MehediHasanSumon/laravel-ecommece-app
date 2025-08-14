@extends('layouts.shop')

@section('title', 'Shop - ShopEase')

@section('content')
    @include('components.quick-view-modal')
    <!-- Breadcrumb -->
    <div class="bg-gray-100 py-3">
        <div class="container mx-auto px-4">
            <div class="flex items-center space-x-2 text-sm">
                <a href="{{ route('home') }}" class="text-gray-600 hover:text-indigo-600 transition">Home</a>
                <span class="text-gray-400">/</span>
                @if(request()->filled('category') && isset($categories))
                    @php
                        $categoryId = request()->category;
                        $category = $categories->firstWhere('id', $categoryId);
                    @endphp
                    @if($category)
                        <a href="{{ route('shop') }}" class="text-gray-600 hover:text-indigo-600 transition">Shop</a>
                        <span class="text-gray-400">/</span>
                        @if($category->parent)
                            <a href="{{ route('shop', ['category' => $category->parent->id]) }}" class="text-gray-600 hover:text-indigo-600 transition">{{ $category->parent->name }}</a>
                            <span class="text-gray-400">/</span>
                        @endif
                        <span class="text-indigo-600 font-medium">{{ $category->name }}</span>
                    @else
                        <span class="text-indigo-600 font-medium">Shop</span>
                    @endif
                @else
                    <span class="text-indigo-600 font-medium">Shop</span>
                @endif
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Sidebar Filters -->
            <div class="lg:w-1/4">
                <div class="bg-white rounded-lg shadow-sm p-6 sticky top-6">
                    <div class="mb-6">
                        <h3 class="text-lg font-bold mb-4">Categories</h3>
                        <ul class="space-y-2">
                            <li>
                                <a href="{{ route('shop') }}" class="flex items-center justify-between {{ !request()->filled('category') ? 'text-indigo-600 font-medium' : 'text-gray-700 hover:text-indigo-600 transition' }}">
                                    <span>All Categories</span>
                                    <span class="bg-{{ !request()->filled('category') ? 'indigo' : 'gray' }}-100 text-{{ !request()->filled('category') ? 'indigo' : 'gray' }}-800 text-xs font-medium px-2 py-1 rounded-full">{{ $products->total() }}</span>
                                </a>
                            </li>
                            @foreach($categories as $category)
                                <li>
                                    <a href="{{ route('shop', ['category' => $category->id]) }}" class="flex items-center justify-between {{ request('category') == $category->id ? 'text-indigo-600 font-medium' : 'text-gray-700 hover:text-indigo-600 transition' }}">
                                        <span>{{ $category->name }}</span>
                                        <span class="bg-{{ request('category') == $category->id ? 'indigo' : 'gray' }}-100 text-{{ request('category') == $category->id ? 'indigo' : 'gray' }}-800 text-xs font-medium px-2 py-1 rounded-full">{{ $category->product_count }}</span>
                                    </a>
                                    @if($category->children && $category->children->count() > 0)
                                        <ul class="pl-4 mt-2 space-y-1">
                                            @foreach($category->children as $child)
                                                <li>
                                                    <a href="{{ route('shop', ['category' => $child->id]) }}" class="flex items-center justify-between {{ request('category') == $child->id ? 'text-indigo-600 font-medium' : 'text-gray-700 hover:text-indigo-600 transition' }}">
                                                        <span>{{ $child->name }}</span>
                                                        <span class="bg-{{ request('category') == $child->id ? 'indigo' : 'gray' }}-100 text-{{ request('category') == $child->id ? 'indigo' : 'gray' }}-800 text-xs font-medium px-2 py-1 rounded-full">{{ $child->product_count }}</span>
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    
                    <form id="filter-form" action="{{ route('shop') }}" method="GET" class="space-y-6">
                        @if(request()->filled('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif
                        @if(request()->filled('view'))
                            <input type="hidden" name="view" value="{{ request('view') }}">
                        @endif
                        @if(request()->filled('sort'))
                            <input type="hidden" name="sort" value="{{ request('sort') }}">
                        @endif
                        
                        <div class="mb-6">
                            <h3 class="text-lg font-bold mb-4">Price Range</h3>
                            <div class="space-y-4">
                                <div class="flex flex-col">
                                    <label for="min_price" class="mb-1 text-sm text-gray-700">Min Price ($)</label>
                                    <input type="number" id="min_price" name="min_price" value="{{ request('min_price') }}" min="0" class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                </div>
                                <div class="flex flex-col">
                                    <label for="max_price" class="mb-1 text-sm text-gray-700">Max Price ($)</label>
                                    <input type="number" id="max_price" name="max_price" value="{{ request('max_price') }}" min="0" class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                </div>
                            </div>
                        </div>
                    
                    <div class="mb-6">
                        <h3 class="text-lg font-bold mb-4">Size</h3>
                        <div class="grid grid-cols-4 gap-2">
                            @php
                                $sizes = ['XS', 'S', 'M', 'L', 'XL', '2XL', '3XL', '4XL'];
                                $selectedSizes = request('size', []);
                            @endphp
                            
                            @foreach($sizes as $size)
                                <div class="flex items-center justify-center">
                                    <input type="checkbox" id="size-{{ $size }}" name="size[]" value="{{ $size }}" 
                                        {{ in_array($size, (array)$selectedSizes) ? 'checked' : '' }}
                                        class="hidden peer">
                                    <label for="size-{{ $size }}" 
                                        class="w-full text-center border border-gray-300 rounded-md px-2 py-1 cursor-pointer peer-checked:bg-indigo-600 peer-checked:text-white peer-checked:border-indigo-600 hover:bg-gray-100 transition-colors">
                                        {{ $size }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <h3 class="text-lg font-bold mb-4">Color</h3>
                        <div class="flex flex-wrap gap-2">
                            @php
                                $colors = [
                                    'red' => '#f44336',
                                    'blue' => '#2196f3',
                                    'green' => '#4caf50',
                                    'yellow' => '#ffeb3b',
                                    'purple' => '#9c27b0',
                                    'orange' => '#ff9800',
                                    'black' => '#000000',
                                    'white' => '#ffffff',
                                ];
                                $selectedColors = request('color', []);
                            @endphp
                            
                            @foreach($colors as $colorName => $colorHex)
                                <div class="relative">
                                    <input type="checkbox" id="color-{{ $colorName }}" name="color[]" value="{{ $colorName }}" 
                                        {{ in_array($colorName, (array)$selectedColors) ? 'checked' : '' }}
                                        class="hidden peer">
                                    <label for="color-{{ $colorName }}" 
                                        class="block w-8 h-8 rounded-full cursor-pointer border-2 peer-checked:border-indigo-600 hover:opacity-90 transition-opacity"
                                        style="background-color: {{ $colorHex }}; {{ $colorName == 'white' ? 'border: 1px solid #e5e7eb;' : '' }}">
                                    </label>
                                    <div class="absolute -bottom-1 -right-1 w-4 h-4 bg-indigo-600 rounded-full text-white flex items-center justify-center text-xs opacity-0 peer-checked:opacity-100">
                                        <i class="fas fa-check"></i>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <h3 class="text-lg font-bold mb-4">Rating</h3>
                        <div class="space-y-2">
                            <div class="flex items-center">
                                <input id="rating-all" type="radio" name="rating" value="" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500" {{ !request()->filled('rating') ? 'checked' : '' }}>
                                <label for="rating-all" class="ml-2 text-gray-700">All Ratings</label>
                            </div>
                            <div class="flex items-center">
                                <input id="rating-4" type="radio" name="rating" value="4" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500" {{ request('rating') == '4' ? 'checked' : '' }}>
                                <label for="rating-4" class="ml-2 flex items-center">
                                    <div class="flex text-yellow-400">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <span class="ml-1 text-gray-700">& Up</span>
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="rating-3" type="radio" name="rating" value="3" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500" {{ request('rating') == '3' ? 'checked' : '' }}>
                                <label for="rating-3" class="ml-2 flex items-center">
                                    <div class="flex text-yellow-400">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <span class="ml-1 text-gray-700">& Up</span>
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="rating-2" type="radio" name="rating" value="2" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500" {{ request('rating') == '2' ? 'checked' : '' }}>
                                <label for="rating-2" class="ml-2 flex items-center">
                                    <div class="flex text-yellow-400">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                        <i class="far fa-star"></i>
                                    </div>
                                    <span class="ml-1 text-gray-700">& Up</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <h3 class="text-lg font-bold mb-4">Availability</h3>
                        <div class="flex items-center">
                            <input id="in-stock" type="checkbox" name="in_stock" value="1" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500" {{ request()->has('in_stock') ? 'checked' : '' }}>
                            <label for="in-stock" class="ml-2 text-gray-700">In Stock Only</label>
                        </div>
                    </div>
                    
                    <div class="flex space-x-3">
                        <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-indigo-700 transition w-full">Apply Filters</button>
                        <button id="reset-filters" type="button" class="border border-gray-300 text-gray-700 px-4 py-2 rounded-lg font-medium hover:bg-gray-50 transition text-center w-full">Reset</button>
                    </div>
                    </form>
                </div>
            </div>
            
            <!-- Product Grid -->
            <div class="lg:w-3/4" id="products-container">
                <!-- Sorting and View Options -->
                <div class="flex flex-col sm:flex-row justify-between items-center mb-6 bg-white rounded-lg shadow-sm p-4">
                    <div class="mb-4 sm:mb-0">
                        <p class="text-gray-600"><span class="font-medium">{{ $products->total() }}</span> products found</p>
                    </div>
                    <div class="flex flex-wrap items-center gap-4">
                        <div>
                            <label for="per-page" class="text-gray-700 mr-2">Show:</label>
                            <select id="per-page" name="per_page" class="border border-gray-300 rounded-lg px-3 py-1 focus:outline-none focus:border-indigo-500 ajax-filter">
                                <option value="12" {{ request('per_page') == 12 || !request('per_page') ? 'selected' : '' }}>12</option>
                                <option value="24" {{ request('per_page') == 24 ? 'selected' : '' }}>24</option>
                                <option value="36" {{ request('per_page') == 36 ? 'selected' : '' }}>36</option>
                                <option value="48" {{ request('per_page') == 48 ? 'selected' : '' }}>48</option>
                            </select>
                        </div>
                        <div>
                            <label for="sort" class="text-gray-700 mr-2">Sort by:</label>
                            <select id="sort" name="sort" class="border border-gray-300 rounded-lg px-3 py-1 focus:outline-none focus:border-indigo-500 ajax-filter">
                                <option value="featured" {{ request('sort') == 'featured' || !request('sort') ? 'selected' : '' }}>Featured</option>
                                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest</option>
                                <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                                <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                                <option value="popularity" {{ request('sort') == 'popularity' ? 'selected' : '' }}>Popularity</option>
                                <option value="rating" {{ request('sort') == 'rating' ? 'selected' : '' }}>Top Rated</option>
                            </select>
                        </div>
                        <div class="flex space-x-2">
                            <button type="button" data-view="grid" class="{{ $viewMode == 'grid' ? 'bg-indigo-600 text-white' : 'bg-gray-200 text-gray-700' }} p-2 rounded-lg hover:{{ $viewMode == 'grid' ? 'bg-indigo-700' : 'bg-gray-300' }} transition">
                                <i class="fas fa-th"></i>
                            </button>
                            <button type="button" data-view="list" class="{{ $viewMode == 'list' ? 'bg-indigo-600 text-white' : 'bg-gray-200 text-gray-700' }} p-2 rounded-lg hover:{{ $viewMode == 'list' ? 'bg-indigo-700' : 'bg-gray-300' }} transition">
                                <i class="fas fa-list"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Products Grid/List View -->
                <div class="{{ $viewMode == 'grid' ? 'grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6' : 'space-y-6' }}">
                    @forelse($products as $product)
                        @if($viewMode == 'grid')
                        <!-- Product Card - Grid View -->
                        <div class="bg-white rounded-lg shadow-sm overflow-hidden group">
                            <div class="relative">
                                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-64 object-cover object-center">
                                @if($product->sale_price && $product->sale_price < $product->price)
                                    @php
                                        $discountPercentage = round((($product->price - $product->sale_price) / $product->price) * 100);
                                    @endphp
                                    <div class="absolute top-2 left-2">
                                        <span class="bg-red-500 text-white text-xs font-bold px-2 py-1 rounded">-{{ $discountPercentage }}%</span>
                                    </div>
                                @endif
                                <div class="absolute top-2 right-2">
                                    <button class="bg-white p-2 rounded-full text-gray-400 hover:text-red-500 transition">
                                        <i class="far fa-heart"></i>
                                    </button>
                                </div>
                                <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
                                    <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-indigo-700 transition mr-2" onclick="openQuickView({{ $product->id }})">
                                        <i class="fas fa-eye mr-1"></i> Quick View
                                    </button>
                                    <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-indigo-700 transition">
                                        <i class="fas fa-shopping-cart mr-1"></i> Add to Cart
                                    </button>
                                </div>
                            </div>
                            <div class="p-4">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-gray-500 text-sm">{{ $product->category ? $product->category->name : 'Uncategorized' }}</span>
                                    <div class="flex text-yellow-400 text-sm">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= floor($product->rating))
                                                <i class="fas fa-star"></i>
                                            @elseif($i - 0.5 <= $product->rating)
                                                <i class="fas fa-star-half-alt"></i>
                                            @else
                                                <i class="far fa-star"></i>
                                            @endif
                                        @endfor
                                        <span class="text-gray-500 ml-1">{{ number_format($product->rating, 1) }}</span>
                                    </div>
                                </div>
                                <h3 class="font-medium text-gray-900 mb-2">{{ $product->name }}</h3>
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        @if($product->sale_price && $product->sale_price < $product->price)
                                            <span class="text-indigo-600 font-bold">${{ number_format($product->sale_price, 2) }}</span>
                                            <span class="text-gray-400 line-through ml-2">${{ number_format($product->price, 2) }}</span>
                                        @else
                                            <span class="text-indigo-600 font-bold">${{ number_format($product->price, 2) }}</span>
                                        @endif
                                    </div>
                                    <button class="bg-indigo-100 p-2 rounded-full text-indigo-600 hover:bg-indigo-200 transition">
                                        <i class="fas fa-shopping-cart"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        @else
                        <!-- Product Card - List View -->
                        <div class="bg-white rounded-lg shadow-sm overflow-hidden group">
                            <div class="flex flex-col md:flex-row">
                                <div class="relative md:w-1/3">
                                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-full h-64 md:h-full object-cover object-center">
                                    @if($product->sale_price && $product->sale_price < $product->price)
                                        @php
                                            $discountPercentage = round((($product->price - $product->sale_price) / $product->price) * 100);
                                        @endphp
                                        <div class="absolute top-2 left-2">
                                            <span class="bg-red-500 text-white text-xs font-bold px-2 py-1 rounded">-{{ $discountPercentage }}%</span>
                                        </div>
                                    @endif
                                    <div class="absolute top-2 right-2">
                                        <button class="bg-white p-2 rounded-full text-gray-400 hover:text-red-500 transition">
                                            <i class="far fa-heart"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="p-6 md:w-2/3">
                                    <div class="flex items-center justify-between mb-2">
                                        <span class="text-gray-500 text-sm">{{ $product->category ? $product->category->name : 'Uncategorized' }}</span>
                                        <div class="flex text-yellow-400 text-sm">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= floor($product->rating))
                                                    <i class="fas fa-star"></i>
                                                @elseif($i - 0.5 <= $product->rating)
                                                    <i class="fas fa-star-half-alt"></i>
                                                @else
                                                    <i class="far fa-star"></i>
                                                @endif
                                            @endfor
                                            <span class="text-gray-500 ml-1">{{ number_format($product->rating, 1) }}</span>
                                        </div>
                                    </div>
                                    <h3 class="text-xl font-medium text-gray-900 mb-3">{{ $product->name }}</h3>
                                    <p class="text-gray-600 mb-4">{{ $product->short_description }}</p>
                                    <div class="flex flex-wrap gap-2 mb-4">
                                        @if($product->sizes)
                                            <div class="flex items-center">
                                                <span class="text-gray-700 font-medium mr-2">Sizes:</span>
                                                <div class="flex gap-1">
                                                    @foreach($product->sizes as $size)
                                                        <span class="px-2 py-1 border border-gray-300 rounded-md text-xs">{{ $size }}</span>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                        @if($product->colors)
                                            <div class="flex items-center">
                                                <span class="text-gray-700 font-medium mr-2">Colors:</span>
                                                <div class="flex gap-1">
                                                    @foreach($product->colors as $color)
                                                        <span class="w-4 h-4 rounded-full border border-gray-300" style="background-color: {{ $color }}"></span>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            @if($product->sale_price && $product->sale_price < $product->price)
                                                <span class="text-indigo-600 font-bold text-xl">${{ number_format($product->sale_price, 2) }}</span>
                                                <span class="text-gray-400 line-through ml-2">${{ number_format($product->price, 2) }}</span>
                                            @else
                                                <span class="text-indigo-600 font-bold text-xl">${{ number_format($product->price, 2) }}</span>
                                            @endif
                                        </div>
                                        <div class="flex space-x-2">
                                            <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-indigo-700 transition" onclick="openQuickView({{ $product->id }})">
                                                <i class="fas fa-eye mr-1"></i> Quick View
                                            </button>
                                            <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-indigo-700 transition">
                                                <i class="fas fa-shopping-cart mr-1"></i> Add to Cart
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    @empty
                        <div class="col-span-full py-10 text-center">
                            <div class="text-gray-500 mb-4">
                                <i class="fas fa-search fa-3x"></i>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">No products found</h3>
                            <p class="text-gray-600">Try adjusting your search or filter criteria</p>
                            <a href="{{ route('shop') }}" class="mt-4 inline-block bg-indigo-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-indigo-700 transition">
                                Reset Filters
                            </a>
                        </div>
                    @endforelse
                    


                                <button class="bg-indigo-100 p-2 rounded-full text-indigo-600 hover:bg-indigo-200 transition">
                                    <i class="fas fa-shopping-cart"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                  </div>
                
                <!-- Pagination Info -->
                <div class="flex justify-between items-center mt-10">
                    <p id="pagination-info" class="text-gray-600">Showing {{ $products->count() }} of {{ $products->total() }} products</p>
                    
                    <!-- Standard Pagination -->
                    <div class="pagination-links">
                        {{ $products->onEachSide(1)->links() }}
                    </div>
                </div>
                
                <!-- Load More Button for Infinite Scroll -->
                <div id="load-more-container" class="text-center mt-8 {{ $products->hasMorePages() ? '' : 'hidden' }}">
                    <button 
                        id="load-more-btn" 
                        class="bg-indigo-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-indigo-700 transition inline-flex items-center"
                        data-page="{{ $products->currentPage() + 1 }}"
                    >
                        <span>Load More Products</span>
                        <svg id="load-more-spinner" class="animate-spin ml-2 h-4 w-4 text-white hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </main>
@endsection
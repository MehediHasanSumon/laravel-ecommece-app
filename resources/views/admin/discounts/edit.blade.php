@extends('layouts.admin')

@section('title', 'Edit Discount')

@section('content')
<!-- Page Header -->
<div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
    <div>
        <h2 class="text-2xl font-bold text-gray-800">Edit Discount</h2>
        <p class="mt-1 text-sm text-gray-500">Update discount information for {{ $discount->name }}</p>
    </div>
    <div class="mt-4 md:mt-0">
        <a href="{{ route('admin.discounts.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg flex items-center shadow-sm transition-all duration-200">
            <i class="fas fa-arrow-left mr-2"></i> Back to Discounts
        </a>
    </div>
</div>

<div class="bg-white rounded-lg shadow-sm overflow-hidden mb-6 border border-gray-100">
    <div class="p-4 bg-gray-50 border-b border-gray-100">
        <div class="flex items-center">
            <i class="fas fa-percent text-indigo-500 mr-2"></i>
            <h3 class="font-medium text-gray-700">Discount Information</h3>
        </div>
    </div>
    <div class="p-6">
        <form action="{{ route('admin.discounts.update', $discount) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Discount Name <span class="text-red-500">*</span></label>
                        <input type="text" class="w-full border @error('name') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="name" name="name" value="{{ old('name', $discount->name) }}" required>
                        <p class="text-gray-500 text-xs mt-1">Enter a descriptive name for this discount.</p>
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <textarea class="w-full border @error('description') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="description" name="description" rows="3">{{ old('description', $discount->description) }}</textarea>
                        <p class="text-gray-500 text-xs mt-1">Brief description of the discount for internal reference.</p>
                        @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="type" class="block text-sm font-medium text-gray-700 mb-1">Discount Type <span class="text-red-500">*</span></label>
                        <select class="w-full border @error('type') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="type" name="type" required>
                            <option value="">Select Discount Type</option>
                            <option value="percentage" {{ old('type', $discount->type) == 'percentage' ? 'selected' : '' }}>Percentage Discount</option>
                            <option value="fixed" {{ old('type', $discount->type) == 'fixed' ? 'selected' : '' }}>Fixed Amount Discount</option>
                        </select>
                        @error('type')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="value" class="block text-sm font-medium text-gray-700 mb-1">Discount Value <span class="text-red-500">*</span></label>
                        <div class="relative rounded-md shadow-sm">
                            <input type="number" step="0.01" min="0" class="w-full border @error('value') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 pr-10" id="value" name="value" value="{{ old('value', $discount->value) }}" required>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <span class="text-gray-500" id="value-addon">{{ $discount->type == 'percentage' ? '%' : '$' }}</span>
                            </div>
                        </div>
                        <p class="text-gray-500 text-xs mt-1">For percentage type, enter a value between 1-100. For fixed amount, enter the discount value in dollars.</p>
                        @error('value')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div>
                    <div class="mb-4">
                        <label for="starts_at" class="block text-sm font-medium text-gray-700 mb-1">Start Date</label>
                        <input type="datetime-local" class="w-full border @error('starts_at') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="starts_at" name="starts_at" value="{{ old('starts_at', $discount->starts_at ? $discount->starts_at->format('Y-m-d\TH:i') : '') }}">
                        <p class="text-gray-500 text-xs mt-1">When this discount becomes valid. Leave empty to make it valid immediately.</p>
                        @error('starts_at')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="expires_at" class="block text-sm font-medium text-gray-700 mb-1">Expiration Date</label>
                        <input type="datetime-local" class="w-full border @error('expires_at') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="expires_at" name="expires_at" value="{{ old('expires_at', $discount->expires_at ? $discount->expires_at->format('Y-m-d\TH:i') : '') }}">
                        <p class="text-gray-500 text-xs mt-1">When this discount expires. Leave empty for no expiration.</p>
                        @error('expires_at')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="flex space-x-4 mb-4">
                        <div class="flex items-center">
                            <input class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" type="checkbox" id="applies_to_all_products" name="applies_to_all_products" value="1" {{ old('applies_to_all_products', $discount->applies_to_all_products) ? 'checked' : '' }}>
                            <label class="ml-2 block text-sm text-gray-700" for="applies_to_all_products">Apply to All Products</label>
                        </div>
                        
                        <div class="flex items-center">
                            <input class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $discount->is_active) ? 'checked' : '' }}>
                            <label class="ml-2 block text-sm text-gray-700" for="is_active">Active</label>
                        </div>
                    </div>
                    <p class="text-gray-500 text-xs mb-4">If "Apply to All Products" is checked, this discount will apply to all products. Otherwise, you'll need to select specific products below.</p>
                </div>
            </div>
                
                <div id="product-selection" class="mb-6" style="display: {{ old('applies_to_all_products', $discount->applies_to_all_products) ? 'none' : 'block' }}">
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-100">
                        <div class="p-4 bg-gray-50 border-b border-gray-100">
                            <div class="flex items-center">
                                <i class="fas fa-boxes text-indigo-500 mr-2"></i>
                                <h3 class="font-medium text-gray-700">Select Products</h3>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="mb-4">
                                <div class="relative rounded-md shadow-sm">
                                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                        <i class="fas fa-search text-gray-400"></i>
                                    </div>
                                    <input type="text" class="w-full pl-10 border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="product-search" placeholder="Search products...">
                                </div>
                            </div>
                            
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                <div class="flex items-center">
                                                    <input class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" type="checkbox" id="select-all-products">
                                                </div>
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">SKU</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Category</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @php
                                            $selectedProductIds = old('product_ids', $discount->products->pluck('id')->toArray());
                                        @endphp
                                        @foreach($products as $product)
                                            <tr class="product-row hover:bg-gray-50">
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        <input class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded product-checkbox" type="checkbox" name="product_ids[]" value="{{ $product->id }}" {{ in_array($product->id, $selectedProductIds) ? 'checked' : '' }}>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                        @if($product->image)
                                                            <img src="{{ $product->image }}" alt="{{ $product->name }}" class="h-10 w-10 rounded-full object-cover mr-3 border border-gray-200">
                                                        @endif
                                                        <div class="text-sm font-medium text-gray-900">{{ $product->name }}</div>
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $product->sku }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">${{ number_format($product->price, 2) }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                                        {{ $product->category ? $product->category->name : 'Uncategorized' }}
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="flex justify-end space-x-3 mt-6">
                    <a href="{{ route('admin.discounts.index') }}" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg transition-all duration-200">Cancel</a>
                    <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg shadow-sm transition-all duration-200">Update Discount</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Update value addon based on discount type
        function updateValueAddon() {
            var type = $('#type').val();
            if (type === 'percentage') {
                $('#value-addon').text('%');
            } else {
                $('#value-addon').text('$');
            }
        }
        
        // Initial update
        updateValueAddon();
        
        // Update on change
        $('#type').change(function() {
            updateValueAddon();
        });
        
        // Toggle product selection based on applies_to_all_products
        $('#applies_to_all_products').change(function() {
            if ($(this).is(':checked')) {
                $('#product-selection').slideUp();
            } else {
                $('#product-selection').slideDown();
            }
        });
        
        // Select all products
        $('#select-all-products').change(function() {
            $('.product-checkbox').prop('checked', $(this).is(':checked'));
        });
        
        // Product search
        $('#product-search').on('keyup', function() {
            var value = $(this).val().toLowerCase();
            $('.product-row').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
            });
        });
    });
</script>
@endsection
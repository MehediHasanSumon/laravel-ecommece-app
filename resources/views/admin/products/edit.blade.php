@extends('layouts.admin')

@section('title', 'Edit Product')

@section('content')
<!-- Page Header -->
<div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
    <div>
        <h2 class="text-2xl font-bold text-gray-800">Edit Product</h2>
        <p class="mt-1 text-sm text-gray-500">Update product information for {{ $product->name }}</p>
    </div>
    <div class="mt-4 md:mt-0">
        <a href="{{ route('admin.products.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-lg flex items-center shadow-sm transition-all duration-200">
            <i class="fas fa-arrow-left mr-2"></i> Back to Products
        </a>
    </div>
</div>

<div class="bg-white rounded-lg shadow-sm overflow-hidden mb-6 border border-gray-100">
    <div class="p-4 bg-gray-50 border-b border-gray-100">
        <div class="flex items-center">
            <i class="fas fa-edit text-indigo-500 mr-2"></i>
            <h3 class="font-medium text-gray-700">Product Information</h3>
        </div>
    </div>
    <div class="p-6">
        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Product Name <span class="text-red-500">*</span></label>
                        <input type="text" class="w-full border @error('name') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="name" name="name" value="{{ old('name', $product->name) }}" required>
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="slug" class="block text-sm font-medium text-gray-700 mb-1">Slug</label>
                        <input type="text" class="w-full border @error('slug') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="slug" name="slug" value="{{ old('slug', $product->slug) }}">
                        <p class="text-gray-500 text-xs mt-1">Leave empty to auto-generate from name.</p>
                        @error('slug')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="sku" class="block text-sm font-medium text-gray-700 mb-1">SKU <span class="text-red-500">*</span></label>
                        <input type="text" class="w-full border @error('sku') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="sku" name="sku" value="{{ old('sku', $product->sku) }}" required>
                        @error('sku')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Price <span class="text-red-500">*</span></label>
                            <div class="relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500">$</span>
                                </div>
                                <input type="number" step="0.01" min="0" class="w-full pl-7 border @error('price') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="price" name="price" value="{{ old('price', $product->price) }}" required>
                            </div>
                            @error('price')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="sale_price" class="block text-sm font-medium text-gray-700 mb-1">Sale Price</label>
                            <div class="relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500">$</span>
                                </div>
                                <input type="number" step="0.01" min="0" class="w-full pl-7 border @error('sale_price') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="sale_price" name="sale_price" value="{{ old('sale_price', $product->sale_price) }}">
                            </div>
                            @error('sale_price')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label for="stock_quantity" class="block text-sm font-medium text-gray-700 mb-1">Stock Quantity <span class="text-red-500">*</span></label>
                        <input type="number" min="0" class="w-full border @error('stock_quantity') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="stock_quantity" name="stock_quantity" value="{{ old('stock_quantity', $product->stock_quantity) }}" required>
                        @error('stock_quantity')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="mb-4">
                        <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                        <select class="w-full border @error('category_id') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="category_id" name="category_id">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                
                <div>
                    <div class="mb-4">
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Main Product Image</label>
                        <div class="flex items-center space-x-2">
                            <label class="flex flex-col items-center px-4 py-2 bg-white text-indigo-600 rounded-lg border border-gray-300 cursor-pointer hover:bg-gray-50 transition-colors duration-200">
                                <span class="text-sm">Select image</span>
                                <input type="file" class="hidden" id="main-image-upload" name="main_image" accept="image/*">
                            </label>
                            <input type="hidden" id="image" name="image" value="{{ old('image', $product->image) }}">
                            <span id="main-image-filename" class="text-sm text-gray-500">{{ $product->image ? basename($product->image) : 'No file selected' }}</span>
                        </div>
                        @error('image')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        <div class="mt-2" id="main-image-preview">
                            @if($product->image)
                                <div class="relative group inline-block">
                                    <img src="{{ $product->image }}" alt="{{ $product->name }}" class="rounded-md border border-gray-200" style="max-height: 100px;">
                                    <button type="button" id="remove-main-image" class="absolute top-0 right-0 bg-red-500 text-white rounded-full p-1 shadow-sm opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Product Gallery Images</label>
                        <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4h-12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="gallery-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none">
                                        <span>Upload images</span>
                                        <input id="gallery-upload" name="gallery_uploads[]" type="file" class="sr-only" multiple accept="image/*">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">PNG, JPG, GIF up to 10MB</p>
                            </div>
                        </div>
                        
                        <div id="gallery-preview" class="mt-4 grid grid-cols-2 md:grid-cols-4 gap-4">
                            @if($product->gallery)
                                @foreach($product->gallery as $index => $image)
                                    <div class="relative group">
                                        <img src="{{ $image }}" alt="Gallery image {{ $index + 1 }}" class="h-24 w-full object-cover rounded-md border border-gray-200">
                                        <input type="hidden" name="gallery[]" value="{{ $image }}">
                                        <button type="button" class="absolute top-0 right-0 bg-red-500 text-white rounded-full p-1 shadow-sm opacity-0 group-hover:opacity-100 transition-opacity duration-200 remove-gallery-image">
                                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                        
                        <div class="mb-4">
                            <label for="short_description" class="block text-sm font-medium text-gray-700 mb-1">Short Description</label>
                            <textarea class="w-full border @error('short_description') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="short_description" name="short_description" rows="3">{{ old('short_description', $product->short_description) }}</textarea>
                            @error('short_description')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Full Description</label>
                            <textarea class="w-full border @error('description') border-red-500 @else border-gray-300 @enderror rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" id="description" name="description" rows="6">{{ old('description', $product->description) }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="flex space-x-4 mb-4">
                            <div class="flex items-center">
                                <input class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $product->is_active) ? 'checked' : '' }}>
                                <label class="ml-2 block text-sm text-gray-700" for="is_active">Active</label>
                            </div>
                            
                            <div class="flex items-center">
                                <input class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded" type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured', $product->is_featured) ? 'checked' : '' }}>
                                <label class="ml-2 block text-sm text-gray-700" for="is_featured">Featured Product</label>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="flex justify-end space-x-3 mt-6">
                    <a href="{{ route('admin.products.index') }}" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg transition-all duration-200">Cancel</a>
                    <button type="submit" class="px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white rounded-lg shadow-sm transition-all duration-200">Update Product</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        // Store original values
        var originalName = $('#name').val();
        var originalSlug = $('#slug').val();
        
        $('#name').on('keyup', function() {
            var name = $(this).val();
            var slug = name.toLowerCase()
                .replace(/[^\w\s-]/g, '')
                .replace(/[\s_-]+/g, '-')
                .replace(/^-+|-+$/g, '');
            
            // Only update slug if it's empty or matches the original auto-generated slug
            if ($('#slug').val() === '' || $('#slug').val() === originalSlug && originalName === originalSlug) {
                $('#slug').val(slug);
            }
        });
        
        // Main image upload handling
        $('#main-image-upload').on('change', function() {
            handleMainImageSelect(this.files[0]);
        });
        
        // Remove main image
        $(document).on('click', '#remove-main-image', function() {
            $('#main-image-preview').empty();
            $('#image').val('');
            $('#main-image-filename').text('No file selected');
            $('#main-image-upload').val('');
        });
        
        function handleMainImageSelect(file) {
            if (!file) return;
            
            // Check if file is an image
            if (!file.type.match('image.*')) {
                alert('Please select an image file');
                return;
            }
            
            var reader = new FileReader();
            
            reader.onload = function(e) {
                // Update hidden input with base64 data
                $('#image').val(e.target.result);
                
                // Update filename display
                $('#main-image-filename').text(file.name);
                
                // Create preview element
                var previewHtml = `
                    <div class="relative group inline-block">
                        <img src="${e.target.result}" alt="${file.name}" class="rounded-md border border-gray-200" style="max-height: 100px;">
                        <button type="button" id="remove-main-image" class="absolute top-0 right-0 bg-red-500 text-white rounded-full p-1 shadow-sm opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                `;
                
                $('#main-image-preview').html(previewHtml);
            };
            
            reader.readAsDataURL(file);
        }
        
        // Gallery image upload handling
        $('#gallery-upload').on('change', function() {
            handleGalleryFileSelect(this.files);
        });
        
        // Drag and drop functionality
        var dropZone = $('.border-dashed');
        
        dropZone.on('dragover', function(e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).addClass('border-indigo-500');
        });
        
        dropZone.on('dragleave', function(e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).removeClass('border-indigo-500');
        });
        
        dropZone.on('drop', function(e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).removeClass('border-indigo-500');
            
            var files = e.originalEvent.dataTransfer.files;
            handleGalleryFileSelect(files);
        });
        
        // Remove gallery image
        $(document).on('click', '.remove-gallery-image', function() {
            $(this).closest('.relative').remove();
        });
        
        function handleGalleryFileSelect(files) {
            if (!files.length) return;
            
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                
                // Check if file is an image
                if (!file.type.match('image.*')) continue;
                
                var reader = new FileReader();
                
                reader.onload = (function(theFile) {
                    return function(e) {
                        // Create preview element
                        var previewHtml = `
                            <div class="relative group">
                                <img src="${e.target.result}" alt="${theFile.name}" class="h-24 w-full object-cover rounded-md border border-gray-200">
                                <input type="hidden" name="new_gallery_images[]" value="${e.target.result}">
                                <button type="button" class="absolute top-0 right-0 bg-red-500 text-white rounded-full p-1 shadow-sm opacity-0 group-hover:opacity-100 transition-opacity duration-200 remove-gallery-image">
                                    <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>
                        `;
                        
                        $('#gallery-preview').append(previewHtml);
                    };
                })(file);
                
                reader.readAsDataURL(file);
            }
        }
    });
</script>
@endsection
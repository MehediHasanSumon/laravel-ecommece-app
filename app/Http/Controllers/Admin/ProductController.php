<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class ProductController extends Controller implements HasMiddleware
{
    public function __construct()
    {
        // Create upload directories if they don't exist
        $this->createUploadDirectories();
    }
    
    public static function middleware(): array
    {
        return [
            new Middleware('auth'),
            new Middleware('permission:view-products', only: ['index', 'show']),
            new Middleware('permission:create-products', only: ['create', 'store']),
            new Middleware('permission:edit-products', only: ['edit', 'update']),
            new Middleware('permission:delete-products', only: ['destroy']),
        ];
    }
    
    /**
     * Create necessary upload directories
     */
    private function createUploadDirectories()
    {
        $directories = [
            public_path('uploads'),
            public_path('uploads/products'),
            public_path('uploads/products/gallery'),
        ];
        
        foreach ($directories as $directory) {
            if (!file_exists($directory)) {
                mkdir($directory, 0755, true);
            }
        }
    }

    /**
     * Display a listing of products.
     */
    public function index(Request $request)
    {
        $query = Product::with('category');
        
        // Apply filters
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%")
                  ->orWhere('sku', 'like', "%{$search}%");
            });
        }
        
        if ($request->filled('status')) {
            $status = $request->status === 'active';
            $query->where('is_active', $status);
        }
        
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }
        
        if ($request->filled('featured')) {
            $featured = $request->featured === 'yes';
            $query->where('is_featured', $featured);
        }
        
        if ($request->filled('stock_status')) {
            if ($request->stock_status === 'in_stock') {
                $query->where('stock_quantity', '>', 0);
            } elseif ($request->stock_status === 'out_of_stock') {
                $query->where('stock_quantity', '<=', 0);
            }
        }
        
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }
        
        // Apply sorting
        $sortField = $request->sort_by ?? 'created_at';
        $sortDirection = $request->sort_direction ?? 'desc';
        $query->orderBy($sortField, $sortDirection);
        
        $products = $query->paginate(15)->withQueryString();
        
        // Return JSON response for AJAX requests
        if ($request->ajax()) {
            return response()->json([
                'products' => view('admin.products.partials.products-table', compact('products'))->render(),
                'pagination' => view('admin.partials.pagination', ['paginator' => $products])->render(),
            ]);
        }
        
        // Get categories for filter dropdown
        $categories = Category::all();
        
        // Get statistics
        $stats = [
            'total' => Product::count(),
            'active' => Product::where('is_active', true)->count(),
            'out_of_stock' => Product::where('stock_quantity', '<=', 0)->count(),
        ];
        
        return view('admin.products.index', compact('products', 'categories', 'stats'));
    }

    /**
     * Show the form for creating a new product.
     */
    public function create(): View
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:'.Product::class],
            'description' => ['nullable', 'string'],
            'short_description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'sale_price' => ['nullable', 'numeric', 'min:0'],
            'stock_quantity' => ['required', 'integer', 'min:0'],
            'sku' => ['required', 'string', 'max:100', 'unique:'.Product::class],
            'category_id' => ['nullable', 'exists:categories,id'],
            'image' => ['nullable', 'string'], // Can be base64 image data
            'main_image' => ['nullable', 'file', 'image', 'max:10240'], // 10MB max
            'gallery' => ['nullable', 'array'],
            'new_gallery_images' => ['nullable', 'array'],
            'gallery_images' => ['nullable', 'array'],
            'gallery_images.*' => ['nullable', 'file', 'image', 'max:10240'], // 10MB max per gallery image
            'is_active' => ['boolean'],
            'is_featured' => ['boolean'],
        ]);

        $slug = $request->slug ?? Str::slug($request->name);
        
        // Process main image
        $mainImage = $request->image; // Default to the provided image string (base64)
        
        // Handle file upload for main image if present
        if ($request->hasFile('main_image') && $request->file('main_image')->isValid()) {
            $file = $request->file('main_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . uniqid() . '.' . $extension;
            
            // Store the file in the public/uploads/products directory
            $file->move(public_path('uploads/products'), $filename);
            
            // Update the image path
            $mainImage = 'uploads/products/' . $filename;
        }
        
        // Handle file upload for main image if present
        if ($request->hasFile('main_image') && $request->file('main_image')->isValid()) {
            $file = $request->file('main_image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '_' . uniqid() . '.' . $extension;
            
            // Store the file in the public/uploads/products directory
            $file->move(public_path('uploads/products'), $filename);
            
            // Update the image path
            $mainImage = 'uploads/products/' . $filename;
        }
        
        // Process gallery images
        $gallery = [];
        
        // Add existing gallery images if any
        if ($request->has('gallery')) {
            $gallery = array_merge($gallery, $request->gallery);
        }
        
        // Process new uploaded gallery images
        if ($request->has('new_gallery_images')) {
            foreach ($request->new_gallery_images as $imageData) {
                // Store the base64 image data
                $gallery[] = $imageData;
            }
        }
        
        // Handle file uploads for gallery images
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $file) {
                if ($file->isValid()) {
                    $extension = $file->getClientOriginalExtension();
                    $filename = 'gallery_' . time() . '_' . uniqid() . '.' . $extension;
                    
                    // Store the file in the public/uploads/products/gallery directory
                    $file->move(public_path('uploads/products/gallery'), $filename);
                    
                    // Add the image path to the gallery array
                    $gallery[] = 'uploads/products/gallery/' . $filename;
                }
            }
        }
        
        // Handle file uploads for gallery images
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $file) {
                if ($file->isValid()) {
                    $extension = $file->getClientOriginalExtension();
                    $filename = 'gallery_' . time() . '_' . uniqid() . '.' . $extension;
                    
                    // Store the file in the public/uploads/products/gallery directory
                    $file->move(public_path('uploads/products/gallery'), $filename);
                    
                    // Add the image path to the gallery array
                    $gallery[] = 'uploads/products/gallery/' . $filename;
                }
            }
        }

        Product::create([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
            'short_description' => $request->short_description,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'stock_quantity' => $request->stock_quantity,
            'sku' => $request->sku,
            'category_id' => $request->category_id,
            'image' => $mainImage,
            'gallery' => $gallery,
            'is_active' => $request->boolean('is_active', true),
            'is_featured' => $request->boolean('is_featured', false),
        ]);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified product.
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified product in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:'.Product::class.',slug,'.$product->id],
            'description' => ['nullable', 'string'],
            'short_description' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'sale_price' => ['nullable', 'numeric', 'min:0'],
            'stock_quantity' => ['required', 'integer', 'min:0'],
            'sku' => ['required', 'string', 'max:100', 'unique:'.Product::class.',sku,'.$product->id],
            'category_id' => ['nullable', 'exists:categories,id'],
            'image' => ['nullable', 'string'], // Can be base64 image data
            'main_image' => ['nullable', 'file', 'image', 'max:10240'], // 10MB max
            'gallery' => ['nullable', 'array'],
            'new_gallery_images' => ['nullable', 'array'],
            'gallery_images' => ['nullable', 'array'],
            'gallery_images.*' => ['nullable', 'file', 'image', 'max:10240'], // 10MB max per gallery image
            'is_active' => ['boolean'],
            'is_featured' => ['boolean'],
        ]);

        $slug = $request->slug ?? Str::slug($request->name);
        
        // Process main image
        $mainImage = $request->image; // Default to the provided image string (base64)
        
        // Process gallery images
        $gallery = [];
        
        // Add existing gallery images if any
        if ($request->has('gallery')) {
            $gallery = array_merge($gallery, $request->gallery);
        }
        
        // Process new uploaded gallery images
        if ($request->has('new_gallery_images')) {
            foreach ($request->new_gallery_images as $imageData) {
                // Store the base64 image data
                $gallery[] = $imageData;
            }
        }

        $product->update([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
            'short_description' => $request->short_description,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'stock_quantity' => $request->stock_quantity,
            'sku' => $request->sku,
            'category_id' => $request->category_id,
            'image' => $mainImage,
            'gallery' => $gallery,
            'is_active' => $request->boolean('is_active', true),
            'is_featured' => $request->boolean('is_featured', false),
        ]);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Product deleted successfully.');
    }
}
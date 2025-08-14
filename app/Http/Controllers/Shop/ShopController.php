<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display the shop homepage.
     */
    public function home(Request $request)
    {        
        $featuredProducts = Product::with('category')
            ->active()
            ->featured()
            ->latest()
            ->take(8)
            ->get();
            
        $newArrivals = Product::with('category')
            ->active()
            ->latest()
            ->take(8)
            ->get();
            
        $categories = Category::active()
            ->featured()
            ->take(6)
            ->get();
            
        // Get flash sale products with active discounts
        $flashSaleProducts = Product::with(['category', 'discounts'])
            ->active()
            ->whereHas('discounts', function($query) {
                $query->active();
            })
            ->take(4)
            ->get();
            
        // Get personalized recommendations
        // In a real app, this would use user browsing history, purchases, etc.
        // For now, we'll just get some random products as recommendations
        $recommendedProducts = Product::with('category')
            ->active()
            ->inRandomOrder()
            ->take(4)
            ->get();
            
        return view('shop.home', compact(
            'featuredProducts', 
            'newArrivals', 
            'categories', 
            'flashSaleProducts', 
            'recommendedProducts'
        ));
    }
    
    /**
     * Display the shop page with products.
     */
    public function index(Request $request)
    {        
        $query = Product::with(['category', 'discounts'])->active();
        
        // Apply category filter
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }
        
        // Apply price range filter
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }
        
        // Apply size filter (assuming size is stored in product attributes or a related table)
        if ($request->filled('size')) {
            // This implementation would depend on how sizes are stored
            // For example, if sizes are stored as JSON in a 'sizes' column:
            $query->where(function($q) use ($request) {
                $q->whereJsonContains('sizes', $request->size);
            });
        }
        
        // Apply color filter (assuming color is stored in product attributes or a related table)
        if ($request->filled('color')) {
            // This implementation would depend on how colors are stored
            // For example, if colors are stored as JSON in a 'colors' column:
            $query->where(function($q) use ($request) {
                $q->whereJsonContains('colors', $request->color);
            });
        }
        
        // Apply rating filter
        if ($request->filled('rating')) {
            $minRating = (int)$request->rating;
            $query->where('rating', '>=', $minRating);
        }
        
        // Apply availability filter
        if ($request->has('in_stock')) {
            $query->where('stock_quantity', '>', 0);
        }
        
        // Apply sorting
        $sort = $request->sort ?? 'featured';
        
        switch ($sort) {
            case 'price_low':
                $query->orderBy('price', 'asc');
                break;
            case 'price_high':
                $query->orderBy('price', 'desc');
                break;
            case 'newest':
                $query->latest();
                break;
            case 'popularity':
                // This would ideally be based on sales or views
                // For now, we'll use a placeholder implementation
                $query->orderBy('product_views', 'desc');
                break;
            case 'rating':
                $query->orderBy('rating', 'desc');
                break;
            case 'featured':
            default:
                $query->where('is_featured', true)->latest();
                $query->orderBy('is_featured', 'desc')->latest();
                break;
        }
        
        // Get pagination settings
        $perPage = $request->per_page ?? 12;
        
        // Get products with pagination
        $products = $query->paginate($perPage)->withQueryString();
        
        // Get all active categories for the filter
        $categories = Category::active()->get();
        
        // Get view mode (grid or list)
        $viewMode = $request->view ?? 'grid';
        
        // Check if this is an AJAX request
        if ($request->ajax()) {
            // For AJAX requests, return JSON with HTML for products and pagination info
            $html = view('shop.partials.product-grid', compact('products', 'viewMode'))->render();
            
            return response()->json([
                'html' => $html,
                'hasMorePages' => $products->hasMorePages(),
                'totalProducts' => $products->total(),
                'currentPage' => $products->currentPage(),
                'lastPage' => $products->lastPage(),
            ]);
        }
        
        // For regular requests, return the full view
        return view('shop.shop', compact(
            'products', 
            'categories', 
            'viewMode',
            'sort',
            'perPage'
        ));
    }
    
    /**
     * Display the specified product.
     */
    public function show($id)
    {
        $product = Product::with('category')->findOrFail($id);
        
        // Get related products from the same category
        $relatedProducts = Product::with('category')
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->active()
            ->inRandomOrder()
            ->take(4)
            ->get();
            
        return view('shop.product', compact('product', 'relatedProducts'));
    }
    
    /**
     * Display products by category.
     */
    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        
        $products = Product::with('category')
            ->where('category_id', $category->id)
            ->active()
            ->paginate(12);
            
        return view('shop.category', compact('category', 'products'));
    }
}
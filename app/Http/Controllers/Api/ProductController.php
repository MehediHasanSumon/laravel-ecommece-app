<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Get product details for quick view
     *
     * @param Product $product
     * @return \Illuminate\Http\JsonResponse
     */
    public function quickView(Product $product)
    {
        // Increment product views
        $product->increment('product_views');
        
        // Load the category relationship
        $product->load('category');
        
        return response()->json($product);
    }
    
    /**
     * Add product to cart
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addToCart(Request $request)
    {
        // Validate request
        $validated = $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'size' => 'nullable|string',
            'color' => 'nullable|string',
        ]);
        
        // Get the product
        $product = Product::findOrFail($validated['product_id']);
        
        // Initialize cart if it doesn't exist
        if (!session()->has('cart')) {
            session()->put('cart', []);
        }
        
        $cart = session()->get('cart');
        $productId = $validated['product_id'];
        
        // Check if product already exists in cart
        $exists = false;
        foreach ($cart as $key => $item) {
            if ($item['id'] == $productId) {
                // If same size and color, just update quantity
                if (($item['size'] ?? null) == ($validated['size'] ?? null) && 
                    ($item['color'] ?? null) == ($validated['color'] ?? null)) {
                    $cart[$key]['quantity'] += $validated['quantity'];
                    $exists = true;
                    break;
                }
            }
        }
        
        // If product doesn't exist in cart, add it
        if (!$exists) {
            $cart[] = [
                'id' => $productId,
                'name' => $product->name,
                'price' => $product->sale_price ?: $product->price,
                'quantity' => $validated['quantity'],
                'size' => $validated['size'] ?? null,
                'color' => $validated['color'] ?? null,
                'image' => $product->image,
            ];
        }
        
        // Update cart in session
        session()->put('cart', $cart);
        
        // Calculate total items in cart
        $cartCount = array_sum(array_column($cart, 'quantity'));
        session()->put('cart_count', $cartCount);
        
        return response()->json([
            'success' => true,
            'message' => 'Product added to cart',
            'cartCount' => $cartCount,
        ]);
    }
}
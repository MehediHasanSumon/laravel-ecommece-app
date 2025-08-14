<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DiscountController extends Controller
{
    /**
     * Display a listing of discounts.
     */
    public function index(Request $request)
    {
        $query = Discount::query();
        
        // Apply filters
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }
        
        if ($request->filled('status')) {
            $status = $request->status === 'active';
            $query->where('is_active', $status);
        }
        
        if ($request->filled('type')) {
            $query->where('type', $request->type);
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
        
        $discounts = $query->paginate(15)->withQueryString();
        
        // Return JSON response for AJAX requests
        if ($request->ajax()) {
            return response()->json([
                'discounts' => view('admin.discounts.partials.discounts-table', compact('discounts'))->render(),
                'pagination' => view('admin.partials.pagination', ['paginator' => $discounts])->render(),
            ]);
        }
        
        // Get statistics
        $stats = [
            'total' => Discount::count(),
            'active' => Discount::where('is_active', true)->count(),
            'expired' => Discount::where('expires_at', '<', now())->count(),
        ];
        
        return view('admin.discounts.index', compact('discounts', 'stats'));
    }

    /**
     * Show the form for creating a new discount.
     */
    public function create(): View
    {
        $products = Product::all();
        return view('admin.discounts.create', compact('products'));
    }

    /**
     * Store a newly created discount in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'type' => ['required', 'in:fixed,percentage'],
            'value' => ['required', 'numeric', 'min:0'],
            'applies_to_all_products' => ['boolean'],
            'product_ids' => ['required_if:applies_to_all_products,0', 'array'],
            'product_ids.*' => ['exists:products,id'],
            'is_active' => ['boolean'],
            'starts_at' => ['nullable', 'date'],
            'expires_at' => ['nullable', 'date', 'after_or_equal:starts_at'],
        ]);

        $discount = Discount::create([
            'name' => $request->name,
            'description' => $request->description,
            'type' => $request->type,
            'value' => $request->value,
            'applies_to_all_products' => $request->boolean('applies_to_all_products', false),
            'is_active' => $request->boolean('is_active', true),
            'starts_at' => $request->starts_at,
            'expires_at' => $request->expires_at,
        ]);

        // Attach products if not applying to all products
        if (!$request->boolean('applies_to_all_products') && $request->has('product_ids')) {
            $discount->products()->attach($request->product_ids);
        }

        return redirect()->route('admin.discounts.index')
            ->with('success', 'Discount created successfully.');
    }

    /**
     * Display the specified discount.
     */
    public function show(Discount $discount)
    {
        $discount->load('products');
        return view('admin.discounts.show', compact('discount'));
    }

    /**
     * Show the form for editing the specified discount.
     */
    public function edit(Discount $discount)
    {
        $products = Product::all();
        $discount->load('products');
        return view('admin.discounts.edit', compact('discount', 'products'));
    }

    /**
     * Update the specified discount in storage.
     */
    public function update(Request $request, Discount $discount)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'type' => ['required', 'in:fixed,percentage'],
            'value' => ['required', 'numeric', 'min:0'],
            'applies_to_all_products' => ['boolean'],
            'product_ids' => ['required_if:applies_to_all_products,0', 'array'],
            'product_ids.*' => ['exists:products,id'],
            'is_active' => ['boolean'],
            'starts_at' => ['nullable', 'date'],
            'expires_at' => ['nullable', 'date', 'after_or_equal:starts_at'],
        ]);

        $discount->update([
            'name' => $request->name,
            'description' => $request->description,
            'type' => $request->type,
            'value' => $request->value,
            'applies_to_all_products' => $request->boolean('applies_to_all_products', false),
            'is_active' => $request->boolean('is_active', true),
            'starts_at' => $request->starts_at,
            'expires_at' => $request->expires_at,
        ]);

        // Sync products if not applying to all products
        if (!$request->boolean('applies_to_all_products')) {
            $discount->products()->sync($request->product_ids ?? []);
        } else {
            $discount->products()->detach();
        }

        return redirect()->route('admin.discounts.index')
            ->with('success', 'Discount updated successfully.');
    }

    /**
     * Remove the specified discount from storage.
     */
    public function destroy(Discount $discount)
    {
        $discount->products()->detach();
        $discount->delete();

        return redirect()->route('admin.discounts.index')
            ->with('success', 'Discount deleted successfully.');
    }
}
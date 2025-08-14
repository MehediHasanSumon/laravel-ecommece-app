<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CouponController extends Controller
{
    /**
     * Display a listing of coupons.
     */
    public function index(Request $request)
    {
        $query = Coupon::query();
        
        // Apply filters
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('code', 'like', "%{$search}%")
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
        
        $coupons = $query->paginate(15)->withQueryString();
        
        // Return JSON response for AJAX requests
        if ($request->ajax()) {
            return response()->json([
                'coupons' => view('admin.coupons.partials.coupons-table', compact('coupons'))->render(),
                'pagination' => view('admin.partials.pagination', ['paginator' => $coupons])->render(),
            ]);
        }
        
        // Get statistics
        $stats = [
            'total' => Coupon::count(),
            'active' => Coupon::where('is_active', true)->count(),
            'expired' => Coupon::where('expires_at', '<', now())->count(),
        ];
        
        return view('admin.coupons.index', compact('coupons', 'stats'));
    }

    /**
     * Show the form for creating a new coupon.
     */
    public function create(): View
    {
        return view('admin.coupons.create');
    }

    /**
     * Store a newly created coupon in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => ['required', 'string', 'max:50', 'unique:'.Coupon::class],
            'description' => ['nullable', 'string'],
            'type' => ['required', 'in:fixed,percentage'],
            'value' => ['required', 'numeric', 'min:0'],
            'min_order_amount' => ['nullable', 'numeric', 'min:0'],
            'max_uses' => ['nullable', 'integer', 'min:1'],
            'is_active' => ['boolean'],
            'starts_at' => ['nullable', 'date'],
            'expires_at' => ['nullable', 'date', 'after_or_equal:starts_at'],
        ]);

        Coupon::create([
            'code' => strtoupper($request->code),
            'description' => $request->description,
            'type' => $request->type,
            'value' => $request->value,
            'min_order_amount' => $request->min_order_amount,
            'max_uses' => $request->max_uses,
            'used_count' => 0,
            'is_active' => $request->boolean('is_active', true),
            'starts_at' => $request->starts_at,
            'expires_at' => $request->expires_at,
        ]);

        return redirect()->route('admin.coupons.index')
            ->with('success', 'Coupon created successfully.');
    }

    /**
     * Display the specified coupon.
     */
    public function show(Coupon $coupon)
    {
        return view('admin.coupons.show', compact('coupon'));
    }

    /**
     * Show the form for editing the specified coupon.
     */
    public function edit(Coupon $coupon)
    {
        return view('admin.coupons.edit', compact('coupon'));
    }

    /**
     * Update the specified coupon in storage.
     */
    public function update(Request $request, Coupon $coupon)
    {
        $request->validate([
            'code' => ['required', 'string', 'max:50', 'unique:coupons,code,' . $coupon->id],
            'description' => ['nullable', 'string'],
            'type' => ['required', 'in:fixed,percentage'],
            'value' => ['required', 'numeric', 'min:0'],
            'min_order_amount' => ['nullable', 'numeric', 'min:0'],
            'max_uses' => ['nullable', 'integer', 'min:1'],
            'is_active' => ['boolean'],
            'starts_at' => ['nullable', 'date'],
            'expires_at' => ['nullable', 'date', 'after_or_equal:starts_at'],
        ]);

        $coupon->update([
            'code' => strtoupper($request->code),
            'description' => $request->description,
            'type' => $request->type,
            'value' => $request->value,
            'min_order_amount' => $request->min_order_amount,
            'max_uses' => $request->max_uses,
            'is_active' => $request->boolean('is_active', true),
            'starts_at' => $request->starts_at,
            'expires_at' => $request->expires_at,
        ]);

        return redirect()->route('admin.coupons.index')
            ->with('success', 'Coupon updated successfully.');
    }

    /**
     * Remove the specified coupon from storage.
     */
    public function destroy(Coupon $coupon)
    {
        $coupon->delete();

        return redirect()->route('admin.coupons.index')
            ->with('success', 'Coupon deleted successfully.');
    }
}
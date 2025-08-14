<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OrdersController extends Controller
{
    /**
     * Display a listing of orders.
     */
    public function index(Request $request): View
    {
        return view('admin.orders');
    }

    /**
     * Show the form for creating a new order.
     */
    public function create(): View
    {
        return view('admin.orders.create');
    }

    /**
     * Store a newly created order in storage.
     */
    public function store(Request $request)
    {
        // Validate and store order
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'total_amount' => 'required|numeric',
            'status' => 'required|string',
        ]);

        // Store order logic here

        return redirect()->route('admin.orders.index')
            ->with('success', 'Order created successfully.');
    }

    /**
     * Display the specified order.
     */
    public function show($id): View
    {
        return view('admin.orders.show', compact('id'));
    }

    /**
     * Show the form for editing the specified order.
     */
    public function edit($id): View
    {
        return view('admin.orders.edit', compact('id'));
    }

    /**
     * Update the specified order in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate and update order
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'total_amount' => 'required|numeric',
            'status' => 'required|string',
        ]);

        // Update order logic here

        return redirect()->route('admin.orders.index')
            ->with('success', 'Order updated successfully.');
    }

    /**
     * Remove the specified order from storage.
     */
    public function destroy($id)
    {
        // Delete order logic here

        return redirect()->route('admin.orders.index')
            ->with('success', 'Order deleted successfully.');
    }
}
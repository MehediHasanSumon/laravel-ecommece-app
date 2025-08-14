<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CustomersController extends Controller
{
    /**
     * Display a listing of customers.
     */
    public function index(Request $request): View
    {
        return view('admin.customers');
    }

    /**
     * Show the form for creating a new customer.
     */
    public function create(): View
    {
        return view('admin.customers.create');
    }

    /**
     * Store a newly created customer in storage.
     */
    public function store(Request $request)
    {
        // Validate and store customer
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        // Store customer logic here

        return redirect()->route('admin.customers.index')
            ->with('success', 'Customer created successfully.');
    }

    /**
     * Display the specified customer.
     */
    public function show($id): View
    {
        return view('admin.customers.show', compact('id'));
    }

    /**
     * Show the form for editing the specified customer.
     */
    public function edit($id): View
    {
        return view('admin.customers.edit', compact('id'));
    }

    /**
     * Update the specified customer in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate and update customer
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
        ]);

        // Update customer logic here

        return redirect()->route('admin.customers.index')
            ->with('success', 'Customer updated successfully.');
    }

    /**
     * Remove the specified customer from storage.
     */
    public function destroy($id)
    {
        // Delete customer logic here

        return redirect()->route('admin.customers.index')
            ->with('success', 'Customer deleted successfully.');
    }
}
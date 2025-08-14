<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingsController extends Controller
{
    /**
     * Display a listing of settings.
     */
    public function index(Request $request): View
    {
        return view('admin.settings');
    }

    /**
     * Show the form for creating a new setting.
     */
    public function create(): View
    {
        return view('admin.settings.create');
    }

    /**
     * Store a newly created setting in storage.
     */
    public function store(Request $request)
    {
        // Validate and store settings
        $request->validate([
            'setting_key' => 'required|string|max:255',
            'setting_value' => 'required|string',
        ]);

        // Store settings logic here

        return redirect()->route('admin.settings.index')
            ->with('success', 'Setting created successfully.');
    }

    /**
     * Display the specified setting.
     */
    public function show($id): View
    {
        return view('admin.settings.show', compact('id'));
    }

    /**
     * Show the form for editing the specified setting.
     */
    public function edit($id): View
    {
        return view('admin.settings.edit', compact('id'));
    }

    /**
     * Update the specified setting in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate and update settings
        $request->validate([
            'setting_key' => 'required|string|max:255',
            'setting_value' => 'required|string',
        ]);

        // Update settings logic here

        return redirect()->route('admin.settings.index')
            ->with('success', 'Setting updated successfully.');
    }

    /**
     * Remove the specified setting from storage.
     */
    public function destroy($id)
    {
        // Delete setting logic here

        return redirect()->route('admin.settings.index')
            ->with('success', 'Setting deleted successfully.');
    }
}
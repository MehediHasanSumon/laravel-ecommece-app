<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\View\View;

class RoleController extends Controller
{
    /**
     * Display a listing of roles.
     */
    public function index(Request $request)
    {
        $query = Role::query();
        
        // Apply filters
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%");
        }
        
        if ($request->filled('permission_count') && $request->filled('permission_count_operator')) {
            $count = (int) $request->permission_count;
            $operator = $request->permission_count_operator;
            
            $query->withCount('permissions')
                  ->having('permissions_count', $operator, $count);
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
        
        $roles = $query->paginate(15)->withQueryString();
        
        // Return JSON response for AJAX requests
        if ($request->ajax()) {
            return response()->json([
                'roles' => view('admin.roles.partials.roles-table', compact('roles'))->render(),
                'pagination' => view('admin.partials.pagination', ['paginator' => $roles])->render(),
            ]);
        }
        
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new role.
     */
    public function create(): View
    {
        $permissions = Permission::all()->groupBy(function($permission) {
            return explode('.', $permission->name)[0];
        });
        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created role in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:roles,name'],
            'permissions' => ['nullable', 'array'],
        ]);

        $role = Role::create(['name' => $request->name]);

        if ($request->has('permissions')) {
            $role->syncPermissions($request->permissions);
        }

        return redirect()->route('admin.roles.index')
            ->with('success', 'Role created successfully.');
    }

    /**
     * Show the form for editing the specified role.
     */
    public function edit(Role $role): View
    {
        // Prevent editing Super Admin role
        if ($role->name === 'Super Admin') {
            return redirect()->route('admin.roles.index')->with('error', 'Super Admin role cannot be edited.');
        }

        $permissions = Permission::all()->groupBy(function($permission) {
            return explode('.', $permission->name)[0];
        });
        $rolePermissions = $role->permissions->pluck('id')->toArray();
        
        return view('admin.roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    /**
     * Update the specified role in storage.
     */
    public function update(Request $request, Role $role)
    {
        // Prevent updating Super Admin role
        if ($role->name === 'Super Admin') {
            return redirect()->route('admin.roles.index')
                ->with('error', 'Super Admin role cannot be updated.');
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:roles,name,' . $role->id],
            'permissions' => ['nullable', 'array'],
        ]);

        $role->update(['name' => $request->name]);
        $role->syncPermissions($request->permissions ?? []);

        return redirect()->route('admin.roles.index')
            ->with('success', 'Role updated successfully.');
    }

    /**
     * Remove the specified role from storage.
     */
    public function destroy(Role $role)
    {
        // Prevent deleting Super Admin role
        if ($role->name === 'Super Admin') {
            return redirect()->route('admin.roles.index')
                ->with('error', 'Super Admin role cannot be deleted.');
        }

        // Check if role is assigned to any users
        if ($role->users()->count() > 0) {
            return redirect()->route('admin.roles.index')
                ->with('error', 'Role is assigned to users and cannot be deleted.');
        }

        $role->delete();

        return redirect()->route('admin.roles.index')
            ->with('success', 'Role deleted successfully.');
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\View\View;

class PermissionController extends Controller
{
    /**
     * Display a listing of permissions.
     */
    public function index(Request $request)
    {
        $query = Permission::query();
        
        // Apply filters
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('name', 'like', "%{$search}%");
        }
        
        if ($request->filled('group')) {
            $query->where('group', $request->group);
        }
        
        if ($request->filled('role')) {
            $query->whereHas('roles', function($q) use ($request) {
                $q->where('id', $request->role);
            });
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
        
        $permissions = $query->paginate(15)->withQueryString();
        $groups = Permission::select('group')->distinct()->pluck('group');
        $roles = Role::all();
        
        if ($request->ajax()) {
            $permissionsView = view('admin.permissions.partials.permissions-table', compact('permissions'))->render();
            $paginationView = view('admin.partials.pagination', ['paginator' => $permissions])->render();
            
            return response()->json([
                'permissions' => $permissionsView,
                'pagination' => $paginationView
            ]);
        }
        
        return view('admin.permissions.index', compact('permissions', 'groups', 'roles'));
    }

    /**
     * Show the form for creating a new permission.
     */
    public function create(): View
    {
        // Get all unique permission groups based on the naming convention (e.g., users.create -> users)
        $permissionGroups = Permission::all()->map(function($permission) {
            return explode('.', $permission->name)[0];
        })->unique()->values()->toArray();
        
        return view('admin.permissions.create', compact('permissionGroups'));
    }

    /**
     * Store a newly created permission in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:permissions,name'],
            'group' => ['required', 'string', 'max:255'],
        ]);

        // Format permission name as group.action
        $permissionName = $request->group . '.' . $request->name;
        
        Permission::create(['name' => $permissionName]);

        return redirect()->route('admin.permissions.index')
            ->with('success', 'Permission created successfully.');
    }

    /**
     * Show the form for editing the specified permission.
     */
    public function edit(Permission $permission): View
    {
        // Extract group and action from permission name
        $parts = explode('.', $permission->name);
        $group = $parts[0];
        $name = $parts[1] ?? '';
        
        // Get all unique permission groups
        $permissionGroups = Permission::all()->map(function($p) {
            return explode('.', $p->name)[0];
        })->unique()->values()->toArray();
        
        return view('admin.permissions.edit', compact('permission', 'group', 'name', 'permissionGroups'));
    }

    /**
     * Update the specified permission in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'group' => ['required', 'string', 'max:255'],
        ]);

        // Format permission name as group.action
        $permissionName = $request->group . '.' . $request->name;
        
        // Check if the new name already exists (excluding the current permission)
        if (Permission::where('name', $permissionName)->where('id', '!=', $permission->id)->exists()) {
            return redirect()->back()
                ->withErrors(['name' => 'This permission already exists.'])
                ->withInput();
        }
        
        $permission->update(['name' => $permissionName]);

        return redirect()->route('admin.permissions.index')
            ->with('success', 'Permission updated successfully.');
    }

    /**
     * Remove the specified permission from storage.
     */
    public function destroy(Permission $permission)
    {
        // Check if permission is assigned to any roles
        if ($permission->roles()->count() > 0) {
            return redirect()->route('admin.permissions.index')
                ->with('error', 'Permission is assigned to roles and cannot be deleted.');
        }

        $permission->delete();

        return redirect()->route('admin.permissions.index')
            ->with('success', 'Permission deleted successfully.');
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Display a listing of categories.
     */
    public function index(Request $request)
    {
        $query = Category::with('parent');
        
        // Apply filters
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('slug', 'like', "%{$search}%");
            });
        }
        
        if ($request->filled('status')) {
            $status = $request->status === 'active';
            $query->where('is_active', $status);
        }
        
        if ($request->filled('parent_id')) {
            if ($request->parent_id === 'parent') {
                $query->whereNull('parent_id');
            } else {
                $query->where('parent_id', $request->parent_id);
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
        
        $categories = $query->paginate(15)->withQueryString();
        
        // Return JSON response for AJAX requests
        if ($request->ajax()) {
            return response()->json([
                'categories' => view('admin.categories.partials.categories-table', compact('categories'))->render(),
                'pagination' => view('admin.partials.pagination', ['paginator' => $categories])->render(),
            ]);
        }
        
        // Get parent categories for filter dropdown
        $parentCategories = Category::whereNull('parent_id')->get();
        
        // Get statistics
        $stats = [
            'total' => Category::count(),
            'active' => Category::where('is_active', true)->count(),
            'products' => Category::sum('product_count'),
        ];
        
        return view('admin.categories.index', compact('categories', 'parentCategories', 'stats'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create(): View
    {
        $parentCategories = Category::all();
        return view('admin.categories.create', compact('parentCategories'));
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:'.Category::class],
            'parent_id' => ['nullable', 'exists:categories,id'],
            'description' => ['nullable', 'string'],
            'icon' => ['nullable', 'string', 'max:255'],
            'is_active' => ['boolean'],
            'is_featured' => ['boolean'],
        ]);

        $slug = $request->slug ?? Str::slug($request->name);

        Category::create([
            'name' => $request->name,
            'slug' => $slug,
            'parent_id' => $request->parent_id,
            'description' => $request->description,
            'icon' => $request->icon,
            'is_active' => $request->boolean('is_active', true),
            'is_featured' => $request->boolean('is_featured', false),
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified category.
     */
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(Category $category)
    {
        $parentCategories = Category::where('id', '!=', $category->id)->get();
        return view('admin.categories.edit', compact('category', 'parentCategories'));
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:categories,slug,' . $category->id],
            'parent_id' => ['nullable', 'exists:categories,id'],
            'description' => ['nullable', 'string'],
            'icon' => ['nullable', 'string', 'max:255'],
            'is_active' => ['boolean'],
            'is_featured' => ['boolean'],
        ]);

        $slug = $request->slug ?? Str::slug($request->name);

        $category->update([
            'name' => $request->name,
            'slug' => $slug,
            'parent_id' => $request->parent_id,
            'description' => $request->description,
            'icon' => $request->icon,
            'is_active' => $request->boolean('is_active', true),
            'is_featured' => $request->boolean('is_featured', false),
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(Category $category)
    {
        // Check if category has children
        if ($category->children()->count() > 0) {
            return back()->with('error', 'Cannot delete category with subcategories. Please delete or reassign subcategories first.');
        }
        
        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}
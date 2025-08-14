<div class="overflow-x-auto">
    <table class="admin-table w-full">
        <thead class="bg-gray-50 text-xs font-medium text-gray-500 uppercase tracking-wider">
            <tr>
                <th class="px-4 py-3 text-left">
                    <div class="flex items-center">
                        <input type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    </div>
                </th>
                <th class="px-4 py-3 text-left">Name</th>
                <th class="px-4 py-3 text-left">Parent</th>
                <th class="px-4 py-3 text-left">Slug</th>
                <th class="px-4 py-3 text-left">Products</th>
                <th class="px-4 py-3 text-left">Status</th>
                <th class="px-4 py-3 text-left">Created</th>
                <th class="px-4 py-3 text-right">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($categories as $category)
            <tr>
                <td class="px-4 py-3 whitespace-nowrap">
                    <div class="flex items-center">
                        <input type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                    </div>
                </td>
                <td class="px-4 py-3 whitespace-nowrap">
                    <div class="flex items-center">
                        @if($category->icon)
                            <span class="mr-2"><i class="{{ $category->icon }}"></i></span>
                        @endif
                        <div>
                            <div class="text-sm font-medium text-gray-900">{{ $category->name }}</div>
                            @if($category->children_count > 0)
                                <div class="text-xs text-gray-500">{{ $category->children_count }} subcategories</div>
                            @endif
                        </div>
                    </div>
                </td>
                <td class="px-4 py-3 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ $category->parent ? $category->parent->name : 'None' }}</div>
                </td>
                <td class="px-4 py-3 whitespace-nowrap">
                    <div class="text-sm text-gray-500">{{ $category->slug }}</div>
                </td>
                <td class="px-4 py-3 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ $category->product_count }}</div>
                </td>
                <td class="px-4 py-3 whitespace-nowrap">
                    @if($category->is_active)
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                            Active
                        </span>
                    @else
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                            Inactive
                        </span>
                    @endif
                </td>
                <td class="px-4 py-3 whitespace-nowrap">
                    <div class="text-sm text-gray-500">{{ $category->created_at->format('M d, Y') }}</div>
                </td>
                <td class="px-4 py-3 whitespace-nowrap text-right text-sm font-medium">
                    <div class="flex justify-end space-x-2">
                        <a href="{{ route('admin.categories.edit', $category) }}" class="text-indigo-600 hover:text-indigo-900">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this category?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="8" class="px-4 py-8 text-center text-gray-500">
                    <div class="flex flex-col items-center justify-center">
                        <i class="fas fa-folder-open text-4xl text-gray-300 mb-3"></i>
                        <p class="text-lg font-medium">No categories found</p>
                        <p class="text-sm mt-1">Create your first category to get started</p>
                        <a href="{{ route('admin.categories.create') }}" class="mt-3 bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg flex items-center">
                            <i class="fas fa-plus mr-2"></i> Add New Category
                        </a>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
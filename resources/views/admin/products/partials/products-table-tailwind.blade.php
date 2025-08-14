<table class="admin-table w-full">
    <thead class="bg-gray-50 text-xs font-medium text-gray-500 uppercase tracking-wider">
        <tr>
            <th class="px-4 py-3 text-left">
                <div class="flex items-center">
                    <input type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                </div>
            </th>
            <th class="px-4 py-3 text-left">Image</th>
            <th class="px-4 py-3 text-left">Name</th>
            <th class="px-4 py-3 text-left">SKU</th>
            <th class="px-4 py-3 text-left">Category</th>
            <th class="px-4 py-3 text-left">Price</th>
            <th class="px-4 py-3 text-left">Stock</th>
            <th class="px-4 py-3 text-left">Status</th>
            <th class="px-4 py-3 text-left">Created</th>
            <th class="px-4 py-3 text-right">Actions</th>
        </tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">
        @forelse ($products as $product)
        <tr class="hover:bg-gray-50">
            <td class="px-4 py-3 whitespace-nowrap">
                <div class="flex items-center">
                    <input type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                </div>
            </td>
            <td class="px-4 py-3 whitespace-nowrap">
                <div class="flex items-center justify-center">
                    @if($product->image)
                        <img src="{{ $product->image }}" alt="{{ $product->name }}" class="w-10 h-10 rounded-md object-cover">
                    @else
                        <div class="w-10 h-10 rounded-md bg-gray-100 flex items-center justify-center">
                            <i class="fas fa-image text-gray-400"></i>
                        </div>
                    @endif
                </div>
            </td>
            <td class="px-4 py-3 whitespace-nowrap">
                <div>
                    <div class="font-medium text-gray-900 truncate max-w-[200px]" title="{{ $product->name }}">{{ $product->name }}</div>
                    @if($product->is_featured)
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-yellow-100 text-yellow-800 mt-1">
                            Featured
                        </span>
                    @endif
                </div>
            </td>
            <td class="px-4 py-3 whitespace-nowrap">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                    {{ $product->sku }}
                </span>
            </td>
            <td class="px-4 py-3 whitespace-nowrap">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                    {{ $product->category ? $product->category->name : 'Uncategorized' }}
                </span>
            </td>
            <td class="px-4 py-3 whitespace-nowrap">
                @if($product->sale_price)
                    <div class="text-sm text-gray-500 line-through">${{ number_format($product->price, 2) }}</div>
                    <div class="text-sm font-medium text-red-600">${{ number_format($product->sale_price, 2) }}</div>
                @else
                    <div class="text-sm font-medium text-gray-900">${{ number_format($product->price, 2) }}</div>
                @endif
            </td>
            <td class="px-4 py-3 whitespace-nowrap">
                @if($product->stock_quantity > 10)
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                        {{ $product->stock_quantity }} in stock
                    </span>
                @elseif($product->stock_quantity > 0)
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                        {{ $product->stock_quantity }} left
                    </span>
                @else
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                        Out of stock
                    </span>
                @endif
            </td>
            <td class="px-4 py-3 whitespace-nowrap">
                @if($product->is_active)
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                        Active
                    </span>
                @else
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                        Inactive
                    </span>
                @endif
            </td>
            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-500">
                {{ $product->created_at->format('M d, Y') }}
            </td>
            <td class="px-4 py-3 whitespace-nowrap text-right text-sm font-medium">
                <div class="flex items-center justify-end space-x-2">
                    <a href="{{ route('admin.products.show', $product) }}" class="text-gray-500 hover:text-indigo-600 transition">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="{{ route('admin.products.edit', $product) }}" class="text-gray-500 hover:text-indigo-600 transition">
                        <i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-gray-500 hover:text-red-600 transition" onclick="return confirm('Are you sure you want to delete this product?')">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="10" class="px-4 py-8 text-center">
                <div class="flex flex-col items-center justify-center">
                    <i class="fas fa-box-open text-4xl text-gray-300 mb-3"></i>
                    <p class="text-lg font-medium">No products found</p>
                    <p class="text-sm mt-1">Create your first product to get started</p>
                    <a href="{{ route('admin.products.create') }}" class="mt-3 bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg flex items-center">
                        <i class="fas fa-plus mr-2"></i> Add New Product
                    </a>
                </div>
            </td>
        </tr>
        @endforelse
    </tbody>
</table>
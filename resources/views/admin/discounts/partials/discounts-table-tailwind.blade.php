<div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200">
        <thead>
            <tr class="bg-gradient-to-r from-gray-50 to-gray-100">
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Name</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Type</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Value</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Products</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Status</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Validity</th>
                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-600 uppercase tracking-wider">Created</th>
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-600 uppercase tracking-wider">Actions</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse($discounts as $discount)
                <tr class="hover:bg-gray-50 transition-colors duration-150 ease-in-out">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="font-medium text-gray-900 hover:text-indigo-600">{{ $discount->name }}</div>
                        @if($discount->description)
                            <div class="text-xs text-gray-500 truncate max-w-xs">{{ Str::limit($discount->description, 50) }}</div>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($discount->type == 'percentage')
                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 border border-blue-200">
                                <i class="fas fa-percent mr-1"></i> Percentage
                            </span>
                        @else
                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-indigo-100 text-indigo-800 border border-indigo-200">
                                <i class="fas fa-dollar-sign mr-1"></i> Fixed Amount
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap font-medium">
                        @if($discount->type == 'percentage')
                            <span class="text-blue-600 font-bold">{{ $discount->value }}%</span>
                            <span class="text-xs text-gray-500 block">off regular price</span>
                        @else
                            <span class="text-green-600 font-bold">${{ number_format($discount->value, 2) }}</span>
                            <span class="text-xs text-gray-500 block">discount</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($discount->applies_to_all_products)
                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800 border border-blue-200">
                                <i class="fas fa-globe mr-1"></i> All Products
                            </span>
                        @else
                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800 border border-purple-200">
                                <i class="fas fa-tags mr-1"></i> {{ $discount->products->count() }} products
                            </span>
                            <button type="button" class="ml-1 text-indigo-600 hover:text-indigo-900 transition-colors duration-150" data-bs-toggle="tooltip" title="View Products">
                                <i class="fas fa-info-circle"></i>
                            </button>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($discount->is_active && $discount->isValid())
                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 border border-green-200">
                                <i class="fas fa-check-circle mr-1"></i> Active
                            </span>
                        @elseif(!$discount->is_active)
                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 border border-red-200">
                                <i class="fas fa-times-circle mr-1"></i> Inactive
                            </span>
                        @else
                            <span class="px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 border border-yellow-200">
                                <i class="fas fa-exclamation-circle mr-1"></i> Expired
                            </span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        @if($discount->starts_at && $discount->expires_at)
                            <div class="flex flex-col">
                                <div class="flex items-center text-gray-700">
                                    <i class="far fa-calendar-alt mr-1 text-indigo-500"></i>
                                    <span>{{ $discount->starts_at->format('M d') }} - {{ $discount->expires_at->format('M d, Y') }}</span>
                                </div>
                                @if($discount->expires_at->isPast())
                                    <span class="mt-1 px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800 border border-red-200 w-fit">
                                        <i class="fas fa-exclamation-triangle mr-1"></i> Expired
                                    </span>
                                @elseif($discount->expires_at->diffInDays(now()) < 7)
                                    <span class="mt-1 px-2 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800 border border-yellow-200 w-fit">
                                        <i class="fas fa-clock mr-1"></i> Ending soon
                                    </span>
                                @endif
                            </div>
                        @elseif($discount->expires_at)
                            <div class="flex flex-col">
                                <div class="flex items-center text-gray-700">
                                    <i class="far fa-calendar-alt mr-1 text-indigo-500"></i>
                                    <span>Until {{ $discount->expires_at->format('M d, Y') }}</span>
                                </div>
                            </div>
                        @elseif($discount->starts_at)
                            <div class="flex flex-col">
                                <div class="flex items-center text-gray-700">
                                    <i class="far fa-calendar-alt mr-1 text-indigo-500"></i>
                                    <span>From {{ $discount->starts_at->format('M d, Y') }}</span>
                                </div>
                            </div>
                        @else
                            <div class="flex items-center text-gray-500">
                                <i class="fas fa-infinity mr-1 text-indigo-500"></i>
                                <span>Always valid</span>
                            </div>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        <div class="flex items-center">
                            <i class="far fa-clock mr-1 text-indigo-500"></i>
                            <span>{{ $discount->created_at->format('M d, Y') }}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium">
                        <div class="flex justify-center space-x-2">
                            <a href="{{ route('admin.discounts.edit', $discount) }}" class="text-indigo-600 hover:text-indigo-900 bg-indigo-100 hover:bg-indigo-200 p-2 rounded-full transition-colors duration-150 shadow-sm hover:shadow" data-bs-toggle="tooltip" title="Edit Discount">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ route('admin.discounts.show', $discount) }}" class="text-blue-600 hover:text-blue-900 bg-blue-100 hover:bg-blue-200 p-2 rounded-full transition-colors duration-150 shadow-sm hover:shadow" data-bs-toggle="tooltip" title="View Details">
                                <i class="fas fa-eye"></i>
                            </a>
                            <form action="{{ route('admin.discounts.destroy', $discount) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="text-red-600 hover:text-red-900 bg-red-100 hover:bg-red-200 p-2 rounded-full transition-colors duration-150 shadow-sm hover:shadow delete-discount" data-bs-toggle="tooltip" title="Delete Discount">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="px-6 py-12 text-center">
                        <div class="flex flex-col items-center bg-gray-50 py-8 px-4 rounded-lg border border-gray-100 max-w-md mx-auto">
                            <div class="bg-indigo-100 p-3 rounded-full mb-4">
                                <i class="fas fa-tags text-indigo-500 text-4xl"></i>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900 mb-1">No Discounts Found</h3>
                            <p class="text-gray-500 mb-4 text-center">You haven't created any discounts yet. Start offering special deals to your customers.</p>
                            <a href="{{ route('admin.discounts.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200 transform hover:translate-y-[-2px]">
                                <i class="fas fa-plus-circle mr-2"></i> Create Your First Discount
                            </a>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="flex flex-col md:flex-row justify-between items-center mt-4 px-6 py-4 bg-gray-50 border-t border-gray-200 rounded-b-lg">
    <div class="text-sm text-gray-600 mb-4 md:mb-0">
        <div class="flex items-center">
            <i class="fas fa-info-circle text-indigo-500 mr-2"></i>
            <span>Showing {{ $discounts->firstItem() ?? 0 }} to {{ $discounts->lastItem() ?? 0 }} of {{ $discounts->total() }} discounts</span>
        </div>
    </div>
    <div>
        {{ $discounts->appends(request()->except('page'))->links() }}
    </div>
</div>
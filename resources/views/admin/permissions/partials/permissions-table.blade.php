@forelse ($permissions as $permission)
<tr>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $permission->id }}</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $permission->name }}</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
            {{ $permission->group ?? 'General' }}
        </span>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        {{ $permission->roles->count() }}
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $permission->created_at->format('M d, Y') }}</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
        <a href="{{ route('admin.permissions.edit', $permission) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">
            <i class="fas fa-edit"></i> Edit
        </a>
        @if($permission->roles->count() == 0)
        <form action="{{ route('admin.permissions.destroy', $permission) }}" method="POST" class="inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this permission?')">
                <i class="fas fa-trash"></i> Delete
            </button>
        </form>
        @endif
    </td>
</tr>
@empty
<tr>
    <td colspan="6" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">No permissions found</td>
</tr>
@endforelse
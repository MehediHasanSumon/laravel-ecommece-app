@forelse ($roles as $role)
<tr>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $role->id }}</td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="text-sm font-medium text-gray-900">
            {{ $role->name }}
            @if($role->name == 'Super Admin')
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800 ml-2">
                System
            </span>
            @endif
        </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        <div class="flex flex-wrap gap-1">
            @foreach($role->permissions->take(3) as $permission)
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                {{ $permission->name }}
            </span>
            @endforeach
            @if($role->permissions->count() > 3)
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                +{{ $role->permissions->count() - 3 }} more
            </span>
            @endif
        </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        {{ $role->users->count() }}
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $role->created_at->format('M d, Y') }}</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
        <a href="{{ route('admin.roles.edit', $role) }}" class="text-indigo-600 hover:text-indigo-900 mr-3"><i class="fas fa-edit"></i> Edit</a>
        @if($role->users->count() === 0)
            <form action="{{ route('admin.roles.destroy', $role) }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this role?')">
                    <i class="fas fa-trash"></i> Delete
                </button>
            </form>
        @else
            <span class="text-gray-400 cursor-not-allowed" title="Cannot delete role assigned to users"><i class="fas fa-trash"></i> Delete</span>
        @endif
    </td>
</tr>
@empty
<tr>
    <td colspan="6" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">No roles found</td>
</tr>
@endforelse
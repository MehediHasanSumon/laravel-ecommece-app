@forelse ($users as $user)
<tr>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->id }}</td>
    <td class="px-6 py-4 whitespace-nowrap">
        <div class="flex items-center">
            <div class="flex-shrink-0 h-10 w-10">
                <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center">
                    <span class="text-indigo-800 font-medium text-lg">{{ substr($user->name, 0, 1) }}</span>
                </div>
            </div>
            <div class="ml-4">
                <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
            </div>
        </div>
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->email }}</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
        @foreach($user->roles as $role)
            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800 mr-1">
                {{ $role->name }}
            </span>
        @endforeach
    </td>
    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $user->created_at->format('M d, Y') }}</td>
    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
        <a href="{{ route('admin.users.edit', $user) }}" class="text-indigo-600 hover:text-indigo-900 mr-3"><i class="fas fa-edit"></i> Edit</a>
        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Are you sure you want to delete this user?')">
                <i class="fas fa-trash"></i> Delete
            </button>
        </form>
    </td>
</tr>
@empty
<tr>
    <td colspan="6" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">No users found</td>
</tr>
@endforelse
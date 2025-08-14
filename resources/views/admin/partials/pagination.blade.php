@if(isset($roles))
    {{ $roles->links() }}
@elseif(isset($permissions))
    {{ $permissions->links() }}
@elseif(isset($users))
    {{ $users->links() }}
@elseif(isset($paginator))
    {{ $paginator->links() }}
@endif
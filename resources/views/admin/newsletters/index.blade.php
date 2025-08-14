@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Newsletter Subscribers</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.newsletters.export') }}" class="btn btn-sm btn-success">
                            <i class="fas fa-download"></i> Export CSV
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Subscribed At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($newsletters as $newsletter)
                                    <tr>
                                        <td>{{ $newsletter->id }}</td>
                                        <td>{{ $newsletter->email }}</td>
                                        <td>
                                            @if ($newsletter->is_active)
                                                <span class="badge badge-success">Active</span>
                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>{{ $newsletter->subscribed_at->format('Y-m-d H:i:s') }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('admin.newsletters.show', $newsletter->id) }}" class="btn btn-sm btn-info">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <form action="{{ route('admin.newsletters.destroy', $newsletter->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this subscriber?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center">No newsletter subscribers found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-3">
                        {{ $newsletters->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
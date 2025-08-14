@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Subscriber Details</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.newsletters.index') }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-arrow-left"></i> Back to List
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>ID:</label>
                                <p>{{ $newsletter->id }}</p>
                            </div>
                            <div class="form-group">
                                <label>Email:</label>
                                <p>{{ $newsletter->email }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status:</label>
                                <p>
                                    @if ($newsletter->is_active)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </p>
                            </div>
                            <div class="form-group">
                                <label>Subscribed At:</label>
                                <p>{{ $newsletter->subscribed_at->format('Y-m-d H:i:s') }}</p>
                            </div>
                            <div class="form-group">
                                <label>Created At:</label>
                                <p>{{ $newsletter->created_at->format('Y-m-d H:i:s') }}</p>
                            </div>
                            <div class="form-group">
                                <label>Updated At:</label>
                                <p>{{ $newsletter->updated_at->format('Y-m-d H:i:s') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <form action="{{ route('admin.newsletters.destroy', $newsletter->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this subscriber?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-trash"></i> Delete Subscriber
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
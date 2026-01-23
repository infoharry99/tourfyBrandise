@extends('layouts.app')
@section('title','Services')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Services</h3>
        <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
            + Add Service
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Icon</th>
                    <th>Status</th>
                    <th>Order</th>
                    <th width="20%">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($services as $service)
                <tr>
                    <td>{{ $service->id }}</td>
                    <td>{{ $service->title }}</td>
                    <td>
                        @if($service->icon)
                            <i class="{{ $service->icon }}"></i>
                            <small class="text-muted ms-2">
                                {{ $service->icon }}
                            </small>
                        @else
                            <span class="text-muted">No icon</span>
                        @endif
                    </td>
                    <td>
                        @if($service->status)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </td>
                    <td>{{ $service->sort_order }}</td>
                    <td>
                        <a href="{{ route('admin.services.edit',$service->id) }}"
                           class="btn btn-sm btn-warning">
                            Edit
                        </a>

                        <form action="{{ route('admin.services.destroy',$service->id) }}"
                              method="POST"
                              class="d-inline"
                              onsubmit="return confirm('Delete this service?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">
                        No services found
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection

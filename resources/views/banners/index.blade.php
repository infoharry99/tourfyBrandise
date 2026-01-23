@extends('layouts.app')
@section('title','Banners')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Banners</h2>
        <a href="{{ route('admin.banners.create') }}" class="btn btn-primary">
            + Add Banner
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th width="5%">#</th>
                    <th>Title</th>
                    <th width="20%">Image</th>
                    <th width="10%">Status</th>
                    <th width="20%">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($banners as $banner)
                <tr>
                    <td>{{ $banner->id }}</td>
                    <td>{{ $banner->title ?? '-' }}</td>
                    <td>
                        <img src="{{ asset($banner->image) }}"
                             class="img-thumbnail"
                             style="max-height:80px">
                    </td>
                    <td>
                        @if($banner->status)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('banners.edit',$banner->id) }}"
                           class="btn btn-sm btn-warning">
                            Edit
                        </a>

                        <form action="{{ route('banners.destroy',$banner->id) }}"
                              method="POST"
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Delete banner?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        No banners found
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection

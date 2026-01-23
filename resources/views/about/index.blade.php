@extends('layouts.app')
@section('title','About List')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>About Content</h3>
        <a href="{{ route('admin.abouts.create') }}" class="btn btn-primary">
            + Add About
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th width="20%">Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse($abouts as $about)
                <tr>
                    <td>{{ $about->id }}</td>
                    <td>{{ $about->title ?? '-' }}</td>
                    <td>{{ Str::limit($about->description, 60) }}</td>
                    <td>
                        @if($about->image)
                            <img src="{{ asset($about->image) }}"
                                 class="img-thumbnail"
                                 style="max-height:70px">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>
                    <td>
                        @if($about->status)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('abouts.edit',$about->id) }}"
                           class="btn btn-sm btn-warning">Edit</a>

                        <form action="{{ route('admin.abouts.destroy',$about->id) }}"
                              method="POST"
                              class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger"
                                onclick="return confirm('Delete this record?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center text-muted">
                        No About content found
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection

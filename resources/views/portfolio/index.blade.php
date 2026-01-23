@extends('layouts.app')
@section('title','Portfolio')

@section('content')
<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Portfolio</h3>
        <a href="{{ route('admin.portfolios.create') }}" class="btn btn-primary">
            + Add Portfolio
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
                    <th>Type</th>
                    <th>Preview</th>
                    <th>Status</th>
                    <th>Processing</th>
                    <th width="18%">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($portfolios as $portfolio)
                <tr>
                    <td>{{ $portfolio->id }}</td>
                    <td>{{ $portfolio->title }}</td>
                    <td>
                        <span class="badge bg-info">
                            {{ ucfirst($portfolio->media_type) }}
                        </span>
                    </td>
                    <td>
                        @if($portfolio->media_type === 'image')
                            <img src="{{ asset($portfolio->media_file) }}"
                                 class="img-thumbnail"
                                 style="max-height:70px">
                        @else
                            @if(!$portfolio->processing)
                                <video width="120" controls>
                                    <source src="{{ asset($portfolio->media_file) }}">
                                </video>
                            @else
                                <span class="text-muted">Video processing...</span>
                            @endif
                        @endif
                    </td>
                    <td>
                        @if($portfolio->status)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </td>
                    <td>
                        @if($portfolio->processing)
                            <span class="badge bg-warning">Processing</span>
                        @else
                            <span class="badge bg-success">Completed</span>
                        @endif
                    </td>
                      <td>
                        {{-- EDIT --}}
                        <a href="{{ route('admin.portfolios.edit',$portfolio->id) }}"
                           class="btn btn-sm btn-warning">
                            Edit
                        </a>

                        {{-- DELETE --}}
                        <form action="{{ route('admin.portfolios.destroy',$portfolio->id) }}"
                              method="POST"
                              class="d-inline"
                              onsubmit="return confirm('Delete this portfolio?')">
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
                        No portfolio items found
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection

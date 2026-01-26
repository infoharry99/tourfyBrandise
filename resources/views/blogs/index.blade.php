@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Blogs</h3>

    {{-- ADD BLOG --}}
    <form method="POST" action="{{ route('admin.blogs.store') }}" enctype="multipart/form-data" class="mb-4">
        @csrf
        <div class="row g-2">
            <div class="col-md-3">
                <input type="text" name="title" class="form-control" placeholder="Title" required>
            </div>
            <div class="col-md-3">
                <input type="text" name="short_description" class="form-control" placeholder="Short Description">
            </div>
            <div class="col-md-3">
                <input type="file" name="image" class="form-control">
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary w-100">Add Blog</button>
            </div>
        </div>

        {{-- <textarea name="description" class="form-control mt-2" rows="3"
                  placeholder="Full blog description"></textarea> --}}
    </form>

    {{-- BLOG LIST --}}
    <table class="table table-bordered align-middle">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Title</th>
                <th>Status</th>
                <th width="">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($blogs as $blog)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    @if($blog->image)
                        <img src="{{ asset($blog->image) }}" width="80">
                    @endif
                </td>
                <td>{{ $blog->title }}</td>

                <td>
                    <label class="switch">
                        <input type="checkbox"
                               class="status-toggle"
                               data-id="{{ $blog->id }}"
                               {{ $blog->is_active ? 'checked' : '' }}>
                        <span class="slider"></span>
                    </label>
                </td>

                {{-- ACTIONS --}}
                <td>
                    <form method="POST"
                          action="{{ route('admin.blogs.update', $blog->id) }}"
                          enctype="multipart/form-data"
                          class="d-inline">
                        @csrf
                        <input type="text" name="title" value="{{ $blog->title }}"
                               class="form-control mb-1" required>
                        <input type="text" name="short_description" value="{{ $blog->short_description }}"
                               class="form-control mb-1">
                        {{-- <textarea name="description"
                            class="form-control mb-1"
                            rows="4">{{ $blog->description }}</textarea>         --}}
                        <input type="file" name="image" class="form-control mb-1">
                        <button class="btn btn-sm btn-warning w-100">Update</button>
                    </form>

                    <form method="POST"
                          action="{{ route('admin.blogs.destroy', $blog->id) }}"
                          class="mt-1">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger w-100"
                                onclick="return confirm('Delete this blog?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


<style>
    .switch {
        position: relative;
        width: 52px;
        height: 26px;
    }
    .switch input { display: none; }
    .slider {
        position: absolute;
        inset: 0;
        background: #ccc;
        border-radius: 30px;
        transition: .3s;
    }
    .slider:before {
        content: "";
        position: absolute;
        width: 20px;
        height: 20px;
        left: 3px;
        bottom: 3px;
        background: #fff;
        border-radius: 50%;
        transition: .3s;
    }
    input:checked + .slider {
        background: #22c55e;
    }
    input:checked + .slider:before {
        transform: translateX(26px);
    }

</style>

{{-- Status Toggle Script --}}
<script>
document.querySelectorAll('.status-toggle').forEach(toggle => {
    toggle.addEventListener('change', function () {
        fetch("{{ route('admin.blogs.status') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ id: this.dataset.id })
        });
    });
});
</script>
@endsection

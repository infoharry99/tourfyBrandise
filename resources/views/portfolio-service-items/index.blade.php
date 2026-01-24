@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">
        Items – {{ $service->service_name }}
    </h3>

    {{-- Add Item --}}
    <form method="POST" action="{{ route('admin.portfolio-service-items.store') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="portfolio_service_id" value="{{ $service->id }}">

        <div class="row mb-3">
            <div class="col-md-3">
                <input type="text" name="title" class="form-control" placeholder="Title">
            </div>

            <div class="col-md-4">
                <input type="text" name="description" class="form-control" placeholder="Description">
            </div>

            <div class="col-md-3">
                <input type="file" name="image" class="form-control" required>
            </div>

            <div class="col-md-2">
                <button class="btn btn-primary w-100">Add</button>
            </div>
        </div>
    </form>

    {{-- Items Table --}}
    <table class="table table-bordered align-middle">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th width="">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>

                <td>
                    <img src="{{ asset('storage/'.$item->image) }}"
                         width="80" class="rounded">
                </td>

                <td>{{ $item->title }}</td>
                <td>{{ $item->description }}</td>

                {{-- Toggle --}}
                <td>
                    <label class="switch">
                        <input type="checkbox"
                               class="status-toggle"
                               data-id="{{ $item->id }}"
                               {{ $item->is_active ? 'checked' : '' }}>
                        <span class="slider"></span>
                    </label>
                </td>

                <td>
                    {{-- Update --}}
                    <form method="POST"
                          action="{{ route('admin.portfolio-service-items.update', $item->id) }}"
                          enctype="multipart/form-data"
                          class="d-inline">
                        @csrf
                        
                        <input type="text"
                            name="title"
                            value="{{ $item->title }}"
                            class="form-control mb-1"
                            placeholder="Title">

                        <input type="text"
                            name="description"
                            value="{{ $item->description }}"
                            class="form-control mb-1"
                            placeholder="Description">
                        <input type="file" name="image" class="form-control mb-1">
                        <button class="btn btn-sm btn-warning">Update</button>
                    </form>

                    {{-- Delete --}}
                    <form method="POST"
                          action="{{ route('admin.portfolio-service-items.destroy', $item->id) }}"
                          class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger"
                                onclick="return confirm('Delete this item?')">
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
        fetch("{{ route('admin.portfolio-service-items.update-status') }}", {
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

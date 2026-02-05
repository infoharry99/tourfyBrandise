@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">
        Items – {{ $service->service_name }}
    </h3>

    {{-- ADD ITEM --}}
    <form method="POST"
          action="{{ route('admin.portfolio-service-items.store') }}"
          enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="portfolio_service_id" value="{{ $service->id }}">

        <div class="row mb-4">
            <div class="col-md-6 mb-2">
                <input type="text"
                       name="title"
                       class="form-control"
                       placeholder="Title">
            </div>

            <div class="col-md-6 mb-2">
                <input type="url"
                       name="visit_url"
                       class="form-control"
                       placeholder="Visit URL">
            </div>

            <div class="col-md-12 mb-2">
                <textarea
                    name="description"
                    class="form-control"
                    placeholder="Description (Optional)"
                    rows="3"
                ></textarea>
            </div>

            <div class="col-md-12 mb-2 alert alert-info py-2">
                Upload <strong>either one Video or one Image</strong>. Do not upload both.
            </div>

            <div class="col-md-6 mb-2">
                <label for="video">Video (Optional)</label>
                <input type="file"
                       name="video"
                       
                       class="form-control"
                       accept="video/mp4,video/quicktime">
            </div>

            <div class="col-md-6 mb-2">
                <label for="image">Image (Optional)</label>
                <input type="file"
                       name="image"
                       
                       class="form-control"
                       accept="image/*">
            </div>

            

            <div class="col-md-3">
                <button class="btn btn-primary w-100">
                    Add
                </button>
            </div>
        </div>
    </form>

    {{-- ITEMS TABLE --}}
    <table class="table table-bordered align-middle">
        <thead>
            <tr>
                <th>#</th>
                <th>Media</th>
                <th>Title</th>
                <th>Description</th>
                <th>URL</th>
                <th>Status</th>
                <th >Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>

                {{-- IMAGE / VIDEO --}}
                <td>
                    @if($item->image)
                        <img src="{{ asset($item->image) }}"
                             width="80"
                             class="rounded mb-1">
                    @endif

                    @if($item->video)
                        <video width="80" controls>
                            <source src="{{ asset($item->video) }}">
                        </video>
                    @endif
                </td>

                <td>{{ $item->title }}</td>
                <td>{{ $item->description }}</td>

                <td>
                    @if($item->visit_url)
                        <a href="{{ $item->visit_url }}"
                           target="_blank">
                            Visit
                        </a>
                    @endif
                </td>

                {{-- STATUS TOGGLE --}}
                <td>
                    <label class="switch">
                        <input type="checkbox"
                               class="status-toggle"
                               data-id="{{ $item->id }}"
                               {{ $item->is_active ? 'checked' : '' }}>
                        <span class="slider"></span>
                    </label>
                </td>

                {{-- ACTIONS --}}
                <td>
                    {{-- UPDATE --}}
                    <form method="POST"
                          action="{{ route('admin.portfolio-service-items.update', $item->id) }}"
                          enctype="multipart/form-data"
                          class="mb-2">
                        @csrf
                        @method('POST')

                        <input type="text"
                               name="title"
                               value="{{ $item->title }}"
                               class="form-control mb-1">

                        {{-- <input type="text"
                               name="description"
                               value="{{ $item->description }}"
                               class="form-control mb-1"> --}}
                        <textarea
                            name="description"
                            class="form-control mb-1"
                            placeholder="Description (Optional)"
                            rows="3"
                        >{{ $item->description }}</textarea>
       
                        
                        <input type="url"
                               name="visit_url"
                               value="{{ $item->visit_url }}"
                               class="form-control mb-2"
                               placeholder="Visit URL"
                               >

                        <div class=" alert alert-info py-2">
                            Upload <strong>either one Video or one Image</strong>. Do not upload both.
                        </div>  
                        
                        <label for="video">Video (Optional)</label>
                        <input type="file"
                               name="video"
                               class="form-control mb-1"
                               accept="video/mp4,video/quicktime">


                        <label for="image">Image (Optional)</label>       
                        <input type="file"
                               name="image"
                               class="form-control mb-2"
                               accept="image/*">

                        

                        <button class="btn btn-sm btn-warning w-100">
                            Update
                        </button>
                    </form>

                    {{-- DELETE --}}
                    <form method="POST"
                          action="{{ route('admin.portfolio-service-items.destroy', $item->id) }}">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-sm btn-danger w-100"
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

{{-- SWITCH CSS --}}
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

{{-- STATUS TOGGLE SCRIPT --}}
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

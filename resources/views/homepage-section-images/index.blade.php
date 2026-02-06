@extends('layouts.app')

@section('content')
<div class="container">

    <h3 class="mb-3">Homepage Images</h3>

    {{-- UPLOAD IMAGES --}}
    <form method="POST"
          action="{{ route('admin.homepage.section.images.store') }}"
          enctype="multipart/form-data">
        @csrf

        <div class="row mb-3">
            <div class="col-md-6">
                <input type="file"
                       name="images[]"
                       class="form-control"
                       multiple
                       required>
            </div>

            <div class="col-md-2">
                <button class="btn btn-primary w-100">
                    Upload
                </button>
            </div>
        </div>
    </form>

    {{-- IMAGE LIST --}}
    <table class="table table-bordered align-middle">
        <thead>
            <tr>
                <th>#</th>
                <th>Preview</th>
                <th>Sort Order</th>
                <th width="200">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($images as $image)
            <tr>
                <td>{{ $loop->iteration }}</td>

                <td>
                    <img src="{{ asset($image->image_path) }}"
                         width="120"
                         class="rounded">
                </td>

                <td>
                    <form method="POST"
                          action="{{ route('admin.homepage.section.images.update', $image->id) }}"
                          class="d-flex gap-2">
                        @csrf
                        @method('PUT')

                        <input type="number"
                               name="sort_order"
                               value="{{ $image->sort_order }}"
                               class="form-control"
                               style="width:100px">

                        <button class="btn btn-sm btn-warning">
                            Save
                        </button>
                    </form>
                </td>

                <td>
                    <form method="POST"
                          action="{{ route('admin.homepage.section.images.destroy', $image->id) }}">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-sm btn-danger"
                                onclick="return confirm('Delete this image?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection

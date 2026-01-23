@extends('layouts.app')
@section('title','Edit About')

@section('content')
<div class="container mt-4">

    <div class="card shadow">
        <div class="card-header bg-warning">
            <h5 class="mb-0">Edit About Content</h5>
        </div>

        <div class="card-body">
            <form method="POST"
                  action="{{ route('admin.abouts.update',$about->id) }}"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text"
                           name="title"
                           class="form-control"
                           value="{{ $about->title }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Description *</label>
                    <textarea name="description"
                              rows="4"
                              class="form-control"
                              required>{{ $about->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Current Image</label><br>
                    @if($about->image)
                        <img src="{{ asset($about->image) }}"
                             class="img-thumbnail mb-2"
                             style="max-height:120px">
                    @else
                        <p class="text-muted">No image</p>
                    @endif
                    <input type="file"
                           name="image"
                           class="form-control mt-2">
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="1" {{ $about->status ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ !$about->status ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.abouts.index') }}" class="btn btn-secondary">
                        Back
                    </a>
                    <button class="btn btn-success">Update</button>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection

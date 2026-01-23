@extends('layouts.app')
@section('title','Create Banner')

@section('content')
<div class="container mt-4">

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Add Banner</h5>
        </div>

        <div class="card-body">
            <form method="POST"
                  action="{{ route('admin.banners.store') }}"
                  enctype="multipart/form-data">
                @csrf

                {{-- Title --}}
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text"
                           name="title"
                           class="form-control"
                           placeholder="Enter title"
                           value="{{ old('title') }}">
                </div>

                {{-- Description --}}
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description"
                              class="form-control"
                              rows="3"
                              placeholder="Enter description">{{ old('description') }}</textarea>
                </div>

                {{-- Image --}}
                <div class="mb-3">
                    <label class="form-label">Banner Image</label>
                    <input type="file"
                           name="image"
                           class="form-control"
                           required>
                </div>

                {{-- Link --}}
                <div class="mb-3">
                    <label class="form-label">Link</label>
                    <input type="text"
                           name="link"
                           class="form-control"
                           placeholder="https://example.com"
                           value="{{ old('link') }}">
                </div>

                {{-- Status --}}
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="1" selected>Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                {{-- Buttons --}}
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.banners.index') }}" class="btn btn-secondary">
                        Back
                    </a>

                    <button type="submit" class="btn btn-success">
                        Save Banner
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection

@extends('layouts.app')
@section('title','Add About')

@section('content')
<div class="container mt-4">

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Add About Content</h5>
        </div>

        <div class="card-body">
            <form method="POST"
                  action="{{ route('admin.abouts.store') }}"
                  enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text"
                           name="title"
                           class="form-control"
                           value="{{ old('title') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Description *</label>
                    <textarea name="description"
                              rows="4"
                              class="form-control"
                              required>{{ old('description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Image</label>
                    <input type="file"
                           name="image"
                           class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.abouts.index') }}" class="btn btn-secondary">
                        Back
                    </a>
                    <button class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection

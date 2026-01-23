@extends('layouts.app')
@section('title','Add Portfolio')

@section('content')
<div class="container mt-4">

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Add Portfolio</h5>
        </div>

        <div class="card-body">
            <form method="POST"
                  action="{{ route('admin.portfolios.store') }}"
                  enctype="multipart/form-data">
                @csrf

                {{-- Title --}}
                <div class="mb-3">
                    <label class="form-label">Title *</label>
                    <input type="text"
                           name="title"
                           class="form-control"
                           required>
                </div>

                {{-- Description --}}
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description"
                              class="form-control"
                              rows="3"></textarea>
                </div>

                {{-- Media Type --}}
                <div class="mb-3">
                    <label class="form-label">Media Type *</label>
                    <select name="media_type"
                            id="mediaType"
                            class="form-select"
                            required>
                        <option value="">Select</option>
                        <option value="image">Image</option>
                        <option value="video">Video (Large file)</option>
                    </select>
                </div>

                {{-- Media File --}}
                <div class="mb-3">
                    <label class="form-label">
                        Media File
                        <small class="text-muted">(Video up to 60GB)</small>
                    </label>
                    <input type="file"
                           name="media_file"
                           class="form-control"
                           required>
                </div>

                {{-- Info for Admin --}}
                <div class="alert alert-info">
                    <strong>Note:</strong><br>
                    • Large videos are uploaded in background using queue<br>
                    • You can continue working after submit<br>
                    • Status will show <b>Processing</b> until completed
                </div>

                {{-- Status --}}
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                {{-- Buttons --}}
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.portfolios.index') }}"
                       class="btn btn-secondary">
                        Back
                    </a>
                    <button class="btn btn-success">
                        Upload
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection

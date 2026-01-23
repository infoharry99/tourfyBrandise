@extends('layouts.app')
@section('title','Edit Service')

@section('content')
<div class="container mt-4">

    <div class="card shadow">
        <div class="card-header bg-warning">
            <h5 class="mb-0">Edit Service</h5>
        </div>

        <div class="card-body">
            <form method="POST"
                  action="{{ route('admin.services.update',$service->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Title *</label>
                    <input type="text"
                           name="title"
                           class="form-control"
                           value="{{ $service->title }}"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description *</label>
                    <textarea name="description"
                              class="form-control"
                              rows="3"
                              required>{{ $service->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Icon Class</label>
                    <input type="text"
                           name="icon"
                           class="form-control"
                           value="{{ $service->icon }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Sort Order</label>
                    <input type="number"
                           name="sort_order"
                           class="form-control"
                           value="{{ $service->sort_order }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="1" {{ $service->status ? 'selected' : '' }}>
                            Active
                        </option>
                        <option value="0" {{ !$service->status ? 'selected' : '' }}>
                            Inactive
                        </option>
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.services.index') }}"
                       class="btn btn-secondary">
                        Back
                    </a>
                    <button class="btn btn-success">
                        Update Service
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection

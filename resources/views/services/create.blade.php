@extends('layouts.app')
@section('title','Add Service')

@section('content')
<div class="container mt-4">

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Add Service</h5>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.services.store') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Title *</label>
                    <input type="text"
                           name="title"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Description *</label>
                    <textarea name="description"
                              class="form-control"
                              rows="3"
                              required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Icon Class</label>
                    <input type="text"
                           name="icon"
                           class="form-control"
                           placeholder="fa fa-cog or bi bi-gear">
                </div>

                <div class="mb-3">
                    <label class="form-label">Sort Order</label>
                    <input type="number"
                           name="sort_order"
                           class="form-control"
                           value="0">
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.services.index') }}"
                       class="btn btn-secondary">
                        Back
                    </a>
                    <button class="btn btn-success">
                        Save Service
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection

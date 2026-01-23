@extends('layouts.app')
@section('title','Edit Portfolio')

@section('content')
<div class="container mt-4">

    <div class="card shadow">
        <div class="card-header bg-warning">
            <h5 class="mb-0">Edit Portfolio</h5>
        </div>

        <div class="card-body">
            <form method="POST"
                  action="{{ route('admin.portfolios.update',$portfolio->id) }}"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Title --}}
                <div class="mb-3">
                    <label class="form-label">Title *</label>
                    <input type="text"
                           name="title"
                           class="form-control"
                           value="{{ $portfolio->title }}"
                           required>
                </div>

                {{-- Description --}}
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description"
                              class="form-control"
                              rows="3">{{ $portfolio->description }}</textarea>
                </div>

                {{-- Media Type (Readonly) --}}
                <div class="mb-3">
                    <label class="form-label">Media Type</label>
                    <input type="text"
                           class="form-control"
                           value="{{ ucfirst($portfolio->media_type) }}"
                           readonly>
                </div>

                {{-- Existing Media Preview --}}
                <div class="mb-3">
                    <label class="form-label">Current Media</label><br>

                    @if($portfolio->media_type === 'image')
                        <img src="{{ asset($portfolio->media_file) }}"
                             class="img-thumbnail"
                             style="max-height:120px">
                    @else
                        @if(!$portfolio->processing)
                            <video width="200" controls>
                                <source src="{{ asset($portfolio->media_file) }}">
                            </video>
                        @else
                            <span class="badge bg-warning">
                                Video processing...
                            </span>
                        @endif
                    @endif
                </div>

                {{-- Replace Media --}}
                <div class="mb-3">
                    <label class="form-label">
                        Replace Media
                        <small class="text-muted">
                            (Leave empty to keep existing)
                        </small>
                    </label>
                    <input type="file"
                           name="media_file"
                           class="form-control">
                </div>

                {{-- Status --}}
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="1" {{ $portfolio->status ? 'selected' : '' }}>
                            Active
                        </option>
                        <option value="0" {{ !$portfolio->status ? 'selected' : '' }}>
                            Inactive
                        </option>
                    </select>
                </div>

                {{-- Processing Info --}}
                @if($portfolio->processing)
                    <div class="alert alert-info">
                        <strong>Notice:</strong>
                        Video is currently being processed in background.
                        Please wait until it completes before replacing.
                    </div>
                @endif

                {{-- Buttons --}}
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.portfolios.index') }}"
                       class="btn btn-secondary">
                        Back
                    </a>
                    <button class="btn btn-success">
                        Update
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection

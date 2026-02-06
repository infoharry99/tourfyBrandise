@extends('layouts.app')

@section('content')
<div class="container">

    <h3 class="mb-3">Creators</h3>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- ADD CREATOR --}}
    <form method="POST"
          action="{{ route('admin.creators.store') }}"
          enctype="multipart/form-data">
        @csrf

        <div class="row mb-3">
            <div class="col-md-4">
                <input type="file"
                       name="image"
                       class="form-control"
                       accept="image/*">
            </div>

            <div class="col-md-5">
                <input type="url"
                       name="drive_link"
                       class="form-control"
                       placeholder="Google Drive Link">
            </div>

            <div class="col-md-3">
                <button class="btn btn-primary w-100">
                    Add Creator
                </button>
            </div>
        </div>
    </form>

    {{-- CREATOR LIST --}}
    <table class="table table-bordered align-middle">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Drive Link</th>
                <th>Status</th>
                <th >Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($creators as $creator)
            <tr>
                <td>{{ $loop->iteration }}</td>

                <td>
                    @if($creator->image_path)
                        <img src="{{ asset($creator->image_path) }}"
                             width="100"
                             class="rounded">
                    @endif
                </td>

                <td>
                    @if($creator->drive_link)
                        <a href="{{ $creator->drive_link }}" target="_blank">
                            View Drive
                        </a>
                    @endif
                </td>

                <td>
                    <span class="badge {{ $creator->status ? 'bg-success' : 'bg-secondary' }}">
                        {{ $creator->status ? 'Active' : 'Inactive' }}
                    </span>
                </td>

                <td>
                    {{-- UPDATE --}}
                    <form method="POST"
                          action="{{ route('admin.creators.update', $creator->id) }}"
                          enctype="multipart/form-data"
                          class="mb-1">
                        @csrf
                        @method('PUT')

                        <input type="file"
                               name="image"
                               class="form-control mb-1">

                        <input type="url"
                               name="drive_link"
                               value="{{ $creator->drive_link }}"
                               class="form-control mb-1">

                        <select name="status"
                                class="form-control mb-1">
                            <option value="1" {{ $creator->status ? 'selected' : '' }}>
                                Active
                            </option>
                            <option value="0" {{ !$creator->status ? 'selected' : '' }}>
                                Inactive
                            </option>
                        </select>

                        <button class="btn btn-sm btn-warning w-100">
                            Update
                        </button>
                    </form>

                    {{-- DELETE --}}
                    <form method="POST"
                          action="{{ route('admin.creators.destroy', $creator->id) }}">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-sm btn-danger w-100"
                                onclick="return confirm('Delete this creator?')">
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

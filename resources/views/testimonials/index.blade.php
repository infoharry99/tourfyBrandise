@extends('layouts.app')

@section('content')
<div class="container">

    <h3 class="mb-3">Testimonials</h3>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- ADD TESTIMONIAL --}}
    <form method="POST"
          action="{{ route('admin.testimonials.store') }}"
          enctype="multipart/form-data">
        @csrf

        <div class="row mb-3">
            <div class="col-md-4 mb-2">
                <input type="text"
                       name="name"
                       class="form-control"
                       placeholder="Name"
                       required>
            </div>

            <div class="col-md-4 mb-2">
                <input type="text"
                       name="designation"
                       class="form-control"
                       placeholder="Designation">
            </div>

            <div class="col-md-4 mb-2">
                <select name="rating" class="form-control" required>
                    @for($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}">{{ $i }} Star</option>
                    @endfor
                </select>
            </div>

            <div class="col-md-12 mb-2">
                <textarea name="review"
                          class="form-control"
                          rows="2"
                          placeholder="Review"
                          required></textarea>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-4">
                <input type="file"
                       name="image"
                       class="form-control">
            </div>

            <div class="col-md-2">
                <button class="btn btn-primary w-100">
                    Add Testimonial
                </button>
            </div>
        </div>
    </form>

    {{-- TESTIMONIAL LIST --}}
    <table class="table table-bordered align-middle">
        <thead>
            <tr>
                <th>#</th>
                <th>Person</th>
                <th>Review</th>
                <th>Rating</th>
                <th>Status</th>
                <th width="280">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($testimonials as $testimonial)
            <tr>
                <td>{{ $loop->iteration }}</td>

                <td>
                    @if($testimonial->image_path)
                        <img src="{{ asset($testimonial->image_path) }}"
                             width="60"
                             class="rounded-circle mb-1">
                    @endif
                    <div>
                        <strong>{{ $testimonial->name }}</strong><br>
                        <small>{{ $testimonial->designation }}</small>
                    </div>
                </td>

                <td>{{ $testimonial->review }}</td>

                <td>
                    @for($i = 1; $i <= 5; $i++)
                        <i class="fa {{ $i <= $testimonial->rating ? 'fa-star text-warning' : 'fa-star-o' }}"></i>
                    @endfor
                </td>

                <td>
                    <span class="badge {{ $testimonial->status ? 'bg-success' : 'bg-secondary' }}">
                        {{ $testimonial->status ? 'Active' : 'Inactive' }}
                    </span>
                </td>

                <td>
                   <button class="btn btn-sm btn-info w-100 mb-1"
                            data-bs-toggle="modal"
                            data-bs-target="#editTestimonial{{ $testimonial->id }}">
                        Edit
                    </button>
                    {{-- DELETE --}}
                    <form method="POST"
                          action="{{ route('admin.testimonials.destroy', $testimonial->id) }}">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-sm btn-danger w-100"
                                onclick="return confirm('Delete this testimonial?')">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            <div class="modal fade" id="editTestimonial{{ $testimonial->id }}" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <form method="POST"
                        action="{{ route('admin.testimonials.update', $testimonial->id) }}"
                        enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="modal-content">
                        <div class="modal-header">
                        <h5>Edit Testimonial</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                        <div class="row g-3">

                            <div class="col-md-6">
                            <label>Name</label>
                            <input type="text" name="name"
                                    class="form-control"
                                    value="{{ $testimonial->name }}" required>
                            </div>

                            <div class="col-md-6">
                            <label>Designation</label>
                            <input type="text" name="designation"
                                    class="form-control"
                                    value="{{ $testimonial->designation }}">
                            </div>

                            <div class="col-md-4">
                            <label>Rating</label>
                            <select name="rating" class="form-control">
                                @for($i=1; $i<=5; $i++)
                                <option value="{{ $i }}"
                                    {{ $testimonial->rating == $i ? 'selected' : '' }}>
                                    {{ $i }} Star
                                </option>
                                @endfor
                            </select>
                            </div>

                            <div class="col-md-8">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="1" {{ $testimonial->status ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ !$testimonial->status ? 'selected' : '' }}>Inactive</option>
                            </select>
                            </div>

                            <div class="col-md-12">
                            <label>Review</label>
                            <textarea name="review"
                                        class="form-control"
                                        rows="4"
                                        required>{{ $testimonial->review }}</textarea>
                            </div>

                            <div class="col-md-12">
                            <label>Change Image</label>
                            <input type="file" name="image" class="form-control">
                            </div>

                        </div>
                        </div>

                        <div class="modal-footer">
                        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary">Update</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            @endforeach
        </tbody>
    </table>

</div>


@endsection

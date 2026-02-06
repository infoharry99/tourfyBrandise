@extends('layouts.app')

@section('content')
<div class="container">

    <h3 class="mb-3">Homepage Section</h3>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('admin.homepage.sections.save') }}">
        @csrf

        {{-- ID for update --}}
        <input type="hidden" name="id" value="{{ $section->id ?? '' }}">

        <div class="mb-3">
            <label class="form-label">Section Title</label>
            <input type="text"
                   name="title"
                   class="form-control"
                   value="{{ $section->title ?? '' }}"
                   placeholder="Section Title">
        </div>

        <div class="mb-3">
            <label class="form-label">Section Description</label>
            <textarea name="description"
                      class="form-control"
                      rows="3"
                      placeholder="Section Description">{{ $section->description ?? '' }}</textarea>
        </div>
{{-- 
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="1" {{ ($section->status ?? 1) == 1 ? 'selected' : '' }}>
                    Active
                </option>
                <option value="0" {{ ($section->status ?? 1) == 0 ? 'selected' : '' }}>
                    Inactive
                </option>
            </select>
        </div> --}}

        <button class="btn btn-primary">
            Save Section
        </button>
    </form>

</div>
@endsection

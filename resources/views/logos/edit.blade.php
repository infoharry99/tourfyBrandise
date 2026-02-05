@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Edit Logo</h3>

    <form action="{{ route('admin.logos.update', $logo) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <img src="{{ asset($logo->image) }}" width="120" class="mb-2">
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('admin.logos.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection

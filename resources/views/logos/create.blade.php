@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Upload Logos</h3>

    <form action="{{ route('admin.logos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Choose Logos</label>
            <input type="file" name="images[]" class="form-control" multiple required>
        </div>

        <button class="btn btn-success">Upload</button>
        <a href="{{ route('admin.logos.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection

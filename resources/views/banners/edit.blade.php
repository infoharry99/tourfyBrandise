@extends('layouts.app')
@section('title','Edit Banner')
@section('content')

<h2>Edit Banner</h2>

<form method="POST" action="{{ route('banners.update',$banner->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <input type="text" name="title" value="{{ $banner->title }}"><br><br>

    <textarea name="description">{{ $banner->description }}</textarea><br><br>

    <img src="{{ asset($banner->image) }}" width="150"><br><br>
    <input type="file" name="image"><br><br>

    <input type="text" name="link" value="{{ $banner->link }}"><br><br>

    <select name="status">
        <option value="1" {{ $banner->status ? 'selected' : '' }}>Active</option>
        <option value="0" {{ !$banner->status ? 'selected' : '' }}>Inactive</option>
    </select><br><br>

    <button type="submit">Update</button>
</form>

@endsection

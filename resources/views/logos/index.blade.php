@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Logos</h3>

    <a href="{{ route('admin.logos.create') }}" class="btn btn-primary mb-3">
        Upload Logos
    </a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row">
        @foreach($logos as $logo)
            <div class="col-md-3 mb-4">
                <div class="card p-2 text-center">
                    <img src="{{ asset($logo->image) }}" class="img-fluid mb-2" style="height:100px;object-fit:contain">

                    <a href="{{ route('admin.logos.edit', $logo) }}" class="btn btn-sm btn-warning mb-1">
                        Edit
                    </a>

                    <form action="{{ route('admin.logos.destroy', $logo) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this logo?')">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

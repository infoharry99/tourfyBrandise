@extends('layouts.app')

@section('content')
<div class="container">

    <h3 class="mb-3">Skill Services</h3>

    {{-- ADD SERVICE --}}
    <form method="POST" action="{{ route('admin.skill.services.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="row mb-3">
            <div class="col-md-6 mb-2">
                <input type="text" name="title" class="form-control" placeholder="Service Title" required>
            </div>

            <div class="col-md-6 mb-2">
                <input type="file" name="image" class="form-control">
            </div>

            <div class="col-md-6 mb-2">
                <div id="feature-wrapper">
                    <div class="d-flex gap-2 mb-2">
                        <input type="text"
                            name="features[]"
                            class="form-control"
                            placeholder="Feature">
                        
                    </div>
                </div>

                <button type="button"
                        class="btn btn-sm btn-outline-primary"
                        onclick="addFeature()">
                    + Add More
                </button>
            </div>



            <div class="col-md-2">
                <button class="btn btn-primary w-100">Add</button>
            </div>
        </div>
    </form>

    {{-- LIST SERVICES --}}
    @foreach($services as $service)
        <div class="card mb-3">
            <div class="card-body">

                <div class="row align-items-center">
                    <div class="col-md-3">
                        @if($service->image)
                            <img src="{{ asset($service->image) }}" class="img-fluid rounded">
                        @endif
                    </div>

                    <div class="col-md-6">
                        <form method="POST" action="{{ route('admin.skill.services.update', $service->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <input type="text" name="title" value="{{ $service->title }}"
                                   class="form-control mb-2">

                            <input type="file" name="image" class="form-control mb-2">

                            <button class="btn btn-warning btn-sm">Update</button>
                        </form>

                        <div class="mt-2">
                            @foreach($service->features as $feature)
                                <span class="badge bg-secondary me-1">
                                    {{ $feature->feature }}
                                    <form method="POST"
                                          action="{{ route('admin.service.feature.delete', $feature->id) }}"
                                          class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm text-white p-0 ms-1">×</button>
                                    </form>
                                </span>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-3 text-end">
                        <form method="POST" action="{{ route('admin.skill.services.destroy', $service->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Delete service?')">
                                Delete
                            </button>
                        </form>
                    </div>

                </div>

            </div>
        </div>
    @endforeach

</div>

<script>
    function addFeature() {
        const wrapper = document.getElementById('feature-wrapper');

        const div = document.createElement('div');
        div.className = 'd-flex gap-2 mb-2';

        div.innerHTML = `
            <input type="text"
                name="features[]"
                class="form-control"
                placeholder="Feature">
            <button type="button"
                    class="btn btn-danger btn-sm"
                    onclick="removeFeature(this)">
                ×
            </button>
        `;

        wrapper.appendChild(div);
    }

    function removeFeature(button) {
        button.parentElement.remove();
    }
</script>


@endsection

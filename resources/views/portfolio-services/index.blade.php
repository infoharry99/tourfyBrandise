@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Portfolio Services</h2>

    {{-- Add Service --}}
    <form method="POST" action="{{ route('admin.portfolio-services.store') }}" class="mb-4">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <input type="text" name="service_name" class="form-control" placeholder="Service Name" required>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary">Add</button>
            </div>
        </div>
    </form>

    {{-- Services Table --}}
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Service</th>
                <th>Status</th>
                <th width="">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($services as $service)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $service->service_name }}</td>
                <td>
                    {{-- <button
                        class="btn btn-sm toggle-status {{ $service->is_active ? 'btn-success' : 'btn-secondary' }}"
                        data-id="{{ $service->id }}">
                        {{ $service->is_active ? 'Active' : 'Inactive' }}
                    </button> --}}
                   
    <label class="switch">
        <input type="checkbox"
               class="toggle-status"
               data-id="{{ $service->id }}"
               {{ $service->is_active ? 'checked' : '' }}>
        <span class="slider"></span>
    </label>


                </td>
                <td>
                    {{-- Update --}}
                    <form method="POST" action="{{ route('admin.portfolio-services.update', $service->id) }}" class="d-inline">
                        @csrf
                        <input type="text" name="service_name" value="{{ $service->service_name }}"
                            class="form-control d-inline w-50" required>
                        <button class="btn btn-sm btn-warning">Update</button>
                    </form>

                    {{-- Delete --}}
                    <form method="POST" action="{{ route('admin.portfolio-services.destroy', $service->id) }}" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger"
                            onclick="return confirm('Delete this service?')">Delete</button>
                    </form>


                    
                    {{-- Add Items --}}
                    <a href="{{ route('admin.portfolio-service-items.index', $service->id) }}"
                    class="btn btn-sm btn-info text-white">
                        + Items
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<style>
    .switch {
    position: relative;
    display: inline-block;
    width: 52px;
    height: 26px;
}

.switch input {
    opacity: 0;
    width: 0;
    height: 0;
}

.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    transition: .3s;
    border-radius: 30px;
}

.slider:before {
    position: absolute;
    content: "";
    height: 20px;
    width: 20px;
    left: 3px;
    bottom: 3px;
    background-color: white;
    transition: .3s;
    border-radius: 50%;
}

input:checked + .slider {
    background-color: #22c55e; /* green */
}

input:checked + .slider:before {
    transform: translateX(26px);
}

</style>
{{-- Status Toggle Script --}}
<script>
document.querySelectorAll('.toggle-status').forEach(btn => {
    btn.addEventListener('click', function () {
        fetch("{{ route('admin.portfolio-services.update-status') }}", {
            method: "POST",
            headers: {
                "X-CSRF-TOKEN": "{{ csrf_token() }}",
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ id: this.dataset.id })
        })
        .then(res => res.json())
        .then(data => location.reload());
    });
});
</script>
@endsection

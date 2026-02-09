@extends('layouts.app')

@section('content')
<div class="container">

    <h3 class="mb-3">Team Members</h3>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- ADD MEMBER --}}
    <form method="POST"
          action="{{ route('admin.team.members.store') }}"
          enctype="multipart/form-data">
        @csrf

        <div class="row mb-3">
            <div class="col-md-3">
                <input type="text"
                       name="name"
                       class="form-control"
                       placeholder="Name"
                       required>
            </div>

            <div class="col-md-3">
                <input type="text"
                       name="designation"
                       class="form-control"
                       placeholder="Designation"
                       required>
            </div>

            <div class="col-md-3">
                <input type="file"
                       name="image"
                       class="form-control"
                       required>
            </div>

            <div class="col-md-3">
                <button class="btn btn-primary w-100">
                    Add Member
                </button>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-3">
                <input type="url"
                       name="x_url"
                       class="form-control"
                       placeholder="X (Twitter) URL">
            </div>

            <div class="col-md-3">
                <input type="url"
                       name="fb_url"
                       class="form-control"
                       placeholder="Facebook URL">
            </div>

            <div class="col-md-3">
                <input type="url"
                       name="insta_url"
                       class="form-control"
                       placeholder="Instagram URL">
            </div>

            <div class="col-md-3">
                <input type="url"
                       name="linkedin_url"
                       class="form-control"
                       placeholder="LinkedIn URL">
            </div>
        </div>
    </form>

    {{-- MEMBERS LIST --}}
    <table class="table table-bordered align-middle">
        <thead>
            <tr>
                <th>#</th>
                <th>Member</th>
                <th>Social Links</th>
                <th>Status</th>
                <th >Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($members as $member)
            <tr>
                <td>{{ $loop->iteration }}</td>

                <td>
                    <img src="{{ asset($member->image_path) }}"
                         width="60"
                         class="rounded-circle mb-1">
                    <div>
                        <strong>{{ $member->name }}</strong><br>
                        <small>{{ $member->designation }}</small>
                    </div>
                </td>

                <td>
                    @if($member->x_url)
                        <a href="{{ $member->x_url }}" target="_blank">X</a>
                    @endif
                    @if($member->fb_url)
                        | <a href="{{ $member->fb_url }}" target="_blank">FB</a>
                    @endif
                    @if($member->insta_url)
                        | <a href="{{ $member->insta_url }}" target="_blank">IG</a>
                    @endif
                    @if($member->linkedin_url)
                        | <a href="{{ $member->linkedin_url }}" target="_blank">IN</a>
                    @endif
                </td>

                <td>
                    <span class="badge {{ $member->status ? 'bg-success' : 'bg-secondary' }}">
                        {{ $member->status ? 'Active' : 'Inactive' }}
                    </span>
                </td>

                <td>
                   
                    {{-- UPDATE FORM --}}
                    <form method="POST"
                        action="{{ route('admin.team.members.update', $member->id) }}"
                        enctype="multipart/form-data"
                        class="mb-2">
                        @csrf
                        @method('PUT')

                        <input type="text"
                            name="name"
                            value="{{ $member->name }}"
                            class="form-control mb-1"
                            placeholder="Name"
                            required>

                        <input type="text"
                            name="designation"
                            value="{{ $member->designation }}"
                            class="form-control mb-1"
                            placeholder="Designation"
                            required>

                        <input type="file"
                            name="image"
                            class="form-control mb-1">

                        <input type="url"
                            name="x_url"
                            value="{{ $member->x_url }}"
                            class="form-control mb-1"
                            placeholder="X (Twitter)">

                        <input type="url"
                            name="fb_url"
                            value="{{ $member->fb_url }}"
                            class="form-control mb-1"
                            placeholder="Facebook">

                        <input type="url"
                            name="insta_url"
                            value="{{ $member->insta_url }}"
                            class="form-control mb-1"
                            placeholder="Instagram">

                        <input type="url"
                            name="linkedin_url"
                            value="{{ $member->linkedin_url }}"
                            class="form-control mb-1"
                            placeholder="LinkedIn">

                        <select name="status"
                                class="form-control mb-2">
                            <option value="1" {{ $member->status ? 'selected' : '' }}>
                                Active
                            </option>
                            <option value="0" {{ !$member->status ? 'selected' : '' }}>
                                Inactive
                            </option>
                        </select>

                        <button class="btn btn-sm btn-warning w-100">
                            Update
                        </button>
                    </form>

   


                    {{-- DELETE --}}
                    <form method="POST"
                          action="{{ route('admin.team.members.destroy', $member->id) }}">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-sm btn-danger w-100"
                                onclick="return confirm('Delete this member?')">
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

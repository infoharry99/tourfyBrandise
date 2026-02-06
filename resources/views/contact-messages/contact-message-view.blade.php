@extends('layouts.app') {{-- change layout if needed --}}

@section('content')
<div class="container-fluid">

    <div class="mb-3">
        <a href="{{ url('/admin/contact-messages') }}" class="btn btn-secondary btn-sm">
            ← Back
        </a>
    </div>

    <div class="card">
        <div class="card-header">
            <h5>{{ $message->subject }}</h5>
        </div>

        <div class="card-body">
            <p><strong>Name:</strong> {{ $message->name }}</p>
            <p><strong>Email:</strong>
                <a href="mailto:{{ $message->email }}">
                    {{ $message->email }}
                </a>
            </p>
            <p><strong>Date:</strong> {{ $message->created_at->format('d M Y, h:i A') }}</p>

            <hr>

            <p><strong>Message:</strong></p>
            <div class="border rounded p-3 bg-light">
                {{ $message->message }}
            </div>
        </div>

        <div class="card-footer d-flex gap-2">
            <a href="mailto:{{ $message->email }}"
                target="_blank"
                rel="noopener noreferrer"
               class="btn btn-success btn-sm">
                Reply via Email
            </a>
        </div>
    </div>

</div>
@endsection

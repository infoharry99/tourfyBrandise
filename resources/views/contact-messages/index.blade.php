@extends('layouts.app') {{-- change layout if needed --}}

@section('content')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Contact Messages</h4>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body table-responsive">

            <table class="table table-bordered table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Subject</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th width="120">Action</th>
                    </tr>
                </thead>

                <tbody>
                @forelse($messages as $key => $msg)
                    <tr>
                        <td>{{ $messages->firstItem() + $key }}</td>
                        <td>{{ $msg->name }}</td>
                        <td>{{ $msg->email }}</td>
                        <td>{{ Str::limit($msg->subject, 30) }}</td>
                        <td>
                            @if($msg->status === 'new')
                                <span class="badge bg-danger">New</span>
                            @elseif($msg->status === 'read')
                                <span class="badge bg-warning">Read</span>
                            @else
                                <span class="badge bg-success">Replied</span>
                            @endif
                        </td>
                        <td>{{ $msg->created_at->format('d M Y') }}</td>
                        <td>
                            <a href="{{ url('/admin/contact-messages/'.$msg->id) }}"
                               class="btn btn-sm btn-primary">
                                View
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No messages found</td>
                    </tr>
                @endforelse
                </tbody>
            </table>

            <div class="mt-3">
                {{ $messages->links() }}
            </div>

        </div>
    </div>

</div>
@endsection

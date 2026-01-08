@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4 text-center fw-bold display-5">User Reviews</h1>

    @forelse($messages as $message)
        <div class="card shadow-sm mb-4 border-0 rounded-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h5 class="mb-0">
                        <i class="bi bi-person-circle me-2 text-danger"></i>
                        {{ $message->name }}
                    </h5>
                    <small class="text-muted">{{ $message->created_at->diffForHumans() }}</small>
                </div>

                <p class="mb-1">
                    <strong>Email:</strong> <a href="mailto:{{ $message->email }}">{{ $message->email }}</a>
                </p>

                <p class="mb-1">
                    <strong>Subject:</strong> {{ $message->subject ?? 'No subject' }}
                </p>

                <p class="mb-0">
                    <strong>Message:</strong><br>
                    {{ $message->message }}
                </p>
            </div>
        </div>
    @empty
        <div class="alert alert-info text-center">No messages found.</div>
    @endforelse

    <div class="d-flex justify-content-center mt-4">
        {{ $messages->links() }}
    </div>
</div>
@endsection

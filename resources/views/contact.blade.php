@extends('layouts.app')

@section('content')

<div class="container py-5 text-center">
    <h1 class="mb-3" style="font-size: 3rem;">Contact Us</h1>
    <p class="mb-5 text-muted" style="font-size: 1.2rem;">
        We consider all the drivers of change gives you the components you need to change to create a truly happens.
    </p>

    <div class="mx-auto p-5 bg-white shadow rounded-4" style="max-width: 700px;">
        {{-- ✅ form method & action --}}
        <form method="POST" action="{{ route('contact.store') }}">
            @csrf

            {{-- ✅ success message --}}
            @if(session('success'))
                <div class="alert alert-success mt-2">{{ session('success') }}</div>
            @endif

            {{-- ✅ validation errors --}}
            @if ($errors->any())
                <div class="alert alert-danger mt-2">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <input type="text" name="name" class="form-control rounded-pill" placeholder="Enter your name" value="{{ old('name') }}">
                    @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
                <div class="col-md-6">
                    <input type="email" name="email" class="form-control rounded-pill" placeholder="Enter email address" value="{{ old('email') }}">
                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>
            </div>

            <div class="mb-3">
                <input type="text" name="subject" class="form-control rounded-pill" placeholder="Write a subject" value="{{ old('subject') }}">
                @error('subject') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="mb-3">
                <textarea name="message" class="form-control rounded-4" placeholder="Write your message" rows="5">{{ old('message') }}</textarea>
                @error('message') <small class="text-danger">{{ $message }}</small> @enderror
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-danger rounded-pill py-2 fs-5">Send</button>
            </div>
        </form>
    </div>

    <div class="row mt-5 ">
        <div class="col-md-4">
            <h5>Call Us:</h5>
            <p class="text-danger fw-bold fs-5">+1-234-567-8900</p>
        </div>
        <div class="col-md-4">
            <h5>Hours:</h5>
            <p>Mon–Fri: 11am – 8pm<br>Sat, Sun: 9am – 10pm</p>
        </div>
        <div class="col-md-4">
            <h5>Our Location:</h5>
            <p>123 Bridge Street<br>Nowhere Land, LA 12345<br>United States</p>
        </div>
    </div>
</div>

@endsection

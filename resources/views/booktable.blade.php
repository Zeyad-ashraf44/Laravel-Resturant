@extends('layouts.app')

@section('content')

<div class="container py-5 text-center">
    <h1 class="mb-3" style="font-size: 3rem;">Book A Table</h1>
    <p class="mb-5 text-muted" style="font-size: 1.2rem;">
        We consider all the drivers of change gives you the components you need to change to create a truly happens.
    </p>

    {{-- رسالة النجاح بعد الحجز --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- نموذج الحجز --}}
    <div class="mx-auto p-5 bg-white shadow rounded-4" style="max-width: 700px;">
        <form method="POST" action="{{ route('book.store') }}">
            @csrf

            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <input type="date" name="date" class="form-control rounded-pill" required>
                </div>
                <div class="col-md-6">
                    <input type="time" name="time" class="form-control rounded-pill" required>
                </div>
            </div>

            <div class="row g-3 mb-3">
                <div class="col-md-6">
                    <input type="text" name="name" class="form-control rounded-pill" placeholder="Enter your name" required>
                </div>
                <div class="col-md-6">
                    <input type="text" name="phone" class="form-control rounded-pill" placeholder="Phone" required>
                </div>
            </div>

            <div class="mb-3 ">
                <select name="Number_of_Guests" class="form-select"  required>
                    <option value="" disabled selected>Number of Guests</option>
                    <option value="1">1 Person</option>
                    <option value="2">2 Persons</option>
                    <option value="3">3 Persons</option>
                    <option value="4">4 Persons</option>
                    <option value="5">5 Persons</option>
                </select>
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-danger rounded-pill py-2 fs-5">Book A Table</button>
            </div>
        </form>
    </div>
</div>

{{-- خريطة أو صورة للمكان --}}
<div style="height: 500px;">
    <img src="{{ asset('imges/Map.jpg') }}" alt="Map" width="100%" height="100%">
</div>

@endsection

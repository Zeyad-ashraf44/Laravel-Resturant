@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5">
    <h1 class="text-center mb-5 fw-bold">Admin Dashboard</h1>

    <!-- Management Section -->
    <div class="row justify-content-center g-4">
        <!-- Manage Users -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="card hover-card text-center h-100 bg-light-blue">
                <div class="card-body d-flex flex-column">
                    <i class="bi bi-person-gear fs-1 text-primary mb-3"></i>
                    <h5 class="card-title fw-bold">Manage Users</h5>
                    <p class="text-muted flex-grow-1">View, edit and manage system users.</p>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-primary mt-auto w-100">View Users</a>
                </div>
            </div>
        </div>

        <!-- Manage Bookings -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="card hover-card text-center h-100 bg-light-green">
                <div class="card-body d-flex flex-column">
                    <i class="bi bi-calendar-event fs-1 text-success mb-3"></i>
                    <h5 class="card-title fw-bold">Manage Bookings</h5>
                    <p class="text-muted flex-grow-1">Approve or reject customer bookings.</p>
                    <a href="{{ route('admin.bookings.index') }}" class="btn btn-success mt-auto w-100">View Bookings</a>
                </div>
            </div>
        </div>

        <!-- Manage Menu -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="card hover-card text-center h-100 bg-light-yellow">
                <div class="card-body d-flex flex-column">
                    <i class="bi bi-journal-text fs-1 text-warning mb-3"></i>
                    <h5 class="card-title fw-bold">Manage Menu</h5>
                    <p class="text-muted flex-grow-1">Add, update or delete menu items.</p>
                    <a href="{{ route('admin.menu.index') }}" class="btn btn-warning mt-auto w-100">View Menu</a>
                </div>
            </div>
        </div>

        <!-- Manage Messages -->
        <div class="col-12 col-sm-6 col-md-3">
            <div class="card hover-card text-center h-100 bg-light-red">
                <div class="card-body d-flex flex-column">
                    <i class="bi bi-envelope-paper fs-1 text-danger mb-3"></i>
                    <h5 class="card-title fw-bold">Manage Reviews</h5>
                    <p class="text-muted flex-grow-1">View and manage user Reviews.</p>
                    <a href="{{ route('admin.contact.index') }}" class="btn btn-danger mt-auto w-100">View Reviews</a>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Styling -->
<style>
    .hover-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 1px solid #ccc; 
        border-radius: 15px;
    }

    .hover-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.25);
        border-color: #666;
    }

    /* خلفيات خفيفة مختلفة */
    .bg-light-blue { background: #dae8f8; }
    .bg-light-green { background: #ccf0c4; }
    .bg-light-yellow { background: #ebe4b5; }
    .bg-light-red { background: #efd5d5; }
</style>
@endsection

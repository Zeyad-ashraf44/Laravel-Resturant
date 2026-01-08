@extends('layouts.app')

@section('content')
<div class="container-fluid p-0">

    <!-- Hero Section -->
   <div class="d-flex flex-column justify-content-center align-items-center text-center hero-section text-dark"
     style="background: url('{{ asset('imges/hero.jpg') }}') no-repeat center center; background-size: cover; height: 100vh;">
     
    <h1 class="display-3 fw-bold mb-4 hero-title">Best food for your taste</h1>
    <p class="lead mb-5 hero-subtitle">Discover delectable cuisine and unforgettable moments in our welcoming culinary haven.</p>

    <div>
        <a href="{{ route('book.create') }}" class="btn btn-danger btn-lg rounded-pill px-5 py-3 me-3 shadow">Book A Table</a>
        <a href="{{ route('menu.index') }}" class="btn btn-outline-dark btn-lg rounded-pill px-5 py-3 shadow">Explore Menu</a>
    </div>
</div>


    <!-- Browse Our Menu Section -->
    <div class="container my-5">
        <h2 class="text-center mb-5 fw-bold" style="font-size: 2.5rem;">Browse Our Menu</h2>

        <div class="row text-center">
            <!-- Breakfast -->
            <div class="col-12 col-sm-6 col-md-3 mb-4">
                <div class="card shadow-sm border rounded h-100">
                    <div class="card-body d-flex flex-column">
                        <div class="mb-3 pt-4">
                            <i class="fas fa-egg fa-3x text-danger"></i>
                        </div>
                        <h5 class="card-title fw-bold">Breakfast</h5>
                        <p class="card-text flex-grow-1">In the new era of technology we look in the future with certainty and pride for our life.</p>
                        <a href="{{ route('menu.index') }}" class="text-danger fw-bold text-decoration-none">Explore Menu</a>
                    </div>
                </div>
            </div>

            <!-- Main Dishes -->
            <div class="col-12 col-sm-6 col-md-3 mb-4">
                <div class="card shadow-sm border rounded h-100">
                    <div class="card-body d-flex flex-column">
                        <div class="mb-3 pt-4">
                            <i class="fas fa-drumstick-bite fa-3x text-danger"></i>
                        </div>
                        <h5 class="card-title fw-bold">Main Dishes</h5>
                        <p class="card-text flex-grow-1">In the new era of technology we look in the future with certainty and pride for our life.</p>
                        <a href="{{ route('menu.index') }}" class="text-danger fw-bold text-decoration-none">Explore Menu</a>
                    </div>
                </div>
            </div>

            <!-- Drinks -->
            <div class="col-12 col-sm-6 col-md-3 mb-4">
                <div class="card shadow-sm border rounded h-100">
                    <div class="card-body d-flex flex-column">
                        <div class="mb-3 pt-4">
                            <i class="fas fa-mug-hot fa-3x text-danger"></i>
                        </div>
                        <h5 class="card-title fw-bold">Drinks</h5>
                        <p class="card-text flex-grow-1">In the new era of technology we look in the future with certainty and pride for our life.</p>
                        <a href="{{ route('menu.index') }}" class="text-danger fw-bold text-decoration-none">Explore Menu</a>
                    </div>
                </div>
            </div>

            <!-- Desserts -->
            <div class="col-12 col-sm-6 col-md-3 mb-4">
                <div class="card shadow-sm border rounded h-100">
                    <div class="card-body d-flex flex-column">
                        <div class="mb-3 pt-4">
                            <i class="fas fa-ice-cream fa-3x text-danger"></i>
                        </div>
                        <h5 class="card-title fw-bold">Desserts</h5>
                        <p class="card-text flex-grow-1">In the new era of technology we look in the future with certainty and pride for our life.</p>
                        <a href="{{ route('menu.index') }}" class="text-danger fw-bold text-decoration-none">Explore Menu</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- Our Team Section -->
<div class="container my-5">
    <h2 class="text-center mb-5 fw-bold" style="font-size: 2.5rem;">Meet Our Team</h2>

    <div class="row g-4 text-center">
        <!-- Team Member 1 -->
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="d-flex justify-content-center pt-4">
                    <img src="{{ asset('imges/chef1.jpg') }}" class="card-img-top rounded-circle" alt="Chef 1">
                </div>
                <div class="card-body">
                    <h5 class="card-title fw-bold">John Smith</h5>
                    <p class="card-text text-muted">Head Chef</p>
                </div>
            </div>
        </div>

        <!-- Team Member 2 -->
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="d-flex justify-content-center pt-4">
                    <img src="{{ asset('imges/chef2.jpg') }}" class="card-img-top rounded-circle" alt="Chef 2">
                </div>
                <div class="card-body">
                    <h5 class="card-title fw-bold">Maria Lopez</h5>
                    <p class="card-text text-muted">Pastry Chef</p>
                </div>
            </div>
        </div>

        <!-- Team Member 3 -->
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="d-flex justify-content-center pt-4">
                    <img src="{{ asset('imges/chef3.jpg') }}" class="card-img-top rounded-circle" alt="Chef 3">
                </div>
                <div class="card-body">
                    <h5 class="card-title fw-bold">Ahmed Ali</h5>
                    <p class="card-text text-muted">Sous Chef</p>
                </div>
            </div>
        </div>

        <!-- Team Member 4 -->
        <div class="col-12 col-sm-6 col-lg-3">
            <div class="card border-0 shadow-sm h-100">
                <div class="d-flex justify-content-center pt-4">
                    <img src="{{ asset('imges/chef4.jpg') }}" class="card-img-top rounded-circle" alt="Chef 4">
                </div>
                <div class="card-body">
                    <h5 class="card-title fw-bold">Sarah Johnson</h5>
                    <p class="card-text text-muted">Manager</p>
                </div>
            </div>
        </div>
    </div>
</div>
    
</div>

@endsection

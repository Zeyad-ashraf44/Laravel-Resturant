<footer class="bg-dark text-light pt-5 pb-3">
    <div class="container">
        <div class="row">
            
            <!-- Description -->
            <div class="col-lg-4 col-md-6 mb-4">
                <h3 class="fw-bold mb-4" style="font-size: 2rem;">
                    <i class="bi bi-cup-hot"></i> Bistro Bliss
                </h3>
                <p class="footer-desc">
                    In the new era of technology we look in the future with certainty and pride for our company.
                </p>
            </div>

            <!-- Pages -->
            <div class="col-lg-2 col-md-6 mb-4">
                <h5 class="fw-bold mb-4">Pages</h5>
                <ul class="list-unstyled footer-links">
                    <li class="mb-2"><a href="{{ route('home') }}" class="text-light text-decoration-none">Home</a></li>
                    <li class="mb-2"><a href="{{ route('about') }}" class="text-light text-decoration-none">About</a></li>
                    <li class="mb-2"><a href="{{ route('menu.index') }}" class="text-light text-decoration-none">Menu</a></li>
                    <li class="mb-2"><a href="#" class="text-light text-decoration-none">Pricing</a></li>
                    <li class="mb-2"><a href="#" class="text-light text-decoration-none">Blog</a></li>
                    <li class="mb-2">
                        @if(Auth::check() && Auth::user()->is_admin)
                            <a class="text-light text-decoration-none {{ request()->routeIs('admin.contact.index') ? 'active fw-bold' : '' }}" 
                               href="{{ route('admin.contact.index') }}">
                               Contact
                            </a>
                        @else
                            <a class="text-light text-decoration-none {{ request()->routeIs('contact.form') ? 'active fw-bold' : '' }}" 
                               href="{{ route('contact.form') }}">
                               Contact
                            </a>
                        @endif
                    </li>
                    <li class="mb-2"><a href="#" class="text-light text-decoration-none">Delivery</a></li>
                </ul>
            </div>

            <!-- Utility Pages -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="fw-bold mb-4">Utility Pages</h5>
                <ul class="list-unstyled footer-links">
                    <li class="mb-2"><a href="#" class="text-light text-decoration-none">Start Here</a></li>
                    <li class="mb-2"><a href="#" class="text-light text-decoration-none">Styleguide</a></li>
                    <li class="mb-2"><a href="#" class="text-light text-decoration-none">Password Protected</a></li>
                    <li class="mb-2"><a href="#" class="text-light text-decoration-none">404 Not Found</a></li>
                    <li class="mb-2"><a href="#" class="text-light text-decoration-none">Licenses</a></li>
                    <li class="mb-2"><a href="#" class="text-light text-decoration-none">Changelog</a></li>
                    <li class="mb-2"><a href="#" class="text-light text-decoration-none">View More</a></li>
                </ul>
            </div>

            <!-- Instagram -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h5 class="fw-bold mb-4">Follow Us On Instagram</h5>
                <div class="row g-2">
                    <div class="col-6">
                        <div class="insta-img">
                            <img src="/imges/insta1.jpg" class="img-fluid rounded" alt="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="insta-img">
                            <img src="/imges/insta2.jpg" class="img-fluid rounded" alt="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="insta-img">
                            <img src="/imges/insta3.jpg" class="img-fluid rounded" alt="">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="insta-img">
                            <img src="/imges/insta4.jpg" class="img-fluid rounded" alt="">
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <hr class="border-secondary mt-4">

        <p class="text-center small mb-0">
            &copy; 2025 Hashtag Developer. All Rights Reserved
        </p>
    </div>
</footer>

<style>
.footer-desc {
    font-size: 1rem;
    max-width: 350px;
}
.footer-links a {
    font-size: 1rem;
    transition: color 0.3s;
}
.footer-links a:hover {
    color: #dc3545;
}

/* Instagram square images */
.insta-img {
    position: relative;
    width: 100%;
    padding-bottom: 100%; /* makes square */
    overflow: hidden;
}
.insta-img img {
    position: absolute;
    top: 0; left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Responsive fix */
@media (max-width: 576px) {
    .footer-links a {
        font-size: 0.9rem;
    }
    .footer-desc {
        font-size: 0.9rem;
    }
}
</style>

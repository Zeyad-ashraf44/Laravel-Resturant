@extends('layouts.app')

@section('content')
<div class="container py-5 text-center">
    <h1 class="mb-3" style="font-size: 3rem;">Our Menu</h1>
    <p class="mb-5 text-muted" style="font-size: 1.2rem;">
        We consider all the drivers of change gives you the components you need to change to create a truly happens.
    </p>

    {{-- Filter buttons --}}
    <div class="mb-5 d-flex justify-content-center gap-2 flex-wrap">
        <a href="{{ route('menu.index', 'all') }}"
           class="btn {{ $selectedCategory === 'all' || $selectedCategory === null ? 'btn-dark' : 'btn-outline-dark' }}">
           All
        </a>

        @foreach($categories as $cat)
            <a href="{{ route('menu.index', $cat->id) }}"
               class="btn {{ $selectedCategory === $cat->id ? 'btn-dark' : 'btn-outline-dark' }}">
               {{ $cat->name }}
            </a>
        @endforeach
    </div>
{{-- Menu items --}}
<div class="row">
    @foreach($menuItems as $item)
        <div class="col-md-3 mb-4">
            <div class="card h-100 shadow-sm border-0 menu-card"
                 id="menuCard{{ $item->id }}"
                 style="cursor: pointer;">

                @if($item->main_image)
                    <img src="{{ asset('/images/menu/'. $item->main_image) }}" 
                         class="img-fluid" 
                         style="height: 200px; object-fit: cover; width: 100%;">
                @else
                    <img src="{{ asset('images/menu/' ) }}" 
                         class="img-fluid" 
                         style="height: 200px; object-fit: cover; width: 100%;">
                @endif

                <div class="card-body text-start">
                    <h5 class="text-danger fw-bold">${{ number_format($item->price, 2) }}</h5>

                    @if($item->description)
                        <p class="text-muted mb-2" style="font-size: 14px;">
                            {{ \Illuminate\Support\Str::limit($item->description, 60) }}
                        </p>
                    @endif

                    <h6 class="fw-bold">{{ $item->name }}</h6>
                </div>
            </div>
        </div>

        {{-- Modal (Popup) --}}
        <div class="modal fade" id="menuModal{{ $item->id }}" tabindex="-1" aria-labelledby="menuModalLabel{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog modal-md modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fw-bold">{{ $item->name }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <p class="text-muted">{{ $item->description }}</p>
                        
                        <div class="d-flex justify-content-center gap-3 flex-wrap">
                            @php
                                $gallery = $item->gallery_images ? json_decode($item->gallery_images, true) : [];
                            @endphp
                            @foreach($gallery as $img)
                                <img src="{{ asset('images/menu/' . $img) }}" 
                                     class="img-fluid rounded shadow" style="max-height: 200px;">
                            @endforeach
                        </div>
                    </div>
                    <div class="modal-footer">
                        <h5 class="text-danger fw-bold mb-0">${{ number_format($item->price, 2) }}</h5>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

{{-- Script hover --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    @foreach($menuItems as $item)
        const card{{ $item->id }} = document.getElementById('menuCard{{ $item->id }}');
        const modal{{ $item->id }} = new bootstrap.Modal(document.getElementById('menuModal{{ $item->id }}'));
        
        card{{ $item->id }}.addEventListener('mouseenter', function() {
            modal{{ $item->id }}.show();
        });

        
        const modalEl{{ $item->id }} = document.getElementById('menuModal{{ $item->id }}');
        modalEl{{ $item->id }}.addEventListener('mouseleave', function() {
            modal{{ $item->id }}.hide();
        });
    @endforeach
});
</script>

{{-- Full width image section --}}
<div class="container-fluid px-0 mt-5">
    <img src="/imges/brand.jpg" alt="Menu Banner" class="img-fluid w-100" style="max-height: 550px; object-fit: cover;">
</div>
@endsection

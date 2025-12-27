@extends('layouts.app')

@section('title', $category->name . ' - Restaurant Management')

@section('content')
<div class="container py-5">
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
        </ol>
    </nav>

    <h1 class="mb-5">{{ $category->name }}</h1>

    <!-- Meals Grid -->
    <div class="row g-4">
        @forelse($meals as $meal)
            <div class="col-md-6 col-lg-4">
                <div class="card meal-card h-100">
                    @if($meal->image)
                        <img src="{{ asset('storage/' . $meal->image) }}" class="card-img-top" alt="{{ $meal->name }}">
                    @else
                        <img src="https://images.pexels.com/photos/1410235/pexels-photo-1410235.jpeg" class="card-img-top" alt="No image">
                    @endif
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title">{{ $meal->name }}</h5>
                            <span class="badge bg-warning text-dark">{{ $meal->category->name }}</span>
                        </div>
                        <p class="card-text text-muted small">{{ Str::limit($meal->description, 100) }}</p>
                        <h6 class="text-primary">${{ number_format($meal->price, 2) }}</h6>
                    </div>
                    <div class="card-footer bg-white border-0">
                        <button class="btn btn-primary w-100" onclick="alert('Add to cart feature coming soon!')">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-center text-muted">No meals in this category yet.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection

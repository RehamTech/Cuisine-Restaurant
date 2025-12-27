@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-12">
            <h3 class="fw-bold">Dashboard Overview</h3>
        </div>
    </div>

    <!-- Stats -->
    <div class="row mb-5">
        <div class="col-md-4">
            <div class="card p-4 text-center border-0 shadow-sm">
                <div class="d-flex align-items-center justify-content-center mb-3">
                    <div class="bg-primary bg-opacity-10 p-3 rounded-circle text-primary">
                        <i class="fas fa-layer-group fa-2x"></i>
                    </div>
                </div>
                <h6 class="text-muted text-uppercase mb-1 small fw-bold">Total Categories</h6>
                <h2 class="fw-bold mb-0 text-dark">{{ $totalCategories }}</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-4 text-center border-0 shadow-sm">
                <div class="d-flex align-items-center justify-content-center mb-3">
                    <div class="bg-info bg-opacity-10 p-3 rounded-circle text-info">
                        <i class="fas fa-hamburger fa-2x"></i>
                    </div>
                </div>
                <h6 class="text-muted text-uppercase mb-1 small fw-bold">Total Meals</h6>
                <h2 class="fw-bold mb-0 text-dark">{{ $totalMeals }}</h2>
            </div>
        </div>
    </div>

    <!-- Recent Meals -->
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-white border-bottom py-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 fw-bold">Recently Added Meals</h5>
                    <a href="{{ route('admin.meals.index') }}" class="btn btn-sm btn-outline-primary">View All</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th class="ps-4">Meal Name</th>
                                    <th>Category</th>
                                    <th>Price</th>
                                    <th class="pe-4">Added Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($recentMeals as $meal)
                                    <tr>
                                        <td class="ps-4">
                                            <div class="d-flex align-items-center">
                                                @if($meal->image)
                                                    <img src="{{ asset('storage/' . $meal->image) }}" class="rounded me-3" style="width: 40px; height: 40px; object-fit: cover;">
                                                @else
                                                    <div class="bg-light rounded me-3 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                                        <i class="fas fa-image text-muted"></i>
                                                    </div>
                                                @endif
                                                <span class="fw-bold">{{ $meal->name }}</span>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-secondary opacity-75">{{ $meal->category->name }}</span></td>
                                        <td class="fw-bold text-dark">${{ number_format($meal->price, 2) }}</td>
                                        <td class="text-muted pe-4">{{ $meal->created_at->format('M d, Y') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4 text-muted">No recent meals added</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

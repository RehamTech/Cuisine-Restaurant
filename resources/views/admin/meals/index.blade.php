@extends('layouts.admin')

@section('title', 'Meals')

@section('content')
<div class="container-fluid">
    <div class="row mb-4 align-items-center">
        <div class="col-md-6">
            <h3 class="fw-bold">Manage Meals</h3>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('admin.meals.create') }}" class="btn btn-primary d-inline-flex align-items-center">
                <i class="fas fa-plus me-2"></i> Add New Meal
            </a>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4">Image</th>
                            <th>Meal Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th class="pe-4 text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($meals as $meal)
                            <tr>
                                <td class="ps-4">
                                    @if($meal->image)
                                        <img src="{{ asset('storage/' . $meal->image) }}" alt="{{ $meal->name }}" class="rounded shadow-sm" style="height: 50px; width: 50px; object-fit: cover;">
                                    @else
                                        <div class="bg-light rounded d-flex align-items-center justify-content-center text-muted shadow-sm" style="height: 50px; width: 50px;">
                                            <i class="fas fa-image fa-lg"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="fw-bold text-dark">{{ $meal->name }}</div>
                                    <div class="small text-muted text-truncate" style="max-width: 200px;">{{ $meal->description }}</div>
                                </td>
                                <td>
                                    <span class="badge bg-secondary opacity-75">{{ $meal->category->name }}</span>
                                </td>
                                <td class="fw-bold text-dark">${{ number_format($meal->price, 2) }}</td>
                                <td class="pe-4 text-end">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('admin.meals.edit', $meal) }}" class="btn btn-sm btn-edit">
                                            <i class="fas fa-edit me-1"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.meals.destroy', $meal) }}" method="POST" onsubmit="return confirm('Do you really want to delete this meal?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-delete">
                                                <i class="fas fa-trash me-1"></i> Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="fas fa-utensils fa-3x mb-3 d-block opacity-25"></i>
                                    No meals found. Create one to get started!
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

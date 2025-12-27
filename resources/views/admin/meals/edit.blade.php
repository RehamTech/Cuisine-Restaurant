@extends('layouts.admin')

@section('title', 'Edit Meal')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-6">
            <h3 class="fw-bold">Edit Meal</h3>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('admin.meals.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i> Back to List
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <form action="{{ route('admin.meals.update', $meal) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-4">
                                    <label for="name" class="form-label fw-bold">Meal Name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $meal->name }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-4">
                                    <label for="price" class="form-label fw-bold">Price ($)</label>
                                    <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" value="{{ $meal->price }}" required>
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label for="category_id" class="form-label fw-bold">Category</label>
                            <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $meal->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="description" class="form-label fw-bold">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" required>{{ $meal->description }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-5">
                            <label for="image" class="form-label fw-bold d-block">Meal Image</label>
                            @if($meal->image)
                                <div class="mb-3">
                                    <img src="{{ asset('storage/' . $meal->image) }}" alt="{{ $meal->name }}" class="rounded shadow-sm" style="height: 120px; width: 120px; object-fit: cover;">
                                    <div class="form-text mt-1">Current image used.</div>
                                </div>
                            @endif
                            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                            <div class="form-text mt-2 small text-muted">Upload a new image to replace the existing one.</div>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2 border-top pt-4">
                            <button type="submit" class="btn btn-primary px-5 py-2 fw-bold">
                                <i class="fas fa-sync-alt me-2"></i> Update Meal
                            </button>
                            <a href="{{ route('admin.meals.index') }}" class="btn btn-light px-4 py-2">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

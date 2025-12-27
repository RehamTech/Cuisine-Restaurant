@extends('layouts.admin')

@section('title', 'Add Category')

@section('content')
<div class="container-fluid">
    <div class="row mb-4">
        <div class="col-md-6">
            <h3 class="fw-bold">Add New Category</h3>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">
                <i class="fas fa-arrow-left me-2"></i> Back to List
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm">
                <div class="card-body p-4">
                    <form action="{{ route('admin.categories.store') }}" method="POST">
                        @csrf

                        <div class="mb-4">
                            <label for="name" class="form-label fw-bold text-dark">Category Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="e.g. Italian Pizza" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text mt-2 text-muted small">Input the name of the category to organize your meals.</div>
                        </div>

                        <div class="pt-2">
                            <button type="submit" class="btn btn-primary px-4 py-2">
                                <i class="fas fa-save me-2"></i> Save Category
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

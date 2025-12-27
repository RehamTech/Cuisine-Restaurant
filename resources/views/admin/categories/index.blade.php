@extends('layouts.admin')

@section('title', 'Categories')

@section('content')
<div class="container-fluid">
    <div class="row mb-4 align-items-center">
        <div class="col-md-6">
            <h3 class="fw-bold">Manage Categories</h3>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary d-inline-flex align-items-center">
                <i class="fas fa-plus me-2"></i> Add Category
            </a>
        </div>
    </div>

    <div class="card border-0 shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th class="ps-4" style="width: 100px;">ID</th>
                            <th>Category Name</th>
                            <th class="pe-4 text-end" style="width: 250px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($categories as $category)
                            <tr>
                                <td class="ps-4 text-muted">#{{ $category->id }}</td>
                                <td class="fw-bold text-dark">{{ $category->name }}</td>
                                <td class="pe-4 text-end">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-sm btn-edit">
                                            <i class="fas fa-edit me-1"></i> Edit
                                        </a>
                                        <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category? All related meals will also be affected.')">
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
                                <td colspan="3" class="text-center py-4 text-muted">No categories found. Start by adding one!</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

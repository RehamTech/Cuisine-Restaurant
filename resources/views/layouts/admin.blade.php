<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --ocean-blue: #1B4B5A;
            --deep-ocean: #0D2F3F;
            --sand-gold: #316976ff;
            --light-sand: #F5E6D3;
            --cream: #FFF8F0;
            --soft-cream: #FAF6F1;
            --deep-black: #0a0a0a;
            --ocean-teal: #2C7A8C;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--cream);
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background-color: #ffffff;
            box-shadow: 2px 0 5px rgba(0,0,0,0.05);
            z-index: 1000;
        }

        .sidebar .nav-link {
            color: #333;
            padding: 12px 20px;
            margin: 4px 15px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            transition: all 0.2s;
        }

        .sidebar .nav-link:hover {
            background-color: var(--soft-cream);
            color: var(--ocean-blue);
        }

        .sidebar .nav-link.active {
            background-color: rgba(49, 105, 118, 0.1);
            color: var(--ocean-blue);
            font-weight: 600;
        }

        .sidebar .nav-link i {
            width: 20px;
            margin-right: 10px;
        }

        .top-bar {
            height: 60px;
            background-color: #ffffff;
            border-bottom: 1px solid #dee2e6;
            margin-left: 250px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 30px;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .main-content {
            margin-left: 250px;
            padding: 30px;
            min-height: calc(100vh - 60px);
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(133, 172, 195, 0.7);
        }

        .btn-add { background-color: var(--ocean-blue); color: white; }
        .btn-edit { background-color: var(--sand-gold); color: #000; }
        .btn-delete { background-color: #dc3545; color: white; }

        .text-primary {
            color: var(--ocean-blue) !important;
        }

        h5.text-primary {
            color: var(--ocean-blue) !important;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar d-none d-md-block">
        <div class="p-4 border-bottom mb-3">
            <h5 class="text-primary mb-0"><i class="fas fa-utensils me-2"></i>Cuisine</h5>
        </div>
        <nav class="nav flex-column">
            <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                <i class="fas fa-chart-line"></i> Dashboard
            </a>
            <a class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}" href="{{ route('admin.categories.index') }}">
                <i class="fas fa-list"></i> Categories
            </a>
            <a class="nav-link {{ request()->routeIs('admin.meals.*') ? 'active' : '' }}" href="{{ route('admin.meals.index') }}">
                <i class="fas fa-hamburger"></i> Meals
            </a>
            <div class="mt-auto border-top pt-2 mx-3">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link border-0 bg-transparent w-100 text-start text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </nav>
    </div>

    <!-- Top Bar -->
    <header class="top-bar">
        <h5 class="mb-0 text-dark">Admin Panel</h5>
        <div class="d-flex align-items-center">
            <span class="me-3 text-muted">Welcome, <strong>{{ auth()->user()->name }}</strong></span>
            <div class="dropdown">
                <a href="#" class="text-dark dropdown-toggle text-decoration-none" data-bs-toggle="dropdown">
                    <i class="fas fa-user-circle fa-lg"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Alerts -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm mb-4">
                <i class="fas fa-check-circle me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show border-0 shadow-sm mb-4">
                <i class="fas fa-exclamation-circle me-2"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
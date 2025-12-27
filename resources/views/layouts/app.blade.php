<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Restaurant Management')</title>
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

        header {
            background: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 1rem 0;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--sand-gold);
            text-decoration: none;
        }

        .nav-link {
            color: var(--deep-black) !important;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: var(--ocean-blue) !important;
        }

        .btn-primary {
            background-color: var(--ocean-blue);
            border-color: var(--ocean-blue);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--ocean-teal);
            border-color: var(--ocean-teal);
        }

        footer {
            background-color: var(--deep-ocean);
            color: white;
            padding: 3rem 0 1rem;
            margin-top: 4rem;
        }

        .card {
            border: none;
            border-radius: 12px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .meal-card img {
            height: 250px;
            object-fit: cover;
            border-radius: 12px 12px 0 0;
        }

        .badge {
            font-size: 0.75rem;
            padding: 0.5rem 1rem;
        }

        .hero {
            background: linear-gradient(rgba(13, 47, 63, 0.7), rgba(27, 75, 90, 0.6)), url('https://images.pexels.com/photos/2097090/pexels-photo-2097090.jpeg');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 8rem 0;
            text-align: center;
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: 1.5rem;
            margin-bottom: 2rem;
        }
    </style>
    @yield('extra-styles')
</head>
<body>
    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="logo" href="{{ route('home') }}">
                    <i class="fas fa-utensils"></i> Cuisine
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('menu') }}">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                        </li>
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}">Admin</a>
                            </li>
                            <li class="nav-item">
                                <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                                    @csrf
                                    <button type="submit" class="nav-link btn btn-link">Logout</button>
                                </form>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">Login</a>
                            </li>
                        @endauth
                        <li class="nav-item">
                            <a class="nav-link" href="tel:+1234567890">
                                <i class="fas fa-phone"></i> +1 (234) 567-890
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5 class="mb-3">Cuisine</h5>
                    <p>Experience fine dining at its best.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="mb-3">Address</h5>
                    <p>123 Restaurant Street<br>Food City, FC 12345</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="mb-3">Hours</h5>
                    <p>Mon-Thu: 11am - 10pm<br>Fri-Sun: 11am - 11pm</p>
                </div>
            </div>
            <hr class="bg-white">
            <div class="text-center">
                <div class="mb-3">
                    <a href="#" class="text-white me-3"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                </div>
                <p>&copy; 2024 Cuisine. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>
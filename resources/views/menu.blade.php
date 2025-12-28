@extends('layouts.app')

@section('title', 'Menu - Cuisine')

@section('content')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800&family=Montserrat:wght@300;400;500;600;700&display=swap');

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
        font-family: 'Montserrat', sans-serif; 
        background: var(--cream); 
        color: var(--deep-black);
    }

    /* ========== PAGE HEADER ========== */
    .page-header {
        background: linear-gradient(135deg, var(--deep-ocean) 0%, var(--ocean-blue) 100%);
        color: var(--cream);
        padding: 100px 0 80px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .page-header::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(212, 175, 55, 0.08) 0%, transparent 70%);
        animation: rotate 25s linear infinite;
    }

    @keyframes rotate {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    .page-header-content {
        position: relative;
        z-index: 1;
    }

    .page-subtitle {
        font-size: 13px;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: var(--sand-gold);
        font-weight: 600;
        margin-bottom: 15px;
    }

    .page-header h1 {
        font-family: 'Playfair Display', serif;
        font-size: 56px;
        font-weight: 700;
        margin-bottom: 20px;
        letter-spacing: 2px;
    }

    .page-description {
        font-size: 16px;
        font-weight: 300;
        color: rgba(255, 248, 240, 0.85);
        max-width: 600px;
        margin: 0 auto;
        letter-spacing: 0.5px;
        line-height: 1.7;
    }

    /* ========== FILTER BUTTONS ========== */
    .filter-section {
        background: #ffffff;
        padding: 30px 0;
        box-shadow: 0 2px 15px rgba(0,0,0,0.05);
        border-bottom: 1px solid rgba(212, 175, 55, 0.2);
    }

    .filter-btn {
        background: transparent;
        border: 2px solid rgba(212, 175, 55, 0.3);
        color: var(--deep-black);
        padding: 0;
        font-weight: 600;
        font-size: 10px;
        letter-spacing: 1px;
        text-transform: uppercase;
        transition: all 0.4s ease;
        border-radius: 100px;
        position: relative;
        overflow: hidden;
        width: 90px;
        height: 90px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .filter-btn-image {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        border-radius: 50%;
        transition: transform 0.4s ease;
        z-index: 1;
    }

    .filter-btn:hover .filter-btn-image {
        transform: scale(1.1);
    }

    .filter-btn-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        border-radius: 50%;
        transition: background 0.4s ease;
        z-index: 2;
    }

    .filter-btn:hover .filter-btn-overlay,
    .filter-btn.active .filter-btn-overlay {
        background: rgba(49, 105, 118, 0.85);
    }

    .filter-btn-text {
        position: relative;
        z-index: 3;
        color: #ffffff;
        text-shadow: 2px 2px 8px rgba(0,0,0,0.5);
        transition: all 0.3s ease;
        padding: 10px;
        text-align: center;
        line-height: 1.3;
    }

    .filter-btn:hover .filter-btn-text,
    .filter-btn.active .filter-btn-text {
        color: var(--deep-black);
        text-shadow: none;
        font-weight: 700;
    }

    .filter-btn:hover,
    .filter-btn.active {
        border-color: var(--sand-gold);
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(49, 105, 118, 0.4);
    }

    .filter-btn.active {
        border-color: var(--sand-gold);
        border-width: 3px;
    }

    /* ========== MEAL CARDS ========== */
    .meals-section {
        padding: 80px 0;
    }

    .meal-item {
        opacity: 1;
        transform: scale(1);
        transition: opacity 0.4s ease, transform 0.4s ease;
    }

    .meal-item.hidden {
        display: none;
    }

    .meal-card { 
        border-radius: 20px; 
        overflow: hidden; 
        box-shadow: 0 15px 40px rgba(0,0,0,.12); 
        transition: all .4s cubic-bezier(0.4, 0, 0.2, 1); 
        cursor: pointer;
        background: #ffffff;
        border: 1px solid rgba(212, 175, 55, 0.1);
        position: relative;
        height: 100%;
    }

    .meal-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: linear-gradient(135deg, rgba(49, 105, 118, 0.05) 0%, transparent 100%);
        opacity: 0;
        transition: opacity 0.4s ease;
        z-index: 1;
        pointer-events: none;
    }

    .meal-card:hover::before {
        opacity: 1;
    }

    .meal-card:hover { 
        transform: translateY(-12px) scale(1.02); 
        box-shadow: 0 25px 60px rgba(49, 105, 118, 0.25),
                    0 0 0 1px var(--sand-gold); 
    }

    .meal-card-img-wrapper {
        position: relative;
        overflow: hidden;
        height: 200px;
    }

    .meal-card img { 
        width: 100%;
        height: 100%; 
        object-fit: cover; 
        transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1); 
    }

    .meal-card:hover img { 
        transform: scale(1.15); 
    }

    .meal-card-overlay {
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: linear-gradient(to bottom, transparent 0%, rgba(0,0,0,0.7) 100%);
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .meal-card:hover .meal-card-overlay {
        opacity: 1;
    }

    .category-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: var(--sand-gold);
        color: var(--deep-black);
        padding: 6px 14px;
        border-radius: 30px;
        font-size: 10px;
        font-weight: 700;
        letter-spacing: 0.8px;
        text-transform: uppercase;
        z-index: 2;
        box-shadow: 0 4px 15px rgba(49, 105, 118, 0.4);
    }

    .meal-card .card-body {
        padding: 20px;
        position: relative;
        z-index: 2;
    }

    .meal-card .card-title { 
        font-family: 'Playfair Display', serif;
        color: var(--deep-black); 
        font-weight: 700;
        font-size: 20px;
        margin-bottom: 10px;
        transition: color 0.3s ease;
    }

    .meal-card:hover .card-title {
        color: var(--sand-gold);
    }

    .meal-card .card-text { 
        color: #666; 
        font-size: 13px;
        line-height: 1.6;
        margin-bottom: 15px;
        min-height: 50px;
    }

    .meal-price {
        font-family: 'Playfair Display', serif;
        font-size: 24px;
        font-weight: 700;
        color: var(--sand-gold);
        margin-bottom: 0;
    }

    .meal-card .card-footer {
        background: var(--soft-cream);
        border: none;
        padding: 15px 20px;
    }

    .meal-card .btn-add-cart { 
        background: var(--deep-black); 
        color: var(--cream); 
        font-weight: 600; 
        font-size: 13px;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        padding: 12px;
        border: 2px solid var(--deep-black);
        transition: all 0.3s ease; 
        position: relative;
        overflow: hidden;
    }

    .meal-card .btn-add-cart::before {
        content: '';
        position: absolute;
        top: 50%; left: 50%;
        width: 0; height: 0;
        border-radius: 50%;
        background: var(--sand-gold);
        transform: translate(-50%, -50%);
        transition: width 0.5s ease, height 0.5s ease;
        z-index: 0;
    }

    .meal-card .btn-add-cart:hover::before {
        width: 300px;
        height: 300px;
    }

    .meal-card .btn-add-cart:hover { 
        color: var(--deep-black);
        border-color: var(--sand-gold);
        transform: translateY(-2px);
    }

    .meal-card .btn-add-cart span {
        position: relative;
        z-index: 1;
    }

    /* ========== EMPTY STATE ========== */
    .empty-state {
        text-align: center;
        padding: 100px 0;
        display: none;
    }

    .empty-state.show {
        display: block;
    }

    .empty-state-icon {
        font-size: 80px;
        color: var(--sand-gold);
        opacity: 0.3;
        margin-bottom: 30px;
    }

    .empty-state h3 {
        font-family: 'Playfair Display', serif;
        font-size: 32px;
        color: var(--deep-black);
        margin-bottom: 15px;
    }

    .empty-state p {
        color: #666;
        font-size: 16px;
    }

    /* ========== RESPONSIVE ========== */
    @media (max-width: 768px) {
        .page-header h1 { font-size: 38px; }
        .filter-btn { 
            width: 80px;
            height: 80px;
            font-size: 9px;
            margin-bottom: 10px;
            border-width: 2px;
        }
        .filter-btn.active {
            border-width: 2px;
        }
        .meal-card-img-wrapper { height: 180px; }
    }
</style>

<!-- Page Header -->
<div class="page-header">
    <div class="container page-header-content">
        <div class="page-subtitle">Culinary Excellence</div>
        <h1>Our Complete Menu</h1>
        <p class="page-description">
            Discover our carefully curated selection of exquisite dishes, crafted with passion and the finest ingredients
        </p>
    </div>
</div>

<!-- Filter Section -->
<div class="filter-section">
    <div class="container">
        <div class="d-flex justify-content-center flex-wrap gap-3">
            <button class="btn filter-btn active" data-filter="all">
                <img src="https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg" alt="All Dishes" class="filter-btn-image">
                <div class="filter-btn-overlay"></div>
                <span class="filter-btn-text">All Dishes</span>
            </button>
            @php
                $categoryImages = [
                    'pizza' => 'https://images.pexels.com/photos/1653877/pexels-photo-1653877.jpeg',
                    'pasta' => 'https://images.pexels.com/photos/1438672/pexels-photo-1438672.jpeg',
                    'drinks' => 'https://images.pexels.com/photos/1441122/pexels-photo-1441122.jpeg',
                    'appetizers' => 'https://images.pexels.com/photos/262978/pexels-photo-262978.jpeg',
                    'italian-pizza' => 'https://images.pexels.com/photos/315755/pexels-photo-315755.jpeg',
                    'gourmet-burgers' => 'https://images.pexels.com/photos/1639557/pexels-photo-1639557.jpeg',
                    'fresh-salads' => 'https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg',
                    'desserts' => 'https://images.pexels.com/photos/291528/pexels-photo-291528.jpeg',
                ];
            @endphp
            @foreach($categories as $category)
                <button class="btn filter-btn" data-filter="{{ $category->slug }}">
                    <img src="{{ $categoryImages[$category->slug] ?? 'https://images.pexels.com/photos/1410235/pexels-photo-1410235.jpeg' }}" alt="{{ $category->name }}" class="filter-btn-image">
                    <div class="filter-btn-overlay"></div>
                    <span class="filter-btn-text">{{ $category->name }}</span>
                </button>
            @endforeach
        </div>
    </div>
</div>

<!-- Meals Grid -->
<section class="meals-section">
    <div class="container">
        <div class="row g-4" id="meals-grid">
            @php
                $categoryDefaultImages = [
                    'pizza' => 'https://images.pexels.com/photos/461198/pexels-photo-461198.jpeg',
                    'italian-pizza' => 'https://images.pexels.com/photos/315755/pexels-photo-315755.jpeg',
                    'pasta' => 'https://images.pexels.com/photos/376464/pexels-photo-376464.jpeg',
                    'drinks' => 'https://images.pexels.com/photos/1414234/pexels-photo-1414234.jpeg',
                    'appetizers' => 'https://images.pexels.com/photos/262978/pexels-photo-262978.jpeg',
                    'gourmet-burgers' => 'https://images.pexels.com/photos/1639557/pexels-photo-1639557.jpeg',
                    'fresh-salads' => 'https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg',
                    'desserts' => 'https://sallysbakingaddiction.com/wp-content/uploads/2017/02/chocolate-molten-lava-cakes.jpg',
                ];
            @endphp
            @foreach($meals as $index => $meal)
                <div class="col-md-6 col-lg-4 meal-item" data-category="{{ $meal->category->slug }}">
                    <div class="card meal-card">
                        <div class="meal-card-img-wrapper">
                            @if($meal->image)
                                <img src="{{ asset('storage/' . $meal->image) }}" alt="{{ $meal->name }}">
                            @else
                                @php
                                    $categorySlug = $meal->category->slug;
                                    $defaultImage = $categoryDefaultImages[$categorySlug] ?? 'https://images.pexels.com/photos/1410235/pexels-photo-1410235.jpeg';
                                @endphp
                                <img src="{{ $defaultImage }}" alt="{{ $meal->name }}">
                            @endif
                            <div class="meal-card-overlay"></div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $meal->name }}</h5>
                            <p class="card-text">{{ Str::limit($meal->description, 100) }}</p>
                            <h6 class="meal-price">${{ number_format($meal->price, 2) }}</h6>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-add-cart w-100" onclick="alert('Add to cart feature coming soon!')">
                                <span>Add to Cart</span>
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Empty State -->
        <div class="empty-state" id="empty-state">
            <div class="empty-state-icon">🍽️</div>
            <h3>No dishes found</h3>
            <p>Try selecting a different category</p>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterBtns = document.querySelectorAll('.filter-btn');
        const mealItems = document.querySelectorAll('.meal-item');
        const emptyState = document.getElementById('empty-state');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                // Remove active class from all buttons
                filterBtns.forEach(b => b.classList.remove('active'));
                
                // Add active class to clicked button
                this.classList.add('active');

                const filter = this.dataset.filter;
                let visibleCount = 0;

                // Filter meals with animation
                mealItems.forEach(item => {
                    if (filter === 'all' || item.dataset.category === filter) {
                        item.classList.remove('hidden');
                        visibleCount++;
                    } else {
                        item.classList.add('hidden');
                    }
                });

                // Show/hide empty state
                if (visibleCount === 0) {
                    emptyState.classList.add('show');
                } else {
                    emptyState.classList.remove('show');
                }

                // Smooth scroll to meals
                if (window.innerWidth < 768) {
                    document.querySelector('.meals-section').scrollIntoView({ 
                        behavior: 'smooth', 
                        block: 'start' 
                    });
                }
            });
        });
    });
</script>
@endsection
@extends('layouts.app')

@section('title', 'Home - Cuisine')

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
        overflow-x: hidden;
    }

    /* ========== HERO SECTION ========== */
    .hero {
        background: linear-gradient(rgba(13, 47, 63, 0.7), rgba(27, 75, 90, 0.6)), 
                    url('https://images.pexels.com/photos/12227752/pexels-photo-12227752.jpeg') center/cover no-repeat;
        color: var(--cream);
        padding: 220px 0 180px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .hero::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: radial-gradient(circle at center, transparent 0%, rgba(13, 47, 63, 0.4) 100%);
        z-index: 1;
    }

    .hero::after {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(44, 122, 140, 0.12) 0%, transparent 70%);
        animation: waveAnimation 25s linear infinite;
        z-index: 1;
    }

    @keyframes waveAnimation {
        0% { transform: rotate(0deg) translateX(0); }
        100% { transform: rotate(360deg) translateX(50px); }
    }

    .hero-content {
        position: relative;
        z-index: 2;
        animation: fadeInUp 1.2s ease-out;
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(40px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .hero-subtitle {
        font-family: 'Montserrat', sans-serif;
        font-size: 14px;
        letter-spacing: 4px;
        text-transform: uppercase;
        color: var(--sand-gold);
        margin-bottom: 20px;
        font-weight: 500;
    }

    .hero h1 { 
        font-family: 'Playfair Display', serif;
        font-size: 72px; 
        font-weight: 700; 
        margin-bottom: 24px;
        letter-spacing: 2px;
        text-shadow: 2px 2px 20px rgba(0,0,0,0.5);
    }

    .hero-description {
        font-size: 18px;
        font-weight: 300;
        margin-bottom: 40px;
        letter-spacing: 1px;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
        line-height: 1.8;
        color: rgba(255, 248, 240, 0.95);
    }

    .hero .btn-luxury {
        background: linear-gradient(135deg, var(--sand-gold) 0%, #5be8e6ff 100%);
        color: var(--deep-ocean);
        border: 2px solid var(--sand-gold);
        padding: 16px 50px;
        font-weight: 600;
        font-size: 15px;
        letter-spacing: 2px;
        text-transform: uppercase;
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
        box-shadow: 0 8px 25px rgba(55, 191, 212, 0.4);
    }

    .hero .btn-luxury::before {
        content: '';
        position: absolute;
        top: 0; left: -100%;
        width: 100%; height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
        transition: left 0.6s ease;
    }

    .hero .btn-luxury:hover::before {
        left: 100%;
    }

    .hero .btn-luxury:hover { 
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(55, 173, 212, 0.6);
        border-color: #5be8e6ff;
        background: linear-gradient(135deg, #5be8e6ff 0%, #5be8e6ff 100%);
    }

    /* ========== SECTION HEADER ========== */
    .section-header {
        text-align: center;
        margin-bottom: 70px;
        position: relative;
    }

    .section-label {
        font-size: 13px;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: var(--ocean-blue);
        font-weight: 600;
        margin-bottom: 15px;
    }

    .section-title {
        font-family: 'Playfair Display', serif;
        font-size: 48px;
        font-weight: 700;
        color: var(--deep-ocean);
        margin-bottom: 20px;
        position: relative;
        display: inline-block;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: -15px;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 3px;
        background: linear-gradient(90deg, transparent, #5be8e6ff, transparent);
    }

    /* ========== MEAL CARDS ========== */
    .meal-card { 
        border-radius: 20px; 
        overflow: hidden; 
        box-shadow: 0 15px 40px rgba(27, 75, 90, 0.15); 
        transition: all .4s cubic-bezier(0.4, 0, 0.2, 1); 
        cursor: pointer;
        background: #ffffff;
        border: 1px solid rgba(27, 75, 90, 0.08);
        position: relative;
    }

    .meal-card::before {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; bottom: 0;
        background: linear-gradient(135deg, rgba(27, 75, 90, 0.03) 0%, rgba(55, 173, 212, 0.03) 100%);
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
        box-shadow: 0 25px 60px rgba(27, 75, 90, 0.25),
                    0 0 0 2px var(--ocean-blue); 
    }

    .meal-card-img-wrapper {
        position: relative;
        overflow: hidden;
        height: 260px;
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
        background: linear-gradient(to bottom, transparent 0%, rgba(159, 211, 235, 0.89) 100%);
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .meal-card:hover .meal-card-overlay {
        opacity: 1;
    }

    .meal-badge {
        position: absolute;
        top: 20px;
        right: 20px;
        background: linear-gradient(135deg, var(--sand-gold), #5be8e6ff);
        color: var(--deep-ocean);
        padding: 8px 18px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
        z-index: 2;
        box-shadow: 0 4px 15px rgba(55, 173, 212, 0.5);
        border: 1px solid rgba(255, 255, 255, 0.3);
    }

    .meal-card .card-body {
        padding: 30px;
        position: relative;
        z-index: 2;
    }

    .meal-card h5 { 
        font-family: 'Playfair Display', serif;
        color: var(--deep-ocean); 
        font-weight: 700;
        font-size: 24px;
        margin-bottom: 12px;
        transition: color 0.3s ease;
    }

    .meal-card:hover h5 {
        color: var(--ocean-blue);
    }

    .meal-card p { 
        color: #666; 
        font-size: 14px;
        line-height: 1.7;
        margin-bottom: 20px;
    }

    .meal-price {
        font-family: 'Playfair Display', serif;
        font-size: 28px;
        font-weight: 700;
        color: var(--sand-gold);
        margin-bottom: 0;
        text-shadow: 1px 1px 3px rgba(212, 175, 55, 0.2);
    }

    .meal-card .card-footer {
        background: linear-gradient(135deg, var(--soft-cream) 0%, #ffffff 100%);
        border: none;
        padding: 20px 30px;
    }

    .meal-card .btn-add-cart { 
        background: linear-gradient(135deg, var(--ocean-blue) 0%, var(--ocean-teal) 100%);
        color: var(--cream); 
        font-weight: 600; 
        font-size: 14px;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        padding: 14px;
        border: 2px solid var(--ocean-blue);
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
    }

    .meal-card .btn-add-cart:hover::before {
        width: 300px;
        height: 300px;
    }

    .meal-card .btn-add-cart:hover { 
        color: var(--deep-ocean);
        border-color: var(--sand-gold);
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(55, 173, 212, 0.4);
    }

    .meal-card .btn-add-cart span {
        position: relative;
        z-index: 1;
    }

    /* ========== CTA SECTION ========== */
    .cta { 
        background: linear-gradient(135deg, var(--deep-ocean) 0%, var(--ocean-blue) 100%);
        color: var(--cream); 
        padding: 100px 0; 
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .cta::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(135, 211, 236, 0.54) 0%, transparent 70%);
        animation: rotate 20s linear infinite;
    }

    .cta::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, transparent, #5be8e6ff, transparent);
    }

    @keyframes rotate {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    .cta-content {
        position: relative;
        z-index: 1;
    }

    .cta h2 { 
        font-family: 'Playfair Display', serif;
        font-size: 52px;
        font-weight: 700;
        margin-bottom: 20px;
        color: var(--cream);
    }

    .cta p { 
        font-size: 18px;
        margin-bottom: 35px; 
        color: rgba(255, 248, 240, 0.85);
        font-weight: 300;
        letter-spacing: 1px;
    }

    .cta .btn-book { 
        background: transparent;
        color: rgba(231, 245, 249, 0.98);
        border: 2px solid rgba(55, 173, 212, 0.5);
        padding: 16px 50px; 
        font-weight: 600; 
        font-size: 15px;
        letter-spacing: 2px;
        text-transform: uppercase;
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
    }

    .cta .btn-book::before {
        content: '';
        position: absolute;
        top: 0; left: -100%;
        width: 100%; height: 100%;
        background: rgba(101, 193, 223, 0.5);
        transition: left 0.4s ease;
        z-index: -1;
    }

    .cta .btn-book:hover::before {
        left: 0;
    }

    .cta .btn-book:hover { 
        color: var(--deep-ocean);
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(101, 193, 223, 0.5);
    }

    /* ========== DECORATIVE ELEMENTS ========== */
    .decorative-line {
        width: 100%;
        height: 2px;
        background: linear-gradient(90deg, transparent, var(--ocean-blue), var(--ocean-teal), transparent);
        margin: 80px 0;
        position: relative;
    }

    .decorative-line::before,
    .decorative-line::after {
        content: '';
        position: absolute;
        width: 8px;
        height: 8px;
        background: var(--sand-gold);
        border-radius: 50%;
        top: 50%;
        transform: translateY(-50%);
        box-shadow: 0 0 10px rgba(55, 173, 212, 0.6);
    }

    .decorative-line::before {
        left: 50%;
        margin-left: -4px;
    }

    /* ========== RESPONSIVE ========== */
    @media (max-width: 768px) {
        .hero h1 { font-size: 42px; }
        .hero-description { font-size: 16px; }
        .section-title { font-size: 36px; }
        .cta h2 { font-size: 36px; }
        .meal-card-img-wrapper { height: 220px; }
    }
</style>

<section class="hero">
    <div class="container hero-content">
        <div class="hero-subtitle">Luxury Dining Experience</div>
        <h1>Welcome to Cuisine</h1>
        <p class="hero-description">Indulge in authentic fine dining crafted with passion, elegance, and the finest ingredients</p>
        <a href="{{ route('menu') }}" class="btn btn-luxury">Explore Our Menu</a>
    </div>
</section>

<section class="py-5" style="padding: 100px 0 !important;">
    <div class="container">
        <div class="section-header">
            <div class="section-label">Signature Collection</div>
            <h2 class="section-title">Featured Masterpieces</h2>
        </div>
        
        <div class="row g-4">
            @foreach([
                ['img'=>'https://images.pexels.com/photos/1410235/pexels-photo-1410235.jpeg','title'=>'Grilled Salmon','desc'=>'Freshly grilled Norwegian salmon with herbs, lemon butter, and seasonal vegetables.','price'=>'$25.99'],
                ['img'=>'https://images.pexels.com/photos/718742/pexels-photo-718742.jpeg','title'=>'Chicken Alfredo','desc'=>'Creamy fettuccine pasta with grilled chicken breast and aged parmesan.','price'=>'$19.50'],
                ['img'=>'https://images.pexels.com/photos/769289/pexels-photo-769289.jpeg','title'=>'Beef Steak','desc'=>'Prime cut grilled beef tenderloin with garlic herb butter and truffle oil.','price'=>'$30.00'],
                ['img'=>'https://images.pexels.com/photos/5792323/pexels-photo-5792323.jpeg','title'=>'Veggie Pizza','desc'=>'Artisan thin crust pizza with farm-fresh vegetables and mozzarella.','price'=>'$15.99'],
                ['img'=>'https://images.pexels.com/photos/1640777/pexels-photo-1640777.jpeg','title'=>'Caesar Salad','desc'=>'Crisp romaine hearts with house-made Caesar dressing and herb croutons.','price'=>'$12.50'],
                ['img'=>'https://images.pexels.com/photos/27365321/pexels-photo-27365321.jpeg','title'=>'Shrimp Tacos','desc'=>'Grilled shrimp in soft tortillas with avocado cream and fresh pico de gallo.','price'=>'$18.75'],
            ] as $meal)
            <div class="col-md-6 col-lg-4">
                <div class="card meal-card h-100">
                    <div class="meal-card-img-wrapper">
                        <img src="{{ $meal['img'] }}" alt="{{ $meal['title'] }}">
                        <div class="meal-card-overlay"></div>
                    </div>
                    <div class="card-body">
                        <h5>{{ $meal['title'] }}</h5>
                        <p class="small">{{ $meal['desc'] }}</p>
                        <h6 class="meal-price">{{ $meal['price'] }}</h6>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-add-cart w-100" onclick="alert('Add to cart coming soon')">
                            <span>Add to Cart</span>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<div class="decorative-line"></div>

<section class="cta">
    <div class="container cta-content">
        <h2>Reserve Your Experience</h2>
        <p>Book your table and immerse yourself in an unforgettable culinary journey</p>
        <button class="btn btn-book btn-lg" onclick="alert('Booking coming soon')">Book a Table</button>
    </div>
</section>
@endsection
@extends('layouts.app')

@section('title', 'About - Cuisine')

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
        background: radial-gradient(circle, rgba(44, 122, 140, 0.15) 0%, transparent 70%);
        animation: wave 20s linear infinite;
    }

    @keyframes wave {
        0% { transform: rotate(0deg) translateX(0); }
        100% { transform: rotate(360deg) translateX(50px); }
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

    /* ========== ABOUT SECTION ========== */
    .about-section {
        padding: 100px 0;
    }

    .about-card {
        background: #ffffff;
        border-radius: 30px;
        box-shadow: 0 20px 60px rgba(27, 75, 90, 0.15);
        overflow: hidden;
        position: relative;
        border: 1px solid rgba(212, 175, 55, 0.1);
    }

    .about-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 6px;
        background: linear-gradient(90deg, var(--ocean-blue), var(--sand-gold), var(--ocean-teal));
    }

    /* ========== IMAGE SECTION ========== */
    .about-images {
        position: relative;
        padding: 40px;
        display: flex;
        flex-direction: column;
        gap: 30px;
    }

    .main-image-wrapper {
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        height: 350px;
        box-shadow: 0 15px 40px rgba(0,0,0,0.2);
    }

    .main-image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .main-image-wrapper:hover img {
        transform: scale(1.1);
    }

    .secondary-image-wrapper {
        position: relative;
        border-radius: 20px;
        overflow: hidden;
        height: 250px;
        box-shadow: 0 15px 40px rgba(0,0,0,0.15);
    }

    .secondary-image-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .secondary-image-wrapper:hover img {
        transform: scale(1.1);
    }

    .image-overlay {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: linear-gradient(to top, rgba(13, 47, 63, 0.9), transparent);
        padding: 25px;
        color: white;
        transform: translateY(100%);
        transition: transform 0.4s ease;
    }

    .main-image-wrapper:hover .image-overlay,
    .secondary-image-wrapper:hover .image-overlay {
        transform: translateY(0);
    }

    .image-overlay h6 {
        font-family: 'Playfair Display', serif;
        font-size: 18px;
        font-weight: 600;
        margin: 0;
        color: var(--sand-gold);
    }

    /* ========== CONTENT SECTION ========== */
    .about-content {
        padding: 60px 50px;
        animation: fadeInUp 1s ease;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .about-label {
        font-size: 12px;
        letter-spacing: 2.5px;
        text-transform: uppercase;
        color: var(--ocean-blue);
        font-weight: 600;
        margin-bottom: 15px;
        display: inline-block;
        position: relative;
        padding-left: 50px;
    }

    .about-label::before {
        content: '';
        position: absolute;
        left: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 35px;
        height: 2px;
        background: var(--sand-gold);
    }

    .about-content h2 {
        font-family: 'Playfair Display', serif;
        font-size: 42px;
        font-weight: 700;
        color: var(--deep-ocean);
        margin-bottom: 30px;
        line-height: 1.3;
    }

    .about-content p {
        color: #555;
        font-size: 16px;
        line-height: 1.9;
        margin-bottom: 20px;
        font-weight: 400;
    }

    .about-content p.lead-text {
        font-size: 18px;
        color: var(--ocean-blue);
        font-weight: 500;
        margin-bottom: 25px;
    }

    .signature {
        font-family: 'Playfair Display', serif;
        font-size: 32px;
        color: var(--sand-gold);
        font-style: italic;
        margin-top: 30px;
        margin-bottom: 5px;
    }

    .signature-title {
        font-size: 13px;
        color: #999;
        letter-spacing: 2px;
        text-transform: uppercase;
    }

    /* ========== VALUES SECTION ========== */
    .values-section {
        margin-top: 50px;
        padding-top: 50px;
        border-top: 2px solid rgba(212, 175, 55, 0.2);
    }

    .values-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .values-header h3 {
        font-family: 'Playfair Display', serif;
        font-size: 36px;
        font-weight: 700;
        color: var(--deep-ocean);
        margin-bottom: 15px;
    }

    .values-header p {
        color: #666;
        font-size: 15px;
    }

    .values-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 25px;
    }

    .value-card {
        background: linear-gradient(135deg, var(--soft-cream) 0%, #ffffff 100%);
        border-radius: 20px;
        padding: 35px 30px;
        border: 2px solid transparent;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .value-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 5px;
        height: 100%;
        background: linear-gradient(180deg, var(--ocean-blue), var(--sand-gold));
        transform: scaleY(0);
        transition: transform 0.4s ease;
    }

    .value-card:hover::before {
        transform: scaleY(1);
    }

    .value-card:hover {
        border-color: var(--sand-gold);
        transform: translateY(-8px);
        box-shadow: 0 15px 40px rgba(27, 75, 90, 0.2);
        background: #ffffff;
    }

    .value-icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, rgba(27, 75, 90, 0.1), rgba(44, 122, 140, 0.1));
        border: 3px solid var(--ocean-blue);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        transition: all 0.4s ease;
        position: relative;
    }

    .value-icon svg {
        width: 32px;
        height: 32px;
        stroke: var(--ocean-blue);
        fill: none;
        stroke-width: 2;
        transition: all 0.4s ease;
    }

    .value-card:hover .value-icon {
        background: linear-gradient(135deg, var(--sand-gold), #5be8e6ff);
        border-color: var(--sand-gold);
        transform: scale(1.1) rotate(5deg);
        box-shadow: 0 10px 30px rgba(212, 175, 55, 0.4);
    }

    .value-card:hover .value-icon svg {
        stroke: var(--deep-ocean);
        transform: scale(1.1);
    }

    .value-card h5 {
        font-family: 'Playfair Display', serif;
        font-size: 22px;
        font-weight: 700;
        color: var(--deep-ocean);
        margin-bottom: 12px;
    }

    .value-card p {
        color: #666;
        font-size: 14px;
        line-height: 1.7;
        margin: 0;
    }

    /* ========== STATS SECTION ========== */
    .stats-section {
        background: linear-gradient(135deg, var(--deep-ocean) 0%, var(--ocean-blue) 100%);
        padding: 100px 0;
        margin-top: 100px;
        position: relative;
        overflow: hidden;
    }

    .stats-section::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-image: 
            radial-gradient(circle at 20% 30%, rgba(212, 175, 55, 0.1) 0%, transparent 50%),
            radial-gradient(circle at 80% 70%, rgba(44, 122, 140, 0.15) 0%, transparent 50%);
    }

    .stats-section::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, transparent, var(--sand-gold), transparent);
    }

    .stats-container {
        position: relative;
        z-index: 1;
    }

    .stat-item {
        text-align: center;
        padding: 30px 20px;
        position: relative;
    }

    .stat-item::after {
        content: '';
        position: absolute;
        right: 0;
        top: 50%;
        transform: translateY(-50%);
        width: 1px;
        height: 60%;
        background: linear-gradient(180deg, transparent, rgba(212, 175, 55, 0.4), transparent);
    }

    .stat-item:last-child::after {
        display: none;
    }

    .stat-icon {
        width: 70px;
        height: 70px;
        background: rgba(212, 175, 55, 0.15);
        border: 2px solid var(--sand-gold);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        transition: all 0.4s ease;
    }

    .stat-icon svg {
        width: 32px;
        height: 32px;
        stroke: var(--sand-gold);
        fill: none;
        stroke-width: 2;
    }

    .stat-item:hover .stat-icon {
        background: var(--sand-gold);
        transform: scale(1.1) rotate(10deg);
        box-shadow: 0 10px 30px rgba(212, 175, 55, 0.4);
    }

    .stat-item:hover .stat-icon svg {
        stroke: var(--deep-ocean);
    }

    .stat-number {
        font-family: 'Playfair Display', serif;
        font-size: 64px;
        font-weight: 700;
        color: var(--sand-gold);
        margin-bottom: 15px;
        display: block;
        text-shadow: 2px 2px 10px rgba(212, 175, 55, 0.3);
        line-height: 1;
    }

    .stat-label {
        font-size: 15px;
        color: var(--cream);
        letter-spacing: 2px;
        text-transform: uppercase;
        font-weight: 500;
        opacity: 0.9;
    }

    /* ========== RESPONSIVE ========== */
    @media (max-width: 768px) {
        .page-header h1 { font-size: 38px; }
        .about-content { padding: 40px 30px; }
        .about-content h2 { font-size: 32px; }
        .about-images { padding: 30px 20px; }
        .main-image-wrapper { height: 250px; }
        .secondary-image-wrapper { height: 200px; }
        .stat-number { font-size: 48px; }
        .stat-item::after { display: none; }
        .stat-item { padding: 20px 10px; }
    }
</style>

<!-- Page Header -->
<div class="page-header">
    <div class="container page-header-content">
        <div class="page-subtitle">Our Story</div>
        <h1>About Cuisine</h1>
        <p class="page-description">
            Where ocean views meet culinary excellence - a journey of passion, tradition, and unforgettable experiences
        </p>
    </div>
</div>

<!-- About Section -->
<section class="about-section">
    <div class="container">
        <div class="about-card">
            <div class="row g-0 align-items-stretch">
                
                <!-- Images Column -->
                <div class="col-lg-5">
                    <div class="about-images">
                        <div class="main-image-wrapper">
                            <img src="https://bamleb.s3.eu-central-1.amazonaws.com/26e72cc62f127d76-271644969_2994322404230991_2439667910682069025_n.jpeg" alt="Fine Dining Experience">
                            <div class="image-overlay">
                                <h6>Elegant Atmosphere</h6>
                            </div>
                        </div>
                        <div class="secondary-image-wrapper">
                            <img src="https://images.pexels.com/photos/12227752/pexels-photo-12227752.jpeg" alt="Ocean View Dining">
                            <div class="image-overlay">
                                <h6>Seaside Serenity</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Content Column -->
                <div class="col-lg-7">
                    <div class="about-content">
                        <span class="about-label">Since 2010</span>
                        <h2>A Culinary Haven by the Sea</h2>
                        
                        <p class="lead-text">
                            Cuisine represents the perfect harmony between exquisite dining and breathtaking ocean vistas.
                        </p>

                        <p>
                            Nestled along the pristine coastline, our restaurant offers an unparalleled dining experience where every dish is crafted with precision and passion. We believe that great food is an art form, and our chefs dedicate themselves to creating masterpieces that delight all your senses.
                        </p>

                        <p>
                            Since our founding in 2010, we have been committed to sourcing the finest ingredients, honoring traditional recipes while embracing innovation, and providing service that exceeds expectations. Each meal is a celebration of flavor, crafted with ingredients selected daily from local markets and sustainable sources.
                        </p>

                        <p>
                            Our oceanfront location isn't just a backdrop—it's an integral part of the experience. The gentle sound of waves, the fresh sea breeze, and stunning sunsets create an ambiance that transforms every meal into a memorable occasion.
                        </p>

                        <div class="signature">Cuisine</div>
                        <p class="signature-title">Executive Chef & Founder</p>

                    </div>
                </div>

            </div>
        </div>
    </div>
</section>


<script>
// Animated Counter for Stats
function animateCounter(element, target, duration = 2000) {
    const start = 0;
    const increment = target / (duration / 16);
    let current = start;
    
    const timer = setInterval(() => {
        current += increment;
        if (current >= target) {
            element.textContent = target >= 1000 ? (target / 1000).toFixed(0) + 'K+' : target + '+';
            clearInterval(timer);
        } else {
            if (target >= 1000) {
                element.textContent = (current / 1000).toFixed(1) + 'K';
            } else {
                element.textContent = Math.floor(current);
            }
        }
    }, 16);
}

// Intersection Observer for Stats Animation
const observerOptions = {
    threshold: 0.5,
    rootMargin: '0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const statNumbers = entry.target.querySelectorAll('.stat-number');
            statNumbers.forEach(stat => {
                const target = parseInt(stat.getAttribute('data-target'));
                animateCounter(stat, target);
            });
            observer.unobserve(entry.target);
        }
    });
}, observerOptions);

// Start observing when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    const statsSection = document.querySelector('.stats-section');
    if (statsSection) {
        observer.observe(statsSection);
    }
});
</script>

@endsection
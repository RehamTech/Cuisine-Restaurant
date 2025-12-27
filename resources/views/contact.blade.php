@extends('layouts.app')

@section('title', 'Contact - Cuisine')

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

    /* ========== CONTACT SECTION ========== */
    .contact-section {
        padding: 100px 0;
    }

    .contact-card {
        background: #ffffff;
        border-radius: 30px;
        box-shadow: 0 20px 60px rgba(27, 75, 90, 0.15);
        overflow: hidden;
        position: relative;
        border: 1px solid rgba(49, 105, 118, 0.1);
    }

    .contact-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 6px;
        background: linear-gradient(90deg, var(--ocean-blue), var(--sand-gold), var(--ocean-teal));
    }

    .contact-info {
        padding: 60px 50px;
        background: linear-gradient(135deg, var(--soft-cream) 0%, #ffffff 100%);
    }

    .info-item {
        background: #ffffff;
        border-radius: 20px;
        padding: 30px;
        margin-bottom: 25px;
        border: 2px solid transparent;
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
    }

    .info-item::before {
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

    .info-item:hover::before {
        transform: scaleY(1);
    }

    .info-item:hover {
        border-color: var(--sand-gold);
        transform: translateX(10px);
        box-shadow: 0 10px 30px rgba(27, 75, 90, 0.15);
    }

    .info-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, rgba(27, 75, 90, 0.1), rgba(44, 122, 140, 0.1));
        border: 3px solid var(--ocean-blue);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        transition: all 0.4s ease;
    }

    .info-icon i {
        font-size: 24px;
        color: var(--ocean-blue);
        transition: all 0.4s ease;
    }

    .info-item:hover .info-icon {
        background: linear-gradient(135deg, var(--sand-gold), #5be8e6ff);
        border-color: var(--sand-gold);
        transform: scale(1.1) rotate(10deg);
    }

    .info-item:hover .info-icon i {
        color: var(--deep-ocean);
    }

    .info-item h5 {
        font-family: 'Playfair Display', serif;
        font-size: 20px;
        font-weight: 700;
        color: var(--deep-ocean);
        margin-bottom: 10px;
    }

    .info-item p {
        color: #666;
        font-size: 15px;
        line-height: 1.7;
        margin: 0;
    }

    .info-item a {
        color: var(--ocean-blue);
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .info-item a:hover {
        color: var(--sand-gold);
    }

    /* ========== CONTACT FORM ========== */
    .contact-form {
        padding: 60px 50px;
    }

    .form-label {
        font-weight: 600;
        color: var(--deep-ocean);
        margin-bottom: 10px;
        font-size: 14px;
        letter-spacing: 0.5px;
        text-transform: uppercase;
    }

    .form-control,
    .form-select {
        border: 2px solid rgba(27, 75, 90, 0.15);
        border-radius: 12px;
        padding: 14px 20px;
        font-size: 15px;
        transition: all 0.3s ease;
        background: var(--soft-cream);
    }

    .form-control:focus,
    .form-select:focus {
        border-color: var(--sand-gold);
        box-shadow: 0 0 0 0.2rem rgba(49, 105, 118, 0.15);
        background: #ffffff;
    }

    textarea.form-control {
        min-height: 150px;
        resize: vertical;
    }

    .btn-submit {
        background: linear-gradient(135deg, var(--ocean-blue) 0%, var(--ocean-teal) 100%);
        color: var(--cream);
        border: 2px solid var(--ocean-blue);
        padding: 16px 50px;
        font-weight: 600;
        font-size: 15px;
        letter-spacing: 2px;
        text-transform: uppercase;
        border-radius: 12px;
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
    }

    .btn-submit::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        border-radius: 50%;
        background: var(--sand-gold);
        transform: translate(-50%, -50%);
        transition: width 0.5s ease, height 0.5s ease;
        z-index: 0;
    }

    .btn-submit:hover::before {
        width: 400px;
        height: 400px;
    }

    .btn-submit:hover {
        color: var(--deep-ocean);
        border-color: var(--sand-gold);
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(49, 105, 118, 0.4);
    }

    .btn-submit span {
        position: relative;
        z-index: 1;
    }

    /* ========== MAP SECTION ========== */
    .map-section {
        padding: 0 0 100px;
    }

    .map-container {
        border-radius: 30px;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(27, 75, 90, 0.15);
        height: 450px;
        border: 1px solid rgba(49, 105, 118, 0.1);
    }

    .map-container iframe {
        width: 100%;
        height: 100%;
        border: none;
    }

    /* ========== RESPONSIVE ========== */
    @media (max-width: 768px) {
        .page-header h1 { font-size: 38px; }
        .contact-form,
        .contact-info { padding: 40px 30px; }
        .info-item { padding: 25px; }
        .map-container { height: 300px; }
    }
</style>

<!-- Page Header -->
<div class="page-header">
    <div class="container page-header-content">
        <div class="page-subtitle">Get In Touch</div>
        <h1>Contact Us</h1>
        <p class="page-description">
            We'd love to hear from you. Send us a message and we'll respond as soon as possible
        </p>
    </div>
</div>

<!-- Contact Section -->
<section class="contact-section">
    <div class="container">
        <div class="contact-card">
            <div class="row g-0">
                
                <!-- Contact Info -->
                <div class="col-lg-5">
                    <div class="contact-info">
                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <h5>Address</h5>
                            <p>123 Restaurant Street<br>Food City, FC 12345</p>
                        </div>

                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <h5>Phone</h5>
                            <p><a href="tel:+1234567890">+1 (234) 567-890</a></p>
                        </div>

                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <h5>Email</h5>
                            <p><a href="mailto:info@cuisine.com">info@cuisine.com</a></p>
                        </div>

                        <div class="info-item">
                            <div class="info-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            <h5>Hours</h5>
                            <p>Mon-Thu: 11am - 10pm<br>Fri-Sun: 11am - 11pm</p>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="col-lg-7">
                    <div class="contact-form">
                        <form onsubmit="event.preventDefault(); alert('Message sent successfully!');">
                            <div class="mb-4">
                                <label for="name" class="form-label">Your Name</label>
                                <input type="text" class="form-control" id="name" placeholder="John Doe" required>
                            </div>
                            
                            <div class="mb-4">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" placeholder="john@example.com" required>
                            </div>
                            
                            <div class="mb-4">
                                <label for="phone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="phone" placeholder="+1 (234) 567-890">
                            </div>
                            
                            <div class="mb-4">
                                <label for="message" class="form-label">Your Message</label>
                                <textarea class="form-control" id="message" placeholder="Tell us what you're thinking..." required></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-submit w-100">
                                <span>Send Message</span>
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="map-section">
    <div class="container">
        <div class="map-container">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.2412648750455!2d-73.98823492346659!3d40.748817!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c259a9b3117469%3A0xd134e199a405a163!2sEmpire%20State%20Building!5e0!3m2!1sen!2sus!4v1234567890" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</section>

@endsection
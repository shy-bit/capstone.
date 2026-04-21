<?php require_once 'auth.php'; 
require_once 'customer_auth.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOOTH IMPRESSION Dau Branch - Fix Your Smile, Restore Your Confidence</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        .navbar-custom.scrolled {
            background-color: rgba(45, 117, 96, 0.95) !important;
            box-shadow: 0 2px 20px rgba(0,0,0,0.1) !important;
        }
        .navbar-custom.scrolled .navbar-brand span {
            color: #fff !important;
}
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="#home">
                <img src="image/logo.png" alt="TOOTH IMPRESSION Dau Branch" class="me-2" style="height: 50px;">
                <span class="fw-bold text-success">TOOTH IMPRESSION</span>
                <?php if (!empty($adminLoggedIn)): ?>
                    <span class="badge bg-warning text-dark ms-2">Admin: <?= htmlspecialchars($adminUsername, ENT_QUOTES, 'UTF-8') ?></span>
                <?php endif; ?>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="allPagesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            ALL PAGES
                        </a>
                        <ul class="dropdown-menu dropdown-menu-multi-column" aria-labelledby="allPagesDropdown" style="width: 500px; padding: 20px;">
                            <div class="row">
                                <div class="col-md-4">
                                    <ul class="list-unstyled">
                                        <li><a class="dropdown-item py-2" href="homes.php">Homepage</a></li>
                                        <li><a class="dropdown-item py-2" href="about.php">About</a></li>
                                        <li><a class="dropdown-item py-2" href="#reviews">Reviews</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul class="list-unstyled">
                                        <li><a class="dropdown-item py-2" href="blog.php">Blog</a></li>
                                        <li><a class="dropdown-item py-2" href="blog-details.php">Blog Details</a></li>
                                        <li><a class="dropdown-item py-2" href="#give">Give</a></li>
                                        <li><a class="dropdown-item py-2" href="doctor.php#details">Doctor Details</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul class="list-unstyled">
                                        <li><a class="dropdown-item py-2" href="contact.php">Contact</a></li>
                                        <li><a class="dropdown-item py-2" href="customer.php">My Appointments</a></li>
                                    </ul>
                                </div>
                            </div>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="services.php">SERVICES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="doctor.php">DOCTOR</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ms-2 px-3" bg-success href="booking.php" style="background-color: #2d7560; color: #ffffff !important; border-radius: 5px;">BOOK APPOINTMENT</a>
                    </li>
                   
                    <?php if (!empty($customerLoggedIn)): ?>
                        <li class="nav-item">
                            <span class="badge bg-success ms-2" style="padding: 0.7rem 1rem; display: inline-block; font-size: 0.95rem;"> CUSTOMER LOGGED IN
                            </span>
                        </li>
                        <li class="nav-item">
                            <a href="customer_dashboard.php" >
                                <img src="image/person.png" class="nav-link ms-2 px-3" style="color: white; border-radius: 5px;" alt="Customer Profile" width="70" height="50">
                            </a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle ms-2 px-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #2d7560; color: white; border-radius: 5px;">
                                LOGIN
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="customer_login.php">Customer Login</a></li>
                                <li><a class="dropdown-item" href="admin/login.php">Admin Login</a></li>
                            </ul>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section" style="background-image: url('image/bgimage.jpg'); background-attachment: fixed; background-size: cover; background-position: center;">
        <div class="hero-overlay"></div>
        <div class="container-fluid h-100">
            <div class="row align-items-center h-100">
                <div class="col-lg-6 col-md-12 hero-text">
                    <h1 class="display-4 fw-bold text-dark mb-4" style="font-size: 4.5rem;">Fix Your Smile,<br>Restore Your<br>Confidence</h1>
                    <p class="lead text-dark mb-4" style="font-size: 1.4rem;">
                        Whether it's a leaky faucet or a major dental <br> emergency, our experienced professionals are <br>just a call away
                    </p>
                    <a href="#booking" class="btn px-4 mb-5 rounded-pill" style="background-color: #2d7560; color: white;">BOOK AN APPOINTMENT</a>
                    
                    <!-- Stats inside Hero -->
                    <div class="row hero-stats">
                        <div class="col-6">
                            <h2 class="stat-number text-dark fw-bold">2,351+</h2>
                            <p class="text-dark small">Client satisfaction with<br>our Dau branch service</p>
                        </div>
                        <div class="col-6">
                            <h2 class="stat-number text-dark fw-bold">3,146+</h2>
                            <p class="text-dark small">Completed treatments by<br>our Dau branch</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Remove the old Statistics Section below - now integrated into hero -->

    <!-- Expert Care Section - Services with Pricing -->
    <section id="services" class="expert-care py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold mb-3" style="color: #2d7560;">Expert Care for Every Tooth</h2>
                <p class="lead text-muted">At our TOOTH IMPRESSION Dau Branch clinic, we believe every tooth deserves expert attention whether it's a routine check-up or a complex procedure</p>
            </div>

            <div class="row g-4">
                <!-- Dull to Dazzling -->
                <div class="col-md-6 col-lg-3">
                    <div class="service-pricing-card h-100">
                        <h4 class="service-title mb-3">Dull to Dazzling</h4>
                        <p class="service-description text-muted small mb-4">Restore the natural shine of your smile with our expert whitening treatment.</p>
                        <div class="service-duration mb-4">
                            <p class="text-success fw-bold mb-2">60-120 minutes</p>
                            <p class="text-muted small">starts at <span class="fw-bold">$50</span></p>
                        </div>
                        <a href="#booking" class="btn w-100" style="background-color: #2d7560; color: white;">BOOK NOW</a>
                    </div>
                </div>

                <!-- Deep Cleaning -->
                <div class="col-md-6 col-lg-3">
                    <div class="service-pricing-card h-100">
                        <h4 class="service-title mb-3">Deep Cleaning</h4>
                        <p class="service-description text-muted small mb-4">Deep cleaning, also known as scaling, is a specialized dental procedure designed to treat gum.</p>
                        <div class="service-duration mb-4">
                            <p class="text-success fw-bold mb-2">50-60 minutes</p>
                            <p class="text-muted small">starts at <span class="fw-bold">$150</span></p>
                        </div>
                        <a href="#booking" class="btn w-100" style="background-color: #2d7560; color: white;">BOOK NOW</a>
                    </div>
                </div>

                <!-- Brightening -->
                <div class="col-md-6 col-lg-3">
                    <div class="service-pricing-card h-100">
                        <h4 class="service-title mb-3">Brightening</h4>
                        <p class="service-description text-muted small mb-4">Brighten your smile with our professional teeth whitening treatment.</p>
                        <div class="service-duration mb-4">
                            <p class="text-success fw-bold mb-2">50-95 minutes</p>
                            <p class="text-muted small">starts at <span class="fw-bold">$50</span></p>
                        </div>
                        <a href="#booking" class="btn w-100" style="background-color: #2d7560; color: white;">BOOK NOW</a>
                    </div>
                </div>

                <!-- Smile Flex Aligners -->
                <div class="col-md-6 col-lg-3">
                    <div class="service-pricing-card h-100">
                        <h4 class="service-title mb-3">Smile Flex Aligners</h4>
                        <p class="service-description text-muted small mb-4">Smile Flex Aligners offer a modern and discreet solution to straighten your teeth.</p>
                        <div class="service-duration mb-4">
                            <p class="text-success fw-bold mb-2">60-115 minutes</p>
                            <p class="text-muted small">starts at <span class="fw-bold">$300</span></p>
                        </div>
                        <a href="#booking" class="btn w-100" style="background-color: #2d7560; color: white;">BOOK NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Select Your Treatment Section -->
    <section id="treatments" class="select-treatment py-5">
        <div class="container">
            <!-- Header Row -->
            <div class="row mb-5">
                <div class="col-lg-8">
                    <h2 class="display-6 fw-bold mb-3">Select Your Treatment</h2>
                    <p class="lead text-muted mb-0">With years of hands-on experience across multiple sectors, we bring deep industry knowledge, technical skill</p>
                </div>
            </div>

            <!-- Content Row -->
            <div class="row g-4 align-items-start" style="background-color: #f8f9fa; padding: 2rem; border-radius: 10px;">
                <!-- Cards Column -->
                <div class="col-lg-8">
                    <div class="row g-4">
                        <!-- Wisdom Extraction Card -->
                        <div class="col-md-6">
                            <div class="treatment-card position-relative overflow-hidden rounded-3" style="height: 350px;">
                                <img src="image/wisdom.jpg" alt="Wisdom Extraction" class="w-100 h-100" style="object-fit: cover; position: absolute; top: 0; left: 0; z-index: 0;">
                                <div class="position-absolute top-0 start-0 p-3" style="z-index: 2;">
                                    <span class="badge bg-light text-dark fw-bold">Wisdom Extraction</span>
                                </div>
                                <div class="treatment-overlay position-absolute bottom-0 start-0 w-100 p-4" style="background: linear-gradient(to top, rgba(0,0,0,0.9), transparent); z-index: 1;">
                                    <p class="text-white small mb-0">Wisdom tooth extraction is a common in the procedure to remove one or more of the third molars â€“ the last set of teeth to emerge.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Tooth Contouring Card -->
                        <div class="col-md-6">
                            <div class="treatment-card position-relative overflow-hidden rounded-3" style="height: 350px;">
                                <img src="image/contouring.jpeg" alt="Tooth Contouring" class="w-100 h-100" style="object-fit: cover; position: absolute; top: 0; left: 0; z-index: 0;">
                                <div class="position-absolute top-0 start-0 p-3" style="z-index: 2;">
                                    <span class="badge bg-light text-dark fw-bold">Tooth Contouring</span>
                                </div>
                                <div class="treatment-overlay position-absolute bottom-0 start-0 w-100 p-4" style="background: linear-gradient(to top, rgba(0,0,0,0.9), transparent); z-index: 1;">
                                    <p class="text-white small mb-0">Tooth contouring, also known as enamel shaping, is a quick and painless cosmetic procedure that gently reshapes your.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Treatment List Sidebar -->
                <div class="col-lg-4">
                    <div class="treatment-list">
                        <ul class="list-unstyled">
                            <li class="mb-4"><a href="#" class="text-dark text-decoration-none d-flex justify-content-between align-items-center"><span><i class="fas fa-arrow-right text-success me-3"></i>Oral Hygiene</span> <i class="fas fa-chevron-right text-success"></i></a></li>
                            <li class="mb-4"><a href="#" class="text-dark text-decoration-none d-flex justify-content-between align-items-center"><span><i class="fas fa-arrow-right text-success me-3"></i>Retainer Fitting</span> <i class="fas fa-chevron-right text-success"></i></a></li>
                            <li class="mb-4"><a href="#" class="text-dark text-decoration-none d-flex justify-content-between align-items-center"><span><i class="fas fa-arrow-right text-success me-3"></i>Periodontal Therapy</span> <i class="fas fa-chevron-right text-success"></i></a></li>
                            <li class="mb-4"><a href="#" class="text-dark text-decoration-none d-flex justify-content-between align-items-center"><span><i class="fas fa-arrow-right text-success me-3"></i>Dental Sealants</span> <i class="fas fa-chevron-right text-success"></i></a></li>
                            <li class="mb-4"><a href="#" class="text-dark text-decoration-none d-flex justify-content-between align-items-center"><span><i class="fas fa-arrow-right text-success me-3"></i>Emergency Dentistry</span> <i class="fas fa-chevron-right text-success"></i></a></li>
                            <li class="mb-4"><a href="#" class="text-dark text-decoration-none d-flex justify-content-between align-items-center"><span><i class="fas fa-arrow-right text-success me-3"></i>Preventive Care</span> <i class="fas fa-chevron-right text-success"></i></a></li>
                            <li class="mb-0"><a href="#" class="text-dark text-decoration-none d-flex justify-content-between align-items-center"><span><i class="fas fa-arrow-right text-success me-3"></i>Family Dentistry</span> <i class="fas fa-chevron-right text-success"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Before & After Showcase Section -->
    <?php
        $showcaseCards = [
            [
                'before'  => 'image/before1.png',
                'after'   => 'image/after1.png',
                'caption' => '60-Min Whitening | 2+ Shape Jump',
            ],
            [
                'before'  => 'image/before2.png',
                'after'   => 'image/after2.png',
                'caption' => '50-Min Whitening | 3+ Shape Jump',
            ],
            [
                'before'  => 'image/before3.png',
                'after'   => 'image/after3.png',
                'caption' => '40-Min Whitening | 5+ Shape Jump',
            ],
        ];
    ?>
    <section id="showcase" class="before-after-section">
        <div class="container">
            <h2 class="section-title">Expert Care for Every Tooth</h2>
            <div class="row g-4 showcase-grid">
                <?php foreach ($showcaseCards as $card): ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="showcase-card">
                            <div class="before-after-container">
                                <div class="before-image">
                                    <img src="<?= htmlspecialchars($card['before'], ENT_QUOTES, 'UTF-8') ?>" alt="Before">
                                    <span class="before-label">Before</span>
                                </div>
                                <div class="after-image">
                                    <img src="<?= htmlspecialchars($card['after'], ENT_QUOTES, 'UTF-8') ?>" alt="After">
                                    <span class="after-label">After</span>
                                </div>
                            </div>
                            <p class="showcase-description"><?= htmlspecialchars($card['caption'], ENT_QUOTES, 'UTF-8') ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Precision Dentistry Section -->
    <section id="precision" class="precision-dentistry py-5">
        <div class="container">
            <div class="row align-items-center g-5">
                <!-- Left Column -->
                <div class="col-lg-6">
                    <h2 class="precision-title mb-4">Precision Dentistry<br>for Lasting Results</h2>
                    
                    <div class="precision-features">
                        <div class="feature-item mb-4">
                            <h5 class="feature-title">Smile With Confidence</h5>
                            <p class="feature-text">Smile with confidence knowing your teeth are healthy, bright, and beautifully cared for whether you're.</p>
                        </div>

                        <div class="feature-item mb-4">
                            <h5 class="feature-title">Family-Friendly Clinic</h5>
                            <p class="feature-text">Our expert dental team is here to help you achieve a smile you're proud to show off from whitening.</p>
                        </div>

                        <div class="feature-item mb-0">
                            <h5 class="feature-title">Personalized Care Plans</h5>
                            <p class="feature-text">We offer personalized solutions designed to enhance both your appearance and self-esteem let us help.</p>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Image -->
                <div class="col-lg-6">
                    <img src="image/dental chair.jpg" alt="Dental Chair" class="precision-image img-fluid rounded-3" style="box-shadow: 0 8px 25px rgba(0,0,0,0.1);">
                </div>
            </div>

            <!-- Bottom CTA Section -->
            <div class="row mt-5 pt-4">
                <div class="col-12 text-center">
                    <p class="cta-text mb-3">Curious about cavity prevention? Just ask!</p>
                    <a href="#booking" class="btn rounded-pill px-4" style="background-color: #2d7560; color: white;">Reserve Your Spot Now</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer Section -->
    <footer class="footer-section py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <div class="row mb-5">
                <!-- Footer Brand -->
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <div class="footer-brand">
                        <h4 class="footer-logo mb-3">
                            <i class="fas fa-tooth" style="color: #2d7560;"></i> TOOTH IMPRESSION - Dau Branch
                        </h4>
                        <p class="footer-text small">Dau, Mabalacat, Pampanga, Philippines<br>Your smile is our priority. Whether you need routine care, cosmetic enhancements.</p>
                    </div>
                </div>

                <!-- Services -->
                <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                    <h6 class="footer-title mb-3">Services</h6>
                    <ul class="footer-links">
                        <li><a href="#services">Oral Hygiene</a></li>
                        <li><a href="#services">Retainer Fitting</a></li>
                        <li><a href="#services">Preventive Care</a></li>
                    </ul>
                </div>

                <!-- Hours -->
                <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                    <h6 class="footer-title mb-3">Hours</h6>
                    <ul class="footer-links">
                        <li>Monday - Saturday: 9AM-7PM</li>
                        <li>Sunday: CLOSED</li>
                    </ul>
                </div>

                <!-- Newsletter -->
                <div class="col-lg-3 col-md-6">
                    <h6 class="footer-title mb-3">Newsletter</h6>
                    <p class="footer-text small mb-3">Discover new offers and stay up to date</p>
                    <div class="newsletter-input input-group">
                        <input type="email" class="form-control" placeholder="Enter your email address" aria-label="Email address">
                        <button class="btn" style="background-color: #2d7560; color: white;" type="button"><i class="fas fa-paper-plane"></i></button>
                    </div>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="row pt-4 border-top">
                <div class="col-md-6 mb-3 mb-md-0">
                    <ul class="footer-bottom-links">
                        <li><a href="#contact">Contact</a></li>
                        <li><a href="#">FAQs</a></li>
                    </ul>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="footer-copyright small mb-0">2025 Â© TOOTH IMPRESSION All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
    <script>
        // Navbar fade on scroll
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar-custom');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>


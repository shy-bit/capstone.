<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wisdom Tooth Extraction - TOOTH IMPRESSION Dau Branch</title>
    
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
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="#home">
                <img src="image/logo.png" alt="TOOTH IMPRESSION Dau Branch" class="me-2" style="height: 50px;">
                <span class="fw-bold text-success">TOOTH IMPRESSION Dau Branch</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="allPagesDropdown" role="button" data-bs-toggle="dropdown">
                            ALL PAGES
                        </a>
                        <div class="dropdown-menu dropdown-menu-multi-column" aria-labelledby="allPagesDropdown" style="width: 500px; padding: 20px;">
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
                                        <li><a class="dropdown-item py-2" href="doctor.php">Doctor</a></li>
                                        <li><a class="dropdown-item py-2" href="doctor.php#details">Doctor Details</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul class="list-unstyled">
                                        <li><a class="dropdown-item py-2" href="#contact">Contact</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="services.php">SERVICES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="doctor.php">DOCTOR</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ms-2 px-3" href="booking.php" style="background-color: #2d7560; color: white; border-radius: 5px;">BOOK APPOINTMENT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero-section" style="background-image: url('image/wisdom-hero.jpg'); background-attachment: fixed; background-size: cover; background-position: center;">
        <div class="hero-overlay"></div>
        <div class="container-fluid h-100">
            <div class="row align-items-center h-100">
                <div class="col-lg-6 col-md-12 hero-text">
                    <h1 class="display-4 fw-bold text-dark mb-4" style="font-size: 4.5rem;">Wisdom Tooth<br>Extraction<br>Experts</h1>
                    <p class="lead text-dark mb-4" style="font-size: 1.4rem;">
                        Professional wisdom tooth removal with advanced techniques<br> for your comfort and safety at our Dau branch
                    </p>
                    <a href="#booking" class="btn px-4 mb-5 rounded-pill" style="background-color: #2d7560; color: white;">BOOK EXTRACTION</a>
                    
                    <!-- Stats inside Hero -->
                    <div class="row hero-stats">
                        <div class="col-6">
                            <h2 class="stat-number text-dark fw-bold">1,500+</h2>
                            <p class="text-dark small">Successful wisdom tooth<br>extractions performed</p>
                        </div>
                        <div class="col-6">
                            <h2 class="stat-number text-dark fw-bold">98%</h2>
                            <p class="text-dark small">Patient satisfaction<br>rate for procedures</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Wisdom Teeth Section -->
    <section id="about-wisdom" class="expert-care py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold mb-3" style="color: #2d7560;">Understanding Wisdom Teeth</h2>
                <p class="lead text-muted">Wisdom teeth, also known as third molars, are the last teeth to emerge in your mouth. Learn when extraction is necessary.</p>
            </div>

            <div class="row g-4">
                <!-- What are Wisdom Teeth -->
                <div class="col-md-6 col-lg-3">
                    <div class="service-pricing-card h-100">
                        <h4 class="service-title mb-3">What are Wisdom Teeth?</h4>
                        <p class="service-description text-muted small mb-4">Third molars that typically emerge between ages 17-25. They are the last teeth to come in and often cause problems.</p>
                        <div class="service-duration mb-4">
                            <p class="text-success fw-bold mb-2">Usually 4 teeth</p>
                            <p class="text-muted small">One in each corner</p>
                        </div>
                    </div>
                </div>

                <!-- When to Extract -->
                <div class="col-md-6 col-lg-3">
                    <div class="service-pricing-card h-100">
                        <h4 class="service-title mb-3">When Extraction is Needed</h4>
                        <p class="service-description text-muted small mb-4">Impacted teeth, infection, crowding, or pain are common reasons for wisdom tooth removal.</p>
                        <div class="service-duration mb-4">
                            <p class="text-success fw-bold mb-2">Early intervention</p>
                            <p class="text-muted small">Better outcomes</p>
                        </div>
                    </div>
                </div>

                <!-- The Procedure -->
                <div class="col-md-6 col-lg-3">
                    <div class="service-pricing-card h-100">
                        <h4 class="service-title mb-3">Safe Extraction Process</h4>
                        <p class="service-description text-muted small mb-4">Using modern techniques and anesthesia for comfortable, efficient wisdom tooth removal.</p>
                        <div class="service-duration mb-4">
                            <p class="text-success fw-bold mb-2">30-60 minutes</p>
                            <p class="text-muted small">Per tooth extraction</p>
                        </div>
                    </div>
                </div>

                <!-- Recovery Care -->
                <div class="col-md-6 col-lg-3">
                    <div class="service-pricing-card h-100">
                        <h4 class="service-title mb-3">Recovery & Aftercare</h4>
                        <p class="service-description text-muted small mb-4">Complete guidance for healing, pain management, and returning to normal activities.</p>
                        <div class="service-duration mb-4">
                            <p class="text-success fw-bold mb-2">1-2 weeks healing</p>
                            <p class="text-muted small">Full recovery time</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Wisdom Tooth Extraction Details Section -->
    <section id="extraction-details" class="select-treatment py-5">
        <div class="container">
            <!-- Header Row -->
            <div class="row mb-5">
                <div class="col-lg-8">
                    <h2 class="display-6 fw-bold mb-3">Professional Wisdom Tooth Extraction</h2>
                    <p class="lead text-muted mb-0">Our experienced dental team specializes in safe and comfortable wisdom tooth removal using the latest techniques and technology.</p>
                </div>
            </div>

            <!-- Content Row -->
            <div class="row g-4 align-items-start" style="background-color: #f8f9fa; padding: 2rem; border-radius: 10px;">
                <!-- Image and Details Column -->
                <div class="col-lg-8">
                    <div class="row g-4">
                        <!-- Wisdom Tooth Image -->
                        <div class="col-12">
                            <div class="treatment-card position-relative overflow-hidden rounded-3" style="height: 400px;">
                                <img src="image/wisdom.jpg" alt="Wisdom Tooth Extraction" class="w-100 h-100" style="object-fit: cover; position: absolute; top: 0; left: 0; z-index: 0;">
                                <div class="position-absolute top-0 start-0 p-3" style="z-index: 2;">
                                    <span class="badge bg-light text-dark fw-bold">Wisdom Tooth Extraction</span>
                                </div>
                                <div class="treatment-overlay position-absolute bottom-0 start-0 w-100 p-4" style="background: linear-gradient(to top, rgba(0,0,0,0.9), transparent); z-index: 1;">
                                    <p class="text-white small mb-0">Professional removal of impacted or problematic wisdom teeth with advanced surgical techniques for optimal patient comfort and recovery.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Procedure Details Sidebar -->
                <div class="col-lg-4">
                    <div class="treatment-list">
                        <h5 class="mb-4 fw-bold" style="color: #2d7560;">Extraction Process</h5>
                        <ul class="list-unstyled">
                            <li class="mb-4"><a href="#" class="text-dark text-decoration-none d-flex justify-content-between align-items-center"><span><i class="fas fa-arrow-right text-success me-3"></i>Initial Consultation</span> <i class="fas fa-chevron-right text-success"></i></a></li>
                            <li class="mb-4"><a href="#" class="text-dark text-decoration-none d-flex justify-content-between align-items-center"><span><i class="fas fa-arrow-right text-success me-3"></i>X-Ray Evaluation</span> <i class="fas fa-chevron-right text-success"></i></a></li>
                            <li class="mb-4"><a href="#" class="text-dark text-decoration-none d-flex justify-content-between align-items-center"><span><i class="fas fa-arrow-right text-success me-3"></i>Anesthesia Options</span> <i class="fas fa-chevron-right text-success"></i></a></li>
                            <li class="mb-4"><a href="#" class="text-dark text-decoration-none d-flex justify-content-between align-items-center"><span><i class="fas fa-arrow-right text-success me-3"></i>Surgical Extraction</span> <i class="fas fa-chevron-right text-success"></i></a></li>
                            <li class="mb-4"><a href="#" class="text-dark text-decoration-none d-flex justify-content-between align-items-center"><span><i class="fas fa-arrow-right text-success me-3"></i>Post-Op Care</span> <i class="fas fa-chevron-right text-success"></i></a></li>
                            <li class="mb-0"><a href="#" class="text-dark text-decoration-none d-flex justify-content-between align-items-center"><span><i class="fas fa-arrow-right text-success me-3"></i>Follow-up Visit</span> <i class="fas fa-chevron-right text-success"></i></a></li>
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
                'before'  => 'image/before-wisdom1.png',
                'after'   => 'image/after-wisdom1.png',
                'caption' => 'Impacted Wisdom Tooth | Successful Extraction',
            ],
            [
                'before'  => 'image/before-wisdom2.png',
                'after'   => 'image/after-wisdom2.png',
                'caption' => 'Infected Wisdom Tooth | Complete Removal',
            ],
            [
                'before'  => 'image/before-wisdom3.png',
                'after'   => 'image/after-wisdom3.png',
                'caption' => 'Crowded Wisdom Teeth | Orthodontic Prep',
            ],
        ];
    ?>
    <section id="showcase" class="before-after-section">
        <div class="container">
            <h2 class="section-title">Wisdom Tooth Extraction Results</h2>
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

    <!-- Advanced Extraction Techniques Section -->
    <section id="precision" class="precision-dentistry py-5">
        <div class="container">
            <div class="row align-items-center g-5">
                <!-- Left Column -->
                <div class="col-lg-6">
                    <h2 class="precision-title mb-4">Advanced Wisdom Tooth<br>Extraction Techniques</h2>
                    
                    <div class="precision-features">
                        <div class="feature-item mb-4">
                            <h5 class="feature-title">Minimally Invasive Surgery</h5>
                            <p class="feature-text">Using the latest surgical techniques to minimize discomfort and speed up recovery time for our patients.</p>
                        </div>

                        <div class="feature-item mb-4">
                            <h5 class="feature-title">Experienced Oral Surgeons</h5>
                            <p class="feature-text">Our team has extensive experience with complex extractions, including impacted and partially erupted wisdom teeth.</p>
                        </div>

                        <div class="feature-item mb-0">
                            <h5 class="feature-title">Comprehensive Aftercare</h5>
                            <p class="feature-text">Complete post-operative care instructions and follow-up appointments to ensure proper healing and prevent complications.</p>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Image -->
                <div class="col-lg-6">
                    <img src="image/servation.jpg" alt="Dental Surgery" class="precision-image img-fluid rounded-3" style="box-shadow: 0 8px 25px rgba(0,0,0,0.1);">
                </div>
            </div>

            <!-- Bottom CTA Section -->
            <div class="row mt-5 pt-4">
                <div class="col-12 text-center">
                    <p class="cta-text mb-3">Don't let wisdom teeth pain affect your quality of life!</p>
                    <a href="#booking" class="btn rounded-pill px-4" style="background-color: #2d7560; color: white;">Schedule Consultation</a>
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
        // Auto-hover dropdown for navbar
        document.addEventListener('DOMContentLoaded', function() {
            const dropdownToggle = document.querySelector('#allPagesDropdown');
            const dropdownMenu = document.querySelector('.dropdown-menu');
            
            if (dropdownToggle && dropdownMenu) {
                dropdownToggle.parentElement.addEventListener('mouseenter', function() {
                    dropdownMenu.classList.add('show');
                    dropdownToggle.setAttribute('aria-expanded', 'true');
                });
                
                dropdownToggle.parentElement.addEventListener('mouseleave', function() {
                    dropdownMenu.classList.remove('show');
                    dropdownToggle.setAttribute('aria-expanded', 'false');
                });
            }
        });

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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cosmetic Dentistry - TOOTH IMPRESSION Dau Branch</title>

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
            <a class="navbar-brand d-flex align-items-center" href="homes.php">
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
                                        <li><a class="dropdown-item py-2" href="contact.php">Contact</a></li>
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
    <section id="home" class="hero-section" style="background-image: url('image/bgimage.jpg'); background-attachment: fixed; background-size: cover; background-position: center;">
        <div class="hero-overlay"></div>
        <div class="container-fluid h-100">
            <div class="row align-items-center h-100">
                <div class="col-lg-6 col-md-12 hero-text">
                    <h1 class="display-4 fw-bold text-dark mb-4" style="font-size: 4.5rem;">Transform Your Smile<br>with Cosmetic<br>Dentistry</h1>
                    <p class="lead text-dark mb-4" style="font-size: 1.4rem;">
                        Discover the power of cosmetic dentistry to enhance your smile.<br>Professional treatments that create stunning, natural-looking results.
                    </p>
                    <a href="booking.php" class="btn px-4 mb-5 rounded-pill" style="background-color: #2d7560; color: white;">SCHEDULE CONSULTATION</a>

                    <!-- Stats inside Hero -->
                    <div class="row hero-stats">
                        <div class="col-6">
                            <h2 class="stat-number text-dark fw-bold">10,000+</h2>
                            <p class="text-dark small">Smiles transformed<br>by our expertise</p>
                        </div>
                        <div class="col-6">
                            <h2 class="stat-number text-dark fw-bold">96%</h2>
                            <p class="text-dark small">Patient satisfaction<br>rate for cosmetic work</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- What is Cosmetic Dentistry Section -->
    <section id="about-cosmetic" class="py-5">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <h2 class="display-5 fw-bold mb-4" style="color: #2d7560;">What is Cosmetic Dentistry?</h2>
                    <p class="lead text-muted mb-4">
                        Cosmetic dentistry focuses on improving the appearance of your teeth, gums, and smile. Unlike general dentistry which addresses oral health, cosmetic treatments enhance aesthetics while maintaining or improving dental function.
                    </p>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="feature-item">
                                <i class="fas fa-star text-success me-2"></i>
                                <strong>Aesthetic Focus:</strong> Designed for beautiful results
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-item">
                                <i class="fas fa-smile text-success me-2"></i>
                                <strong>Confidence Boost:</strong> Enhance your self-esteem
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-item">
                                <i class="fas fa-heart text-success me-2"></i>
                                <strong>Customized:</strong> Tailored to your unique needs
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-item">
                                <i class="fas fa-shield-alt text-success me-2"></i>
                                <strong>Professional:</strong> Expert artistic and technical skill
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="image/servation.jpg" alt="Cosmetic Dentistry" class="img-fluid rounded-3 shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Cosmetic Services Section -->
    <section id="services" class="expert-care py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold mb-3" style="color: #2d7560;">Our Cosmetic Dentistry Services</h2>
                <p class="lead text-muted">Comprehensive cosmetic solutions for every smile concern</p>
            </div>

            <div class="row g-4">
                <!-- Teeth Whitening -->
                <div class="col-md-6 col-lg-3">
                    <div class="service-pricing-card h-100">
                        <h4 class="service-title mb-3">Professional Whitening</h4>
                        <p class="service-description text-muted small mb-4">Advanced whitening treatments that brighten your smile safely and effectively in just one visit.</p>
                        <div class="service-duration mb-4">
                            <p class="text-success fw-bold mb-2">60-90 minutes</p>
                            <p class="text-muted small">starts at <span class="fw-bold">$299</span></p>
                        </div>
                        <a href="booking.php" class="btn w-100" style="background-color: #2d7560; color: white;">BOOK NOW</a>
                    </div>
                </div>

                <!-- Veneers -->
                <div class="col-md-6 col-lg-3">
                    <div class="service-pricing-card h-100">
                        <h4 class="service-title mb-3">Porcelain Veneers</h4>
                        <p class="service-description text-muted small mb-4">Custom porcelain shells that cover tooth surface to transform shape, color, and appearance dramatically.</p>
                        <div class="service-duration mb-4">
                            <p class="text-success fw-bold mb-2">2-3 appointments</p>
                            <p class="text-muted small">starts at <span class="fw-bold">$800</span></p>
                        </div>
                        <a href="booking.php" class="btn w-100" style="background-color: #2d7560; color: white;">BOOK NOW</a>
                    </div>
                </div>

                <!-- Bonding -->
                <div class="col-md-6 col-lg-3">
                    <div class="service-pricing-card h-100">
                        <h4 class="service-title mb-3">Composite Bonding</h4>
                        <p class="service-description text-muted small mb-4">Tooth-colored resin material used to repair chipped, cracked, or discolored teeth instantly.</p>
                        <div class="service-duration mb-4">
                            <p class="text-success fw-bold mb-2">30-60 minutes</p>
                            <p class="text-muted small">starts at <span class="fw-bold">$150</span></p>
                        </div>
                        <a href="booking.php" class="btn w-100" style="background-color: #2d7560; color: white;">BOOK NOW</a>
                    </div>
                </div>

                <!-- Smile Makeover -->
                <div class="col-md-6 col-lg-3">
                    <div class="service-pricing-card h-100">
                        <h4 class="service-title mb-3">Complete Smile Makeover</h4>
                        <p class="service-description text-muted small mb-4">Comprehensive smile transformation combining multiple cosmetic procedures for dramatic results.</p>
                        <div class="service-duration mb-4">
                            <p class="text-success fw-bold mb-2">Multiple visits</p>
                            <p class="text-muted small">Custom pricing</p>
                        </div>
                        <a href="booking.php" class="btn w-100" style="background-color: #2d7560; color: white;">BOOK NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cosmetic Procedures Details -->
    <section id="procedures-details" class="select-treatment py-5">
        <div class="container">
            <!-- Header Row -->
            <div class="row mb-5">
                <div class="col-lg-8">
                    <h2 class="display-6 fw-bold mb-3">Popular Cosmetic Procedures</h2>
                    <p class="lead text-muted mb-0">Discover the wide range of cosmetic treatments available to enhance your smile and boost your confidence.</p>
                </div>
            </div>

            <!-- Procedure Details with Images -->
            <div class="row g-4">
                <!-- Teeth Whitening Card -->
                <div class="col-md-6">
                    <div class="treatment-card position-relative overflow-hidden rounded-3" style="height: 350px;">
                        <img src="image/bgimage.jpg" alt="Teeth Whitening" class="w-100 h-100" style="object-fit: cover; position: absolute; top: 0; left: 0; z-index: 0;">
                        <div class="position-absolute top-0 start-0 p-3" style="z-index: 2;">
                            <span class="badge bg-light text-dark fw-bold">Teeth Whitening</span>
                        </div>
                        <div class="treatment-overlay position-absolute bottom-0 start-0 w-100 p-4" style="background: linear-gradient(to top, rgba(0,0,0,0.9), transparent); z-index: 1;">
                            <p class="text-white small mb-0">Professional whitening using advanced technology for a brighter, whiter smile that lasts months.</p>
                        </div>
                    </div>
                </div>

                <!-- Veneers Card -->
                <div class="col-md-6">
                    <div class="treatment-card position-relative overflow-hidden rounded-3" style="height: 350px;">
                        <img src="image/servation.jpg" alt="Porcelain Veneers" class="w-100 h-100" style="object-fit: cover; position: absolute; top: 0; left: 0; z-index: 0;">
                        <div class="position-absolute top-0 start-0 p-3" style="z-index: 2;">
                            <span class="badge bg-light text-dark fw-bold">Porcelain Veneers</span>
                        </div>
                        <div class="treatment-overlay position-absolute bottom-0 start-0 w-100 p-4" style="background: linear-gradient(to top, rgba(0,0,0,0.9), transparent); z-index: 1;">
                            <p class="text-white small mb-0">Custom-made veneers that dramatically improve tooth appearance with natural-looking, lasting results.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section id="benefits" class="py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold" style="color: #2d7560;">Benefits of Cosmetic Dentistry</h2>
                <p class="lead text-muted">Discover how cosmetic dentistry can improve your life</p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="benefit-card text-center h-100 p-4">
                        <div class="benefit-icon mb-3">
                            <i class="fas fa-grin-stars fa-3x text-success"></i>
                        </div>
                        <h5 class="benefit-title">Increased Confidence</h5>
                        <p class="benefit-text">Feel proud of your smile and confident in social and professional situations.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="benefit-card text-center h-100 p-4">
                        <div class="benefit-icon mb-3">
                            <i class="fas fa-star fa-3x text-success"></i>
                        </div>
                        <h5 class="benefit-title">Beautiful Appearance</h5>
                        <p class="benefit-text">Dramatically improve your smile aesthetics for a more attractive appearance.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="benefit-card text-center h-100 p-4">
                        <div class="benefit-icon mb-3">
                            <i class="fas fa-heart fa-3x text-success"></i>
                        </div>
                        <h5 class="benefit-title">Improved Self-Esteem</h5>
                        <p class="benefit-text">Boost your self-image and enjoy a better quality of life.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="benefit-card text-center h-100 p-4">
                        <div class="benefit-icon mb-3">
                            <i class="fas fa-smile fa-3x text-success"></i>
                        </div>
                        <h5 class="benefit-title">Lasting Results</h5>
                        <p class="benefit-text">Enjoy long-term aesthetic improvements to maintain your beautiful smile.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section id="why-choose-us" class="py-5">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <h2 class="display-5 fw-bold mb-4" style="color: #2d7560;">Why Choose Our Cosmetic<br>Dentistry Services?</h2>
                    
                    <div class="why-choose-features">
                        <div class="feature-item mb-4">
                            <h5 class="feature-title">Expert Artistry</h5>
                            <p class="feature-text">Our dentists combine technical skill with artistic vision to create beautiful, natural-looking smiles.</p>
                        </div>

                        <div class="feature-item mb-4">
                            <h5 class="feature-title">Advanced Technology</h5>
                            <p class="feature-text">We use state-of-the-art equipment and materials for superior cosmetic results.</p>
                        </div>

                        <div class="feature-item mb-0">
                            <h5 class="feature-title">Personalized Care</h5>
                            <p class="feature-text">Each treatment is customized to your specific goals and preferences for your ideal smile.</p>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Image -->
                <div class="col-lg-6">
                    <img src="image/servation.jpg" alt="Expert Cosmetic Dentistry" class="precision-image img-fluid rounded-3" style="box-shadow: 0 8px 25px rgba(0,0,0,0.1);">
                </div>
            </div>

            <!-- Bottom CTA Section -->
            <div class="row mt-5 pt-4">
                <div class="col-12 text-center">
                    <p class="cta-text mb-3">Ready to transform your smile?</p>
                    <a href="booking.php" class="btn rounded-pill px-4" style="background-color: #2d7560; color: white;">Book Your Cosmetic Consultation</a>
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
                        <li><a href="cosmetic-dentistry.php">Cosmetic Dentistry</a></li>
                        <li><a href="#services">Oral Hygiene</a></li>
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
                        <li><a href="contact.php">Contact</a></li>
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
    </script>
</body>
</html>

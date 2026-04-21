<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retainer Fitting - TOOTH IMPRESSION Dau Branch</title>

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
                    <h1 class="display-4 fw-bold text-dark mb-4" style="font-size: 4.5rem;">Perfect Retainer<br>Fitting for Lasting<br>Results</h1>
                    <p class="lead text-dark mb-4" style="font-size: 1.4rem;">
                        Professional retainer fitting to maintain your beautiful smile.<br> Custom-made retainers that fit perfectly and keep your teeth in place.
                    </p>
                    <a href="booking.php" class="btn px-4 mb-5 rounded-pill" style="background-color: #2d7560; color: white;">GET YOUR RETAINER</a>

                    <!-- Stats inside Hero -->
                    <div class="row hero-stats">
                        <div class="col-6">
                            <h2 class="stat-number text-dark fw-bold">99%</h2>
                            <p class="text-dark small">Patient satisfaction<br>with our retainers</p>
                        </div>
                        <div class="col-6">
                            <h2 class="stat-number text-dark fw-bold">24hrs</h2>
                            <p class="text-dark small">Custom retainer<br>delivery time</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- What are Retainers Section -->
    <section id="about-retainers" class="py-5">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <h2 class="display-5 fw-bold mb-4" style="color: #2d7560;">What are Dental Retainers?</h2>
                    <p class="lead text-muted mb-4">
                        Dental retainers are custom-made appliances that help maintain the position of your teeth after orthodontic treatment. They prevent teeth from shifting back to their original positions, ensuring your smile stays perfect.
                    </p>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="feature-item">
                                <i class="fas fa-clock text-success me-2"></i>
                                <strong>Long-term Wear:</strong> Essential after braces or aligners
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-item">
                                <i class="fas fa-user-md text-success me-2"></i>
                                <strong>Custom Fit:</strong> Made specifically for your teeth
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-item">
                                <i class="fas fa-shield-alt text-success me-2"></i>
                                <strong>Protection:</strong> Prevents unwanted tooth movement
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-item">
                                <i class="fas fa-smile text-success me-2"></i>
                                <strong>Confidence:</strong> Maintain your perfect smile
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="image/servation.jpg" alt="Dental Retainers" class="img-fluid rounded-3 shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Types of Retainers Section -->
    <section id="retainer-types" class="py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold" style="color: #2d7560;">Types of Dental Retainers</h2>
                <p class="lead text-muted">Choose the retainer that best fits your lifestyle and needs</p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="retainer-card text-center h-100 p-4">
                        <div class="retainer-icon mb-3">
                            <i class="fas fa-tooth fa-3x text-success"></i>
                        </div>
                        <h5 class="retainer-title">Hawley Retainers</h5>
                        <p class="retainer-text">Traditional removable retainers made of acrylic and wire. Durable, adjustable, and long-lasting.</p>
                        <div class="retainer-features">
                            <small class="text-muted">â€¢ Removable<br>â€¢ Adjustable<br>â€¢ Long-lasting</small>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="retainer-card text-center h-100 p-4">
                        <div class="retainer-icon mb-3">
                            <i class="fas fa-layer-group fa-3x text-success"></i>
                        </div>
                        <h5 class="retainer-title">Clear Retainers</h5>
                        <p class="retainer-text">Invisible, plastic retainers that fit over your teeth. Comfortable and discreet for everyday wear.</p>
                        <div class="retainer-features">
                            <small class="text-muted">â€¢ Invisible<br>â€¢ Comfortable<br>â€¢ Easy to clean</small>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="retainer-card text-center h-100 p-4">
                        <div class="retainer-icon mb-3">
                            <i class="fas fa-tools fa-3x text-success"></i>
                        </div>
                        <h5 class="retainer-title">Fixed Retainers</h5>
                        <p class="retainer-text">Permanent wire retainers bonded behind teeth. Provides continuous retention without removal.</p>
                        <div class="retainer-features">
                            <small class="text-muted">â€¢ Permanent<br>â€¢ Invisible<br>â€¢ Maximum retention</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Fitting Process Section -->
    <section id="fitting-process" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold" style="color: #2d7560;">The Retainer Fitting Process</h2>
                <p class="lead text-muted">Our step-by-step approach to perfect retainer fitting</p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="process-step text-center">
                        <div class="step-number mb-3">
                            <span class="badge rounded-pill bg-success fs-4">1</span>
                        </div>
                        <h5 class="step-title">Initial Consultation</h5>
                        <p class="step-description">We evaluate your orthodontic treatment completion and discuss retainer options that suit your needs.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="process-step text-center">
                        <div class="step-number mb-3">
                            <span class="badge rounded-pill bg-success fs-4">2</span>
                        </div>
                        <h5 class="step-title">Digital Impressions</h5>
                        <p class="step-description">Using advanced digital scanning technology to create precise molds of your teeth for custom fit.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="process-step text-center">
                        <div class="step-number mb-3">
                            <span class="badge rounded-pill bg-success fs-4">3</span>
                        </div>
                        <h5 class="step-title">Custom Fabrication</h5>
                        <p class="step-description">Your retainer is carefully crafted in our lab using high-quality materials for durability and comfort.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="process-step text-center">
                        <div class="step-number mb-3">
                            <span class="badge rounded-pill bg-success fs-4">4</span>
                        </div>
                        <h5 class="step-title">Fitting & Adjustment</h5>
                        <p class="step-description">We fit your retainer and make any necessary adjustments to ensure perfect comfort and function.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Care & Maintenance Section -->
    <section id="care-maintenance" class="py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <h2 class="display-5 fw-bold mb-4" style="color: #2d7560;">Retainer Care & Maintenance</h2>

                    <div class="care-tips">
                        <div class="tip-item mb-4">
                            <h5 class="tip-title"><i class="fas fa-check-circle text-success me-2"></i>Clean Daily</h5>
                            <p class="tip-text">Brush your retainer daily with a soft toothbrush and mild soap. Rinse thoroughly with cool water.</p>
                        </div>

                        <div class="tip-item mb-4">
                            <h5 class="tip-title"><i class="fas fa-check-circle text-success me-2"></i>Store Properly</h5>
                            <p class="tip-text">When not wearing, store in the provided case. Never wrap in tissue or place in pockets.</p>
                        </div>

                        <div class="tip-item mb-4">
                            <h5 class="tip-title"><i class="fas fa-check-circle text-success me-2"></i>Avoid Heat</h5>
                            <p class="tip-text">Keep away from hot water, direct sunlight, and hot car interiors to prevent warping.</p>
                        </div>

                        <div class="tip-item mb-4">
                            <h5 class="tip-title"><i class="fas fa-check-circle text-success me-2"></i>Regular Check-ups</h5>
                            <p class="tip-text">Visit us every 6 months for retainer adjustments and to ensure continued proper fit.</p>
                        </div>

                        <div class="tip-item mb-0">
                            <h5 class="tip-title"><i class="fas fa-check-circle text-success me-2"></i>Wear as Directed</h5>
                            <p class="tip-text">Follow your orthodontist's wearing schedule for optimal results and tooth stability.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <img src="image/servation.jpg" alt="Retainer Care" class="img-fluid rounded-3 shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Our Retainers Section -->
    <section id="why-choose-us" class="py-5">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <img src="image/servation.jpg" alt="Professional Retainer Fitting" class="img-fluid rounded-3 shadow">
                </div>

                <div class="col-lg-6">
                    <h2 class="display-5 fw-bold mb-4" style="color: #2d7560;">Why Choose Our Retainer Services?</h2>

                    <div class="why-choose-features">
                        <div class="feature-item mb-4">
                            <h5 class="feature-title">Expert Fitting</h5>
                            <p class="feature-text">Our experienced dental professionals ensure your retainer fits perfectly for maximum comfort and effectiveness.</p>
                        </div>

                        <div class="feature-item mb-4">
                            <h5 class="feature-title">High-Quality Materials</h5>
                            <p class="feature-text">We use only premium materials that are durable, comfortable, and designed to last for years of use.</p>
                        </div>

                        <div class="feature-item mb-4">
                            <h5 class="feature-title">Quick Turnaround</h5>
                            <p class="feature-text">Most retainers are ready within 24 hours, so you can start protecting your smile investment immediately.</p>
                        </div>

                        <div class="feature-item mb-0">
                            <h5 class="feature-title">Ongoing Support</h5>
                            <p class="feature-text">We provide comprehensive care instructions and regular check-ups to ensure your retainer continues to work effectively.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom CTA Section -->
            <div class="row mt-5 pt-4">
                <div class="col-12 text-center">
                    <p class="cta-text mb-3">Ready to protect your beautiful smile?</p>
                    <a href="booking.php" class="btn rounded-pill px-4" style="background-color: #2d7560; color: white;">Schedule Retainer Fitting</a>
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
                        <li><a href="retainer-fitting.php">Retainer Fitting</a></li>
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

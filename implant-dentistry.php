<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Implant Dentistry - TOOTH IMPRESSION Dau Branch</title>

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
                    <h1 class="display-4 fw-bold text-dark mb-4" style="font-size: 4.5rem;">Rebuild Your Smile<br>with Dental Implants</h1>
                    <p class="lead text-dark mb-4" style="font-size: 1.4rem;">
                        Permanent, natural-looking implants for optimal function and confidence. Our expert team delivers reliable solutions for missing teeth.
                    </p>
                    <a href="booking.php" class="btn px-4 mb-5 rounded-pill" style="background-color: #2d7560; color: white;">BOOK IMPLANT CONSULT</a>

                    <!-- Stats inside Hero -->
                    <div class="row hero-stats">
                        <div class="col-6">
                            <h2 class="stat-number text-dark fw-bold">15,000+</h2>
                            <p class="text-dark small">Implants placed successfully</p>
                        </div>
                        <div class="col-6">
                            <h2 class="stat-number text-dark fw-bold">98%</h2>
                            <p class="text-dark small">Long-term implant survival rate</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- What are Dental Implants Section -->
    <section id="about-implants" class="py-5">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <h2 class="display-5 fw-bold mb-4" style="color: #2d7560;">What are Dental Implants?</h2>
                    <p class="lead text-muted mb-4">
                        Dental implants are titanium posts placed into the jawbone that act as artificial tooth roots. They support crowns or bridges and provide a strong, stable foundation that looks and functions like natural teeth.
                    </p>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="feature-item">
                                <i class="fas fa-tooth text-success me-2"></i>
                                <strong>Stable Support:</strong> Believable tooth replacement
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-item">
                                <i class="fas fa-heart text-success me-2"></i>
                                <strong>Bone Health:</strong> Prevents bone loss after extraction
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-item">
                                <i class="fas fa-smile text-success me-2"></i>
                                <strong>Natural Look:</strong> Matches your existing smile
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-item">
                                <i class="fas fa-lock text-success me-2"></i>
                                <strong>Long Lasting:</strong> 10+ years with care
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="image/servation.jpg" alt="Dental Implants" class="img-fluid rounded-3 shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Implant Services Section -->
    <section id="services" class="expert-care py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold mb-3" style="color: #2d7560;">Implant Dentistry Services</h2>
                <p class="lead text-muted">Comprehensive implant solutions for every need</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="service-pricing-card h-100">
                        <h4 class="service-title mb-3">Single Tooth Implant</h4>
                        <p class="service-description text-muted small mb-4">Replace one missing tooth with a stable implant crown that feels natural in your mouth.</p>
                        <div class="service-duration mb-4">
                            <p class="text-success fw-bold mb-2">1-2 visits</p>
                            <p class="text-muted small">starts at <span class="fw-bold">$1400</span></p>
                        </div>
                        <a href="booking.php" class="btn w-100" style="background-color: #2d7560; color: white;">BOOK NOW</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="service-pricing-card h-100">
                        <h4 class="service-title mb-3">Multiple Implants</h4>
                        <p class="service-description text-muted small mb-4">Secure several missing teeth with implants that support bridges and partial dentures.</p>
                        <div class="service-duration mb-4">
                            <p class="text-success fw-bold mb-2">2-4 visits</p>
                            <p class="text-muted small">custom pricing</p>
                        </div>
                        <a href="booking.php" class="btn w-100" style="background-color: #2d7560; color: white;">BOOK NOW</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="service-pricing-card h-100">
                        <h4 class="service-title mb-3">All-on-4Â® Implants</h4>
                        <p class="service-description text-muted small mb-4">Full-arch rehabilitation with only four implants for a stable, immediate smile replacement.</p>
                        <div class="service-duration mb-4">
                            <p class="text-success fw-bold mb-2">4-6 visits</p>
                            <p class="text-muted small">custom pricing</p>
                        </div>
                        <a href="booking.php" class="btn w-100" style="background-color: #2d7560; color: white;">BOOK NOW</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="service-pricing-card h-100">
                        <h4 class="service-title mb-3">Implant-Supported Dentures</h4>
                        <p class="service-description text-muted small mb-4">Enjoy removable or fixed denture stability with strategic implant placement.</p>
                        <div class="service-duration mb-4">
                            <p class="text-success fw-bold mb-2">3-5 visits</p>
                            <p class="text-muted small">custom pricing</p>
                        </div>
                        <a href="booking.php" class="btn w-100" style="background-color: #2d7560; color: white;">BOOK NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Implant Process Section -->
    <section id="process" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold" style="color: #2d7560;">Implant Placement Process</h2>
                <p class="lead text-muted">Step-by-step process to restore your smile with confidence</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="process-step text-center">
                        <div class="step-number mb-3">
                            <span class="badge rounded-pill bg-success fs-4">1</span>
                        </div>
                        <h5 class="step-title">Consultation</h5>
                        <p class="step-description">Comprehensive evaluation including scans, health review, and custom treatment plan.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="process-step text-center">
                        <div class="step-number mb-3">
                            <span class="badge rounded-pill bg-success fs-4">2</span>
                        </div>
                        <h5 class="step-title">Implant Placement</h5>
                        <p class="step-description">Surgical insertion of titanium implant posts into jawbone memory for stable foundation.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="process-step text-center">
                        <div class="step-number mb-3">
                            <span class="badge rounded-pill bg-success fs-4">3</span>
                        </div>
                        <h5 class="step-title">Healing Period</h5>
                        <p class="step-description">Osseointegration phase where implant fuses with bone (3-6 months), followed by follow up visits.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="process-step text-center">
                        <div class="step-number mb-3">
                            <span class="badge rounded-pill bg-success fs-4">4</span>
                        </div>
                        <h5 class="step-title">Crown Placement</h5>
                        <p class="step-description">Final restoration attached to implant for a natural, functional tooth replacement.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Our Implants Section -->
    <section id="why-choose-us" class="py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <img src="image/servation.jpg" alt="Implant Dentistry Expertise" class="img-fluid rounded-3 shadow">
                </div>
                <div class="col-lg-6">
                    <h2 class="display-5 fw-bold mb-4" style="color: #2d7560;">Why Choose Our Implant Dentistry?</h2>
                    <div class="why-choose-features">
                        <div class="feature-item mb-4">
                            <h5 class="feature-title">Experienced Implant Specialists</h5>
                            <p class="feature-text">Our team has extensive experience in advanced implant placement and full-mouth restorations.</p>
                        </div>
                        <div class="feature-item mb-4">
                            <h5 class="feature-title">Modern Technology</h5>
                            <p class="feature-text">State-of-the-art imaging and guided surgery ensure precision and predictable outcomes.</p>
                        </div>
                        <div class="feature-item mb-4">
                            <h5 class="feature-title">Personalized Care</h5>
                            <p class="feature-text">Tailored treatment plans designed around your goals, budget, and oral health needs.</p>
                        </div>
                        <div class="feature-item mb-0">
                            <h5 class="feature-title">Proven Results</h5>
                            <p class="feature-text">Numerous satisfied patients experience improved function, comfort, and confidence.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5 pt-4">
                <div class="col-12 text-center">
                    <p class="cta-text mb-3">Ready for a lasting smile upgrade?</p>
                    <a href="booking.php" class="btn rounded-pill px-4" style="background-color: #2d7560; color: white;">Request an Implant Consultation</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="footer-section py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <div class="footer-brand">
                        <h4 class="footer-logo mb-3"><i class="fas fa-tooth" style="color: #2d7560;"></i> TOOTH IMPRESSION - Dau Branch</h4>
                        <p class="footer-text small">Dau, Mabalacat, Pampanga, Philippines<br>Your smile is our priority. Whether you need routine care, cosmetic enhancements.</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                    <h6 class="footer-title mb-3">Services</h6>
                    <ul class="footer-links">
                        <li><a href="implant-dentistry.php">Implant Dentistry</a></li>
                        <li><a href="oral-hygiene.php">Oral Hygiene</a></li>
                        <li><a href="preventive-care.php">Preventive Care</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                    <h6 class="footer-title mb-3">Hours</h6>
                    <ul class="footer-links">
                        <li>Monday - Saturday: 9AM-7PM</li>
                        <li>Sunday: CLOSED</li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h6 class="footer-title mb-3">Newsletter</h6>
                    <p class="footer-text small mb-3">Discover new offers and stay up to date</p>
                    <div class="newsletter-input input-group">
                        <input type="email" class="form-control" placeholder="Enter your email address" aria-label="Email address">
                        <button class="btn" style="background-color: #2d7560; color: white;" type="button"><i class="fas fa-paper-plane"></i></button>
                    </div>
                </div>
            </div>
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emergency Dentistry - TOOTH IMPRESSION Dau Branch</title>

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
    <section id="home" class="hero-section" style="background-image: url('image/emergency-dentistry.jpg'); background-attachment: fixed; background-size: cover; background-position: center; min-height: 80vh;">
        <div class="hero-overlay"></div>
        <div class="container-fluid h-100">
            <div class="row align-items-center h-100">
                <div class="col-lg-6 col-md-12 hero-text">
                    <h1 class="display-4 fw-bold text-dark mb-4" style="font-size: 4rem;">Emergency Dentistry<br>Fast Relief When It Matters</h1>
                    <p class="lead text-dark mb-4" style="font-size: 1.4rem;">Compassionate emergency dental care 7 days a week. Get immediate help for pain, trauma, and urgent dental problems.</p>
                    <a href="booking.php" class="btn px-4 mb-5 rounded-pill" style="background-color: #2d7560; color: white;">BOOK EMERGENCY CARE</a>

                    <div class="row hero-stats">
                        <div class="col-6">
                            <h2 class="stat-number text-dark fw-bold">24/7</h2>
                            <p class="text-dark small">Emergency availability</p>
                        </div>
                        <div class="col-6">
                            <h2 class="stat-number text-dark fw-bold">98%</h2>
                            <p class="text-dark small">Pain relief success rate</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Emergency Dentistry -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <h2 class="display-5 fw-bold mb-4" style="color: #2d7560;">Emergency Dental Care You Can Trust</h2>
                    <p class="lead text-muted mb-4">At TOOTH IMPRESSION Dau Branch we provide urgent dental services with rapid diagnosis, immediate pain management, and efficient treatment plans so you can get back to living comfortably.</p>
                    <ul class="list-unstyled">
                        <li class="mb-3"><i class="fas fa-check text-success me-2"></i>Immediate evaluation and same-day appointment when needed</li>
                        <li class="mb-3"><i class="fas fa-check text-success me-2"></i>Advanced imaging and rapid on-site treatment</li>
                        <li class="mb-3"><i class="fas fa-check text-success me-2"></i>Experienced dentists specializing in trauma and urgent care</li>
                        <li class="mb-3"><i class="fas fa-check text-success me-2"></i>Comfort-focused care with local anesthesia and calming support</li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <img src="image/emergency-care.jpg" alt="Emergency Dental Care" class="img-fluid rounded-3 shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Common Emergency Cases -->
    <section class="py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold" style="color: #2d7560;">Common Emergency Dental Conditions</h2>
                <p class="lead text-muted">If you experience any of these symptoms, seek care immediately.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="benefit-card text-center h-100 p-4">
                        <div class="benefit-icon mb-3"><i class="fas fa-tooth-crack fa-3x text-success"></i></div>
                        <h5 class="benefit-title">Broken or Cracked Tooth</h5>
                        <p class="benefit-text">Repair chips, cracks, or fractures before they cause severe damage.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="benefit-card text-center h-100 p-4">
                        <div class="benefit-icon mb-3"><i class="fas fa-bolt fa-3x text-success"></i></div>
                        <h5 class="benefit-title">Severe Toothache</h5>
                        <p class="benefit-text">Immediate pain control and diagnosis for abscess, infection, or trauma.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="benefit-card text-center h-100 p-4">
                        <div class="benefit-icon mb-3"><i class="fas fa-file-invoice-dollar fa-3x text-success"></i></div>
                        <h5 class="benefit-title">Knocked-out Tooth</h5>
                        <p class="benefit-text">Critical re-implantation support and long-term restoration options.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="benefit-card text-center h-100 p-4">
                        <div class="benefit-icon mb-3"><i class="fas fa-radiation fa-3x text-success"></i></div>
                        <h5 class="benefit-title">Dental Abscess</h5>
                        <p class="benefit-text">Rapid infection control and safe treatment to protect your health.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Emergency Treatment Process -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold" style="color: #2d7560;">Emergency Treatment Process</h2>
                <p class="lead text-muted">A clear, reassuring pathway from first call to recovery.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="process-step text-center">
                        <div class="step-number mb-3"><span class="badge rounded-pill bg-success fs-4">1</span></div>
                        <h5 class="step-title">Call or Walk-In</h5>
                        <p class="step-description">Contact us or come in for immediate triage and scheduling.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="process-step text-center">
                        <div class="step-number mb-3"><span class="badge rounded-pill bg-success fs-4">2</span></div>
                        <h5 class="step-title">Rapid Assessment</h5>
                        <p class="step-description">Our team assesses pain severity and dental damage with on-site imaging.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="process-step text-center">
                        <div class="step-number mb-3"><span class="badge rounded-pill bg-success fs-4">3</span></div>
                        <h5 class="step-title">Immediate Care</h5>
                        <p class="step-description">Treatment begins with pain control, stabilization, or infection management.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="process-step text-center">
                        <div class="step-number mb-3"><span class="badge rounded-pill bg-success fs-4">4</span></div>
                        <h5 class="step-title">Recovery Plan</h5>
                        <p class="step-description">Receive follow-up instructions, restorative options, and prevention guidance.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Us -->
    <section class="py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <h2 class="display-5 fw-bold mb-4" style="color: #2d7560;">Why Choose TOOTH IMPRESSION?</h2>
                    <div class="why-choose-features">
                        <div class="feature-item mb-4">
                            <h5 class="feature-title"><i class="fas fa-user-md text-success me-2"></i>Experienced Emergency Specialists</h5>
                            <p class="feature-text">Our dentists are trained to handle dental emergencies with precision and care.</p>
                        </div>
                        <div class="feature-item mb-4">
                            <h5 class="feature-title"><i class="fas fa-clock text-success me-2"></i>Quick Response</h5>
                            <p class="feature-text">Easy access and fast treatment when every minute counts.</p>
                        </div>
                        <div class="feature-item mb-4">
                            <h5 class="feature-title"><i class="fas fa-shield-alt text-success me-2"></i>Safe, Sterile Environment</h5>
                            <p class="feature-text">We follow strict safety standards to keep you protected and comfortable.</p>
                        </div>
                        <div class="feature-item mb-0">
                            <h5 class="feature-title"><i class="fas fa-heart text-success me-2"></i>Compassionate Care</h5>
                            <p class="feature-text">We provide emotional support alongside clinical relief through every step.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="image/emergency-team.jpg" alt="Emergency Dentistry Team" class="img-fluid rounded-3 shadow">
                </div>
            </div>

            <div class="row mt-5 pt-4">
                <div class="col-12 text-center">
                    <p class="cta-text mb-3">Donâ€™t wait when pain starts. Help is available now.</p>
                    <a href="booking.php" class="btn rounded-pill px-4" style="background-color: #2d7560; color: white;">BOOK YOUR EMERGENCY APPOINTMENT</a>
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
                        <p class="footer-text small">Dau, Mabalacat, Pampanga, Philippines<br>Your smile is our priority. Whether you need routine care or urgent treatment.</p>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                    <h6 class="footer-title mb-3">Services</h6>
                    <ul class="footer-links">
                        <li><a href="emergency-dentistry.php">Emergency Dentistry</a></li>
                        <li><a href="implant-dentistry.php">Implant Dentistry</a></li>
                        <li><a href="cosmetic-dentistry.php">Cosmetic Dentistry</a></li>
                        <li><a href="dental-sealant.php">Dental Sealants</a></li>
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

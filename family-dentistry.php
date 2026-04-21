<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Family Dentistry - TOOTH IMPRESSION Dau Branch</title>

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
    <section id="home" class="hero-section" style="background-image: url('image/family-dentistry.jpg'); background-attachment: fixed; background-size: cover; background-position: center; min-height: 80vh;">
        <div class="hero-overlay"></div>
        <div class="container-fluid h-100">
            <div class="row align-items-center h-100">
                <div class="col-lg-6 col-md-12 hero-text">
                    <h1 class="display-4 fw-bold text-dark mb-4" style="font-size: 4rem;">Family Dentistry<br>Care for Every Smile, Every Age</h1>
                    <p class="lead text-dark mb-4" style="font-size: 1.4rem;">Comprehensive dental care to keep your whole family smiling healthy. Trusted pediatric, adult, and senior services in one comfortable clinic.</p>
                    <a href="booking.php" class="btn px-4 mb-5 rounded-pill" style="background-color: #2d7560; color: white;">BOOK A FAMILY VISIT</a>

                    <div class="row hero-stats">
                        <div class="col-6">
                            <h2 class="stat-number text-dark fw-bold">90+</h2>
                            <p class="text-dark small">Family years served</p>
                        </div>
                        <div class="col-6">
                            <h2 class="stat-number text-dark fw-bold">100%</h2>
                            <p class="text-dark small">Child-friendly approach</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Family Dentistry -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <h2 class="display-5 fw-bold mb-4" style="color: #2d7560;">Comprehensive Family Dental Care</h2>
                    <p class="lead text-muted mb-4">From infants to grandparents, our family dentistry services support long-term oral health through preventive care, education, and gentle treatment.</p>
                    <ul class="list-unstyled">
                        <li class="mb-3"><i class="fas fa-check text-success me-2"></i>Pediatric dental exams and early cavity prevention</li>
                        <li class="mb-3"><i class="fas fa-check text-success me-2"></i>Adult restorative care and cosmetic improvements</li>
                        <li class="mb-3"><i class="fas fa-check text-success me-2"></i>Senior dental maintenance and gum disease management</li>
                        <li class="mb-3"><i class="fas fa-check text-success me-2"></i>Family dental plans and easy booking for multiple patients</li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <img src="image/family-checkup.jpg" alt="Family Dental Checkup" class="img-fluid rounded-3 shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Services for All Ages -->
    <section class="py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold" style="color: #2d7560;">What We Offer for Family Dentistry</h2>
                <p class="lead text-muted">Medical-grade dental services tailored for each family member.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="benefit-card text-center h-100 p-4">
                        <div class="benefit-icon mb-3"><i class="fas fa-baby fa-3x text-success"></i></div>
                        <h5 class="benefit-title">Pediatric Checkups</h5>
                        <p class="benefit-text">Friendly pediatric dentists create a positive first dental experience for kids.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="benefit-card text-center h-100 p-4">
                        <div class="benefit-icon mb-3"><i class="fas fa-tooth fa-3x text-success"></i></div>
                        <h5 class="benefit-title">Adult General Dentistry</h5>
                        <p class="benefit-text">Routine exams, fillings, and cleanings to keep adult smiles strong.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="benefit-card text-center h-100 p-4">
                        <div class="benefit-icon mb-3"><i class="fas fa-users fa-3x text-success"></i></div>
                        <h5 class="benefit-title">Family Preventive Plans</h5>
                        <p class="benefit-text">Group scheduling and recall reminders make it easy for busy households.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="benefit-card text-center h-100 p-4">
                        <div class="benefit-icon mb-3"><i class="fas fa-heart fa-3x text-success"></i></div>
                        <h5 class="benefit-title">Comfort-focused Care</h5>
                        <p class="benefit-text">Gentle techniques and calming environment for all ages.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Family Care Process -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold" style="color: #2d7560;">Your Family Care Journey</h2>
                <p class="lead text-muted">Simple steps for consistent oral health and peace of mind.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="process-step text-center">
                        <div class="step-number mb-3"><span class="badge rounded-pill bg-success fs-4">1</span></div>
                        <h5 class="step-title">Book Together</h5>
                        <p class="step-description">One appointment for family members to save time and reduce stress.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="process-step text-center">
                        <div class="step-number mb-3"><span class="badge rounded-pill bg-success fs-4">2</span></div>
                        <h5 class="step-title">Personalized Evaluation</h5>
                        <p class="step-description">Customized assessment for each patient based on age and dental history.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="process-step text-center">
                        <div class="step-number mb-3"><span class="badge rounded-pill bg-success fs-4">3</span></div>
                        <h5 class="step-title">Treat & Protect</h5>
                        <p class="step-description">Complete needed treatments while keeping preventive actions front-of-mind.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="process-step text-center">
                        <div class="step-number mb-3"><span class="badge rounded-pill bg-success fs-4">4</span></div>
                        <h5 class="step-title">Follow-Up Support</h5>
                        <p class="step-description">Regular reminders and at-home care tips to keep everyone on track.</p>
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
                    <h2 class="display-5 fw-bold mb-4" style="color: #2d7560;">Why Our Family Dentistry Is Trusted</h2>
                    <div class="why-choose-features">
                        <div class="feature-item mb-4">
                            <h5 class="feature-title"><i class="fas fa-users text-success me-2"></i>All Ages Welcome</h5>
                            <p class="feature-text">From first baby teeth to lifelong smile care, our clinicians are experienced with every generation.</p>
                        </div>
                        <div class="feature-item mb-4">
                            <h5 class="feature-title"><i class="fas fa-lightbulb text-success me-2"></i>Education-Focused</h5>
                            <p class="feature-text">We teach families how to prevent problems before they start.</p>
                        </div>
                        <div class="feature-item mb-4">
                            <h5 class="feature-title"><i class="fas fa-calendar-check text-success me-2"></i>Flexible Hours</h5>
                            <p class="feature-text">Evening and weekend times fit busy family schedules.</p>
                        </div>
                        <div class="feature-item mb-0">
                            <h5 class="feature-title"><i class="fas fa-heart text-success me-2"></i>Kind, Caring Team</h5>
                            <p class="feature-text">We provide a warm, safe environment with gentle treatment for all ages.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="image/family-dentist-team.jpg" alt="Family Dental Team" class="img-fluid rounded-3 shadow">
                </div>
            </div>

            <div class="row mt-5 pt-4">
                <div class="col-12 text-center">
                    <p class="cta-text mb-3">Start building a healthier future for your family with one trusted dental practice.</p>
                    <a href="booking.php" class="btn rounded-pill px-4" style="background-color: #2d7560; color: white;">BOOK A FAMILY APPOINTMENT</a>
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
                        <p class="footer-text small">Dau, Mabalacat, Pampanga, Philippines<br>Your familyâ€™s oral health is our top priority.</p>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
                    <h6 class="footer-title mb-3">Services</h6>
                    <ul class="footer-links">
                        <li><a href="family-dentistry.php">Family Dentistry</a></li>
                        <li><a href="preventive-care.php">Preventive Care</a></li>
                        <li><a href="cosmetic-dentistry.php">Cosmetic Dentistry</a></li>
                        <li><a href="emergency-dentistry.php">Emergency Dentistry</a></li>
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

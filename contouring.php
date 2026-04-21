<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tooth Contouring - TOOTH IMPRESSION Dau Branch</title>

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
    <section id="home" class="hero-section" style="background-image: url('image/toothcontouring.jpg'); background-attachment: fixed; background-size: cover; background-position: center;">
        <div class="hero-overlay"></div>
        <div class="container-fluid h-100">
            <div class="row align-items-center h-100">
                <div class="col-lg-6 col-md-12 hero-text">
                    <h1 class="display-4 fw-bold text-dark mb-4" style="font-size: 4.5rem;">Perfect Your Smile<br>with Tooth Contouring</h1>
                    <p class="lead text-dark mb-4" style="font-size: 1.4rem;">
                        Transform your smile with our precise tooth contouring procedure.<br> Achieve the perfect shape and symmetry you've always wanted.
                    </p>
                    <a href="booking.php" class="btn px-4 mb-5 rounded-pill" style="background-color: #2d7560; color: white;">BOOK YOUR SESSION</a>

                    <!-- Stats inside Hero -->
                    <div class="row hero-stats">
                        <div class="col-6">
                            <h2 class="stat-number text-dark fw-bold">500+</h2>
                            <p class="text-dark small">Successful contouring<br>procedures completed</p>
                        </div>
                        <div class="col-6">
                            <h2 class="stat-number text-dark fw-bold">30-60</h2>
                            <p class="text-dark small">Minutes per session<br>with lasting results</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- What is Tooth Contouring Section -->
    <section id="about-contouring" class="py-5">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <h2 class="display-5 fw-bold mb-4" style="color: #2d7560;">What is Tooth Contouring?</h2>
                    <p class="lead text-muted mb-4">
                        Tooth contouring, also known as enamel shaping or odontoplasty, is a quick and painless cosmetic dental procedure that involves removing small amounts of tooth enamel to improve the shape, length, or surface appearance of your teeth.
                    </p>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="feature-item">
                                <i class="fas fa-clock text-success me-2"></i>
                                <strong>Quick Procedure:</strong> Usually completed in one visit
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-item">
                                <i class="fas fa-user-md text-success me-2"></i>
                                <strong>Painless:</strong> Minimal discomfort with local anesthesia
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-item">
                                <i class="fas fa-infinity text-success me-2"></i>
                                <strong>Long-lasting:</strong> Results can last a lifetime
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-item">
                                <i class="fas fa-smile text-success me-2"></i>
                                <strong>Immediate Results:</strong> See changes right away
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="image/toothcontouring.jpg" alt="Tooth Contouring Procedure" class="img-fluid rounded-3 shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section id="benefits" class="py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold" style="color: #2d7560;">Benefits of Tooth Contouring</h2>
                <p class="lead text-muted">Discover how tooth contouring can enhance your smile</p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="benefit-card text-center h-100 p-4">
                        <div class="benefit-icon mb-3">
                            <i class="fas fa-tooth fa-3x text-success"></i>
                        </div>
                        <h5 class="benefit-title">Improved Shape</h5>
                        <p class="benefit-text">Correct uneven teeth, chips, or irregular shapes for a more uniform smile.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="benefit-card text-center h-100 p-4">
                        <div class="benefit-icon mb-3">
                            <i class="fas fa-balance-scale fa-3x text-success"></i>
                        </div>
                        <h5 class="benefit-title">Better Symmetry</h5>
                        <p class="benefit-text">Create balance and harmony in your smile by adjusting tooth proportions.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="benefit-card text-center h-100 p-4">
                        <div class="benefit-icon mb-3">
                            <i class="fas fa-shield-alt fa-3x text-success"></i>
                        </div>
                        <h5 class="benefit-title">Enhanced Confidence</h5>
                        <p class="benefit-text">Feel more confident about your smile with improved aesthetics.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="benefit-card text-center h-100 p-4">
                        <div class="benefit-icon mb-3">
                            <i class="fas fa-stopwatch fa-3x text-success"></i>
                        </div>
                        <h5 class="benefit-title">Minimal Time</h5>
                        <p class="benefit-text">Quick procedure that fits easily into your busy schedule.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- The Process Section -->
    <section id="process" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold" style="color: #2d7560;">The Contouring Process</h2>
                <p class="lead text-muted">Our step-by-step approach to perfecting your smile</p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="process-step text-center">
                        <div class="step-number mb-3">
                            <span class="badge rounded-pill bg-success fs-4">1</span>
                        </div>
                        <h5 class="step-title">Consultation</h5>
                        <p class="step-description">Discuss your goals and our dentist evaluates your teeth to determine if contouring is right for you.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="process-step text-center">
                        <div class="step-number mb-3">
                            <span class="badge rounded-pill bg-success fs-4">2</span>
                        </div>
                        <h5 class="step-title">Planning</h5>
                        <p class="step-description">We create a customized plan and may use digital imaging to show you the expected results.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="process-step text-center">
                        <div class="step-number mb-3">
                            <span class="badge rounded-pill bg-success fs-4">3</span>
                        </div>
                        <h5 class="step-title">Contouring</h5>
                        <p class="step-description">Using precise dental tools, we gently reshape your teeth by removing small amounts of enamel.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="process-step text-center">
                        <div class="step-number mb-3">
                            <span class="badge rounded-pill bg-success fs-4">4</span>
                        </div>
                        <h5 class="step-title">Polishing</h5>
                        <p class="step-description">Final polishing ensures your teeth look natural and feel smooth.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Before & After Showcase Section -->
    <?php
        $contouringShowcase = [
            [
                'before'  => 'image/before1.png',
                'after'   => 'image/after1.png',
                'caption' => 'Tooth Contouring | Shape Correction',
            ],
            [
                'before'  => 'image/before2.png',
                'after'   => 'image/after2.png',
                'caption' => 'Enamel Shaping | Symmetry Improvement',
            ],
            [
                'before'  => 'image/before3.png',
                'after'   => 'image/after3.png',
                'caption' => 'Smile Enhancement | Length Adjustment',
            ],
        ];
    ?>
    <section id="showcase" class="before-after-section py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <h2 class="section-title text-center mb-5">Transformation Results</h2>
            <div class="row g-4 showcase-grid">
                <?php foreach ($contouringShowcase as $card): ?>
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

    <!-- Why Choose Us Section -->
    <section id="why-choose-us" class="py-5">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <h2 class="display-5 fw-bold mb-4" style="color: #2d7560;">Why Choose Our Clinic?</h2>

                    <div class="why-choose-features">
                        <div class="feature-item mb-4">
                            <h5 class="feature-title"><i class="fas fa-user-md text-success me-2"></i>Expert Dentists</h5>
                            <p class="feature-text">Our experienced dental professionals specialize in cosmetic procedures and use the latest techniques.</p>
                        </div>

                        <div class="feature-item mb-4">
                            <h5 class="feature-title"><i class="fas fa-tools text-success me-2"></i>Advanced Technology</h5>
                            <p class="feature-text">We use state-of-the-art equipment and digital planning tools for precise, predictable results.</p>
                        </div>

                        <div class="feature-item mb-4">
                            <h5 class="feature-title"><i class="fas fa-heart text-success me-2"></i>Patient-Centered Care</h5>
                            <p class="feature-text">Your comfort and satisfaction are our top priorities throughout the entire process.</p>
                        </div>

                        <div class="feature-item mb-0">
                            <h5 class="feature-title"><i class="fas fa-shield-alt text-success me-2"></i>Safe & Effective</h5>
                            <p class="feature-text">Tooth contouring is a safe, conservative procedure with minimal risk when performed by qualified dentists.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <img src="image/servation.jpg" alt="Our Dental Clinic" class="img-fluid rounded-3 shadow">
                </div>
            </div>

            <!-- Bottom CTA Section -->
            <div class="row mt-5 pt-4">
                <div class="col-12 text-center">
                    <p class="cta-text mb-3">Ready to transform your smile?</p>
                    <a href="booking.php" class="btn rounded-pill px-4" style="background-color: #2d7560; color: white;">Schedule Your Consultation</a>
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
                        <li><a href="contouring.php">Tooth Contouring</a></li>
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oral Hygiene - TOOTH IMPRESSION Dau Branch</title>

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
                    <h1 class="display-4 fw-bold text-dark mb-4" style="font-size: 4.5rem;">Master Your<br>Oral Hygiene Routine</h1>
                    <p class="lead text-dark mb-4" style="font-size: 1.4rem;">
                        Learn the essential practices for maintaining healthy teeth and gums.<br> Prevention is the key to a lifetime of beautiful smiles.
                    </p>
                    <a href="booking.php" class="btn px-4 mb-5 rounded-pill" style="background-color: #2d7560; color: white;">SCHEDULE CLEANING</a>

                    <!-- Stats inside Hero -->
                    <div class="row hero-stats">
                        <div class="col-6">
                            <h2 class="stat-number text-dark fw-bold">95%</h2>
                            <p class="text-dark small">Of dental problems<br>are preventable</p>
                        </div>
                        <div class="col-6">
                            <h2 class="stat-number text-dark fw-bold">2x</h2>
                            <p class="text-dark small">Daily brushing reduces<br>cavity risk</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- What is Oral Hygiene Section -->
    <section id="about-oral-hygiene" class="py-5">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <h2 class="display-5 fw-bold mb-4" style="color: #2d7560;">What is Oral Hygiene?</h2>
                    <p class="lead text-muted mb-4">
                        Oral hygiene refers to the practice of keeping your mouth clean and healthy by regularly brushing, flossing, and visiting your dentist. Good oral hygiene is essential for preventing tooth decay, gum disease, and other oral health problems.
                    </p>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="feature-item">
                                <i class="fas fa-toothbrush text-success me-2"></i>
                                <strong>Daily Care:</strong> Brush twice daily for two minutes
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-item">
                                <i class="fas fa-dental-floss text-success me-2"></i>
                                <strong>Flossing:</strong> Clean between teeth daily
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-item">
                                <i class="fas fa-user-md text-success me-2"></i>
                                <strong>Regular Check-ups:</strong> Visit dentist every 6 months
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-item">
                                <i class="fas fa-shield-alt text-success me-2"></i>
                                <strong>Prevention First:</strong> Stop problems before they start
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="image/servation.jpg" alt="Oral Hygiene Care" class="img-fluid rounded-3 shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Daily Routine Section -->
    <section id="daily-routine" class="py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold" style="color: #2d7560;">Your Daily Oral Hygiene Routine</h2>
                <p class="lead text-muted">Follow these simple steps for optimal oral health</p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="routine-card text-center h-100 p-4">
                        <div class="routine-icon mb-3">
                            <i class="fas fa-toothbrush fa-3x text-success"></i>
                        </div>
                        <h5 class="routine-title">Morning Brush</h5>
                        <p class="routine-text">Brush your teeth for 2 minutes with fluoride toothpaste. Use gentle circular motions.</p>
                        <div class="routine-time">
                            <small class="text-muted">2 minutes</small>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="routine-card text-center h-100 p-4">
                        <div class="routine-icon mb-3">
                            <i class="fas fa-dental-floss fa-3x text-success"></i>
                        </div>
                        <h5 class="routine-title">Floss Daily</h5>
                        <p class="routine-text">Clean between teeth with floss or interdental brushes to remove plaque and food particles.</p>
                        <div class="routine-time">
                            <small class="text-muted">2-3 minutes</small>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="routine-card text-center h-100 p-4">
                        <div class="routine-icon mb-3">
                            <i class="fas fa-wind fa-3x text-success"></i>
                        </div>
                        <h5 class="routine-title">Mouthwash</h5>
                        <p class="routine-text">Use antiseptic mouthwash to kill bacteria and freshen breath. Swish for 30 seconds.</p>
                        <div class="routine-time">
                            <small class="text-muted">30 seconds</small>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="routine-card text-center h-100 p-4">
                        <div class="routine-icon mb-3">
                            <i class="fas fa-toothbrush fa-3x text-success"></i>
                        </div>
                        <h5 class="routine-title">Evening Brush</h5>
                        <p class="routine-text">Brush again before bed to remove day's buildup. Don't forget your tongue!</p>
                        <div class="routine-time">
                            <small class="text-muted">2 minutes</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Professional Care Section -->
    <section id="professional-care" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold" style="color: #2d7560;">Professional Dental Care</h2>
                <p class="lead text-muted">What our dental professionals do for your oral health</p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="care-card h-100">
                        <div class="care-icon mb-3">
                            <i class="fas fa-teeth fa-2x text-success"></i>
                        </div>
                        <h5 class="care-title">Dental Cleaning</h5>
                        <p class="care-description">Professional cleaning removes plaque and tartar that regular brushing can't reach, preventing gum disease.</p>
                        <ul class="care-benefits">
                            <li>Removes built-up plaque</li>
                            <li>Prevents gum disease</li>
                            <li>Freshens breath</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="care-card h-100">
                        <div class="care-icon mb-3">
                            <i class="fas fa-search-plus fa-2x text-success"></i>
                        </div>
                        <h5 class="care-title">Oral Examination</h5>
                        <p class="care-description">Comprehensive check-up to detect early signs of problems and ensure your oral health is on track.</p>
                        <ul class="care-benefits">
                            <li>Early problem detection</li>
                            <li>Oral cancer screening</li>
                            <li>Gum health assessment</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="care-card h-100">
                        <div class="care-icon mb-3">
                            <i class="fas fa-shield-alt fa-2x text-success"></i>
                        </div>
                        <h5 class="care-title">Preventive Treatments</h5>
                        <p class="care-description">Fluoride treatments and sealants provide extra protection against cavities and tooth decay.</p>
                        <ul class="care-benefits">
                            <li>Strengthens tooth enamel</li>
                            <li>Prevents cavities</li>
                            <li>Long-lasting protection</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Oral Health Tips Section -->
    <section id="tips" class="py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <h2 class="display-5 fw-bold mb-4" style="color: #2d7560;">Essential Oral Health Tips</h2>

                    <div class="tips-list">
                        <div class="tip-item mb-4">
                            <h5 class="tip-title"><i class="fas fa-check-circle text-success me-2"></i>Choose the Right Toothbrush</h5>
                            <p class="tip-text">Use a soft-bristled toothbrush with a head small enough to reach all areas of your mouth.</p>
                        </div>

                        <div class="tip-item mb-4">
                            <h5 class="tip-title"><i class="fas fa-check-circle text-success me-2"></i>Replace Regularly</h5>
                            <p class="tip-text">Change your toothbrush every 3-4 months or when bristles become frayed.</p>
                        </div>

                        <div class="tip-item mb-4">
                            <h5 class="tip-title"><i class="fas fa-check-circle text-success me-2"></i>Watch Your Diet</h5>
                            <p class="tip-text">Limit sugary foods and drinks. If you consume them, brush or rinse afterward.</p>
                        </div>

                        <div class="tip-item mb-4">
                            <h5 class="tip-title"><i class="fas fa-check-circle text-success me-2"></i>Stay Hydrated</h5>
                            <p class="tip-text">Drink plenty of water to help wash away food particles and bacteria.</p>
                        </div>

                        <div class="tip-item mb-0">
                            <h5 class="tip-title"><i class="fas fa-check-circle text-success me-2"></i>Don't Smoke</h5>
                            <p class="tip-text">Smoking increases your risk of gum disease, tooth loss, and oral cancer.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="tips-image-container">
                        <img src="image/servation.jpg" alt="Oral Health Tips" class="img-fluid rounded-3 shadow">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Oral Hygiene Matters Section -->
    <section id="importance" class="py-5">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <img src="image/servation.jpg" alt="Importance of Oral Hygiene" class="img-fluid rounded-3 shadow">
                </div>

                <div class="col-lg-6">
                    <h2 class="display-5 fw-bold mb-4" style="color: #2d7560;">Why Oral Hygiene Matters</h2>

                    <div class="importance-features">
                        <div class="feature-item mb-4">
                            <h5 class="feature-title">Prevents Disease</h5>
                            <p class="feature-text">Good oral hygiene prevents cavities, gum disease, and tooth loss. Regular care keeps your mouth healthy.</p>
                        </div>

                        <div class="feature-item mb-4">
                            <h5 class="feature-title">Overall Health Connection</h5>
                            <p class="feature-text">Oral health is linked to overall health. Poor oral hygiene can contribute to heart disease, diabetes, and more.</p>
                        </div>

                        <div class="feature-item mb-4">
                            <h5 class="feature-title">Fresh Breath & Confidence</h5>
                            <p class="feature-text">Clean teeth and fresh breath boost your confidence in social and professional situations.</p>
                        </div>

                        <div class="feature-item mb-0">
                            <h5 class="feature-title">Cost Savings</h5>
                            <p class="feature-text">Preventive care is much less expensive than treating advanced dental problems.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom CTA Section -->
            <div class="row mt-5 pt-4">
                <div class="col-12 text-center">
                    <p class="cta-text mb-3">Ready to improve your oral hygiene routine?</p>
                    <a href="booking.php" class="btn rounded-pill px-4" style="background-color: #2d7560; color: white;">Book Your Check-up</a>
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
                        <li><a href="oral-hygiene.php">Oral Hygiene</a></li>
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

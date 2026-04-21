<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dental Sealants - TOOTH IMPRESSION Dau Branch</title>

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
                    <h1 class="display-4 fw-bold text-dark mb-4" style="font-size: 4.5rem;">Protect Your Smile<br>with Dental Sealants</h1>
                    <p class="lead text-dark mb-4" style="font-size: 1.4rem;">
                        Invisible protection for your teeth against cavities and decay.<br> Quick, painless application that lasts for years.
                    </p>
                    <a href="booking.php" class="btn px-4 mb-5 rounded-pill" style="background-color: #2d7560; color: white;">GET SEALANTS</a>

                    <!-- Stats inside Hero -->
                    <div class="row hero-stats">
                        <div class="col-6">
                            <h2 class="stat-number text-dark fw-bold">80%</h2>
                            <p class="text-dark small">Reduction in cavities<br>with sealants</p>
                        </div>
                        <div class="col-6">
                            <h2 class="stat-number text-dark fw-bold">10+</h2>
                            <p class="text-dark small">Years of protection<br>per application</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- What are Dental Sealants Section -->
    <section id="about-sealants" class="py-5">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <h2 class="display-5 fw-bold mb-4" style="color: #2d7560;">What are Dental Sealants?</h2>
                    <p class="lead text-muted mb-4">
                        Dental sealants are thin, protective coatings applied to the chewing surfaces of back teeth (molars and premolars). They act as a barrier, protecting enamel from plaque and acids that cause cavities.
                    </p>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="feature-item">
                                <i class="fas fa-shield-alt text-success me-2"></i>
                                <strong>Cavity Prevention:</strong> Blocks food and bacteria
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-item">
                                <i class="fas fa-eye-slash text-success me-2"></i>
                                <strong>Invisible:</strong> Clear and natural appearance
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-item">
                                <i class="fas fa-clock text-success me-2"></i>
                                <strong>Quick Application:</strong> Usually done in one visit
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-item">
                                <i class="fas fa-smile text-success me-2"></i>
                                <strong>Painless:</strong> No anesthesia required
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="image/servation.jpg" alt="Dental Sealants" class="img-fluid rounded-3 shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Who Needs Sealants Section -->
    <section id="who-needs-sealants" class="py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold" style="color: #2d7560;">Who Needs Dental Sealants?</h2>
                <p class="lead text-muted">Sealants are most beneficial for these groups</p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="candidate-card text-center h-100 p-4">
                        <div class="candidate-icon mb-3">
                            <i class="fas fa-child fa-3x text-success"></i>
                        </div>
                        <h5 class="candidate-title">Children & Teens</h5>
                        <p class="candidate-text">Kids aged 6-16 when molars and premolars erupt. Protects against cavities during cavity-prone years.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="candidate-card text-center h-100 p-4">
                        <div class="candidate-icon mb-3">
                            <i class="fas fa-tooth fa-3x text-success"></i>
                        </div>
                        <h5 class="candidate-title">Deep Grooves</h5>
                        <p class="candidate-text">Teeth with deep pits and fissures that are difficult to clean with regular brushing.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="candidate-card text-center h-100 p-4">
                        <div class="candidate-icon mb-3">
                            <i class="fas fa-history fa-3x text-success"></i>
                        </div>
                        <h5 class="candidate-title">Cavity History</h5>
                        <p class="candidate-text">Individuals with a history of cavities or those at high risk for developing cavities.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="candidate-card text-center h-100 p-4">
                        <div class="candidate-icon mb-3">
                            <i class="fas fa-adult fa-3x text-success"></i>
                        </div>
                        <h5 class="candidate-title">Adults</h5>
                        <p class="candidate-text">Adults without decay or fillings in molars can also benefit from sealant protection.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How Sealants Work Section -->
    <section id="how-sealants-work" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold" style="color: #2d7560;">How Dental Sealants Work</h2>
                <p class="lead text-muted">Understanding the protective mechanism</p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="work-card h-100">
                        <div class="work-icon mb-3">
                            <i class="fas fa-utensils fa-2x text-success"></i>
                        </div>
                        <h5 class="work-title">Blocks Food & Bacteria</h5>
                        <p class="work-description">Creates a smooth barrier that prevents food particles and bacteria from getting trapped in tooth grooves.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="work-card h-100">
                        <div class="work-icon mb-3">
                            <i class="fas fa-flask fa-2x text-success"></i>
                        </div>
                        <h5 class="work-title">Acid Protection</h5>
                        <p class="work-description">Shields tooth enamel from harmful acids produced by bacteria that cause cavities and decay.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="work-card h-100">
                        <div class="work-icon mb-3">
                            <i class="fas fa-brush fa-2x text-success"></i>
                        </div>
                        <h5 class="work-title">Easier Cleaning</h5>
                        <p class="work-description">Makes it easier to clean teeth thoroughly, reducing the risk of plaque buildup and cavities.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Application Process Section -->
    <section id="application-process" class="py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold" style="color: #2d7560;">The Sealant Application Process</h2>
                <p class="lead text-muted">Quick and comfortable procedure</p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="process-step text-center">
                        <div class="step-number mb-3">
                            <span class="badge rounded-pill bg-success fs-4">1</span>
                        </div>
                        <h5 class="step-title">Tooth Preparation</h5>
                        <p class="step-description">Teeth are thoroughly cleaned and dried. No drilling or anesthesia is typically needed.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="process-step text-center">
                        <div class="step-number mb-3">
                            <span class="badge rounded-pill bg-success fs-4">2</span>
                        </div>
                        <h5 class="step-title">Etching</h5>
                        <p class="step-description">A special solution is applied to roughen the tooth surface, helping the sealant bond properly.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="process-step text-center">
                        <div class="step-number mb-3">
                            <span class="badge rounded-pill bg-success fs-4">3</span>
                        </div>
                        <h5 class="step-title">Sealant Application</h5>
                        <p class="step-description">The liquid sealant is painted onto the tooth surface and flows into all the grooves.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="process-step text-center">
                        <div class="step-number mb-3">
                            <span class="badge rounded-pill bg-success fs-4">4</span>
                        </div>
                        <h5 class="step-title">Curing & Check</h5>
                        <p class="step-description">A special light hardens the sealant. We check the fit and make any necessary adjustments.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Benefits & Longevity Section -->
    <section id="benefits-longevity" class="py-5">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <h2 class="display-5 fw-bold mb-4" style="color: #2d7560;">Benefits & Longevity</h2>

                    <div class="benefits-list">
                        <div class="benefit-item mb-4">
                            <h5 class="benefit-title"><i class="fas fa-check-circle text-success me-2"></i>Cavity Prevention</h5>
                            <p class="benefit-text">Reduces the risk of cavities by up to 80% in the protected teeth, especially in hard-to-reach areas.</p>
                        </div>

                        <div class="benefit-item mb-4">
                            <h5 class="benefit-title"><i class="fas fa-check-circle text-success me-2"></i>Cost Effective</h5>
                            <p class="benefit-text">Much less expensive than treating cavities. One sealant can prevent multiple fillings over time.</p>
                        </div>

                        <div class="benefit-item mb-4">
                            <h5 class="benefit-title"><i class="fas fa-check-circle text-success me-2"></i>Long-Lasting Protection</h5>
                            <p class="benefit-text">Sealants can last 5-10 years or more with proper care. Regular check-ups ensure continued protection.</p>
                        </div>

                        <div class="benefit-item mb-4">
                            <h5 class="benefit-title"><i class="fas fa-check-circle text-success me-2"></i>Painless & Quick</h5>
                            <p class="benefit-text">The entire process takes only a few minutes per tooth and requires no anesthesia or drilling.</p>
                        </div>

                        <div class="benefit-item mb-0">
                            <h5 class="benefit-title"><i class="fas fa-check-circle text-success me-2"></i>Insurance Coverage</h5>
                            <p class="benefit-text">Many dental insurance plans cover sealants, especially for children under 18 years old.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <img src="image/servation.jpg" alt="Sealant Benefits" class="img-fluid rounded-3 shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Care Instructions Section -->
    <section id="care-instructions" class="py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <img src="image/servation.jpg" alt="Sealant Care" class="img-fluid rounded-3 shadow">
                </div>

                <div class="col-lg-6">
                    <h2 class="display-5 fw-bold mb-4" style="color: #2d7560;">Sealant Care Instructions</h2>

                    <div class="care-features">
                        <div class="care-item mb-4">
                            <h5 class="care-title">Normal Oral Hygiene</h5>
                            <p class="care-text">Continue brushing twice daily and flossing once daily. Sealants don't change your regular oral care routine.</p>
                        </div>

                        <div class="care-item mb-4">
                            <h5 class="care-title">Regular Dental Visits</h5>
                            <p class="care-text">Visit your dentist every 6 months for check-ups. We'll monitor your sealants and reapply if needed.</p>
                        </div>

                        <div class="care-item mb-4">
                            <h5 class="care-title">Avoid Chewing Hard Foods</h5>
                            <p class="care-text">While sealants are durable, avoid chewing on hard objects like ice or hard candy that could damage them.</p>
                        </div>

                        <div class="care-item mb-0">
                            <h5 class="care-title">Report Any Changes</h5>
                            <p class="care-text">If you notice any roughness, cracking, or feel that the sealant is no longer smooth, contact us for evaluation.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom CTA Section -->
            <div class="row mt-5 pt-4">
                <div class="col-12 text-center">
                    <p class="cta-text mb-3">Protect your family's smiles with dental sealants!</p>
                    <a href="booking.php" class="btn rounded-pill px-4" style="background-color: #2d7560; color: white;">Schedule Sealant Application</a>
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
                        <li><a href="dental-sealants.php">Dental Sealants</a></li>
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

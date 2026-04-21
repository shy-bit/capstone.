<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Periodontal Therapy - TOOTH IMPRESSION Dau Branch</title>

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
                    <h1 class="display-4 fw-bold text-dark mb-4" style="font-size: 4.5rem;">Advanced Periodontal<br>Therapy for Healthy<br>Gums</h1>
                    <p class="lead text-dark mb-4" style="font-size: 1.4rem;">
                        Comprehensive treatment for gum disease and periodontal health.<br> Restore your oral health with our expert periodontal therapy services.
                    </p>
                    <a href="booking.php" class="btn px-4 mb-5 rounded-pill" style="background-color: #2d7560; color: white;">START TREATMENT</a>

                    <!-- Stats inside Hero -->
                    <div class="row hero-stats">
                        <div class="col-6">
                            <h2 class="stat-number text-dark fw-bold">47%</h2>
                            <p class="text-dark small">Of adults have some form<br>of gum disease</p>
                        </div>
                        <div class="col-6">
                            <h2 class="stat-number text-dark fw-bold">90%</h2>
                            <p class="text-dark small">Success rate with early<br>periodontal treatment</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- What is Periodontal Disease Section -->
    <section id="about-periodontal" class="py-5">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <h2 class="display-5 fw-bold mb-4" style="color: #2d7560;">Understanding Periodontal Disease</h2>
                    <p class="lead text-muted mb-4">
                        Periodontal disease, commonly known as gum disease, is an infection of the tissues that support your teeth. It starts with plaque buildup and can lead to tooth loss if left untreated. Early detection and treatment are crucial for maintaining oral health.
                    </p>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="feature-item">
                                <i class="fas fa-exclamation-triangle text-success me-2"></i>
                                <strong>Silent Threat:</strong> Often painless in early stages
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-item">
                                <i class="fas fa-tooth text-success me-2"></i>
                                <strong>Tooth Loss:</strong> Leading cause of adult tooth loss
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-item">
                                <i class="fas fa-heart text-success me-2"></i>
                                <strong>Health Link:</strong> Connected to overall health issues
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="feature-item">
                                <i class="fas fa-shield-alt text-success me-2"></i>
                                <strong>Preventable:</strong> Early treatment prevents progression
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <img src="image/servation.jpg" alt="Periodontal Health" class="img-fluid rounded-3 shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Signs & Symptoms Section -->
    <section id="signs-symptoms" class="py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold" style="color: #2d7560;">Signs & Symptoms of Gum Disease</h2>
                <p class="lead text-muted">Don't ignore these warning signs - early detection saves teeth</p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="symptom-card text-center h-100 p-4">
                        <div class="symptom-icon mb-3">
                            <i class="fas fa-tint fa-3x text-danger"></i>
                        </div>
                        <h5 class="symptom-title">Bleeding Gums</h5>
                        <p class="symptom-text">Gums that bleed when brushing or flossing, even if only occasionally.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="symptom-card text-center h-100 p-4">
                        <div class="symptom-icon mb-3">
                            <i class="fas fa-expand fa-3x text-danger"></i>
                        </div>
                        <h5 class="symptom-title">Swollen Gums</h5>
                        <p class="symptom-text">Red, swollen, or tender gums that may appear shiny or puffy.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="symptom-card text-center h-100 p-4">
                        <div class="symptom-icon mb-3">
                            <i class="fas fa-wind fa-3x text-danger"></i>
                        </div>
                        <h5 class="symptom-title">Bad Breath</h5>
                        <p class="symptom-text">Persistent bad breath or bad taste in your mouth that won't go away.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="symptom-card text-center h-100 p-4">
                        <div class="symptom-icon mb-3">
                            <i class="fas fa-tooth fa-3x text-danger"></i>
                        </div>
                        <h5 class="symptom-title">Loose Teeth</h5>
                        <p class="symptom-text">Teeth that feel loose or seem to be shifting in position.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Treatment Options Section -->
    <section id="treatment-options" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold" style="color: #2d7560;">Periodontal Treatment Options</h2>
                <p class="lead text-muted">Comprehensive therapy tailored to your specific needs</p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="treatment-card h-100">
                        <div class="treatment-icon mb-3">
                            <i class="fas fa-broom fa-2x text-success"></i>
                        </div>
                        <h5 class="treatment-title">Scaling & Root Planing</h5>
                        <p class="treatment-description">Deep cleaning procedure that removes plaque and tartar from below the gumline and smooths root surfaces.</p>
                        <ul class="treatment-benefits">
                            <li>Removes deep plaque and tartar</li>
                            <li>Reduces pocket depth</li>
                            <li>Promotes gum reattachment</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="treatment-card h-100">
                        <div class="treatment-icon mb-3">
                            <i class="fas fa-pills fa-2x text-success"></i>
                        </div>
                        <h5 class="treatment-title">Antibiotic Therapy</h5>
                        <p class="treatment-description">Targeted antibiotic treatment to eliminate harmful bacteria and control infection in gum tissues.</p>
                        <ul class="treatment-benefits">
                            <li>Eliminates harmful bacteria</li>
                            <li>Reduces inflammation</li>
                            <li>Supports healing process</li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="treatment-card h-100">
                        <div class="treatment-icon mb-3">
                            <i class="fas fa-syringe fa-2x text-success"></i>
                        </div>
                        <h5 class="treatment-title">Surgical Procedures</h5>
                        <p class="treatment-description">Advanced surgical interventions for severe cases, including flap surgery and bone grafting.</p>
                        <ul class="treatment-benefits">
                            <li>Access to deep infections</li>
                            <li>Bone regeneration</li>
                            <li>Improved long-term prognosis</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Therapy Process Section -->
    <section id="therapy-process" class="py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold" style="color: #2d7560;">Our Periodontal Therapy Process</h2>
                <p class="lead text-muted">Systematic approach to restoring your gum health</p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="process-step text-center">
                        <div class="step-number mb-3">
                            <span class="badge rounded-pill bg-success fs-4">1</span>
                        </div>
                        <h5 class="step-title">Comprehensive Exam</h5>
                        <p class="step-description">Thorough evaluation including X-rays, pocket measurements, and assessment of gum health.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="process-step text-center">
                        <div class="step-number mb-3">
                            <span class="badge rounded-pill bg-success fs-4">2</span>
                        </div>
                        <h5 class="step-title">Diagnosis & Planning</h5>
                        <p class="step-description">Precise diagnosis of your condition and development of a personalized treatment plan.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="process-step text-center">
                        <div class="step-number mb-3">
                            <span class="badge rounded-pill bg-success fs-4">3</span>
                        </div>
                        <h5 class="step-title">Treatment Phase</h5>
                        <p class="step-description">Implementation of appropriate therapies, from non-surgical to advanced surgical procedures.</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="process-step text-center">
                        <div class="step-number mb-3">
                            <span class="badge rounded-pill bg-success fs-4">4</span>
                        </div>
                        <h5 class="step-title">Maintenance & Follow-up</h5>
                        <p class="step-description">Ongoing care and regular monitoring to maintain healthy gums and prevent recurrence.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Prevention & Maintenance Section -->
    <section id="prevention" class="py-5">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <h2 class="display-5 fw-bold mb-4" style="color: #2d7560;">Prevention & Maintenance</h2>

                    <div class="prevention-tips">
                        <div class="tip-item mb-4">
                            <h5 class="tip-title"><i class="fas fa-check-circle text-success me-2"></i>Daily Oral Hygiene</h5>
                            <p class="tip-text">Brush twice daily, floss once daily, and use mouthwash to remove plaque and prevent buildup.</p>
                        </div>

                        <div class="tip-item mb-4">
                            <h5 class="tip-title"><i class="fas fa-check-circle text-success me-2"></i>Regular Dental Visits</h5>
                            <p class="tip-text">Schedule professional cleanings every 6 months and periodontal check-ups as recommended.</p>
                        </div>

                        <div class="tip-item mb-4">
                            <h5 class="tip-title"><i class="fas fa-check-circle text-success me-2"></i>Healthy Lifestyle</h5>
                            <p class="tip-text">Maintain a balanced diet, avoid smoking, and manage conditions like diabetes that affect gum health.</p>
                        </div>

                        <div class="tip-item mb-4">
                            <h5 class="tip-title"><i class="fas fa-check-circle text-success me-2"></i>Early Detection</h5>
                            <p class="tip-text">Be aware of symptoms and seek treatment at the first sign of gum problems for better outcomes.</p>
                        </div>

                        <div class="tip-item mb-0">
                            <h5 class="tip-title"><i class="fas fa-check-circle text-success me-2"></i>Proper Technique</h5>
                            <p class="tip-text">Learn and practice proper brushing and flossing techniques to effectively clean all areas.</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <img src="image/servation.jpg" alt="Periodontal Prevention" class="img-fluid rounded-3 shadow">
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Our Therapy Section -->
    <section id="why-choose-us" class="py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6">
                    <img src="image/servation.jpg" alt="Advanced Periodontal Therapy" class="img-fluid rounded-3 shadow">
                </div>

                <div class="col-lg-6">
                    <h2 class="display-5 fw-bold mb-4" style="color: #2d7560;">Why Choose Our Periodontal Therapy?</h2>

                    <div class="why-choose-features">
                        <div class="feature-item mb-4">
                            <h5 class="feature-title">Specialized Expertise</h5>
                            <p class="feature-text">Our dental professionals specialize in periodontal care with advanced training and experience in gum disease treatment.</p>
                        </div>

                        <div class="feature-item mb-4">
                            <h5 class="feature-title">Latest Technology</h5>
                            <p class="feature-text">We use state-of-the-art equipment and techniques for accurate diagnosis and effective, minimally invasive treatments.</p>
                        </div>

                        <div class="feature-item mb-4">
                            <h5 class="feature-title">Comprehensive Care</h5>
                            <p class="feature-text">From prevention to advanced treatment, we provide complete periodontal care tailored to your specific needs.</p>
                        </div>

                        <div class="feature-item mb-0">
                            <h5 class="feature-title">Proven Results</h5>
                            <p class="feature-text">Our patients experience significant improvement in gum health and overall oral wellness with our proven treatment protocols.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom CTA Section -->
            <div class="row mt-5 pt-4">
                <div class="col-12 text-center">
                    <p class="cta-text mb-3">Don't wait - early treatment prevents tooth loss!</p>
                    <a href="booking.php" class="btn rounded-pill px-4" style="background-color: #2d7560; color: white;">Schedule Periodontal Exam</a>
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
                        <li><a href="periodontal-therapy.php">Periodontal Therapy</a></li>
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOOTH IMPRESSION Dau Branch - Fix Your Smile, Restore Your Confidence</title>
    
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
                <img src="../image/logo.png" alt="TOOTH IMPRESSION Dau Branch" class="me-2" style="height: 50px;">
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
                                        <li><a class="dropdown-item py-2" href="homes.php#about">About</a></li>
                                        <li><a class="dropdown-item py-2" href="services.php">Service</a></li>
                                        <li><a class="dropdown-item py-2" href="service.php#details">Service Details</a></li>
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

    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        
        body { background: #f5f5f5; }

        /* Hero Section */
        .doctors-hero {
            background: linear-gradient(135deg, #2d7560 0%, #1e4a3a 100%);
            min-height: 200px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            padding: 60px 20px;
            position: relative;
            overflow: hidden;
        }

        .doctors-hero h1 {
            font-size: 3rem;
            font-weight: 700;
            margin: 0;
            position: relative;
            z-index: 2;
        }

        /* Doctors Section */
        .doctors-section {
            padding: 50px 20px;
            background-color: #f5f5f5;
        }

        .doctors-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin-top: 40px;
        }

        .doctor-card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            display: flex;
            flex-direction: column;
        }

        .doctor-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

        .doctor-card-img {
            width: 100%;
            height: 280px;
            object-fit: cover;
            position: relative;
        }

        .doctor-card-body {
            padding: 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
            text-align: center;
        }

        .doctor-card-name {
            font-size: 1.2rem;
            font-weight: 700;
            color: #333;
            margin: 0 0 8px 0;
        }

        .doctor-card-specialty {
            font-size: 0.95rem;
            color: #2d7560;
            font-weight: 600;
            margin: 0 0 12px 0;
        }

        .doctor-card-bio {
            font-size: 0.85rem;
            color: #666;
            margin: 0;
            line-height: 1.5;
            flex: 1;
            margin-bottom: 15px;
        }

        .btn-book-doctor {
            background-color: #2d7560;
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.85rem;
            transition: all 0.3s ease;
            cursor: pointer;
            align-self: center;
            text-decoration: none;
            display: inline-block;
        }

        .btn-book-doctor:hover {
            background-color: #1e4a3a;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(45, 117, 96, 0.3);
        }

        /* Load More Button */
        .load-more-container {
            text-align: center;
            margin-top: 50px;
            padding: 20px 0;
        }

        .btn-load-more {
            background-color: #2d7560;
            color: white;
            border: none;
            padding: 12px 40px;
            border-radius: 25px;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn-load-more:hover {
            background-color: #1e4a3a;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(45, 117, 96, 0.3);
        }

        @media (max-width: 768px) {
            .doctors-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }
            
            .doctors-hero h1 {
                font-size: 2rem;
            }
        }

        @media (max-width: 480px) {
            .doctors-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
   
    <!-- Hero Section -->
    <section class="doctors-hero">
        <h1>Our Doctors - TOOTH IMPRESSION Dau Branch</h1>
    </section>

    <!-- Doctors Section -->
    <section class="doctors-section">
        <div class="container-lg">
            <div class="doctors-grid" id="doctorsGrid">
                <?php
                $doctors = [
                    [
                        'name' => 'Dr. Maria Santos',
                        'specialty' => 'Orthodontist',
                        'bio' => 'Expert in teeth alignment and orthodontic treatments.',
                        'image' => 'image/doctor1.jpg'
                    ],
                    [
                        'name' => 'Dr. Juan dela Cruz',
                        'specialty' => 'Endodontist',
                        'bio' => 'Specialist in root canal therapy and pulp diseases.',
                        'image' => 'image/doctor2.jpg'
                    ],
                    [
                        'name' => 'Dr. Ana Reyes',
                        'specialty' => 'Periodontist',
                        'bio' => 'Focus on gum health and periodontal disease treatment.',
                        'image' => 'image/doctor3.jpg'
                    ],
                    [
                        'name' => 'Dr. Carlos Mendoza',
                        'specialty' => 'Prosthodontist',
                        'bio' => 'Expert in dental prosthetics and tooth restoration.',
                        'image' => 'image/doctor4.jpg'
                    ],
                    [
                        'name' => 'Dr. Elena Garcia',
                        'specialty' => 'Pediatric Dentist',
                        'bio' => 'Specialized care for children and adolescents.',
                        'image' => 'image/doctor5.jpg'
                    ],
                    [
                        'name' => 'Dr. Miguel Torres',
                        'specialty' => 'Oral Surgeon',
                        'bio' => 'Experienced in complex surgical dental procedures.',
                        'image' => 'image/doctor6.jpg'
                    ],
                    [
                        'name' => 'Dr. Rafael Bautista',
                        'specialty' => 'Cosmetic Dentist',
                        'bio' => 'Creating beautiful smiles with cosmetic dentistry.',
                        'image' => 'image/doctor7.jpg'
                    ],
                    [
                        'name' => 'Dr. Sofia Lim',
                        'specialty' => 'Dental Hygienist',
                        'bio' => 'Professional dental cleaning and prevention specialist.',
                        'image' => 'image/doctor8.jpg'
                    ],
                    [
                        'name' => 'Dr. Antonio Valdez',
                        'specialty' => 'General Dentist',
                        'bio' => 'Comprehensive dental care and patient wellness.',
                        'image' => 'image/doctor9.jpg'
                    ]
                ];

                foreach ($doctors as $doctor) {
                    echo "<div class='doctor-card'>";
                    echo "<a href='booking.php?doctor=" . urlencode($doctor['name']) . "'><img src='" . htmlspecialchars($doctor['image']) . "' alt='" . htmlspecialchars($doctor['name']) . "' class='doctor-card-img'></a>";
                    echo "<div class='doctor-card-body'>";
                    echo "<h3 class='doctor-card-name'>" . htmlspecialchars($doctor['name']) . "</h3>";
                    echo "<p class='doctor-card-specialty'>" . htmlspecialchars($doctor['specialty']) . "</p>";
                    echo "<p class='doctor-card-bio'>" . htmlspecialchars($doctor['bio']) . "</p>";
                    echo "<a href='booking.php' class='btn-book-doctor'>Book Appointment</a>";
                    echo "</div>";
                    echo "</div>";
                }
                ?>
            </div>

            <div class="load-more-container">
                <button class="btn-load-more" onclick="loadMoreDoctors()">Load More</button>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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

        const additionalDoctors = [
            {
                'name': 'Dr. Cristina Lopez',
                'specialty': 'Implant Specialist',
                'bio': 'Dental implant surgery and restoration expertise.',
                'image': 'image/doctor10.jpg'
            },
            {
                'name': 'Dr. Roberto Cruz',
                'specialty': 'Periodontist',
                'bio': 'Advanced gum disease treatment and prevention.',
                'image': 'image/doctor11.jpg'
            },
            {
                'name': 'Dr. Patricia Aquino',
                'specialty': 'Orthodontist',
                'bio': 'Modern braces and aligner treatment specialist.',
                'image': 'image/doctor12.jpg'
            }
        ];

        let doctorIndex = 0;

        function loadMoreDoctors() {
            const grid = document.getElementById('doctorsGrid');
            const button = event.target;

            for (let i = 0; i < 3 && doctorIndex < additionalDoctors.length; i++) {
                const doctor = additionalDoctors[doctorIndex];
                
                const cardHTML = `
                    <div class='doctor-card'>
                        <a href='booking.php?doctor=${encodeURIComponent(doctor.name)}'><img src='${doctor.image}' alt='${doctor.name}' class='doctor-card-img'></a>
                        <div class='doctor-card-body'>
                            <h3 class='doctor-card-name'>${doctor.name}</h3>
                            <p class='doctor-card-specialty'>${doctor.specialty}</p>
                            <p class='doctor-card-bio'>${doctor.bio}</p>
                            <a href='booking.php' class='btn-book-doctor'>Book Appointment</a>
                        </div>
                    </div>
                `;
                
                grid.insertAdjacentHTML('beforeend', cardHTML);
                doctorIndex++;
            }

            if (doctorIndex >= additionalDoctors.length) {
                button.style.display = 'none';
            }
        }
    </script>
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
</body>
</html>

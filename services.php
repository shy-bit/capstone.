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
       
        .navbar-custom.scrolled .navbar-brand span {
            color: #fff !important;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-custom sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="homes.php">
                <img src="image/logo.png" alt="TOOTH IMPRESSION Dau Branch" class="me-2" style="height: 50px;">
                <span class="fw-bold text-success">TOOTH IMPRESSION</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="allPagesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            ALL PAGES
                        </a>
                        <ul class="dropdown-menu dropdown-menu-multi-column" aria-labelledby="allPagesDropdown" style="width: 500px; padding: 20px;">
                            <div class="row">
                                <div class="col-md-4">
                                    <ul class="list-unstyled">
                                        <li><a class="dropdown-item py-2" href="homes.php">Homepage</a></li>
                                        <li><a class="dropdown-item py-2" href="homes.php#about">About</a></li>
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
                                        <li><a class="dropdown-item py-2" href="#appointment">Appointment</a></li>
                                        <li><a class="dropdown-item py-2" href="#contact">Contact</a></li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </ul>
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
        /* Hero Section */
        .services-hero {
            background: linear-gradient(135deg, #2d7560 0%, #245249 100%);
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

        .services-hero h1 {
            font-size: 3rem;
            font-weight: 700;
            margin: 0;
            position: relative;
            z-index: 2;
        }

        .services-hero .location-tag {
            font-size: 1.1rem;
            margin-top: 10px;
            opacity: 0.9;
        }

        /* Services Section */
        .services-section {
            padding: 50px 20px;
            background-color: #f5f5f5;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-top: 40px;
        }

        .service-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            height: 400px;
            display: flex;
            flex-direction: column;
        }

        .service-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
        }

        .service-card-img {
            width: 100%;
            height: 240px;
            object-fit: cover;
            position: relative;
        }

        .service-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background-color: #2d7560;
            color: white;
            padding: 6px 14px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            z-index: 5;
        }

        .service-card-body {
            padding: 20px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .service-card-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: #333;
            margin: 0 0 10px 0;
        }

        .service-card-description {
            font-size: 0.9rem;
            color: #666;
            margin: 0;
            line-height: 1.5;
            flex: 1;
        }

        /* Load More Button */
        .load-more-container {
            text-align: center;
            margin-top: 40px;
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
            background-color: #245249;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(45, 117, 96, 0.3);
        }

        .btn-load-more:active {
            transform: translateY(0);
        }
    </style>

    <!-- Hero Section -->
    <section class="services-hero">
        <div>
            <h1>Our Services</h1>
            <p class="location-tag">TOOTH IMPRESSION - Dau Branch, Mabalacat, Pampanga</p>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services-section">
        <div class="container-lg">
            <div class="services-grid" id="servicesGrid">
                <?php
                $services = [
                    [
                        'title' => 'Wisdom Extraction',
                        'description' => 'Wisdom tooth extraction is a common procedure to remove one or more of the third molars â€“ the last set of teeth to emerge.',
                        'image' => 'image/wisdom.jpg',
                        'link' => 'wisdom.php'
                    ],
                    [
                        'title' => 'Tooth Contouring',
                        'description' => 'Tooth contouring, also known as enamel shaping, is a quick and painless cosmetic procedure that gently reshapes your.',
                        'image' => 'image/contouring.jpeg',
                        'link' => 'contouring.php'
                    ],
                    [
                        'title' => 'Oral Hygiene',
                        'description' => 'Oral hygiene is the foundation of a healthy smile. Maintaining good oral hygiene not only keeps your teeth and gums clean.',
                        'image' => 'image/oralhy.jpg',
                        'link' => 'oral-hygiene.php'
                    ],
                    [
                        'title' => 'Retainer Fitting',
                        'description' => 'After orthodontic treatment, a retainer is essential to maintain your newly aligned teeth. Our custom retainers ensure lasting results.',
                        'image' => 'image/retainer.jpg',
                        'link' => 'retainer-fitting.php'
                    ],
                    [
                        'title' => 'Periodontal Therapy',
                        'description' => 'Periodontal therapy is a specialized treatment focused on the health of your gums and the structures supporting your teeth.',
                        'image' => 'image/periodontal.jpg',
                        'link' => 'periodontal-therapy.php'
                    ],
                    [
                        'title' => 'Dental Sealants',
                        'description' => 'With years of hands-on experience, we bring deep industry knowledge and technical skill to protect your teeth.',
                        'image' => 'image/sealants.jpg',
                        'link' => 'dental-sealants.php'
                    ],
                    [
                        'title' => 'Cosmetic Dentistry',
                        'description' => 'Transform your smile with beautiful cosmetic enhancements and treatments.',
                        'image' => 'image/cosmetic.jpg',
                        'link' => 'cosmetic-dentistry.php'
                    ],
                    [
                        'title' => 'Implant Dentistry',
                        'description' => 'Replace missing teeth with natural-looking dental implants for a complete smile.',
                        'image' => 'image/implants.jpg',
                        'link' => 'implant-dentistry.php'
                    ],
                    
                ];

                foreach ($services as $service) {
                    echo "<div class='service-card'>";
                    echo "<a href='" . htmlspecialchars($service['link']) . "' style='text-decoration: none; position: relative; display: block;'>";
                    echo "<div style='position: relative;'>";
                    echo "<img src='" . htmlspecialchars($service['image']) . "' alt='" . htmlspecialchars($service['title']) . "' class='service-card-img' style='cursor: pointer;'>";
                    echo "<span class='service-badge'>" . htmlspecialchars($service['title']) . "</span>";
                    echo "</div>";
                    echo "</a>";
                    echo "<div class='service-card-body'>";
                    echo "<h3 class='service-card-title'>" . htmlspecialchars($service['title']) . "</h3>";
                    echo "<p class='service-card-description'>" . htmlspecialchars($service['description']) . "</p>";
                    echo "</div>";
                    echo "</div>";
                }
                ?>
            </div>

            <div class="load-more-container">
                <button class="btn-load-more" onclick="loadMoreServices()">Load More</button>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const additionalServices = [
            {
                'title': 'Emergency Dentistry',
                'description': 'We provide immediate care for dental emergencies including severe pain, broken teeth, and abscesses.',
                'image': 'image/emergency.jpg',
                'link': 'emergency-dentistry.php'
            },
            {
                'title': 'Preventive Care',
                'description': 'Regular check-ups and cleanings help prevent dental disease and maintain a healthy smile for life.',
                'image': 'image/preventive.jpg',
                'link': 'preventive-care.php'
            },
            {
                'title': 'Family Dentistry',
                'description': 'We care for the whole family with comprehensive dental services tailored to all ages.',
                'image': 'image/family.jpg',
                'link': 'family-dentistry.php'
            },
        ];

        let serviceIndex = 0;

        function loadMoreServices() {
            const grid = document.getElementById('servicesGrid');
            const button = event.target;

            for (let i = 0; i < 3 && serviceIndex < additionalServices.length; i++) {
                const service = additionalServices[serviceIndex];
                
                const cardHTML = `
                    <div class='service-card'>
                        <a href='${service.link}' style='text-decoration: none; position: relative; display: block;'>
                            <div style='position: relative;'>
                                <img src='${service.image}' alt='${service.title}' class='service-card-img' style='cursor: pointer;'>
                                <span class='service-badge'>${service.title}</span>
                            </div>
                        </a>
                        <div class='service-card-body'>
                            <h3 class='service-card-title'>${service.title}</h3>
                            <p class='service-card-description'>${service.description}</p>
                        </div>
                    </div>
                `;
                
                grid.insertAdjacentHTML('beforeend', cardHTML);
                serviceIndex++;
            }

            if (serviceIndex >= additionalServices.length) {
                button.style.display = 'none';
            }
        }

        // Navbar fade on scroll
        document.addEventListener('DOMContentLoaded', function() {
            const navbar = document.querySelector('.navbar-custom');
            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });
        });
    </script>
    <footer class="footer-section py-5" style="background-color: #f8f9fa;">
        <div class="container">
            <div class="row mb-5">
                <!-- Footer Brand -->
                <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                    <div class="footer-brand">
                        <h4 class="footer-logo mb-3">
                            <i class="fas fa-tooth" style="color: #2d7560;"></i> TOOTH IMPRESSION
                        </h4>
                        <p class="footer-text small">Your smile is our priority. Whether you need routine care, cosmetic enhancements, or emergency services, our Dau Branch in Mabalacat, Pampanga is here to serve you.</p>
                        <p class="footer-text small mt-2"><strong>Location:</strong> Dau, Mabalacat, Pampanga, Philippines</p>
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
                        <li>Sun: CLOSED</li>
                        <li>Mon to Sun: 9AM-7PM</li>
                        <li>Sat to Fri: 10AM-7PM</li>
                    </ul>
                </div>

                <!-- Newsletter -->
                <div class="col-lg-3 col-md-6">
                    <h6 class="footer-title mb-3">Newsletter</h6>
                    <p class="footer-text small mb-3">Discover new offers and stay up to date</p>
                    <div class="newsletter-input input-group">
                        <input type="email" class="form-control" placeholder="Enter your email address" aria-label="Email address">
                        <button class="btn" style="background-color: #2d7560; color: white; border-color: #2d7560;" type="button"><i class="fas fa-paper-plane"></i></button>
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
                    <p class="footer-copyright small mb-0">2025 Â© TOOTH IMPRESSION - Dau Branch, Mabalacat, Pampanga. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment - TOOTH IMPRESSION</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Leaflet CSS for Map -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.css" />
    <link rel="stylesheet" href="styles.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f5f5f5; }

        /* Navigation Styling */
        .navbar-custom {
            background-color: #2d7560 !important;
            border-radius: 0 0 30px 30px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
            transition: opacity 0.3s ease, background-color 0.3s ease;
        }

        .navbar-custom.scrolled {
            opacity: 0.7;
            background-color: rgba(45, 117, 96, 0.8) !important;
        }

        .navbar-custom .navbar-brand {
            color: white !important;
        }

        .navbar-custom .nav-link {
            color: white !important;
            font-weight: 600;
            padding: 0.5rem 1rem !important;
            transition: all 0.3s ease;
            font-size: 0.95rem;
        }

        .navbar-custom .nav-link:hover {
            color: #d4e5e1 !important;
            transform: scale(1.05);
        }

        .btn-booking {
            background-color: #c84444 !important;
            border-color: #c84444 !important;
            color: white !important;
            font-weight: 700;
            padding: 0.6rem 1.4rem !important;
            border-radius: 25px !important;
            transition: all 0.3s ease;
            font-size: 0.9rem;
            letter-spacing: 0.3px;
            text-decoration: none;
            display: inline-block;
        }

        .btn-booking:hover {
            background-color: #b03838 !important;
            border-color: #b03838 !important;
            color: white !important;
            transform: scale(1.05);
            box-shadow: 0 4px 12px rgba(200, 68, 68, 0.3);
        }

        /* Header/Hero Section */
        .booking-hero {
            background: linear-gradient(135deg, #2d7560 0%, #245249 100%);
            padding: 50px 20px;
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
            min-height: 150px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .booking-hero h1 {
            font-size: 3rem;
            font-weight: 700;
            margin: 0;
            position: relative;
            z-index: 2;
        }

        /* Appointment Section */
        .appointment-section {
            padding: 50px 20px;
            background-color: #f5f5f5;
        }

        .appointment-container {
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            gap: 40px;
            background: white;
            border-radius: 8px;
            padding: 40px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .contact-info h3 {
            font-size: 1.3rem;
            color: #333;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .contact-info p {
            color: #666;
            margin-bottom: 30px;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .phone-number {
            font-size: 2rem;
            font-weight: 700;
            color: #2d7560;
            margin: 20px 0;
        }

        .phone-desc {
            font-size: 0.9rem;
            color: #999;
            margin-bottom: 30px;
        }

        .social-section h4 {
            font-size: 1.1rem;
            color: #333;
            font-weight: 700;
            margin: 30px 0 15px 0;
        }

        .social-icons {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .social-icons a {
            width: 40px;
            height: 40px;
            background-color: #2d7560;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1rem;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .social-icons a:hover {
            background-color: #245249;
            transform: translateY(-3px);
        }

        /* Form Section */
        .booking-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            font-size: 0.9rem;
            color: #999;
            margin-bottom: 8px;
            font-weight: 500;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 0.95rem;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #2d7560;
            box-shadow: 0 0 5px rgba(45, 117, 96, 0.2);
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .btn-submit {
            background: linear-gradient(135deg, #2d7560 0%, #245249 100%);
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 25px;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            align-self: flex-start;
            margin-top: 10px;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(45, 117, 96, 0.3);
        }
        /* Map Section */
        .map-section {
            padding: 50px 20px;
            background-color: white;
        }

        .map-container {
            width: 100%;
            height: 400px;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        #appointmentMap {
            width: 100%;
            height: 100%;
        }

        .map-title {
            font-size: 1.8rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 30px;
            text-align: center;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .appointment-container {
                grid-template-columns: 1fr;
                gap: 30px;
                padding: 30px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .booking-hero h1 {
                font-size: 2rem;
            }

            .phone-number {
                font-size: 1.5rem;
            }

            .appointment-section {
                padding: 30px 15px;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOOTH IMPRESSION - Fix Your Smile, Restore Your Confidence</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="#home">
                <img src="../image/logo.png" alt="TOOTH IMPRESSION" class="me-2" style="height: 50px;">
                <span class="fw-bold text-success">TOOTH IMPRESSION</span>
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
                        <a class="nav-link btn btn-danger text-white ms-2 px-3" href="booking.php">BOOK APPOINTMENT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Hero Section -->
    <section class="booking-hero">
        <h1>Book Appointment</h1>
    </section>

    <!-- Appointment Section -->
    <section class="appointment-section" id="appointment">
        <div class="container-lg">
            <div class="appointment-container">
                <?php if (isset($_GET['success']) && intval($_GET['success']) === 1): ?>
                    <div class="alert alert-success" role="alert">Your appointment request has been submitted successfully. We will contact you soon.</div>
                <?php elseif (isset($_GET['success']) && intval($_GET['success']) === 0): ?>
                    <div class="alert alert-danger" role="alert">There was an issue submitting your appointment. Please try again.</div>
                <?php endif; ?>

                <!-- Contact Info -->
                <div class="contact-info">
                    <h3>Want to speak directly? Call us now.</h3>
                    <div class="phone-number">(+63) 917 123 4567</div>
                    <p class="phone-desc">Feel free to contact us for medical consultation and schedule your dental check-up. Located in Dau, Mabalacat, Pampanga, Philippines.</p>

                    <!-- Social Section -->
                    <div class="social-section">
                        <h4>Follow On</h4>
                        <div class="social-icons">
                            <a href="https://facebook.com" title="Facebook" target="_blank">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="https://twitter.com" title="Twitter" target="_blank">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://google.com" title="Google" target="_blank">
                                <i class="fab fa-google"></i>
                            </a>
                            <a href="https://youtube.com" title="YouTube" target="_blank">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Booking Form -->
                <form class="booking-form" action="save_booking.php" method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" id="firstName" name="firstName" placeholder="First Name" required>
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last</label>
                            <input type="text" id="lastName" name="lastName" placeholder="Last Name" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="youremail@gmail.com" required>
                    </div>

                    <div class="form-group">
                        <label for="appointmentDate">Appointment Date</label>
                        <input type="date" id="appointmentDate" name="appointmentDate" min="<?php echo date('Y-m-d', strtotime('+3 days')); ?>" required>
                        <small class="text-muted">Available Tuesday to Saturday, 9 AM to 5 PM â€¢ Minimum 3 days advance notice</small>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="treatment">Type of Treatment</label>
                            <select id="treatment" name="treatment" required>
                                <option value="">Select Treatment Type</option>
                                <option value="general">General Checkup</option>
                                <option value="cleaning">Teeth Cleaning</option>
                                <option value="root-canal">Root Canal</option>
                                <option value="implant">Dental Implant</option>
                                <option value="orthodontics">Orthodontics</option>
                                <option value="cosmetic">Cosmetic Dentistry</option>
                                <option value="whitening">Teeth Whitening</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="doctor">Preferred Doctor</label>
                            <select id="doctor" name="doctor_id">
                                <option value="">Select Doctor (Optional)</option>
                                <?php
                                require_once '../db.php';
                                $doctorQuery = $conn->query("SELECT id, name, specialization, availability_status FROM doctors ORDER BY availability_status DESC, name");
                                while ($doctor = $doctorQuery->fetch_assoc()) {
                                    $isAvailable = $doctor['availability_status'] === 'available';
                                    $statusText = $isAvailable ? '' : ' (Currently Unavailable)';
                                    $disabled = $isAvailable ? '' : ' disabled';
                                    echo '<option value="' . ($isAvailable ? $doctor['id'] : '') . '"' . $disabled . '>' . htmlspecialchars($doctor['name'], ENT_QUOTES, 'UTF-8') . ' - ' . htmlspecialchars($doctor['specialization'], ENT_QUOTES, 'UTF-8') . $statusText . '</option>';
                                }
                                ?>
                            </select>
                            <small class="text-muted">Unavailable doctors are marked and cannot be selected</small>
                        </div>
                    </div>
                        <div class="form-group">
                            <label for="time">Select Time</label>
                            <select id="time" name="time" required>
                                <option value="">Select A Time</option>
                                <option value="09:00">9:00 AM</option>
                                <option value="10:00">10:00 AM</option>
                                <option value="11:00">11:00 AM</option>
                                <option value="14:00">2:00 PM</option>
                                <option value="15:00">3:00 PM</option>
                                <option value="16:00">4:00 PM</option>
                                <option value="17:00">5:00 PM</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group full-width">
                        <label for="message">Message</label>
                        <textarea id="message" name="message" placeholder="Tell us about your concern..." rows="4" style="resize: vertical;"></textarea>
                    </div>

                    <div class="form-group full-width mb-4">
                        <label for="record_image">Upload Dental Record (Optional)</label>
                        <input type="file" class="form-control" id="record_image" name="record_image" accept="image/*">
                    </div>

                    <button type="submit" class="btn-submit">Submit Appointment</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Map Section -->
    <section class="map-section">
        <div class="container-lg">
            <h2 class="map-title">Our Location</h2>
            <div class="map-container">
                <div id="appointmentMap"></div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Leaflet JS for Map -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.9.4/leaflet.min.js"></script>
    
    <script>
        // Initialize Map
        function initializeMap() {
            const map = L.map('appointmentMap').setView([15.1968, 120.5877], 14);
            
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: 'Â© OpenStreetMap contributors',
                maxZoom: 19
            }).addTo(map);

            // Add clinic markers
            const clinics = [
                { name: 'Main Clinic - Dau', coords: [15.1968, 120.5877], address: 'Dau, Mabalacat, Pampanga, Philippines' },
                { name: 'Downtown Clinic - Mabalacat', coords: [15.1950, 120.5900], address: 'Mabalacat City, Pampanga, Philippines' },
                { name: 'West Clinic - Pampanga', coords: [15.2000, 120.5800], address: 'Pampanga Province, Philippines' },
                { name: 'East Clinic - Sta. Rosa', coords: [15.1900, 120.6000], address: 'Sta. Rosa, Pampanga, Philippines' }
            ];

            clinics.forEach(clinic => {
                const marker = L.marker(clinic.coords).addTo(map);
                marker.bindPopup(`
                    <div style="font-weight: bold; margin-bottom: 5px;">${clinic.name}</div>
                    <div>${clinic.address}</div>
                    <div style="margin-top: 10px; font-size: 0.9rem;">Call: (+63) 917 123 4567</div>
                `);
            });
        }

        // Handle booking form submission
        function handleBooking(event) {
            event.preventDefault();
            
            const formData = {
                firstName: document.getElementById('firstName').value,
                lastName: document.getElementById('lastName').value,
                email: document.getElementById('email').value,
                treatment: document.getElementById('treatment').value,
                time: document.getElementById('time').value,
                message: document.getElementById('message').value
            };

            console.log('Booking Form Submitted:', formData);
            alert(`Thank you! Your appointment request has been submitted.\n\nWe'll contact you at ${formData.email} to confirm your booking.`);
            
            // Reset form
            event.target.reset();
        }

        // Initialize map when page loads
        document.addEventListener('DOMContentLoaded', function() {
            initializeMap();

            // Navbar fade on scroll
            const navbar = document.querySelector('.navbar-custom');
            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });

            // Date input restrictions - 3 days advance notice required
            const dateInput = document.getElementById('appointmentDate');
            if (dateInput) {
                const today = new Date();
                const minDate = new Date(today);
                minDate.setDate(today.getDate() + 3); // 3 days advance notice
                const minDateString = minDate.toISOString().split('T')[0];
                dateInput.min = minDateString;

                dateInput.addEventListener('change', function() {
                    const selectedDate = new Date(this.value + 'T00:00:00');
                    const today = new Date();
                    const threeDaysFromNow = new Date(today);
                    threeDaysFromNow.setDate(today.getDate() + 3);
                    
                    // Check if selected date is within the next 3 days
                    if (selectedDate < threeDaysFromNow) {
                        alert('âŒ Appointments require at least 3 days advance notice. Please select a date 3 or more days from today.');
                        this.value = '';
                        return;
                    }
                    
                    const day = selectedDate.getDay(); // 0=Sun, 1=Mon, ..., 6=Sat
                    if (day === 0 || day === 1) {
                        alert('Appointments are only available from Tuesday to Saturday. Please select a different date.');
                        this.value = '';
                    }
                });
            }
        });
    </script>
</body>
</html>

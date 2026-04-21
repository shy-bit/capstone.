<?php
// Handle contact form submission
$contactMessage = '';
$messageType = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'db.php';
    require_once 'mail_helper.php';
    
    $firstName = trim($_POST['firstName'] ?? '');
    $lastName = trim($_POST['lastName'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $message = trim($_POST['message'] ?? '');
    
    // Validate form inputs
    if (empty($firstName) || empty($lastName) || empty($email) || empty($phone) || empty($message)) {
        $contactMessage = 'Please fill in all fields.';
        $messageType = 'warning';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $contactMessage = 'Please enter a valid email address.';
        $messageType = 'warning';
    } else {
        // Save to database
        $stmt = $conn->prepare('INSERT INTO contact_messages (first_name, last_name, email, phone, message, created_at) VALUES (?, ?, ?, ?, ?, NOW())');
        $stmt->bind_param('sssss', $firstName, $lastName, $email, $phone, $message);
        
        if ($stmt->execute()) {
            $stmt->close();
            
            // Send email to admin
            $mailConfig = require 'mail_config.php';
            $adminEmail = $mailConfig['username'];
            
            $subject = "New Contact Form Submission from $firstName $lastName";
            
            $htmlMessage = "
            <html>
                <body>
                    <div style='font-family: Arial, sans-serif; color: #333;'>
                        <div style='background-color: #2d7560; color: white; padding: 20px; text-align: center; border-radius: 5px;'>
                            <h2>New Customer Message</h2>
                        </div>
                        <div style='padding: 30px;'>
                            <p><strong>Customer Information:</strong></p>
                            <ul style='list-style: none; padding: 0;'>
                                <li><strong>Name:</strong> " . htmlspecialchars($firstName . ' ' . $lastName, ENT_QUOTES, 'UTF-8') . "</li>
                                <li><strong>Email:</strong> " . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . "</li>
                                <li><strong>Phone:</strong> " . htmlspecialchars($phone, ENT_QUOTES, 'UTF-8') . "</li>
                            </ul>
                            
                            <p style='margin-top: 20px;'><strong>Message:</strong></p>
                            <div style='background-color: #f9f9f9; padding: 15px; border-left: 4px solid #2d7560; margin: 10px 0;'>
                                " . nl2br(htmlspecialchars($message, ENT_QUOTES, 'UTF-8')) . "
                            </div>
                            
                            <p style='margin-top: 20px;'>
                                <strong>Reply to:</strong> <a href='mailto:" . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . "'>" . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . "</a>
                            </p>
                            
                            <p style='color: #999; font-size: 12px; margin-top: 30px; border-top: 1px solid #ddd; padding-top: 20px;'>
                                This message was sent from the TOOTH IMPRESSION website contact form.
                            </p>
                        </div>
                    </div>
                </body>
            </html>";
            
            $sendResult = sendEmail($adminEmail, $subject, $htmlMessage);
            
            if ($sendResult['success']) {
                $contactMessage = 'Thank you! Your message has been sent successfully. We will get back to you soon.';
                $messageType = 'success';
                
                // Clear form data
                $_POST = array();
            } else {
                $contactMessage = 'Your message was received, but we had an issue sending the confirmation. We will still review it.';
                $messageType = 'info';
            }
        } else {
            $contactMessage = 'An error occurred. Please try again later.';
            $messageType = 'danger';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOOTH IMPRESSION Dau Branch - Contact Us</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        .navbar-custom.scrolled {
            background-color: rgba(45, 117, 96, 0.95) !important;
            box-shadow: 0 2px 20px rgba(0, 0, 0, 0.1) !important;
        }

        .contact-hero {
            background: linear-gradient(135deg, #9f453d 0%, #8e3f37 100%);
            color: #fff;
            text-align: center;
            padding: 92px 20px 78px;
            position: relative;
            overflow: hidden;
        }

        .contact-hero::before {
            content: "";
            position: absolute;
            inset: auto auto -120px -80px;
            width: 260px;
            height: 260px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 50%;
            filter: blur(10px);
        }

        .contact-hero::after {
            content: "";
            position: absolute;
            width: 220px;
            height: 220px;
            left: 50%;
            bottom: -95px;
            transform: translateX(-50%);
            background: url('image/logo.png') center/contain no-repeat;
            opacity: 0.13;
            pointer-events: none;
        }

        .hero-badge,
        .section-kicker,
        .contact-card-kicker {
            display: inline-flex;
            align-items: center;
            gap: 0.45rem;
            border-radius: 999px;
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 0.02em;
        }

        .hero-badge {
            background: rgba(255, 255, 255, 0.14);
            border: 1px solid rgba(255, 255, 255, 0.18);
            color: #fff;
            padding: 0.45rem 0.95rem;
            margin-bottom: 1rem;
        }

        .contact-hero h1 {
            margin: 0;
            font-size: clamp(2.4rem, 4.8vw, 4rem);
            font-weight: 700;
        }

        .contact-hero p {
            max-width: 700px;
            margin: 0.9rem auto 0;
            color: rgba(255, 255, 255, 0.88);
            font-size: 1rem;
            line-height: 1.8;
        }

        .contact-main {
            background: linear-gradient(180deg, #f6f4f3 0%, #ffffff 100%);
            padding: 34px 20px 88px;
        }

        .contact-rating-wrap {
            background: #fff;
            border: 1px solid #ece3e1;
            border-radius: 22px;
            padding: 1.4rem 1.2rem 1.2rem;
            box-shadow: 0 18px 38px rgba(0, 0, 0, 0.05);
            margin-top: -18px;
            position: relative;
            z-index: 2;
        }

        .section-kicker,
        .contact-card-kicker {
            background: #f8ece9;
            color: #a6473c;
            padding: 0.42rem 0.82rem;
            margin-bottom: 0.75rem;
        }

        .contact-rating-header h2 {
            font-size: clamp(1.35rem, 2.2vw, 2rem);
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 0.55rem;
        }

        .contact-rating-header p {
            color: #666;
            max-width: 700px;
            margin: 0 auto 1.5rem;
        }

        .contact-score-card {
            text-align: center;
            background: #faf7f6;
            border: 1px solid #efe5e3;
            border-radius: 16px;
            padding: 1rem 0.75rem;
            height: 100%;
            box-shadow: 0 10px 22px rgba(0, 0, 0, 0.03);
        }

        .contact-score-top {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.35rem;
            margin-bottom: 0.25rem;
        }

        .contact-score-value {
            font-size: 2rem;
            font-weight: 700;
            color: #1b1b1b;
            line-height: 1;
        }

        .contact-score-stars {
            color: #b24e42;
            font-size: 0.82rem;
        }

        .contact-score-label {
            display: block;
            color: #7b7b7b;
            font-size: 0.92rem;
        }

        .contact-shell {
            margin-top: 2rem;
        }

        .contact-form-card {
            max-width: none;
            margin: 0;
            background: #fff;
            border: 1px solid #ece3e1;
            border-radius: 20px;
            padding: 1.4rem;
            box-shadow: 0 18px 38px rgba(0, 0, 0, 0.05);
            height: 100%;
        }

        .contact-form-card h3,
        .contact-side-card h3 {
            font-size: 1.4rem;
            font-weight: 700;
            color: #171717;
            margin-bottom: 0.35rem;
        }

        .contact-form-card p,
        .contact-side-card > p {
            color: #6d6d6d;
            line-height: 1.75;
        }

        .contact-form-card label {
            display: block;
            font-size: 0.84rem;
            font-weight: 600;
            color: #444;
            margin-bottom: 0.4rem;
        }

        .contact-form-card .form-control {
            background: #fcfbfb;
            border: 1px solid #ddd9d7;
            font-size: 0.92rem;
            padding: 0.78rem 0.9rem;
            border-radius: 10px;
            box-shadow: none;
        }

        .contact-form-card .form-control:focus {
            border-color: #b24e42;
            box-shadow: 0 0 0 0.15rem rgba(178, 78, 66, 0.12);
        }

        .contact-submit-btn {
            width: 100%;
            border: none;
            border-radius: 999px;
            background: linear-gradient(135deg, #a6473c, #8f3d35);
            color: #fff;
            padding: 0.85rem 1rem;
            font-size: 0.92rem;
            font-weight: 700;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .contact-submit-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 10px 24px rgba(166, 71, 60, 0.22);
        }

        .contact-side-card {
            background: linear-gradient(180deg, #fff 0%, #f8f5f4 100%);
            border: 1px solid #ece3e1;
            border-radius: 20px;
            padding: 1.4rem;
            box-shadow: 0 18px 38px rgba(0, 0, 0, 0.05);
            height: 100%;
        }

        .contact-quick-list {
            list-style: none;
            padding: 0;
            margin: 1rem 0 0;
        }

        .contact-quick-list li {
            display: flex;
            align-items: flex-start;
            gap: 0.85rem;
            padding: 0.9rem 0;
            border-bottom: 1px solid #eee8e6;
        }

        .contact-quick-list li:last-child {
            border-bottom: none;
        }

        .contact-icon {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: rgba(166, 71, 60, 0.1);
            color: #a6473c;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 0.95rem;
        }

        .contact-quick-list strong {
            display: block;
            font-size: 0.95rem;
            color: #1e1e1e;
            margin-bottom: 0.1rem;
        }

        .contact-quick-list span {
            color: #666;
            font-size: 0.92rem;
            line-height: 1.7;
        }

        .contact-side-note {
            margin-top: 1rem;
            background: #eef7f3;
            color: #2d7560;
            border-radius: 14px;
            padding: 0.9rem 1rem;
            font-size: 0.92rem;
            line-height: 1.7;
        }

        .faq-section {
            padding-top: 3.25rem;
        }

        .faq-heading {
            max-width: 720px;
            margin: 0 auto 2rem;
            text-align: center;
        }

        .faq-heading h2 {
            font-size: clamp(2rem, 3vw, 3rem);
            font-weight: 700;
            color: #171717;
            margin-bottom: 0.65rem;
        }

        .faq-heading p {
            color: #767676;
            margin: 0;
            line-height: 1.8;
        }

        .faq-accordion {
            max-width: 960px;
            margin: 0 auto;
        }

        .faq-accordion .accordion-item {
            border: 1px solid #ebe2df;
            border-radius: 14px !important;
            overflow: hidden;
            margin-bottom: 0.9rem;
            background: #fff;
            box-shadow: 0 10px 22px rgba(0, 0, 0, 0.03);
        }

        .faq-accordion .accordion-button {
            background: #fff;
            color: #1d1d1d;
            font-weight: 600;
            box-shadow: none;
            padding: 1rem 1.1rem;
        }

        .faq-accordion .accordion-button:not(.collapsed) {
            background: #fcf7f5;
            color: #a6473c;
        }

        .faq-accordion .accordion-body {
            color: #666;
            line-height: 1.8;
            background: #fff;
        }

        @media (max-width: 991.98px) {
            .contact-main {
                padding: 26px 16px 72px;
            }

            .contact-rating-wrap {
                margin-top: 0;
            }
        }

        @media (max-width: 767.98px) {
            .contact-hero {
                padding: 76px 16px 64px;
            }

            .contact-form-card,
            .contact-side-card,
            .contact-rating-wrap {
                padding: 1rem;
            }

            .contact-score-value {
                font-size: 1.6rem;
            }
        }
    </style>
</head>
<body>
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
                                        <li><a class="dropdown-item py-2" href="doctor.php">Doctor</a></li>
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

    <section class="contact-hero">
        <div class="container">
            <span class="hero-badge"><i class="fas fa-comments"></i> Reach our dental team</span>
            <h1>Contact Us</h1>
            <p>Book an appointment, ask about treatments, or connect with Tooth Impression Dau Branch in Dau, Mabalacat, Pampanga.</p>
        </div>
    </section>

    <main class="contact-main" id="contact">
        <div class="container">
            <div class="contact-rating-wrap">
                <div class="contact-rating-header text-center">
                    <span class="section-kicker">Trusted Dental Support</span>
                    <h2>Chosen by patients and families across Dau, Mabalacat</h2>
                    <p>Helping every patient achieve a healthier smile with friendly care, clear guidance, and reliable treatment.</p>
                </div>

                <div class="row justify-content-center g-3">
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="contact-score-card">
                            <div class="contact-score-top">
                                <span class="contact-score-value">4.9</span>
                                <span class="contact-score-stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span>
                            </div>
                            <span class="contact-score-label">Patient Rating</span>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="contact-score-card">
                            <div class="contact-score-top">
                                <span class="contact-score-value">4.8</span>
                                <span class="contact-score-stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span>
                            </div>
                            <span class="contact-score-label">Service Quality</span>
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="contact-score-card">
                            <div class="contact-score-top">
                                <span class="contact-score-value">4.7</span>
                                <span class="contact-score-stars"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span>
                            </div>
                            <span class="contact-score-label">Clinic Experience</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4 contact-shell align-items-stretch">
                <div class="col-lg-7">
                    <div class="contact-form-card">
                        <span class="contact-card-kicker">Send us a message</span>
                        <h3>We'd love to hear from you</h3>
                        <p>Tell us how we can help and our Tooth Impression Dau Branch team will get back to you as soon as possible.</p>

                        <?php if (!empty($contactMessage)): ?>
                            <div class="alert alert-<?= htmlspecialchars($messageType, ENT_QUOTES, 'UTF-8') ?> alert-dismissible fade show mt-3" role="alert">
                                <i class="fas fa-<?= $messageType === 'success' ? 'check-circle' : ($messageType === 'warning' ? 'exclamation-triangle' : 'info-circle') ?>"></i>
                                <?= htmlspecialchars($contactMessage, ENT_QUOTES, 'UTF-8') ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?>

                        <form method="POST" action="contact.php">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="firstName">First Name</label>
                                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First name" value="<?= htmlspecialchars($_POST['firstName'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="lastName">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last name" value="<?= htmlspecialchars($_POST['lastName'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" value="<?= htmlspecialchars($_POST['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="phone">Phone Number</label>
                                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone number" value="<?= htmlspecialchars($_POST['phone'] ?? '', ENT_QUOTES, 'UTF-8') ?>" required>
                                </div>
                                <div class="col-12">
                                    <label for="message">Message</label>
                                    <textarea class="form-control" id="message" name="message" rows="5" placeholder="Type your message here" required><?= htmlspecialchars($_POST['message'] ?? '', ENT_QUOTES, 'UTF-8') ?></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="contact-submit-btn">Message Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="contact-side-card">
                        <span class="contact-card-kicker">Visit the clinic</span>
                        <h3>Contact details</h3>
                        <p class="mb-0">Reach us directly for appointments, treatment questions, and friendly assistance from our Dau Branch team.</p>

                        <ul class="contact-quick-list">
                            <li>
                                <span class="contact-icon"><i class="fas fa-map-marker-alt"></i></span>
                                <div>
                                    <strong>Address</strong>
                                    <span>Dau, Mabalacat, Pampanga, Philippines</span>
                                </div>
                            </li>
                            <li>
                                <span class="contact-icon"><i class="fas fa-phone-alt"></i></span>
                                <div>
                                    <strong>Phone</strong>
                                    <span>(045) 123-4567</span>
                                </div>
                            </li>
                            <li>
                                <span class="contact-icon"><i class="fas fa-envelope"></i></span>
                                <div>
                                    <strong>Email</strong>
                                    <span>contact@toothimpressiondau.com</span>
                                </div>
                            </li>
                            <li>
                                <span class="contact-icon"><i class="fas fa-clock"></i></span>
                                <div>
                                    <strong>Clinic Hours</strong>
                                    <span>Monday - Saturday, 9:00 AM - 6:00 PM</span>
                                </div>
                            </li>
                        </ul>

                        <div class="contact-side-note">
                            <i class="fas fa-check-circle me-2"></i>
                            We accept most major dental insurance plans and also assist patients with booking and benefit questions.
                        </div>
                    </div>
                </div>
            </div>

            <section class="faq-section">
                <div class="faq-heading">
                    <span class="section-kicker">Helpful Answers</span>
                    <h2>Do You Accept My Insurance Plan?</h2>
                    <p>Yes, we accept most major dental insurance plans and are happy to help you make the most of your benefits.</p>
                </div>

                <div class="accordion faq-accordion" id="contactFaq">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqOneHeading">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqOne" aria-expanded="true" aria-controls="faqOne">
                                What should I expect during my first visit?
                            </button>
                        </h2>
                        <div id="faqOne" class="accordion-collapse collapse show" aria-labelledby="faqOneHeading" data-bs-parent="#contactFaq">
                            <div class="accordion-body">
                                Your first visit includes a consultation, oral examination, and discussion of your concerns so we can recommend the best treatment plan for your smile.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqTwoHeading">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqTwo" aria-expanded="false" aria-controls="faqTwo">
                                How often should I see a dentist?
                            </button>
                        </h2>
                        <div id="faqTwo" class="accordion-collapse collapse" aria-labelledby="faqTwoHeading" data-bs-parent="#contactFaq">
                            <div class="accordion-body">
                                We recommend visiting every six months for a check-up and cleaning, or more often if your treatment plan requires closer care.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqThreeHeading">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqThree" aria-expanded="false" aria-controls="faqThree">
                                Do you accept dental insurance?
                            </button>
                        </h2>
                        <div id="faqThree" class="accordion-collapse collapse" aria-labelledby="faqThreeHeading" data-bs-parent="#contactFaq">
                            <div class="accordion-body">
                                Yes. Tooth Impression Dau Branch accepts many dental insurance plans, and our staff can assist you with benefit inquiries.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqFourHeading">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqFour" aria-expanded="false" aria-controls="faqFour">
                                What types of services do you offer?
                            </button>
                        </h2>
                        <div id="faqFour" class="accordion-collapse collapse" aria-labelledby="faqFourHeading" data-bs-parent="#contactFaq">
                            <div class="accordion-body">
                                We offer preventive, restorative, cosmetic, orthodontic, and emergency dental services for children, adults, and families.
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqFiveHeading">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqFive" aria-expanded="false" aria-controls="faqFive">
                                How can I maintain my oral health at home?
                            </button>
                        </h2>
                        <div id="faqFive" class="accordion-collapse collapse" aria-labelledby="faqFiveHeading" data-bs-parent="#contactFaq">
                            <div class="accordion-body">
                                Brush twice daily, floss every day, avoid excessive sugary foods, and schedule regular dental visits to keep your smile healthy.
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js"></script>
    <script>
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar-custom');
            if (!navbar) {
                return;
            }

            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    </script>
</body>
</html>

<?php
require_once 'db.php';

$posts = [];
$result = $conn->query("SELECT * FROM blog_posts WHERE status='published' ORDER BY published_at DESC");
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $posts[] = $row;
    }
}

$fallbackPosts = [
    [
        'title' => 'Dental Cleaning Tips for Better Oral Health',
        'slug' => 'dental-cleaning-tips',
        'excerpt' => 'Learn the best daily habits to keep your teeth bright and prevent plaque build-up.',
        'image' => 'image/dental-cleaning.jpg',
        'author' => 'TOOTH IMPRESSION Team',
        'published_at' => date('Y-m-d H:i:s', strtotime('-3 days')),
    ],
    [
        'title' => 'How Tooth Impressions Improve Treatment Accuracy',
        'slug' => 'how-tooth-impressions-improve-accuracy',
        'excerpt' => 'Discover why precise impressions are essential for comfortable crowns, bridges, and dentures.',
        'image' => 'image/tooth-impression.jpg',
        'author' => 'Dr. Maria Santos',
        'published_at' => date('Y-m-d H:i:s', strtotime('-4 days')),
    ],
    [
        'title' => 'Preparing for a Dental Appointment at Dau Branch',
        'slug' => 'preparing-for-dental-appointment',
        'excerpt' => 'Find out what to bring and how to prepare for a smooth first visit to our clinic.',
        'image' => 'image/dental-visit.jpg',
        'author' => 'TOOTH IMPRESSION Team',
        'published_at' => date('Y-m-d H:i:s', strtotime('-5 days')),
    ],
    [
        'title' => 'How to Keep Your Smile Fresh Between Visits',
        'slug' => 'keep-smile-fresh-between-visits',
        'excerpt' => 'Simple daily steps to keep your enamel healthy and your smile bright until your next clinic appointment.',
        'image' => 'image/smile-care.jpg',
        'author' => 'TOOTH IMPRESSION Team',
        'published_at' => date('Y-m-d H:i:s', strtotime('-1 days')),
    ],
];

$displayPosts = $posts;
if (count($displayPosts) < 7) {
    foreach ($fallbackPosts as $fallback) {
        $displayPosts[] = $fallback;
        if (count($displayPosts) >= 7) {
            break;
        }
    }
}

function esc($value) {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dental Blog - TOOTH IMPRESSION Dau Branch</title>

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
        .blog-hero {
            background: linear-gradient(135deg, rgba(45,117,96,0.95), rgba(28,77,61,0.95));
            color: white;
            border-radius: 1rem;
            padding: 4rem 2rem;
            position: relative;
            overflow: hidden;
        }
        .blog-hero::after {
            content: '';
            position: absolute;
            inset: 0;
            background: rgba(0,0,0,0.25);
            mix-blend-mode: multiply;
        }
        .blog-hero .hero-content {
            position: relative;
            z-index: 1;
        }
        .blog-card {
            border: none;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }
        .blog-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 25px 55px rgba(0, 0, 0, 0.12);
        }
        .blog-card img {
            object-fit: cover;
            height: 260px;
        }
        .tag-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.35rem;
            background: rgba(45,117,96,0.12);
            color: #2d7560;
            border-radius: 999px;
            padding: 0.35rem 0.9rem;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 0.85rem;
        }
        .sidebar-box {
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0,0,0,0.08);
        }
        .sidebar-box .card-body {
            padding: 1.5rem;
        }
        .sidebar-box a {
            color: #2d7560;
        }
        .sidebar-box a:hover {
            color: #1f513d;
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
                        <a class="nav-link dropdown-toggle" href="#" id="allPagesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            ALL PAGES
                        </a>
                        <ul class="dropdown-menu dropdown-menu-multi-column" aria-labelledby="allPagesDropdown" style="width: 500px; padding: 20px;">
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

    <section class="py-5 blog-hero mb-5">
        <div class="container hero-content">
            <div class="row">
                <div class="col-lg-8">
                    <span class="badge bg-light text-success px-3 py-2 mb-3">Clinic Blog</span>
                    <h1 class="display-5 fw-bold">Dental Care, Tooth Impressions, and Smile Wellness</h1>
                    <p class="lead text-white-75">Explore expert tips from TOOTH IMPRESSION Dau Branch about dental impressions, restorative planning, smile maintenance, and patient comfort.</p>
                    <div class="d-flex flex-wrap gap-3 mt-4">
                        <a href="booking.php" class="btn btn-light btn-lg text-success">Book Appointment</a>
                        <a href="contact.php" class="btn btn-outline-light btn-lg">Contact the Clinic</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <main class="container pb-5">
        <div class="row gy-4">
            <div class="col-lg-8">
                <div class="mb-5">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <span class="tag-badge"><i class="fas fa-tooth"></i> Tooth Impression Insights</span>
                        <span class="tag-badge"><i class="fas fa-heartbeat"></i> Patient Care Tips</span>
                    </div>
                    <h2 class="h3 mb-3">What you’ll discover in our clinic blog</h2>
                    <p class="text-muted">From dental impression best practices to gentle treatment advice, this blog is built for Dau branch patients who want clear, practical care information.</p>
                    <ul class="list-unstyled text-muted fw-semibold">
                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>How impressions help fit crowns, bridges, and dentures.</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Steps you can take before and after a dental appointment.</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Updates on advanced treatments available at TOOTH IMPRESSION Dau Branch.</li>
                    </ul>
                </div>

                <section id="latest-articles">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h3 class="mb-1">Latest Articles</h3>
                            <p class="text-muted mb-0">Read the newest dental care posts straight from the clinic.</p>
                        </div>
                        <span class="badge bg-success py-2 px-3">Updated Daily</span>
                    </div>

                    <div class="row g-4">
                        <?php if (count($displayPosts) > 0): ?>
                            <?php foreach ($displayPosts as $post): ?>
                                <div class="col-md-6">
                                    <div class="card blog-card h-100">
                                        <?php if (!empty($post['image'])): ?>
                                            <img src="<?= esc($post['image']) ?>" class="card-img-top" alt="<?= esc($post['title']) ?>">
                                        <?php else: ?>
                                            <img src="image/logo.png" class="card-img-top" alt="TOOTH IMPRESSION">
                                        <?php endif; ?>
                                        <div class="card-body d-flex flex-column">
                                            <small class="text-muted mb-2"><?= esc(date('M j, Y', strtotime($post['published_at']))) ?> • <?= esc($post['author']) ?></small>
                                            <h5 class="card-title"><?= esc($post['title']) ?></h5>
                                            <p class="card-text text-muted mb-4"><?= esc($post['excerpt'] ?: substr(strip_tags($post['content'] ?? ''), 0, 120) . '...') ?></p>
                                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                                <a href="blog-details.php?slug=<?= urlencode($post['slug'] ?? '') ?>" class="btn btn-success btn-sm">Read More</a>
                                                <span class="text-success small fst-italic">TOOTH IMPRESSION</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <div class="col-12">
                                <div class="alert alert-info">No blog posts are published yet. Please check back soon for dental news and tooth impression updates.</div>
                            </div>
                        <?php endif; ?>
                    </div>
                </section>
            </div>

            <aside class="col-lg-4">
                <div class="card sidebar-box mb-4">
                    <div class="card-body">
                        <h5 class="card-title">About This Blog</h5>
                        <p class="text-muted">This blog is the Dau branch source for practical dental care guidance, procedure details, and comfortable treatment planning.</p>
                        <ul class="list-unstyled text-muted small">
                            <li class="mb-2"><i class="fas fa-chevron-right text-success me-2"></i>Tooth impressions and appliance fitting</li>
                            <li class="mb-2"><i class="fas fa-chevron-right text-success me-2"></i>Oral hygiene and prevention advice</li>
                            <li class="mb-2"><i class="fas fa-chevron-right text-success me-2"></i>Updates on clinic services and new treatments</li>
                        </ul>
                    </div>
                </div>

                <div class="card sidebar-box">
                    <div class="card-body text-center">
                        <h5 class="card-title">Need a Consultation?</h5>
                        <p class="text-muted">Book a visit with our dental team and get professional advice for your next smile treatment.</p>
                        <a href="booking.php" class="btn btn-success">Book Appointment</a>
                    </div>
                </div>
            </aside>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

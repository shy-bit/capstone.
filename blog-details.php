<?php
require_once 'db.php';

$slug = isset($_GET['slug']) ? trim($_GET['slug']) : '';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$fallbackPosts = [
    [
        'title' => 'Dental Cleaning Tips for Better Oral Health',
        'slug' => 'dental-cleaning-tips',
        'excerpt' => 'Learn the best daily habits to keep your teeth bright and prevent plaque build-up.',
        'image' => 'image/dental-cleaning.jpg',
        'author' => 'TOOTH IMPRESSION Team',
        'published_at' => date('Y-m-d H:i:s', strtotime('-3 days')),
        'content' => "A healthy smile starts with consistent at-home care. Brush gently twice a day, floss between teeth, and choose mouthwash that supports your enamel. Regular cleanings at TOOTH IMPRESSION help prevent cavities and keep your gums strong.",
    ],
    [
        'title' => 'How Tooth Impressions Improve Treatment Accuracy',
        'slug' => 'how-tooth-impressions-improve-accuracy',
        'excerpt' => 'Discover why precise impressions are essential for comfortable crowns, bridges, and dentures.',
        'image' => 'image/tooth-impression.jpg',
        'author' => 'Dr. Maria Santos',
        'published_at' => date('Y-m-d H:i:s', strtotime('-4 days')),
        'content' => "Precise impressions are the foundation for restorations that fit well and feel natural. At our Dau branch, we use careful impression techniques to ensure crowns, bridges, and dentures are built with minimal adjustment and maximum comfort.",
    ],
    [
        'title' => 'Preparing for a Dental Appointment at Dau Branch',
        'slug' => 'preparing-for-dental-appointment',
        'excerpt' => 'Find out what to bring and how to prepare for a smooth first visit to our clinic.',
        'image' => 'image/dental-visit.jpg',
        'author' => 'TOOTH IMPRESSION Team',
        'published_at' => date('Y-m-d H:i:s', strtotime('-5 days')),
        'content' => "To make the most of your visit, bring any recent dental records and arrive a few minutes early to complete intake forms. Our staff will review your history, answer questions, and discuss impression-based treatment plans tailored to your smile.",
    ],
    [
        'title' => 'How to Keep Your Smile Fresh Between Visits',
        'slug' => 'keep-smile-fresh-between-visits',
        'excerpt' => 'Simple daily steps to keep your enamel healthy and your smile bright until your next clinic appointment.',
        'image' => 'image/smile-care.jpg',
        'author' => 'TOOTH IMPRESSION Team',
        'published_at' => date('Y-m-d H:i:s', strtotime('-1 days')),
        'content' => "Maintain a bright smile by staying hydrated, avoiding sugary snacks, and rinsing after acidic foods. These small habits help protect your enamel and keep your next impression appointment comfortable and effective.",
    ],
];

if (empty($slug) && $id <= 0) {
    header('Location: blog.php');
    exit;
}

$post = null;
if (!empty($slug)) {
    $stmt = $conn->prepare("SELECT * FROM blog_posts WHERE slug = ? AND status = 'published' LIMIT 1");
    $stmt->bind_param('s', $slug);
    $stmt->execute();
    $result = $stmt->get_result();
    $post = $result->fetch_assoc();
    $stmt->close();

    if (!$post) {
        foreach ($fallbackPosts as $fallback) {
            if ($fallback['slug'] === $slug) {
                $post = $fallback;
                break;
            }
        }
    }
}

if (!$post && $id > 0) {
    $stmt = $conn->prepare("SELECT * FROM blog_posts WHERE id = ? AND status = 'published' LIMIT 1");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $post = $result->fetch_assoc();
    $stmt->close();
}

if (!$post) {
    header('Location: blog.php');
    exit;
}

$related = [];
if (!empty($post['id'])) {
    $stmt = $conn->prepare("SELECT id, title, slug, excerpt, content, image FROM blog_posts WHERE status = 'published' AND id != ? ORDER BY published_at DESC LIMIT 3");
    $stmt->bind_param('i', $post['id']);
} else {
    $stmt = $conn->prepare("SELECT id, title, slug, excerpt, content, image FROM blog_posts WHERE status = 'published' ORDER BY published_at DESC LIMIT 3");
}
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $related[] = $row;
}
$stmt->close();

function esc($value) {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= esc($post['title']) ?> - TOOTH IMPRESSION Dau Branch</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        .navbar-custom.scrolled {
            background-color: rgba(45, 117, 96, 0.95) !important;
            box-shadow: 0 2px 20px rgba(0,0,0,0.1) !important;
        }
        .post-image {
            width: 100%;
            max-height: 520px;
            object-fit: cover;
            border-radius: 1rem;
        }
        .article-meta {
            font-size: 0.95rem;
            color: #6c757d;
        }
        .post-section {
            gap: 30px;
        }
        .content-card {
            border: none;
            box-shadow: 0 20px 50px rgba(0,0,0,0.08);
            border-radius: 1rem;
        }
        .related-card {
            border-radius: 1rem;
            overflow: hidden;
            transition: transform 0.2s ease;
        }
        .related-card:hover {
            transform: translateY(-4px);
        }
        .related-card img {
            height: 120px;
            object-fit: cover;
        }
        .post-highlight {
            background: #f2fcf5;
            border-left: 4px solid #2d7560;
            padding: 1.15rem 1.25rem;
            border-radius: 0.8rem;
            margin-bottom: 1.75rem;
        }
        .blog-sidebar {
            position: sticky;
            top: 100px;
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
                                        <li><a class="dropdown-item py-2" href="#reviews">Reviews</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <ul class="list-unstyled">
                                        <li><a class="dropdown-item py-2" href="blog.php">Blog</a></li>
                                        <li><a class="dropdown-item py-2" href="blog.php#latest-articles">Blog Articles</a></li>
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

    <section class="py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <small class="text-uppercase text-success fw-bold">Clinic Blog Post</small>
                    <h1 class="display-5 fw-bold mt-2"><?= esc($post['title']) ?></h1>
                    <p class="article-meta mb-0">Published on <?= esc(date('F j, Y', strtotime($post['published_at']))) ?> &middot; <?= esc($post['author']) ?> &middot; TOOTH IMPRESSION Dau Branch</p>
                </div>
                <div class="col-lg-4 text-lg-end mt-4 mt-lg-0">
                    <a href="blog.php" class="btn btn-outline-success btn-lg"><i class="fas fa-arrow-left me-2"></i>Back to Blog</a>
                </div>
            </div>
        </div>
    </section>

    <main class="container py-5">
        <div class="row post-section">
            <div class="col-lg-8">
                <?php if (!empty($post['image'])): ?>
                    <img src="<?= esc($post['image']) ?>" alt="<?= esc($post['title']) ?>" class="post-image mb-4">
                <?php endif; ?>

                <div class="card content-card mb-4">
                    <div class="card-body p-4">
                        <div class="post-highlight mb-4">
                            <strong>Why this matters:</strong>
                            <p class="mb-0">Tooth impressions are the first step to creating precise restorations, comfortable oral appliances, and long-lasting smile solutions at our Dau branch.</p>
                        </div>
                        <p class="lead mb-4"><?= esc($post['excerpt']) ?></p>
                        <div class="mb-4"> <?= nl2br(esc($post['content'])) ?> </div>
                        <h5 class="mt-5">Key takeaways for your next dental visit</h5>
                        <ul class="list-unstyled text-muted">
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Accurate impressions improve fit and comfort for crowns, bridges, and implants.</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Bring your dental history and ask questions about impression materials.</li>
                            <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Our team at TOOTH IMPRESSION Dau Branch uses proven techniques to protect your smile outcome.</li>
                        </ul>
                    </div>
                </div>

                <div class="card content-card p-4 bg-light">
                    <h5>More on comfortable dental care</h5>
                    <p class="mb-0 text-muted">Every blog article is written to help patients understand their treatment, reduce anxiety, and prepare for appointments with confidence.</p>
                </div>
            </div>

            <aside class="col-lg-4 blog-sidebar">
                <div class="card content-card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Clinic Focus</h5>
                        <p class="text-muted">Learn how the Dau branch applies modern techniques and personal care during every impression and restoration appointment.</p>
                        <a href="booking.php" class="btn btn-success w-100">Schedule a Visit</a>
                    </div>
                </div>

                <div class="card content-card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Related Articles</h5>
                        <?php if (count($related) > 0): ?>
                            <?php foreach ($related as $item): ?>
                                <a href="blog-details.php?slug=<?= urlencode($item['slug']) ?>" class="text-decoration-none text-dark d-block mb-3">
                                    <div class="card related-card overflow-hidden">
                                        <?php if (!empty($item['image'])): ?>
                                            <img src="<?= esc($item['image']) ?>" class="w-100" alt="<?= esc($item['title']) ?>">
                                        <?php endif; ?>
                                        <div class="p-3">
                                            <h6 class="mb-1"><?= esc($item['title']) ?></h6>
                                            <p class="small text-muted mb-0"><?= esc($item['excerpt'] ?: substr(strip_tags($item['content']), 0, 80) . '...') ?></p>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p class="text-muted mb-0">No other posts available yet.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </aside>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

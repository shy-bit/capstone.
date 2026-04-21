<?php
require_once __DIR__ . '/../auth.php';
require_once __DIR__ . '/../db.php';

if (!$adminLoggedIn) {
    header('Location: login.php');
    exit;
}

$message = '';
$messageType = '';

function slugify($text) {
    $text = preg_replace('/[^\p{L}\p{N}]+/u', '-', mb_strtolower(trim($text), 'UTF-8'));
    return trim($text, '-');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    $title = trim($_POST['title'] ?? '');
    $slug = trim($_POST['slug'] ?? '');
    $excerpt = trim($_POST['excerpt'] ?? '');
    $content = trim($_POST['content'] ?? '');
    $image = trim($_POST['image'] ?? '');
    $author = trim($_POST['author'] ?? 'TOOTH IMPRESSION Dau Branch');
    $category = trim($_POST['category'] ?? 'General');
    $allowedCategories = ['General', 'Tooth Impressions', 'Preventive Care', 'Cosmetic Dentistry'];
    if (!in_array($category, $allowedCategories, true)) {
        $category = 'General';
    }
    $status = in_array($_POST['status'] ?? 'published', ['published', 'draft']) ? $_POST['status'] : 'published';
    $publishedAt = trim($_POST['published_at'] ?? date('Y-m-d H:i:s'));

    if (!$title) {
        $message = 'A title is required for the blog post.';
        $messageType = 'danger';
    } else {
        if (empty($slug)) {
            $slug = slugify($title);
        }

        if ($action === 'add') {
            $stmt = $conn->prepare("INSERT INTO blog_posts (title, slug, excerpt, content, image, author, category, status, published_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param('sssssssss', $title, $slug, $excerpt, $content, $image, $author, $category, $status, $publishedAt);
        } elseif ($action === 'update') {
            $postId = intval($_POST['post_id'] ?? 0);
            $stmt = $conn->prepare("UPDATE blog_posts SET title = ?, slug = ?, excerpt = ?, content = ?, image = ?, author = ?, category = ?, status = ?, published_at = ? WHERE id = ?");
            $stmt->bind_param('sssssssisi', $title, $slug, $excerpt, $content, $image, $author, $category, $status, $publishedAt, $postId);
        }

        if (isset($stmt)) {
            if ($stmt->execute()) {
                $message = $action === 'add' ? 'Blog post added successfully.' : 'Blog post updated successfully.';
                $messageType = 'success';
            } else {
                $message = 'Error saving blog post: ' . $conn->error;
                $messageType = 'danger';
            }
            $stmt->close();
        }
    }
}

if (isset($_GET['delete']) && intval($_GET['delete'])) {
    $postId = intval($_GET['delete']);
    $stmt = $conn->prepare("DELETE FROM blog_posts WHERE id = ?");
    $stmt->bind_param('i', $postId);
    if ($stmt->execute()) {
        $message = 'Blog post deleted successfully.';
        $messageType = 'success';
    } else {
        $message = 'Error deleting blog post: ' . $conn->error;
        $messageType = 'danger';
    }
    $stmt->close();
}

$editPost = null;
if (isset($_GET['edit']) && intval($_GET['edit'])) {
    $postId = intval($_GET['edit']);
    $stmt = $conn->prepare("SELECT * FROM blog_posts WHERE id = ?");
    $stmt->bind_param('i', $postId);
    $stmt->execute();
    $result = $stmt->get_result();
    $editPost = $result->fetch_assoc();
    $stmt->close();
}

$posts = [];
$result = $conn->query("SELECT * FROM blog_posts ORDER BY published_at DESC");
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $posts[] = $row;
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
    <title>Admin - Manage Blog Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { background: #f4f6f8; }
        .navbar-custom { background-color: #2d7560 !important; }
        .navbar-custom .nav-link, .navbar-custom .navbar-brand { color: white !important; }
        .card { border-radius: 1rem; }
        .form-label { font-weight: 600; }
        .table thead { background-color: #2d7560; color: white; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom mb-4">
        <div class="container-fluid">
            <a class="navbar-brand" href="admin.php">TOOTH IMPRESSION Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="adminNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="admin.php">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="blog.php">Blog Posts</a></li>
                    <li class="nav-item"><a class="nav-link" href="services.php">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <?php if ($message): ?>
            <div class="alert alert-<?= esc($messageType) ?>"><?= esc($message) ?></div>
        <?php endif; ?>

        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h2 class="card-title mb-4"><?= $editPost ? 'Edit Blog Post' : 'Add New Blog Post' ?></h2>
                <form method="post">
                    <input type="hidden" name="action" value="<?= $editPost ? 'update' : 'add' ?>">
                    <?php if ($editPost): ?>
                        <input type="hidden" name="post_id" value="<?= esc($editPost['id']) ?>">
                    <?php endif; ?>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label" for="title">Title</label>
                            <input class="form-control" type="text" id="title" name="title" value="<?= esc($editPost['title'] ?? '') ?>" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="slug">Slug</label>
                            <input class="form-control" type="text" id="slug" name="slug" value="<?= esc($editPost['slug'] ?? '') ?>" placeholder="leave blank to auto-generate">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="author">Author</label>
                            <input class="form-control" type="text" id="author" name="author" value="<?= esc($editPost['author'] ?? 'TOOTH IMPRESSION Dau Branch') ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="published_at">Published Date</label>
                            <input class="form-control" type="datetime-local" id="published_at" name="published_at" value="<?= esc(!empty($editPost['published_at']) ? date('Y-m-d\TH:i', strtotime($editPost['published_at'])) : date('Y-m-d\TH:i')) ?>">
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="excerpt">Excerpt</label>
                            <textarea class="form-control" id="excerpt" name="excerpt" rows="3"><?= esc($editPost['excerpt'] ?? '') ?></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="content">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="6" required><?= esc($editPost['content'] ?? '') ?></textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="image">Image URL</label>
                            <input class="form-control" type="text" id="image" name="image" value="<?= esc($editPost['image'] ?? '') ?>">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="category">Category</label>
                            <select class="form-select" id="category" name="category">
                                <?php $categoryOptions = ['General','Tooth Impressions','Preventive Care','Cosmetic Dentistry']; ?>
                                <?php foreach ($categoryOptions as $option): ?>
                                    <option value="<?= esc($option) ?>" <?= (!empty($editPost['category']) && $editPost['category'] === $option) ? 'selected' : '' ?>><?= esc($option) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="status">Status</label>
                            <select class="form-select" id="status" name="status">
                                <option value="published" <?= (!empty($editPost['status']) && $editPost['status'] === 'published') ? 'selected' : '' ?>>Published</option>
                                <option value="draft" <?= (!empty($editPost['status']) && $editPost['status'] === 'draft') ? 'selected' : '' ?>>Draft</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button class="btn btn-success" type="submit"><?= $editPost ? 'Save Changes' : 'Add Post' ?></button>
                        <?php if ($editPost): ?>
                            <a class="btn btn-secondary ms-2" href="blog.php">Cancel</a>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="card-title mb-4">Published Blog Posts</h2>
                <?php if (count($posts) > 0): ?>
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                <th>Category</th>
                                <th>Author</th>
                                <th>Status</th>
                                <th>Publish Date</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($posts as $post): ?>
                                    <tr>
                                        <td><?= esc($post['id']) ?></td>
                                        <td><?= esc($post['title']) ?></td>
                                        <td><?= esc($post['category'] ?? 'General') ?></td>
                                        <td><?= esc($post['author']) ?></td>
                                        <td><?= esc(ucfirst($post['status'])) ?></td>
                                        <td><?= esc(date('Y-m-d H:i', strtotime($post['published_at']))) ?></td>
                                        <td class="text-end">
                                            <a href="blog.php?edit=<?= esc($post['id']) ?>" class="btn btn-sm btn-primary me-2">Edit</a>
                                            <a href="blog.php?delete=<?= esc($post['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this blog post?');">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php else: ?>
                    <p class="mb-0">No blog posts found yet. Use the form above to add the first post.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


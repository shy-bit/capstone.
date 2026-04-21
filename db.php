<?php
// Database configuration
$DB_HOST = 'localhost';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'tooth_impression';

// Create connection
$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS);

// Check connection
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Create database if not exists
if (!$conn->select_db($DB_NAME)) {
    $createDbSql = "CREATE DATABASE IF NOT EXISTS `$DB_NAME` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
    if (!$conn->query($createDbSql)) {
        die('Database creation failed: ' . $conn->error);
    }
    $conn->select_db($DB_NAME);
}

// Set charset
$conn->set_charset('utf8mb4');

// Create admin_users table if not exists
$adminTableSQL = "CREATE TABLE IF NOT EXISTS admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    role VARCHAR(30) DEFAULT 'admin',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
$conn->query($adminTableSQL);

// Create appointments table if not exists
$appointmentsTableSQL = "CREATE TABLE IF NOT EXISTS appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NULL,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    treatment VARCHAR(100) NOT NULL,
    appointment_date DATE NOT NULL,
    appointment_time VARCHAR(20) NOT NULL,
    message TEXT,
    record_image VARCHAR(255),
    status ENUM('pending','accepted','declined') NOT NULL DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES customers(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
$conn->query($appointmentsTableSQL);

// Ensure appointment_date column exists
$appointmentDateColumn = $conn->query("SHOW COLUMNS FROM appointments LIKE 'appointment_date'");
if ($appointmentDateColumn && $appointmentDateColumn->num_rows === 0) {
    $conn->query("ALTER TABLE appointments ADD COLUMN appointment_date DATE NULL AFTER treatment");
}

// Ensure status column exists
$statusColumn = $conn->query("SHOW COLUMNS FROM appointments LIKE 'status'");
if ($statusColumn && $statusColumn->num_rows === 0) {
    $conn->query("ALTER TABLE appointments ADD COLUMN status ENUM('pending','accepted','declined') NOT NULL DEFAULT 'pending' AFTER record_image");
}

// Ensure customer_id column exists
$customerIdColumn = $conn->query("SHOW COLUMNS FROM appointments LIKE 'customer_id'");
if ($customerIdColumn && $customerIdColumn->num_rows === 0) {
    $conn->query("ALTER TABLE appointments ADD COLUMN customer_id INT NULL AFTER id");
    $conn->query("ALTER TABLE appointments ADD FOREIGN KEY (customer_id) REFERENCES customers(id) ON DELETE SET NULL");
}

// Ensure rejection_reason column exists
$rejectionReasonColumn = $conn->query("SHOW COLUMNS FROM appointments LIKE 'rejection_reason'");
if ($rejectionReasonColumn && $rejectionReasonColumn->num_rows === 0) {
    $conn->query("ALTER TABLE appointments ADD COLUMN rejection_reason TEXT NULL AFTER status");
}

// Ensure doctor_id column exists
$doctorIdColumn = $conn->query("SHOW COLUMNS FROM appointments LIKE 'doctor_id'");
if ($doctorIdColumn && $doctorIdColumn->num_rows === 0) {
    $conn->query("ALTER TABLE appointments ADD COLUMN doctor_id INT NULL AFTER customer_id");
    $conn->query("ALTER TABLE appointments ADD FOREIGN KEY (doctor_id) REFERENCES doctors(id) ON DELETE SET NULL");
}

// Update existing rows to set appointment_date to the date of created_at
$updateSQL = "UPDATE appointments SET appointment_date = DATE(created_at) WHERE appointment_date IS NULL";
$conn->query($updateSQL);

// Now make it NOT NULL
$modifySQL = "ALTER TABLE appointments MODIFY COLUMN appointment_date DATE NOT NULL";
$conn->query($modifySQL);

// Create customers table if not exists
$customersTableSQL = "CREATE TABLE IF NOT EXISTS customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    phone VARCHAR(20),
    address TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
$conn->query($customersTableSQL);

// Create admin_messages table if not exists
$adminMessagesTableSQL = "CREATE TABLE IF NOT EXISTS admin_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NULL,
    customer_name VARCHAR(200) NOT NULL,
    customer_email VARCHAR(100) NOT NULL,
    subject VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    status ENUM('unread', 'read') NOT NULL DEFAULT 'unread',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES customers(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
$conn->query($adminMessagesTableSQL);

// Create admin_replies table if not exists (for customer notification)
$adminRepliesTableSQL = "CREATE TABLE IF NOT EXISTS admin_replies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT NULL,
    customer_name VARCHAR(200) NOT NULL,
    customer_email VARCHAR(100) NOT NULL,
    subject VARCHAR(255) NOT NULL,
    reply_message TEXT NOT NULL,
    status ENUM('unread', 'read') NOT NULL DEFAULT 'unread',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES customers(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
$conn->query($adminRepliesTableSQL);

// Create services table if not exists
$servicesTableSQL = "CREATE TABLE IF NOT EXISTS services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    image VARCHAR(255),
    link VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
$conn->query($servicesTableSQL);

// Insert default services if table is empty
$checkServices = $conn->query("SELECT COUNT(*) as count FROM services");
$result = $checkServices->fetch_assoc();
if ($result['count'] == 0) {
    $defaultServices = [
        ['Wisdom Extraction', 'Wisdom tooth extraction is a common procedure to remove one or more of the third molars â€“ the last set of teeth to emerge.', 'image/wisdom.jpg', 'wisdom.php'],
        ['Tooth Contouring', 'Tooth contouring, also known as enamel shaping, is a quick and painless cosmetic procedure that gently reshapes your teeth.', 'image/contouring.jpg', 'contouring.php'],
        ['Oral Hygiene', 'Oral hygiene is the foundation of a healthy smile. Maintaining good oral hygiene not only keeps your teeth and gums clean.', 'image/hygiene.jpg', 'oral-hygiene.php'],
        ['Retainer Fitting', 'After orthodontic treatment, a retainer is essential to maintain your newly aligned teeth. Our custom retainers ensure lasting results.', 'image/retainer.jpg', 'retainer-fitting.php'],
        ['Periodontal Therapy', 'Periodontal therapy is a specialized treatment focused on the health of your gums and the structures supporting your teeth.', 'image/periodontal.jpg', 'periodontal-therapy.php'],
        ['Dental Sealants', 'With years of hands-on experience, we bring deep industry knowledge and technical skill to protect your teeth.', 'image/sealants.jpg', 'dental-sealants.php'],
        ['Cosmetic Dentistry', 'Transform your smile with beautiful cosmetic enhancements and treatments.', 'image/cosmetic.jpg', 'cosmetic-dentistry.php'],
        ['Implant Dentistry', 'Replace missing teeth with natural-looking dental implants for a complete smile.', 'image/implants.jpg', 'implant-dentistry.php'],
    ];
    
    $insertStmt = $conn->prepare("INSERT INTO services (title, description, image, link) VALUES (?, ?, ?, ?)");
    foreach ($defaultServices as $service) {
        $insertStmt->bind_param('ssss', $service[0], $service[1], $service[2], $service[3]);
        $insertStmt->execute();
    }
    $insertStmt->close();
}

// Create contact_messages table if not exists
$contactMessagesTableSQL = "CREATE TABLE IF NOT EXISTS contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    message TEXT NOT NULL,
    is_read ENUM('unread', 'read') NOT NULL DEFAULT 'unread',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
$conn->query($contactMessagesTableSQL);

// Create appointment_comments table if not exists
$appointmentCommentsTableSQL = "CREATE TABLE IF NOT EXISTS appointment_comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    appointment_id INT NOT NULL,
    comment_type VARCHAR(50) NOT NULL,
    comment_text TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (appointment_id) REFERENCES appointments(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
$conn->query($appointmentCommentsTableSQL);

// Create doctors table if not exists
$doctorsTableSQL = "CREATE TABLE IF NOT EXISTS doctors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    specialization VARCHAR(100) NOT NULL,
    email VARCHAR(100),
    phone VARCHAR(20),
    availability_status ENUM('available', 'unavailable') NOT NULL DEFAULT 'available',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
$conn->query($doctorsTableSQL);

// Insert default doctors if table is empty
$checkDoctors = $conn->query("SELECT COUNT(*) as count FROM doctors");
$result = $checkDoctors->fetch_assoc();
if ($result['count'] == 0) {
    $defaultDoctors = [
        ['Dr. Maria Santos', 'General Dentistry', 'maria.santos@toothimpression.com', '+63 917 123 4567', 'available'],
        ['Dr. Juan dela Cruz', 'Orthodontics', 'juan.delacruz@toothimpression.com', '+63 917 123 4568', 'available'],
        ['Dr. Ana Reyes', 'Oral Surgery', 'ana.reyes@toothimpression.com', '+63 917 123 4569', 'available']
    ];
    
    $insertStmt = $conn->prepare("INSERT INTO doctors (name, specialization, email, phone, availability_status) VALUES (?, ?, ?, ?, ?)");
    foreach ($defaultDoctors as $doctor) {
        $insertStmt->bind_param('sssss', $doctor[0], $doctor[1], $doctor[2], $doctor[3], $doctor[4]);
        $insertStmt->execute();
    }
    $insertStmt->close();
}

// Create blog_posts table if not exists
$blogPostsTableSQL = "CREATE TABLE IF NOT EXISTS blog_posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL UNIQUE,
    excerpt TEXT,
    content TEXT NOT NULL,
    image VARCHAR(255),
    author VARCHAR(100) DEFAULT 'TOOTH IMPRESSION Dau Branch',
    category VARCHAR(100) DEFAULT 'General',
    status ENUM('draft','published') NOT NULL DEFAULT 'published',
    published_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
$conn->query($blogPostsTableSQL);

$categoryColumn = $conn->query("SHOW COLUMNS FROM blog_posts LIKE 'category'");
if ($categoryColumn && $categoryColumn->num_rows === 0) {
    $conn->query("ALTER TABLE blog_posts ADD COLUMN category VARCHAR(100) DEFAULT 'General' AFTER author");
}

$checkBlogPosts = $conn->query("SELECT COUNT(*) as count FROM blog_posts");
$result = $checkBlogPosts->fetch_assoc();
if ($result['count'] == 0) {
    $defaultPosts = [
        [
            'title' => 'Why Tooth Impressions Matter for Your Smile',
            'slug' => 'why-tooth-impressions-matter',
            'excerpt' => 'Learn how precise tooth impressions help the Dau branch create better restorations and more comfortable treatments.',
            'content' => 'Tooth impressions are a fundamental step in restorative dentistry. They allow dentists to accurately capture the shape and position of your teeth and gums, which helps the lab create crowns, bridges, dentures and other appliances that fit your mouth perfectly. At TOOTH IMPRESSION Dau Branch, we use careful impression techniques to make sure every device meets your needs.',
            'image' => 'image/tooth-impression.jpg',
            'author' => 'TOOTH IMPRESSION Team',
            'category' => 'Tooth Impressions',
            'status' => 'published',
            'published_at' => date('Y-m-d H:i:s', strtotime('-5 days')),
        ],
        [
            'title' => 'Top 5 Tips for a Healthy Dental Visit',
            'slug' => 'top-5-tips-healthy-dental-visit',
            'excerpt' => 'Prepare for your next dental visit with these practical tips from the Dau branch experts.',
            'content' => 'A healthy dental visit starts with good preparation. Keep a list of your symptoms, bring your medical history, and ask questions about your treatment options. Relax and communicate with your dentist so the team at TOOTH IMPRESSION Dau Branch can provide the best care for your smile.',
            'image' => 'image/dental-visit.jpg',
            'author' => 'Dr. Maria Santos',
            'category' => 'Preventive Care',
            'status' => 'published',
            'published_at' => date('Y-m-d H:i:s', strtotime('-2 days')),
        ],
    ];

    $stmt = $conn->prepare("INSERT INTO blog_posts (title, slug, excerpt, content, image, author, category, status, published_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    foreach ($defaultPosts as $post) {
        $stmt->bind_param('sssssssss', $post['title'], $post['slug'], $post['excerpt'], $post['content'], $post['image'], $post['author'], $post['category'], $post['status'], $post['published_at']);
        $stmt->execute();
    }
    $stmt->close();
}


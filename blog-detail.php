<?php
require 'db.php';
require 'functions.php';

// Get slug from URL
$slug = $_GET['slug'] ?? '';
$slug = trim($slug);

// Fetch post + category + (optional author)
$stmt = $conn->prepare("
    SELECT p.*, c.name AS category_name
    FROM posts p
    LEFT JOIN categories c ON c.id = p.category_id
    WHERE p.slug = ?
    LIMIT 1
");
$stmt->bind_param("s", $slug);
$stmt->execute();
$post = $stmt->get_result()->fetch_assoc();

if (!$post) {
    echo "<h2>Post not found</h2>";
    exit;
}
$current_post_id = $post['id'];

// Format date
$post_date = date("d M Y", strtotime($post['created_at']));
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Othisis Medtech - Ambient AI Medical Scribe</title>
    <!-- Bootstrap 5 CSS -->
     <base href="<?= rtrim(dirname($_SERVER['SCRIPT_NAME']), '/') . '/' ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top mt-3">
        <div class="container custom-nav-container">
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <!-- Logo -->
                <img src="images/othisis_header_logo.png" alt="Othisis Medtech Logo" class="d-inline-block align-text-top">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto me-4 align-items-center">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Product
                        </a>
                        <!-- Dropdown menu example -->
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Specialities
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Resources
                        </a>
                    </li>
                </ul>

                <div class="d-flex align-items-center gap-3">
                    <a href="#" class="btn-login">Login</a>
                    <a href="#" class="btn btn-primary btn-gradient rounded-pill px-4 py-2 d-flex align-items-center gap-2">
                        Try for Free
                        <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Blog Detail Hero -->
    <section class="blog-detail-hero py-5 mt-5">
        <div class="container pt-5">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <nav aria-label="breadcrumb" class="mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="blog.html">Blog</a></li>
                            <li class="breadcrumb-item"><a href="#">Charting AI</a></li>
                            <li class="breadcrumb-item active text-muted" aria-current="page">The Ultimate Gui...</li>
                        </ol>
                    </nav>
                    <h1 class="display-4 fw-bold text-dark mb-4">
                        <?= htmlspecialchars($post['title']) ?>
                    </h1>
                    <div class="d-flex align-items-center gap-3 mt-4">
                        <div class="author-avatar"></div>
                        <div>
                            <div class="fw-bold text-dark">Kiran</div>
                            <div class="text-secondary small">Published on <?= $post_date ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="rounded-4 overflow-hidden position-relative bg-primary-subtle d-flex align-items-center justify-content-center"
                        style="height: 350px;">
                <img src="/cms/uploads/<?= htmlspecialchars($post['featured_image']) ?>"  class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content Section -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <!-- Sidebar (Sticky) -->
                <div class="col-lg-3 mb-5 mb-lg-0">
                    <aside class="sticky-sidebar">

                    <?php
$toc_items = [];
$content_for_toc = $post['content'] ?? '';

preg_match_all('/<h2[^>]*>(.*?)<\/h2>/i', $content_for_toc, $matches);

$tocItems = array_slice($matches[1], 0, 4);

if (!empty($matches[1])) {
    foreach ($matches[1] as $heading) {
        // Create anchor slug from heading
        $anchor = strtolower(trim(preg_replace('/[^A-Za-z0-9]+/', '-', $heading), '-'));

        // Add an ID to the heading inside the content (so clicking TOC scrolls)
        $post['content'] = str_replace(
            $heading,
            "<span id=\"$anchor\"></span>$heading",
            $post['content']
        );

        $toc_items[] = [
            'title' => strip_tags($heading),
            'anchor' => $anchor
        ];
    }
}
?>

                        <!-- <h6 class="toc-header">Table Contents</h6>
                        <ul class="toc-list mb-5">
                            <li><a href="#">Introduction</a></li>
                            <li><a href="#">What Exactly Is AI Scribing Software?</a></li>
                            <li><a href="#">What Exactly Is AI Scribing Software?</a></li>
                            <li><a href="#">What Exactly Is AI Scribing Software?</a></li>
                        </ul> -->

                        <?php if (!empty($toc_items)): ?>
    <h6 class="toc-header">Table Contents</h6>
    <ul class="toc-list mb-5">
        <?php foreach ($toc_items as $toc): ?>
            <li>
                <a href="#<?= $toc['anchor'] ?>">
                    <?= htmlspecialchars($toc['title']) ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

                        <!-- Summarize with AI Widget -->
                        <div class="ai-widget">
                            <div class="ai-widget-title">
                                <i class="bi bi-stars"></i> Summarize with AI
                            </div>
                            <div class="d-flex flex-wrap gap-2">
                                <a href="#" class="ai-btn">ChatGPT</a>
                                <a href="#" class="ai-btn">Gemini</a>
                                <a href="#" class="ai-btn">Copilot</a>
                                <a href="#" class="ai-btn">Perplexity</a>
                                <a href="#" class="ai-btn">Claude</a>
                            </div>
                        </div>
                    </aside>
                </div>

                <!-- Article Content -->
                <div class="col-lg-8 offset-lg-1 article-content">
                    <?= $post['content'] ?>

                    
                    <!-- Quote Block -->
                    <div class="blog-quote-box">
                        “For AI to be valuable and accepted, it should support and not replace the patient-physician
                        relationship. AI will be most effective when it helps physicians focus on personalized patient
                        care rather than transactional tasks.”
                    </div>

                    <!-- FAQ Section -->
                    <h2 class="faq-header">Frequently Asked Questions</h2>
                    <div class="accordion faq-accordion" id="faqAccordion">
                        <!-- Item 1 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq1">
                                    What Exactly Is AI Scribing Software?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    We know it's been quite the journey navigating the ever-evolving landscape of
                                    healthcare technology, and we're thrilled to help you understand one of the most
                                    transformative tools hitting Canadian practices: AI scribing software. If you're new
                                    to charting AI or considering making the leap, this guide is packed with everything
                                    you need to know about CMPA policies, legal safety, and best practices for adopting
                                    AI-powered medical documentation tools.
                                </div>
                            </div>
                        </div>
                        <!-- Item 2 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq2">
                                    What Exactly Is AI Scribing Software?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Content placeholder for the second question.
                                </div>
                            </div>
                        </div>
                        <!-- Item 3 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq3">
                                    What Exactly Is AI Scribing Software?
                                </button>
                            </h2>
                            <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Content placeholder for the third question.
                                </div>
                            </div>
                        </div>
                        <!-- Item 4 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq4">
                                    What Exactly Is AI Scribing Software?
                                </button>
                            </h2>
                            <div id="faq4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Content placeholder for the fourth question.
                                </div>
                            </div>
                        </div>
                        <!-- Item 5 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq5">
                                    What Exactly Is AI Scribing Software?
                                </button>
                            </h2>
                            <div id="faq5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Content placeholder for the fifth question.
                                </div>
                            </div>
                        </div>
                        <!-- Item 6 -->
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq6">
                                    What Exactly Is AI Scribing Software?
                                </button>
                            </h2>
                            <div id="faq6" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    Content placeholder for the sixth question.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Separate CTA Section -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="bottom-cta m-0">
                <h2 class="text-white mt-0 mb-4 h1">Make more time for care, Less time for documentation</h2>
                <a href="#" class="btn btn-light rounded-pill px-4 py-2 fw-bold text-primary">Let's Check</a>
            </div>
        </div>
    </section>

    <!-- Other Recommended Articles -->
    <section class="py-5 bg-white">
    <div class="container">
        <h2 class="fw-bold text-center mb-5 text-dark">Other Recommended Articles</h2>
        <div class="row g-4">

            <?php
            // Fetch latest 4 posts except the current one
            $stmt = $conn->prepare("
                SELECT id, title, slug, featured_image, meta_description, created_at 
                FROM posts 
                WHERE id != ? 
                ORDER BY created_at DESC 
                LIMIT 4
            ");
            $stmt->bind_param("i", $current_post_id);
            $stmt->execute();
            $recs = $stmt->get_result();

            while ($r = $recs->fetch_assoc()):
            ?>
            
            <div class="col-lg-3 col-md-6">
                <a href="blog/<?= urlencode($r['slug']) ?>" class="text-decoration-none group">
                    <div class="blog-card h-100 border-0">

                        <div class="blog-image-wrapper rounded-4 overflow-hidden mb-4 position-relative d-flex align-items-center justify-content-center"
                             style="background-color: #dbeafe; height: 180px;">

                            <?php if (!empty($r['featured_image'])): ?>
                                <img src="/cms/uploads/<?= htmlspecialchars($r['featured_image']) ?>"
                                     class="img-fluid w-100 h-100 object-fit-cover">
                            <?php else: ?>
                                <i class="bi bi-briefcase-medical text-primary display-4"></i>
                            <?php endif; ?>
                        </div>

                        <h5 class="fw-bold text-dark mb-3 lh-sm hover-primary">
                            <?= htmlspecialchars($r['title']) ?>
                        </h5>

                        <p class="text-secondary small mb-3 line-clamp-2" style="font-size: 0.9rem;">
                            <?= htmlspecialchars(substr(strip_tags($r['meta_description']), 0, 120)) ?>...
                        </p>

                        <div class="text-secondary" style="font-size: 0.8rem;">
                            <?= date("d M, Y", strtotime($r['created_at'])) ?>
                        </div>

                    </div>
                </a>
            </div>

            <?php endwhile; ?>

        </div>
    </div>
</section>

    <!-- Footer Section -->
    <footer class="site-footer">
        <!-- Curved Top Background -->
        <div class="footer-curve">
            <img src="images/footer_bg_curve.png" alt="Curve">
        </div>

        <div class="container footer-content">
            <div class="row gy-5 justify-content-between">
                <!-- Logo Layout -->
                <div class="col-lg-3 col-md-12">
                   <div class="footer-logo">
                        <img src="images/othisis_header_logo.png" alt="Othisis Medtech" height="40">
                   </div>
                </div>

                <!-- Features -->
                <div class="col-lg-2 col-md-4">
                    <h5 class="footer-heading">Features</h5>
                    <ul class="footer-links">
                        <li><a href="#">AI Transcription</a></li>
                        <li><a href="#">PDF to Summary</a></li>
                        <li><a href="#">Pricing</a></li>
                    </ul>
                </div>

                <!-- Resources -->
                <div class="col-lg-2 col-md-4">
                    <h5 class="footer-heading">Resources</h5>
                    <ul class="footer-links">
                        <li><a href="blog">Blogs</a></li>
                        <li><a href="#">HIPAA Compliance</a></li>
                        <li><a href="#">Security</a></li>
                        <li><a href="#">Legal & Privacy</a></li>
                    </ul>
                </div>

                <!-- Company -->
                <div class="col-lg-2 col-md-4">
                    <h5 class="footer-heading">Company</h5>
                    <ul class="footer-links">
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Contact us</a></li>
                    </ul>
                </div>

                <!-- Social -->
                <div class="col-lg-2 col-md-12">
                     <h5 class="footer-heading">Follow us at</h5>
                     <div class="footer-social">
                         <a href="#" class="social-icon"><i class="bi bi-twitter-x"></i></a> <!-- X icon -->
                         <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
                         <a href="#" class="social-icon"><i class="bi bi-instagram"></i></a>
                         <a href="#" class="social-icon"><i class="bi bi-linkedin"></i></a>
                     </div>
                </div>
            </div>

            <!-- Subscribe Section -->
            <div class="footer-subscribe-wrapper">
                <h3>Subscribe to Othisis</h3>
                <div class="subscribe-form">
                    <input type="email" class="subscribe-input" placeholder="Enter your Email">
                    <button class="subscribe-btn">Subscribe</button>
                </div>
            </div>
        </div>

        <!-- Watermark -->
        <div class="footer-watermark">
            <img src="images/footer_othisis_text.png" alt="Othisis">
        </div>
    </footer>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom Scripts -->
    <script src="script.js"></script>
</body>

</html>
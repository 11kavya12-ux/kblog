<?php require 'db.php'; require 'functions.php';

$page = max(1, intval($_GET['page'] ?? 1));
$perPage = 6;
$offset = ($page - 1) * $perPage;

$activeCategory = $_GET['category'] ?? 'all';

// Check if AJAX request
$isAjax = isset($_GET['ajax']) && $_GET['ajax'] == 1;

if ($isAjax) {
    // Output JSON for AJAX
    header('Content-Type: application/json');

    // pagination + category
    $perPage = 3;
    $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
    $offset = ($page - 1) * $perPage;

    // normalize category: either 'all' or integer id
    $activeCategory = 'all';
    if (isset($_GET['category']) && $_GET['category'] !== '') {
        $activeCategory = ($_GET['category'] === 'all') ? 'all' : intval($_GET['category']);
    }

    // posts (use prepared statements when category filter is present)
    if ($activeCategory !== 'all') {
        $catId = (int)$activeCategory;
        $stmt = $conn->prepare(
            "SELECT SQL_CALC_FOUND_ROWS p.*, c.name AS category_name
             FROM posts p
             LEFT JOIN categories c ON c.id = p.category_id
             WHERE p.category_id = ?
             ORDER BY p.created_at DESC
             LIMIT ? OFFSET ?"
        );
        $stmt->bind_param('iii', $catId, $perPage, $offset);
    } else {
        $stmt = $conn->prepare(
            "SELECT SQL_CALC_FOUND_ROWS p.*, c.name AS category_name
             FROM posts p
             LEFT JOIN categories c ON c.id = p.category_id
             ORDER BY p.created_at DESC
             LIMIT ? OFFSET ?"
        );
        $stmt->bind_param('ii', $perPage, $offset);
    }

    $stmt->execute();
    $postRes = $stmt->get_result();

    $totalRes = $conn->query("SELECT FOUND_ROWS() AS total");
    $totalRows = $totalRes->fetch_assoc()['total'];
    $totalPages = ceil($totalRows / $perPage);

    $posts = [];
    while ($p = $postRes->fetch_assoc()) {
        $posts[] = $p;
    }

    echo json_encode([
        'posts' => $posts,
        'totalPages' => $totalPages,
        'currentPage' => $page,
        'activeCategory' => $activeCategory
    ]);
    exit;
}

// Normal page load logic
$page = max(1, intval($_GET['page'] ?? 1));
$perPage = 3;
$offset = ($page - 1) * $perPage;

$activeCategory = 'all';
if (isset($_GET['category']) && $_GET['category'] !== '') {
    $activeCategory = ($_GET['category'] === 'all') ? 'all' : intval($_GET['category']);
}

$catRes = $conn->query("SELECT id, name FROM categories ORDER BY name ASC");

// posts (use prepared statements when category filter is present)
if ($activeCategory !== 'all') {
    $catId = (int)$activeCategory;
    $stmt = $conn->prepare(
        "SELECT SQL_CALC_FOUND_ROWS p.*, c.name AS category_name
         FROM posts p
         LEFT JOIN categories c ON c.id = p.category_id
         WHERE p.category_id = ?
         ORDER BY p.created_at DESC
         LIMIT ? OFFSET ?"
    );
    $stmt->bind_param('iii', $catId, $perPage, $offset);
} else {
    $stmt = $conn->prepare(
        "SELECT SQL_CALC_FOUND_ROWS p.*, c.name AS category_name
         FROM posts p
         LEFT JOIN categories c ON c.id = p.category_id
         ORDER BY p.created_at DESC
         LIMIT ? OFFSET ?"
    );
    $stmt->bind_param('ii', $perPage, $offset);
}

$stmt->execute();
$postRes = $stmt->get_result();

$totalRes = $conn->query("SELECT FOUND_ROWS() AS total");
$totalRows = $totalRes->fetch_assoc()['total'];
$totalPages = ceil($totalRows / $perPage);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Othisis Medtech - Blog</title>
    <base href="<?= rtrim(dirname($_SERVER['SCRIPT_NAME']), '/') . '/' ?>">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-white">

    <!-- Navigation (Reused) -->
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

    <!-- Hero Section (Split Layout) -->
    <section class="blog-hero py-5 bg-light">
        <div class="container py-5 mt-5">
            
            <div class="row gx-5">
                <!-- Left Column: Sticky Title -->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <div class="sticky-top" style="top: 120px; z-index: 1;">
                        <h6 class="text-primary fw-medium mb-3">Othisis Blog</h6>
                        <h1 class="display-5 fw-bold text-dark mb-4">
                            Discover how<br>Othisis helps you
                        </h1>
                        <p class="text-secondary lead fs-5">
                            We know it's been quite the journey navigating the ever-evolving landscape of healthcare
                            technology.
                        </p>
                    </div>
                </div>

                <!-- Right Column: Featured Grid -->
                <div class="col-lg-8">
                    <div class="row g-4">
                        <!-- Featured Post 1 -->
                         <?php
$res = $conn->query("
    SELECT p.*, c.name AS category_name 
    FROM posts p
    LEFT JOIN categories c ON p.category_id = c.id
    ORDER BY p.created_at DESC
    LIMIT 4
");

while($p = $res->fetch_assoc()):
?>
    <div class="col-md-6">
        <article class="blog-card h-100">
            <div class="blog-image-wrapper mb-4 rounded-4 overflow-hidden position-relative">
            
            <?php if($p['featured_image']): ?>
                <img src="/cms/uploads/<?= htmlspecialchars($p['featured_image']) ?>" 
                     class="img-fluid w-100 object-fit-cover h-100">
            <?php endif; ?>

            </div>

            <h3 class="h5 fw-bold mb-3">
                <a href="blog/<?= urlencode($p['slug']) ?>" 
                   class="text-dark text-decoration-none hover-primary">
                    <?= htmlspecialchars($p['title']) ?>
                </a>
            </h3>

            <p class="text-secondary mb-3 small">
                <?= htmlspecialchars(substr(strip_tags($p['meta_description'] ?: $p['content']),0,180)) ?>
            </p>

            <div class="text-muted small">
                <?= date("d M Y", strtotime($p['created_at'])) ?>
            </div>
        </article>
    </div>
<?php endwhile; ?>
         
                    </div>
                </div>
            </div>
        </div>
        
    </section>

    <!-- Blog Feed Section (Category Filter) -->
    <?php
// categories
$catRes = $conn->query("SELECT id, name FROM categories ORDER BY name ASC");
?>

<section id="blog" class="blog-feed py-5">
<div class="container py-5">

<!-- Title -->
<div class="row justify-content-center mb-5">
  <div class="col-lg-8 text-center">
    <h1 class="display-4 fw-bold text-dark mb-4">
      Discover how Othisis helps you
    </h1>
  </div>
</div>

<!-- Categories -->
<div class="category-scroll-container mb-5 d-flex justify-content-center gap-3 flex-wrap">

<a href="blog?category=all" class="btn btn-outline-secondary rounded-pill px-4 py-2 <?= $activeCategory=='all'?'active':'' ?>">
  All
</a>

<?php while($cat = $catRes->fetch_assoc()): ?>
<a href="blog?category=<?= $cat['id'] ?>" 
   class="btn btn-outline-secondary rounded-pill px-4 py-2 <?= $activeCategory==$cat['id']?'active':'' ?>">
   <?= htmlspecialchars($cat['name']) ?>
</a>
<?php endwhile; ?>

</div>

<!-- Blog Grid -->
<div class="row g-4 mb-5">

<?php while($p = $postRes->fetch_assoc()): ?>
<div class="col-md-6 col-lg-4">
  <article class="blog-card h-100">

    <div class="blog-image-wrapper mb-4 rounded-4 overflow-hidden">
      <?php if($p['featured_image']): ?>
        <img src="/cms/uploads/<?= htmlspecialchars($p['featured_image']) ?>" class="img-fluid w-100 h-100 object-fit-cover">
      <?php else: ?>
        <img src="images/blog_placeholder.png" class="img-fluid w-100 h-100 object-fit-cover">
      <?php endif; ?>
    </div>

    <h3 class="h5 fw-bold mb-3">
      <a href="blog/<?= urlencode($p['slug']) ?>" class="text-dark text-decoration-none hover-primary">
        <?= htmlspecialchars($p['title']) ?>
      </a>
    </h3>

    <p class="text-secondary small mb-3">
      <?= htmlspecialchars(substr(strip_tags($p['meta_description'] ?: $p['content']), 0, 160)) ?>
    </p>

    <div class="text-muted small">
      <?= date("d M Y", strtotime($p['created_at'])) ?>
    </div>

  </article>
</div>
<?php endwhile; ?>

</div>

<!-- Pagination -->
<?php if($totalPages > 1): ?>
<div class="d-flex justify-content-center align-items-center gap-3">

<?php if($page > 1): ?>
<a class="btn btn-sm btn-outline-light text-dark rounded-circle shadow-sm"
   style="width:32px;height:32px;"
   href="blog?page=<?= $page-1 ?>&category=<?= $activeCategory ?>">
   <i class="bi bi-chevron-left"></i>
</a>
<?php endif; ?>

<div class="border rounded px-2 py-1 bg-white shadow-sm fw-medium small">
  <?= $page ?> / <?= $totalPages ?>
</div>

<?php if($page < $totalPages): ?>
<a class="btn btn-sm btn-outline-light text-dark rounded-circle shadow-sm"
   style="width:32px;height:32px;"
   href="blog?page=<?= $page+1 ?>&category=<?= $activeCategory ?>">
   <i class="bi bi-chevron-right"></i>
</a>
<?php endif; ?>

</div>
<?php endif; ?>

</div>
</section>


    <!-- Call to Action Section -->
    <section class="py-5">
        <div class="container mb-5">
            <div class="cta-section rounded-5 cta-container text-center">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="mb-4">
                            Make more time for care, Less<br>
                            time for documentation
                        </h2>
                        <a href="#" class="btn btn-cta text-decoration-none d-inline-block mt-2">
                            Let's Check
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Changelog Section -->
    <section class="changelog-section py-5">
        <div class="container">
            <h2 class="text-center fw-bold mb-4">Othisis Changelog</h2>

            <div class="d-flex justify-content-center gap-2 mb-5 flex-wrap">

    <!-- ALL Button -->
    <button class="btn version-btn active" data-version="all">All</button>

    <?php
    $versions = $conn->query("SELECT * FROM versions ORDER BY id ASC");
    while($v = $versions->fetch_assoc()):
    ?>
        <button class="btn version-btn"
                data-version="<?= htmlspecialchars($v['version_code']) ?>">
            <?= htmlspecialchars($v['version_name']) ?>
        </button>
    <?php endwhile; ?>
</div>



            <!-- Horizontal Scroll Cards -->
            <?php
$logs = $conn->query("
    SELECT c.*, v.version_code
    FROM changelog c
    LEFT JOIN versions v ON v.id=c.version_id
    ORDER BY c.created_at DESC
");
?>

<div class="changelog-scroll-container d-flex gap-4 px-2">
<?php while($c=$logs->fetch_assoc()): ?>
    <div class="changelog-card flex-shrink-0" data-version="<?= $c['version_code'] ?>">
        <div class="d-flex justify-content-center align-items-center mb-4" style="height:100px;">
            <img src="uploads/<?= htmlspecialchars($c['icon']) ?>" width="80">
        </div>
        <h5 class="fw-bold mb-3"><?= htmlspecialchars($c['title']) ?></h5>
        <p class="text-secondary small mb-3"><?= htmlspecialchars($c['description']) ?></p>
        <div class="text-muted small"><?= date("d M, Y", strtotime($c['created_at'])) ?></div>
    </div>
<?php endwhile; ?>
</div>


        </div>
    </section>

    <!-- Subscribe Section -->
    <section class="subscribe-section py-5">
        <div class="container">
            <div class="subscribe-container rounded-4 text-center">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="fw-bold mb-4 subscribe-title">Subscribe to Othisis’s new updates</h2>
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-lg-7">
                                <form class="d-flex flex-column flex-sm-row gap-3 align-items-sm-end" action="subscribe.php" method="post">
                                    <div class="flex-grow-1 text-start">
                                        <label class="form-label small fw-bold text-muted mb-1">Email ID*</label>
                                        <input type="email" name="email" class="form-control" placeholder="johndoe@gmail.com"
                                            style="padding: 10px;">
                                    </div>
                                    <button type="submit" class="btn btn-subscribe flex-shrink-0"
                                        style="padding: 10px 24px;">Subscribe Now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
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

    <!-- Custom Scripts -->
    
    <script>
document.querySelectorAll(".category-btn").forEach(btn => {
    btn.addEventListener("click", function () {

        // Remove active class From all
        document.querySelectorAll(".category-btn").forEach(b => b.classList.remove("active"));
        this.classList.add("active");

        let selected = this.getAttribute("data-category");
        let posts = document.querySelectorAll(".blog-item");

        posts.forEach(post => {
            let cat = post.getAttribute("data-category");

            if (selected === "all" || selected === cat) {
                post.style.display = "block";
            } else {
                post.style.display = "none";
            }
        });
    });
});
</script>

    
    <script>
    // AJAX loading for pagination and categories
    function loadPosts(page, category) {
        fetch(`blog?ajax=1&page=${page}&category=${category}`)
        .then(response => response.json())
        .then(data => {
            // update posts
            const grid = document.querySelector('.row.g-4.mb-5');
            grid.innerHTML = data.posts.map(p => `
                <div class="col-md-6 col-lg-4">
                    <article class="blog-card h-100">
                        <div class="blog-image-wrapper mb-4 rounded-4 overflow-hidden">
                            ${p.featured_image ? `<img src="/cms/uploads/${p.featured_image.replace(/"/g, '&quot;')}" class="img-fluid w-100 h-100 object-fit-cover">` : `<img src="images/blog_placeholder.png" class="img-fluid w-100 h-100 object-fit-cover">`}
                        </div>
                        <h3 class="h5 fw-bold mb-3">
                            <a href="blog/${p.slug}" class="text-dark text-decoration-none hover-primary">
                                ${p.title.replace(/</g, '&lt;').replace(/>/g, '&gt;')}
                            </a>
                        </h3>
                        <p class="text-secondary small mb-3">
                            ${(p.meta_description || p.content).substring(0, 160).replace(/</g, '&lt;').replace(/>/g, '&gt;')}
                        </p>
                        <div class="text-muted small">
                            ${new Date(p.created_at).toLocaleDateString()}
                        </div>
                    </article>
                </div>
            `).join('');

            // update pagination
            const paginationDiv = document.querySelector('.d-flex.justify-content-center.align-items-center.gap-3');
            if (data.totalPages > 1) {
                let paginationHTML = '';
                if (data.currentPage > 1) {
                    paginationHTML += `<a class="btn btn-sm btn-outline-light text-dark rounded-circle shadow-sm" style="width:32px;height:32px;" href="#" data-page="${data.currentPage - 1}"><i class="bi bi-chevron-left"></i></a>`;
                }
                paginationHTML += `<div class="border rounded px-2 py-1 bg-white shadow-sm fw-medium small">${data.currentPage} / ${data.totalPages}</div>`;
                if (data.currentPage < data.totalPages) {
                    paginationHTML += `<a class="btn btn-sm btn-outline-light text-dark rounded-circle shadow-sm" style="width:32px;height:32px;" href="#" data-page="${data.currentPage + 1}"><i class="bi bi-chevron-right"></i></a>`;
                }
                paginationDiv.innerHTML = paginationHTML;
            } else {
                paginationDiv.innerHTML = '';
            }

            // update active category
            document.querySelectorAll('.category-scroll-container a').forEach(a => a.classList.remove('active'));
            const activeLink = document.querySelector(`.category-scroll-container a[href*="category=${data.activeCategory}"]`);
            if (activeLink) activeLink.classList.add('active');

            // update URL without reload
            const newUrl = `blog?page=${page}&category=${category}`;
            history.pushState(null, '', newUrl);
        });
    }

    // Event delegation for category and pagination clicks
    document.addEventListener('click', function(e) {
        if (e.target.closest('.category-scroll-container a')) {
            e.preventDefault();
            const link = e.target.closest('a');
            const urlParams = new URLSearchParams(link.href.split('?')[1]);
            const category = urlParams.get('category') || 'all';
            loadPosts(1, category); // reset to page 1
        } else if (e.target.closest('.d-flex.justify-content-center.align-items-center.gap-3 a')) {
            e.preventDefault();
            const link = e.target.closest('a');
            const page = link.getAttribute('data-page');
            const urlParams = new URLSearchParams(window.location.search);
            const category = urlParams.get('category') || 'all';
            loadPosts(page, category);
        }
    });

</script>



</body>

</html>
<?php require 'db.php'; require 'functions.php';
$slug = isset($_GET['slug']) ? $_GET['slug'] : '';
if (!$slug) { header('HTTP/1.1 404 Not Found'); echo 'Post not found'; exit; }
$stmt = $conn->prepare('SELECT * FROM posts WHERE slug = ? LIMIT 1');
$stmt->bind_param('s', $slug);
$stmt->execute();
$post = $stmt->get_result()->fetch_assoc();
if (!$post) { header('HTTP/1.1 404 Not Found'); echo 'Post not found'; exit; }
$postUrl = url('blog/' . $post['slug']);
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?= htmlspecialchars($post['meta_title'] ?: $post['title']) ?></title>
  <meta name="description" content="<?= htmlspecialchars($post['meta_description'] ?: strip_tags(substr($post['content'],0,160))) ?>">
  <link rel="canonical" href="<?= htmlspecialchars($postUrl) ?>">
  <meta property="og:title" content="<?= htmlspecialchars($post['meta_title'] ?: $post['title']) ?>">
  <meta property="og:description" content="<?= htmlspecialchars($post['meta_description'] ?: strip_tags(substr($post['content'],0,160))) ?>">
  <meta property="og:type" content="article">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="/cms/assets/css/site.css" rel="stylesheet">
  <script type="application/ld+json">
  {
    "@context":"https://schema.org",
    "@type":"Article",
    "mainEntityOfPage":{"@type":"WebPage","@id":"<?= htmlspecialchars($postUrl) ?>"},
    "headline":"<?= htmlspecialchars($post['title']) ?>",
    "datePublished":"<?= htmlspecialchars($post['created_at']) ?>",
    "dateModified":"<?= htmlspecialchars($post['updated_at'] ?: $post['created_at']) ?>",
    "author":{"@type":"Person","name":"Admin"},
    "publisher":{"@type":"Organization","name":"MyModernBlog","logo":{"@type":"ImageObject","url":"<?= url('uploads/logo.png') ?>"}},
    "description":"<?= htmlspecialchars($post['meta_description'] ?: strip_tags(substr($post['content'],0,160))) ?>"
  }
  </script>
</head>
<body>
<?php include 'includes/header.php'; ?>
<main class="container">
  <article class="card">
    <h1><?= htmlspecialchars($post['title']) ?></h1>
    <p class="small-muted">Published: <?= htmlspecialchars($post['created_at']) ?></p>
    <?php if($post['featured_image']): ?>
      <img src="../uploads/<?= htmlspecialchars($post['featured_image']) ?>" style="max-width:100%;border-radius:8px" class="mb-3">
    <?php endif; ?>
    <div><?= $post['content'] ?></div>
  </article>
</main>
<?php include 'includes/footer.php'; ?>
</body>
</html>

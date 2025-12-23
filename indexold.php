<?php require 'db.php'; require 'functions.php'; ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Home - Othisis</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/site.css" rel="stylesheet">
</head>
<body>
<?php include 'includes/header.php'; ?>
<main class="container">
  <div class="row">
    <div class="col-md-8">
      <h1>Welcome to Othisis</h1>
      <p class="small-muted">Othisis lightens the caregiving load by translating every patient interaction into complete, compliant documentation instantly.</p>
      <?php
      $res = $conn->query("SELECT * FROM posts ORDER BY created_at DESC LIMIT 5");
      while($p = $res->fetch_assoc()):
      ?>
      <div class="card">
        <h3><a href="blog/<?= htmlspecialchars($p['slug']) ?>"><?= htmlspecialchars($p['title']) ?></a></h3>
        <p class="post-excerpt"><?= htmlspecialchars(substr(strip_tags($p['meta_description'] ?: $p['content']),0,150)) ?>...</p>
        <a class="btn-primary" href="blog/<?= htmlspecialchars($p['slug']) ?>">Read</a>
      </div>
      <?php endwhile; ?>
    </div>
    <div class="col-md-4">
      <div class="card">
        <h5>Subscribe to Newsletter</h5>
        <form action="subscribe.php" method="post">
          <input name="email" type="email" class="form-control mb-2" placeholder="Your email" required>
          <button class="btn-primary">Subscribe</button>
        </form>
      </div>
      <div class="card">
        <h5>About</h5>
        <p class="small-muted">Edit includes/header.php and includes/footer.php to change site-wide header/footer.</p>
      </div>
    </div>
  </div>
</main>
<?php include 'includes/footer.php'; ?>
</body>
</html>

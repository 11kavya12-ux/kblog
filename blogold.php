<?php require 'db.php'; require 'functions.php'; ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Blog - MyModernBlog</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="/cms/assets/css/site.css" rel="stylesheet">
</head>
<body>
<?php include 'includes/header.php'; ?>
<main class="container">
  <h1>All Posts</h1>
  <?php
  $res = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");
  while($p = $res->fetch_assoc()):
  ?>
   <div class="card">
     <div class="row">
       <div class="col-md-3">
         <?php if($p['featured_image']): ?>
           <img src="/cms/uploads/<?= htmlspecialchars($p['featured_image']) ?>" style="width:100%;border-radius:8px">
         <?php endif; ?>
       </div>
       <div class="col-md-9">
         <h3><a href="blog/<?= htmlspecialchars($p['slug']) ?>"><?= htmlspecialchars($p['title']) ?></a></h3>
         <p class="post-excerpt"><?= htmlspecialchars(substr(strip_tags($p['meta_description'] ?: $p['content']),0,180)) ?>...</p>
         <a class="btn-primary" href="blog/<?= htmlspecialchars($p['slug']) ?>">Read</a>
       </div>
     </div>
   </div>
  <?php endwhile; ?>
</main>
<?php include 'includes/footer.php'; ?>
</body>
</html>

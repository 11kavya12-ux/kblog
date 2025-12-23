Modern Gradient Green CMS - README

Features:
- Modern gradient (green) user theme
- Material-like admin dashboard with sidebar, topbar, and footer
- Common frontend includes: includes/header.php, includes/footer.php
- Common admin includes: admin/includes/header.php, admin/includes/sidebar.php, admin/includes/footer.php
- CKEditor 5 Classic integrated (full toolbar)
- Image upload for featured image (stored in /uploads)
- Newsletter subscribe + admin view
- Pretty URLs with .htaccess for XAMPP (blog and blog post)
- install.sql to create DB and default admin (admin/password123)

Quick setup (XAMPP):
1. Copy project folder to C:/xampp/htdocs/yourfolder
2. Ensure Apache mod_rewrite is enabled
3. Import install.sql into MySQL (phpMyAdmin)
4. Edit db.php if your DB name/user/password differ
5. Ensure uploads/ is writable
6. Visit /admin/login.php (admin / password123) and add posts

Files to edit for branding:
- includes/header.php (navigation and logo)
- includes/footer.php (footer copyright)
- admin/includes/header.php (admin topbar)
- admin/includes/sidebar.php (sidebar links)

If you want deployment help for cPanel or VPS, tell me your hosting type and I will guide step-by-step.

<?php
/**
 * 404.php — friendly "page not found" (wired via .htaccess).
 */
require_once __DIR__ . '/includes/config.php';
http_response_code(404);
$pageTitle = '404 - Page Not Found';
require __DIR__ . '/includes/header.php';
?>
<div class="container section center text-center py-5" style="min-height:50vh">
    <p style="font-size:5rem;font-weight:800">4<span style="color:var(--accent-cyan)">0</span>4</p>
    <h1>Page Not Found</h1>
    <p class="lead mt-2" style="max-width:44ch;margin-left:auto;margin-right:auto">
        The page you are looking for could not be found.
    </p>
    <a class="btn btn-primary mt-3" href="<?php echo htmlspecialchars(BASE_URL); ?>/index.php">
        <i class="fa-solid fa-house"></i> Back to Home
    </a>
</div>
<?php require __DIR__ . '/includes/footer.php'; ?>
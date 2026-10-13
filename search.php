<?php
$pageTitle = 'Search - National Cybersecurity Awareness Portal';
require_once 'includes/header.php';
require_once 'includes/database.php';

$searchTerm = isset($_GET['q']) ? trim($_GET['q']) : '';
$results = [];

if (!empty($searchTerm)) {
    $keywords = [
        'phishing' => 'phishing.php',
        'otp' => 'passwords.php',
        'password' => 'passwords.php',
        'scam' => 'scams.php',
        'privacy' => 'privacy.php',
        'facebook' => 'privacy.php',
        'online shopping' => 'scams.php',
        'wifi' => 'practices.php',
        'malware' => 'practices.php',
        'bank' => 'scams.php',
        'shopping' => 'scams.php',
        'delivery' => 'scams.php',
        'investment' => 'scams.php',
        'job' => 'scams.php',
        'romance' => 'scams.php',
        'lottery' => 'scams.php',
        'lending' => 'scams.php',
        'social media' => 'privacy.php',
        'password manager' => 'passwords.php',
        'mfa' => 'passwords.php',
        'multi-factor' => 'passwords.php',
        'encryption' => 'passwords.php',
        'identity theft' => 'privacy.php',
        'personal information' => 'privacy.php',
        'device security' => 'practices.php',
        'updates' => 'practices.php',
        'antivirus' => 'practices.php',
        'backup' => 'practices.php',
        'cybersecurity' => 'about.php',
        'digital citizenship' => 'about.php'
    ];
    
    $searchTermLower = strtolower($searchTerm);
    
    foreach ($keywords as $keyword => $page) {
        if (strpos($keyword, $searchTermLower) !== false || strpos($searchTermLower, $keyword) !== false) {
            $titles = [
                'phishing.php' => 'Phishing Awareness',
                'passwords.php' => 'Password Security',
                'scams.php' => 'Online Scams',
                'privacy.php' => 'Privacy Protection',
                'practices.php' => 'Safety Practices',
                'about.php' => 'About Cybersecurity'
            ];
            
            $descriptions = [
                'phishing.php' => 'Learn how to identify and avoid phishing attacks',
                'passwords.php' => 'Create strong passwords and secure your accounts',
                'scams.php' => 'Understand common online scams and how to avoid them',
                'privacy.php' => 'Protect your personal information online',
                'practices.php' => 'Adopt safe internet practices',
                'about.php' => 'Learn about cybersecurity awareness'
            ];
            
            if (!isset($results[$page])) {
                $results[$page] = [
                    'title' => $titles[$page] ?? ucfirst(str_replace('.php', '', $page)),
                    'description' => $descriptions[$page] ?? 'Learn more about this cybersecurity topic',
                    'url' => $page
                ];
            }
        }
    }
}
?>

<section class="search-section py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="mb-3">Search</h1>
            <p class="lead">Find cybersecurity topics, guides, and resources.</p>
        </div>
        
        <div class="card mb-4">
            <div class="card-body">
                <form method="GET" action="search.php">
                    <div class="input-group">
                        <span class="input-group-text" style="background: rgba(255,255,255,0.06); border: 1px solid var(--glass-border); border-right: none; color: var(--accent-cyan);">
                            <i class="fas fa-search"></i>
                        </span>
                        <input type="text" class="form-control" name="q" 
                               value="<?php echo e($searchTerm); ?>" 
                               placeholder="Search for cybersecurity topics..."
                               style="border-left: none;">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-search me-1"></i>Search
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <?php if (!empty($searchTerm)): ?>
            <h3 class="mb-4">Search Results for "<span style="color: var(--accent-cyan);"><?php echo e($searchTerm); ?></span>"</h3>
            
            <?php if (empty($results)): ?>
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    No results found for "<?php echo e($searchTerm); ?>". Try searching for terms like "phishing", "password", "scam", "privacy", etc.
                </div>
            <?php else: ?>
                <div class="row g-4">
                    <?php foreach ($results as $result): ?>
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h4 class="card-title">
                                        <i class="fas fa-file-alt me-2" style="color: var(--accent-cyan);"></i>
                                        <?php echo e($result['title']); ?>
                                    </h4>
                                    <p class="card-text"><?php echo e($result['description']); ?></p>
                                    <a href="<?php echo e($result['url']); ?>" class="btn btn-outline-primary btn-sm">
                                        Learn More <i class="fas fa-arrow-right ms-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <div class="alert alert-info">
                <i class="fas fa-search me-2"></i>
                Enter a search term to find cybersecurity information.
            </div>
            
            <div class="row g-4 mt-3">
                <div class="col-12">
                    <h4 class="mb-3">Popular Topics</h4>
                </div>
                <?php 
                $popular = [
                    ['phishing', 'phishing.php', 'fa-fish', 'var(--accent-cyan)'],
                    ['passwords', 'passwords.php', 'fa-key', 'var(--accent-purple)'],
                    ['scams', 'scams.php', 'fa-user-secret', 'var(--danger-red)'],
                    ['privacy', 'privacy.php', 'fa-eye-slash', 'var(--accent-green)'],
                ];
                foreach ($popular as $p): ?>
                    <div class="col-md-3 col-6">
                        <a href="search.php?q=<?php echo $p[0]; ?>" class="text-decoration-none">
                            <div class="card text-center">
                                <div class="card-body">
                                    <i class="fas <?php echo $p[2]; ?> fa-2x mb-2" style="color: <?php echo $p[3]; ?>;"></i>
                                    <div class="card-title" style="font-size: 0.95rem; text-transform: capitalize;">
                                        <?php echo $p[0]; ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
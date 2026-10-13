<?php
$pageTitle = 'Home - National Cybersecurity Awareness Portal';
require_once 'includes/header.php';
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold">Stay Safe. Stay Secure. Be Cyber Aware.</h1>
                <p class="lead">Learn how to protect yourself, your family, and your community from online scams and cyber threats.</p>
                <div class="d-flex gap-3 mt-4 flex-wrap">
                    <a href="scams.php" class="btn btn-primary btn-lg">Learn Cybersecurity</a>
                    <a href="quiz.php" class="btn btn-outline-light btn-lg">Take the Cyber Safety Quiz</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="hero-illustration">
                    <i class="fas fa-shield-alt fa-5x"></i>
                    <i class="fas fa-lock fa-4x"></i>
                    <i class="fas fa-mobile-alt fa-4x"></i>
                    <i class="fas fa-laptop fa-4x"></i>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Scam Warning Section -->
<section class="scam-warning-section py-5">
    <div class="container">
        <div class="alert alert-warning scam-alert">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h3><i class="fas fa-exclamation-triangle"></i> Think Before You Click.</h3>
                    <p>Scammers may use fake messages, websites, prizes, job offers, account alerts, or emergencies to steal your money or personal information.</p>
                </div>
                <div class="col-md-4 text-center">
                    <a href="scams.php" class="btn btn-danger btn-lg">Learn How to Spot a Scam</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Cybersecurity Basics Section -->
<section class="basics-section py-5">
    <div class="container">
        <h2 class="text-center mb-5">Learn the Basics of Cybersecurity</h2>
        <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card topic-card">
                    <div class="card-body text-center">
                        <i class="fas fa-user-secret fa-3x text-danger"></i>
                        <h5 class="card-title">Online Scams</h5>
                        <p class="card-text">Learn how scammers trick people into sending money or personal information.</p>
                        <a href="scams.php" class="btn btn-outline-danger">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card topic-card">
                    <div class="card-body text-center">
                        <i class="fas fa-fish fa-3x text-warning"></i>
                        <h5 class="card-title">Phishing</h5>
                        <p class="card-text">Learn about phishing emails, SMS messages, and fake websites.</p>
                        <a href="phishing.php" class="btn btn-outline-warning">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card topic-card">
                    <div class="card-body text-center">
                        <i class="fas fa-key fa-3x text-success"></i>
                        <h5 class="card-title">Strong Passwords</h5>
                        <p class="card-text">Learn about strong passwords, password managers, and MFA.</p>
                        <a href="passwords.php" class="btn btn-outline-success">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card topic-card">
                    <div class="card-body text-center">
                        <i class="fas fa-eye-slash fa-3x text-info"></i>
                        <h5 class="card-title">Privacy</h5>
                        <p class="card-text">Learn how to protect your personal information.</p>
                        <a href="privacy.php" class="btn btn-outline-info">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card topic-card">
                    <div class="card-body text-center">
                        <i class="fas fa-globe fa-3x text-primary"></i>
                        <h5 class="card-title">Safe Browsing</h5>
                        <p class="card-text">Learn how to recognize suspicious websites and links.</p>
                        <a href="practices.php" class="btn btn-outline-primary">Learn More</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card topic-card">
                    <div class="card-body text-center">
                        <i class="fas fa-mobile-alt fa-3x text-secondary"></i>
                        <h5 class="card-title">Device Security</h5>
                        <p class="card-text">Learn about software updates, security tools, and backups.</p>
                        <a href="practices.php" class="btn btn-outline-secondary">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Safe vs Danger Section -->
<section class="safe-danger-section py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="card safe-card">
                    <div class="card-body">
                        <h4 class="text-success"><i class="fas fa-check-circle"></i> SAFE</h4>
                        <ul class="list-unstyled">
                            <li>✓ Verify the sender</li>
                            <li>✓ Use official websites</li>
                            <li>✓ Enable MFA</li>
                            <li>✓ Use unique passwords</li>
                            <li>✓ Keep software updated</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card danger-card">
                    <div class="card-body">
                        <h4 class="text-danger"><i class="fas fa-times-circle"></i> DANGER</h4>
                        <ul class="list-unstyled">
                            <li>✗ Share OTPs</li>
                            <li>✗ Click suspicious links</li>
                            <li>✗ Reuse passwords</li>
                            <li>✗ Send money to unknown accounts</li>
                            <li>✗ Share sensitive information</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Cybersecurity Checklist Section -->
<section class="checklist-section py-5">
    <div class="container">
        <h2 class="text-center mb-4">Cybersecurity Checklist</h2>
        <div class="checklist">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="check1">
                <label class="form-check-label" for="check1">I use strong and unique passwords.</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="check2">
                <label class="form-check-label" for="check2">I enable multi-factor authentication.</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="check3">
                <label class="form-check-label" for="check3">I keep my phone and computer updated.</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="check4">
                <label class="form-check-label" for="check4">I avoid clicking suspicious links.</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="check5">
                <label class="form-check-label" for="check5">I verify messages before sending money.</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="check6">
                <label class="form-check-label" for="check6">I never share OTPs.</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="check7">
                <label class="form-check-label" for="check7">I use privacy settings on social media.</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="check8">
                <label class="form-check-label" for="check8">I regularly back up important files.</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="check9">
                <label class="form-check-label" for="check9">I use secure Wi-Fi.</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="check10">
                <label class="form-check-label" for="check10">I lock my devices when not in use.</label>
            </div>
            <div class="score-display mt-3">
                <strong>Cyber Safety Score: <span id="safetyScore">0%</span></strong>
            </div>
        </div>
    </div>
</section>

<!-- Phishing Awareness Section -->
<section class="phishing-awareness py-5">
    <div class="container">
        <h2 class="text-center">Phishing Awareness</h2>
        <p class="text-center">Learn to recognize and avoid phishing attacks that try to steal your personal information.</p>
        <div class="text-center mt-4">
            <a href="phishing.php" class="btn btn-warning btn-lg">Learn More</a>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="faq-section py-5">
    <div class="container">
        <h2 class="text-center mb-4">Frequently Asked Questions</h2>
        <div class="accordion" id="faqAccordion">
            <div class="accordion-item">
                <h3 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                        What is phishing?
                    </button>
                </h3>
                <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                    <div class="accordion-body">Phishing is a type of online scam where criminals pretend to be a trusted person or organization to trick you into giving away information such as passwords, OTPs, or banking details.</div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
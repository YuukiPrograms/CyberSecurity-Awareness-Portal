<?php
$pageTitle = 'Password Security - National Cybersecurity Awareness Portal';
require_once 'includes/header.php';
?>

<section class="passwords-section py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="mb-3">Strong Passwords</h1>
            <p class="lead">Your password is the key to your digital life — make it strong.</p>
        </div>
        
        <div class="row g-4 mb-4">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <h3 class="mb-3"><i class="fas fa-shield-alt me-2" style="color: var(--accent-cyan);"></i>Why Strong Passwords Matter</h3>
                        <p>Passwords are the keys to your digital life. Weak passwords make it easy for criminals to access your accounts, steal your identity, and cause financial damage.</p>
                        
                        <h4 class="mt-4 mb-3"><i class="fas fa-check-circle me-2" style="color: var(--accent-green);"></i>Characteristics of Strong Passwords</h4>
                        <ul>
                            <li>At least 12 characters long</li>
                            <li>Mix of uppercase and lowercase letters</li>
                            <li>Include numbers and special characters</li>
                            <li>Not based on personal information</li>
                            <li>Unique for each account</li>
                        </ul>
                        
                        <h4 class="mt-4 mb-3"><i class="fas fa-star me-2" style="color: var(--accent-gold);"></i>Password Best Practices</h4>
                        <ul>
                            <li>Use passphrases (combinations of random words)</li>
                            <li>Enable multi-factor authentication (MFA)</li>
                            <li>Use a password manager</li>
                            <li>Never reuse passwords across accounts</li>
                            <li>Change passwords if you suspect a breach</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mb-3"><i class="fas fa-key me-2" style="color: var(--accent-cyan);"></i>Password Strength Checker</h3>
                        <p class="text-white-50" style="font-size: 0.85rem;">
                            <i class="fas fa-lock me-1"></i>Your password is checked only in your browser and is not stored.
                        </p>
                        
                        <div class="mb-3">
                            <label for="passwordInput" class="form-label">Enter a password to test:</label>
                            <input type="password" class="form-control" id="passwordInput" placeholder="Type a password...">
                        </div>
                        
                        <div class="password-strength-meter">
                            <div class="strength-bar" id="strengthBar"></div>
                        </div>
                        
                        <div class="score-display mt-3">
                            <strong>Strength: <span id="strengthText">-</span></strong>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="mb-3"><i class="fas fa-vault me-2" style="color: var(--accent-purple);"></i>Password Managers</h4>
                        <p>Password managers help you:</p>
                        <ul>
                            <li>Generate strong, unique passwords</li>
                            <li>Store passwords securely</li>
                            <li>Auto-fill login forms</li>
                            <li>Sync across devices</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card h-100">
                    <div class="card-body">
                        <h4 class="mb-3"><i class="fas fa-mobile-alt me-2" style="color: var(--accent-green);"></i>Multi-Factor Authentication (MFA)</h4>
                        <p>MFA adds an extra layer of security by requiring:</p>
                        <ul>
                            <li>Something you know (password)</li>
                            <li>Something you have (phone, token)</li>
                            <li>Something you are (fingerprint, face)</li>
                        </ul>
                        <p class="mb-0"><strong style="color: var(--accent-cyan);">Always enable MFA when available!</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
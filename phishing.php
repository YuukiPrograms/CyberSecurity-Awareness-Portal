<?php
$pageTitle = 'Phishing Awareness - National Cybersecurity Awareness Portal';
require_once 'includes/header.php';
?>

<section class="phishing-section py-5">
    <div class="container">
        <h1 class="mb-4">Phishing</h1>
        
        <div class="alert alert-info mb-4">
            <h4>What is Phishing?</h4>
            <p>Phishing is an online scam where criminals pretend to be a trusted person or organization to trick you into giving away information such as passwords, OTPs, or banking details.</p>
        </div>
        
        <div class="row mb-4">
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h4>Common Phishing Methods</h4>
                        <ul>
                            <li><strong>Email Phishing:</strong> Fake emails from banks, companies, or government agencies</li>
                            <li><strong>SMS Phishing (Smishing):</strong> Text messages with malicious links</li>
                            <li><strong>Social Media Phishing:</strong> Fake accounts and messages</li>
                            <li><strong>Fake Websites:</strong> Sites that look like legitimate services</li>
                            <li><strong>Voice Phishing (Vishing):</strong> Phone calls from fake representatives</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h4>Red Flags to Watch For</h4>
                        <ul>
                            <li><strong>Urgent language</strong> - "Act now or your account will be closed!"</li>
                            <li><strong>Unknown sender</strong> - Email addresses that don't match the organization</li>
                            <li><strong>Suspicious links</strong> - URLs that look slightly different from official ones</li>
                            <li><strong>Credential requests</strong> - Asking for passwords, OTPs, or PINs</li>
                            <li><strong>Unexpected attachments</strong> - Files you weren't expecting</li>
                            <li><strong>Poor spelling/grammar</strong> - Many phishing attempts have errors</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Interactive Phishing Simulator -->
        <div class="card mb-4">
            <div class="card-header bg-warning">
                <h3>Interactive Phishing Simulator</h3>
                <p class="mb-0">Test your ability to spot phishing attempts!</p>
            </div>
            <div class="card-body">
                <div class="simulated-message p-4 border rounded mb-3">
                    <p><strong>From:</strong> security@bank0famerica.com</p>
                    <p><strong>Subject:</strong> URGENT! Account Verification Required</p>
                    <hr>
                    <p>Dear Valued Customer,</p>
                    <p>URGENT! Your account has been selected for verification.</p>
                    <p>Click here immediately to prevent your account from being suspended.</p>
                    <button class="btn btn-danger btn-lg">[ VERIFY ACCOUNT ]</button>
                    <p class="mt-3 text-muted">This is an automated message. Do not reply.</p>
                </div>
                
                <h5>Is this message safe or suspicious?</h5>
                <div class="mt-3">
                    <button class="btn btn-success me-2" onclick="checkPhishingAnswer('safe')">Safe</button>
                    <button class="btn btn-danger" onclick="checkPhishingAnswer('suspicious')">Suspicious</button>
                </div>
                
                <div id="phishingResult" class="mt-3"></div>
            </div>
        </div>
        
        <!-- What to Do -->
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h3>What to Do If You Suspect Phishing</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <h4>Immediate Actions</h4>
                        <ol>
                            <li>Do not click any links or download attachments</li>
                            <li>Do not reply to the message</li>
                            <li>Report the message to the legitimate organization</li>
                            <li>Delete the message</li>
                        </ol>
                    </div>
                    <div class="col-md-6">
                        <h4>If You Already Clicked</h4>
                        <ol>
                            <li>Disconnect from the internet immediately</li>
                            <li>Run a security scan on your device</li>
                            <li>Change your passwords from a different device</li>
                            <li>Contact your bank if financial information was involved</li>
                            <li>Monitor your accounts for suspicious activity</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
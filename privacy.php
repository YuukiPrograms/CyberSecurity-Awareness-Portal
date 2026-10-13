<?php
$pageTitle = 'Privacy Protection - National Cybersecurity Awareness Portal';
require_once 'includes/header.php';
?>

<section class="privacy-section py-5">
    <div class="container">
        <h1 class="mb-4">Privacy</h1>
        
        <div class="alert alert-info mb-4">
            <h4>Why Privacy Matters</h4>
            <p>Your personal information is valuable. Criminals can use it for identity theft, fraud, and other malicious purposes. Protecting your privacy is essential for your safety.</p>
        </div>
        
        <div class="card mb-4">
            <div class="card-body">
                <h3>Information You Should Protect</h3>
                <div class="row">
                    <div class="col-md-6">
                        <ul>
                            <li><strong>Full name</strong> - Can be used for identity theft</li>
                            <li><strong>Address</strong> - Reveals your location</li>
                            <li><strong>Phone number</strong> - Can be used for scams</li>
                            <li><strong>Email address</strong> - Target for phishing</li>
                            <li><strong>Birthday</strong> - Used in identity verification</li>
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <ul>
                            <li><strong>Government IDs</strong> - Critical for identity theft</li>
                            <li><strong>Banking information</strong> - Direct financial risk</li>
                            <li><strong>OTPs</strong> - NEVER share these</li>
                            <li><strong>Passwords</strong> - Keep them secret</li>
                            <li><strong>Photos</strong> - Can reveal location and habits</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card mb-4">
            <div class="card-body">
                <h3>Before You Post, Ask Yourself</h3>
                <div class="checklist">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="privacy1">
                        <label class="form-check-label" for="privacy1">Does this reveal my location?</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="privacy2">
                        <label class="form-check-label" for="privacy2">Does this reveal private information?</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="privacy3">
                        <label class="form-check-label" for="privacy3">Could someone misuse this information?</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="privacy4">
                        <label class="form-check-label" for="privacy4">Would I be comfortable with strangers seeing this?</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="privacy5">
                        <label class="form-check-label" for="privacy5">Does this expose another person's information?</label>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-body">
                <h3>Privacy Protection Tips</h3>
                <ul>
                    <li>Review and adjust privacy settings on social media</li>
                    <li>Think before sharing personal information online</li>
                    <li>Use privacy-focused browsers and search engines</li>
                    <li>Be cautious about what you share in public posts</li>
                    <li>Regularly review apps that have access to your data</li>
                    <li>Use strong privacy settings on messaging apps</li>
                    <li>Be careful about sharing your location</li>
                    <li>Read privacy policies before using services</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
<?php
$pageTitle = 'Safety Practices - National Cybersecurity Awareness Portal';
require_once 'includes/header.php';
?>

<section class="practices-section py-5">
    <div class="container">
        <h1 class="mb-4">Safety Practices</h1>
        
        <div class="alert alert-info mb-4">
            <h4>Safe Internet Practices</h4>
            <p>Follow these guidelines to stay safe online and protect yourself from cyber threats.</p>
        </div>
        
        <!-- Interactive Cybersecurity Checklist -->
        <div class="card mb-4">
            <div class="card-body">
                <h3>Cybersecurity Checklist</h3>
                <p>Check all the items that apply to you:</p>
                
                <div class="checklist">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="practice1">
                        <label class="form-check-label" for="practice1">I use strong and unique passwords.</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="practice2">
                        <label class="form-check-label" for="practice2">I enable multi-factor authentication.</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="practice3">
                        <label class="form-check-label" for="practice3">I keep my phone and computer updated.</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="practice4">
                        <label class="form-check-label" for="practice4">I avoid clicking suspicious links.</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="practice5">
                        <label class="form-check-label" for="practice5">I verify messages before sending money.</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="practice6">
                        <label class="form-check-label" for="practice6">I never share OTPs.</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="practice7">
                        <label class="form-check-label" for="practice7">I use privacy settings on social media.</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="practice8">
                        <label class="form-check-label" for="practice8">I regularly back up important files.</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="practice9">
                        <label class="form-check-label" for="practice9">I use secure Wi-Fi.</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="practice10">
                        <label class="form-check-label" for="practice10">I lock my devices when not in use.</label>
                    </div>
                    
                    <div class="score-display mt-3">
                        <strong>Cyber Safety Score: <span id="safetyScore">0%</span></strong>
                        <p id="safetyFeedback" class="mt-2"></p>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Additional Safety Tips -->
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h4>Safe Browsing Tips</h4>
                        <ul>
                            <li>Look for HTTPS in the URL</li>
                            <li>Check for padlock icon in address bar</li>
                            <li>Avoid clicking on pop-up ads</li>
                            <li>Use ad blockers when possible</li>
                            <li>Be careful when downloading files</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-body">
                        <h4>Device Security Tips</h4>
                        <ul>
                            <li>Keep your operating system updated</li>
                            <li>Install antivirus software</li>
                            <li>Use a firewall</li>
                            <li>Encrypt sensitive data</li>
                            <li>Regularly backup your files</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
<?php
$pageTitle = 'Contact Us - National Cybersecurity Awareness Portal';
require_once 'includes/header.php';
require_once 'includes/database.php';
require_once 'includes/auth.php';

$conn = getDBConnection();

$success = false;
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!validateCSRFToken($_POST['csrf_token'] ?? '')) {
        $errors[] = 'Invalid security token. Please try again.';
    } else {
        $name    = trim($_POST['name'] ?? '');
        $email   = trim($_POST['email'] ?? '');
        $subject = trim($_POST['subject'] ?? '');
        $message = trim($_POST['message'] ?? '');
        
        if (empty($name)) $errors[] = 'Name is required.';
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Valid email is required.';
        if (empty($subject)) $errors[] = 'Subject is required.';
        if (empty($message)) $errors[] = 'Message is required.';
        
        if (empty($errors)) {
            try {
                $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
                $stmt->execute([$name, $email, $subject, $message]);
                $success = true;
            } catch (PDOException $e) {
                error_log("Contact form error: " . $e->getMessage());
                $errors[] = 'An error occurred. Please try again later.';
            }
        }
    }
}
?>

<section class="contact-section py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h1 class="mb-3">Contact Us</h1>
            <p class="lead">Have questions about cybersecurity? We're here to help.</p>
        </div>
        
        <?php if ($success): ?>
            <div class="alert alert-success mb-4">
                <i class="fas fa-check-circle me-2"></i>Your message has been sent successfully!
            </div>
        <?php endif; ?>
        
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger mb-4">
                <ul class="mb-0">
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
        
        <div class="row g-4">
            <div class="col-lg-7">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mb-4">
                            <i class="fas fa-paper-plane me-2" style="color: var(--accent-cyan);"></i>Send Us a Message
                        </h3>
                        <form method="POST" action="">
                            <input type="hidden" name="csrf_token" value="<?php echo generateCSRFToken(); ?>">
                            
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                           value="<?php echo e($_POST['name'] ?? ''); ?>" required>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                           value="<?php echo e($_POST['email'] ?? ''); ?>" required>
                                </div>
                            </div>
                            
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject"
                                       value="<?php echo e($_POST['subject'] ?? ''); ?>" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="6" required><?php echo e($_POST['message'] ?? ''); ?></textarea>
                            </div>
                            
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="fas fa-paper-plane me-2"></i>Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-5">
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="mb-3">
                            <i class="fas fa-info-circle me-2" style="color: var(--accent-cyan);"></i>Contact Information
                        </h4>
                        <p>Have questions about cybersecurity? We're here to help!</p>
                        <hr style="border-color: var(--glass-border);">
                        <p class="mb-3">
                            <i class="fas fa-info-circle me-2" style="color: var(--accent-cyan);"></i>
                            This is an educational project designed to raise awareness about cybersecurity.
                        </p>
                        <p class="mb-0">
                            <i class="fas fa-shield-alt me-2" style="color: var(--accent-green);"></i>
                            Stay safe online and protect your digital identity.
                        </p>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-3">
                            <i class="fas fa-clock me-2" style="color: var(--accent-gold);"></i>Response Time
                        </h4>
                        <p class="mb-0">We typically respond to inquiries within 2-3 business days.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
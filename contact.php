<?php 
    require_once 'includes/db_connect.php';
    $pageTitle = "Contact Us";

    $errors = [];
    $success_message = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['contact_form'])) {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $subject = trim($_POST['subject']);
        $message = trim($_POST['message']);

        if (empty($name)) { $errors[] = "Name is required."; }
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) { $errors[] = "A valid email is required."; }
        if (empty($subject)) { $errors[] = "Subject is required."; }
        if (empty($message)) { $errors[] = "Message is required."; }

        if (empty($errors)) {
            $sql = "INSERT INTO contacts (name, email, subject, message) VALUES (?, ?, ?, ?)";
            if ($stmt = mysqli_prepare($conn, $sql)) {
                mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $subject, $message);
                if (mysqli_stmt_execute($stmt)) {
                    $success_message = "Thank you for contacting us! We will get back to you shortly.";
                } else {
                    $errors[] = "Something went wrong. Please try again.";
                }
                mysqli_stmt_close($stmt);
            }
        }
    }
    
    require_once 'includes/header.php'; 
?>

<section class="page-header">
    <div class="container">
        <h1>Contact Us</h1>
        <p>We're here to help. Send us a message or give us a call.</p>
    </div>
</section>

<section class="contact-section section-padding">
    <div class="container">
        <div class="grid-2">
            <div class="contact-form-wrapper">
                <h3>Send Us A Message</h3>

                <!-- Display Messages -->
                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <?php foreach ($errors as $error): ?><p><?php echo htmlspecialchars($error); ?></p><?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <?php if ($success_message): ?>
                    <div class="alert alert-success">
                        <p><?php echo htmlspecialchars($success_message); ?></p>
                    </div>
                <?php endif; ?>

                <form action="contact.php" method="POST">
                    <input type="hidden" name="contact_form">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Your Name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Your Email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="subject" placeholder="Subject" required>
                    </div>
                    <div class="form-group">
                        <textarea name="message" placeholder="Your Message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>
            <div class="contact-info-wrapper">
                <h3>Get In Touch</h3>
                <p>Feel free to reach out to us through any of the following methods. We look forward to hearing from you.</p>
                <ul>
                    <li>
                        <i class="fa-solid fa-map-marker-alt"></i>
                        <div>
                            <h4>Our Location</h4>
                            <p>KG 2 Kacyiru, Kigali, Rwanda</p>
                        </div>
                    </li>
                    <li>
                        <i class="fa-solid fa-phone"></i>
                        <div>
                            <h4>Phone Number</h4>
                            <p>+250 788 854 243</p>
                        </div>
                    </li>
                    <li>
                        <i class="fa-solid fa-envelope"></i>
                        <div>
                            <h4>Email Address</h4>
                            <p>byiringirourban20@gmail.com</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Google Map Section -->
<section class="map-section">
    <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3987.525791234177!2d30.09134061523898!3d-1.941949137233802!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x19dca6a38f310f7b%3A0x895578332158097b!2sKigali%20Convention%20Centre!5e0!3m2!1sen!2srw!4v1662031184772!5m2!1sen!2srw" 
        width="100%" 
        height="450" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy" 
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</section>

<?php require_once 'includes/footer.php'; ?>

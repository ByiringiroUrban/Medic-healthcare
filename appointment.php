<?php 
    require_once 'includes/db_connect.php';
    $pageTitle = "Book an Appointment";
    require_once 'includes/header.php'; 
?>

<section class="page-header">
    <div class="container">
        <h1>Book an Appointment</h1>
        <p>Fill out the form below to schedule your visit with one of our expert doctors.</p>
    </div>
</section>

<section class="appointment-page-section section-padding">
    <div class="container">

        <!-- Display Success/Error Messages Here -->
        <div class="form-messages">
            <?php
            if (isset($_SESSION['form_errors']) && !empty($_SESSION['form_errors'])) {
                echo '<div class="alert alert-danger">';
                foreach ($_SESSION['form_errors'] as $error) {
                    echo '<p>' . htmlspecialchars($error) . '</p>';
                }
                echo '</div>';
                unset($_SESSION['form_errors']); // Clear messages after displaying
            }
            if (isset($_SESSION['form_success']) && !empty($_SESSION['form_success'])) {
                echo '<div class="alert alert-success"><p>' . htmlspecialchars($_SESSION['form_success']) . '</p></div>';
                unset($_SESSION['form_success']); // Clear message after displaying
            }
            ?>
        </div>

        <div class="grid-2">
            <div class="appointment-form">
                <div class="section-title" style="text-align: left;">
                    <span class="subtitle">Make An Appointment</span>
                    <h2>We Are Here For You</h2>
                </div>
                <form action="handle_appointment.php" method="POST">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Your Name</label>
                            <input type="text" id="name" name="name" placeholder="John Doe" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Your Email</label>
                            <input type="email" id="email" name="email" placeholder="you@example.com" required>
                        </div>
                    </div>
                    <div class="form-row">
                         <div class="form-group">
                            <label for="phone">Your Phone</label>
                            <input type="tel" id="phone" name="phone" placeholder="+123 456 7890" required>
                        </div>
                        <div class="form-group">
                            <label for="service">Select Service</label>
                            <select id="service" name="service" required>
                                <option value="">-- Please choose a service --</option>
                                <option value="Cardiology">Cardiology</option>
                                <option value="Dental Care">Dental Care</option>
                                <option value="Neurology">Neurology</option>
                            </select>
                        </div>
                    </div>
                     <div class="form-row">
                        <div class="form-group">
                            <label for="date">Select Date</label>
                            <input type="date" id="date" name="date" required>
                        </div>
                        <div class="form-group">
                             <label for="time">Select Time</label>
                            <input type="time" id="time" name="time" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="message">Your Message (Optional)</label>
                        <textarea id="message" name="message" placeholder="Any additional information..."></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Request</button>
                </form>
            </div>
            <div class="appointment-image">
                <img src="https://placehold.co/550x600/e0f2f1/333333?text=Book+Online" alt="Doctors looking at a tablet">
            </div>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>

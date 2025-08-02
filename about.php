<?php 
    $pageTitle = "About Us";
    require_once 'includes/header.php'; 
?>

<!-- Page Header -->
<section class="page-header">
    <div class="container">
        <h1>About Us</h1>
        <p> improve lives through compassionate care.</p>
    </div>
</section>

<!-- Reusing the About Section from the homepage -->
<section class="about-section section-padding">
    <div class="container">
        <div class="grid-2">
            <div class="about-text">
                <span class="subtitle">About Our Clinic</span>
                <h2>Tackle The Challenge Of Delivering Health Care</h2>
                <p>We are a modern healthcare platform dedicated to providing accessible, reliable, and expert medical services. Our mission is to improve lives through compassionate care, advanced technology, and a strong commitment to patient well-being..</p>
                <ul>
                    <li><i class="fa-solid fa-check"></i> Consultations With Specialized Pediatricians</li>
                    <li><i class="fa-solid fa-check"></i> A Wide Range Of Laboratory Studies</li>
                    <li><i class="fa-solid fa-check"></i> Ultrasound Examination</li>
                </ul>
                <a href="contact.php" class="btn btn-primary">Contact Us</a>
            </div>
            <div class="about-image">
                <img src="https://mercyfamilymedicalclinic.com.au/wp-content/uploads/2023/06/Mercy-Medical-Team-1.jpg" alt="Our Team">
            </div>
        </div>
    </div>
</section>

<!-- Reusing the Stats Section -->
<section class="stats-section">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item">
                <div class="icon-wrapper"><i class="fa-solid fa-user-md"></i></div>
                <p><span class="count">540+</span><br>Expert Doctors</p>
            </div>
            <div class="stat-item">
                <div class="icon-wrapper"><i class="fa-solid fa-check-circle"></i></div>
                <p><span class="count">990+</span><br>Successful Story</p>
            </div>
            <div class="stat-item">
                <div class="icon-wrapper"><i class="fa-solid fa-globe"></i></div>
                <p><span class="count">3500+</span><br>Global Presence</p>
            </div>
            <div class="stat-item">
                <div class="icon-wrapper"><i class="fa-solid fa-trophy"></i></div>
                <p><span class="count">54+</span><br>Experiences</p>
            </div>
        </div>
    </div>
</section>

<!-- Reusing the Doctors Section -->
<section class="doctors-section section-padding">
    <div class="container">
        <div class="section-title">
            <span class="subtitle">Our Team</span>
            <h2>Our Expert Doctor's</h2>
        </div>
        <div class="doctors-grid">
            <div class="doctor-card">
                <img src="https://www.costamedicalservices.com/wp-content/uploads/2023/11/portrait-attractive-male-doctor-1-683x1024.jpg" alt="Doctor 1">
                <div class="doctor-info">
                    <h3>Dr. Byiringiro Urban</h3>
                    <span>Cardiologist</span>
                </div>
            </div>
            <div class="doctor-card active">
                <img src="https://www.costamedicalservices.com/wp-content/uploads/2023/11/portrait-attractive-male-doctor-1-683x1024.jpg" alt="Doctor 2">
                <div class="doctor-info">
                    <h3>Dr. Mugisha Gentil</h3>
                    <span>General Practitioner</span>
                </div>
            </div>
            <div class="doctor-card">
                <img src="https://thumbs.dreamstime.com/b/smart-doctor-5645557.jpg" alt="Doctor 3">
                <div class="doctor-info">
                    <h3>Dr. Irabaruta willy Norbert</h3>
                    <span>Neurologist</span>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>

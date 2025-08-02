    </main>

    <!-- =======================
    Footer
    ======================== -->
    <footer class="footer">
        <div class="subscribe-bar">
            <div class="container">
                <div class="subscribe-content">
                    <div>
                        <h3>Subscribe Now</h3>
                        <p>Get our latest news & update regularly</p>
                    </div>
                    <!-- UPDATED: Form now correctly points to the handler script and includes necessary attributes -->
                    <form action="handle_subscribe.php" method="POST" class="subscribe-form">
                        <input type="email" name="email" placeholder="Enter Your Email" required>
                        <button type="submit" class="btn btn-primary">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
       <div class="main-footer">
            <div class="container">
                <div class="footer-grid">
                    <div class="footer-widget">
                        <a href="index.php" class="logo">
                            <i class="fa-solid fa-plus"></i> Medic
                        </a>
                        <p>Stay updated with our latest health tips, medical breakthroughs, and clinic announcements. From new services to wellness advice, we keep you informed and empowered to take charge of your health.</p>
                        <div class="social-links">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="footer-widget">
                        <h3>Departments</h3>
                        <ul>
                            <li><a href="#">Medicine</a></li>
                            <li><a href="#">Neurology</a></li>
                            <li><a href="#">Eye Care</a></li>
                            <li><a href="#">Cardiology</a></li>
                            <li><a href="#">Dental Care</a></li>
                            <li><a href="#">Pulmonary</a></li>
                        </ul>
                    </div>
                    <div class="footer-widget">
                        <h3>Opening Hours</h3>
                        <ul>
                            <li><span>Mon-Sat:</span> 9:00AM - 10:00PM</li>
                            <li><span>Sun:</span> Closed</li>
                        </ul>
                    </div>
                    <div class="footer-widget">
                        <h3>Get In Touch</h3>
                        <ul>
                            <li><i class="fa-solid fa-phone"></i> +250 788854243</li>
                            <li><i class="fa-solid fa-envelope"></i> byiringirourban20@gmail.com</li>
                            <li><i class="fa-solid fa-map-marker-alt"></i> Kigali Rwanda Kacyiru </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-bar">
            <div class="container">
                <p>&copy; Copyright <?php echo date("Y"); ?>. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Swiper.js -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- Your Custom JS -->
    <script src="assets/js/script.js"></script>
</body>
</html>

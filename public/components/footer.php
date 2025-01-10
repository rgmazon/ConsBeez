<?php
// Get the current page's filename
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!-- Footer -->
<footer>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-3 logo-container">
                    <img src="public/img/logos/logo.png" alt="ConsBeez Logo" class="logo">
                </div>
                <div class="col-md-6">
                    <nav class="footer-nav">
                        <a href="index.php" class=" <?= $current_page == 'index.php' ? 'active' : '' ?>">Home</a>
                        <a href="services.php" class=" <?= $current_page == 'services.php' ? 'active' : '' ?>">Services</a>
                        <a href="ourstory.php" class=" <?= $current_page == 'ourstory.php' ? 'active' : '' ?>">Our Story</a>
                        <a href="joinus.php" class=" <?= $current_page == 'joinus.php' ? 'active' : '' ?>">Join Us</a>
                        <a href="contact.php" class=" <?= $current_page == 'contact.php' ? 'active' : '' ?>">Contact Us</a>
                    </nav>
                </div>
                <div class="col-md-3">
                    <div class="social-icons">
                        <a href="#" aria-label="LinkedIn">
                            <img src="public/img/logos/linkedin.png" alt="LinkedIn">
                        </a>
                        <a href="#" aria-label="Facebook">
                            <img src="public/img/logos/facebook.png" alt="Facebook">
                        </a>
                        <a href="#" aria-label="WhatsApp">
                            <img src="public/img/logos/whatsapp.png" alt="WhatsApp">
                        </a>
                        <a href="#" aria-label="Email">
                            <img src="public/img/logos/email.png" alt="Email">
                        </a>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <p>© <?php echo date('Y'); ?> ConsBeez Call Center Services. All rights reserved.</p>
                <p class="text-muted" style="font-size: 10px;">Designed and Developed by @rgmazon.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
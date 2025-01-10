<?php
// Get the current page's filename
$current_page = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="public/img/logos/logo.png" alt="ConsBeez Logo">
        </a>
            <button class="navbar-toggler custom-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-expanded="false">
                <div class="custom-icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link navlink <?= $current_page == 'index.php' ? 'active' : '' ?>" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navlink <?= $current_page == 'services.php' ? 'active' : '' ?>" href="services.php">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navlink <?= $current_page == 'ourstory.php' ? 'active' : '' ?>" href="ourstory.php">Our Story</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navlink <?= $current_page == 'joinus.php' ? 'active' : '' ?>" href="joinus.php">Join Us</a>
                    </li>
                </ul>
                <div class="contact-btn-container">
                    <a class="nav-link contact-btn" href="contact.php">Contact Us</a>
                </div>
            </div>
        </div>
    </nav>

    <script>
        document.querySelector('.navbar-toggler').addEventListener('click', function () {
            this.classList.toggle('collapsed');
        });
    </script>

<script>
        let lastScrollTop = 0;
        const navbar = document.querySelector('.navbar');

        window.addEventListener('scroll', () => {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            if (scrollTop > lastScrollTop) {
                // Scrolling down
                navbar.classList.add('hidden');
            } else {
                // Scrolling up
                navbar.classList.remove('hidden');
            }
            lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; // For mobile or at top
        });
    </script>
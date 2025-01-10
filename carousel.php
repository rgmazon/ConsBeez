<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimonials Carousel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .testimonials {
            padding: 80px 0;
        }

        .mini-title {
            color: #FF8C00;
            font-size: 1rem;
            margin-bottom: 1rem;
            display: block;
        }

        .heading {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 1.5rem;
        }

        .heading .highlight {
            color: #FF4500;
        }

        .testimonial-carousel {
            position: relative;
            overflow: hidden;
            height: 100%;
        }

        .testimonial-track {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }

        .testimonial-card {
            background-color: #FFF9F0;
            padding: 40px;
            border-radius: 8px;
            width: 100%;
            flex-shrink: 0;
        }

        .testimonial-text {
            font-size: 2rem;
            line-height: 1.4;
            margin-bottom: 2rem;
            font-weight: 300;
        }

        .highlight-orange {
            color: #FF4500;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            overflow: hidden;
        }

        .user-name {
            font-size: 1.25rem;
            color: #333;
            margin: 0;
        }

        .stars {
            color: #FFD700;
            font-size: 1.25rem;
        }

        .nav-button {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background-color: #E5E5E5;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s;
        }

        .nav-button:hover {
            background-color: #D5D5D5;
        }

        .nav-buttons {
            display: flex;
            gap: 12px;
            margin-top: 2rem;
        }
    </style>
</head>
<body>
    <section class="testimonials">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <span class="mini-title">Testimonials</span>
                    <h2 class="heading">What Our Clients <span class="highlight">Say</span>.</h2>
                    <p class="lead">
                        At ConsBeez, we pride ourselves on delivering exceptional service and 
                        tailored solutions that make a real difference for our clients. Here's what 
                        some of our clients have to say about their experiences working with us, 
                        highlighting the impact we've made in their businesses and projects.
                    </p>
                    <div class="nav-buttons">
                        <button class="nav-button prev-btn">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M15 18l-6-6 6-6"/>
                            </svg>
                        </button>
                        <button class="nav-button next-btn">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M9 18l6-6-6-6"/>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="testimonial-carousel">
                        <div class="testimonial-track">
                            <div class="testimonial-card">
                                <p class="testimonial-text">
                                    "<span class="highlight-orange">Exceeded my expectations</span> and will be working with them 
                                    <span class="highlight-orange">again</span> soon. ROI has been 
                                    <span class="highlight-orange">terrific</span> for me."
                                </p>
                                <div class="user-profile">
                                    <div class="user-avatar">
                                        <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0OCIgaGVpZ2h0PSI0OCIgdmlld0JveD0iMCAwIDQ4IDQ4Ij48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjMDAyQjdGIi8+PHBhdGggZD0iTTAgMGgyNHYyNEgweiIgZmlsbD0iIzAwMkI3RiIvPjxwYXRoIGQ9Ik0wIDBoMjR2MjRIMHoiIGZpbGw9IiNGRkYiLz48cGF0aCBkPSJNMTIgMGgyNHYyNEgxMnoiIGZpbGw9IiNFRjNGNEUiLz48L3N2Zz4=" alt="Australian flag" width="48" height="48">
                                    </div>
                                    <div>
                                        <h3 class="user-name">rollickc69</h3>
                                        <div class="stars">★★★★★</div>
                                    </div>
                                </div>
                            </div>
                            <div class="testimonial-card">
                                <p class="testimonial-text">
                                    "The team at ConsBeez has been <span class="highlight-orange">incredible</span> to work with. 
                                    Their <span class="highlight-orange">dedication</span> and expertise are unmatched."
                                </p>
                                <div class="user-profile">
                                    <div class="user-avatar">
                                        <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0OCIgaGVpZ2h0PSI0OCIgdmlld0JveD0iMCAwIDQ4IDQ4Ij48cmVjdCB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSIjRUYzRjRFIi8+PHBhdGggZD0iTTI0IDEybDEyIDI0SDEyeiIgZmlsbD0iI0ZGRiIvPjwvc3ZnPg==" alt="Client avatar" width="48" height="48">
                                    </div>
                                    <div>
                                        <h3 class="user-name">sarah_m</h3>
                                        <div class="stars">★★★★★</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const track = document.querySelector('.testimonial-track');
            const cards = track.querySelectorAll('.testimonial-card');
            const prevBtn = document.querySelector('.prev-btn');
            const nextBtn = document.querySelector('.next-btn');
            let currentIndex = 0;
            let autoScrollInterval;
            const autoScrollDelay = 5000; // 5 seconds

            function updateCarousel() {
                track.style.transform = `translateX(-${currentIndex * 100}%)`;
            }

            function nextCard() {
                currentIndex = (currentIndex + 1) % cards.length;
                updateCarousel();
            }

            function prevCard() {
                currentIndex = (currentIndex - 1 + cards.length) % cards.length;
                updateCarousel();
            }

            function startAutoScroll() {
                autoScrollInterval = setInterval(nextCard, autoScrollDelay);
            }

            function stopAutoScroll() {
                clearInterval(autoScrollInterval);
            }

            prevBtn.addEventListener('click', () => {
                stopAutoScroll();
                prevCard();
                startAutoScroll();
            });

            nextBtn.addEventListener('click', () => {
                stopAutoScroll();
                nextCard();
                startAutoScroll();
            });

            track.addEventListener('mouseenter', stopAutoScroll);
            track.addEventListener('mouseleave', startAutoScroll);

            startAutoScroll();
        });
    </script>
</body>
</html>
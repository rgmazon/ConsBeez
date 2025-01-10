
<head>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <style>
        .gallery {
            overflow: hidden;
            background: #f5f5f5;
        }

        .gallery-container {
            display: flex;
            gap: 8px;
            padding: 8px;
        }

        .gallery-column {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 8px;
            min-width: 0;
            height: 600px;
            overflow: hidden;
        }

        .scroll-content {
            display: flex;
            flex-direction: column;
            gap: 8px;
            animation-duration: 30s;
            animation-timing-function: linear;
            animation-iteration-count: infinite;
            animation-fill-mode: forwards;
        }

        .image-card {
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            cursor: pointer;
            background: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .image-card img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.3s ease;
        }

        .image-card:hover img {
            transform: scale(1.05);
        }

        .scroll-up {
            animation-name: scrollUp;
        }

        .scroll-down {
            animation-name: scrollDown;
        }

        @keyframes scrollUp {
            0% { transform: translateY(0); }
            100% { transform: translateY(calc(-100% + 600px)); }
        }

        @keyframes scrollDown {
            0% { transform: translateY(calc(-100% + 600px)); }
            100% { transform: translateY(0); }
        }

        /* Responsive adjustments */
        @media (max-width: 1200px) {
            .gallery-column {
                height: 500px;
            }
        }

        @media (max-width: 992px) {
            .gallery-column {
                height: 400px;
            }
        }

        @media (max-width: 768px) {
            .gallery-column {
                height: 300px;
            }
        }

        @media (max-width: 576px) {
            .gallery-container {
                gap: 4px;
            }
            .gallery-column {
                height: 200px;
            }
            .image-card {
                border-radius: 4px;
            }
            .scroll-content {
                animation-duration: 15s;
            }
        }

        /* Modal customization */
        .modal-content {
            background-color: transparent;
            border: none;
        }

        .modal-header {
            position: absolute;
            top: 0;
            right: 0;
            z-index: 1;
            background: transparent;
        }

        .btn-close {
            background-color: #ffffff;
            border-radius: 50%;
            opacity: 0.8;
            padding: 8px;
            margin: 8px;
        }

        .btn-close:hover {
            opacity: 1;
        }

        /* Modal image styles */
        .modal-image {
            max-height: 80vh;
            max-width: 100%;
            object-fit: contain;
        }

        /* Pause animation on hover */
        .gallery-column:hover .scroll-content {
            animation-play-state: paused;
        }
    </style>
</head>
<body>
    <section class="gallery">
        <div class="container-fluid py-4">
            <div class="gallery-container">
                <div class="gallery-column" id="column1"></div>
                <div class="gallery-column" id="column2"></div>
                <div class="gallery-column" id="column3"></div>
                <div class="gallery-column" id="column4"></div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center p-0">
                    <img src="/placeholder.svg" alt="Modal Image" class="modal-image" id="modalImage">
                </div>
            </div>
        </div>
    </div>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const columns = document.querySelectorAll('.gallery-column');
            const modalImage = document.getElementById('modalImage');
            const imageModal = new bootstrap.Modal(document.getElementById('imageModal'));

            // Function to get all image files from a directory
            async function loadImages() {
                // In a real scenario, you would need to implement a server-side solution
                // to get the list of images. For this example, we'll simulate it:
                const numberOfImages = 10; // Increased number of images
                return Array.from({ length: numberOfImages }, (_, i) => `public//img/images2/image${i + 1}.jpg`);
            }

            // Function to create image cards
            function createImageCard(src) {
                const card = document.createElement('div');
                card.className = 'image-card';
                
                const img = document.createElement('img');
                img.src = src;
                img.alt = 'Gallery Image';
                img.loading = 'lazy';
                
                card.appendChild(img);
                
                card.addEventListener('click', () => {
                    modalImage.src = src;
                    imageModal.show();
                });
                
                return card;
            }

            // Function to initialize a column
            function initializeColumn(column, images, isScrollUp) {
                const scrollContent = document.createElement('div');
                scrollContent.className = `scroll-content ${isScrollUp ? 'scroll-up' : 'scroll-down'}`;
            
                // Use all images for each column
                images.forEach(src => {
                    scrollContent.appendChild(createImageCard(src));
                });
            
                column.appendChild(scrollContent);
            }

            // Initialize gallery
            loadImages().then(images => {
                columns.forEach((column, index) => {
                    // Shuffle images for each column to create variety
                    const shuffledImages = [...images].sort(() => Math.random() - 0.5);
                    initializeColumn(column, shuffledImages, index % 2 === 0);
                });
            });

            // Pause animations on hover
            columns.forEach(column => {
                column.addEventListener('mouseenter', () => {
                    const content = column.querySelector('.scroll-content');
                    content.style.animationPlayState = 'paused';
                });

                column.addEventListener('mouseleave', () => {
                    const content = column.querySelector('.scroll-content');
                    content.style.animationPlayState = 'running';
                });
            });

            // Adjust animation speed based on screen size
            function adjustAnimationSpeed() {
                const columns = document.querySelectorAll('.scroll-content');
                const speed = window.innerWidth <= 576 ? '15s' : '30s';
                columns.forEach(column => {
                    column.style.animationDuration = speed;
                });
            }

            // Add a function to handle resize events:
            function handleResize() {
                adjustAnimationSpeed();
            }

            // Update event listeners:
            window.addEventListener('resize', handleResize);
            handleResize(); // Initial call
        });
    </script>

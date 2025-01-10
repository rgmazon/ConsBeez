<div class="container">
<div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner" id="carousel-items">
    <!-- Carousel items will be inserted here by JavaScript -->
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!-- Modal for full image view -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" style="max-width: 60% !important;" id="modal-dialog">
    <div class="modal-content">
      <div class="modal-body p-0">
        <!-- Close button positioned at the upper-right corner of the image -->
        <button type="button" class="btn-close position-absolute top-0 end-0 m-2" data-bs-dismiss="modal" aria-label="Close"></button>
        <img id="modal-image" src="" class="img-fluid" alt="Full Image">
      </div>
    </div>
  </div>
</div>

<script>
  // JavaScript to dynamically load images
  const carouselItemsContainer = document.getElementById('carousel-items');
  const totalImages = 71; // Total number of images
  const imagesPerSlide = 3; // Number of images per scroll
  let isActive = true; // Determine if the first batch should be active

  for (let i = 1; i <= totalImages; i += imagesPerSlide) {
    const imageItems = [];
    for (let j = 0; j < imagesPerSlide; j++) {
      const imgIndex = i + j;
      if (imgIndex <= totalImages) {
        const imgSrc = `public/img/images2/image${imgIndex}.jpg`; // Image path
        imageItems.push(`
          <div class="col">
            <img src="${imgSrc}" class="d-block w-100 image-hover" alt="Image ${imgIndex}" data-bs-toggle="modal" data-bs-target="#imageModal" data-src="${imgSrc}">
          </div>
        `);
      }
    }

    // Create a new carousel item for every 3 images
    carouselItemsContainer.innerHTML += `
      <div class="carousel-item ${isActive ? 'active' : ''}" data-bs-interval="2000">
        <div class="row">
          ${imageItems.join('')}
        </div>
      </div>
    `;

    // Set active to false for all subsequent carousel items
    isActive = false;
  }

  // Modal functionality to open the clicked image
  const modalImage = document.getElementById('modal-image');
  document.querySelectorAll('.image-hover').forEach(image => {
    image.addEventListener('click', function () {
      const imgSrc = this.getAttribute('data-src');
      modalImage.src = imgSrc;
    });
  });
</script>

<style>
  /* Hover effect on images */
  img {
    border-radius: 10px;
  }
  .image-hover {
    transition: transform 0.3s ease;
  }

  .image-hover:hover {
    transform: scale(1.05);
    cursor: pointer;
  }

  /* Customize modal to show only the image and position the close button */
  .modal-dialog {
    max-width: 60% !important; /* Ensure modal is 60% of screen width */
    margin: 0 auto;
  }

  .modal-content {
    background: transparent;
    border: none;
  }

  .modal-body {
    position: relative;
    padding: 0;
  }

  .btn-close {
    z-index: 9999;
    background-color: white;
    border: 1px solid transparent; /* No border */
    width: 25px;
    height: 25px;
    font-size: 1.5rem;
    padding: 0;
    margin: 0;
    border-radius: 50%;
  }

  .btn-close:hover {
    background-color: rgba(255, 255, 255, 0.7); /* Subtle hover effect */
  }

  /* Increase modal size on smaller screens using media queries */
  @media (max-width: 768px) {
    .modal-dialog {
      max-width: 90% !important; /* Make modal larger on mobile */
    }
  }

  /* Increase modal size on very small screens (portrait mobile) */
  @media (max-width: 576px) {
    .modal-dialog {
      max-width: 95% !important; /* Make modal even larger on very small screens */
    }
  }
</style>

</div>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.3/dist/css/splide.min.css">
  <style>
    .my-slider-progress {
      position: absolute;
      bottom: 0;
      left: 10%;
      width: 80%;
      height: 5px;
      background: #ccc;
    }

    .my-slider-progress-bar {
      background: gold;
      height: 100%;
      width: 0;
      transition: width 400ms ease;
    }

    .splide__slide {
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 1.5rem;
    }

    .splide__slide img {
      max-width: 100%;
      height: auto;
      object-fit: contain;
      max-height: 80%;
      border-radius: 10px;
    }
  </style>
</head>
<body>

<div class="container mt-5">
  <div class="splide">
    <div class="splide__track">
      <ul class="splide__list">
        <script>
          for (let i = 1; i <= 71; i++) {
            document.write(`
              <li class="splide__slide">
                <img src="public/img/images2/image${i}.jpg" alt="Image ${i}">
              </li>
            `);
          }
        </script>
      </ul>
    </div>
    <div class="my-slider-progress">
      <div class="my-slider-progress-bar"></div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.3/dist/js/splide.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    var splide = new Splide('.splide', {
      type       : 'loop',
      autoplay   : true,
      interval   : 3000,
      pauseOnHover: false,
      arrows     : true,
      pagination : false,
    });

    var bar = splide.root.querySelector('.my-slider-progress-bar');

    splide.on('mounted move', function () {
      var end  = splide.Components.Controller.getEnd() + 1;
      var rate = Math.min((splide.index + 1) / end, 1);
      bar.style.width = String(100 * rate) + '%';
    });

    splide.mount();
  });
</script>

</body>
</html>

<!-- Animated Hexagons -->

<div class="animated-bg beehive"></div>

<style>
    .beehive {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1; /* Send to background */
        overflow: hidden;
        background-color: white; /* Optional fallback */
    }

    .hexagon {
        position: absolute;
        pointer-events: none;
        opacity: 0;
        transition: opacity 1s ease-in-out;
        animation-name: float;
        animation-timing-function: ease-in-out;
        animation-iteration-count: infinite;
        animation-direction: alternate;
    }

    @keyframes float {
        0% {
            transform: translate(0, 0) rotate(0deg);
        }
        100% {
            transform: translate(30px, 30px) rotate(10deg);
        }
    }
</style>

<script>
    const hexagonCount = 25; // Number of hexagons to keep on screen

    function createHexagon() {
        const hexagon = document.createElement('div');
        hexagon.classList.add('hexagon');

        const size = Math.random() * 50 + 20; // Random size between 20px and 70px
        const x = Math.random() * window.innerWidth; // Random horizontal position
        const y = Math.random() * window.innerHeight; // Random vertical position

        const colors = ['gold', 'yellow', 'lightgreen', 'orange'];
        const color = colors[Math.floor(Math.random() * colors.length)];

        hexagon.style.width = `${size}px`;
        hexagon.style.height = `${size}px`;
        hexagon.style.left = `${x}px`;
        hexagon.style.top = `${y}px`;
        hexagon.style.backgroundColor = color;
        hexagon.style.clipPath = 'polygon(25% 0%, 75% 0%, 100% 50%, 75% 100%, 25% 100%, 0% 50%)';

        // Set random animation duration and delay
        const animationDuration = 20 + Math.random() * 5;
        const animationDelay = Math.random() * -5;
        hexagon.style.animationDuration = `${animationDuration}s`;
        hexagon.style.animationDelay = `${animationDelay}s`;

        document.querySelector('.beehive').appendChild(hexagon);

        // Fade in effect
        setTimeout(() => {
            hexagon.style.opacity = '0.7';
        }, 100);

        // Fade out and remove after a random duration
        setTimeout(() => {
            hexagon.style.opacity = '0';
            setTimeout(() => {
                hexagon.remove();
                ensureHexagonCount(); // Ensure 15 hexagons remain
            }, 2000);
        }, 7000 + Math.random() * 5000);
    }

    function ensureHexagonCount() {
        const currentHexagons = document.querySelectorAll('.hexagon').length;
        if (currentHexagons < hexagonCount) {
            const missingHexagons = hexagonCount - currentHexagons;
            for (let i = 0; i < missingHexagons; i++) {
                createHexagon();
            }
        }
    }

    function preloadHexagons() {
        for (let i = 0; i < hexagonCount; i++) {
            createHexagon();
        }
    }

    // Start hexagon animations when the window loads
    window.addEventListener('load', () => {
        preloadHexagons();
        setInterval(ensureHexagonCount, 1000); // Check and replenish hexagons every second
    });
</script>

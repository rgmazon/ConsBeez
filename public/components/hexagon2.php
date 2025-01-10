<div id="hexagon-animation-container" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; overflow: hidden; z-index: -1;">
</div>

<style>
.hexagon-animations {
    position: relative;
    overflow: hidden;
    z-index: 1;
}

.hexagon-shape {
    position: absolute;
    width: 50px;
    height: 43.3px; /* Correct height for a hexagon (50 * sqrt(3)/2) */
    opacity: 0;
    transition: opacity 0.5s ease-in-out;
}

.hexagon-shape::before {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
    background-color: transparent; /* This is set dynamically in JS */
}
</style>

<script>
class AnimatedHexagons {
    constructor() {
        this.animationContainer = document.getElementById('hexagon-animation-container');
        this.hexagonColors = ['rgba(255, 255, 200, 0.8)', 'rgba(200, 255, 200, 0.8)', 'rgba(255, 220, 200, 0.8)', 'rgba(255, 0, 0, 0.8)', 'rgba(255, 165, 0, 0.8)', 'rgba(220, 255, 178, 0.8)'];
        this.hexagonSizes = [30, 40, 50, 60, 70, 80];
        this.activeHexagons = new Set();
        this.minimumHexagonCount = 35;
    }

    generateHexagon() {
        const newHexagon = document.createElement('div');
        newHexagon.className = 'hexagon-shape';

        // Random properties
        const randomSize = this.hexagonSizes[Math.floor(Math.random() * this.hexagonSizes.length)];
        const randomColor = this.hexagonColors[Math.floor(Math.random() * this.hexagonColors.length)];
        const randomX = Math.random() * this.animationContainer.offsetWidth;
        const randomY = Math.random() * this.animationContainer.offsetHeight;

        // Set hexagon properties
        newHexagon.style.width = `${randomSize}px`;
        newHexagon.style.height = `${randomSize * Math.sqrt(3) / 2}px`; // Correct height
        newHexagon.style.left = `${randomX}px`;
        newHexagon.style.top = `${randomY}px`;

        // Set the background color using ::before
        const hexagonStyle = document.createElement('style');
        const uniqueHexagonClass = `hexagon-shape-${Date.now()}-${Math.random().toString(36).substr(2, 9)}`;
        newHexagon.classList.add(uniqueHexagonClass);
        hexagonStyle.textContent = `.${uniqueHexagonClass}::before { background-color: ${randomColor}; }`;
        document.head.appendChild(hexagonStyle);

        // Add to container and active hexagons set
        this.animationContainer.appendChild(newHexagon);
        this.activeHexagons.add(newHexagon);

        // Fade in after a random delay
        setTimeout(() => {
            newHexagon.style.opacity = '1';
        }, Math.random() * 1000);

        // Random lifetime between 3 and 7 seconds
        const hexagonLifetime = 3000 + Math.random() * 4000;

        // Remove after the random lifetime
        setTimeout(() => {
            newHexagon.style.opacity = '0';
            setTimeout(() => {
                newHexagon.remove();
                hexagonStyle.remove();
                this.activeHexagons.delete(newHexagon);
            }, 500);
        }, hexagonLifetime);

        return newHexagon;
    }

    ensureMinimumHexagons() {
        const currentHexagonCount = this.activeHexagons.size;
        if (currentHexagonCount < this.minimumHexagonCount) {
            for (let i = 0; i < this.minimumHexagonCount - currentHexagonCount; i++) {
                this.generateHexagon();
            }
        }
    }

    startAnimation() {
        // Periodically check and maintain the required number of hexagons
        this.maintenanceIntervalId = setInterval(() => {
            this.ensureMinimumHexagons();
        }, 500);
    }

    stopAnimation() {
        if (this.maintenanceIntervalId) {
            clearInterval(this.maintenanceIntervalId);
            this.maintenanceIntervalId = null;
        }
    }
}

// Initialize and start animation when document is ready
document.addEventListener('DOMContentLoaded', () => {
    const hexagonAnimationInstance = new AnimatedHexagons();
    hexagonAnimationInstance.startAnimation();
});
</script>

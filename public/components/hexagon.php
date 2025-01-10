<div id="hexagon-container" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; pointer-events: none; overflow: hidden; z-index: -1;">
</div>

<style>
.odometers {
    position: relative;
    overflow: hidden;
    z-index: 1;
}

.hexagon {
    position: absolute;
    width: 50px;
    height: 57.735px;
    opacity: 0;
    transition: opacity 0.5s ease-in-out;
}

.hexagon::before {
    content: '';
    position: absolute;
    width: 100%;
    height: 100%;
    clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
}
</style>

<script>
class HexagonAnimation {
    constructor() {
        this.container = document.getElementById('hexagon-container');
        this.colors = ['rgba(255, 255, 200, 0.1)', 'rgba(200, 255, 200, 0.1)', 'rgba(255, 220, 200, 0.1)', 'rgba(255, 0, 0, 0.1)', 'rgba(255, 165, 0, 0.1)', 'rgba(220, 255, 178, 0.1)'];
        this.sizes = [30, 40, 50, 60, 70, 80];
        this.hexagons = new Set();
        this.minHexagons = 35;
    }

    createHexagon() {
        const hexagon = document.createElement('div');
        hexagon.className = 'hexagon';

        // Random properties
        const size = this.sizes[Math.floor(Math.random() * this.sizes.length)];
        const color = this.colors[Math.floor(Math.random() * this.colors.length)];
        const startX = Math.random() * this.container.offsetWidth;
        const startY = Math.random() * this.container.offsetHeight;

        // Set hexagon properties
        hexagon.style.width = `${size}px`;
        hexagon.style.height = `${size * 1.1547}px`;
        hexagon.style.left = `${startX}px`;
        hexagon.style.top = `${startY}px`;

        // Set the background color using ::before
        const style = document.createElement('style');
        const uniqueClass = `hexagon-${Date.now()}-${Math.random().toString(36).substr(2, 9)}`;
        hexagon.classList.add(uniqueClass);
        style.textContent = `.${uniqueClass}::before { background-color: ${color}; }`;
        document.head.appendChild(style);

        // Add to container and active hexagons set
        this.container.appendChild(hexagon);
        this.hexagons.add(hexagon);

        // Fade in after a random delay
        setTimeout(() => {
            hexagon.style.opacity = '1';
        }, Math.random() * 1000);

        // Random lifetime between 3 and 7 seconds
        const lifetime = 3000 + Math.random() * 4000;

        // Remove after the random lifetime
        setTimeout(() => {
            hexagon.style.opacity = '0';
            setTimeout(() => {
                hexagon.remove();
                style.remove();
                this.hexagons.delete(hexagon);
            }, 500);
        }, lifetime);

        return hexagon;
    }

    maintainHexagonCount() {
        const currentCount = this.hexagons.size;
        if (currentCount < this.minHexagons) {
            for (let i = 0; i < this.minHexagons - currentCount; i++) {
                this.createHexagon();
            }
        }
    }

    start() {
        // Periodically check and maintain the required number of hexagons
        this.maintenanceInterval = setInterval(() => {
            this.maintainHexagonCount();
        }, 500);
    }

    stop() {
        if (this.maintenanceInterval) {
            clearInterval(this.maintenanceInterval);
            this.maintenanceInterval = null;
        }
    }
}

// Initialize and start animation when document is ready
document.addEventListener('DOMContentLoaded', () => {
    const hexagonAnimation = new HexagonAnimation();
    hexagonAnimation.start();
});
</script>
